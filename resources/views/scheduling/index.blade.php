@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h1>Gerenciar Agenda</h1>
        <p>
            <a class="btn btn-success btn-lg" href="{{route('scheduling.create')}}">Cadastrar</a>
        </p>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Consultas Agendadas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" id="tablescheduling">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Médico</th>
                            <th>Paciente</th>
                            <th>Data Consulta</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ( $schedulings as $scheduling )
                            <tr>
                                <td>{{$scheduling->id}}</td>
                                <td>{{$scheduling->doctor->name}}</td>
                                <td>{{$scheduling->patient->name}}</td>
                                <td>{{$scheduling->date}}</td>
                                <td>
                                    <a href="{{route('scheduling.edit',$scheduling->id)}}" class="btn btn-xs btn-primary" title="Editar Paciente"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a data-toggle="modal" data-target="#modalRemoveScheduling" class="btn btn-xs btn-danger" title="Remover Paciente"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalRemoveScheduling" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Excluir Consulta</h3>
				</div>
				<div class="modal-body">
                    <input type="hidden" id="removeScheduling_id" value="">
                    {{ csrf_field() }}
					<p>Deseja realmente excluir a <b>Consulta</b> selecionado?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Não</button>
					<button type="button" class="btn btn-success btn-lg"  id="removeScheduling">Sim</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('adminlte_js')
<script src="{{ asset('js/scheduling.min.js') }}"></script>
@endsection