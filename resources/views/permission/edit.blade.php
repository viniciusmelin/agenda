@extends('layouts.app') 
@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck/square/_all.min.css')}} "/>
@endsection

@section('content')
<div class="row">
        <div class="col-md-6 col-lg-6">
    
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Editar Permissão</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="role" method="POST" action="{{route('permission.update',$permissions->id)}}">
                        @method('PATCH')
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-feedback {{$errors->has('name') ? 'has-error':''}}">
                                    <label for="name">Pefil</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Nome do Perfil" value="{{old('name',$permissions->name)}}"> @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group has-feedback {{$errors->has('label') ? 'has-error':''}}">
                                        <label for="label">Descrição</label>
                                        <input type="text" id="label" class="form-control" name="label" placeholder="Descrição do Perfil" value="{{old('label',$permissions->label)}}"> @if($errors->has('label'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('label')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-danger btn-lg" href="{{route('permission.index')}}">Cancelar</a>
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