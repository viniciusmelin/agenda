@extends('layouts.app') 
@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck/square/_all.min.css')}} "/>
@endsection

@section('content')
<div class="row">
        <div class="col-md-6 col-lg-6">
    
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Médico</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="role" method="POST" action="{{route('doctor.store')}}">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-feedback {{$errors->has('name') ? 'has-error':''}}">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Nome do Médico" value="{{old('name')}}"> @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
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
                                            <input type="radio" class="minimal" name="active" id="active" value="1" checked> Sim
                                        </label>
                                        <label>
                                            <input type="radio" class="minimal" name="active" id="active" value="0"> Não
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-danger btn-lg" href="{{route('doctor.index')}}">Cancelar</a>
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
