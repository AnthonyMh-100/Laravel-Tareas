<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Registrate</h1>
            @csrf
            <div>
                <label for="">Fullname</label>
                <input type="text" name="fullname">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="text" name="phone">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="">Passowrd</label>
                <input type="password" name="password">
            </div>
            <div class="file-input-container">
                <input type="file" id="file-input" class="inputfile" name="img" onchange="displayFileName()" />
                <label for="file-input" class="file-input-label">
                  <span class="file-input-icon"><i class="fas fa-upload"></i></span>
                  <span class="file-input-text">Seleccionar archivo</span>
                  <span id="file-name" class="file-name"></span>
                </label>
              </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>
