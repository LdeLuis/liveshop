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

        .back-main{
            width: 100%;
            height: 30rem;
            display: flex;
            justify-content: center;
            align-items:center;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
            background-image: url({{asset('img/design/recursos/shape.png')}});
        }

        .back-main .liveshop{
            width: 100%;
            height: 15rem;
            z-index: 10;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .back-main .liveshop h1{
            font-size: 5rem;
            font-weight: 900;
            color: var(--pink);
            -webkit-text-stroke: 1px var(--green);
            text-shadow: -8px 7px 0 var(--green2); 
            letter-spacing: 0.2rem;
        }

        .back-main .liveshop .now{
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .back-main .liveshop .now div{
            width: 6rem;
            height: 8rem;
            position: relative;
        }

        .back-main .liveshop .now div .img1{
            width: 3rem;
            position: absolute;
            top:0;
            left: 0;
        }

        .back-main .liveshop .now div .img2{
            width: 3rem;
            position: absolute;
            top:50%;
            right: 0;
            transform: translateY(-50%);
        }
        .back-main .liveshop .now div .img3{
            width: 2.7rem;
            position: absolute;
            bottom:0;
            left: 0;
        }

        .back-main .liveshop .now h2{
            font-size: 5rem;
            font-weight: 900;
            padding: 0 4rem;
            color: var(--blue);
            -webkit-text-stroke: 2px var(--pink);
            margin: 1rem 2rem;
            text-align: center;
            border-radius: 15px;
            border: 5px dotted var(--blue);
        }

        .back-main .liveshop .imagenes{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .back-main .liveshop a{
            color: var(--blue);
            font-weight: 900;
            font-size: 1.6rem;
            margin-top: 1rem;
        }

        .politicas{
            width: 100%;
            min-height: 30rem;
            padding: 3rem;
        }

        .politicas .p-main{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .politicas .p-main p{
            width: 60%;
            text-align: center;
            color: #7a7a7a;
            margin-top: 5rem;
            font-size: 1.2rem;
        }

        .politicas .p-main .enlaces{
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap:2rem;
            margin-top: 2rem;
        }

        .politicas .p-main .enlaces a{
            color: var(--green);
            font-size: 1.1rem;
            font-weight: 900;
        }

        .politicas .p-main .carru2{
            width: 80%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 4rem;
        }

        .politicas .p-main .carru2 .slide-item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 1rem;
            width: 100%;
            height: 100%;
            gap: 1rem;
        }

        .politicas .p-main .carru2 .slide-item img {
            width: 12rem;
            height: 4rem;
            object-fit: contain;
        }


        .livesh{
            width: 100%;
            min-height: 30rem;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 2rem 0;
        }

        .livesh .c-blanco{
            width: 100%;
            min-height: 20rem;
            background-color: #fff;
            border-radius: 15px;
            display: flex;
            align-items: center;
            flex-direction: column;
            position: relative;
        }

        .livesh .c-blanco h2{
            color: var(--blue);
            -webkit-text-stroke: 1px var(--pink);
            text-shadow: -8px 7px 0 #6a82fa; 
            font-size: 5rem;
            font-weight: 900;
            z-index: 5;
        }

        .livesh .c-blanco h3{
            color: var(--blue);
            letter-spacing: 0.3rem;
            font-weight: 700;
            z-index: 5;
        }

        .livesh .c-blanco p{
            text-align: center;
            width: 50%;
            z-index: 5;
        }

        .livesh .c-blanco .imagen1{
            width: 15rem;
            position: absolute;
            top: -2rem;
            left: 1rem;
            z-index: 2;
        }

        .livesh .c-blanco .imagen2{
            width: 15rem;
            position: absolute;
            bottom: -1.2rem;
            right: 1rem;
            z-index: 2;
        }
        .livesh .c-blanco .imagen3{
            width: 15rem;
            position: absolute;
            bottom: -1.5rem;
            right: 2.8rem;
            z-index: 2;
        }

        .livesh .c-blanco .foto-main{
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            padding: 2rem 0;
            gap: 2rem;
        }

        .livesh .c-blanco .foto-main .img1{
            height: 15rem;
        }

        .livesh .c-verde{
            width: 100%;
            height:4rem;
            background-color: var(--green);
            border-radius: 5px;
            margin-top: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }

        .livesh .c-verde h2{
            color: var(--pink);
            -webkit-text-stroke: 1px var(--green);
            text-shadow: -8px 7px 0 var(--green2); 
            font-size: 5rem;
            font-weight: 900;
        }

        .livesh .carru{
            width: 100%;
            padding: 2rem 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            
        }

        .livesh .carru .tarjeta{
            width: 21%;
            height: 30rem;
            background-color: var(--pink);
            border-radius: 7px;
            position: relative;
            display: flex;
            align-items: flex-end;
            margin-bottom: 5rem;
        }

        .livesh .carru .tarjeta .imagen {
            width: 100%;
            height: 80%;
            position: absolute;
            top: -1rem;
            left: -1rem;
            border-radius: 7px;
            overflow: hidden; 
        }

        .livesh .carru .tarjeta .imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 7px;
            z-index: 5;
        }

        .livesh .carru .tarjeta .imagen .detalle {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: #00ae63b0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            opacity: 0;
            transition: height 0.3s ease, opacity 0.3s ease;
            z-index: 6;
        }

        .livesh .carru .tarjeta .imagen:hover .detalle {
            height: 35%; 
            opacity: 1;
        }

        .livesh .carru .tarjeta .imagen .detalle a{
            color:  black;
        }

        .livesh .carru .tarjeta .imagen .detalle img{
            width: 1rem;
            height: 1rem;
            border-radius: 0;
        }


        .livesh .carru .tarjeta .content{
            width: 100%;
            height: 20%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
        }

        .livesh .carru .tarjeta .content h3{
            text-decoration: underline;
            font-size: 1.3rem;
            font-weight: 900;
        }
        .livesh .carru .tarjeta .content p{
            font-size: 1.2rem;
            font-weight: 900;
            letter-spacing: 0.2rem;
        }

        .livesh .opciones{
            width: 100%;
            min-height: 8rem;
            border-radius: 15px;
            background-color: #fff;
            margin-bottom: 5rem;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 1rem 0;
        }

        .livesh .opciones .t-op{
            width: 32%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .livesh .opciones .t-op p{
            text-decoration: underline;
            font-weight: 900;
        }

        .livesh .opciones .t-op img{
            width: 60%;
        }

        .livesh .opciones .barra{
            width: 5px;
            height: 80%;
            border-radius: 15px;
            background-color: var(--green);
        }

        .slick-prev::before,
        .slick-next::before {
            color: var(--pink);
        }

        .tex-1{
            font-size: 5rem;
            font-weight: 900;
            color: var(--pink);
            -webkit-text-stroke: 1px var(--green);
            text-shadow: -8px 7px 0 var(--green2); 
            letter-spacing: 0.2rem;
            width: 95%;
            text-align: center;
        }

        .tex-2{
            font-size: 5rem;
            font-weight: 900;
            color: var(--blue);
            -webkit-text-stroke: 2px var(--pink);
            margin: 1rem 0;
            text-align: center;
            width: 95%;
        }

        .tex-3{
            width: 70%;
            text-align: center;
            color: #000000;
            margin-top: 5rem;
            font-size: 1.2rem;
        }

        .tex-4{
            color: var(--blue);
            -webkit-text-stroke: 1px var(--pink);
            text-shadow: -8px 7px 0 #6a82fa; 
            font-size: 5rem;
            font-weight: 900;
            z-index: 5;
            width: 95%;
            text-align: center;
            margin-top: 1rem;
        }

        .tex-5{
            color: var(--blue);
            letter-spacing: 0.3rem;
            font-weight: 700;
            z-index: 5;
            width: 90%;
            text-align: center;
            margin: 1rem 0;
        }

        .tex-6{
            text-align: center;
            width:60%;
            z-index: 5;
            color: #000;
            margin-bottom: 1rem;
        }

        .tex-7{
            color: #000;
            text-decoration: underline;
            font-weight: 600;
            width: 90%;
            height: 90%;
        }


    </style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <section class="back-main">
        <div class="liveshop">
            <input class="editarajax estilaxo tex-1" data-model="Elemento" data-field="texto" data-id="{{ $elements[0]->id }}" type="text" value="{{ $elements[0]->texto }}">
            <div class="now">
                <input class="editarajax estilaxo tex-2" data-model="Elemento" data-field="texto" data-id="{{ $elements[1]->id }}" type="text" value="{{ $elements[1]->texto }}">
            </div>
            <div class="imagenes">
                <form class="img-contact" id="form_slider_image" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[2]->id }}" id="">
                    <div class="carru-modal" id="clickable_area">
                        <p>CAMBIAR ICONO</p>
                    </div>
                    <img style="" src="{{ asset('img/photos/home/' .$elements[2]->imagen ) }}" alt="">
                </form>

                <form class="img-contact" id="form_slider_image_2" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input_2" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[3]->id }}" id="">
                    <div class="carru-modal" style="" id="clickable_area_2">
                        <p>CAMBIAR ICONO</p>
                    </div>
                    <img  src="{{ asset('img/photos/home/' .$elements[3]->imagen ) }}" alt="">
                </form>

                <form class="img-contact" id="form_slider_image_3" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input_3" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[4]->id }}" id="">
                    <div class="carru-modal" style="" id="clickable_area_3">
                        <p>CAMBIAR ICONO</p>
                    </div>
                    <img  src="{{ asset('img/photos/home/' .$elements[4]->imagen ) }}" alt="">
                </form>
            </div>
        </div>
    </section>

    <section class="politicas">
        <div class="p-main">
            <textarea class="editarajax estilaxo tex-3" data-model="Elemento" data-field="texto" data-id="{{ $elements[5]->id }}" name="" id="" cols="30" rows="6">{{ $elements[5]->texto }}</textarea>

            <div class="d-flex flex-lg-12 flex-column text-center">
                <div class="col-lg-12 mb-5">
                    <h4 style="color: #000; margin-top:2rem;">Agregar marca</h4>
                    <button style="background: none; border: none; color: #000;" type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-circle-plus" style="font-size: 2.5rem;"></i>
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade"  id="exampleModal" style="padding-top: 3rem;" data-bs-backdrop="false" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Marcas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex col-12 flec-column">
                                        <div class="col-12">
                                            <form action="{{ route('seccion.agregar_seccion') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{-- ----------------------------------------------- --}}
                                            
                                                <div class="mb-3">
                                                    <label for="file-upload" class="form-label">Imagen:</label>
                                                    <div class="input-group">
                                                        <input type="file" name="archivo" class="form-control"
                                                            id="file-upload" required>
                                                    </div>
                                                </div>
                                                
                                                {{-- ----------------------------------------------- --}}
                                                
                                                <button type="submit" class="btn btn-primary">Save</button>
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

            <div class="carru2">
                @foreach ($marcas as $m)
                    <div class="slide-item">
                        <img src="{{asset('img/photos/marca/' . $m->imagen)}}" alt="">
                        <form action="{{ route('seccion.destroy', $m->id) }}" method="POST"
                            onsubmit="return confirm('¿Quieres eliminar este registro?');">
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
    </section>

    <section class="livesh">
        <div class="c-blanco">
            <input class="editarajax estilaxo tex-4" data-model="Elemento" data-field="texto" data-id="{{ $elements[6]->id }}" type="text" value="{{ $elements[6]->texto }}">
            <input class="editarajax estilaxo tex-5" data-model="Elemento" data-field="texto" data-id="{{ $elements[7]->id }}" type="text" value="{{ $elements[7]->texto }}">
            <textarea class="editarajax estilaxo tex-6" data-model="Elemento" data-field="texto" data-id="{{ $elements[8]->id }}" name="" id="" cols="30" rows="5">{{ $elements[8]->texto }}</textarea>
            <div class="foto-main">
                <form class="img-contact" id="form_slider_image_4" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input_4" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[9]->id }}" id="">
                    <div class="carru-modal" style="" id="clickable_area_4">
                        <p>CAMBIAR IMAGEN</p>
                    </div>
                    <img class="img1" src="{{ asset('img/photos/home/' .$elements[9]->imagen ) }}" alt="">
                </form>
                <form class="img-contact" id="form_slider_image_5" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input_5" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[10]->id }}" id="">
                    <div class="carru-modal" style="" id="clickable_area_5">
                        <p>CAMBIAR IMAGEN</p>
                    </div>
                    <img class="img1" src="{{ asset('img/photos/home/' .$elements[10]->imagen ) }}" alt="">
                </form>
            </div>
        </div>

        <div class="c-verde">
            <h2>¡COMPRA AHORA!</h2>
        </div>

       
        <div class="carru">
            @for ($i = 0; $i < 8; $i++)
                <div class="tarjeta">
                    <div class="imagen">
                        <img src="{{asset('img/design/recursos/nike.png')}}" alt="">
                        <div class="detalle">
                            <a href="{{route('front.catalogo_productos')}}">MAS DETALLE</a>
                            <img src="{{asset('img/design/recursos/icono.png')}}" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <h3>TENIS NIKE JORDAN 1</h3>
                        <p>$3,000 MXN</p>
                    </div>
                </div>
            @endfor
        </div>

        

        <div class="opciones">
            <div class="t-op">
                <textarea class="editarajax estilaxo tex-7" data-model="Elemento" data-field="texto" data-id="{{ $elements[12]->id }}" name="" id="" cols="30" rows="5">{{ $elements[12]->texto }}</textarea>
            </div>
            <div class="barra"></div>
            <div class="t-op">
                <textarea class="editarajax estilaxo tex-7" data-model="Elemento" data-field="texto" data-id="{{ $elements[13]->id }}" name="" id="" cols="30" rows="5">{{ $elements[13]->texto }}</textarea>
            </div>
            <div class="barra"></div>
            <div class="t-op">
                <form class="img-contact" id="form_slider_image_6" action="{{ route('seccion.cambiar_imagen_seccion') }}" method="post" enctype="multipart/form-data" style="width: 100%; height:100%; display:flex; justify-content:center;">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input_6" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[14]->id }}" id="">
                    <div class="carru-modal" style="" id="clickable_area_6">
                        <p>CAMBIAR IMAGEN</p>
                    </div>
                    <img class="img1" src="{{ asset('img/photos/home/' .$elements[14]->imagen ) }}" alt="">
                </form>
            </div>
        </div>

    </section>

    

@endsection

@section('extraJS')

    <script>
        $('.carru2').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>

    <script>
        $('#hidden_file_input').change(function(e) {
            $('#form_slider_image').submit();
        });

        document.getElementById('clickable_area').addEventListener('click', function() {
            document.getElementById('hidden_file_input').click();
        });

        $('#hidden_file_input_2').change(function(e) {
            $('#form_slider_image_2').submit();
        });

        document.getElementById('clickable_area_2').addEventListener('click', function() {
            document.getElementById('hidden_file_input_2').click();
        });

        $('#hidden_file_input_3').change(function(e) {
            $('#form_slider_image_3').submit();
        });

        document.getElementById('clickable_area_3').addEventListener('click', function() {
            document.getElementById('hidden_file_input_3').click();
        });

        $('#hidden_file_input_4').change(function(e) {
            $('#form_slider_image_4').submit();
        });

        document.getElementById('clickable_area_4').addEventListener('click', function() {
            document.getElementById('hidden_file_input_4').click();
        });

        $('#hidden_file_input_5').change(function(e) {
            $('#form_slider_image_5').submit();
        });

        document.getElementById('clickable_area_5').addEventListener('click', function() {
            document.getElementById('hidden_file_input_5').click();
        });

        $('#hidden_file_input_6').change(function(e) {
            $('#form_slider_image_6').submit();
        });

        document.getElementById('clickable_area_6').addEventListener('click', function() {
            document.getElementById('hidden_file_input_6').click();
        });
    </script>

@endsection

