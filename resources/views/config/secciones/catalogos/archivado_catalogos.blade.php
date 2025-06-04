@extends('layouts.admin')

@section('extraCSS')
<style>
        
    body { 
        background-color: #FF6F61  !important; 
    }

</style>
<style>

    .imagen-categoria {
        position: relative;
        display: block;
    }

    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .col-1:hover .overlay {
        opacity: 1;
        visibility: visible;
    }

    .btn-outlinea {
        background-color: rgba(255, 255, 255, 0.8); 
        border: 1px solid #ddd; 
    }

    .imagen-categoria {
        width: 100%;
        height: 3rem;
    }

    .portada-catalogo {
        width: 100%;
        height: 3rem;
        transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Ajustar la duración y función de temporización */
        position: relative;
        z-index: 1;
    }

    .portada-catalogo:hover {
        transform: scale(1.6); /* Efecto de zoom */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Añadir sombra */
        z-index: 10; /* Asegurar que la imagen esté encima de otros elementos */
    }

</style>

<style>

    .switch-visible {
        background-color: #E5E7EB !important;
        border: 1px solid rgb(146, 144, 144) !important;
    }

    .switch-visible:checked {
        background-color: #9CA3AF !important;
        border: 1px solid rgb(146, 144, 144) !important;
    }

    .switch-inicio {
        background-color: #FEF3C7 !important;
        border: 1px solid rgb(146, 144, 144) !important;
    }

    .switch-inicio:checked {
        background-color: #FCD34D !important;
        border: 1px solid rgb(146, 144, 144) !important;
    }

</style>

<script>
    
    toastr.options = {
        "progressBar": true,   
    }

</script>

    <style>
        .file-upload input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-upload label {
            display: inline-block;
            background-color: #00000031;
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: normal;
              /* opacity: 80%; */
        }

        .file-upload input[type="file"] + label:before {
            content: "\f07b";
            font-family: "Font Awesome 5 Free";
            font-size: 16px;
            margin-right: 5px;
            transition: all 0.5s;
        }

        .file-upload input[type="file"] + label {
            transition: all 0.5s;
        }

                    
        
        .file-upload input[type="file"]:focus + label,
        .file-upload input[type="file"] + label:hover {
                    backdrop-filter: blur(5px);
                    background-color: #41464a37;
                    opacity: 100%;
                    transition: all 0.5s;
                    }
  

    </style>
@endsection

@section('content')

<div class="row mt-5" >
    <div class="col">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="row">
                    <a href="{{ route('seccion.show', ['slug' => 'catalogo']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto w-50"><i class="fa fa-reply"></i> Regresar</a>
                </div>
            </div>
            <div class="col-lg-6 col-12 mt-4">
                <div class="row">
                    <div class="col text-center fs-1 fw-bolder">
                        Productos Eliminados
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-3 mb-5 px-0">
    <div class="row">
        <div class="col">
            <div class="row mb-2">
                <div class="col-lg-6 col-12">
                    {{-- <button class="btn btn-dark fs-5 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Administrar categorías del catálogo</button> --}}
                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-2 px-0">
                    <input class="form-control shadow-none" id="myInput" type="text" placeholder="Filtrar por nombre o catálogo">
                </div>
            </div>
            <div class="row">
                <div class="col px-0">
                    <div class="alert alert-warning" role="alert">
                        En caso de no ser posible recuperar un producto o no sea posible presionar los botones, se debe a que el catálogo al que pertenece esta desactivado, es necesario que el catálogo este activado para eliminar o activar un producto.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card bg-dark text-white fs-bolder text-center py-1 col-12 mt-md-0 mt-1">
                    <div class="row">
                        <div class="col-md-1 col-12 position-relative">   
                            <i class="bi bi-camera"></i>
                        </div>
                        <div class="col-md-3 col-12 d-flex align-items-center justify-content-start">
                            Categoría
                        </div>
                        <div class="col-lg-4 col-12 d-flex align-items-center justify-content-start">
                            Catálogo
                        </div>
                        <div class="col-lg-4 col-12 ">               
                            <div class="row">
                                <div class="col-6 text-center">
                                    {{-- Eliminar --}}
                                </div>
                                <div class="col-6 text-center">
                                    {{-- Recuperar --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="myList">
                @foreach ($catalogos as $cata)
                    <div class="card col-12 mt-md-0 mt-1">
                        <div class="row">
                            <div class="col-md-1 col-12 position-relative">   
                                <img src="{{ asset('img/photos/catalogo/'.$cata->portada) }}" alt="" class="img-fluid portada-catalogo">
                            </div>
                            <div class="col-md-3 col-12 d-flex align-items-center justify-content-start">
                                {{ $cata->categoria->categoria }}
                                @if ($cata->categoria->activo == 0)
                                    <span class="badge ms-auto text-bg-danger">Desactivada</span>
                                @else
                                    <span class="badge ms-auto text-bg-success">Activa</span>
                                @endif
                            </div>
                            <div class="col-lg-4 col-12 d-flex align-items-center justify-content-start">
                                {{ $cata->nombre }}
                            </div>
                            <div class="col-lg-4 col-12"> 
                                <div class="row py-2">
                                    <div class="col-6 text-center">
                                        <form action="{{ route('catalogo.catalogo.destroy', $cata->id) }}" method="POST" style="display:inline;" id="formel-{{ $cata->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-eliminar-catalogo rounded-0 w-100" @if($cata->categoria->activo == 0) disabled @endif>
                                                <i class="bi bi-heartbreak-fill"></i> Eliminar
                                            </button>
                                        </form>                                        
                                    </div>
                                    <div class="col-6 text-center">
                                        <form action="{{ route('catalogo.catalogo.activate', $cata->id) }}" method="POST" style="display:inline;" id="formac-{{ $cata->id }}">
                                            @csrf
                                            @method('POST')
                                            <button type="button" class="btn btn-success btn-activar-catalogo rounded-0 w-100" @if($cata->categoria->activo == 0) disabled @endif>
                                                <i class="bi bi-heart-pulse-fill"></i> Recuperar
                                            </button>
                                        </form>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-3" id="noResultsMessage" style="display: none;">
                <div class="col-12 text-center">
                    <div class="alert alert-danger">
                        No hay catálogos/productos con ese nombre.
                    </div>
                </div>
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
            $("#myList .card").filter(function() {
                var match = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(match);
                if (match) {    
                    hasVisible = true;
                }
            });
            $("#noResultsMessage").toggle(!hasVisible);
        });


        $('.btn-eliminar-catalogo').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var url = form.attr('action');
            
            Swal.fire({
                title: '¿Estás seguro de que deseas eliminar este producto?',
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
                                    'El producto ha sido eliminado.',
                                    'success'
                                ).then(() => {
                                    form.closest('.card').remove();
                                });
                            } else {
                                toastr.error(response.message);
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al eliminar el producto.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            toastr.error('No se pudo eliminar el producto.');
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al eliminar el producto.',
                                'error'
                            );
                        }
                    });
                }
            });
        });



        $('.btn-activar-catalogo').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var url = form.attr('action');
            
            Swal.fire({
                title: '¿Estás seguro de que deseas recuperar este producto?',
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
                                    'Recuperado!',
                                    'Este producto ha sido reactivado.',
                                    'success'
                                ).then(() => {
                                    form.closest('.card').remove();
                                });
                            } else {
                                toastr.error(response.message);
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al intentar recuperar el producto.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            toastr.error('No se pudo activar el producto.');
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al activar el producto.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    $(function() {
        $('img.lazy-load').each(function() {
            $(this).attr('data-src', $(this).attr('src'));
            $(this).removeAttr('src');
        });
    
        $(window).on('scroll', function() {
            $('img.lazy-load').each(function() {
                if ($(this).offset().top < $(window).scrollTop() + $(window).height()) {
                    $(this).attr('src', $(this).data('src'));
                }
            });
        });
    });
</script>

@endsection
