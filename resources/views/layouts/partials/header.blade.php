<style>
    header {
        width: 100%;
        height: 10rem;
        display: flex;
        position: relative;
        z-index: 10;
        flex-direction: column;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url({{ asset('img/design/recursos/shape2.png') }})
    }

    header .top-header {
        width: 100%;
        height: 3.5rem;
        background-color: #00ae64;
        display: flex;
        justify-content: space-around;
    }

    header .top-header div:first-child {
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 0.7rem;
    }

    header .top-header div:first-child .rosa {
        color: #feb8ce;
        font-size: 1.2rem;
        margin: 0;
        letter-spacing: 0.2rem;
    }

    header .top-header div:first-child .blanca {
        color: #fff;
        font-size: 1.2rem;
        margin: 0;
        letter-spacing: 0.2rem;
    }

    header .top-header div:last-child {
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1.2rem;
    }

    header .top-header div:last-child a i {
        color: #feb8ce;
        font-size: 1.8rem
    }

    header .h-main {
        width: 100%;
        height: 6.5rem;
        position: relative;
        display: flex;
        justify-content: right;
        align-items: center;
        padding: 1rem 8rem;

    }

    header .h-main .img1 {
        width: 15rem;
        left: 50%;
        position: absolute;
        bottom: 0;
        transform: translate(-50%, 50%)
    }

    header .h-main .sesion {
        text-decoration: none;
        color: var(--green);
        font-size: 1.2rem;
    }

    header .h-main a .ico1 {
        width: 3.3rem;
        margin-left: 1rem;
    }

    header .h-main a .ico2 {
        width: 3.3rem;
        margin-left: 0.5rem;
    }

    header .h-main .menu-toggle {
        display: none;
    }


    /* Modal Styles */
    .menu-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        /* Fondo oscuro */
        z-index: 9999;
        justify-content: center;
        align-items: start;
        padding-top: 10rem;
    }

    .menu-content {
        background-color: white;
        padding: 20px;
        text-align: center;
        width: 80%;
        max-width: 300px;
        border-radius: 8px;
    }

    .menu-content a {
        display: block;
        padding: 15px;
        color: black;
        text-decoration: none;
        font-size: 18px;
        border-bottom: 1px solid #ddd;
        transition: 0.3s;
    }

    .menu-content a:hover {
        background-color: #f1f1f1;
    }

    .menu-content form button {
        display: block;
        padding: 15px;
        color: black;
        text-decoration: none;
        font-size: 18px;
        border-bottom: 1px solid #ddd;
        transition: 0.3s;
        margin: 0 auto;
    }

    .menu-content form button:hover {
        background-color: #f1f1f1;
    }

    .menu-content .close-btn {
        background: none;
        border: none;
        color: #000;
        font-size: 30px;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    header .h-main .menu-toggle {
        display: none;
        border: none;
        background-color: transparent;
        font-size: 2.5rem;
        margin-top: 0;
    }

    #carritoContenedor {
        position: fixed;
        right: 0px;
        top: 0rem;
        background: #fff;
        border: 1px solid #ccc;
        z-index: 99999;
        width: 20rem;
        max-height: 90vh;
        overflow: scroll;
        border-bottom-left-radius: 13px;
        border-bottom-right-radius: 13px;
        /* border-top-left-radius: 13px; */

    }

    .style-btn-comprar {
        border-bottom-left-radius: 13px;
        border-bottom-right-radius: 13px;
        width: 100%;
        height: 3rem;
        border: none;
        background-color: var(--blue);
        color: #fff;
    }

    .style-btn-comprar:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    @media(min-width: 576px) and (max-width: 992px) {
        header {
            background-size: cover;

        }

        header .top-header div:first-child .rosa {
            font-size: 0.8rem;
            letter-spacing: 0;
        }

        header .top-header div:first-child .blanca {
            font-size: 0.8rem;
            letter-spacing: 0;
        }

        header .top-header div:last-child a i {
            font-size: 1rem
        }

        header .h-main {
            padding: 1rem;

        }


        header .h-main .sesion {
            font-size: 1rem;
        }

        header .h-main a .ico1 {
            width: 2.3rem;
        }

        header .h-main a .ico2 {
            width: 2.3rem;
        }

    }

    @media(min-width: 0px) and (max-width: 576px) {
        header {
            background-size: cover;

        }

        header .top-header div a i {
            font-size: 1.5rem
        }

        header .h-main {
            padding: 0.2rem 1rem;
        }



        header .h-main .sesion {
            display: none;
        }

        header .h-main a .ico1 {
            display: none;
        }

        header .h-main a .ico2 {
            display: none;
        }

        header .h-main .menu-toggle {
            display: block;
            border: none;
            background-color: transparent;
            font-size: 2.5rem;
            margin-top: 0;

        }

        header .h-main .menu-toggle {
            display: block;
        }

    }
</style>

<header>
    <div class="top-header">
        {{-- <div>
            <p class="rosa">PROXIMÁ FECHA DE VENTA</p>
            <p class="blanca">EN VIVO</p>
            <p class="rosa">14 DE FEBRERO</p>
            <p class="blanca">7:00 PM</p>
            <p class="rosa">HORARIO CDMX</p>
        </div> --}}
        <div>
            <a href="{{ $config->whatsapp }}"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="{{ $config->instagram }}"><i class="fa-brands fa-instagram"></i></a>
            <a href="{{ $config->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
        </div>
    </div>
    <div class="h-main">
        <a href="{{ route('front.home') }}"><img class="img1" src="{{ asset('img/design/recursos/logo.png') }}"
                alt=""></a>

        @guest
            <a href="{{ route('login') }}" class="sesion">Inicio de sesión</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="sesion" style="border: none; background-color:transparent;">Cerrar
                    sesión</button>
            </form>
        @endauth



        <a href="{{ route('user.home') }}"><img class="ico1" src="{{ asset('img/design/recursos/user.png') }}"
                alt=""></a>

        @auth
            <a id="carritoToggle">
                <img class="ico2" src="{{ asset('img/design/recursos/shop.png') }}" alt="">
            </a>
        @endauth
        <div id="carritoContenedor" style="display:none">
            <div id="carrito-contenedor">
                @include('layouts.partials.carrito')
            </div>
            <div class="carrito-total-wrapper"
                style="display: flex; justify-content: space-between; padding: 0 2rem; margin-top: 1rem;">
                <p>Total:</p>
                <p class="total-monto">$0.00 MXN</p>
            </div>

            <form action="{{ route('front.detalleCarrito') }}" method="GET">
                @csrf
                <button class="style-btn-comprar" disabled>FINALIZAR COMPRA</button>
            </form>
<<<<<<< HEAD
=======

>>>>>>> 2e6aa80 (cambios pasarela de pago)
        </div>

        <a href="#" id="menuIcon">
            <img class="ico2" src="{{ asset('img/design/recursos/menu.png') }}" alt="">
        </a>

        <button class="menu-toggle">☰</button>
    </div>
</header>

<div id="menuModal" class="menu-modal">
    <div class="menu-content">
<<<<<<< HEAD
        <a href="{{route('front.home')}}">Inicio</a>
        <a href="{{route('front.nosotros')}}">Catalogo</a>
        <a id="carritoToggleTexto">
            Carrito
        </a>
        
        <a href="{{route('user.home')}}">Usuario</a>
        
=======
        <a href="{{ route('front.home') }}">Inicio</a>
        <a href="{{ route('front.nosotros') }}">Catalogo</a>
        <a id="carritoToggle">
            Carrito
        </a>
        <a href="{{ route('user.home') }}">Usuario</a>

>>>>>>> 2e6aa80 (cambios pasarela de pago)
        @guest
            <a href="{{ route('login') }}" class="sesion">Inicio de sesión</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="sesion" style="border: none; background-color:transparent;">Cerrar
                    sesión</button>
            </form>
        @endauth

        <button class="close-btn"></button>
    </div>
</div>


<script>
    // Obtener el modal y botones
    const menuModal = document.getElementById('menuModal');
    const menuToggle = document.querySelector('.menu-toggle');
    const menuIcon = document.getElementById('menuIcon');
    const closeBtn = document.querySelector('.close-btn');

    // Abrir el modal desde el botón ☰
    menuToggle.addEventListener('click', () => {
        menuModal.style.display = 'flex';
    });

    // Abrir el modal desde el icono del menú (imagen)
    menuIcon.addEventListener('click', (e) => {
        e.preventDefault();
        menuModal.style.display = 'flex';
    });

    // Cerrar el modal con el botón de cerrar
    closeBtn.addEventListener('click', () => {
        menuModal.style.display = 'none';
    });

    // Cerrar si se hace clic fuera del contenido
    window.addEventListener('click', (e) => {
        if (e.target === menuModal) {
            menuModal.style.display = 'none';
        }
    });
</script>

<script>
    // Función para mostrar/ocultar el carrito
    function toggleCarrito() {
        const carrito = document.getElementById('carritoContenedor');
        carrito.style.display = carrito.style.display === 'none' ? 'block' : 'none';
    }

    // Asignar evento al botón del ícono (fuera del modal)
    const carritoToggle = document.getElementById('carritoToggle');
    if (carritoToggle) {
        carritoToggle.addEventListener('click', toggleCarrito);
    }

    // Asignar evento al botón de texto dentro del modal
    const carritoToggleTexto = document.getElementById('carritoToggleTexto');
    if (carritoToggleTexto) {
        carritoToggleTexto.addEventListener('click', () => {
            toggleCarrito(); // mostrar/ocultar carrito
            document.getElementById('menuModal').style.display = 'none'; // cerrar modal
        });
    }

    // Delegación para botón de cerrar del carrito (si lo usas dentro del carrito)
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('close-btn-carr')) {
            toggleCarrito();
        }
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Evento para vaciar el carrito
        document.body.addEventListener('click', function(e) {
            if (e.target.id === 'vaciar-carrito') {
                fetch('{{ route('carrito.vaciar') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('carrito-dropdown').innerHTML = data.html;
                            toastr.success('Carrito vaciado correctamente');
                        }
                    })
                    .catch(err => {
                        console.error('Error vaciando carrito:', err);
                    });
            }
        });
    });
</script>

<script>
    function calcularTotalCarrito() {
        let total = 0;
        const items = document.querySelectorAll('.item-carrito');

        items.forEach(item => {
            const precio = parseFloat(item.dataset.precio);
            const cantidad = parseInt(item.querySelector('.cantidad-input').value);
            total += precio * cantidad;
        });

        const totalElemento = document.querySelector('.total-monto');
        if (totalElemento) {
            totalElemento.textContent = `$ ${total.toFixed(2)} MXN`;
        }

        localStorage.setItem('totalCarrito', total.toFixed(2));

        // ✅ Desactivar el botón si el total es 0 o no hay productos
        const botonCompra = document.querySelector('.style-btn-comprar');
        if (botonCompra) {
            botonCompra.disabled = (items.length === 0 || total <= 0);
        }
    }

    // Calcular el total al cargar
    document.addEventListener('DOMContentLoaded', calcularTotalCarrito);

    // Calcular al cambiar cantidades
    document.querySelectorAll('.cantidad-input').forEach(input => {
        input.addEventListener('change', calcularTotalCarrito);
    });

    // También al actualizar producto
    document.querySelectorAll('.btn-actualizar').forEach(button => {
        button.addEventListener('click', () => {
            setTimeout(calcularTotalCarrito, 300); // pequeño delay para esperar actualización
        });
    });

    // Y al eliminar producto
    document.querySelectorAll('.btn-eliminar').forEach(button => {
        button.addEventListener('click', () => {
            setTimeout(calcularTotalCarrito, 300);
        });
    });
</script>
