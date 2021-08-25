<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;

class listTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:listTags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listing all the availables tags to make a request';

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
        $tags = Tag::get(); //Fetching all tags from the db
        foreach ($tags as $tag) {   //Showing all tags
            echo "- ".$tag->tag."\n";
        }
    }
}
