@extends('layouts.app')

@section('title', 'Blog')

@section('extracss')

    
@endsection

@section('content')
    
    <ul class="container-fluid py-2">
        @foreach ($tematicas as $tematica)
            <li class="col my-3 border border-dark">
                <strong>TEMATICA:</strong> {{ $tematica->tematica }} <br>
            </li>
        @endforeach
    </ul>

    <ul class="container-fluid py-2">
        @foreach ($blogs as $blog)
            <li class="col my-3 border border-dark">
                <strong>TEMÁTICA:</strong> {{ $blog->tematica->tematica }} <br>
                <strong>BLOG:</strong> {{ $blog->titulo }} <br>
            </li>
        @endforeach
    </ul>

@endsection

@section('scripts')
    
@endsection