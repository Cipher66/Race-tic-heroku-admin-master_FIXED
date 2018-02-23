@extends('layouts.app')

@section('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <div class="container">
        <div class="row">
            <h3></h3>
        </div>
    </div>
    <div class="container ">
        <div class="row well-sm well">
            <div class="col-md-10 ">
                <h3></h3>
                @php
                    $id = Auth::user()->id;
                    $carreras = DB::table('carreras')->where("usuario_id",$id)->get();
                    $coches = DB::table('coches')->where("user_id",$id)->get();

                    foreach($coches as $dataob){

                    $marca = $dataob->marca;
                    $modelo = $dataob->modelo;
                    }

                     foreach ($carreras as $numcarrera){
                        $numidcarrera = $numcarrera->id_carrera ;
                     }

                    $arraycarreras = array();
                    $carrerasreg = DB::table('carreras_registros')->where("carrera_id",$numidcarrera)->orderBy('id_registro','desc')->get();
                    array_push($arraycarreras, $carrerasreg);




                @endphp

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos en vivo</h3>
                        <h3 class=" panel-title text-center">{{$marca}} {{$modelo}}</h3>
                        <div class="pull-right">
                                <span class="refrescar clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                        <i class="glyphicon glyphicon-refresh"></i>Actualizar
                     </span>
                        </div>
                    </div>
                    <table class="table table-hover" id="dev-table">
                        <thead>
                        </thead>
                        <thead>
                        <tr>
                            <th>Velocidad</th>
                            <th>Revoluciones</th>
                            <th>Temperatura </th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($arraycarreras as $arrayCarrera)
                            @foreach($arrayCarrera as $object)
                                <tr>
                                    <th>{{ $object->temperatura}}</th>
                                    <th>{{ $object->revoluciones }}</th>
                                    <th>{{ $object->temperatura }}</th>
                                </tr>
                            @endforeach
                        @endforeach



                        </tbody>

                    </table>

                </div>


                @php

                    foreach($carrerasreg as $showTemp){
                        $datatemp = $showTemp->temperatura;
                    }

                @endphp

                @if($datatemp < 75)
                    <div id="errordiv" class="alert alert-danger" >
                        El motor está frio
                    </div>


                @elseif($datatemp > 75 && $datatemp < 120)
                    <div id="biendiv" class="alert alert-success">
                        El motor está en una temperatura óptima
                    </div>

                @else
                    <div id="errordiv2" class="alert alert-danger" hidden>
                        El motor esta sobrecalentado
                    </div>
                @endif
            </div>



            <canvas id="myChart" ></canvas>


        </div>

    </div>

    <script>

        $(document).ready(function(){
            setTimeout(function(){
                location.reload();
            }, 10000);
        });


    </script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');


        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                @foreach($carrerasreg as $objmostfecha)

                labels: ['{{$objmostfecha->created_at}}'],
                @endforeach

                datasets: [{
                    width:10,
                    height:50,
                    label: 'Temperatura ºC',
                    @foreach($carrerasreg as $objmost)

                    data: [{{$objmost->temperatura}}],
                    @endforeach
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });


        $(".refrescar").on("click",function(){

            //addData();

            location.reload();
        });

    </script>





@endsection