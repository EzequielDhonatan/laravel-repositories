@extends('adminlte::page')

@section('title', "Detalhes do usuário {$user->name} ")

@section('content_header')

    <ol class="breadcrumb">

        <li>
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>

        <li>
            <a href="{{ route('users.index') }}">Usuários</a>
        </li>

        <li>
            <a class="active" href="{{ route('users.show', $user->id) }}">Detalhes</a>
        </li>

    </ol> <!-- breadcrumb -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

        <h1>Detalhes do usuário: {{ $user->name }}</h1>

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

                            <p><strong>ID:</strong> {{ $user->id }}</p>
                            <p><strong>Nome:</strong> {{ $user->name }}</p>
                            <p><strong>E-mail:</strong> {{ $user->email }}</p>

                        </div>

                    </div> <!-- row -->

                    <hr>

                    <form class="form" method="POST" action="{{ route('users.destroy', $user->id) }}">

                        @csrf

                        <input type="hidden" name="_method" value="DELETE">

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