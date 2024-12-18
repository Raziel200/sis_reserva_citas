@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Horarios</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Llenar los datos</h3>
                  </div>
                  <div class="card-body row">
                    <div class="col-md-3">
                    <form action="{{url('/admin/horarios/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Dia</label> <b>*</b>
                                    <select name="dia" id="" class="form-control">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SABADO">SABADO</option>
                                        <option value="DOMINGO">DOMINGO</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Inicio</label> <b>*</b>
                                    <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Final</label> <b>*</b>
                                    <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Consultorio</label> <b>*</b>
                                    <select name="consultorio_id" id="consultorio_select" class="form-control">
                                        <option value="">Seleccionar Consultorio</option>
                                        @foreach ($consultorios as $consultorio)
                                            <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $('#consultorio_select').on('change', function(){
                                            var consultorio_id = $('#consultorio_select').val();
                                            var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
                                            url = url.replace(':id', consultorio_id);
                                            if(consultorio_id){
                                                $.ajax({
                                                url: url,
                                                type: 'GET',
                                                success: function(data){
                                                    $('consultorio_info').html(data);
                                                },
                                            error: function(){
                                                alert('Error al obtener los datos del consultorio');
                                            }

                                        });
                                        }else{
                                            $('consultorio_info').html('');
                                        }
                                        });
                                    </script>
                                </div>
                            </div>

                        <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Profesionales</label> <b>*</b>
                                    <select name="doctor_id" id="" class="form-control">
                                    @foreach ($doctores as $doctore)
                                        <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos." ".$doctore->especialidad}}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar nuevo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-9">
                    <table style="font-size: 15px; text-align: center" class="table table-striped table-hover table-sm table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th>Hora</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sabado</th>
                            <th>Domingo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $horas = ['08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','13:00:00 - 14:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00','18:00:00 - 19:00:00','19:00:00 - 20:00:00'];
                        $diasSemana = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO'];
                        @endphp
                        @foreach ($horas as $hora)
                            @php
                            list($hora_inicio,$hora_fin) = explode(' - ',$hora);
                            @endphp
                        <tr>
                            <td>{{$hora}}</td>
                            @foreach($diasSemana as $dia)
                                @php
                                $nombre_doctor = '';
                                foreach ($horarios as $horario){
                                    if(strtoupper($horario->dia) == $dia &&
                                    $hora_inicio >= $horario->hora_inicio &&
                                    $hora_fin <= $horario->hora_fin){
                                        $nombre_doctor =$horario->doctor->nombres." ".$horario->doctor->apellidos;
                                        break;
                                    }
                                }
                                @endphp
                                <td>{{ $nombre_doctor}}</td>
                            @endforeach
                            
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
    
@endsection