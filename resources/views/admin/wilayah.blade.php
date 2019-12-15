@extends('layouts.admin')
@section('navbar_chart')
<ul class="nav ">
    <li class="nav-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_user">New Wilayah</button>
    </li>
</ul>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="userTable" style="width:100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Wilayah Kode</th>
                    <th>Nama Wilayah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wilayah as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->wilayah_kode}}</td>
                    <td>{{$data->nama_wilayah}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_userLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('admin.updateWilayah')}}" method="POST">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <select name="name" id="name" class="form-control">
                                <option>JAKARTA 1</option>
                                <option>JAKARTA 2</option>
                                <option>JAKARTA 3</option>
                                <option>SEMARANG</option>
                                <option>SURABAYA</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PROVINCE</label>
                                <select name="PROVINCE_1" id="PROVINCE" class="form-control">
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CITY</label>
                                <select name="CITY" id="CITY" class="form-control">
                                    <option>Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="float-left btn btn-danger"
                        onclick="var id = $('#id').val();window.location.href = '/delete/wilayah/'+id;">Delete</button>

                </div>
            </form>
        </div>
    </div>
</div>
{{--  --}}

{{-- new --}}
<div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_userLabel">New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('admin.newWilayah')}}" method="POST">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <select name="name" id="name" class="form-control">
                                <option>JAKARTA 1</option>
                                <option>JAKARTA 2</option>
                                <option>JAKARTA 3</option>
                                <option>SEMARANG</option>
                                <option>SURABAYA</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PROVINCE</label>
                                <select name="PROVINCE_1" id="new_PROVINCE" class="form-control">
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CITY</label>
                                <select name="CITY" id="new_CITY" class="form-control">
                                    <option>Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script> --}}
<script>
    $(document).ready(function() {
            $("#PROVINCE").change(function() {
          var provinsi_id = $(this).val();
          console.log(provinsi_id);
          
          
          $.ajax({
          type: "GET",
          url: '/Kota/'+provinsi_id,
          success: function(data){
            console.log(data);
            $('#CITY').html(data)
          }
          });
        })


        $("#new_PROVINCE").change(function() {
          var provinsi_id = $(this).val();
          console.log(provinsi_id);
          
          $.ajax({
          type: "GET",
          url: '/Kota/'+provinsi_id,
          success: function(data){
            console.log(data);
            $('#new_CITY').html(data)
          }
          });
        })
    var table = $('#userTable').DataTable({
        "order": [[ 1, 'asc' ]]
    });

table.on( 'order.dt search.dt', function () {
table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
cell.innerHTML = i+1;
} );
} ).draw();     
    //  var table = $('#userTable').removeAttr('width').DataTable({
    //     scrollX: true,
    //     fixedColumns: true,
    //     "lengthChange": false,
    //     "order": [[ 5, "desc" ]]
    //     });
    $('#userTable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        $("#id").val(data[0]);
        
        
        $('#edit_user').modal('show');
     
        
    } );


 

    } );
   
    
</script>
<script>

</script>
{{-- @include('admin.javascript') --}}
@endsection