@extends('layouts.admin')

@section('extraCSS')
    
    <style>
        .main-ticket{
            width: 100%;
            background-color: #fff;
            border-radius: 15px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .main-ticket .main-modal{
            width: 80%;
            border-radius: 15px;
            background-color: transparent;
            padding: 0.4rem;
            transition: 0.3s ease;  
            border: 2px solid #ff7ea7;
        }

        .main-ticket .main-modal:hover{
            background-color: #ff7ea7;
            transform: scaleX(1.1);
            color: #fff;
        }


    </style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="main-ticket">
        <h1>Tickets</h1>
        <hr>

        <button type="button" class="main-modal" data-toggle="modal" data-target="#exampleModalCenter">
            Número de ticket: #7739064
        </button>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Número de ticket: #7739064</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Usuario: 1</p>
                    <p>Producto: tenis nike 1</p>
                    <p>Lugar: 1</p>
                    <p>total: $1000</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extraJS')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection