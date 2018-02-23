@extends('layouts.adminapp')

<link href="{{ asset('css/estilosadmin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet" type="text/css">

@section('content')
    <h2 class="titulo">Panel de administración de usuarios</h2>

    <div id="gestorTabla">

        <table align="center" id="tabla" class="table">
            <tr class="cabecera">
                <th class="contenidoCabecera">Nombre</th>
                <th class="contenidoCabecera">Correo electrónico</th>
                <th class="contenidoCabecera">Eliminar</th>
                <th class="contenidoCabecera">Editar</th>
                <th class="contenidoCabecera">Confirmado</th>
            </tr>
            @foreach($usuarios as $key => $data)
                <tr>
                    <td class="contenidoTabla">{{ $data->name }}</td>
                    <td class="contenidoTabla">{{ $data->email }}</td>
                    <td class="contenidoTabla"><a id="eliminar" data-toggle="modal" data-target="#myModal" class="boton eliminar">Eliminar</a></td>
                    <td class="contenidoTabla"><a href="{{ url('admin/EditarUsuario/'.$data->id) }}" class="boton editar">Editar</a></td>
                    <td class="contenidoTabla" id="confirmacion">
                        @if($data -> verified == 0)
                            <img src="../images/x_no.png" />
                        @else
                            <img src="../images/tick_si.png" />
                        @endif
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Contenido del modal -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar borrar usuario</h4>
                            </div>
                            <div class="modal-body">
                                <center>¿Borrar usuario?</center>
                                <a href="adminEliminarUsuario/{{ $data -> id }}" class="boton eliminar">Sí</a>
                                <a class="boton cerrar" data-dismiss="modal">No</a>
                            </div>
                        </div>
                        <!-- /Contenido del modal -->
                        <!--  -->
                    </div>
                </div>
                <!-- /Modal -->
        @endforeach
        </table>

    </div>
@endsection