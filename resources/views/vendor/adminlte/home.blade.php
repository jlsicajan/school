@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Inicio</h3>
					</div>
					<div class="box-body">
						@role('Administradora')
							<p>This is visible to users with the Administradora role.</p>
						@endrole
						@role('Directora')
						<p>This is visible to users with the Directora role.</p>
						@endrole
						@role('Catedratico')
						<p>This is visible to users with the Catedratico role.</p>
						@endrole
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
