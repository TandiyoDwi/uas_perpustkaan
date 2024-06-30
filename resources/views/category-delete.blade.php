@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <h2>Apkah kamu yakin hapus kategori {{$category->name}}</h2>
    <div class="mt-4">
        <a href="/category-destroy/{{$category->slug}}"class="btn btn-danger m-5">Ya</a>
        <a href="/categories"class="btn btn-primary">Batal</a>
    </div>
@endsection