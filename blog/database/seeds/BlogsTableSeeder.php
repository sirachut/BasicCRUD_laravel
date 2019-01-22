<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->delete();
		DB::table('blogs')->insert([
		'title' => 'นี่คือหัวข้อแรกของบล็อค',
		'content' => 'นี่คือเนื้อหาแรกของบล็อค',
		'created_at' => date('Y-m-d H:i:s')
		]);
    }

    public function index()
    {
       // get all the blogs
        $blogs = Blog::all()->sortByDesc('created_at');

        // load the view and pass the user
        return View('blogs.index')
            ->with('blogs', $blogs);
    }
}
