{{-- header --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <title>Đăng Nhập</title>
</head>
<style>
    @import url('https://rsms.me/inter/inter-ui.css');

    ::selection {
        background: #2D2F36;
    }

    ::-webkit-selection {
        background: #2D2F36;
    }

    ::-moz-selection {
        background: #2D2F36;
    }

    body {
        background: white;
        font-family: 'Inter UI', sans-serif;
        margin: 0;
        padding: 20px;
    }

    .page {
        background: #e2e2e5;
        display: flex;
        flex-direction: column;
        height: calc(100% - 40px);
        position: absolute;
        place-content: center;
        width: calc(100% - 40px);
    }

    @media (max-width: 767px) {
        .page {
            height: auto;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    }

    .container {
        display: flex;
        height: 320px;
        margin: 0 auto;
        width: 640px;
    }

    @media (max-width: 767px) {
        .container {
            flex-direction: column;
            height: 630px;
            width: 320px;
        }
    }

    .left {
        background: white;
        height: calc(100% - 40px);
        top: 20px;
        position: relative;
        width: 50%;
    }

    @media (max-width: 767px) {
        .left {
            height: 100%;
            left: 20px;
            width: calc(100% - 40px);
            max-height: 270px;
        }
    }

    .login {
        font-size: 50px;
        font-weight: 900;
        margin: 50px 40px 40px;
    }

    .eula {
        color: #000000;
        font-size: 18px;
        line-height: 1.5;
        margin: 40px;
    }

    .right {
        background: #ffffff;
        box-shadow: 0px 0px 40px 16px rgba(0, 0, 0, 0.22);
        color: #F1F1F2;
        position: relative;
        width: 50%;
    }

    @media (max-width: 767px) {
        .right {
            flex-shrink: 0;
            height: 100%;
            width: 100%;
            max-height: 350px;
        }
    }

    svg {
        position: absolute;
        width: 320px;
    }

    path {
        fill: none;
        stroke: url(#linearGradient);
        ;
        stroke-width: 4;
        stroke-dasharray: 240 1386;
    }

    .form {
        margin: 40px;
        position: absolute;
    }

    label {
        color: #000000;
        display: block;
        font-size: 18px;
        height: 16px;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    input {
        background: transparent;
        border: 0;
        color: #000000;
        font-size: 20px;
        height: 30px;
        line-height: 30px;
        outline: none !important;
        width: 100%;
    }

    input::-moz-focus-inner {
        border: 0;
    }

    #submit {
        color: #707075;
        margin-top: 40px;
        transition: color 300ms;
    }

    #submit:focus {
        color: #f2f2f2;
    }

    #submit:active {
        color: #d0d0d2;
    }

    .error {
        color: red;
        font-size: 0.8em;
    }
</style>


<body>
    <a class="navbar-brand order-1" href="http://127.0.0.1:8000/">
        <img class="img-fluid" width="100px" src="theme/client/images/logo.png"
            alt="Reader | Hugo Personal Blog Template">
    </a>
    <div class="page" style="text-algin: center">

        <div class="container">
            <div class="left"
                style="background-image: url('theme/client/images/post/post-5.jpg'); background-size: cover;
            background-position: center;
            background-repeat: no-repeat; /* Không lặp lại ảnh */">
                <div class="login" style="font-size: 35px">Đăng Nhập</div>
                <div class="eula" style="padding-top: 80px">Bạn chưa có tài khoản ? <a href="{{ route('register') }}"
                        style="text-decoration: none">Đăng ký
                        ngay</a>
                </div>
            </div>
            <div class="right">
                <svg viewBox="0 0 320 300">
                    <defs>
                        <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992"
                            x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
                            <stop style="stop-color:#6aff00;" offset="0" id="stop876" />
                            <stop style="stop-color:#dfeac8;" offset="1" id="stop878" />
                        </linearGradient>
                    </defs>
                    <path
                        d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                </svg>

                <div class="form">
                    <form action="{{ route('postLogin') }}" method="POST">
                        @csrf
                        <div class="row">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="email">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif


                            <div class="row">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                                @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                                <input type="submit" id="submit" value="Submit">

                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
<script>
    var current = null;
    document.querySelector('#email').addEventListener('focus', function(e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: 0,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '240 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });
    document.querySelector('#password').addEventListener('focus', function(e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: -336,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '240 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });
    document.querySelector('#submit').addEventListener('focus', function(e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: -730,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '530 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });
</script>

</html>
