{{ csrf_field() }}

<div class="row">

    <div class="form-gourp col-md-6 col-sm-6 col-lg-6 col-xs-6">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $category->title ?? old('title') }}">
    </div>

    <div class="form-gourp col-md-6 col-sm-6 col-lg-6 col-xs-6">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" value="{{ $category->url ?? old('url') }}">
    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <label for="description">Descrição</label>
        <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{ $category->description ?? old('description') }}</textarea>
    </div>

</div> <!-- row -->