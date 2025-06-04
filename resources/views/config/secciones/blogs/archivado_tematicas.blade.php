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
                Temáticas
            </div>
        </div>

        <div class="row mt-5" id="myList">
            @foreach ($tematicas as $tematica)
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4 blog-tematica" data-tematica-id="{{ $tematica->tematica_id }}">
                    <div class="card">
                        <div class="card-body card-title text-center fs-1">
                            {{ $tematica->tematica }}
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('tematicas.activate', ['tematica' => $tematica->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="btn btn-success w-100 btn-activar-tematica">Recuperar</button> 
                            </form>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('tematicas.destroy', ['tematica' => $tematica->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger w-100 btn-eliminar-tematica">Eliminar</button> 
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
        $('.btn-eliminar-tematica').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var url = form.attr('action');

            Swal.fire({
                title: '¿Estás seguro de que deseas eliminar esta temática?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarla!'
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
                                    'Eliminada!',
                                    'La temática ha sido eliminada.',
                                    'success'
                                ).then(() => {
                                    form.closest('.blog-tematica').remove();
                                    adjustCardLayout();
                                });
                            } else {
                                toastr.error(response.message);
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al eliminar la temática.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            toastr.error('No se pudo eliminar la temática.');
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al eliminar la temática.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $('.btn-activar-tematica').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var url = form.attr('action');

            Swal.fire({
                title: '¿Estás seguro de que deseas activar esta temática?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, activarla!'
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
                                    'Activada!',
                                    'La temática ha sido activada.',
                                    'success'
                                ).then(() => {
                                    form.closest('.blog-tematica').remove();
                                    adjustCardLayout();
                                });
                            } else {
                                toastr.error(response.message);
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al activar la temática.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            toastr.error('No se pudo activar la temática.');
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al activar la temática.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        function adjustCardLayout() {
            var $blogItems = $('.blog-tematica');
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
