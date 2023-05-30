<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <form action="{{route('updateUser')}}" method="POST">
            @csrf
            <div>
                <label>Fullname</label>
                <input type="text" name="fullname" value="{{$user->fullname}}">
            </div>
            <div>
                <label>Phone</label>
                <input type="text" name="phone" value="{{$user->phone}}">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{$user->email}}">
            </div>
            <div>
                <input type="hidden" name="id" value="{{$user->id}}">
                <button type="submit">Actualizar</button>
            </div>

        </form>
    </div>

</body>
</html>
