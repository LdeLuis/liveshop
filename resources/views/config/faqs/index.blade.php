@extends('layouts.admin')

@section('extraCSS')
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
@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <div class="col-6 text-start">
            <a href="{{ route('front.admin') }}" class="mt-5 w-50 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('faqsA.create') }}" class="mt-5 w-50 col col-md-2 btn btn-sm btn-success text-white"><i class="fa fa-plus"></i> Agregar</a>
        </div>
    </div>

    @foreach ($faqs as $f)
        <div class="card" data-card="{{ $f->id }}">
            <div class="row">
                <div class="col-9">
                    <a href="{{ route('faqsA.show', ['id' => $f->id]) }}" class="btn btn-link btn-block py-0 text-left fs-5">
                        {{ $f->pregunta }}
                    </a>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('faqsA.edit', ['id' => $f->id]) }}" class="btn btn-sm btn-info text-right w-100 rounded-0">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-sm btn-danger text-right w-100 rounded-0" onclick="confirmDeletion({{ $f->id }})">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('extraJS')
    <script type="text/javascript">
        function confirmDeletion(id) {
            Swal.fire({
                title: '¿Deseas eliminar está pregunta?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarla!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("faqsA.destroy", ":id") }}'.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Eliminado!',
                                'La pregunta ha sido eliminada.',
                                'success'
                            );
                            // Remove the card
                            $('div[data-card="' + id + '"]').remove();
                        },
                        error: function(response) {
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al eliminar la pregunta.',
                                'error'
                            );
                        }
                    });

                }
            });
        }
    </script>
@endsection
