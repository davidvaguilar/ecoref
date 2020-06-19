<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [ 
        'title', 'published_at', 'category_id', 'user_id', 
        'started_at', 'finished_at', 'client_id'
    ];
 
    protected $dates = ['published_at', 'started_at', 'finished_at', 'deleted_at'];  // Instancia de Carbon

    //protected $with = (['category', 'tags', 'owner', 'photos']);   CUIDADO YA QUE CARGA pede formar loop

    protected static function boot(){
        parent::boot();
        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();    
        });
    }

    public function getRouteKeyName(){  //Cambia el id a nombre
       return 'url';
    }

    public function category(){   // $post->category->name
        return $this->belongsTo(Category::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function problem(){  
        return $this->belongsTo(Problem::class);
    }

    public function parameter(){  
        return $this->belongsTo(Parameter::class);
    }

    public function signature(){  
        return $this->belongsTo(Signature::class);
    }

    public function materials(){
        return $this->hasMany(Material::class);
    }

    public function tags(){   // $post->category->name
        return $this->belongsToMany(Tag::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query){
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now() )
            ->latest('published_at');    //Ordenar desendennte        
    }

    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this) ){   //if( auth()->user()->hasRole('Admin') ){
            return $query;
        }
        //return $query->where('user_id', auth()->id())->whereNull('finished_at');
        return $query->where('user_id', auth()->id())->where('status', 'PENDIENTE');

    }

    public function scopeByYearAndMonth($query)
    {
        $query->selectRaw('year(published_at) as year')
                ->selectRaw('month(published_at) as month')                  
                ->selectRaw('monthName(published_at) as monthname')                 
                ->selectRaw('count(*) posts')
                ->groupBy('year', 'month', 'monthname');  //     ->orderBy('published_at');                ->get();
    }

    public function isPublished(){
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    public static function create(array $attributes){
        $post = static::query()->create($attributes);
        $post->generateUrl();
        
        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);
        
        if($this->where('url', $url)->exists()){
            $url = "{$url}-{$this->id}";
            
        }
        $this->url = $url;
        $this->save();
    }

    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;

        $url = str_slug($title);
        $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();

        if( $duplicateUrlCount ){
            $url = $url . "-" . ++$duplicateUrlCount;
        }
        $this->attributes['url'] = $url;
    }

    public function setPublishedAtAttribute($published_at){
        $this->attributes['published_at'] = $published_at 
                                ? Carbon::parse($published_at) 
                                : null;
    }

    public function setStartedAtAttribute($started_at){
        $this->attributes['started_at'] = $started_at 
                                ? Carbon::parse($started_at) 
                                : null;
    }

    public function setFinishedAtAttribute($finished_at){
        $this->attributes['finished_at'] = $finished_at 
                                ? Carbon::parse($finished_at) 
                                : null;
    }

    public function setEquipmentAttribute($equipment){
        $this->attributes['equipment'] = mb_strtoupper($equipment);
    }

    public function setModelAttribute($model){
        $this->attributes['model'] = mb_strtoupper($model);
    }

    public function setJobAttribute($job){
        $this->attributes['job'] = mb_strtoupper($job);
    }

    public function setTypeOtherAttribute($type_other){
        $this->attributes['type_other'] = mb_strtoupper($type_other);
    }




    public function setCategoryIdAttribute($category){
        $this->attributes['category_id'] = Category::find($category)
                                ? $category
                                : Category::create(['name' => $category])->id;
    }


    public function syncTags($tags){
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag)
            ? $tag
            : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function viewType($home = ''){
        if ($this->photos->count() === 1):			
            return 'posts.photo';
        elseif ($this->photos->count() > 1):			
            return $home === 'home' ? 'posts.carousel-preview' : 'posts.carousel';
        elseif ($this->iframe):		
            return 'posts.iframe';
        else:
            return 'posts.text';
        endif;
    }

}
