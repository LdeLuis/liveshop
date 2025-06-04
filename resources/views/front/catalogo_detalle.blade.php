@extends('layouts.app')

@section('title', 'Datalle')

@section('extracss')

    
@endsection

@section('content')
    
    <ul class="container-fluid py-2">
        <li class="col my-3 border border-dark">
            <strong>CATEGORIA:</strong> {{ $producto->categoria->categoria }} <br>
            <strong>BRINCOLIN:</strong> {{ $producto->nombre }} <br>
            <strong>CARACTERISTICAS:</strong>
            <ol class="col border border-dark">
                @foreach ($producto->caracteristicas as  $caracteristica)
                    <li class="col border">{{ $caracteristica->caracteristica }}</li>
                @endforeach
            </ol>
            <strong>GALERIA DE IMAGENES</strong> <br>
            <ul class="col border border-dark">
                @foreach ($producto->galeria as  $galeria)
                    <li class="col border">{{ $galeria->imagen }}</li>
                @endforeach
            </ul>
        </li>
    </ul>

@endsection

@section('scripts')
    
@endsection