@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                  </div>
                  <div class="card-body" style="display: block;">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label>
                                    <p>{{$paciente->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label>
                                    <p>{{$paciente->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Ci</label>
                                    <p>{{$paciente->ci}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nro de seguro</label>
                                    <p>{{$paciente->nro_seguro}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento</label>
                                    <p>{{$paciente->fecha_nacimiento}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Genero</label>
                                    <p>
                                        @if($paciente->genero == 'M') MASCULINO @else FEMENINO @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label>
                                    <p>{{$paciente->celular}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Correo</label>
                                    <p>{{$paciente->correo}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Direccion</label>
                                    <p>{{$paciente->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Grupo sanguineo</label>
                                    <p>{{$paciente->grupo_sanguineo}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Alergias</label>
                                    <p>{{$paciente->alergias}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Contacto de emergencia</label>
                                    <p>{{$paciente->contacto_emergencia}}</p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Observaciones</label>
                                    <p>{{$paciente->bservaciones}}</p>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    
@endsection