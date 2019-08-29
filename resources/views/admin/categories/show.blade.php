@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')


    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

        <h1>Detalhes da categoria: {{ $category->title }}</h1>

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

                            <p><strong>ID:</strong> {{ $category->id }}</p>
                            <p><strong>Título:</strong> {{ $category->title }}</p>
                            <p><strong>URL:</strong> {{ $category->url }}</p>
                            <p><strong>Descrição:</strong> {{ $category->description }}</p>

                        </div>

                    </div> <!-- row -->

                    <hr>

                    <div class="row">

                        <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            
                            <button class="btn btn-danger" type="submit">Deletar</button>
                            
                        </div>

                        <hr>

                    </div> <!-- row -->
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop