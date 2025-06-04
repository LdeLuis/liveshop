@extends('layouts.app')

@section('title', 'FAQS')

@section('extracss')
<style>
    .page-link_link, .page-link_icon {
        font-size: 1.2rem;
        border: 0;
        color: #000000;
    }

    .page-link_link:hover {
        text-decoration: underline;
        background-color: #FFFFFF;
    }

    .card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .accordionc {
        /* max-width: 600px; */
        margin: 20px auto;
    }

    .accordionc-item {
    }

    .accordionc-content {
        display: none;
        padding: 0px;
    }

    .down-img {
        display: block;
    }

    .up-img {
        display: none;
    }

    @media (min-width: 1800px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1.5rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 1400px) and (max-width: 1799px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1.3rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 1200px) and (max-width: 1399px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1.2rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1.1rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1.3rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 576px) and (max-width: 767px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1.3rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 1rem;
            font-weight: 400;
            cursor: pointer;
        }
    }

    @media (min-width: 0px) and (max-width: 319px) {
        .accordionc-header {
            background-color: #FFFFFF;
            font-size: 0.7rem;
            font-weight: 400;
            cursor: pointer;
        }
    }
</style>
@endsection

@section('content')

<div class="container py-5">
    <div class="row py-5">
        <div class="col-11 mx-auto text-center display-2">
            Preguntas frecuentes
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-11 col-11 py-3 mx-auto" style="text-align: justify;">
            <div class="accordionc">
                @foreach ($preguntas as $index => $pregunta)
                <div class="accordionc-item position-relative" id="section{{ $index + 1 }}">
                    <a href="#/" class="accordionc-header text-decoration-none text-dark">
                        <div class="col-11 mx-auto position-relative">
                            <div class="row mt-2">
                                <div class="col-11">
                                    {{ $pregunta['pregunta'] }}
                                </div>
                            </div>
                            <div class="col position-absolute top-50 start-100 translate-middle">
                                <div class="down-img" id="down-img-{{ $index + 1 }}">
                                    <i class="bi bi-arrow-down-circle fs-1"></i>
                                </div>
                                <div class="up-img" id="up-img-{{ $index + 1 }}">
                                    <i class="bi bi-arrow-up-circle fs-1"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 mt-2 border-bottom"></div>
                    </a>
                    <div class="col-11 mx-auto accordionc-content py-1" style="display: none;">
                        <p> {!! $pregunta['respuesta'] !!} </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionItems = document.querySelectorAll('.accordionc-item');

        accordionItems.forEach(item => {
            const header = item.querySelector('.accordionc-header');

            header.addEventListener('click', function() {
                const content = item.querySelector('.accordionc-content');
                const downImg = item.querySelector('.down-img');
                const upImg = item.querySelector('.up-img');
                const isOpen = content.style.display === 'block';

                accordionItems.forEach(accItem => {
                    accItem.querySelector('.accordionc-content').style.display = 'none';
                    accItem.querySelector('.down-img').style.display = 'block';
                    accItem.querySelector('.up-img').style.display = 'none';
                });

                if (!isOpen) {
                    content.style.display = 'block';
                    downImg.style.display = 'none';
                    upImg.style.display = 'block';
                }
            });
        });
    });
</script>
@endsection
