@extends('layouts.app') 
@section('content')
<div class="row">
        <div class="col-md-6 col-lg-6">
    
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Pacientes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="role" method="POST" action="{{route('patient.update',$patient->id)}}">
                            @method('PATCH')
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-feedback {{$errors->has('name') ? 'has-error':''}}">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Nome do Paciente" value="{{old('name',$patient->name)}}"> @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group has-feedback {{$errors->has('date_birth') ? 'has-error':''}}">
                                            <label for="date_birth">Data de Aniversário</label>
                                            <input type="date" id="date_birth" class="form-control" name="date_birth" value="{{old('date_birth',$patient->date_birth)}}"> @if($errors->has('date_birth'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('date_birth')}}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group has-feedback {{$errors->has('age') ? 'has-error':''}}">
                                            <label for="age">Idade</label>
                                            <input type="number" id="age"  class="form-control" name="age" value="{{old('age',$patient->age)}}" placeholder="Idade do Paciente"> @if($errors->has('age'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('age')}}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="active">Ativo</label>
                                    <div class="">
                                        <label>
                                            <input type="radio" class="minimal" name="active" id="active1" value="1"> Sim
                                        </label> 
                                        <label>
                                            <input type="radio" class="minimal" name="active" id="active0" value="0"> Não
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-danger btn-lg" href="{{route('patient.index')}}">Cancelar</a>
                                <button type="submit" class="btn btn-success btn-lg">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('adminlte_js')
<script>
 $(document).ready(function(){
     var check = {{$patient->active}}
     $('#active'+check).iCheck('check');
 });    
</script>
@endsection