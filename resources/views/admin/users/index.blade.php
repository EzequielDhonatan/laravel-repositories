@extends('adminlte::page')

@section('title', 'Listagem de Usuários')

@section('content_header')

    <ol class="breadcrumb">

        <li>
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>

        <li>
            <a class="active" href="{{ route('users.index') }}">Usuários</a>
        </li>

    </ol> <!-- breadcrumb -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

            <h1>Usuários</h1>

            <div class="text-right">

                <a class="btn btn-success" href="{{ route('users.create') }}">
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

                    <form class="form form-inline" method="POST" action="{{ route('users.search') }}">

                        @csrf
                        
                        <input class="form-control" type="text" id="filter" name="filter" value="{{ $data['filter'] ?? '' }}" placeholder="Filtrar?">
                        <button class="btn btn-success" type="submit">Buscar</button>

                    </form> <!-- form form-inline -->
                    
                    <br>

                    @if (isset($data))
                        <a href="{{ route('users.index') }}">(x) Limpar Resultados da Pesquisa</a>
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
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th width="100px"></th>
                            </tr>

                        </thead> <!-- thead -->
                        
                        <tbody>
                            
                            @foreach ($users as $user)

                                <tr>

                                    <th scope="row">
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            {{ $user->id }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            {{ $user->name }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            {{ $user->email }}
                                        </a>
                                    </th>

                                    <th>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            {{ $user->description }}
                                        </a>
                                    </th>

                                    <td>

                                        <a href="{{ route('users.show', $user->id) }}">
                                            <i class="fas fa-info" style="color: blue;"></i>
                                        </a>
                                        
                                    </td>
                                </tr>

                            @endforeach

                        </tbody> <!-- tbody -->

                    </table> <!-- table table-striped -->

                    @if (isset($data))
                        {!! $users->appends($data)->links() !!}
                    @else
                        {!! $users->links() !!}
                    @endif
                    
                </div> <!-- box-body -->
            </div> <!-- box -->

        </div> <!-- row -->

    </div> <!-- content -->

@stop