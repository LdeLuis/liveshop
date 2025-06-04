@extends('layouts.app')

@section('title', 'Catalogo')

@section('extracss')

    <style>
        /* From Uiverse.io by Praashoo7 */
        /* Hide the default checkbox */
        /* From Uiverse.io by gharsh11032000 */
        .radio-button-container {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .radio-button {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .radio-button__input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .radio-button__label {
            display: inline-block;
            padding-left: 30px;
            margin-bottom: 10px;
            position: relative;
            font-size: 15px;
            color: #f2f2f2;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .radio-button__custom {
            position: absolute;
            top: 0;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #555;
            transition: all 0.3s ease;
        }

        .radio-button__input:checked+.radio-button__label .radio-button__custom {
            background-color: #e6d558;
            border-color: transparent;
            transform: scale(0.8);
            box-shadow: 0 0 20px #e9b65080;
        }

        .radio-button__input:checked+.radio-button__label {
            color: #4c8bf5;
        }

        .radio-button__label:hover .radio-button__custom {
            transform: scale(1.2);
            border-color: #4c8bf5;
            box-shadow: 0 0 20px #4c8bf580;
        }

        h2 {
            margin: 5rem 0 2rem 0;
        }

        #carrito-lista-2 {
            display: flex;
            flex-direction: column;
            padding: 2rem 2.5rem 1rem 2.5rem;
            background-color: #fff;
            border-radius: 15px;
            width: 80%;
            /* row-gap: 3rem; */
        }

        .close-btn-carr {
            margin-left: auto;
            border: none;
            background-color: transparent;
        }

        #carrito-lista-2 article {
            /* background-color: red; */
            display: flex;
            flex-direction: row;
            margin-bottom: 3rem;
            justify-content: space-between;
            align-items: center;
            /* background-color: red */
        }

        #carrito-lista-2 article:last-of-type {
            margin-bottom: 0rem
        }

        #carrito-lista-2 article img {
            width: 10%;
            height: 5rem;
            object-fit: contain;
            margin-right: 0.5rem;
        }

        .botones-carr {
            display: flex;
            flex-direction: row;
            column-gap: 0.5rem;
        }

        .botones-carr button:first-of-type {
            border: none;
            background-color: var(--green);
            color: #fff;
            border-radius: 6px;
            padding: 0.5rem 1rem;
        }

        .botones-carr button:last-of-type {
            margin-left: auto;
            background-color: transparent;
            border: none;
            color: red;
        }

        .botones-carr button:last-of-type i {
            font-size: 1.2rem
        }

        .style-btn-comprar-2 {
            border-radius: 15px;
            width: 80%;
            height: 3rem;
            border: none;
            background-color: var(--blue);
            color: #fff;
            margin-bottom: 10rem
        }

        .style-btn-comprar-2:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .cont-ubis {
            margin-bottom: 10rem;
            display: flex;
            flex-direction: column;
            row-gap: 1rem;
            background-color: #fff;
            border-radius: 15px;
            width: 80%;
            padding: 2rem 2.5rem 2rem 2.5rem;

        }

        .ubicaciones {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-around;
            align-items: center;
            column-gap: 1rem;
        }

        .ubicaciones .textos-ubi {
            display: flex;
            flex-direction: row;
            /* width: auto; */
            justify-content: space-around;
            column-gap: 1rem;
            width: 100%;
        }

        .ubicaciones .textos-ubi p {
            padding: 0;
            margin: 0;
            /* background-color: red; */
            width: 20rem;
        }
    </style>

@endsection

