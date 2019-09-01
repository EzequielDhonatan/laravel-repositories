@extends('adminlte::page')

@section('title', 'Listagem de Produtos')

@section('content_header')

    <ol class="breadcrumb">

        <li>
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>

        <li>
            <a class="active" href="{{ route('products.index') }}">Produtos</a>
        </li>

    </ol> <!-- breadcrumb -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

            <h1>Produtos</h1>

            <div class="text-right">

                <a class="btn btn-success" href="{{ route('products.create') }}">
                    <i class="fas fa-plus"></i>
                </a>
                
            </div> <!-- text-right -->

        </div>

    </div> <!-- row -->

@stop

@section('content')
    
    <div class="content">

        <div class="row">

            <div class="box box-success">
                <div class="box-body">

                    <form class="form form-inline" method="POST" action="{{ route('products.search') }}">

                        @csrf

                        <select class="form-control" name="category" id="category">
                            <option value="">Selecione</option>
                            @foreach ($categories as $id => $category)
                                <option value="{{ $id }}"
                                    @if (isset($filters['category']) && $filters['category'] == $id)
                                        selected
                                    @endif>{{ $category }}</option>
                            @endforeach
                        </select>
                        
                        <input class="form-control" type="text" id="name" name="name" value="{{ $filters['name'] ?? '' }}" placeholder="Nome">
                        <input class="form-control" type="text" id="price" price="name" value="{{ $filters['price'] ?? '' }}" placeholder="Preço">

                        <button class="btn btn-success" type="submit">Buscar</button>

                    </form> <!-- form form-inline -->
                    
                    <br>

                    @if (isset($data))
                        <a href="{{ route('products.index') }}">(x) Limpar Resultados da Pesquisa</a>
                    @endif

                <div> <!-- box body -->
            <div> <!-- box box-success -->

            <div class="box box-success">
                <div class="box-body">

                    @include('admin.includes.alerts')
                    
                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Nome</th>
                                <th scope="col">URL</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Descrição</th>
                                <th width="100px"></th>
                            </tr>

                        </thead> <!-- thead -->
                        
                        <tbody>
                            
                            @foreach ($products as $product)

                                <tr>

                                    <th scope="row">
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            {{ $product->id }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            {{ $product->category->title }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            {{ $product->url }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                             R$ {{ $product->price }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            {{ $product->description }}
                                        </a>
                                    </th>

                                    <td>

                                        <a href="{{ route('products.show', $product->id) }}">
                                            <i class="fas fa-info" style="color: blue;"></i>
                                        </a>
                                        
                                    </td>
                                </tr>

                            @endforeach

                        </tbody> <!-- tbody -->

                    </table> <!-- table table-striped -->

                    @if (isset($filters))
                        {!! $products->appends($filters)->links() !!}
                    @else
                        {!! $products->links() !!}
                    @endif
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop