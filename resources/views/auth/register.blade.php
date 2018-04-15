@extends('layouts.app') 
@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck/square/_all.min.css')}} "/>
@endsection

@section('content')
<div class="row">
        <div class="col-md-6 col-lg-6">
    
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Pacientes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="role" method="POST" action="{{route('register')}}">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-feedback {{$errors->has('name') ? 'has-error':''}}">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Usuário" value="{{old('name')}}"> @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group has-feedback {{$errors->has('email') ? 'has-error':''}}">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" name="email" placeholder="Email do usuário" value="{{old('email')}}"> @if($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('email')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group has-feedback {{$errors->has('password') ? 'has-error':''}}">
                                            <label for="password">Senha</label>
                                            <input type="text" id="password" class="form-control" name="password" placeholder="Senha do usuário" value="{{old('password')}}"> @if($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('password')}}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group has-feedback {{$errors->has('password_confirmation') ? 'has-error':''}}">
                                                <label for="password_confirmation">Confirmar Senha</label>
                                                <input type="text" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirma do usuário" value="{{old('password_confirmation')}}"> @if($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('password_confirmation')}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group has-feedback {{$errors->has('doctor_id') ? 'has-error':''}}">
                                                    <label for="doctor_id">Selecionar Médico</label>
                                                    <select name="doctor_id"  class="form-control"  id="doctor_id">
                                                        <option value="">Branco</option>
                                                        @foreach ($doctors as $doctor)
                                                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>    
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('doctor_id'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('doctor_id')}}</strong>
                                                    </span>
                                                    @endif
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
<script src="{{ asset('adminlte/plugins/icheck/icheck.min.js') }}"></script>
</script>
@endsection
