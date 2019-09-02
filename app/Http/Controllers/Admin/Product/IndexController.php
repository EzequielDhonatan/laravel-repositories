<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category\Category;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\Admin\Product\StoreUpdateFormRequest;

class IndexController extends Controller
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
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
        $products = $this->repository
                                    // ->with('category')
                                    // ->orderBy('id', 'DESC')
                                    // ->get(1);
                                    ->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        $categories = Category::pluck('title', 'id');

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request)
    {
        /*
        $category = Category::find($request->category_id);
        $product = $category->products()->create($request->all());
        dd($product);
        */

        $this->repository->store($request->all());

        return redirect()
                ->route('products.index')
                ->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $product = $this->repository
                                    ->with('category')
                                    ->where('id', $id)
                                    ->first();
                                    */
        $product = $this->repository->findWhereFirst('id', $id);

        if (!$product)
            return redirect()
                    ->back();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        // $categories = Category::pluck('title', 'id');

        if (!$product = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.products.edit', compact('product', 'categories'));
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
        $this->repository->update($id, $request->all());

        return redirect()
                ->route('products.index')
                ->withSuccess('Registrado atualizado com sucesso!');
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

        return redirect()
                    ->route('products.index')
                    ->withSuccess('Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->repository
                            /* ->with([
                                 'category' => function ($query) use ($request) {
                                     $query->where('id', $request->category);
                                 }
                            ])*/
                            ->with('category')
                            ->where(function ($query) use ($request) {

                                if ($request->name) {
                                    $filter = $request->name;
                                    $query->where(function ($querySub) use ($filter) {
                                        $querySub->where('name', 'LIKE', "%{$filter}%")
                                                    ->orWhere('description', 'LIKE', "%{$filter}%");
                                    });
                                }

                                if ($request->price) {
                                    $query->where('price', $request->price);
                                }

                                if ($request->category) {
                                    $query->orWhere('category_id', $request->category);
                                }
                            })
                            // ->toSql();
                            // dd($products);
                            // ->get();
                            ->paginate();

        return view('admin.products.index', compact('products', 'filters'));
    }
}
