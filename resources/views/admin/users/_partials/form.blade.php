{{ csrf_field() }}

<div class="row">

    <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? old('name') }}">
    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? old('email') }}">
    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

</div> <!-- row -->