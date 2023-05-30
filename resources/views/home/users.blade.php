<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/users.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Header</title>
</head>
<body>
    <div class="container">
        <main class="menu">
            <div class="div1">
             <h1>MIS USUARIOS</h1>
            </div>
            <div class="div2">
                <ul>
                    <li><a href="{{route('viewHeader')}}">Tareas</a></li>
                    <li><a href="{{route('viewUser')}}">Usuarios</a></li>
                  </ul>
            </div>
            <div class="div3">
                <img class="img" src="{{ asset(Auth::user()->img)}}">
                <h3>{{Auth::user()->fullname}}</h3>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><img src="{{asset('img/bx-power-off.svg')}}" alt="" srcset=""></button>
                </form>
            </div>
        </main>
         <div class="container-box">
           <table class="table">
            <thead>
               <tr>
                 <th>Fullname</th>
                 <th>Phone</th>
                 <th>Email</th>
                 <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @if(empty($users))
                   <h1>No hay Registro de usuarios</h1>
                @endif
                @foreach($users as $user)
                <tr>
                    <td>{{$user->fullname}}</td>
                    <td>
                        {{ isset($user->phone)? $user->phone : "No hay Telefono"}}
                    </td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('editUser',['id_edit'=>$user->id])}}"><img src="{{asset('img/bx-edit-alt.svg')}}"></a>
                        <a href="{{route('deleteUser',['id'=>$user->id])}}"><img src="{{asset('img/bx-trash.svg')}}"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
         </div>




        </div>

        <script src="{{asset('js/main.js')}}"></script>

        </body>
        </html>



