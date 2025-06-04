@extends('layouts.admin')

@section('extraCSS')

    <style>
        .portada-blog {
            object-fit: contain;
            height: 16rem;
            width: 100%;
        }
    </style>

    <style>
        .fixed-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }

        .fixed-button2 {
            position: fixed;
            bottom: 60px;
            left: 20px;
            z-index: 1000;
        }
    </style>

@endsection

@section('content')
    <a href="{{ route('archivados.archivados.tematicas') }}" class="btn btn-danger fixed-button2">Temáticas archivadas</a>
    <a href="{{ route('archivados.archivados.blogs') }}" class="btn btn-danger fixed-button">Blogs archivados</a>

    <div class="row mt-5 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-6 text-center ms-auto fs-1 fw-bolder">
                Blogs
            </div>
        </div>
        <div class="row my-3">
            <div class="col-6 ms-auto">
                @if ($tematicas->isEmpty())
                    <button disabled class="btn btn-danger w-100 rounded-pill fs-5">No hay categorías para asignar a los posts</button>
                @else
                    <a href="{{ route('blogs.create') }}" class="btn btn-dark w-100 fs-5">Nuevo Blog <i class="bi bi-plus"></i></a>
                @endif
            </div>
        </div>
        <div class="row my-2">
            <div class="col position-relative border border-dark py-4 rounded">
                <div class="col position-absolute top-0 start-0 translate-middle">
                    <span class="badge bg-dark bg-text-primary fs-5">Categorías</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#modal-tematicas">
                            Administrar categorías de los blogs
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#modal-crear-tematica">
                            Nueva categoría <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group py-3">
                    <span class="input-group-text bg-dark text-white" id="basic-addon1">Buscar blog</span>
                    <input class="form-control shadow-none" id="myInput" type="text" placeholder="Filtrar blogs por titulo" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row mt-5" id="myList">
            @foreach ($blogs as $blog)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 blog-item" data-tematica-id="{{ $blog->tematica_id }}">
                    <div class="card">
                        <img src="{{ asset('img/photos/blogs/'.$blog->portada) }}" alt="" class="img-fluid portada-blog">
                        <div class="card-body card-title text-center">
                            {{ $blog->titulo }}
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('blogs.edit', ['blog' => $blog->id]) }}" class="btn btn-dark w-100">Modificar</a> 
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('blogs.deactivate', ['blog' => $blog->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="button" class="btn btn-danger w-100 btn-desactivar-blog">Eliminar</button> 
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div id="noResultsMessage" class="col-12 alert alert-danger text-center" style="display: none;">
                <p>No se encontraron resultados</p>
            </div>
        </div>
    </div>

    <div class="modal fade mt-4" id="modal-tematicas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-tematicasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-tematicasLabel">Lista de categorías</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach ($tematicas as $tematica)
                            <div class="col-12 position-relative py-2 rounded-0 card fw-bold">
                                {{ $tematica->tematica }}
                                <div class="col-2 border border-danger position-absolute top-50 end-0 translate-middle-y">
                                    {{-- <button class="btn btn-danger rounded-0 w-100 btn-desactivar-tematica"><i class="bi bi-trash"></i> Quitar</button> --}}
                                    <form action="{{ route('tematicas.deactivate', ['tematica' => $tematica->id]) }}" method="POST" class="form-deactivate-tematica" data-id="{{ $tematica->id }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" class="btn btn-danger w-100 px-1 btn-desactivar-tematica rounded-0">
                                            Quitar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger w-100 rounded-0" data-bs-dismiss="modal">Cancelar y salir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="modal-crear-tematica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-crear-tematicaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-crear-tematicaLabel">Crear Nueva categoría</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crear-tematica-form" class="py-2">
                        @csrf
                        <div class="row form-group">
                            <div class="col-12">
                                <input type="text" name="tematica_titulo" id="tematica_titulo" class="form-control shadow-none" placeholder="Temática">
                            </div>
                            {{-- <div class="col-1">
                                <input type="color" name="tematica_color" id="tematica_color" class="my-1" value="#7229A4">
                            </div> --}}
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="button" id="crear-tematica-btn" class="btn btn-success w-100 rounded-0">Crear categoría</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger w-100 rounded-0" data-bs-dismiss="modal">Cancelar y salir</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extraJS')
    
    <script>

        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                var hasVisible = false;
                $("#myList .blog-item").filter(function() {
                    var match = $(this).text().toLowerCase().indexOf(value) > -1;
                    $(this).toggle(match);
                    if (match) {    
                        hasVisible = true;
                    }
                });
                $("#noResultsMessage").toggle(!hasVisible);
            });
        });

    </script>

    <script>

        $(document).ready(function(){
            // Configurar el token CSRF para todas las solicitudes AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#crear-tematica-btn').on('click', function(event) {
                event.preventDefault(); // Evita la recarga de la página

                var formData = {
                    tematica_titulo: $('#tematica_titulo').val(),
                    tematica_color: $('#tematica_color').val()
                };

                $.ajax({
                    url: '{{ route('tematicas.store') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Temática creada con éxito',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Limpiar el formulario
                                    $('#tematica_titulo').val('');
                                    $('#tematica_color').val('#7229A4');
                                    $('#modal-crear-tematica').modal('hide');

                                    window.location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error al crear la temática',
                                confirmButtonText: 'Aceptar'
                            });
                            $('#modal-crear-tematica').modal('hide');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al crear la temática',
                            confirmButtonText: 'Aceptar'
                        });
                        $('#modal-crear-tematica').modal('hide');
                    }
                });
            });
        });

    </script>

    <script>

        $(document).ready(function(){
            $('.btn-desactivar-blog').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var url = form.attr('action');

                Swal.fire({
                    title: '¿Estás seguro de que deseas desactivar este blog?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, desactivarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'PATCH',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    Swal.fire(
                                        'Desactivado!',
                                        'El blog ha sido desactivado.',
                                        'success'
                                    ).then(() => {
                                        form.closest('.blog-item').remove(); // Eliminar el elemento del DOM
                                        adjustCardLayout(); // Ajustar el layout de las tarjetas
                                    });
                                } else {
                                    toastr.error(response.message);
                                    Swal.fire(
                                        'Error!',
                                        'Hubo un problema al desactivar el blog.',
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr) {
                                toastr.error('No se pudo desactivar el blog.');
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al desactivar el blog.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            function adjustCardLayout() {
                // Reajustar el layout después de eliminar una tarjeta
                var $blogItems = $('.blog-item');
                $blogItems.each(function(index, item) {
                    $(item).removeClass('first last'); // Eliminar clases de orden anteriores
                    var colIndex = index % 4;
                    if (colIndex === 0) {
                        $(item).addClass('first'); // Marcar primera tarjeta en la fila
                    } else if (colIndex === 3) {
                        $(item).addClass('last'); // Marcar última tarjeta en la fila
                    }
                });
            }
        });
        
    </script>

    <script>

        $(document).ready(function(){
            $('.btn-desactivar-tematica').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var categoryId = form.data('id');

                Swal.fire({
                    title: '¿Estás seguro de que deseas deshabilitar esta temática?',
                    text: "¡Todos los blogs asociados a esta temática también serán deshabilitados!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deshabilitar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: form.attr('action'),
                            type: 'PATCH',
                            data: form.serialize(),
                            success: function(response) {
                                if (response.success) {
                                    // Eliminar la temática del DOM
                                    form.closest('.card').remove();

                                    // Ocultar los blogs relacionados
                                    $('.blog-item[data-tematica-id="' + categoryId + '"]').remove();
                                    
                                    Swal.fire(
                                        'Deshabilitado!',
                                        'La temática y los blogs relacionados han sido deshabilitados.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'No se pudo deshabilitar la temática.',
                                        'error'
                                    );
                                }
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Error!',
                                    'Ocurrió un error. Intenta de nuevo más tarde.',
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


