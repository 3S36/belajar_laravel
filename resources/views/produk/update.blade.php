@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('produk.update',['id'=>$model->id])}}">
    @csrf
    <div class="form-group row">
        <label for="kategori_id" class="col-md-4 col-form-label text-md-right">{{ __('Id kategori ') }}</label>

        <div class="col-md-6">
             <select name="kategori_id" id="kategori_id" class="form-control @error('id_kategori') is-invalid @enderror"  >
                @foreach($kategori as $value)
                <option value="{{$value->id}}"
                    @if(old('kategori_id',$model->kategori_id)==$value->id)
                        selected="selected"
                    @endif
                    >{{$value->nama}}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

        <div class="col-md-6">
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama',$model->nama) }}" >

            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
    </div>
    <div class="form-group row">
        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

        <div class="col-md-6">
            <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga',$model->harga) }}" >

            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
    </div>

    <div class="form-group row">
        <label for="dikon" class="col-md-4 col-form-label text-md-right">{{ __('Diskon') }}</label>

        <div class="col-md-6">
            <input id="diskon" type="text" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon',$model->diskon) }}" >

            @error('diskon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
    </div>
    <div class="form-group row">
    <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

        <div class="col-md-6">
            <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" 
            name="deskripsi" value="{{ old('deskripsi',$model->deskripsi) }}" >

            @error('deskripsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
     </div>
     <div class="form-group row">
    <label for="simpan" class="col-md-4 col-form-label text-md-right"></label>

        <div class="col-md-6">
            <button type ="submit" class="btn btn-primary" >Simpan Perubahan
        </div>
     </div>
</form>
@endsection
