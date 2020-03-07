@extends('layouts.admin')
@section('label', 'Produk')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<a href="{{route('produk.create')}}" class="btn btn-primary">Tambah</a>
				<table class="table">
					<thead>
						<tr>
							
							<td>Id kategori</td>
							<td>Nama</td>
							<td>harga</td>
							<td>Diskon</td>
							<td>Deskripsi</td>
							<td width="20%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						@foreach($model as $key => $value)
						<tr>
							<td>{{$value->nama_kategori}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->harga}}</td>
							<td>{{$value->diskon}}</td>
							<td>{{$value->deskripsi}}</td>
							<td>
								<a class="btn btn-info btn-sm" href="{{route('produk.edit', ['id'=>$value->id])}}">Edit</a>
								<a class="btn btn-danger btn-sm" href="{{route('produk.destroy', ['id'=>$value->id])}}" onClick="return confirm('Yakin akan dihapus?');">Delete</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
			<div class="row">
				<div class="col-12">
				{{$model-> links()}}
				</div>
			</div>

	</div>
	
@endsection
