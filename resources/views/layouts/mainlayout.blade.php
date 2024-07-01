<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    {{--  bg-primari untuk warna hitam navbar  --}}
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary"> 
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakkaan</a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" 
                aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
          </nav>

          <div class="body-content h-100">
            <div class="row g-0 h-100"> 
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    @if (Auth::user())
                        @if (Auth::User()->role_id == 1)    
                            <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif>Dashboard</a>
                            <a href="/books" 
                                @if(request()->route()->uri == 'books' || 
                                    request()->route()->uri == 'book-add' || 
                                    request()->route()->uri == 'book-deleted' || 
                                    request()->route()->uri == 'book-edit/{slug}' || 
                                    request()->route()->uri == 'book-delete/{slug}') 
                                    class='active' 
                                @endif>
                                Buku
                            </a>
                            <a href="/categories" 
                                @if(request()->route()->uri == 'categories' || 
                                    request()->route()->uri == 'category-add' || 
                                    request()->route()->uri == 'category-deleted' || 
                                    request()->route()->uri == 'category-edit/{slug}' || 
                                    request()->route()->uri == 'category-delete/{slug}') 
                                    class='active' 
                                @endif>
                                Kategori
                            </a>
                            <a href="/users" 
                                @if(request()->route()->uri == 'users' || 
                                    request()->route()->uri == 'registered-users'|| 
                                    request()->route()->uri == 'user-detail/{slug}' || 
                                    request()->route()->uri == 'user-ban/{slug}') 
                                    class='active' 
                                @endif>
                                Users
                            </a>
                            <a href="/rent-logs" @if(request()->route()->uri == 'rent-logs') class='active' @endif>Log Penyewaan</a>
                            <a href="/" @if(request()->route()->uri == '/') class='active' @endif>List Buku</a>
                            <a href="/book-rent" @if(request()->route()->uri == 'book-rent') class='active' @endif>Sewa Buku</a>
                            <a href="book-return" @if(request()->route()->uri == 'book-return') class='active' @endif>Pengembalian Buku</a>
                            <a href="/logout" >Logout</a>
                        @else
                            <a href="/profile" @if(request()->route()->uri == 'profile') class='active' @endif>Profile</a>
                            <a href="/" @if(request()->route()->uri == '/') class='active' @endif>List Buku</a>
                            <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>