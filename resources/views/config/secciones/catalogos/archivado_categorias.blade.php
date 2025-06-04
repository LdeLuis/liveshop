@extends('layouts.admin')

@section('extraCSS')

    <style>

        body { 
            background-color: #FF6F61  !important; 
        }

        .icono-categoria {
            height: 20rem;
            width: 100%;
            object-fit: contain;
        }

    </style>

@endsection

@section('content')
    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('seccion.show', ['slug' => 'catalogo']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            @foreach ($categorias as $cate)
                @if ($cate->activo == 0)
                    <div class="col-3" id="categoria-{{ $cate->id }}">
                        <div class="card">
                            <img src="{{ asset('img/photos/categorias/'.$cate->portada) }}" alt="Imagen Categoria" class="img-fluid icono-categoria">
                            <div class="card-body">
                                {{ $cate->categoria }}
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-success w-100 active-button" data-id="{{ $cate->id }}"><i class="bi bi-heart"></i> Activar</button>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-danger w-100 delete-button" data-id="{{ $cate->id }}"><i class="bi bi-trash"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('extraJS')

<script>

    $(document).ready(function() {
        $('.delete-button').on('click', function() {
            var id = $(this).data('id'); // Obtener el ID de la categoría desde el atributo data-id

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('categorias.destroy', ['categoria' => '__ID__']) }}".replace('__ID__', id),
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}" // Agregar el token CSRF para la solicitud
                        },
                        success: function(response) {
                            if (response.success) {
                                // Eliminar el elemento de la vista
                                $('#categoria-' + id).remove();
                                Swal.fire(
                                    'Eliminado',
                                    response.message,
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error',
                                    'Hubo un error al eliminar el producto.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Mostrar errores en la consola
                            Swal.fire(
                                'Error',
                                'Hubo un error al eliminar el producto.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $('.active-button').on('click', function() {
            var id = $(this).data('id'); // Obtener el ID de la producto desde el atributo data-id

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Los productos pertenecientes a este catálogo serán recuperados!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, recuperar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('categorias.activate', ['categoria' => '__ID__']) }}".replace('__ID__', id),
                        type: 'PATCH',
                        data: {
                            _token: "{{ csrf_token() }}" // Agregar el token CSRF para la solicitud
                        },
                        success: function(response) {
                            if (response.success) {
                                // Eliminar el elemento de la vista
                                $('#categoria-' + id).remove();
                                Swal.fire(
                                    'productos recuperados',
                                    response.message,
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error',
                                    'Hubo un error al recuperar el catálogo.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Mostrar errores en el consola
                            Swal.fire(
                                'Error',
                                'Hubo un error al recuperar el catálogo.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

    });

</script>

@endsection
