<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Console\Command;

class searchByTag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:searchByTag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Searching and returning posts by a given tag';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tagInput = $this->ask('Enter a tag please');
        
        try {   //Cheking if the given tag exist
            $tag = Tag::getTag($tagInput)->get();

            if ($tag[0]) {  //If the tag is correct, processing the request
                $posts = Post::getRelatedPosts($tag[0]->id)->get();
                if(count($posts) == 0)  //If the tag is correct but there is no post, display a message and exit
                {
                    echo "There is no post yet for this tag !";
                    return;
                }

                foreach ($posts as $post) { //If the tag is correct and there is posts, showing the posts
                    echo $post."\n\n";
                }
            }
        } catch (\Throwable $e) {   //If the tag doesn't exist, throw an error and display a message
            echo "This tag doesn't exist !";
            return;
        }
    }
}
