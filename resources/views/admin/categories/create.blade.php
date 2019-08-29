@extends('adminlte::page')

@section('title', 'Cadastro de Categoria')

@section('content_header')


    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

            <h1>Cadastrar nova categoria</h1>

        </div>

    </div> <!-- row -->

@stop

@section('content')
    
    <div class="content">

        <div class="row">

            <div class="box box-success">
                <div class="box-body">

                    @if ($errors->any())

                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>    
                            @endforeach
                        </div>

                    @endif

                    <form class="form" method="POST" action="{{ route('categories.store') }}">

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="form-gourp col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="form-gourp col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                            </div>

                        </div> <!-- row -->

                        <br>

                        <div class="row">

                            <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>

                        </div> <!-- row -->

                        <br>

                        <div class="row">

                            <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                <button type="submit" class="btn btn-success">Salvar</button>
                                <a class="btn btn-danger" href="">Cancelar</a>

                            </div>

                        </div> <!-- row -->

                    </form> <!-- form -->
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop