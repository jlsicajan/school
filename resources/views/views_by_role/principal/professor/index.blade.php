@extends('adminlte::page')
@section('head_scripts_styles')
    <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection
@section('htmlheader_title')
	Profesores
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado de profesores</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <br><br>
                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <form action="#" autocomplete="off" method="POST" id="form_professor">
                                <div class="form-group">
                                    <label for="semester">Nombre del profesor</label>
                                    <input type="text" class="form-control" name="name" id="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Correo</label>
                                    <input type="email" class="form-control" name="email" id="email" required/>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <table id="professor_datatable" class="table table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection
@section('body_scripts_styles')
    <script src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" charset="UTF-8"></script>
    <script>
        $('#professor_option').addClass('active').siblings().removeClass('active');
        $(document).ready(function () {
            oTable = $('#professor_datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('datatable.professors') }}",
                "language": {
                    "url": "/datatable/language/spanish.json"
                },
                "columns": [
                    { "data": "name" },
                    { "data": "email" },
                ]
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#form_professor').on('submit', function (e) {
                $.ajax({
                    type: "POST",
                    url: '{{ URL::route('save.professor.data') }}',
                    data: {
                        name: $('input#name').val(),
                        email: $('input#email').val(),
                        _token: CSRF_TOKEN
                    },
                    success: function (data) {
                        $('#form_professor').trigger("reset");
                        oTable.ajax.reload(null, false);
                    }
                });
                return false;
            });
        });
    </script>
@endsection