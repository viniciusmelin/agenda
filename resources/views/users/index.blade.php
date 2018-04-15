@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h1>Gerenciar Usuário</h1>
        <p>
            <a class="btn btn-success btn-lg" href="{{route('register')}}">Cadastrar</a>
        </p>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usuários</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" id="tablesusuarios">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ( $users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-xs btn-primary" title="Editar Usuário"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a data-toggle="modal" data-target="#modalRemovePermission" class="btn btn-xs btn-danger" title="Remover Paciente"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalRemovePermission" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Excluir Consulta</h3>
				</div>
				<div class="modal-body">
                    <input type="hidden" id="removePermission_id" value="">
                    {{ csrf_field() }}
					<p>Deseja realmente excluir a <b>Consulta</b> selecionado?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Não</button>
					<button type="button" class="btn btn-success btn-lg"  id="removePermission">Sim</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('adminlte_js')
<script src="{{ asset('js/permission.min.js') }}"></script>
@endsection