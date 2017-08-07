@extends('adminlte::page')

@section('htmlheader_title')
	Administradores
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado de administradores</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<div class="col-md-6">
							<br><br>
							<meta name="csrf-token" content="{{ csrf_token() }}"/>
							<form action="#" autocomplete="off" method="POST" id="form">
								<div class="form-group">
									<label for="semester">Nombre del administrador</label>
									<input type="text" class="form-control" name="name" id="name" required/>
								</div>
								<div class="form-group">
									<label for="email">Correo</label>
									<input type="email" class="form-control" name="email" id="email" required/>
								</div>
								<div class="form-group">
									<label for="status">Admnistrador activo</label>
									<input type="checkbox" name="status" id="status">
								</div>
								<input type="submit" class="btn btn-primary" value="Guardar"/>
							</form>
						</div>
						<div class="col-md-6">
							<table id="datatable" class="table table-hover table-condensed">
								<thead>
								<tr>
									<th>Nombre</th>
									<th>Email</th>
									<th>Estado</th>
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

	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"
			charset="UTF-8"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"
			charset="UTF-8"></script>
	<script>
        $('#administrador_option').addClass('active').siblings().removeClass('active');
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                "ajax": "{{ route('datatable.administrators') }}",
            });

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#form').on('submit', function (e) {

                $.ajax({
                    type: "POST",
                    url: '{{ URL::route('save.administrator.data') }}',
                    data: {
                        name: $('input#name').val(),
                        email: $('input#email').val(),
                        status: +$('input#status').is( ':checked' ),

                        _token: CSRF_TOKEN,
                    },
                    success: function (data) {
                        $('#form').trigger("reset");
                        table.ajax.reload(null, false);
                    },
					error: function(e){
                        alert("hubo un error contancte a su proveedor de servicio");
					}
                });
                return false;
            });
        });
	</script>
@endsection
