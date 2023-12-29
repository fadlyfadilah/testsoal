@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('products.update', [$product->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">name</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $product->name) }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="desc">Deskprisi</label>
                    <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" type="text" name="desc"
                        id="desc" required>{{ old('desc', $product->desc) }}
                    </textarea>
                    @if ($errors->has('desc'))
                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                    @endif
                </div>
                <img width="100px" src="/storage/{{ $product->img }}" alt="">
                <div class="form-group">
                    <label class="required" for="img">Gambar</label>
                    <input type="file" name="img" class="form-control-file" id="img">
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
