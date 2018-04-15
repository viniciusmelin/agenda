@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h1>Gerenciar Pacientes</h1>
        <p>
            <a class="btn btn-success btn-lg" href="{{route('patient.create')}}">Cadastrar</a>
        </p>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pacientes Cadastrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="tablepatient">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Aniversário</th>
                            <th>Ativo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $patients as $patient )
                            <tr>
                                <td>{{$patient->id}}</td>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->age}}</td>
                                <td>{{$patient->date_birth}}</td>
                                <td>{{$patient->active}}</td>
                                <td>
                                    <a href="{{route('patient.edit',$patient->id)}}" class="btn btn-xs btn-primary" title="Editar Paciente"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a data-toggle="modal" data-target="#modalRemovePatient" class="btn btn-xs btn-danger" title="Remover Paciente"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="modalRemovePatient" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Excluir Paciente</h3>
				</div>
				<div class="modal-body">
                    <input type="hidden" id="removePatient_id" value="">
                    {{ csrf_field() }}
					<p>Deseja realmente excluir o Paciente selecionado?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Não</button>
					<button type="button" class="btn btn-success btn-lg"  id="removePatient">Sim</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('adminlte_js')
<script src="{{ asset('js/patient.min.js') }}"></script>
@endsection