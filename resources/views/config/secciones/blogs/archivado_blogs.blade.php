@extends('layouts.admin')

@section('extraCSS')

   <style>
        body { 
            background-color: #FF6F61  !important; 
        }
   </style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('seccion.show', ['slug' => 'blogs']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-6 text-center ms-auto fs-1 fw-bolder">
                Blogs
            </div>
        </div>
     
        <div class="row">
            <div class="col">
                <div class="input-group py-3">
                    <span class="input-group-text bg-dark text-white" id="basic-addon1">Buscar blog</span>
                    <input class="form-control shadow-none" id="myInput" type="text" placeholder="Filtrar blogs por título" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col px-0">
                <div class="alert alert-warning" role="alert">
                    En caso de no ser posible recuperar un post o no sea posible presionar los botones, se debe a que la temática a la que pertenece dicho blog está desactivada. Es necesario que la temática esté activada para eliminar o activar un blog.
                </div>
            </div>
        </div>
        <div class="row mt-5" id="myList">
            @foreach ($blogs as $blog)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 blog-item position-relative" data-tematica-id="{{ $blog->tematica_id }}">
                    <div class="card">
                        <img src="{{ asset('img/photos/backgrounds/bg-13.jpg') }}" alt="" class="img-fluid portada-blog">
                        <div class="card-body card-title text-center">
                            {{ $blog->titulo }}
                        </div>
                        <div class="card-header card-title text-center position-relative">
                            {{ $blog->tematica->tematica }}
                            <span class="badge position-absolute top-0 start-0 {{ ($blog->tematica->activo == 1) ? 'text-bg-success' : 'text-bg-danger' }}">
                                {{ ($blog->tematica->activo == 1) ? 'Activada' : 'Desactivada' }}
                            </span>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('blogs.activate', ['blog' => $blog->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="btn btn-success w-100 btn-activar-blog @if($blog->tematica->activo == 0) disabled @endif">Recuperar</button> 
                            </form>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger w-100 btn-eliminar-blog @if($blog->tematica->activo == 0) disabled @endif">Eliminar</button> 
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

        $('.btn-eliminar-blog').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var url = form.attr('action');

            Swal.fire({
                title: '¿Estás seguro de que deseas eliminar este blog?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message);
                                Swal.fire(
                                    'Eliminado!',
                                    'El blog ha sido eliminado.',
                                    'success'
                                ).then(() => {
                                    form.closest('.blog-item').remove(); // Eliminar el elemento del DOM
                                    adjustCardLayout(); // Ajustar el layout de las tarjetas
                                });
                            } else {
                                toastr.error(response.message);
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al eliminar el blog.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            toastr.error('No se pudo eliminar el blog.');
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al eliminar el blog.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $('.btn-activar-blog').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var url = form.attr('action');

            Swal.fire({
                title: '¿Estás seguro de que deseas activar este blog?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, activarlo!'
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
                                    'Activado!',
                                    'El blog ha sido activado.',
                                    'success'
                                ).then(() => {
                                    form.closest('.blog-item').remove(); // Eliminar el elemento del DOM
                                    adjustCardLayout(); // Ajustar el layout de las tarjetas
                                });
                            } else {
                                toastr.error(response.message);
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al activar el blog.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            toastr.error('No se pudo activar el blog.');
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al activar el blog.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        function adjustCardLayout() {
            var $blogItems = $('.blog-item');
            $blogItems.each(function(index, item) {
                $(item).removeClass('first last'); 
                var colIndex = index % 4;
                if (colIndex === 0) {
                    $(item).addClass('first');
                } else if (colIndex === 3) {
                    $(item).addClass('last');
                }
            });
        }
    </script>

@endsection
