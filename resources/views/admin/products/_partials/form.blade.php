{{ csrf_field() }}

<div class="row">

    <div class="form-gourp col-md-3 col-sm-3 col-lg-3 col-xs-3">
        <label for="category_id">Categoria</label>
        <select class="form-control" id="category_id" name="category_id">
            <option value="">Selecione</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if ($category->id == $product->category_id)
                        selected
                    @endif
                    >{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-gourp col-md-4 col-sm-4 col-lg-4 col-xs-4">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') }}">
    </div>

    <div class="form-gourp col-md-3 col-sm-3 col-lg-3 col-xs-3">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" value="{{ $product->url ?? old('url') }}">
    </div>

    <div class="form-gourp col-md-2 col-sm-2 col-lg-2 col-xs-2">
        <label for="price">Preço</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price ?? old('price') }}">
    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="form-gourp col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <label for="description">Descrição</label>
        <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{ $product->description ?? old('description') }}</textarea>
    </div>

</div> <!-- row -->