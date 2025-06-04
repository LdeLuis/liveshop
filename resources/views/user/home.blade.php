@extends('layouts.app')

@section('title', 'Perfil')

@section('extracss')

<style>

    .sesion_main{
        width: 100%;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .sesion_main .iniciosesion{
        width: 90%;
        background-color: #fff;
        border-radius: 15px;
        margin: 5% 5% 0 5%;
        padding: 1rem;
    }

    .sesion_main .iniciosesion button{
        background-color: transparent;
        color: #feb8ce;
        border: none;
        float: right
    }
    
    .sesion_main .iniciosesion button i{
        font-size: 1.5rem
    }

    .sesion_main .iniciosesion .contenedor{
        width: 100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: start;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta{
        width: 30%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 1rem;
        border-radius: 25px;
        position: relative;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta img{
        width: 100%;
        object-fit: cover;
        margin-top: 2rem;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta .cambiar-imagen {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #feb8ce;
        color: #fff;
        text-align: center;
        padding: 0.8rem;
        border-radius: 0 0 25px 25px;
        font-size: 0.9rem;
        cursor: pointer;
        display: none;
        transition: all 0.3s ease;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta:hover .cambiar-imagen {
        display: block;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta .input-imagen {
        display: none;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta form{
        width: 100%;
        height: 100%;

    }


    .sesion_main .iniciosesion .contenedor .tarjeta input{
        width: 100%;
        height: 2rem;;
        margin-bottom: 1rem;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta p{
        width: 90%;
        height: 3px;
        background-color: #feb8ce;
        margin-bottom: 3rem;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta button{
        background-color: transparent;
        border: 1px solid var(--green);
        width: 100%;
        padding: 0.5rem;
        border-radius: 15px;
        color: var(--green);
        transition: 0.3s;
    }

    .sesion_main .iniciosesion .contenedor .tarjeta button:hover{
        background-color: var(--green) ;
        color: #fff;
    }

    .sesion_main .historial{
        width: 90%;
        background-color: #fff;
        border-radius: 15px;
        margin: 5%;
        padding: 2rem;
    }

    .sesion_main .historial .barra{
        width: 100%;
        height: 3px;
        background-color: #feb8ce;
        margin-bottom: 3rem;
    }

    .sesion_main .historial .collapse-up{
        width: 100%;
        border: 1px solid #feb8ce;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        background-color: transparent;
        color: #feb8ce;
        padding: 0.5rem;
        transition: 0.3s ease;
    }

    .collapse-container {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        gap:1rem;
    }

    .collapse-header {
        width: 100%;
        background-color: #feb8ce;
        color: white;
        padding: 15px;
        cursor: pointer;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s;
    }

    .collapse-header:hover {
      background-color: #ff7ea7;
    }

    .collapse-icon {
      transition: transform 0.3s;
    }

    .collapse-icon.rotate {
      transform: rotate(180deg);
    }

     /* Contenedor general del contenido que se despliega */
    .collapse-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease, padding 0.3s;
        background: #f9f9f9;
        padding: 0 15px;
        display: flex;
        flex-direction: column;
    }

    /* Contenedor individual de cada producto */
    .producto-item {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 1rem;
        margin: 1rem 0;
        flex-wrap: wrap; /* opcional: permite que se adapte en pantallas pequeñas */
    }

    /* Imagen del producto */
    .producto-item img {
        height: 100px;
        object-fit: cover;
        border-radius: 15px;
    }

    /* Contenedor .content opcional (puede quedar vacío o usarse para padding extra) */
    .content {
        padding: 1rem 0 0 0;
    }

    /* Total al final */
    .collapse-content .total {
        width: 100%;
        margin: 1rem 0 2rem 0;
        padding: 0 2rem;
        text-align: end;
        font-weight: 700;
    }

    /* Espacio entre bloques de ticket */
    .collapse-item {
        margin-bottom: 1rem;
    }

    .collapse-item:last-child {
        margin-bottom: 0;
    }

    /* Cuando se expande el contenido */
    .collapse-content.open {
        padding: 0 15px;
        max-height: 550px; 
        overflow-y: auto;
    }



    @media(min-width: 576px) and (max-width: 992px){
        .sesion_main .iniciosesion{
            margin: 10% 5% 0 5%;
        }

        .sesion_main .iniciosesion .contenedor .tarjeta:first-child{
            width: 60%; 
        }
        .sesion_main .iniciosesion .contenedor .tarjeta{
            width: 50%; 
        }

        .sesion_main .historial{
            margin: 5% 5% 10% 5%;
        }
    }

    @media(min-width: 0px) and (max-width: 576px){
        .sesion_main .iniciosesion{
            margin: 20% 5% 0 5%;
        }

        .sesion_main .iniciosesion .contenedor .tarjeta{
            width: 900%; 
        }

        .sesion_main .historial{
            margin: 5% 5% 20% 5%;
        }
    }

</style>

@endsection

@section('content')

    <section class="sesion_main"> 
        <div class="iniciosesion">
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Datos generales</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.update') }}" method="POST">
                            @csrf
                            @method('PUT') 
                                <input type="text" class="form-control" name="name" value="{{ $usuario->name }}" placeholder="Nombre">
                                <input type="text" class="form-control" name="email" value="{{ $usuario->email }}" placeholder="Correo eléctronico">
                                <input type="text" class="form-control" name="telefono" value="{{ $usuario->telefono }}" placeholder="Teléfono">
                                <input type="text" class="form-control" name="calle" value="{{ $usuario->calle }}" placeholder="Calle">
                                <input type="text" class="form-control" name="next" value="{{ $usuario->next }}" placeholder="Número exterior">
                                <input type="text" class="form-control" name="nint" value="{{ $usuario->nint }}" placeholder="Número interior">
                                <input type="text" class="form-control" name="entrecalles" value="{{ $usuario->entrecalles }}" placeholder="Entre calles">
                                <input type="text" class="form-control" name="pais" value="{{ $usuario->pais }}" placeholder="País">
                                <input type="text" class="form-control" name="estado" value="{{ $usuario->estado }}" placeholder="Estado">
                                <input type="text" class="form-control" name="municipio" value="{{ $usuario->municipio }}" placeholder="Municipio">
                                <input type="text" class="form-control" name="colonia" value="{{ $usuario->colonia }}" placeholder="Colonia">
                                <input type="text" class="form-control" name="codigop" value="{{ $usuario->codigop }}" placeholder="Código postal">
                                
                                <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contenedor">
                
                <div class="tarjeta">

                    <img src="{{ asset('img/photos/usuarios/' . $usuario->foto) }}" alt="Foto perfil">

                    <form id="form-imagen" action="{{ route('user.actualizar.imagen') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="cambiar-imagen" for="imagenInput">Cambiar imagen</label>
                        <input type="file" name="foto" id="imagenInput" class="input-imagen" accept="image/*" onchange="document.getElementById('form-imagen').submit();">
                    </form>
                </div>

                    
                <div class="tarjeta">
                    

                    <form action="{{ route('user.update_password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h4>Bienvenido: {{ $usuario->name }}</h4>
                        <p></p>
                        <input type="text" name="nombre_u" class="form-control" value="{{ $usuario->name }}" readonly>
                        <input type="text" name="correo_u" class="form-control" value="{{ $usuario->email }}" readonly>

                        <h4 style="margin: 3rem 0 0.5rem 0">Cambiar contraseña:</h4>
                        <p></p>

                        <label for="pass_u" class="form-control-label">Nueva contraseña</label>
                        <input type="password" name="password" class="form-control" required>

                        <label for="pass_u_confirmation" class="form-control-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required>

                        <button type="submit" class="btn btn-primary mt-3">Cambiar contraseña</button>
                    </form>                    
                </div>
                
                <div class="tarjeta">
                    

                    <h4>Datos generales:</h4>
                    <p></p>
                    <input type="text" class="form-control" name="telefono" value="{{ $usuario->telefono }}" placeholder="Teléfono" readonly>
                    <input type="text" class="form-control" name="calle" value="{{ $usuario->calle }}" placeholder="Calle" readonly>
                    <input type="text" class="form-control" name="next" value="{{ $usuario->next }}" placeholder="Número exterior" readonly>
                    <input type="text" class="form-control" name="nint" value="{{ $usuario->nint }}" placeholder="Número interior" readonly>
                    <input type="text" class="form-control" name="entrecalles" value="{{ $usuario->entrecalles }}" placeholder="Entre calles" readonly>
                    <input type="text" class="form-control" name="pais" value="{{ $usuario->pais }}" placeholder="País" readonly>
                    <input type="text" class="form-control" name="estado" value="{{ $usuario->estado }}" placeholder="Estado" readonly>
                    <input type="text" class="form-control" name="municipio" value="{{ $usuario->municipio }}" placeholder="Municipio" readonly>
                    <input type="text" class="form-control" name="colonia" value="{{ $usuario->colonia }}" placeholder="Colonia" readonly>
                    <input type="text" class="form-control" name="codigop" value="{{ $usuario->codigop }}" placeholder="Código postal" readonly>
                    
                    
                </div>

            </div>
        </div>

        <div class="historial">
            <h2>Historial de compras</h2>
            <p class="barra"></p>
           <div class="collapse-container">
                @foreach ($tickets as $t)
                    <div class="collapse-header" onclick="toggleCollapse(this)">
                        {{ $t->ticket }}
                        <span class="collapse-icon">&#9660;</span>
                    </div>
                    <div class="collapse-content">
                        @foreach ($t->productos_array as $producto)
                            <div class="content">
                                <div class="producto-item">
                                    <img src="{{ $producto['imagen_url'] }}" alt="{{ $producto['name'] }}">
                                    <p>{{ $producto['cantidad'] }}x {{ $producto['name'] }}</p>
                                    <p>Talla: {{ $producto['talla'] }}</p>
                                    <p>Subtotal: ${{ number_format($producto['subtotal'], 2, ',', '.') }}</p>
                                    
                                    
                                </div>
                            </div>
                        @endforeach
                        <p class="total">Estado:  {{ $t->estado }} <br>  Total: ${{ $t->total }}</p>
                    </div>
                @endforeach

            </div>

        </div>

    </section>


@endsection

@section('scripts')
    <script>
        function toggleCollapse(header) {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.collapse-icon');
            content.classList.toggle('open');
            icon.classList.toggle('rotate');
        }
    </script>
@endsection      
