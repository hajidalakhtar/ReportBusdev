@extends('layouts.admin')
@section('navbar_chart')
<ul class="nav ">
    <li class="nav-item">
        <a class="nav-link btn btn-primary text-white" href="/register">Add User</a>
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Wilayah</th>
                    <th>Gender</th>
                    <th>Last Login</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->real_email}}</td>
                    <td>{{$data->role}}</td>
                    <td>{{$data->wilayah}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->last_login}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_userLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="edit_user">
                <form action="{{Route('admin.UpdateUser')}}" method="POST">
                    <div class="modal-body">
                        <h3 id="pic_name" class="text-center"></h3>
                        <p id="wilayah" class="text-center"></p>
                        <input type="hidden" name="id_user" class="id_user" id="id_user">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="#email">Name</label>
                                <input type="text" name="pic_name" class="form-control" id="pic_name_input">
                            </div>
                            <div class="col-md-6">
                                <label for="#role">Role</label>
                                <select name="role" id="role" name="role" class="form-control">
                                    <option value="staff">Staff</option>
                                    <option value="Master Admin">Master Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="pnl">PnL</option>
                                    <option value="planning">Planning</option>
                                    <option value="pks">Pks</option>
                                    <option value="rts">Ready To Sell</option>
                                    <option value="revshare">Rev Share</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="#email">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="#wilayah_form">Wilayah</label>
                                <select name="wilayah" id="wilayah_form" class="form-control">
                                    <option value="NONE">NONE</option>
                                    <option value="JAKARTA 1">JAKARTA 1</option>
                                    <option value="JAKARTA 2">JAKARTA 2</option>
                                    <option value="JAKARTA 3">JAKARTA 3</option>
                                    <option value="SURABAYA">SURABAYA</option>
                                    <option value="SEMARANG">SEMARANG</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="#gender_form">Gender</label>
                                <select name="gender" id="gender_form" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer w-100">
                        <div class="d-flex w-100 justify-content-between">
                            <p id="gantipassword">Change Password</p>
                            <div>
                                <button
                                    onclick="var id = $('#id_user').val();window.location.href = '/delete/user/'+id;"
                                    {{-- onclick="window.location.href = ''+window.localStorage.getItem('id_user')" --}}
                                    class="btn btn-danger" type="button">DELETE</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="edit_password">
                <form action="{{Route('admin.UpdatePassword')}}" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_user" class="id_user">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="#password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer w-100">
                        <div class="d-flex w-100 justify-content-between">
                            {{-- <p id="gantipassword">Change Password</p> --}}
                            <div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
    var table = $('#userTable').DataTable();
     
    $('#userTable tbody').on('click', 'tr', function () {
    // alert()
        var data = table.row( this ).data();
        window.localStorage.setItem('id_user', data[0]);   
        
        $('#edit_user_modal').modal('show');
        $('#pic_name').text(data[1]); 
        $('#pic_name_input').val(data[1]); 
        $('#wilayah').text(data[4]); 
        
        $('.id_user').val(data[0]); 
        $('#email').val(data[2]); 
        $('#role').val(data[3]); 
        $('#wilayah_form').val(data[4]); 
        
    } );
} );

$('#edit_user_modal').on('hidden.bs.modal', function (e) {
$("#edit_user").show()
$("#edit_password").hide()
})
    $("#edit_password").hide()
    $( "#gantipassword" ).click(function() {
    $("#edit_user").hide()
    $("#edit_password").show()    
    return false;
});

</script>
{{-- @include('admin.javascript') --}}
@endsection