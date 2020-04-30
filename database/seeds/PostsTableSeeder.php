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
        Post::truncate();

        $post = new Post;
        $post->title = "1015";        
        $post->url = str_slug("1015");
        $post->started_at = Carbon::now()->subDays(4);
        $post->type_id = 2;
        $post->problem_id = 4;
        $post->client_id = 2;
        $post->parameter_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "1016";
        $post->url = str_slug("1016");
        $post->started_at = Carbon::now()->subDays(7);
        $post->type_id = 3;
        $post->problem_id = 3;
        $post->client_id = 3;
        $post->parameter_id = 2;
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "1017";
        $post->url = str_slug("1017");
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post </p>";
        $post->started_at = Carbon::now()->subDays(7);
        $post->type_id = 3;
        $post->problem_id = 4;
        $post->client_id = 4;
        
        $post->parameter_id = 3;
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "1018";
        $post->url = str_slug("1018");
        $post->started_at = Carbon::now()->subDays(7);
        $post->type_id = 3;
        $post->problem_id = 1;
        $post->client_id = 1;
        
        $post->parameter_id = 4;
        $post->user_id = 2;
        $post->save();

    }
}
