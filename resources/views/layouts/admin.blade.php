<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/design/logo-wozial.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Administrador</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- carrusel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />


    <style>
        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            overflow-x: hidden;
        }

        .estilaxo{
            background-color: transparent;
            color: white;
            border:dashed 1px rgb(252, 122, 0)
        }
        .estilaxo:hover{
            border: 
        }

        .carru-modal {
            opacity: 0;
            background: rgba(0, 0, 0, 0.311) !important;
            z-index: 10;
            position: absolute;
            top: 0;
            bottom: 0;
            border-radius: 16px;
            height: 100%;
            width: 100%;
            justify-content: center !important;
            align-items: center !important;
            display: flex !important;
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            transition: ease 0.2s all;
            cursor: pointer;
            pointer-events: all;
            text-align: center;
        }

        .carru-modal:hover {
            opacity: 1;
        }
        .img-contact{
            position: relative;
        }
    </style>

<style>

    body { background-color: #e5e8eb  !important; }

    .card-header { background-color: #b0c1d1  !important; }

    .black-skin
    .btn-primary { background-color: #b0c1d1  !important; }

    .btn {
        box-shadow: none;
        border-radius: 15px;
    }
</style>

<style>
    .contenedor-pagina {
       visibility: visible;
   }

   .battery {
       position: absolute;
       top: 5%;
       left: 15%;
       transform: translate(-50%, -50%);
       width: 400px;
       height: 50px;
       border: 10px solid #151e2c;
       border-radius: 15px;
       z-index: 10000;
   }

   .battery:before {
       content: "";
       position: absolute;
       top: 6px;
       left: 6px;
       height: 20px;
       width: 0%;
       background-color: #FAC706;
       border-radius: 5px;
       animation: full 1s linear infinite;
   }

   @keyframes full {
       0% {
           width: 0%;
       }
       25% {
           width: 24%;
       }
       50% {
           width: 48%;
       }
       75% {
           width: 72%;
       }
       100% {
           width: 96%;
       }
   }
</style>

    <script src="{{ asset('js/ajax.js') }}"></script>

    @yield('extraCSS')
</head>
<body style=" 
            /* background-image: url({{ asset('img/photos/backgrounds/bg-13.jpg') }}); */
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: center center;
            height: auto;
            width: 100%;">

    <div class="container-fluid">
        <div class="battery bg-dark"></div>
        <div class="row">
            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12 mx-auto px-1">
                @include('layouts.partials_admin.header')
            </div>
            <div class="col-xxl-10 col-xl-10 col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-11 mx-auto">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Toastr::message() !!}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelector('.battery').style.display = 'none';
                document.getElementById('boton-negro').style.display = 'none';
            }, 1000);
        });

        document.addEventListener('DOMContentLoaded', function() {
        window.scrollTo(0, 0);
    });
    </script>

    @yield('extraJS')

</body>
</html>
