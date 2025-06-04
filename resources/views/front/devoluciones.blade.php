@extends('layouts.app')

@section('title', 'Devoluciones')

@section('extracss')

@endsection

@section('content')
    
    <section>
        <div class="bg-global">
            <div class="col-12 p-4" style="background-color: black; color: white;">
                <div class="text-center text-white fs-1" style="font-size:24px;color: white;"> {{ $devoluciones->titulo }} </div>
            </div>
        </div>
    </section>
    <div class="container"  style="min-height:55vh">
        <div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
            <div class="col-12 col-md-8 p-4 mx-auto fw-bolder bg-white" style="border: .5em solid #e6e6e6;">
                {!! $devoluciones->descripcion !!}
            </div>
        </div>
    </div>    

@endsection

@section('scripts')
    
@endsection