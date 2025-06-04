@extends('layouts.app')

@section('title', 'Detalle')

@section('extracss')

    
@endsection

@section('content')
    
    <ul class="container-fluid py-2">
        <li class="col my-3 border border-dark">
            <strong>TEMÁTICA:</strong> {{ $blog->tematica->tematica }} <br>
            <strong>BLOG:</strong> {{ $blog->titulo }} <br>
            <strong>DESCRIPCIÓN:</strong> {!! $blog->descripcion !!} <br>
            <strong>WHATSAPP:</strong> {{ $blog->link_whatsapp }} <br>
            <strong>FACEBOOK:</strong> {{ $blog->link_facebook }} <br>
            <strong>INSTAGRAM:</strong> {{ $blog->link_instagram }} <br>
        </li>
    </ul>

@endsection

@section('scripts')
    
@endsection