@section('content')

    <form style="width:100%; display:flex;flex-direction:column; justify-content:center; align-items:center" action="{{route('front.ticket')}}" method="POST">
        @csrf
        <h2>Resumen de pedido:</h2>
        <div id="carrito-lista-2">
            @if (session()->has('carrito') && count(session('carrito')) > 0)
                @foreach (session('carrito') as $clave => $item)
                    @php
                        $articulo = \App\Imagen::where('seccion', $item['id'])->first();
                        $talla = \App\Talla::where('seccion', $item['id'])->where('talla', $item['talla'])->first();
                    @endphp

                    <article class="item-carrito-2" data-clave="{{ $clave }}" data-precio="{{ $item['precio'] }}">
                        <img src="{{ asset('img/photos/catalogo/' . $articulo->imagen) }}" alt="">
                        {{ $item['nombre'] }} - Talla: {{ $item['talla'] }} <br>
                        <p>Precio: $ {{ $item['precio'] }} MXN</p>
                        Cantidad:
                        <div class="botones-carr">
                            <input type="number" class="cantidad-input-2 form-control" value="{{ $item['cantidad'] }}"
                                min="1" max="{{ $talla->cantidad ?? 10 }}" onkeydown="return false;">
                            <button class="btn-actualizar-2">Actualizar</button>
                            <button class="btn-eliminar-2"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </article>
                @endforeach

                <div class="carrito-total-wrapper"
                    style="display: flex; justify-content: space-between; padding: 0 2rem; margin-top: 1rem;">
                    <p>Total:</p>
                    <p id="total-carrito-2">$0.00 MXN</p>
                </div>
            @else
                <p>El carrito está vacío</p>
            @endif
        </div>


        <h2>Seleccione punto de entrega:</h2>

        <div class="cont-ubis">
            @foreach ($direcciones as $u)
                <section class="ubicaciones">
                    <div class="radio-button-container">
                        <div class="radio-button">
                            <input required type="radio" class="radio-button__input" id="radio{{ $u->id }}"
                                name="radiolugar" value="{{$u->id}}">
                            <label class="radio-button__label" for="radio{{ $u->id }}">
                                <span class="radio-button__custom"></span>
                            </label>
                        </div>
                    </div>
                    <div class="textos-ubi">
                        <p>{{ $u->nombre }}</p>
                        <p>{{ $u->descripcion }}</p>
                        <a href="{{ $u->url }}" target="__blank">Abrir en maps</a>
                    </div>
                </section>
            @endforeach
        </div>

        <button class="style-btn-comprar-2">FINALIZAR COMPRA</button>

    </form>

@endsection

@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function calcularTotalCarrito2() {
                let total = 0;
                const carrito = document.getElementById('carrito-lista-2');
                if (!carrito) return;

                const items = carrito.querySelectorAll('.item-carrito-2');
                items.forEach(item => {
                    const precio = parseFloat(item.dataset.precio) || 0;
                    const cantidadInput = item.querySelector('.cantidad-input-2');
                    const cantidad = parseInt(cantidadInput?.value) || 0;
                    total += precio * cantidad;
                });

                const totalElemento = document.getElementById('total-carrito-2');
                if (totalElemento) {
                    totalElemento.textContent = `$ ${total.toFixed(2)} MXN`;
                }
            }

            calcularTotalCarrito2();

            document.getElementById('carrito-lista-2').addEventListener('input', function(e) {
                if (e.target.classList.contains('cantidad-input-2')) {
                    calcularTotalCarrito2();
                }
            });

            document.getElementById('carrito-lista-2').addEventListener('click', function(e) {
                const actualizarBtn = e.target.closest('.btn-actualizar-2');
                const eliminarBtn = e.target.closest('.btn-eliminar-2');

                if (actualizarBtn) {
                    const item = actualizarBtn.closest('.item-carrito-2');
                    const clave = item.dataset.clave;
                    const cantidad = item.querySelector('.cantidad-input-2').value;

                    fetch("{{ route('carrito.actualizar') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                clave,
                                cantidad
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success(data.mensaje);
                                calcularTotalCarrito2();
                            } else {
                                toastr.error(data.mensaje);
                            }
                        });
                }

                if (eliminarBtn) {
                    const item = eliminarBtn.closest('.item-carrito-2');
                    const clave = item.dataset.clave;

                    fetch("{{ route('carrito.eliminar') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                clave
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                item.remove();
                                calcularTotalCarrito2();
                                if (document.querySelectorAll('.item-carrito-2').length === 0) {
                                    document.getElementById('carrito-lista-2').innerHTML =
                                        '<p>El carrito está vacío</p>';
                                }
                                toastr.success(data.mensaje);
                            } else {
                                toastr.error(data.mensaje);
                            }
                        });
                }
            });
        });
    </script>





@endsection
