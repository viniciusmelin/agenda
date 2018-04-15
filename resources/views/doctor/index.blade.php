@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h1>Gerenciar Médicos</h1>
        <p>
            <a class="btn btn-success btn-lg" href="{{route('doctor.create')}}">Cadastrar</a>
        </p>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Médicos Cadastrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" id="tableDoctors">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Ativo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{$doctor->id}}</td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->active==1?'Sim':'Não'}}</td>
                            <td>
                                    <a href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-xs btn-primary" title="Editar Doctor"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a data-toggle="modal" data-target="#modalRemoveDoctor" class="btn btn-xs btn-danger" title="Remover Médico"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalRemoveDoctor" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Excluir Médico</h3>
				</div>
				<div class="modal-body">
                    <input type="hidden" id="removeDoctor_id" value="">
                    {{ csrf_field() }}
					<p>Deseja realmente excluir o Médico selecionado?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Não</button>
					<button type="button" class="btn btn-success btn-lg"  id="removeDoctor">Sim</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('adminlte_js')
<script src="{{ asset('js/doctor.min.js') }}"></script>
@endsection