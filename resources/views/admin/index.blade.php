@extends('layouts.admin')
@section('content')
    <div class="row">
        <h3><b>Bienvenido:</b> {{Auth::user()->email}} / <b>Rol:</b> {{Auth::user()->roles->pluck('name')->first()}}</h3>
    </div>
    <hr>
    <br>
    <div class="row">
        <!-- Usuarios -->

        @can('admin.usuarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                
                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas bi bi-file-person"></i>
              </div>
              <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                Mas informacion <i class="fas bi bi-file-person"></i>
              </a>
            </div>
        </div>

        @endcan

        @can('admin.secretarias.index')
        <!-- Secretarias -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
               
                <p>Administrador</p>
              </div>
              <div class="icon">
                <i class="fas bi bi-person-circle"></i>
              </div>
              <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                Mas informacion <i class="fas bi bi-person-circle"></i>
              </a>
            </div>
        </div>

        @endcan
        @can('admin.pacientes.index')
        <!-- Pacientes -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                
                <p>Pacientes</p>
              </div>
              <div class="icon">
                <i class="fas bi bi-person-fill-check"></i>
              </div>
              <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                Mas informacion <i class="fas bi bi-person-fill-check"></i>
              </a>
            </div>
        </div>
        @endcan
        
        @can('admin.consultorios.index')
        <!-- Consultorios -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                
                <p>Consultorios</p>
              </div>
              <div class="icon">
                <i class="fas bi bi-building-fill-add"></i>
              </div>
              <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
                Mas informacion <i class="fas bi bi-building-fill-add"></i>
              </a>
            </div>
        </div>

        @endcan

        @can('admin.doctores.index')
        <!-- Profesionales -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                
                <p>Profesionales</p>
              </div>
              <div class="icon">
                <i class="fas bi bi-person-lines-fill"></i>
              </div>
              <a href="{{ url('admin/doctores') }}" class="small-box-footer">
                Mas informacion <i class="fas bi bi-person-lines-fill"></i>
              </a>
            </div>
        </div>
        @endcan

        @can('admin.horarios.index')
        <!-- Horarios -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                
                <p>Horarios</p>
              </div>
              <div class="icon">
                <i class="fas bi bi-calendar-check"></i>
              </div>
              <a href="{{ url('admin/horarios') }}" class="small-box-footer">
                Mas informacion <i class="fas bi bi-person-lines-fill"></i>
              </a>
            </div>
        </div>

        @endcan

        
    </div>
    <div class="row">
    <div class="col-md-12">
            <div class="card card-outline card-primary">
                <dv class="card-header">
                    <h3 class="card-title">Calendario de atención de Profesionales</h3>
                </dv>
                <div class="card-body">
                    <div class="row">
                    <div class="form group">
                        <label for="">Consultorio</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            <option value="">Seleccione un consultorio...</option>

                            @foreach ($consultorios as $consultorio)
                                <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                             @endforeach
                        </select>
                    </div>
                    </div>
                    <script>
                        $('#consultorio_select').on('change', function(){
                            var consultorio_id = $('#consultorio_select').val();
                            var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
                            url = url.replace(':id', consultorio_id);
                            if(consultorio_id){
                                $.ajax({
                                    url: "{{url('/consultorios/')}}" + '/' + consultorio_id,
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
                    
                    <div id="consultoio_info">

                    </div>
                    <hr>
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

  
    <div class="row">
    <div class="col-md-12">
            <div class="card card-outline card-warning">
                <dv class="card-header">
                    <h3 class="card-title">Calendario de Reserva de Citas Profesionales</h3>
                </dv>
                <div class="card-body">
                    <div class="row">
                    <div class="form group">
                        <label for="">Consultorio</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            <option value="">Seleccione un consultorio...</option>

                            @foreach ($consultorios as $consultorio)
                                <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                             @endforeach
                        </select>
                    </div>
                    </div>
                    
                    <hr>
                    
                </div>  
                <div class="card-body">
                  <div class=""row>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Registrar cita
</button>

<form action="{{url('/admin/eventos/create')}}" method="post">
  @csrf
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserva TuCitaProfesional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Profesional</label>
              <select name="docotor_id" id="" class="form-control">
                @foreach($doctores as $doctore)
                <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos." - ".$doctore->especialidad}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Fecha de reserva</label>
              <input type="date" name="fecha_reserva" class="form-control">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Hora de reserva</label>
              <input type="time" name="hora_reserva" class="form-control">
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
                  </div>
                  
                <div id='calendar'></div>

                </div>  
            </div>
        </div>
    </div>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',
          events: [
            {
              title: '8:00 Consultorio',
              start: '2024-12-18',
              end: '2024-12-18',
              
            }
          ]
        });
        calendar.render();
      });

    </script>

@endsection
