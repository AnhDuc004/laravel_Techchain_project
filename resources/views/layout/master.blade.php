<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                @auth
                    <div class="container-fluid">
                        <a class="navbar-brand" href="http://127.0.0.1:8000/"><img class="img-fluid" width="100px"
                                src="theme/client/images/logo.png" alt="Reader | Hugo Personal Blog Template"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                {{-- quản lí danh mục và danh sách bài viết của admin --}}
                                @if (Auth::user()->role == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ route('admin.dashboard') }}">Quản trị Web</a>
                                    </li>
                                @endif
                                {{-- logout --}}
                                <li class="nav-item dropdown" class="float-right">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Hello
                                        {{ Auth::user()->username }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('password.change') }}">Đổi mật
                                            khẩu
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                                </li>
                                {{-- end logout --}}

                                {{-- chua dang nhap --}}
                            @else
                                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                    <div class="container-fluid">
                                        <a class="navbar-brand" href="/home"><img
                                                src="https://tse1.mm.bing.net/th?id=OIP.oygcYtCnt3RcZxbeu1FreQHaEc&pid=Api&P=0&h=180"
                                                alt="" width="60"></a>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                {{-- Tìm Kiếm  --}}
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page"
                                                        href="{{ route('search.index') }}">Tìm</a>
                                                </li> --}}
                                                {{--  --}}
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page"
                                                        href="{{ route('login') }}">Đăng
                                                        Nhập</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                @if (Route::has('register'))
                                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                        <div class="container-fluid">
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page"
                                                            href="{{ route('register') }}">Đăng
                                                            ký</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                @endif
                            @endauth


                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
