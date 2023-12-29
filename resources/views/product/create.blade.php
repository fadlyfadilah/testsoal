@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Tambah Produk</div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="required" for="name">Nama Produk</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                    name="name" id="name" value="{{ old('name', '') }}" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="desc">Deskripsi</label>
                                <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" type="text" name="desc"
                                    id="desc" value="{{ old('desc', '') }}" required>
                                </textarea>
                                @if ($errors->has('desc'))
                                    <span class="text-danger">{{ $errors->first('desc') }}</span>
                                @endif
                            </div>
                            <br>
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
            </div>
        </div>
    </div>
@endsection
