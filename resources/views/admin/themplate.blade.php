@extends('layouts.admin')
@section('navbar_chart')
<ul class="nav ">
    <li class="nav-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">Add Template</button>
    </li>
</ul>
@endsection
@section('content')
<div class="card w-100">
    <div class="card-body">
        <h1 class="text-center mb-4"> <b>Template</b></h1>
        <div class="row">
            <div class="col-md-12 ">
                <div class="info-box mb-2" style="margin-bottom:0px;">
                    <div class="container">
                        <div class="row">
                            @foreach ($themplate as $data)
                            <div class="col-md-1">
                                <a href="" onclick="openModalEdit({{$data->id}});return false;">
                                    <span class="info-box-icon bg-primary elevation-1 mt-2" style="height: 70px;">
                                        <i class="{!!$data->icon!!}"></i>
                                    </span>
                                    <p style="color:black" class=" text-center">
                                        {{$data->title}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="updatetemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container mt-3">
                <form action="{{Route('admin.UploadTemplate')}}" method="post" id="uploadForm"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id_file">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Upload File</label><br>
                            <input type="file" name="form">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <input type="submit" value="Upload" class="btn btn-primary float-right">
                        </div>
                    </div>
                </form>
            </div>
            <form action="{{Route('admin.postUpdateTemplate')}}" method="post">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <label for="" class="mt-2">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <label for="" class="mt-2">Icon</label>
                    <input class="demo form-control icp icp-auto iconpicker-element iconpicker-input" name="icon"
                        value="fa-anchor" id="icon" type="text">
                </div>
                <div class="modal-footer">
                    <a href="/tes" class="btn btn-danger" id="delete">Delete</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{Route('admin.postAddTemplate')}}" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Upload File</label><br>
                            <input type="file" name="form">
                        </div>
                    </div>
                    <input type="hidden" name="id">
                    <label for="" class="mt-2 mt-3">Title</label>
                    <input type="text" name="title" class="form-control">
                    <label for="" class="mt-2">Icon</label>
                    <input class="demo form-control icp icp-auto iconpicker-element iconpicker-input" name="icon"
                        value="fa-anchor" type="text">

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    // $( "#openModalEdit" ).click(function(e) {
    //     e.preventDefault();
    // });
    $('.demo').iconpicker({animation:false});
    function openModalEdit(id) {
        // alert(id);
       $.ajax({
          type: "GET",
          url: '/api/template/'+id,
          success: function(data){
              $("#id").val(data.id);
              $("#title").val(data.title);
              $("#icon").val(data.icon);
              $("#id_file").val(data.id);
           $("#delete").attr("href", "/delete/template/"+id);
              
            $('#updatetemplate').modal('show')
          }
        });    


        }
        
    $("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('admin.UploadTemplate')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	     
   
       });
	}));

</script>
@endsection