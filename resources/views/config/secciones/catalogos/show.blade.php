@extends('layouts.admin')

@section('extraCSS')
    
    <style>
        
        .portada-img {
            width: 100%;
            height: 32rem;
            object-fit: contain;
        }

    </style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('seccion.show', ['slug' => 'catalogo']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col text-center fs-1">
                Producto: {{ $catalogo->nombre }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form class="card py-5 rounded" style="background-color: #;">  
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <img src="{{ asset('img/photos/catalogo/'.$catalogo->portada) }}" alt="" class="img-fluid portada-img">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-alto">Catálogo</span>
                                                <input disabled type="text" class="form-control" value="{{ $catalogo->categoria->categoria }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-alto">Talla</span>
                                                <input disabled type="text" class="form-control" value="{{ $catalogo->talla->talla }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="input-nombre">Nombre</span>
                                        <input disabled type="text" class="form-control shadow-none" aria-label="nombre" aria-describedby="input-nombre" value="{{ $catalogo->nombre }}">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-largo">Largo</span>
                                                <input disabled type="text" class="form-control shadow-none" aria-label="nombre" aria-describedby="input-largo" value="{{ $catalogo->largo }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-ancho">Ancho</span>
                                                <input disabled type="text" class="form-control shadow-none" aria-label="nombre" aria-describedby="input-ancho" value="{{ $catalogo->ancho }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-alto">Alto</span>
                                                <input disabled type="text" class="form-control shadow-none" aria-label="nombre" aria-describedby="input-alto" value="{{ $catalogo->alto }}"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        @forelse ($catalogo->caracteristicas as $caracteristica)
                                            <input disabled type="text" value="{{ $caracteristica->caracteristica }}">
                                        @empty
                                            Este catalogo no tiene características
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
   </div>

@endsection

@section('extraJS')

 

@endsection



