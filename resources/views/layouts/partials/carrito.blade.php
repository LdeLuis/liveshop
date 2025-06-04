<style>
    #carrito-lista {
        display: flex;
        flex-direction: column;
        padding: 1rem 2.5rem 1rem 2.5rem;
        /* row-gap: 3rem; */
    }

    .close-btn-carr {
        margin-left: auto;
        border: none;
        background-color: transparent;
    }

    #carrito-lista article {
        /* background-color: red; */
        display: flex;
        flex-direction: column;
        margin-bottom: 3rem
    }

    #carrito-lista article:last-of-type {
        margin-bottom: 0rem
    }

    #carrito-lista article img {
        width: 20%;
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
</style>

<div id="carrito-lista">
    @if (session()->has('carrito') && count(session('carrito')) > 0)
        <button class="close-btn-carr">Cerrar <i class="fa-solid fa-xmark close-btn-carr"></i></button>

        @foreach (session('carrito') as $clave => $item)
            @php
                $articulo = \App\Imagen::where('seccion', $item['id'])->first();
                $talla = \App\Talla::where('seccion', $item['id'])->where('talla', $item['talla'])->first();
            @endphp

            {{-- @dump($item, $articulo) --}}
            <article class="item-carrito" data-clave="{{ $clave }}" data-precio="{{ $item['precio'] }}">
                <img src="{{ asset('img/photos/catalogo/' . $articulo->imagen) }}" alt="">

                {{ $item['nombre'] }} - Talla: {{ $item['talla'] }} <br>
                <p>Precio: $ {{$item['precio']}} MXN</p>
                Cantidad:
                <div class="botones-carr">
                    <input type="number" class="cantidad-input form-control" value="{{ $item['cantidad'] }}"
                        min="1" max="{{ $talla->cantidad ?? 10 }}" onkeydown="return false;">

                    <button class="btn-actualizar">Actualizar</button>
                    <button class="btn-eliminar"><i class="fa-solid fa-trash"></i></button>
                </div>
            </article>
        @endforeach
    @else
        <button class="close-btn-carr">Cerrar <i class="fa-solid fa-xmark close-btn-carr"></i></button>
        <p>El carrito está vacío</p>
    @endif
</div>



<script>
    document.querySelectorAll('.btn-actualizar').forEach(button => {
        button.addEventListener('click', function() {
            const item = this.closest('.item-carrito');
            const clave = item.dataset.clave;
            const cantidad = item.querySelector('.cantidad-input').value;

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

                    } else {
                        toastr.error(data.mensaje);
                    }
                });
        });
    });

    document.querySelectorAll('.btn-eliminar').forEach(button => {
        button.addEventListener('click', function() {
            const item = this.closest('.item-carrito');
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

                        // Verifica si ya no quedan productos en el carrito
                        if (document.querySelectorAll('.item-carrito').length === 0) {
                            document.querySelector('#carrito-lista').innerHTML = `
                            <button class="close-btn-carr">Cerrar <i class="fa-solid fa-xmark close-btn-carr"></i></button>
        <p>El carrito está vacío</p>
                    `;

                            toastr.success(data.mensaje);
                        }
                    } else {
                        toastr.error(data.mensaje);
                    }
                });
        });
    });
</script>
