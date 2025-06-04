@extends('layouts.admin')

@section('extraCSS')
    
    <style>
        .main-ticket{
            width: 100%;
            background-color: #fff;
            border-radius: 15px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem
        }

        .main-ticket .main-modal{
            width: 80%;
            border-radius: 15px;
            background-color: transparent;
            padding: 0.4rem;
            transition: 0.3s ease;  
            border: 2px solid #ff7ea7;
        }

        .main-ticket .main-modal:hover{
            transform: scaleX(1.1);
        }

        .main-ticket .main-modal.estado-completado {
            background-color: #ff7ea7 !important;
            color: #fff; 
        }

        /* Asegura que el backdrop esté arriba */
        .modal-backdrop {
            z-index: 1050 !important;
        }

        /* Asegura que el modal esté arriba del backdrop y del slider */
        .modal {
            z-index: 99999 !important;
        }

        /* Asegura que el contenido del modal también esté al frente */
        .modal-dialog {
            z-index: 1061 !important;
        }



    </style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="main-ticket">
        <h1>Tickets</h1>
        <hr>

        <div class="filter-container mb-3" >
            <label for="estadoFiltro">Filtrar por estado:</label>
            <select id="estadoFiltro" class="form-control" onchange="filtrarTickets()">
                <option value="todos">Todos</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Completado">Completado</option>
            </select>
        </div>


       @foreach ($ticket as $t)
            @php
                $usuario = $users->find($t->usuario);
                $ubicacion = $ubi->find($t->lugar);
                $productos = json_decode($t->productos, true);
            @endphp


            <button type="button" class="main-modal {{ $t->estado === 'Completado' ? 'estado-completado' : '' }}" data-estado="{{ $t->estado }}" data-toggle="modal" data-target="#modalTicket{{ $t->id }}">
                {{ $t->ticket }}
            </button>


            <div class="modal fade" id="modalTicket{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $t->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{ route('seccion.updateEstado', $t->id) }}" method="POST" class="modal-content">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Ticket: {{ $t->ticket }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><b>Nombre del usuario:</b> {{ $usuario ? $usuario->name : 'Desconocido' }}</p>
                            <p><b>Teléfono:</b> {{ $usuario ? $usuario->telefono : 'Desconocido' }}</p>

                            <p><b>Productos:</b></p>
                            @if ($productos && count($productos) > 0)
                                <ul>
                                    @foreach ($productos as $producto)
                                        <li>
                                            <strong>{{ $producto['name'] }}</strong><br>
                                            Talla: {{ $producto['talla'] }}<br>
                                            Precio: ${{ number_format($producto['precio'], 2) }}<br>
                                            Cantidad: {{ $producto['cantidad'] }}<br>
                                            Subtotal: ${{ number_format($producto['subtotal'], 2) }}
                                        </li>
                                        <hr>
                                    @endforeach
                                </ul>
                            @else
                                <p>No hay productos disponibles.</p>
                            @endif

                            <p><b>Lugar de entrega:</b> {{ $ubicacion ? $ubicacion->nombre : 'Ubicación desconocida' }}</p>
                            <p><b>Total:</b> ${{ number_format($t->total, 2) }}</p>

                            <div class="form-group">
                                <label for="estado">Estado del ticket:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="Pendiente" {{ $t->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="Completado" {{ $t->estado === 'Completado' ? 'selected' : '' }}>Completado</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

    </div>

@endsection

@section('extraJS')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function filtrarTickets() {
            const filtro = document.getElementById('estadoFiltro').value;
            const tickets = document.querySelectorAll('.main-modal');

            tickets.forEach(ticket => {
                const estado = ticket.getAttribute('data-estado');
                if (filtro === 'todos' || estado === filtro) {
                    ticket.style.display = 'inline-block';
                } else {
                    ticket.style.display = 'none';
                }
            });
        }
    </script>



@endsection