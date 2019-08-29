<?php

namespace App\Http\Controllers\Admin\Category;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Http\Requests\Admin\Category\StoreUpdateFormRequest;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request)
    {
        DB::table('categories')->insert([
            'title'         => $request->title,
            'url'           => $request->url,
            'description'   => $request->description
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')
                        ->where('id', $id)
                        ->first();

        if (!$category)
            return redirect()->back();

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if (!$category)
            return redirect()->back();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFormRequest $request, $id)
    {
        DB::table('categories')
                ->where('id', $id)
                ->update([
                    'title'         => $request->title,
                    'url'           => $request->url,
                    'description'   => $request->description
                ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')
                ->where('id', $id)
                ->delete();

        return redirect()->route('categories.index');
    }

    public function search(Request $request) 
    {
        $search = $request->search;

        $categories = DB::table('categories')
                ->where('title', $search)
                ->orWhere('url', $search)
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->get();

        return view('admin.categories.index', compact('categories', 'search'));
    }
}