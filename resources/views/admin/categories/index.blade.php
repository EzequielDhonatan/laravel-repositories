@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')


    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

            <h1>Categorias</h1>

            <a class="btn btn-success" href="{{ route('categories.create') }}">
                <i class="fas fa-plus"></i>
            </a>

        </div>

    </div> <!-- row -->

@stop

@section('content')
    
    <div class="content">

        <div class="row">

            <div class="box box-success">
                <div class="box-body">
                    
                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">URL</th>
                                <th scope="col">Descrição</th>
                                <th scope="col"></th>
                            </tr>

                        </thead> <!-- thead -->
                        
                        <tbody>
                            
                            @foreach ($categories as $category)

                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->url }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>...</td>
                                </tr>

                            @endforeach

                        </tbody> <!-- tbody -->

                    </table> <!-- table table-striped -->
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop