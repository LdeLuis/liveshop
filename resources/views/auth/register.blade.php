@extends('layouts.app')

@section('title', 'Registro')

@section('extracss')

<style>

    .sesion_main{
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
    }

    .sesion_main .iniciosesion{
        width: 90%;
        min-height: 30rem;
        background-color: #fff;
        border-radius: 15px;
        margin: 5%;
        padding: 5%;
    }

    .sesion_main .iniciosesion .content form{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .sesion_main .iniciosesion .content form p{
        width: 100%;
        height: 3px;
        background-color: #feb8ce;
        margin-bottom: 3rem;
    }

    .sesion_main .iniciosesion .content form h1{
        font-weight: 600;
        margin-bottom: 2rem;
    }

    .sesion_main .iniciosesion .content form label{
        font-size: 1.2rem;
    }

    .sesion_main .iniciosesion .content form input{
        width: 70%;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 1.5rem;
        background-color: rgb(238, 238, 238);
        border: none;
    }

    .sesion_main .iniciosesion .content form .extra{
        width: 70%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
        gap:1rem;
    }

    .sesion_main .iniciosesion .content form .extra .chico{
        width: 49%;
        display: flex;
        flex-direction: column;
    }
    .sesion_main .iniciosesion .content form .extra .chico input{
        width: 100%;
    }

    .sesion_main .iniciosesion .content form button{
        padding: 1rem 3rem;;
        background-color: #00ae64;
        color:#fff;
        border-radius: 15px;
        border: none;
        transition: 0.3s;
    }

    .sesion_main .iniciosesion .content form button:hover{
        background-color.: #039858;
        transform: scale(1.2);

    }

    .sesion_main .iniciosesion .content form .enlaces{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .sesion_main .iniciosesion .content form .enlaces a{
        color: #feb8ce;
        font-weight: 700;
        transition: 0.3s;
    }

    .sesion_main .iniciosesion .content form .enlaces a:hover{
        color: var(--pink2)
    }

    @media(min-width: 576px) and (max-width: 992px){

        .sesion_main .iniciosesion{
            margin: 10% 5%;
        }

        .sesion_main .iniciosesion .content form input{
            width: 80%;
        }

        .sesion_main .iniciosesion .content form .extra{
            width: 80%;
        }

        .sesion_main .iniciosesion .content form .extra .chico{
            width: 48%;
        }
    }

    @media(min-width: 0px) and (max-width: 576px){
        .sesion_main .iniciosesion{
            margin: 20% 5%;
        }

        .sesion_main .iniciosesion .content form input{
            width: 95%;
        }

        .sesion_main .iniciosesion .content form .extra{
            width: 95%;
        }

        .sesion_main .iniciosesion .content form .extra .chico{
            width: 100%;
        }

        .sesion_main .iniciosesion .content form .extra .chico label{
            width: 100%;
            text-align: center;
        }
    }
    
</style>

@endsection

@section('content')

<section class="sesion_main">
    <div class="iniciosesion">
        <div class="content">

            @if($errors->any())
                <ul style="color: red;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <h1>Crear cuenta</h1>
                <p></p>
            
                <label for="nombre">*Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Nombre" required>
                
                <label for="email">*Correo:</label>
                <input type="email" name="email" id="email" placeholder="Correo electrónico" required>
            
                <label for="contrasena">*Contraseña:</label>
                <input type="password" name="password" id="contrasena" placeholder="Contraseña (mínimo 8 carácteres)" required>

                <label for="contrasena2">*Confirmar contraseña:</label>
                <input type="password" name="password_confirmation" id="contrasena2" placeholder="Confirmar contraseña (mínimo 8 carácteres)" required>

                <div class="extra">
                    <div class="chico">
                        <label for="telefono">*Teléfono:</label>
                        <input type="int" name="telefono" id="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="chico">
                        <label for="calle">*Calle:</label>
                        <input type="text" name="calle" id="calle" placeholder="Calle" required>
                    </div>
                    <div class="chico">
                        <label for="next">*Número exterior:</label>
                        <input type="text" name="next" id="next" placeholder="Número esterior" required>
                    </div>
                    <div class="chico">
                        <label for="nint">Número interior:</label>
                        <input type="text" name="nint" id="nint" placeholder="Número interior" >
                    </div>
                    <div class="chico">
                        <label for="entrecalles">*Entre calles:</label>
                        <input type="text" name="entrecalles" id="entrecalles" placeholder="Entre calles" required>
                    </div>
                    <div class="chico">
                        <label for="pais">*Pais:</label>
                        <input type="text" name="pais" id="pais" placeholder="Pais" value="México" required>
                    </div>
                    <div class="chico">
                        <label for="estado">*Estado:</label>
                        <input type="text" name="estado" id="estado" placeholder="Estado" required>
                    </div>
                    <div class="chico">
                        <label for="municipio">*Municipio:</label>
                        <input type="text" name="municipio" id="municipio" placeholder="Munucipio" required>
                    </div>
                    <div class="chico">
                        <label for="colonia">*Colonia:</label>
                        <input type="text" name="colonia" id="colonia" placeholder="Colonia" required>
                    </div>
                    <div class="chico">
                        <label for="codigop">*Código Postal:</label>
                        <input type="int" name="codigop" id="codigop" placeholder="Código postal" required>
                    </div>
                </div>

            
                <button type="submit">Crear</button>
            </form>
            
        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection