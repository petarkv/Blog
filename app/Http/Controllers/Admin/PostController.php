<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Post;
use App\Model\User\Tag;
use App\Model\User\Category;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return \view('admin.post.show', \compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.post', \compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            // 'image' => 'required',
            ]);

            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public');
            }else{
                $imageName = "default.jpg";
            }

            $post = new Post;
            $post->image = $imageName;
            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->save();
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);

            return \redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with(['tags','categories'])->where('id',$id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit',\compact('post','tags','categories'));
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

        // $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            // 'image'=>'required'
            ]);
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }else{
            $imageName = "default.jpg";
        }
        $post = Post::find($id);
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;        
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
}
