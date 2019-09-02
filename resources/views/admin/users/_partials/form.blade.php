{{ csrf_field() }}

<div class="row">

    <div class="form-gourp col-md-4 col-sm-4 col-lg-4 col-xs-4">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? old('name') }}">
    </div>

    <div class="form-gourp col-md-4 col-sm-4 col-lg-4 col-xs-4">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? old('email') }}">
    </div>

    <div class="form-gourp col-md-4 col-sm-4 col-lg-4 col-xs-4">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password ?? old('password') }}">
    </div>

</div> <!-- row -->