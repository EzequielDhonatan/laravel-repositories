@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')

    <ol class="breadcrumb">

        <li>
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>

        <li>
            <a class="active" href="{{ route('categories.index') }}">Categorias</a>
        </li>

    </ol> <!-- breadcrumb -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

            <h1>Categorias</h1>

            <div class="text-right">

                <a class="btn btn-success" href="{{ route('categories.create') }}">
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

                    <form class="form form-inline" method="POST" action="{{ route('categories.search') }}">

                        @csrf
                        
                        <input class="form-control" type="text" id="title" name="title" value="{{ $data['title'] ?? '' }}" placeholder="Título">
                        <input class="form-control" type="text" id="url" name="url" value="{{ $data['url'] ?? '' }}" placeholder="URL">
                        <input class="form-control" type="text" id="description" name="description" value="{{ $data['description'] ?? '' }}" placeholder="Descrição">
                        <button class="btn btn-success" type="submit">Buscar</button>

                    </form> <!-- form form-inline -->
                    
                    <br>

                    @if (isset($data))
                        <a href="{{ route('categories.index') }}">(x) Limpar Resultados da Pesquisa</a>
                    @endif

                <div> <!-- box body -->
            <div> <!-- box box-success -->

            <br>

            <div class="box box-success">
                <div class="box-body">

                    @include('admin.includes.alerts')
                    
                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">URL</th>
                                <th scope="col">Descrição</th>
                                <th width="100px"></th>
                            </tr>

                        </thead> <!-- thead -->
                        
                        <tbody>
                            
                            @foreach ($categories as $category)

                                <tr>

                                    <th scope="row">
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            {{ $category->id }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            {{ $category->url }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            {{ $category->description }}
                                        </a>
                                    </th>

                                    <td>

                                        <a href="{{ route('categories.show', $category->id) }}">
                                            <i class="fas fa-info" style="color: blue;"></i>
                                        </a>
                                        
                                    </td>
                                </tr>

                            @endforeach

                        </tbody> <!-- tbody -->

                    </table> <!-- table table-striped -->

                    @if (isset($data))
                        {!! $categories->appends($data)->links() !!}
                    @else
                        {!! $categories->links() !!}
                    @endif
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop