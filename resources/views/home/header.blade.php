<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Header</title>
</head>
<body>
    <div class="container">
        <main class="menu">
            <div class="div1">
             <h1 style="color: #fff">MIS TAREAS</h1>
            </div>
            <div class="div2">
                <ul>
                    <li><a href="{{route('viewHeader')}}">Tareas</a></li>
                    <li><a href="{{route('viewUser')}}">Usuarios</a></li>
                  </ul>
            </div>
            <div class="div3">
                <img class="img" src="{{ asset(Auth::user()->img)}}">
                <h3 style="color: #fff">{{Auth::user()->fullname}}</h3>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><img src="{{asset('img/bx-power-off.svg')}}" alt="" srcset=""></button>
                </form>
            </div>
        </main>
        {{--  CREACION DE MODAL  --}}
        <div class="modal-tarea">
            <div class="modal">
                <form action="{{route('addTarea')}}" method="POST" enctype="multipart/form-data">
                    <h1>AÑADIR TAREA</h1>
                    @csrf
                <div>
                    <label for="">Tarea</label>
                    <input type="text" name="tarea">
                </div>
                <div>
                    <label for="file-upload" class="custom-file-upload">
                        <i class="fas fa-cloud-upload-alt"></i> Subir archivo
                      </label>
                      <input id="file-upload" type="file" name="archivo"/>
                </div>
                <div>
                    <label for="">Comentario</label>
                    <textarea name="comentario" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <button type="submit">Agregar</button>
                </div>
                <div>
                    <button  class="btn-close">Cerrar</button>

                </div>
                </form>
            </div>
        </div>
{{--  FINAL DEL MODAL  --}}
        <div class="container-box">
            <div class="add">
                <h1>Listado de Tareas</h1>
                <p>Tener un lista de tareas en muy importate no olvidar las actividades que tienes que realizar en tu vida
                    cotidiana y evitar la procrastinacion.
                </p>
                <button class="btn-add">Nueva Tarea</button>
            </div>
            @if (session('status'))
            <script>
                Swal.fire(
                    'Exito!',
                    'Tarea Agregada Satisfactoriamente',
                    'success'
                  )
            </script>
            @endif

            <div class="container-tareas">
                @if (count($tareas) === 0)
                    <h1>No Tienes Tareas {{Auth::user()->fullname}}</h1>

                @else
                @foreach ( $tareas as $tarea)

                <div class="box-tarea">
                   <span class="span1">{{$tarea->tarea}}</span>
                   <span class="span2">
                    <p>{{$tarea->comentario}}</p>
                    <a href="{{asset($tarea->archivo)}}" target="_blank">VER DOC</a>
                   </span>
                   <span class="span3">
                    <p>FECHA</p>
                    <p>{{$tarea->fecha}}</p>
                     <form action="{{route('deleteTarea')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$tarea->id}}">
                        <button type="submit"><img src="{{ asset('img/bx-trash.svg') }}" alt="" srcset=""></button>
                    </form>
                   </span>
                </div>
                @endforeach
                @endif
            </div>
        </div>



        </div>

        <script src="{{asset('js/main.js')}}"></script>

        </body>
        </html>
