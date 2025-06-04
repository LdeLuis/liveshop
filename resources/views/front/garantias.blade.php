@extends('layouts.app')

@section('title', 'Garantías')

@section('extracss')

    <style>
        .main{
            width: 100%;
            margin: 5%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .main .politicas{
            width: 80%;
            min-height: 10rem;
            background-color: #fff;
            border-radius: 15px;
            padding: 2rem;
            
        }

        .main .politicas h2{
            color: var(--pink2)
        }

        .main .politicas hr{
            background-color: var(--green2);
            height: 4px;
            border: none;
        }

        @media(min-width: 576px) and (max-width: 992px){
            .main{
                margin:10% 5%;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .main{
                margin:20% 5%;
            }
        }
       
    </style>

@endsection

@section('content')

    <section class="main">
        <div class="politicas">
            <h2>Reglas de compra</h2>
            <hr>
            {!! $garantias->descripcion !!}
        </div>
    </section>
    
    {{-- <section>
        <div class="bg-global">
            <div class="col-12 p-4" style="background-color: black; color: white;">
                <div class="text-center text-white fs-1" style="font-size:24px;color: white;"> {{ $garantias->titulo }} </div>
            </div>
        </div>
    </section>
    <div class="container"  style="min-height:55vh">
        <div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
            <div class="col-12 col-md-8 p-4 mx-auto fw-bolder bg-white" style="border: .5em solid #e6e6e6;">
                {!! $garantias->descripcion !!}
            </div>
        </div>
    </div>        --}}

@endsection

@section('scripts')
    
@endsection