<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\Category\Category;
use App\Http\Requests\Admin\Product\StoreUpdateFormRequest;

class IndexController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->with('category')
                                    ->orderBy('id', 'DESC')
                                    ->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // $categories = Category::pluck('title', 'id');

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

        $product = $this->product->create($request->all());

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
        $product = $this->product->with('category')
                                    ->where('id', $id)
                                    ->first();

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

        if (!$product = $this->product->find($id))
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
        $product = $this->product->find($id);

        $product->update($request->all());

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
        $product = $this->product->find($id)->delete();

        return redirect()
                    ->route('products.index')
                    ->withSuccess('Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $products = $this->product
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
                            ->get();

        return view('admin.products.index', compact('products'));
    }
}
