@extends('adminlte::page')

@section('title', "Detalhes do Produto {$product->name}")

@section('content_header')

    <ol class="breadcrumb">

        <li>
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>

        <li>
            <a href="{{ route('products.index') }}">Produtos</a>
        </li>

        <li>
            <a class="active" href="{{ route('products.show', $product->id) }}">Detalhes</a>
        </li>

    </ol> <!-- breadcrumb -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

        <h1>Detalhes da categoria: {{ $product->title }}</h1>

        </div>

    </div> <!-- row -->

@stop

@section('content')
    
    <div class="content">

        <div class="row">

            <div class="box box-success">
                <div class="box-body">

                    <div class="row">

                        <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">

                            <p><strong>ID:</strong> {{ $product->id }}</p>
                            <p><strong>Categoria:</strong> {{ $product->category->title }}</p>
                            <p><strong>Nome:</strong> {{ $product->name }}</p>
                            <p><strong>URL:</strong> {{ $product->url }}</p>
                            <p><strong>Preço:</strong> {{ $product->price }}</p>
                            <p><strong>Descrição:</strong> {{ $product->description }}</p>

                        </div>

                    </div> <!-- row -->

                    <hr>

                    <form class="form" method="POST" action="{{ route('products.destroy', $product->id) }}">

                        @csrf

                        @method('DELETE')

                        <div class="row">
                            <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>
                        </div> <!-- row -->

                    </form> <!-- form -->
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop