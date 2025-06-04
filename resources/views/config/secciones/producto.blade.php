@extends('layouts.admin')

@section('extraCSS')

    <style>
        :root {
            --green: #00ae64;
            --green2: #039858;
            --pink: #feb8ce;
            --white: #fff;
            --blue: #2e4ef6;
        }

        .prod-main{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5rem 0 1rem 0;
        }

        .prod-main .c-blanco{
            width: 100%;
            min-height: 30rem;
            background-color: #fff;
            border-radius: 15px;
            display: flex;
            flex-direction: row;
        }


        .prod-main .c-blanco .contenido{
            width: 100%;
            padding: 1rem;
            display: flex;
            flex-direction: column ;

        }

        .prod-main .c-blanco .contenido .top-contenido{
            width: 100%;
            padding-top:1rem;
            display: flex;
            justify-content: space-between;
        }

        .prod-main .c-blanco .contenido .top-contenido p{
            color: var(--green);
            text-decoration:underline; 
            font-size: 1.2rem;
        }


        .prod-main .c-blanco .contenido .tallas,
        .prod-main .c-blanco .contenido .precio {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .prod-main .c-blanco .contenido .tallas div:first-child,
        .prod-main .c-blanco .contenido .precio div:first-child {
            width: 15%;
        }

        .prod-main .c-blanco .contenido .tallas div:first-child p,
        .prod-main .c-blanco .contenido .precio div:first-child p {
            color: var(--green);
            font-weight: bold;
            text-decoration: underline;
        }

        .prod-main .c-blanco .contenido .tallas div:last-child{
            width: 85%;
            display: flex;
            flex-direction: column;
        }

        .prod-main .c-blanco .contenido .tallas div:last-child .t-madida{
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-bottom: 1rem;
        }

        .prod-main .c-blanco .contenido .precio div:last-child {
            width: 85%;
            display: flex;
            flex-direction: row;
            gap: 8px;
        }

        .prod-main .c-blanco .contenido .imagen{
            width: 100%;
            min-height: 25rem;
            padding: 2rem 0;
            margin-top: 1rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .prod-main .c-blanco .contenido .imagen .imagen-content{
            width: 20%;
            display: flex;
            flex-direction: column; 
            justify-content: center;
        }

        .prod-main .c-blanco .contenido .imagen .imagen-content form{
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .prod-main .c-blanco .contenido .imagen .imagen-content form img{
            width: 100%;
            object-fit: contain;
        }

        .size-option,
        .size-option2 {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 14px;
            color: #666;
        }

        .size-option input,
        .size-option2 input {
            display: none;
        }

        .custom-radio {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background-color: #ccc;
            border: 2px solid #999;
            display: inline-block;
        }

        .size-option input:checked + .custom-radio,
        .size-option2 input:checked + .custom-radio {
            background-color: var(--green);
        }

        .prod-main .c-blanco .contenido .botones{
            width: 100%;
            padding: 2rem;
            display: flex;
            flex-direction: row;
            gap: 2rem;
        }

        .prod-main .c-blanco .contenido .botones a{
            
            text-decoration: none;
        }

        .prod-main .c-blanco .contenido .botones a p{
            height: 4rem;
            background-color: #ccc;
            border: 2px solid var(--green);
            padding: 1rem;
            width: 13rem;
            color: #999;
            text-align: center;
            border-radius: 10px;
        }

        .prod-main .c-blanco .contenido .botones .contador{
            height: 4rem;
            border: 2px dotted var(--green);
            padding: 1rem;
            width: 13rem;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .prod-main .c-blanco .contenido .botones .contador p{
            color: var(--green);
            text-align: center;
            font-size: 2rem;
            margin: 0;
        }

        .prod-main .c-blanco .contenido .estatus{
            width: 60%;
            height: 4rem;
            border: 2px solid var(--green);
            margin: 0 2rem;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .prod-main .c-blanco .contenido .estatus div{
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
        }

        .prod-main .c-blanco .contenido .estatus div .ico{
            width: 1.5rem;
        }

        .prod-main .c-blanco .contenido .estatus div p{
            margin: 0;
            padding: 0.5rem;
        }

        .informacion{
            width: 100%;
            min-height: 10rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .informacion .clic{
            width: 100%;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .informacion .clic .f-fondo{
            width: 3rem;
            height: 3rem;
            background-color: var(--green);
            padding: 1rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .informacion .clic .f-fondo img{
            width: 1.5rem;
        }

        .informacion .clic .t-info{
            min-width: 50%;
            height: 3rem;
            background-color: var(--green);
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .informacion .clic .t-info p{
            color: #fff;
            margin: 0;
            width: 100%;
            font-size: 1rem;
        }

        .informacion p{
            width: 60%;
            text-align: center;
            color: #7a7a7a;
        }

        .informacion .enlaces{
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap:2rem;
        }

        .informacion .enlaces a{
            color: var(--green);
            font-size: 1.1rem;
            font-weight: 900;
        }

        .final-info{
            width: 100%;
            min-height: 20rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .final-info .opciones{
            width: 100%;
            min-height: 8rem;
            border-radius: 15px;
            background-color: #fff;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .final-info .opciones .t-op{
            width: 32%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .final-info .opciones .t-op p{
            text-decoration: underline;
            font-weight: 900;
        }

        .final-info .opciones .t-op img{
            width: 60%;
            height: 90%;
            object-fit: contain;
        }

        .final-info .opciones .barra{
            width: 5px;
            height: 80%;
            border-radius: 15px;
            background-color: var(--green);
        }

        .tex-1{
            color: var(--green);
            text-decoration:underline; 
            font-size: 1.2rem;
            width: 50%;
            text-align: center;
        }

        .tex-2{
            color: var(--green);
            text-decoration:underline; 
            font-size: 1.2rem;
            width: 40%; 
            text-align: center;
        }

        .tex-3{
            padding: 0 2rem;
            font-size: 1.2rem;
            color: #666;
            margin:1rem 0;
            text-align: center;
        }

        .tex-4{
            width: 45%;
            padding: 0 2rem;
            color: black;
            text-align: center;
        }

        .tex-5{
            width: 60%;
            text-align: center;
            color: #7a7a7a;
            margin-top: 5rem;
        }

        .tex-6{
            color: #000;
            text-decoration: underline;
            font-weight: 600;
            width: 90%;
            height: 90%;
        }

    </style>

@endsection

@section('content')  

    <div class="row mt-5 mb-4 px-2" style="gap:2rem">
        <a href="{{ route('seccion.show', ['slug' => 'catalogo'])}}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i>
            Return</a>
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i>
            Admin</a>
    </div>

    {{--
     <input class="editarajax estilaxo tex-2" data-model="Catalogo" data-field="nombre" data-id="{{$categoria->id}}" type="text" value="{{$categoria->titulo}}">

    <textarea class="editarajax  estilaxo tex-3" data-model="Catalogo" data-field="descripcion" data-id="{{$categoria->id}}" name="" id="" cols="40" rows="10">{{$categoria->descripcion}}</textarea> 
    --}}

    
    <section class="prod-main">
        <div class="c-blanco">
            <div class="contenido">
                <div class="top-contenido">
                    <input class="editarajax estilaxo tex-1" data-model="Catalogo" data-field="nombre" data-id="{{$catalogo->id}}" type="text" value="{{$catalogo->nombre}}">
                    <input class="editarajax estilaxo tex-2"    data-model="Catalogo" data-field="precio" data-id="{{$catalogo->id}}" type="text" value="{{$catalogo->precio}}">
                </div>

                <textarea class="editarajax  estilaxo tex-3" data-model="Catalogo" data-field="descripcion" data-id="{{$catalogo->id}}" name="" id="" cols="40" rows="5">{{$catalogo->descripcion}}</textarea> 

                <div class="d-flex flex-lg-12 flex-column text-center">
                    <div class="col-lg-12 mb-2 mt-5">
                        <h4 style="color: black">Agregar talla</h4>
                        <button style="background: none; border: none; color: black;" type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#modalTalla">
                            <i class="fa-solid fa-circle-plus" style="font-size: 2.5rem;"></i>
                        </button>
                
                        <!-- Modal Talla -->
                        <div class="modal fade" id="modalTalla" style="padding-top: 3rem;" data-bs-backdrop="false" tabindex="-1"
                            aria-labelledby="modalTallaLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTallaLabel">Nueva talla</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex col-12 flex-column">
                                            <div class="col-12">
                                                <form action="{{ route('seccion.agregar_seccion_3') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="text" name="seccion" class="form-control" value="{{$catalogo->id}}" hidden>
                                                    </div>
                
                                                    <div class="mb-3">
                                                        <label for="talla" class="form-label">Talla:</label>
                                                        <input type="text" name="talla" class="form-control" id="talla" required>
                                                    </div>
                
                                                    <div class="mb-3">
                                                        <label for="cantidad" class="form-label">Cantidad:</label>
                                                        <input type="number" name="cantidad" class="form-control" id="cantidad" required>
                                                    </div>
                
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
                
                <div class="tallas">
                    <div>
                        <p>Tallas Disponibles:</p>
                    </div>
                    <div>
                        @foreach ($talla as $t)
                        <div class="t-madida">
                            <input class="editarajax estilaxo tex-4" data-model="Talla" data-field="talla" data-id="{{$t->id}}" type="text" value="{{$t->talla}}">   
                            <input class="editarajax estilaxo tex-4" data-model="Talla" data-field="cantidad" data-id="{{$t->id}}" type="text" value="{{$t->cantidad}}">

                            <form action="{{ route('seccion.destroy_tallas', $t->id) }}" method="POST"
                                onsubmit="return confirm('¿Quieres eliminar esta talla?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash" style="font-size: 1rem;"></i>
                                </button>
                            </form>
                        </div>
                           
                        @endforeach
                    </div>
                </div>

                <div class="d-flex flex-lg-12 flex-column text-center">
                    <div class="col-lg-12 mt-5">
                        <h4 style="color: black">Agregar Imagen</h4>
                        <button style="background: none; border: none; color: black;" type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#modalImagen">
                            <i class="fa-solid fa-circle-plus" style="font-size: 2.5rem;"></i>
                        </button>
                
                        <!-- Modal Imagen -->
                        <div class="modal fade" id="modalImagen" style="padding-top: 3rem;" data-bs-backdrop="false" tabindex="-1"
                            aria-labelledby="modalImagenLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalImagenLabel">Nueva Imagen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex col-12 flex-column">
                                            <div class="col-12">
                                                <form action="{{ route('seccion.agregar_seccion_4') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="text" name="seccion" class="form-control" value="{{$catalogo->id}}" hidden>
                                                    </div>
                
                                                    <div class="mb-3">
                                                        <label for="file-upload" class="form-label">Imagen:</label>
                                                        <div class="input-group">
                                                            <input type="file" name="archivo" class="form-control" id="file-upload" required>
                                                        </div>
                                                    </div>
                
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>

                <div class="imagen">
                    @foreach ($img as $i)
                        <div class="imagen-content">
                            <form class="img-contact" id="form_slider_image_0{{$i->id}}" action="{{ route('seccion.cambiar_imagen_seccion_2') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="archivo" id="hidden_file_input_0{{$i->id}}" style="display: none; ">
                                <input type="hidden" name="id_imagen" value="{{$i->id}}" id="">
                                <div class="carru-modal" style="width: 100%; height:100%; " id="clickable_area_0{{$i->id}}">
                                    <p  style="font-size: 1.2rem">CAMBIAR IMAGEN</p>
                                </div>
                                <img src="{{ asset('img/photos/catalogo/' . $i->imagen) }}"  alt="">
                            </form>
                            
                            <form action="{{ route('seccion.destroy_img', $i->id) }}" style="margin-top: 1rem;" method="POST" onsubmit="return confirm('¿Quieres eliminar esta imagen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash" style="font-size: 1rem;"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="precio">
                    <div>
                        <p>Precio:</p>
                    </div>
                    <div>
                        <label class="size-option2">
                            <input type="radio" name="payment" value="completo">
                            <span class="custom-radio"></span>
                            <span>Completo</span>
                        </label>

                        <label class="size-option2">
                            <input type="radio" name="payment" value="anticipo">
                            <span class="custom-radio"></span>
                            <span>50% anticipo</span>
                        </label>
                    </div>
                </div> --}}

                
            </div>
        </div>
   </section>

    <section class="informacion">
        
            <textarea class="editarajax estilaxo tex-5" data-model="Elemento" data-field="texto" data-id="{{ $elements[0]->id }}" name="" id="" cols="30" rows="6">{{ $elements[0]->texto }}</textarea>
                
    </section>


    <section class="final-info">
        <div class="opciones">
            <div class="t-op">
                <textarea class="editarajax estilaxo tex-6" data-model="Elemento" data-field="texto" data-id="{{ $elements[1]->id }}" name="" id="" cols="30" rows="5">{{ $elements[1]->texto }}</textarea>
            </div>
            <div class="barra"></div>
            <div class="t-op">
                <textarea class="editarajax estilaxo tex-6" data-model="Elemento" data-field="texto" data-id="{{ $elements[2]->id }}" name="" id="" cols="30" rows="5">{{ $elements[2]->texto }}</textarea>
            </div>
            <div class="barra"></div>
            <div class="t-op">
                <form class="img-contact" id="form_slider_image" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[3]->id }}" id="">
                    <div class="carru-modal" style="" id="clickable_area">
                        <p>CAMBIAR IMAGEN</p>
                    </div>
                    <img class="img1" src="{{ asset('img/photos/home/' .$elements[3]->imagen ) }}" alt="">
                </form>
            </div>
        </div>
    </section>


@endsection

@section('extraJS')

    <script>
        $('#hidden_file_input').change(function(e) {
            $('#form_slider_image').submit();
        });

        document.getElementById('clickable_area').addEventListener('click', function() {
            document.getElementById('hidden_file_input').click();
        });
    </script>

    {{-- cambiar imagenes dentro de un foreach --}}
    <script>
        document.querySelectorAll("[id^='clickable_area_0']").forEach(function(clickableArea) {
            clickableArea.addEventListener('click', function() {
                let id = this.id.replace('clickable_area_0', '');
                document.getElementById('hidden_file_input_0' + id).click();
            });
        });

        document.querySelectorAll("[id^='hidden_file_input_0']").forEach(function(fileInput) {
            fileInput.addEventListener('change', function() {
                let id = this.id.replace('hidden_file_input_0', '');
                document.getElementById('form_slider_image_0' + id).submit();
            });
        });
    </script>

@endsection