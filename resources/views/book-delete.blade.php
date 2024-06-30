@extends('layouts.mainlayout')

@section('title', 'Delete Book')

@section('content')
    <h2>Apkah kamu yakin hapus buku {{$book->title}}</h2>
    <div class="mt-4">
        <a href="/book-destroy/{{$book->slug}}"class="btn btn-danger m-5">Ya</a>
        <a href="/books"class="btn btn-primary">Batal</a>
    </div>
@endsection