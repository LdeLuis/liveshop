@extends('layouts.app')

@section('title', 'Catalogo')

@section('extracss')

    <style>
        .slick-prev:before,
        .slick-next:before {
            color: var(--green);
        }

        .prod-main {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5rem 0 1rem 0;
        }

        .prod-main .c-blanco {
            width: 80%;
            min-height: 30rem;
            background-color: #fff;
            border-radius: 15px;
            display: flex;
            flex-direction: row;
        }

        .prod-main .c-blanco .imagen {
            width: 20%;
            height: 30rem;
            padding: 1rem;
        }

        .prod-main .c-blanco .imagen img {
            width: 100%;
            object-fit: cover;
        }

        .prod-main .c-blanco .contenido {
            width: 80%;
            padding: 1rem;
            display: flex;
            flex-direction: column;

        }

        .prod-main .c-blanco .contenido .top-contenido {
            width: 100%;
            padding-top: 1rem;
            display: flex;
            justify-content: space-between;
        }

        .prod-main .c-blanco .contenido .top-contenido p {
            color: var(--green);
            text-decoration: underline;
            font-size: 1.2rem;
        }

        .prod-main .c-blanco .contenido p {
            padding: 0 2rem;
            font-size: 1.2rem;
            color: #666;
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

        .prod-main .c-blanco .contenido .tallas div:last-child {
            width: 85%;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .prod-main .c-blanco .contenido .precio div:last-child {
            width: 85%;
            display: flex;
            flex-direction: row;
            gap: 8px;
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

        .size-option input:checked+.custom-radio,
        .size-option2 input:checked+.custom-radio {
            background-color: var(--green);
        }

        .prod-main .c-blanco .contenido .botones {
            width: 100%;
            padding: 2rem;
            display: flex;
            flex-direction: row;
            gap: 2rem;
        }

        .prod-main .c-blanco .contenido .botones a {
            text-decoration: none;
            margin: 0;
            padding: 0;
        }

        .prod-main .c-blanco .contenido button {
            height: 4rem;
            background-color: var(--green);
            border: 2px solid var(--green);
            padding: 1rem;
            width: 13rem;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            transition: ease all 0.2s;
        }

        .prod-main .c-blanco .contenido .hid-form {
            display: flex;
            flex-direction: column;
            padding: 3rem;
        }

        .prod-main .c-blanco .contenido button:hover {
            height: 4rem;
            background-color: #ccc;
            border: 2px solid var(--green);
            padding: 1rem;
            width: 13rem;
            color: #999;
            text-align: center;
            border-radius: 10px;
        }

        .prod-main .c-blanco .contenido .botones .contador {
            height: 4rem;
            border: 2px dotted var(--green);
            padding: 1rem;
            width: 13rem;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .prod-main .c-blanco .contenido .botones .contador p {
            color: var(--green);
            text-align: center;
            font-size: 2rem;
            margin: 0;
        }

        .prod-main .c-blanco .contenido .estatus {
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

        .prod-main .c-blanco .contenido .estatus div {
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
        }

        .prod-main .c-blanco .contenido .estatus div .ico {
            width: 1.5rem;
        }

        .prod-main .c-blanco .contenido .estatus div p {
            margin: 0;
            padding: 0.5rem;
        }

        .informacion {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .informacion .clic {
            width: 80%;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .informacion .clic .f-fondo {
            width: 3rem;
            height: 3rem;
            background-color: var(--green);
            padding: 1rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .informacion .clic .f-fondo img {
            width: 1.5rem;
        }

        .informacion .clic .t-info {
            min-width: 50%;
            height: 3rem;
            background-color: var(--green);
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .informacion .clic .t-info p {
            color: #fff;
            margin: 0;
            width: 100%;
            font-size: 1rem;
        }

        .informacion p {
            width: 60%;
            text-align: center;
            color: #7a7a7a;
            margin-top: 5rem;
        }

        .informacion .enlaces {
            width: 80%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .informacion .enlaces a {
            color: var(--green);
            font-size: 1.1rem;
            font-weight: 900;
        }

        .final-info {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5rem 0;
        }

        .final-info .opciones {
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

        .final-info .opciones .t-op {
            width: 32%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .final-info .opciones .t-op p {
            text-decoration: underline;
            font-weight: 900;
        }

        .final-info .opciones .t-op img {
            width: 60%;
        }

        .final-info .opciones .barra {
            width: 5px;
            height: 80%;
            border-radius: 15px;
            background-color: var(--green);
        }

        @media(min-width: 576px) and (max-width: 992px) {
            .prod-main .c-blanco {
                width: 95%;
            }

            .prod-main .c-blanco .imagen {
                width: 30%;
            }

            .prod-main .c-blanco .contenido {
                width: 70%;
            }

            .prod-main .c-blanco .contenido .tallas div:first-child,
            .prod-main .c-blanco .contenido .precio div:first-child {
                width: 20%;
            }

            .prod-main .c-blanco .contenido .tallas div:last-child {
                width: 80%;
                padding: 0 1rem;
            }

            .prod-main .c-blanco .contenido .precio div:last-child {
                width: 80%;
                padding: 0 1rem;
            }

            .prod-main .c-blanco .contenido .estatus {
                width: 100%;
            }

            .final-info .opciones {
                width: 90%;
                height: auto;

            }

            .final-info .opciones .t-op {
                padding: 1rem;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .prod-main .c-blanco {
                width: 95%;
                min-height: 30rem;
                flex-direction: column;
            }

            .prod-main .c-blanco .imagen {
                width: 100%;
                height: 25rem;
                padding: 1rem;
            }

            .prod-main .c-blanco .imagen img {
                width: 100%;
                height: 20rem;
                object-fit: cover;
            }

            .prod-main .c-blanco .contenido {
                width: 100%;
            }

            .prod-main .c-blanco .contenido .top-contenido {
                width: 100%;
                flex-direction: column;
                justify-content: center;
                align-items: center
            }

            .prod-main .c-blanco .contenido .top-contenido p {
                font-size: 1.5rem;
            }

            .prod-main .c-blanco .contenido p {
                text-align: justify;
            }

            .prod-main .c-blanco .contenido .tallas div:first-child,
            .prod-main .c-blanco .contenido .precio div:first-child {
                width: 30%;
            }

            .prod-main .c-blanco .contenido .tallas div:last-child {
                width: 70%;
            }

            .prod-main .c-blanco .contenido .precio div:last-child {
                width: 70%;
            }

            .prod-main .c-blanco .contenido .botones {
                width: 100%;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 1rem;
            }

            .prod-main .c-blanco .contenido .estatus {
                width: 80%;
                height: auto;
                flex-direction: column;
            }

            .informacion .clic .t-info {
                min-width: 50%;
                height: auto;
            }

            .informacion p {
                width: 80%;
            }

            .informacion .enlaces a {
                text-align: center;
            }

            .final-info .opciones {
                width: 95%;
                height: auto;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 1rem;
            }

            .final-info .opciones .t-op {
                width: 90%;
            }

            .final-info .opciones .t-op p {
                text-align: center;
            }
        }
    </style>

@endsection

@section('content')

    <section class="prod-main">
        <div class="c-blanco">
            <div class="imagen">
                @foreach ($imagen as $i)
                    <img src="{{ asset('img/photos/catalogo/' . $i->imagen) }}" alt="">
                @endforeach
            </div>
            <div class="contenido">
                <div class="top-contenido">
                    <p>{{ $articulo->nombre }}</p>
                    <p>${{ $articulo->precio }}MXN</p>
                </div>

                <p>{{ $articulo->descripcion }}</p>

                <div class="tallas">
                    <div>
                        <p>Tallas:</p>
                    </div>
                    <div>
                        @php $hayStock = false; @endphp

                        @foreach ($tallas as $t)
                            @if ($t->cantidad > 0)
                                @php $hayStock = true; @endphp
                                <label class="size-option">
                                    <input type="radio" name="size" value="{{ $t->talla }}"
                                        data-stock="{{ $t->cantidad }}">
                                    <span class="custom-radio"></span>
                                    <span>{{ $t->talla }} mx / Disponibles {{ $t->cantidad }}</span>
                                </label>
                            @endif
                        @endforeach

                        @if (!$hayStock)
                            <p>No stock disponible</p>
                        @endif




                        {{-- <label class="size-option">
                            <input type="radio" name="size" value="26mx">
                            <span class="custom-radio"></span>
                            <span>26 mx / Disponibles 1</span>
                        </label> --}}
                    </div>
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
                @if (Auth::check())
                    <div id="form-container" style="display: none;">
                        <form class="hid-form" action="carrito.agregar" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $articulo->id }}">
                            <input type="hidden" name="nombre" value="{{ $articulo->nombre }}">
                            <input type="hidden" name="precio" value="{{ $articulo->precio }}">
                            <input type="hidden" name="talla" id="input-talla">


                            <div class="input-group mb-3" style="width: 30%">
                                <span class="input-group-text" id="basic-addon1">Cantidad</span>
                                <input type="number" class="form-control" name="cantidad" id="input-cantidad"
                                    value="1" min="1" aria-describedby="basic-addon1" onkeydown="return false;">
                            </div>


                            <button type="submit" id="btn-comprar" disabled>COMPRAR</button>


                        </form>
                    </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Inicia sesión para comprar</a>
                @endif


                {{-- <div class="estatus">
                    <div>
                        <img class="ico" src="{{ asset('img/design/recursos/ico1.png') }}" alt="">
                        <p>APARTADO</p>
                    </div>
                    <div>
                        <img class="ico" src="{{ asset('img/design/recursos/ico2.png') }}" alt="">
                        <p>LIBERADO</p>
                    </div>
                    <div>
                        <img class="ico" src="{{ asset('img/design/recursos/ico3.png') }}" alt="">
                        <p>COMPRADO</p>
                    </div>

                </div> --}}
            </div>
        </div>
    </section>

    <section class="informacion">
        {{-- <div class="clic">
            <div class="f-fondo">
                <img src="{{ asset('img/design/recursos/ico1.png') }}" alt="">
            </div>
            <div class="t-info">
                <p>Tenis Samba Apartados ¡Espere a que el usuario complete su compra!</p>
            </div>
        </div> --}}
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
            the leap into electronic typesetting, remaining essentially unchanged.</p>
        <div class="enlaces">
            <a href="">POLITICAS Y CONDICIONES</a>
            <a href="">REGLAS DE COMPRA</a>
        </div>
    </section>

    <section class="final-info">
        <div class="opciones">
            <div class="t-op">
                <p>SELECCIONA TU PRODUCTO <br> AGREGALO AL CARRITO <br> INDICA A DONDE TFE LO VAMOS A ENVIAR <br> PAGA Y
                    RECIBE</p>
            </div>
            <div class="barra"></div>
            <div class="t-op">
                <p>COMPRAS SEGURAS CON PAYPAL</p>
            </div>
            <div class="barra"></div>
            <div class="t-op"><img src="{{ asset('img/design/recursos/paypal.png') }}" alt=""></div>
        </div>
    </section>

@endsection

@section('scripts')

    <script>
        $('.imagen').slick();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="size"]');
            const formContainer = document.getElementById('form-container');
            const inputTalla = document.getElementById('input-talla');
            const inputCantidad = document.getElementById('input-cantidad');
            const btnComprar = document.getElementById('btn-comprar');

            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const stock = parseInt(this.dataset.stock);
                    const talla = this.value;

                    inputTalla.value = talla;
                    inputCantidad.max = stock;
                    inputCantidad.value = 1;

                    btnComprar.disabled = false;
                    formContainer.style.display = 'block';
                });
            });
        });
    </script>


@endsection
