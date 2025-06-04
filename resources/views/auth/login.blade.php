@extends('layouts.app')

@section('title', 'Sesión')

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

        .sesion_main .iniciosesion .content{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .sesion_main .iniciosesion .content p{
            width: 100%;
            height: 3px;
            background-color: #feb8ce;
            margin-bottom: 3rem;
        }

        .sesion_main .iniciosesion .content form{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .sesion_main .iniciosesion .content form h1{
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .sesion_main .iniciosesion .content form label{
            font-size: 1.2rem;
        }

        .sesion_main .iniciosesion .content form input{
            width: 60%;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            background-color: rgb(238, 238, 238);
            border: none;
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
                margin:10% 5%;
            }

        }

        @media(min-width: 0px) and (max-width: 576px) {

            .sesion_main .iniciosesion{
                margin:20% 5%;
            }

            .sesion_main .iniciosesion .content form input{
                width: 90%;
                padding: 1rem;
                border-radius: 5px;
                margin-bottom: 1.5rem;
                background-color: rgb(238, 238, 238);
                border: none;
            }

        }
        
    </style>

@endsection

@section('content')

    <section class="sesion_main">
        <div class="iniciosesion">
            <div class="content">

                <h1>Inicio de sesión</h1>
                <p></p>

                {{-- Mensajes de error --}}
                @if(session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    {!! csrf_field() !!}

                    <label for="correo">Correo:</label>
                    <input type="email" name="email" id="correo" placeholder="Correo" required>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password" name="password" id="contrasena" placeholder="Contraseña" required>

                    <div class="enlaces">
                        {{-- <a href="#">Olvidé mi contraseña</a> --}}
                        <small>¿No tienes cuenta? <a href="{{route('register')}}">Crear una cuenta</a></small> 
                    </div>

                    <button type="submit">Entrar</button>
                </form>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
@endsection
