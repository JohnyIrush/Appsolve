<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

use DB;

class PagesController extends Controller
{

    public $pageid;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->page=='home'){
            $pageid = 1;
        }
        else if($request->page=='appsn'){
            $pageid = 2;
        }
        else if($request->page=='service'){
            $pageid = 3;
        }
        else if($request->page=='about'){
            $pageid = 4;
        }

        $page = Page::find($pageid);
        $page->content = $request->content;
        $page->save();
        return response()->json(Page::all(),200);
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

    /**
     * Get Homepage
    */
    public function page($id)
    {
        $page = DB::select('select content from pages where id = :id', ['id' => $id]);
        return response()->json($page,200);
    }
}
