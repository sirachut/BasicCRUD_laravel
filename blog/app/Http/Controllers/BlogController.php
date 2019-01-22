<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the blogs
        $blogs = Blog::all()->sortByDesc('created_at');

        // load the view and pass the user
        return View('blogs.index')
            ->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (resources\views\blogs)
        return View('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate read more on validation at https://laravel.com/docs/5.4/validation
		$this->validate($request, [
            'title' => 'required|string|max:150',
            'content' => 'required|string',
        ]);

        // store
        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();

        // redirect
        return redirect('blogs')->with('message', 'Successfully created blog!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the blog
        $blog = Blog::findOrFail($id);

        // show the view and pass the blog to it
        return View('blogs.show')
            ->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the blog
        $blog = Blog::findOrFail($id);

        // show the edit form and pass the blog
        return View('blogs.edit')
            ->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate read more on validation at https://laravel.com/docs/5.4/validation
		$this->validate($request, [
            'title' => 'required|string|max:150',
            'content' => 'required|string',
        ]);

        // store
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();

        // redirect
        return redirect('blogs')->with('message', 'Successfully updated blog!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $blog = Blog::findOrFail($id);
        $blog->delete();
    }
}
