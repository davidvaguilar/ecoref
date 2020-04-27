<?php

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = 'Categoria 1';
        $category->save();

        $category = new Category;
        $category->name = 'Categoria 2';
        $category->save();

        $tag = new Tag;
        $tag->name = 'R.22';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'R.507';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'R.404';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'R';
        $tag->save();

        $post = new Post;
        $post->title = "1015";        
        $post->url = str_slug("1015");
        $post->arrival_at = Carbon::now()->subDays(4);
        $post->type_id = 2;
        $post->problem_id = 4;
        $post->client_id = 2;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 1']));

        $post = new Post;
        $post->title = "1016";
        $post->url = str_slug("1016");
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post </p>";
        $post->arrival_at = Carbon::now()->subDays(7);
        $post->type_id = 3;
        $post->problem_id = 3;
        $post->client_id = 3;
        $post->user_id = 2;
        $post->save();


        $post->tags()->attach(Tag::create(['name' => 'etiqueta 2']));

        $post = new Post;
        $post->title = "1017";
        $post->url = str_slug("1017");
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post </p>";
        $post->arrival_at = Carbon::now()->subDays(7);
        $post->type_id = 3;
        $post->problem_id = 4;
        $post->client_id = 4;
        $post->user_id = 2;
        $post->save();

        
        $post->tags()->attach(Tag::create(['name' => 'etiqueta 2']));

        $post = new Post;
        $post->title = "1018";
        $post->url = str_slug("1018");
        $post->arrival_at = Carbon::now()->subDays(7);
        $post->type_id = 3;
        $post->problem_id = 1;
        $post->client_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 2']));
    }
}
