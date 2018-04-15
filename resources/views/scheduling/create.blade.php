@extends('layouts.app') 
@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck/square/_all.min.css')}} "/>
@endsection

@section('content')
<div class="row">
        <div class="col-md-10 col-lg-10">
    
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Consulta</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="role" method="POST" action="{{route('scheduling.store')}}">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-5">
                                    <label for="name">Médico</label>
                                <div class="input-group has-feedback {{$errors->has('name') ? 'has-error':''}}">
                                        <input type="text" class="form-control" placeholder="Pesquisar Médico" id="nameDoctor" value="" disabled>
                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalDoctor"> <span class="glyphicon glyphicon-search"></span></button>
                                        </span>

                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" id="doctor_id" name="doctor_id" value="">
                            <input type="hidden" id="patient_id" name="patient_id" value="">
                            <div class="col-lg-5">
                                    <label for="name">Paciente</label>
                                <div class="input-group has-feedback {{$errors->has('name') ? 'has-error':''}}">
                                        <input type="text" class="form-control" placeholder="Pesquisar Paciente" id="namePatient" value="" readonly>
                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalPatient"> <span class="glyphicon glyphicon-search"></span></button>
                                        </span>

                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-3">
                                <div class="form-group has-feedback {{$errors->has('date') ? 'has-error':''}}">
                                    <label for="date">Data</label>
                                    <input type="date" id="date" class="form-control" name="date" value="{{old('date',$date)}}"> @if($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('date')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-danger btn-lg" href="{{route('scheduling.index')}}">Cancelar</a>
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
@include('layouts.patient_pesq')
@include('layouts.doctor_pesq')
@endsection
@section('adminlte_js')
<script src="{{ asset('adminlte/plugins/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('js/patient_pes.min.js') }}"></script>
<script src="{{ asset('js/doctor_pes.min.js') }}"></script>
@endsection