@extends('layouts.admin')

@section('extraCSS')
    
<style>
    .main-content{
        width: 100%;
        background-color: #fff;
        border-radius: 15px;
        padding: 2rem;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
        margin-bottom: 3rem;
    }

    .main-content h1{
        text-align: left;
        width: 100%;
        font-weight: 800;
        margin-bottom: 3rem;
    }

    .main-content .listado{
        width: 100%;
        height: 100%;
        margin-top:3rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }


    .main-content .listado .tarjetas{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap:1rem
    }

    .main-content .listado .tarjetas .tar-cont{
        width: 30%;
        height: 25rem;
        border: 1px solid #000;
        border-radius: 15px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        justify-content: center;
        align-items: center;
    }

    .main-content .listado .tarjetas .tar-cont input{
        width: 100%;
        color:#000;
    }

    .main-content .listado .tarjetas .tar-cont textarea{
        width: 100%;
        color:#000;
    }


</style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="main-content">
        <h1>Puntos de entrega</h1>
        <h4 style="color: black">Agregar ubicación</h4>
        <button style="background: none; border: none; color: black;" type="button" class="btn btn-primary"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-circle-plus" style="font-size: 2.5rem;"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" style="padding-top: 3rem;" data-bs-backdrop="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva ubicación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('seccion.agregar_seccion_6') }}" method="POST" enctype="multipart/form-data" style="width: 100%; max-width: 500px;">
                                @csrf

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción:</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL:</label>
                                    <textarea class="form-control" name="url" id="url" rows="5" required></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="listado">
            <div class="tarjetas">
                @foreach ($ubi as $u)
                    <div class="tar-cont">
                        <input type="text" class="editarajax estilaxo" data-model="Ubicacion" data-field="nombre" data-id="{{$u->id}}" value=" {{$u->nombre}}">
                        <textarea class="editarajax estilaxo" data-model="Ubicacion" data-field="descripcion" data-id="{{$u->id}}" name="" id="" cols="30" rows="3">{{$u->descripcion}}</textarea>
                        <textarea class="editarajax estilaxo" data-model="Ubicacion" data-field="url" data-id="{{$u->id}}" name="" id="" cols="30" rows="8">{{$u->url}}</textarea>
                        <form action="{{ route('seccion.destroy_ubi', $u->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                style="background: red; border: none; color:white;">
                                <i class="fas fa-trash" style="font-size: 1rem;"></i>
                            </button>
                        </form>
                    </div>
                    
                    
                @endforeach
            </div>
        </div>

    
    </div>
    

@endsection

@section('extraJS')


@endsection
