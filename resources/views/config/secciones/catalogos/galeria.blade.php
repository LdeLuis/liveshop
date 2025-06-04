    @extends('layouts.admin')

    @section('extraCSS')
    <style>
        body { background-color: #e5e8eb  !important; }
        .card-header { background-color: #b0c1d1  !important; }
        .black-skin .btn-primary { background-color: #b0c1d1  !important; }
        .btn { box-shadow: none; border-radius: 15px; }
        .file-upload input[type="file"] { position: absolute; left: -9999px; }
        .file-upload label {
            display: inline-block;
            background-color: #00000031;
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: normal;
        }
        .file-upload input[type="file"] + label:before {
            content: "\f07b";
            font-family: "Font Awesome 5 Free";
            font-size: 16px;
            margin-right: 5px;
            transition: all 0.5s;
        }
        .file-upload input[type="file"] + label {
            transition: all 0.5s;
        }
        .file-upload input[type="file"]:focus + label, .file-upload input[type="file"] + label:hover {
            backdrop-filter: blur(5px);
            background-color: #41464a37;
            opacity: 100%;
            transition: all 0.5s;
        }
    </style>
    @endsection

    @section('content')
    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('seccion.show', ['slug' => 'catalogo']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="container-fluid bg-white py-5 rounded mb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column text-center">
                <h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Agregar galeria</h3>
                <form id="form_image_slider" class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="catalogo_id" value="{{ $catalogo->id }}">
                    <input id="input_slider_img" class="m-0 p-0" type="file" name="imagenes[]" multiple accept="image/png, image/jpeg, image/jpg">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img" style="opacity: 100%; !important; border-radius: 26px; background-color: #000000;">Seleccionar archivos</label>
                </form>
            </div>
        </div>
        <div class="row mt-3" id="galeria">
            @forelse ($galerias as $galeria)
                <div class="col-3 mt-4 position-relative" id="imagen-{{ $galeria->id }}">
                    <div class="card border-0">
                        <div style="
                            background-image: url('{{ asset('img/photos/catalogo/galerias/'.$galeria->imagen) }}');
                            background-color: #000000;
                            background-size: contain;
                            background-position: center;
                            background-repeat: no-repeat;
                            width: 100%;
                            height: 16rem;
                            border-radius: 32px;
                        "></div>
                    </div>
                    <div class="col position-absolute top-0 end-0">
                        <form action="{{ route('galeria.galeria.destroy', ['galeria' => $galeria->id]) }}" method="POST" class="form-eliminar-imagen" data-id="{{ $galeria->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-circle"><i class="bi bi-x fs-4"></i></button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="card w-100 text-center py-3">No hay imágenes en la galería</div>
            @endforelse
        </div>
    </div>
    @endsection

    @section('extraJS')
    <script>
        $(document).ready(function() {
            $('#input_slider_img').change(function(e) {
                var formData = new FormData($('#form_image_slider')[0]);
                $.ajax({
                    url: '{{ route("galeria.galeria.store") }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            // Construye el HTML para las nuevas imágenes
                            response.galerias.forEach(function(galeria) {
                                var html = `
                                    <div class="col-3 mt-4 position-relative" id="imagen-${galeria.id}">
                                        <div class="card border-0">
                                            <div style="
                                                background-image: url('{{ asset('img/photos/catalogo/galerias/') }}/${galeria.imagen}');
                                                background-color: #000000;
                                                background-size: contain;
                                                background-position: center;
                                                background-repeat: no-repeat;
                                                width: 100%;
                                                height: 16rem;
                                                border-radius: 32px;
                                            "></div>
                                        </div>
                                        <div class="col position-absolute top-0 end-0">
                                            <form action="{{ url('galeria/galeria') }}/${galeria.id}" method="POST" class="form-eliminar-imagen" data-id="${galeria.id}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-circle"><i class="bi bi-x fs-4"></i></button>
                                            </form>
                                        </div>
                                    </div>`;
                                $('#galeria').append(html);
                            });
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        toastr.error('Hubo un problema al subir las imágenes.');
                    }
                });
            });

            $(document).on('submit', '.form-eliminar-imagen', function(e) {
                e.preventDefault();
                var form = $(this);
                var id = form.data('id');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#imagen-' + id).remove();
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        toastr.error('Hubo un problema al eliminar la imagen.');
                    }
                });
            });
        });
    </script>
    @endsection
