@extends('layouts.admin')

@section('extraCSS')

<style>

    .back-vacantes{
        width: 100%;
    }
    .back-vacantes h1{
        color: black;
        font-weight: 900;
        
    }

    .back-vacantes .tabla-main{
        width: 100%;
        display: flex;
        flex-direction: column;
        gap:0;
        margin-bottom: 5rem;
    }

    .back-vacantes .tabla-main h2{
        width: 100%;
        color: white;
        background-color: black;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        text-align: center;
        margin: 0;
    }

    .back-vacantes .tabla-main .nombres{
        width: 100%;
        height: 2rem;
        display: flex;
        flex-direction: row;
        border: 2px solid black;
        margin: 0;
        background-color: #1171B8;
        color: #fff
    }

    .back-vacantes .tabla-main .nombres .imagen{
        width: 15%;
        height: 100%;
        border-right: 2px solid black;
        text-align: center;
    }

    .back-vacantes .tabla-main .nombres .nombre{
        width: 55%;
        height: 100%;
        border-right: 2px solid black;
        text-align: center;
        
    }

    .back-vacantes .tabla-main .nombres .botones{
        width: 10%;
        height: 100%;
        border-right: 2px solid black;
        text-align: center;
    }
    .back-vacantes .tabla-main .nombres .botones:last-child{
        border-right: none;
    }

    .back-vacantes .tabla-main .informacion{
        width: 100%;
        height: 7rem;
        display: flex;
        flex-direction: row;
        border: 2px solid black;
        margin: 0;
    }

    .back-vacantes .tabla-main .informacion img{
        width: 15%;
        height: 100%;
        border-right: 2px solid black;
        object-fit: cover;
    }

    .back-vacantes .tabla-main .informacion p{
        width: 55%;
        height: 100%;
        border-right: 2px solid black;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .back-vacantes .tabla-main .informacion .bot-main{
        width: 10%;
        height: 100%;
        border-right: 2px solid black;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .back-vacantes .tabla-main .informacion .bot-main:last-child{
        border-right: none; 
    }

    .back-vacantes .tabla-main .informacion .bot-main a i{
        background-color: #1171B8;
        color: #fff;
        font-size: 1.5rem;
        padding: 1rem;
        border-radius: 15px;
    }

    .back-vacantes .tabla-main .informacion .bot-main .estilo{
        background-color: red;
        color: #fff;
        font-size: 1rem;
        padding: 1rem 1.3rem;
        border-radius: 15px;
    }
   
    .switch-visible {
        background-color: #E5E7EB !important;
        border: 1px solid rgb(146, 144, 144) !important;
    }

    .switch-visible:checked {
        background-color: #1171B8 !important;
        border: 1px solid rgb(146, 144, 144) !important;
    }

</style>

@endsection

@section('content')  

<div class="row mt-5 mb-4 px-2">
    <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
</div>
    
<section class="back-vacantes">
    <h1>Catálogo</h1>

    <div class="d-flex flex-lg-12 flex-column text-center">
        <div class="col-lg-12 mb-5">
            <h4 style="color: black">Nuevo producto</h4>
            <button style="background: none; border: none; color: black;" type="button" class="btn btn-primary"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-circle-plus" style="font-size: 2.5rem;"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade"  id="exampleModal" style="padding-top: 3rem;" data-bs-backdrop="false" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex col-12 flec-column">
                                <div class="col-12">
                                    <form action="{{ route('seccion.agregar_seccion_2') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    
                                        {{-- Nombre del Producto --}}
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre del Producto:</label>
                                            <input type="text" name="nombre" class="form-control" id="nombre" required>
                                        </div>
                                    
                                        {{-- Precio --}}
                                        <div class="mb-3">
                                            <label for="precio" class="form-label">Precio:</label>
                                            <input type="number" name="precio" class="form-control" id="precio" step="0.01" required>
                                        </div>
                                    
                                        {{-- Descripción --}}
                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label">Descripción:</label>
                                            <textarea class="form-control" name="descripcion" id="descripcion" rows="5" required></textarea>
                                        </div>
                                    
                                        {{-- Tipo de Producto --}}
                                        <div class="mb-3">
                                            <label for="tipo" class="form-label">Tipo de Producto:</label>
                                            <select name="tipo" class="form-control" id="tipo" required>
                                                <option value="">Selecciona una opción</option>
                                                {{-- <option value="liveshopping">Liveshopping</option> --}}
                                                <option value="ropa mujer">Ropa Mujer</option>
                                                <option value="ropa caballero">Ropa Caballero</option>
                                                <option value="ninos">Niños</option>
                                                <option value="accesorios">Accesorios</option>
                                                <option value="hogar">Hogar</option>
                                            </select>
                                        </div>
                                    
                                        {{-- Imágenes (múltiples) --}}
                                        <div class="mb-3">
                                            <label for="imagenes" class="form-label">Imágenes del Producto:</label>
                                            <input type="file" name="imagenes[]" class="form-control" id="imagenes" multiple required>
                                        </div>
                                    
                                        {{-- Tallas Dinámicas --}}
                                        <div class="mb-3">
                                            <label class="form-label">Tallas y Cantidades:</label>
                                            <div id="tallasContainer">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="tallas[0][talla]" class="form-control" placeholder="Talla" >
                                                    <input type="number" name="tallas[0][cantidad]" class="form-control" placeholder="Cantidad" >
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="agregarTalla()">Agregar otra talla</button>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="tabla-main">
        <h2>Productos</h2>
        <div class="nombres">
            <p class="imagen">Imagen</p>
            <p class="nombre">Nombre</p>
            <p class="botones">Visible</p>
            <p class="botones">Mostrar</p>
            <p class="botones">Borrar</p>
        </div>
        @foreach ($catalogos as $c)
            @if ($c->imagenes->isNotEmpty()) <!-- Verifica que haya al menos una imagen -->
                <div class="informacion">
                    <!-- Mostrar la primera imagen -->
                    <img src="{{ asset('img/photos/catalogo/' . $c->imagenes->first()->imagen) }}" alt="{{ $c->nombre }}">
                    <p>{{ $c->nombre }}</p>

                    <div class="bot-main">
                        <div class="form-check form-switch row">
                            <div class="col-12 d-flex align-items-center justify-content-center p-0 m-0 text-center">
                                <input class="form-check-input switch-color-inicio switch_visible fs-3 shadow-none rounded-0" role="switch" id="switch_visible-{{ $c->id }}" data-id="{{ $c->id }}" data-campo="visible" type="checkbox" @if ($c->visible == 1) checked @endif>
                            </div>
                        </div>
                        <script>
                            $('#switch_visible-' + {{ $c->id }}).change(function(e) {
                                var checkbox = $(this);
                                console.log('switch-' + {{ $c->id }});
                                var check = 0;
                                if (checkbox.prop('checked')) {
                                    check = 1;
                                } else {
                                    check = 2;
                                }
                                console.log(check);
                                var id = checkbox.attr("data-id");
                                var tcsrf = $('meta[name="csrf-token"]').attr('content');
                                var valor = check;
                                var URL = "{{ route('ajax.switch_visible') }}";
                                console.log("valor: " + valor);
                                $.ajax({
                                        url: URL,
                                        type: 'post',
                                        dataType: 'json',
                                        data: {
                                            "_method": 'post',
                                            "_token": tcsrf,
                                            "id": id,
                                            "valor": valor
                                        }
                                    })
                                    .done(function(msg) {
                                        console.log(msg);
                                        if (msg.success) {
                                            toastr["success"](msg.mensaje);
                                            if (msg.mensaje.valor == 1) {
                                                checkbox.prop('checked', true);
                                            } else if (msg.mensaje.valor == 2) {
                                                checkbox.prop('checked', false);
                                            }
                                        } else {
                                            toastr["error"](msg.mensaje);
                                        }
                                    })
                                    .fail(function(msg) {
                                        toastr["error"]('Error al cambiar el estatus');
                                    });
                            });
                        </script>
                    </div>

                    <div class="bot-main">
                        <a href="{{route('catalogo.productos', $c->id)}}"><i class="fa-solid fa-plus"></i></a>
                    </div>

                    <div class="bot-main">
                        <form action="{{ route('catalogo.destroy', $c->id) }}" method="POST"
                            onsubmit="return confirm('¿Quieres eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash" style="font-size: 1rem;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach


    </div>

    
</section>

@endsection

@section('extraJS')

    <script>
        let contadorTallas = 1;

        function agregarTalla() {
            const container = document.getElementById('tallasContainer');
            const nuevaTalla = `
                <div class="input-group mb-2">
                    <input type="text" name="tallas[${contadorTallas}][talla]" class="form-control" placeholder="Talla">
                    <input type="number" name="tallas[${contadorTallas}][cantidad]" class="form-control" placeholder="Cantidad">
                </div>
            `;
            container.insertAdjacentHTML('beforeend', nuevaTalla);
            contadorTallas++;
        }
    </script>

@endsection
