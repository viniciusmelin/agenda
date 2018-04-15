@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h1>Gerenciar Permissão</h1>
        <p>
            <a class="btn btn-success btn-lg" href="{{route('permission.create')}}">Cadastrar</a>
        </p>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permissão</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" id="tablerole">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Perfil</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ( $permissions as $permissions )
                            <tr>
                                <td>{{$permissions->id}}</td>
                                <td>{{$permissions->name}}</td>
                                <td>{{$permissions->label}}</td>
                                <td>
                                    <a href="{{route('permission.edit',$permissions->id)}}" class="btn btn-xs btn-primary" title="Editar Paciente"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a data-toggle="modal" data-target="#modalRemoveRole" class="btn btn-xs btn-danger" title="Remover Paciente"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalRemoveRole" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Excluir Consulta</h3>
				</div>
				<div class="modal-body">
                    <input type="hidden" id="removeRole_id" value="">
                    {{ csrf_field() }}
					<p>Deseja realmente excluir a <b>Consulta</b> selecionado?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Não</button>
					<button type="button" class="btn btn-success btn-lg"  id="removeRole">Sim</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('adminlte_js')
<script src="{{ asset('js/role.min.js') }}"></script>
@endsection