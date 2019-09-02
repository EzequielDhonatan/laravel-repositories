<?php

namespace App\Http\Controllers\Admin\Category;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Http\Requests\Admin\Category\StoreUpdateFormRequest;

class IndexController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->paginate();

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
        $this->repository->store([
            'title'         => $request->title,
            'url'           => $request->url,
            'description'   => $request->description
        ]);

        return redirect()->route('categories.index')
                        ->withSuccess('Cadastro realizado com sucesso!');
                        // ->withError('Ops, Algo errado!');
                        // ->withWarning('Ops, Perigo detectado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$category = $this->repository->findById($id))
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
        if (!$category = $this->repository->findById($id))
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
        $this->repository
                        ->update($id, [
                            'title'         => $request->title,
                            'url'           => $request->url,
                            'description'   => $request->description
                        ]);

        return redirect()->route('categories.index')
                        ->withSuccess('Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('categories.index')
                        ->withSuccess('Registro deletado com sucesso!');
    }

    public function search(Request $request) 
    {
        $data = $request->except('_token');

        $categories = $this->repository->search($data);

        return view('admin.categories.index', compact('categories', 'data'));
    }
}
