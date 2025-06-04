@extends('layouts.admin')

@section('extraCSS')

    
@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('seccion.show', ['slug' => 'catalogo']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

   <div class="container-fluid">
        <div class="row">
            <div class="col text-center fs-1">
                Nuevo producto
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('catalogo.catalogo.store') }}" method="POST" enctype="multipart/form-data" class="card py-5 rounded" style="background-color: #;">  
                    @csrf
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-alto">Catálogo </span>
                                                <select class="form-select shadow-none" name="categoria" aria-label="Default select example">
                                                    @foreach ($categorias as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-alto">Talla</span>
                                                <select class="form-select shadow-none" name="talla" aria-label="Default select example">
                                                    @foreach ($tallas as $ta)
                                                        <option value="{{ $ta->id }}">{{ $ta->talla }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="input-nombre">Nombre</span>
                                        <input type="text" name="nombre" class="form-control shadow-none" aria-label="nombre" aria-describedby="input-nombre">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="input-portada">Portada</label>
                                        <input type="file" name="archivo" class="form-control shadow-none" id="input-portada">
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-largo">Largo</span>
                                                <input type="text" name="largo" class="form-control shadow-none" aria-label="largo" aria-describedby="input-largo">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-ancho">Ancho</span>
                                                <input type="text" name="ancho" class="form-control shadow-none" aria-label="ancho" aria-describedby="input-ancho">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="input-alto">Alto</span>
                                                <input type="text" name="alto" class="form-control shadow-none" aria-label="alto" aria-describedby="input-alto">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="input-container">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="input-caracteristicas-0">Caracteristica</span>
                                            <input type="text" name="caracteristicas[]" class="form-control shadow-none" aria-label="caracteristicas" aria-describedby="input-caracteristicas-0">
                                            <button type="button" class="btn btn-danger rounded-circle btn-remove-input"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </div>
                                    <button type="button" id="btn-add-input" class="btn btn-dark rounded-0 w-100">Agregar otra característica</button>
                                    <div class="row">
                                        <div class="col mt-2">
                                            <button class="btn btn-success w-100">Crear producto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    
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

<script>
    $(document).ready(function() {
        var inputIndex = 1;

        // Add new input
        $('#btn-add-input').click(function() {
            var newInput = `
                <div class="input-group mb-3">
                    <span class="input-group-text" id="input-caracteristicas-${inputIndex}">Caracteristica</span>
                    <input type="text" name="caracteristicas[]" class="form-control shadow-none" aria-label="caracteristicas" aria-describedby="input-caracteristicas-${inputIndex}">
                    <button type="button" class="btn btn-danger rounded-circle btn-remove-input"><i class="bi bi-trash"></i></button>
                </div>
            `;
            $('#input-container').append(newInput);
            inputIndex++;
        });

        // Remove input
        $(document).on('click', '.btn-remove-input', function() {
            $(this).closest('.input-group').remove();
        });

        // Handle form submission
        $('#dynamic-form').submit(function(e) {
            e.preventDefault();
            // Process the form data
            var formData = $(this).serialize();
            console.log(formData);
            // Here you can send the formData using AJAX if needed
            // $.ajax({
            //     url: $(this).attr('action'),
            //     type: 'POST',
            //     data: formData,
            //     success: function(response) {
            //         // Handle success
            //     },
            //     error: function(response) {
            //         // Handle error
            //     }
            // });
        });
    });
</script>

@endsection



