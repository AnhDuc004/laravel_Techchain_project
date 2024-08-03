{{-- --}}

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
        height: 500px;
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
        color: #101011;
        display: block;
        font-size: 14px;
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
        outline: none;
        width: 100%;
    }

    input::-moz-focus-inner {
        border: 0;
    }

    #submit {
        border-radius: 10%;
        background-color: rgb(111, 173, 16);
        color: #000000;
        margin-top: 40px;
        transition: color 300ms;
    }

    #submit:focus {
        color: #f2f2f2;
    }

    #submit:active {
        color: #d0d0d2;
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
                style="background-image: url('theme/client/images/post/post-3.jpg'); background-size: cover;
            background-position: center; 
            background-repeat: no-repeat;">
                <div class="login" style="font-size: 35px">Đăng Ký</div>
                <div class="eula" style="padding-top: 80px">Bạn đã có tài khoản <a href="{{ route('login') }}"
                        style="text-decoration: none">Đăng Nhập
                        ngay</a>
                </div>
            </div>
            <div class="right">

                <div class="form">
                    <form action="{{ route('postRegister') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @csrf
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" id="">
                        <label for="">User Name</label>
                        <input type="text" name="username" id="">
                        <label for="">Email</label>
                        <input type="email" name="email" id="">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                        <label for="">Avatar</label>
                        <input type="file" name="avatar" id="">

                        <input type="submit" id="submit" value="Submit">
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>

{{--  --}}
