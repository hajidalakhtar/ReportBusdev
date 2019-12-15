@extends('layouts.admin')
@section('content')

<div class="card w-100">
    <div class="card-body">
        <div class="container">
            <h1 class="text-center">Produktivitas</h1>
            <form action="{{Route('admin.PostUpdateProduktivitas')}}" method="POST">
                <div class="row mt-4">
                    <div class="col-md-12" id="produktivitas">

                        <label for="">Tanggal libur<button type="button" class="btn " id="addbutton"><i
                                    class="fas fa-plus"></i>
                            </button> </label>
                        @foreach ($holidayDays as $data)
                        <div class="row" id="form_{{$loop->iteration}}">
                            <div class="col-md-11">
                                <input type="text" class="form-control mt-2" name="produktivitas[]" readonly
                                    data-toggle="datepicker" style="background-color:white"
                                    id="input_{{$loop->iteration}}" value="{{$data}}" readonly>
                            </div>
                            <div class="col-md-1 mt-2">
                                <button type="button" class="btn" id="close_{{$loop->iteration}}"><i
                                        class="fas fa-window-close fa-2x text-danger"
                                        onclick="$('#input_{{$loop->iteration}}').val('');$('#form_{{$loop->iteration}}').remove();"></i></button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary float-right ml-3 mt-3">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Tanggal masuk</th>
                    <th>Jumlah Hari</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->tgl_masuk}}</td>
                    <td>{{$data->jumlah_hari}}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#edit_date_{{$loop->iteration}}">
                            Edit
                        </button></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Wilayah</th>
                    <th>Jumlah Hari</th>
                    <th>Jumlah Progres</th>
                    <th>Jumlah Reject</th>
                    <th>Total </th>
                    <th>Produktivitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->wilayah}}</td>
                    <td>{{$data->jumlah_hari}}</td>
                    <td>{{$data->wilayah_all}}</td>
                    <td>{{$data->wilayah_reject}}</td>
                    <td>{{$data->wilayah_total}}</td>
                    <td>{{$data->produktivitas}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@foreach ($user as $data)
<div class="modal fade" id="edit_date_{{$loop->iteration}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tangal Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="text" class="form-control" data-toggle="datepicker" readonly
                        value="{{$data->tgl_masuk}}" style="background-color:white">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('script')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['JAKARTA 1', 'JAKARTA 2', 'JAKARTA 3', 'SURABAYA', 'SEMARANG'],
        datasets: [{
            data: [{{$produktivitas_jakarta_1}}, {{$produktivitas_jakarta_2}}, {{$produktivitas_jakarta_3}},  {{$produktivitas_surabaya}},{{$produktivitas_semarang}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
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
        legend: {
        display: false,
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
    $('#addbutton').click(function(){
        
    $('#produktivitas').append('<div class"row"><div class="col-md-11" style="padding:0px;"><input type="text" class="form-control mt-2" name="produktivitas[]" data-toggle="datepicker" style="background-color:white" readonly></div></div>')
    $('[data-toggle="datepicker"]').datepicker({
    autoHide: true,
    zIndex: 2048,
    format: 'dd-mm-yyyy',
    });
    });

    $(function() {
    $('[data-toggle="datepicker"]').datepicker({
    autoHide: true,
    zIndex: 2048,
    format: 'dd-mm-yyyy',
    });
    });

</script>
@endsection