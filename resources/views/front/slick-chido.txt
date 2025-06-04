@extends('layouts.app')

@section('title', 'Contacto')

@section('extracss')
<style>
        /* Estilos para el carrusel */
        .slider-nav {
            position: relative;
        }

        /* Estilos para los dots */
        .slider-nav .slick-dots {
            display: flex; /* Mostrar los dots en línea */
            justify-content: center; /* Centrar los dots horizontalmente */
            list-style: none; /* Eliminar estilos de lista */
            padding: 0; /* Eliminar padding de la lista */
            margin-top: 30px; /* Espacio superior para separar del contenido */
            cursor: pointer;
        }

        .slider-nav .slick-dots li {
            margin: 0 5px; /* Espacio entre cada dot */
        }

        /* Estilos para las flechas */
        .slider-nav .slick-prev,
        .slider-nav .slick-next {
            position: absolute; /* Posición absoluta para las flechas */
            top: 94.5%; /* Alinear verticalmente al centro */
            transform: translateY(-50%); /* Ajuste para centrar verticalmente */
            z-index: 1000; /* Z-index alto para que estén encima de los dots */
            background-color: rgba(255, 255, 255, 0.5); /* Fondo semi-transparente */
            padding: 0 20px; /* Espaciado interno */
            /* border-radius: 50%; */
            border: 0;
            cursor: pointer; /* Cambiar cursor */
        }

        .slider-nav .slick-prev {
            left: -30px; /* Posicionar flecha izquierda */
        }

        .slider-nav .slick-next {
            right: -30px; /* Posicionar flecha derecha */
        }


    .alto-slider_servicios--texto {
            writing-mode: vertical-lr; 
            transform: rotate(180deg);
        }

        .link-slider_servicio {
            text-decoration: none;
            color: #0F0743;
        }

        .link-slider_servicio:hover {
            color: #028AE8;
        }

        .alto-slider_servicios: {
            color: #0F0743;
        }

        .alto-slider_servicios:hover {
            color: #028AE8;
        }

        .imagen-media {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            width: 100%;
            filter: brightness(0.4);
        }

        .imagen-contacto {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            width: 100%;
        }

        .cont-formulario {
            background-color: #FFFFFF;
            border-radius: 1rem;
            box-shadow: 0 0 3re m rgba(0, 0, 0, 0.2);
        }

        .input-group-text {
            font-size: 0.75rem;
            background-color: #0F0743; 
            color: #FFFFFF;
            border: 1px solid #0F0743;
        }

        .input-form {
            color:#0F0743;
            font-weight: 500;
            border: 1px solid #0F0743;
            outline: none;
        }

        .boton-form {
            background-color:#028AE8; 
            color:#FFFFFF;
        }

        .boton-form:hover {
            background-color:#0F0743; 
            color:#FFFFFF;
        }

        .boton-form:focus {
            background-color:#FFFFFF; 
            color:#000000;
        }

        @media(min-width: 992px) {
            .slider-container {
                height: 51.5rem;
            }

            .img-slider_principal {
                width: 1800px;
                height: 47rem;
            }

            .tarjeta-nosotros {
                z-index: 9999; 
                height: 24rem; 
                margin-top: 3rem;
            }

            .texto-nosotros {
                color:#0F0743; 
                line-height: 1.2; 
                text-align: justify;
            }

            .alto-slider_servicios {
                height: 410px;
            }

            .imagen-media {
                height: 700px;
            }

            .imagen-contacto {
                height: 560px;
            }

            .contacto-grande {
                display: show;
            }

            .contacto-chico {
                display: none;
            }
        } 

        @media(min-width: 576px) and (max-width: 992px) {
            .slider-container {
                height: 35rem;
            }

            .img-slider_principal {
                width: 1800px;
                height: 28rem;
            }

            .tarjeta-nosotros {
                z-index: 9999; 
                height: 18rem; 
                margin-top: 2rem;
            }

            .texto-nosotros {
                font-size: 0.9rem;
                color:#0F0743; 
                line-height: 1.1; 
                text-align: justify;
            }

            .imagen-media {
                height: 500px;
            }   

            .imagen-contacto {
                height: 400px;
            }

            .contacto-grande {
                display: none;
            }

            .contacto-chico {
                display: show;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .slider-container {
                height: 23rem;
            }

            .img-slider_principal {
                width: 1800px;
                height: 16rem;
            }

            .tarjeta-nosotros {
                z-index: 9999; 
                height: auto; 
                margin-top: 13rem;
            }

            .texto-nosotros {
                font-size: 0.9rem;
                color:#0F0743; 
                line-height: 1.1; 
                text-align: justify;
            }

            .imagen-media {
                height: 300px;
            }

            .contacto-grande {
                display: none;
            }

            .contacto-chico {
                display: show;
            }
        }

</style>
@endsection

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-9 mx-auto">

                <div class="row">
                    <div class="slider-nav col-3">
                        <a href="#/" class="col-4 border-start border-info border-3 alto-slider_servicios link-slider_servicio" data-target="slider-01">
                            <div class="row">
                                <div class="col text-center fs-3 fw-bolder">
                                    01
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative text-center d-flex aling-items-center justify-content-center alto-slider_servicios--texto">
                                    <div style="height: 400px; text-transform: uppercase; margin-top: -160px; margin-left: 5px;" 
                                         class="col-4 fs-5 fw-bolder position-absolute top-0 start-50 translate-middle">
                                        VIGILANCIA Y PATRULLAJE
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#/" class="col-4 border-start border-info border-3 alto-slider_servicios link-slider_servicio" data-target="slider-01">
                            <div class="row">
                                <div class="col text-center fs-3 fw-bolder">
                                    02
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative text-center d-flex aling-items-center justify-content-center alto-slider_servicios--texto">
                                    <div style="height: 400px; text-transform: uppercase; margin-top: -160px; margin-left: 5px;" 
                                         class="col-4 fs-5 fw-bolder position-absolute top-0 start-50 translate-middle">
                                        MONITOREO DE ALARMAS
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#/" class="col-4 border-start border-info border-3 alto-slider_servicios link-slider_servicio" data-target="slider-01">
                            <div class="row">
                                <div class="col text-center fs-3 fw-bolder">
                                    03
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative text-center d-flex aling-items-center justify-content-center alto-slider_servicios--texto">
                                    <div style="height: 400px; text-transform: uppercase; margin-top: -160px; margin-left: 5px;" 
                                         class="col-4 fs-5 fw-bolder position-absolute top-0 start-50 translate-middle">
                                        PROTECCIÓN PERSONAL
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#/" class="col-4 border-start border-info border-3 alto-slider_servicios link-slider_servicio" data-target="slider-01">
                            <div class="row">
                                <div class="col text-center fs-3 fw-bolder">
                                    04
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative text-center d-flex aling-items-center justify-content-center alto-slider_servicios--texto">
                                    <div style="height: 400px; text-transform: uppercase; margin-top: -160px; margin-left: 5px;" 
                                         class="col-4 fs-5 fw-bolder position-absolute top-0 start-50 translate-middle">
                                        OTRO 1
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#/" class="col-4 border-start border-info border-3 alto-slider_servicios link-slider_servicio" data-target="slider-01">
                            <div class="row">
                                <div class="col text-center fs-3 fw-bolder">
                                    05
                                </div>
                            </div>
                            <div class="row">
                                <div class="col position-relative text-center d-flex aling-items-center justify-content-center alto-slider_servicios--texto">
                                    <div style="height: 400px; text-transform: uppercase; margin-top: -160px; margin-left: 5px;" 
                                         class="col-4 fs-5 fw-bolder position-absolute top-0 start-50 translate-middle">
                                        OTRO 2
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-for col-8">
                        <div class="col-8 py-5 alto-slider_servicios position-relative slider-content" id="slider-01">
                            <div class="col-12 position-absolute top-0 start-0 alto-slider_servicios" style="
                                background-image: url('{{ asset('img/photos/home/Vigilancia.png') }}');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: 100%;
                                border-top-right-radius: 32px; 
                                border-bottom-right-radius: 32px;
                                filter: brightness(0.4);
                            "></div>
                            <div class="col-12 position-absolute top-50 start-50 translate-middle z-3">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="row">
                                            <div class="col-9 ms-auto">
                                                <div class="row">
                                                    <div class="col text-white fs-1 text-end" style="line-height: 1.1;">
                                                        VIGILANCIA Y PATRULLAJE
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end text-white py-3" style="line-height: 1;">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, natus! Lorem ipsum dolor sit amet. Quia est explicabo corporis maiores molestias? Ad nostrum blanditiis odit tempore labore.
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 px-0">
                                                        <a href="#/" class="btn btn-outline text-white py-2 w-100" style="background-color: #028AE8;">VER MÁS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 py-5 alto-slider_servicios position-relative slider-content" id="slider-01">
                            <div class="col-12 position-absolute top-0 start-0 alto-slider_servicios" style="
                                background-image: url('{{ asset('img/photos/home/Vigilancia.png') }}');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: 100%;
                                border-top-right-radius: 32px; 
                                border-bottom-right-radius: 32px;
                                filter: brightness(0.4);
                            "></div>
                            <div class="col-12 position-absolute top-50 start-50 translate-middle z-3">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="row">
                                            <div class="col-9 ms-auto">
                                                <div class="row">
                                                    <div class="col text-white fs-1 text-end" style="line-height: 1.1;">
                                                        MONITOREO DE ALARMAS
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end text-white py-3" style="line-height: 1;">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, natus! Lorem ipsum dolor sit amet. Quia est explicabo corporis maiores molestias? Ad nostrum blanditiis odit tempore labore.
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 px-0">
                                                        <a href="#/" class="btn btn-outline text-white py-2 w-100" style="background-color: #028AE8;">VER MÁS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 py-5 alto-slider_servicios position-relative slider-content" id="slider-01">
                            <div class="col-12 position-absolute top-0 start-0 alto-slider_servicios" style="
                                background-image: url('{{ asset('img/photos/home/Vigilancia.png') }}');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: 100%;
                                border-top-right-radius: 32px; 
                                border-bottom-right-radius: 32px;
                                filter: brightness(0.4);
                            "></div>
                            <div class="col-12 position-absolute top-50 start-50 translate-middle z-3">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="row">
                                            <div class="col-9 ms-auto">
                                                <div class="row">
                                                    <div class="col text-white fs-1 text-end" style="line-height: 1.1;">
                                                        PROTECCIÓN PERSONAL
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end text-white py-3" style="line-height: 1;">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, natus! Lorem ipsum dolor sit amet. Quia est explicabo corporis maiores molestias? Ad nostrum blanditiis odit tempore labore.
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 px-0">
                                                        <a href="#/" class="btn btn-outline text-white py-2 w-100" style="background-color: #028AE8;">VER MÁS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 py-5 alto-slider_servicios position-relative slider-content" id="slider-01">
                            <div class="col-12 position-absolute top-0 start-0 alto-slider_servicios" style="
                                background-image: url('{{ asset('img/photos/home/Vigilancia.png') }}');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: 100%;
                                border-top-right-radius: 32px; 
                                border-bottom-right-radius: 32px;
                                filter: brightness(0.4);
                            "></div>
                            <div class="col-12 position-absolute top-50 start-50 translate-middle z-3">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="row">
                                            <div class="col-9 ms-auto">
                                                <div class="row">
                                                    <div class="col text-white fs-1 text-end" style="line-height: 1.1;">
                                                        OTRO 1
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end text-white py-3" style="line-height: 1;">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, natus! Lorem ipsum dolor sit amet. Quia est explicabo corporis maiores molestias? Ad nostrum blanditiis odit tempore labore.
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 px-0">
                                                        <a href="#/" class="btn btn-outline text-white py-2 w-100" style="background-color: #028AE8;">VER MÁS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 py-5 alto-slider_servicios position-relative slider-content" id="slider-01">
                            <div class="col-12 position-absolute top-0 start-0 alto-slider_servicios" style="
                                background-image: url('{{ asset('img/photos/home/Vigilancia.png') }}');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: 100%;
                                border-top-right-radius: 32px; 
                                border-bottom-right-radius: 32px;
                                filter: brightness(0.4);
                            "></div>
                            <div class="col-12 position-absolute top-50 start-50 translate-middle z-3">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="row">
                                            <div class="col-9 ms-auto">
                                                <div class="row">
                                                    <div class="col text-white fs-1 text-end" style="line-height: 1.1;">
                                                        OTRO 2
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end text-white py-3" style="line-height: 1;">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, natus! Lorem ipsum dolor sit amet. Quia est explicabo corporis maiores molestias? Ad nostrum blanditiis odit tempore labore.
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 px-0">
                                                        <a href="#/" class="btn btn-outline text-white py-2 w-100" style="background-color: #028AE8;">VER MÁS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
    
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><img src="{{ asset('img/photos/home/Flecha.png') }}"></button>',
                nextArrow: '<button type="button" class="slick-next"><img src="{{ asset('img/photos/home/Flecha2.png') }}"></button>',
                dots: true,
                focusOnSelect: true,
                customPaging: function(slider, i) {
                    var imgNormal = '{{ asset('img/photos/home/Rombo2.png') }}';
                    var imgActive = '{{ asset('img/photos/home/Rombo3.png') }}';
                    return '<img src="' + imgNormal + '" class="dot-img" />';
                }
            });
    
            $('.slider-for').on('afterChange', function(event, slick, currentSlide, nextSlide){
                $('.slider-nav .slick-dots li').removeClass('slick-active');
                $('.slider-nav .slick-dots li:nth-child(' + (currentSlide + 1) + ')').addClass('slick-active');
                updateDotsImages();
            });
    
            function updateDotsImages() {
                var imgNormal = '{{ asset('img/photos/home/Rombo2.png') }}';
                var imgActive = '{{ asset('img/photos/home/Rombo3.png') }}';
    
                $('.slider-nav .slick-dots li').each(function(index){
                    var dotImg = $(this).find('.dot-img');
                    if ($(this).hasClass('slick-active')) {
                        dotImg.attr('src', imgActive);
                    } else {
                        dotImg.attr('src', imgNormal);
                    }
                });
            }
        });
    </script>
    
@endsection