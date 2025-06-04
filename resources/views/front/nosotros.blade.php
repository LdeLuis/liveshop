@extends('layouts.app')

@section('title', 'Inicio')

@section('extracss')
   <style>
        .catalogo{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 5rem 0;
        }

        .catalogo .nav-product{
            width: 85%;
            min-height: 4rem;
            background-color: #00ae64;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
            margin-bottom: 2rem;
            gap:1rem;
            padding: 1rem;
        }

        .catalogo .nav-product a,
        .catalogo .nav-product a p{
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            color: #2e4ef6;
            margin: 0;
            transition: 0.3s;
        }

        .catalogo .nav-product a p:hover{
            color: #feb8ce;
            text-decoration: underline #feb8ce;
        }

        .catalogo .nav-product a.activo p {
            color: #feb8ce;
            text-decoration: underline #feb8ce;
        }

        .catalogo .carru{
            width: 80%;
            padding: 2rem 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .catalogo .carru .tarjeta{
            width: 16rem;
            height: 30rem;
            background-color: #feb8ce;
            border-radius: 7px;
            position: relative;
            display: flex;
            align-items: flex-end;
            margin: 0 1rem 5rem 1rem;
        }

        .catalogo .carru .tarjeta .imagen {
            width: 100%;
            height: 80%;
            position: absolute;
            top: -1rem;
            left: -1rem;
            border-radius: 7px;
            overflow: hidden; 
        }

        .catalogo .carru .tarjeta .imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 7px;
            z-index: 5;
        }

        .catalogo .carru .tarjeta .imagen .detalle {
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

        .catalogo .carru .tarjeta .imagen:hover .detalle {
            height: 35%; 
            opacity: 1;
        }

        .catalogo .carru .tarjeta .imagen .detalle a{
            color:  black;
        }

        .catalogo .carru .tarjeta .imagen .detalle img{
            width: 1rem;
            height: 1rem;
            border-radius: 0;
        }


        .catalogo .carru .tarjeta .content{
            width: 100%;
            height: 20%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
        }

        .catalogo .carru .tarjeta .content h3 a{
            text-decoration: underline;
            font-size: 1.3rem;
            font-weight: 900;
            color: #000;
        }
        .catalogo .carru .tarjeta .content p{
            font-size: 1.2rem;
            font-weight: 900;
            letter-spacing: 0.2rem;
        }

        .catalogo .opciones{
            width: 80%;
            height: 8rem;
            border-radius: 15px;
            background-color: #fff;
            margin-bottom: 3rem;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .catalogo .opciones .t-op{
            width: 32%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .catalogo .opciones .t-op p{
            text-decoration: underline;
            font-weight: 900;
        }

        .catalogo .opciones .t-op img{
            width: 60%;ñ
        }

        .catalogo .opciones .barra{
            width: 5px;
            height: 80%;
            border-radius: 15px;
            background-color: #00ae64;
        }
        
        .catalogo .carru2{
            width: 80%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            margin-bottom: 5rem;
        }

        .catalogo .carru2 img{
            width: 15%;
            max-height: 5rem;
        }

        @media(min-width: 576px) and (max-width: 992px){
            .catalogo .carru .tarjeta{
                width: 16rem;
                margin: 0 0.5rem 5rem 0.5rem;
            }

            .catalogo .opciones{
                width: 80%;
                height: auto;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) 
        {
            .catalogo .nav-product{
                width: 90%;
                height: auto;
                flex-direction: column;
                padding: 1rem;
            }

            .catalogo .carru{
                width: 100%;
                justify-content: space-evenly;
            }

            .catalogo .carru .tarjeta{
                width: 10rem;
                height: 23rem;
                margin: 0 0.5rem 5rem 0.5rem;
            }

            .catalogo .carru .tarjeta .imagen {
                left: -0.5rem;
            }

            .catalogo .carru .tarjeta .content h3 a{
                font-size: 1rem;
            }
            
            .catalogo .carru .tarjeta .content p{
                font-size: 1rem;
                letter-spacing: 0rem;
            }

            .catalogo .opciones{
                width: 90%;
                height: auto;
                flex-direction: column;
            }

            .catalogo .opciones .t-op{
                width: 90%;
                padding: 1rem
            }

            .catalogo .opciones .t-op p{
                text-align: center;
            }
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


   </style>
@endsection

@section('content')

    <section class="catalogo">
        <div class="nav-product">
            <a href="{{ route('front.nosotros') }}" class="{{ request('tipo') == null ? 'activo' : '' }}">
                <p>TODOS</p>
            </a>
            {{-- <a href="{{ route('front.nosotros', ['tipo' => 'liveshopping']) }}" class="{{ request('tipo') == 'liveshopping' ? 'activo' : '' }}">
                <p>LIVESHOPPING</p>
            </a> --}}
            <a href="{{ route('front.nosotros', ['tipo' => 'ropa mujer']) }}" class="{{ request('tipo') == 'ropa mujer' ? 'activo' : '' }}">
                <p>ROPA MUJER</p>
            </a>
            <a href="{{ route('front.nosotros', ['tipo' => 'ropa caballero']) }}" class="{{ request('tipo') == 'ropa caballero' ? 'activo' : '' }}">
                <p>ROPA CABALLERO</p>
            </a>
            <a href="{{ route('front.nosotros', ['tipo' => 'ninos']) }}" class="{{ request('tipo') == 'ninos' ? 'activo' : '' }}">
                <p>NIÑOS</p>
            </a>
            <a href="{{ route('front.nosotros', ['tipo' => 'accesorios']) }}" class="{{ request('tipo') == 'accesorios' ? 'activo' : '' }}">
                <p>ACCESORIOS</p>
            </a>
            <a href="{{ route('front.nosotros', ['tipo' => 'hogar']) }}" class="{{ request('tipo') == 'hogar' ? 'activo' : '' }}">
                <p>HOGAR</p>
            </a>
        </div>

        <div class="carru" id="catalogo-section">
            @foreach ($catalogos as $catalogo)
                @if (isset($imagenesPorSeccion[$catalogo->id]))
                    @php $img = $imagenesPorSeccion[$catalogo->id]; @endphp

                    <div class="tarjeta">
                        <div class="imagen">
                            <img src="{{ asset('img/photos/catalogo/' . $img->imagen) }}" alt="">
                            <div class="detalle">
                                <a href="{{ route('front.catalogo_productos', ['id' => $catalogo->id]) }}">MAS DETALLE</a>
                                <img src="{{ asset('img/design/recursos/icono.png') }}" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="">{{ $catalogo->nombre }}</a></h3>
                            <p>${{ number_format($catalogo->precio, 2) }} MXN</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="custom-pagination">
            @if ($catalogos->onFirstPage())
                <span class="prev disabled">- PREV -</span>
            @else
                <a href="{{ $catalogos->appends(request()->query())->previousPageUrl() }}" class="prev">- PREV -</a>
            @endif

            @for ($i = 1; $i <= $catalogos->lastPage(); $i++)
                <a href="{{ $catalogos->appends(request()->query())->url($i) }}" class="page-dot {{ $i == $catalogos->currentPage() ? 'active' : '' }}"></a>
            @endfor

            @if ($catalogos->hasMorePages())
                <a href="{{ $catalogos->appends(request()->query())->nextPageUrl() }}" class="next">NEXT -</a>
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

        <div class="carru2">
            <img src="{{asset('img/design/recursos/m1.png')}}" alt="">
            <img src="{{asset('img/design/recursos/m2.png')}}" alt="">
            <img src="{{asset('img/design/recursos/m3.png')}}" alt="">
            <img src="{{asset('img/design/recursos/m4.png')}}" alt="">
        </div>
    </section>
  
@endsection

@section('scripts')

    {{-- <script>
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
    </script> --}}
   
@endsection