<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Type;

use App\Category;

use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(1);

        return response()->json($post,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->Seo = $request->Seo;
        $post->image = $request->image;
        $post->post = $request->post;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $solution = Post::find($id);
        $solution->title = $request->title;
        $solution->Seo = $request->Seo;
        $solution->image = $request->image;
        $solution->post = $request->post;
        $solution->update();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignCategory($post_id,$category_id)
    {
        $category = Category::find($category_id);
        $category->posts()->attach($post_id);
        return response()->json('Success',200);
    }
    public function assignType($post_id,$type_id)
    {
        $type = Type::find($type_id);
        $type->posts()->attach($post_id);
        return response()->json('Success',200);
    }
    public function latest()
    {
      $latest = DB::table('posts')
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();

      return response()->json($latest,200);
    }

    /**
     * Store category
     * and Type
    */
    public function Type(Request $request){
        /**
         * Create type
        */
        $type = new Type();
        $type->type = $request->type;
        $type->save();

    }
}
