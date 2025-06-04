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
        <a href="{{ route('faqsA.index') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="col-12 col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('faqsA.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<label for="pregunta">Pregunta</label>
						<input type="text" name="pregunta" id="pregunta" class="form-control">
					</div>
					<div class="form-group">
						<label for="respuesta">Respuesta</label>
						<textarea name="respuesta" id="respuesta" rows="10" class="form-control summernote" style="resize:none;"></textarea>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-dark mt-3 rounded-0 w-100">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('extraJS')
	<script>
		$('.summernote').summernote({
			placeholder: 'Hello stand alone ui',
			tabsize: 2,
			height: 300,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
			//   ['insert', ['link', 'picture', 'video']],
			//   ['view', ['fullscreen', 'codeview', 'help']]
			]
		});
	</script>
@endsection

