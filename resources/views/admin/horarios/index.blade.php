@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Horarios</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Horarios registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
                            Registrar nuevo
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead style="background-color: #c0c0c0">
                            <tr>
                                <td style="text-align: center"><b>Nro</b></td>
                                <td style="text-align: center"><b>Profesional</b></td>
                                <td style="text-align: center"><b>Especialidad</b></td>
                                <td style="text-align: center"><b>Consultorio</b></td>
                                <td style="text-align: center"><b>Dia de Atencion</b></td>
                                <td style="text-align: center"><b>Hora Inicio</b></td>
                                <td style="text-align: center"><b>Hora Fin</b></td>
                                <td style="text-align: center"><b>Acciones</b></td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ($horarios as $horario)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td style="text-align: center">{{ $horario->doctor->nombres ." ".$horario->doctor->apellidos }}</td>
                                    <td style="text-align: center">{{ $horario->doctor->especialidad}}</td>
                                    <td style="text-align: center">{{ $horario->consultorio->nombre." Ubicacion: ".$horario->consultorio->ubicacion }}</td>
                                    <td style="text-align: center">{{ $horario->dia }}</td>
                                    <td style="text-align: center">{{ $horario->hora_inicio }}</td>
                                    <td style="text-align: center">{{ $horario->hora_fin }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                            <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <script>
            $(function () {
                $("#example1").DataTable({
                    "pageLength": 10,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                        "infoFiltered": "(Filtrado de MAX total Horarios)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar MENU Horarios",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "responsive": true, "lengthChange": true, "autoWidth": false,
                    buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy',
                        }, {
                            extend: 'pdf'
                        },{
                            extend: 'csv'
                        },{
                            extend: 'excel'
                        },{
                            text: 'Imprimir',
                            extend: 'print'
                        }
                        ]
                    },
                        {
                            extend: 'colvis',
                            text: 'Visor de columnas',
                            collectionLayout: 'fixed three-column'
                        }
                    ],
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            </script>
        </div>
        
        <br>
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
    
@endsection