@extends('layouts.admin')

@section('extraCSS')
    


@endsection

@section('content')
    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('seccion.show', ['slug' => 'blogs']) }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="container-fluid bg-white rounded p-5">
        <div class="row">
            <div class="col fs-1 fw-bolder text-center">Editar entrada: {{ $blog->titulo }}</div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('blogs.update', ['blog' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Titulo del Post</span>
                                <input type="text" name="titulo" class="form-control" placeholder="titulo" aria-label="titulo" aria-describedby="basic-addon1" value="{{ $blog->titulo }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-tematica">Temática</span>
                                <select name="tematica" id="tematica" class="form-control">
                                    @foreach ($tematicas as $tematica)
                                        <option value="{{ $tematica->id }}">{{ $tematica->tematica }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Portada</span>
                                <input type="file" name="portada" class="form-control" placeholder="portada" aria-label="portada" aria-describedby="basic-addon2" value="{{ $blog->portada }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="descripcion" id="" cols="30" rows="10" class="summernote">{{ $blog->descripcion }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="basic-whatsapp">Whastapp</span>
                                <input type="text" name="link_whatsapp" class="form-control shadow-none" placeholder="whatsapp" aria-label="whatsapp" aria-describedby="basic-whatsapp" value="{{ $blog->link_whatsapp }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-facebook">Facebook</span>
                                <input type="text" name="link_facebook" class="form-control shadow-none" placeholder="facebook" aria-label="facebook" aria-describedby="basic-facebook" value="{{ $blog->link_facebook }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-instagram">Instagram</span>
                                <input type="text" name="link_instagram" class="form-control shadow-none" placeholder="instagram" aria-label="instagram" aria-describedby="basic-instagram" value="{{ $blog->link_instagram }}">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">   
                            <button class="btn btn-dark w-100 rounded-0">Actualizar Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('extraJS')
    
<script>
    $('.summernote').summernote({
        placeholder: 'Articulo del blog',
        tabsize: 2,
        height: 500,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
    });
</script>

@endsection


