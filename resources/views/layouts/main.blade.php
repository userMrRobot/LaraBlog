<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('assets/images/logo.svg')}}" alt="Edica"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">

                    @if(!empty(\Illuminate\Support\Facades\Auth::user()) && \Illuminate\Support\Facades\Auth::user()->role === 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin')}}">Админ кабинет</a>
                        </li>
                    @endif
                    @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('personal.main.index')}}">Личный кабинет</a>
                        </li>
                    @endif

                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    @empty(\Illuminate\Support\Facades\Auth::user()->id)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                    @endif
                    @isset(\Illuminate\Support\Facades\Auth::user()->id)
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Выйти</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

@yield('content')

<footer style="background-color: #000; color: #fff; padding: 20px 0; text-align: center;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <p>&copy; 2025 Edica Blog</p>


    </div>
</footer>

<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
