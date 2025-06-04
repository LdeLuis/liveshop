@extends('layouts.app')

@section('title', 'Home')

@section('extracss')

    <style>
        .back-main{
            width: 100%;
            height: 30rem;
            position: relative;
            margin-top: -10rem;
            display: flex;
            justify-content: center;
            align-items:flex-end;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
            background-image: url({{asset('img/design/recursos/shape.png')}});
        }

        .back-main .liveshop{
            width: 80%;
            height: 15rem;
            z-index: 10;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transform: translateY(4rem);
        }

        .back-main .liveshop h1{
            font-size: 5rem;
            font-weight: 900;
            color: #feb8ce;
            -webkit-text-stroke: 1px #00ae64;
            text-shadow: -8px 7px 0 #039858; 
            letter-spacing: 0.2rem;
        }

        .back-main .liveshop .now{
            width: 80%;
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
            -webkit-text-stroke: 2px #feb8ce;
            margin: 1rem 2rem;
            text-align: center;
            border-radius: 15px;
            border: 5px dotted var(--blue);
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
            width: 80%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap:2rem;
            margin-top: 2rem;
        }

        .politicas .p-main .enlaces a{
            color: #00ae64;
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
            justify-content: center;
            align-items: center;
            margin: 0 1rem;
            width: 100%;
            height: 100%;
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
            flex-direction: column;
            padding: 2rem 0;
        }

        .livesh .c-blanco{
            width: 80%;
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
            -webkit-text-stroke: 1px #feb8ce;
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

        .livesh .c-verde{
            width: 80%;
            height:4rem;
            background-color: #00ae64;
            border-radius: 5px;
            margin-top: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }

        .livesh .c-verde h2{
            color: #feb8ce;
            -webkit-text-stroke: 1px #00ae64;
            text-shadow: -8px 7px 0 #039858; 
            font-size: 5rem;
            font-weight: 900;
        }

        .livesh .carru{
            width: 80%;
            padding: 2rem 0 0 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            
        }

        .livesh .carru .tarjeta{
            width: 16rem;
            height: 30rem;
            background-color: #feb8ce;
            border-radius: 7px;
            position: relative;
            display: flex;
            align-items: flex-end;
            margin: 0 1rem 5rem 1rem;
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

        .livesh .carru .tarjeta .content h3 a{
            text-decoration: underline;
            font-size: 1.3rem;
            font-weight: 900;
            color: #000;
        }
        .livesh .carru .tarjeta .content p{
            font-size: 1.2rem;
            font-weight: 900;
            letter-spacing: 0.2rem;
        }

        .livesh .opciones{
            width: 80%;
            height: 8rem;
            border-radius: 15px;
            background-color: #fff;
            margin-bottom: 5rem;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
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
            text-align: 
        }

        .livesh .opciones .t-op img{
            width: 60%;
        }

        .livesh .opciones .barra{
            width: 5px;
            height: 80%;
            border-radius: 15px;
            background-color: #00ae64;
        }

        .slick-prev::before,
        .slick-next::before {
            color: #feb8ce;
        }

        .custom-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .custom-pagination .prev,
        .custom-pagination .next {
            color: var(--blue);
            font-weight: bold;
            text-decoration: none;
        }

        .custom-pagination .prev.disabled,
        .custom-pagination .next.disabled {
            color: gray;
            pointer-events: none;
        }

        .custom-pagination .page-dot {
            width: 12px;
            height: 12px;
            background-color: #feb8ce;
            border-radius: 50%;
            display: inline-block;
            text-indent: -9999px; 
        }

        .custom-pagination .page-dot.active {
            background-color: #feb8ce;
        }


        @media(min-width: 576px) and (max-width: 992px) {
            .back-main .liveshop h1{
                font-size: 4rem;
                text-align: center;
            }

            .back-main .liveshop .now{
                width: 100%;
            }

            .back-main .liveshop .now h2{
                font-size: 4rem;
                padding: 0 2rem;
                max-width: 60%  ;
            }
            
            .politicas .p-main p{
                width: 90%;
                font-size: 1.2rem;
            }

            .livesh .c-blanco{
                width: 90%;
                min-height: 20rem;
                margin-bottom: 2rem;
            }

            .livesh .c-blanco h2{
                font-size: 2.5rem;
                margin-top: 2rem;
            }
            .livesh .c-blanco h3{
                font-size: 1.5rem;
            }

            .livesh .c-blanco .imagen1{
                width: 9rem;
            }
            .livesh .c-blanco .imagen2{
                width: 9rem;
            }
            .livesh .c-blanco .imagen3{
                width: 9rem;
                right: 2.2rem;
            }

            .livesh .c-verde{
                width: 90%;
            }

            .livesh .c-verde h2{
                font-size: 4rem;
                font-weight: 900;
            }

            .livesh .carru{
                width: 90%;
            }
        
            .livesh .carru .tarjeta{
                width: 16rem;
                margin: 0 1rem 5rem 1rem;
            }

            .livesh .carru .tarjeta .content h3{
                font-size: 1rem;
            }

            .livesh .carru .tarjeta .content p{
                font-size: 1rem;
            }

            .livesh .opciones{
                width: 80%;
                min-height: 8rem;
            }

            .livesh .opciones .t-op p{
                font-size: 0.7rem;
                margin: 0 0.5rem;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .back-main .liveshop{
                width: 90%;
            }

            .back-main .liveshop h1{
                font-size: 3rem;
                width: 100%;
                text-align: center;
            }

            .back-main .liveshop .now{
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .back-main .liveshop .now div{
                width: 10rem;
            }
            .back-main .liveshop .now div .img1{
                width: 50%;
            }
            .back-main .liveshop .now div .img2{
                width: 50%;
            }
            .back-main .liveshop .now div .img3{
                width: 50%;
            }

            .back-main .liveshop .now h2{
                font-size: 2rem;
                padding: 0 2rem;
                margin: 1rem;
                width: 80%;
            }

            .politicas .p-main p{
                width: 90%;
            }

            .politicas .p-main .enlaces{
                width: 90%;
                flex-direction: column;
                margin-top: 2rem;
            }

            .politicas .p-main .enlaces a{
                text-align: center;
            }

            .livesh .c-blanco{
                width: 90%;
                min-height: 20rem;
                margin-bottom: 3rem;
            }

            .livesh .c-blanco h2{
                text-shadow: -5px 5px 0 #6a82fa; 
                font-size: 2rem;
                margin-top: 1rem
            }

            .livesh .c-blanco h3{
                font-size: 1.2rem
            }

            .livesh .c-blanco p{
                width: 80%;
            }

            .livesh .c-blanco .imagen1{
                display: none;
            }

            .livesh .c-blanco .imagen2{
                width: 5rem;
                position: absolute;
                bottom: -1.2rem;
                right: 50%;
                transform: translate(50%,10%);
            }
            .livesh .c-blanco .imagen3{
                width: 5rem;
                position: absolute;
                bottom: -0.8rem;
                right: 50%;
                transform: translate(50%,10%);
            }

            .livesh .c-verde{
                width: 90%;
            }

            .livesh .c-verde h2{
                text-shadow: -5px 5px 0 #039858; 
                font-size: 3rem;
                text-align: center;
            }

            .livesh .carru{
                width: 100%;
                justify-content: center;
            }

            .livesh .carru .tarjeta{
                width: 10rem;
                height: 23rem;
                margin: 0 0.5rem 5rem 0.5rem;
            }

            .livesh .carru .tarjeta .imagen {
                left: -0.5rem;
            }

            .livesh .carru .tarjeta .content h3 a{
                font-size: 1rem;
            }

            .livesh .carru .tarjeta .content p{
                font-size: 1rem;
                letter-spacing: 0rem;
            }

            .livesh .opciones{
                width: 90%;
                height: 20rem !important;
                flex-direction: column;
                padding: 1rem;
            }

            .livesh .opciones .t-op{
                width: 90%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .livesh .opciones .t-op p{
                text-align: center;
            }

            .livesh .opciones .barra{
                display: none;
            }
        }


    </style>

@endsection

@section('content')

    <section class="back-main">
        <div class="liveshop">
            <h1>{{$elements[0]->texto}}</h1>
            <div class="now">
                <div>
                    <img class="img1" src="{{asset('img/photos/home/'. $elements[2]->imagen)}}" alt="">
                    <img class="img2" src="{{asset('img/photos/home/'. $elements[3]->imagen)}}" alt="">
                    <img class="img3" src="{{asset('img/photos/home/'. $elements[4]->imagen)}}" alt="">
                </div>
                <h2>{{$elements[1]->texto}}</h2>
                <div>
                    <img class="img1" src="{{asset('img/photos/home/'. $elements[2]->imagen)}}" alt="">
                    <img class="img2" src="{{asset('img/photos/home/'. $elements[3]->imagen)}}" alt="">
                    <img class="img3" src="{{asset('img/photos/home/'. $elements[4]->imagen)}}" alt="">
                </div>
            </div>
            <a href="{{route('login')}}">INGRESAR AHORA</a>
        </div>
    </section>

    <section class="politicas">
        <div class="p-main">
            <p>{{$elements[5]->texto}}</p>
            <div class="enlaces">
                <a href="{{route('front.politicas_envio')}}">POLITICAS Y CONDICIONES</a>
                <a href="{{route('front.garantias')}}">REGLAS DE COMPRA</a>
             </div>
             <div class="carru2">
                @foreach ($marca as $m)
                    <div class="slide-item"><img src="{{asset('img/photos/marca/'. $m->imagen)}}" alt=""></div>
                @endforeach
            </div>
            
        </div>
    </section>

    <section class="livesh">
        <div class="c-blanco">
            <h2>{{$elements[6]->texto}}</h2>
            <h3>{{$elements[7]->texto}}</h3>
            <p>{{$elements[8]->texto}}</p>
            <img class="imagen1" src="{{asset('img/photos/home/'.$elements[9]->imagen)}}" alt="">
            <img class="imagen2" src="{{asset('img/design/recursos/img5.png')}}" alt="">
            <img class="imagen3" src="{{asset('img/photos/home/'.$elements[10]->imagen)}}" alt="">
        </div>

        <div class="c-verde">
            <h2>¡{{$elements[11]->texto}}</h2>
        </div>

       
        <div class="carru" id="catalogo-section">
            @foreach ($catalogos as $c)
                @if (isset($imagenesPorSeccion[$c->id]))
                    @php $img = $imagenesPorSeccion[$c->id]; @endphp
        
                    <div class="tarjeta">
                        <div class="imagen">
                            <img src="{{ asset('img/photos/catalogo/' . $img->imagen) }}" alt="">
                            <div class="detalle">
                                <a href="{{ route('front.catalogo_productos', ['id' => $c->id]) }}">MAS DETALLE</a>

                                <img src="{{ asset('img/design/recursos/icono.png') }}" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('front.catalogo_productos', ['id' => $c->id]) }}">{{ $c->nombre }}</a></h3>
                            <p>${{ $c->precio }} MXN</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
        <div class="custom-pagination">
            @if ($catalogos->onFirstPage())
                <span class="prev disabled">- PREV -</span>
            @else
                <a href="{{ $catalogos->previousPageUrl() }}" class="prev">- PREV -</a>
            @endif
        
            @for ($i = 1; $i <= $catalogos->lastPage(); $i++)
                <a href="{{ $catalogos->url($i) }}" class="page-dot {{ $i == $catalogos->currentPage() ? 'active' : '' }}"></a>
            @endfor
        
            @if ($catalogos->hasMorePages())
                <a href="{{ $catalogos->nextPageUrl() }}" class="next">NEXT -</a>
            @else
                <span class="next disabled">NEXT -</span>
            @endif
        </div>
        

        
        
        <div class="opciones">
            <div class="t-op"><p>SELECCIONA TU PRODUCTO <br> AGREGALO AL CARRITO <br> INDICA A DONDE TE LO VAMOS A ENVIAR <br> PAGA Y RECIBE</p></div>
            <div class="barra"></div>
            <div class="t-op"><p>COMPRAS SEGURAS CON PAYPAL</p></div>
            <div class="barra"></div>
            <div class="t-op"><img src="{{asset('img/design/recursos/paypal.png')}}" alt=""></div>
        </div>

    </section>

@endsection

@section('scripts')

    <script>
        $('.carru2').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            autoplay:true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const catalogoContainer = document.getElementById("catalogo-section").parentElement;

        let screenWidth = window.innerWidth;
        let perPage;

        if (screenWidth > 1200) {
            perPage = 8;
        } else if (screenWidth > 767) {
            perPage = 6;
        } else {
            perPage = 4;
        }

        console.log('screenWidth:', screenWidth, 'perPage:', perPage);

        localStorage.setItem('per_page', perPage);

        function cargarCatalogo(url) {
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-Per-Page': perPage
                }
            })
            .then(res => res.text())
            .then(html => {
                const temp = document.createElement('div');
                temp.innerHTML = html;

                const newCatalogoSection = temp.querySelector("#catalogo-section").parentElement;
                if (newCatalogoSection) {
                    catalogoContainer.innerHTML = newCatalogoSection.innerHTML;
                }

                const cleanParams = new URLSearchParams(window.location.search);
                cleanParams.delete('page');
                cleanParams.delete('per_page');
                const cleanUrl = window.location.pathname + (cleanParams.toString() ? '?' + cleanParams.toString() : '');
                window.history.replaceState(null, '', cleanUrl);
            })
            .catch(err => console.error("Error al cargar catálogo:", err));
        }

        catalogoContainer.addEventListener("click", function (e) {
            if (e.target.tagName === "A" && e.target.closest(".custom-pagination")) {
                e.preventDefault();
                cargarCatalogo(e.target.href);
            }
        });

    });
</script>


@endsection


