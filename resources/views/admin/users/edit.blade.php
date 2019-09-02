@extends('adminlte::page')

@section('title', 'Edição de usuário')

@section('content_header')

    <ol class="breadcrumb">

        <li>
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>

        <li>
            <a href="{{ route('users.index') }}">Usuários</a>
        </li>

        <li>
            <a class="active" href="{{ route('users.edit', $user->id) }}">Editar</a>
        </li>

    </ol> <!-- breadcrumb -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

        <h1>Editar categoria: {{ $user->title }}</h1>

        </div>

    </div> <!-- row -->

@stop

@section('content')
    
    <div class="content">

        <div class="row">

            <div class="box box-success">
                <div class="box-body">
                    
                    @include('admin.includes.alerts')

                    <form class="form" method="POST" action="{{ route('users.update', $user->id) }}">

                        <input type="hidden" name="_method" value="PUT">

                        <br>

                        @include('admin.users._partials.form')

                        <br>

                        <div class="row">

                            <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                <button type="submit" class="btn btn-success">Salvar</button>
                                <a class="btn btn-danger" href="{{ route('users.index') }}">Cancelar</a>

                            </div>

                        </div> <!-- row -->

                    </form> <!-- form -->
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop