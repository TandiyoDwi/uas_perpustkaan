@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')
    <h2>Apkah kamu yakin menghapus user {{$user->username}} ?</h2>
    <div class="mt-4">
        <a href="/user-destroy/{{$user->slug}}"class="btn btn-danger m-5">Ya</a>
        <a href="/users"class="btn btn-primary">Batal</a>
    </div>
@endsection