<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="{{route('userLogin')}}" method="post">
            <h1>Login</h1>
            @csrf
            <div>
                <label for="">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="">Passowrd</label>
                <input type="password" name="password">
            </div>
            <div>
                <button type="submit">Ingersar</button>
            </div>
             @if(session('msg'))
             <div>
                {{session('msg')}}
             </div>
             @endif
            <div class="div1">
                <a href="http://127.0.0.1:8000/login-google">LOGIN WITH GOOGLE</a>
            </div>
            <div class="div2">
                <a href="http://127.0.0.1:8000/register">REGISTER USER</a>
            </div>

        </form>


    </div>
</body>
</html>
