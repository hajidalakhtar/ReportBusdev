@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">DATABASE

            <div style="width:100px" class="float-right">
                <select name="" class="form-control" id="tahun_periode" onchange="year(this)">
                    @foreach ($tahun as $data)
                    <option value="{{$data->tahun}}"
                        {{ $WebSetting->rev_share_tahun === $data->tahun ? "selected" : "" }}>
                        {{$data->tahun}}</option>
                    @endforeach
                </select>
            </div>
            <div class="float-right">
                <h5 class="mt-2 mr-2 ml-4"><b>Tahun</b></h5>
            </div>
            <div style="width:100px" class="float-right">

                <select name="" class="form-control" id="tahun_periode_range" onchange="yearrange(this)">
                    @foreach ($tahun as $data)
                    <option {{ $WebSetting->rev_share_tahun_range === $data->tahun ? "selected" : "" }}>
                        {{$data->tahun}}
                    </option>

                    @endforeach
                </select>
            </div>
            <div class="float-right">
                <h5 class="mt-2 mr-2 ml-4"><b>Range Tahun</b></h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered nowrap" id="users-table" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Building Name</th>
                        <th>
                            Rev Share
                        </th>
                        <th>Harga Sew</th>
                        <th>OTF</th>
                        <th>
                            Mulai&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th>
                            Akhir&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th>Periode
                            1&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                        <th>Periode
                            2&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                        <th>Periode
                            3&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th>
                            Periode
                            4&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->BUILDING_NAME}}</td>
                        <td>{{$data->Revenue_Share_persen}}</td>
                        <td>{{$data->Harga_Sewa}}</td>
                        <td>{{$data->ONE_TIME_FEE}}</td>
                        <td>{{$data->BASO_DATE}}</td>

                        {{-- <td>{{$data->NAME}}</td> --}}
                        <td>
                            {{$data->PKS_END}}
                        </td>
                        <td class="detailss">
                            <div class=" row">
                                <div class="col-md-8 ml-4" style="padding:0px;">
                                    <select name="periode" id="details" class="form-control periode_1"
                                        onchange="save_progres_1({{$data->id}},this)">
                                        <option value="Recuring"
                                            {{ $data->progress_1 === "Recuring" ? "selected" : "" }}>Recuring</option>
                                        <option value="Invoice" {{ $data->progress_1 === "Invoice" ? "selected" : "" }}>
                                            Invoice</option>
                                        <option value="Roling doc"
                                            {{ $data->progress_1 === "Roling doc" ? "selected" : "" }}>Roling doc
                                        </option>
                                        <option value="PR" {{ $data->progress_1 === "PR" ? "selected" : "" }}>PR
                                        </option>
                                        <option value="PO" {{ $data->progress_1 === "PO" ? "selected" : "" }}>PO
                                        </option>
                                        <option value="Terbayar"
                                            {{ $data->progress_1 === "Terbayar" ? "selected" : "" }}>Terbayar</option>
                                    </select>
                                </div>
                                <a class="btn btn-primary ml-2 text-white" style="width:50px" id="details"
                                    target="_blank" onclick="openmodal_ket_1({{$data->id}})">KET</a>
                            </div>

                        </td>
                        <td class="detailss">
                            <div class=" row">
                                <div class="col-md-8 ml-4" style="padding:0px;">
                                    <select name="periode" id="details" class="form-control periode_2"
                                        onchange="save_progres_2({{$data->id}},this)">
                                        <option value="Recuring"
                                            {{ $data->progress_2 === "Recuring" ? "selected" : "" }}>Recuring</option>
                                        <option value="Invoice" {{ $data->progress_2 === "Invoice" ? "selected" : "" }}>
                                            Invoice</option>
                                        <option value="Roling doc"
                                            {{ $data->progress_2 === "Roling doc" ? "selected" : "" }}>Roling doc
                                        </option>
                                        <option value="PR" {{ $data->progress_2 === "PR" ? "selected" : "" }}>PR
                                        </option>
                                        <option value="PO" {{ $data->progress_2 === "PO" ? "selected" : "" }}>PO
                                        </option>
                                        <option value="Terbayar"
                                            {{ $data->progress_2 === "Terbayar" ? "selected" : "" }}>Terbayar</option>
                                    </select>
                                </div>
                                <a class="btn btn-primary ml-2 text-white" style="width:50px" id="details"
                                    target="_blank" onclick="openmodal_ket_2({{$data->id}})">KET</a>
                            </div>

                        </td>
                        <td class="detailss">
                            <div class=" row">
                                <div class="col-md-8 ml-4" style="padding:0px;">
                                    <select name="periode" id="details" class="form-control periode_3"
                                        onchange="save_progres_3({{$data->id}},this)">
                                        <option value="Recuring"
                                            {{ $data->progress_3 === "Recuring" ? "selected" : "" }}>Recuring</option>
                                        <option value="Invoice" {{ $data->progress_3 === "Invoice" ? "selected" : "" }}>
                                            Invoice</option>
                                        <option value="Roling doc"
                                            {{ $data->progress_3 === "Roling doc" ? "selected" : "" }}>Roling doc
                                        </option>
                                        <option value="PR" {{ $data->progress_3 === "PR" ? "selected" : "" }}>PR
                                        </option>
                                        <option value="PO" {{ $data->progress_3 === "PO" ? "selected" : "" }}>PO
                                        </option>
                                        <option value="Terbayar"
                                            {{ $data->progress_3 === "Terbayar" ? "selected" : "" }}>Terbayar</option>
                                    </select>
                                </div>
                                <a class="btn btn-primary ml-2 text-white" style="width:50px" id="details"
                                    target="_blank" onclick="openmodal_ket_3({{$data->id}})">KET</a>
                            </div>

                        </td>
                        <td class="detailss">
                            <div class="row">
                                <div class="col-md-8 ml-4" style="padding:0px;">
                                    <select name="periode" id="details" class="form-control periode_4"
                                        onchange="save_progres_4({{$data->id}},this)">
                                        <option value="Recuring"
                                            {{ $data->progress_4 === "Recuring" ? "selected" : "" }}>Recuring</option>
                                        <option value="Invoice" {{ $data->progress_4 === "Invoice" ? "selected" : "" }}>
                                            Invoice</option>
                                        <option value="Roling doc"
                                            {{ $data->progress_4 === "Roling doc" ? "selected" : "" }}>Roling doc
                                        </option>
                                        <option value="PR" {{ $data->progress_4 === "PR" ? "selected" : "" }}>PR
                                        </option>
                                        <option value="PO" {{ $data->progress_4 === "PO" ? "selected" : "" }}>PO
                                        </option>
                                        <option value="Terbayar"
                                            {{ $data->progress_4 === "Terbayar" ? "selected" : "" }}>Terbayar</option>
                                    </select>
                                </div>
                                <a class="btn btn-primary ml-2 text-white" style="width:50px" id="details"
                                    target="_blank" onclick="openmodal_ket_4({{$data->id}})">KET</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="openmodal_periode_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Periode 1 <button id="addbutton_1" class="btn"><i
                                class="fas fa-plus"></i></button></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{Route('addPeriode_1')}}" method="post">
                    <input type="hidden" name="id" id="id_1" class="form-control">
                    <div class="modal-body ">
                        <table class="table border" id="table_periode_1" width="100%" border="1">
                            <tr>

                                <td style="width:500px;"><span class="text-center w-100 ml-2">Tgl</span></td>
                                <td style="width:1000px;"><span class="text-center w-100 ml-2">Keterangan</span></td>
                            </tr>
                            {{-- <tr>
                                <td><input type="text" id="tgl_1" name="tgl[]" class="form-control" value=""></td>
                                <td><textarea name="keterangan[]" id="keterangan_1" class="form-control" rows="10" id=""
                                        cols="30"></textarea>
                                </td>
                            </tr> --}}
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="openmodal_periode_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Periode 2 <button id="addbutton_2" class="btn"><i
                                class="fas fa-plus"></i></button></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{Route('addPeriode_2')}}" method="post">
                    <input type="hidden" name="id" id="id_2" class="form-control">
                    <div class="modal-body ">
                        <table class="table border" id="table_periode_2" width="100%" border="1">
                            <tr>

                                <td style="width:500px;"><span class="text-center w-100 ml-2">Tgl</span></td>
                                <td style="width:1000px;"><span class="text-center w-100 ml-2">Keterangan</span></td>
                            </tr>


                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="openmodal_periode_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Periode 3 <button id="addbutton_3" class="btn"><i
                                class="fas fa-plus"></i></button></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{Route('addPeriode_3')}}" method="post">
                    <input type="hidden" name="id" id="id_3" class="form-control">
                    <div class="modal-body ">
                        <table class="table border" id="table_periode_3" width="100%" border="1">
                            <tr>

                                <td style="width:500px;"><span class="text-center w-100 ml-2">Tgl</span></td>
                                <td style="width:1000px;"><span class="text-center w-100 ml-2">Keterangan</span></td>
                            </tr>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="openmodal_periode_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Periode 4 <button id="addbutton_4" class="btn"><i
                                class="fas fa-plus"></i></button></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{Route('addPeriode_4')}}" method="post">
                    <input type="hidden" name="id" id="id_4" class="form-control">
                    <div class="modal-body ">
                        <table class="table border" id="table_periode_4" width="100%" border="1">
                            <tr>

                                <td style="width:500px;"><span class="text-center w-100 ml-2">Tgl</span></td>
                                <td style="width:1000px;"><span class="text-center w-100 ml-2">Keterangan</span></td>
                            </tr>


                        </table>
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
    {{-- @include('admin.javascript') --}}
    <script>
        $("#tahun_periode").val(window.localStorage.getItem('year'));
        
        // alert("Asdasds");
       
        // $(".detailss").click(function() {
        //     alert("asdasdad");
        // window.localStorage.setItem('progres', "VIEW");
        // setInterval(function(){
        // window.localStorage.setItem('progres', "NOT");
        // console.log("aaaaaaaaaaaaaaaaaa");
        // window.localStorage.setItem('id_fase', "kosong");
        // }, 10);
        // });
        // alert(window.localStorage.getItem('year'))
        // form_periode_1
        // form_periode_2
        // form_periode_3
        // form_periode_4
        $('#openmodal_periode_1').on('hidden.bs.modal', function (e) {
        $(".form_periode_1").remove();
        })
        $('#openmodal_periode_2').on('hidden.bs.modal', function (e) {
        $(".form_periode_2").remove();
        })
        $('#openmodal_periode_3').on('hidden.bs.modal', function (e) {
        $(".form_periode_3").remove();
        })
        $('#openmodal_periode_4').on('hidden.bs.modal', function (e) {
        $(".form_periode_4").remove();
        })

        

            function year(sel) {
                $.ajax({
                    type: "POST",
                    data: { tahun:sel.value} ,
                    url:'/api/rev/tahun/',
                    success: function(data_1) {
                    console.log("masuk");
                    localStorage.setItem("year", sel.value);
                    location.reload();
                    }
                    })
                
            }
                 function yearrange(sel) {
                $.ajax({
                    type: "POST",
                    data: { tahun:sel.value} ,
                    url:'/api/rev/range/tahun',
                    success: function(data_1) {
                    console.log("masuk");
                    // localStorage.setItem("year_range", sel.value);
                    location.reload();
                    }
                    })
                
            }
            

            $('#addbutton_1').click(function(){
                $('#table_periode_1').append('<tr class="form_periode_1"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')
            });
              $('#addbutton_2').click(function(){
                $('#table_periode_2').append('<tr class="form_periode_2"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')
            });
              $('#addbutton_3').click(function(){
                $('#table_periode_3').append('<tr class="form_periode_3"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')
            });
                $('#addbutton_4').click(function(){
                $('#table_periode_4').append('<tr class="form_periode_4"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')
            });
            
        
            function save_progres_1(id,sel) {
                $.ajax({
                    type: "POST",
                    data: { tahun: window.localStorage.getItem('year') ,progress: sel.value} ,
                    url:'/api/progress/periode/1/'+id,
                    success: function(data_1) {
                        console.log("masuk");
                    }
                    })
            }
                  function save_progres_2(id,sel) {
                $.ajax({
                    type: "POST",
                    data: { tahun: window.localStorage.getItem('year') ,progress: sel.value} ,
                    url:'/api/progress/periode/2/'+id,
                    success: function(data_1) {
                        console.log("masuk");
                    }
                    })
            }

      function save_progres_3(id,sel) {
                $.ajax({
                    type: "POST",
                    data: { tahun: window.localStorage.getItem('year') ,progress: sel.value} ,
                    url:'/api/progress/periode/3/'+id,
                    success: function(data_1) {
                        console.log("masuk");
                    }
                    })
            }

      function save_progres_4(id,sel) {
                $.ajax({
                    type: "POST",
                    data: { tahun: window.localStorage.getItem('year') ,progress: sel.value} ,
                    url:'/api/progress/periode/4/'+id,
                    success: function(data_1) {
                        console.log("masuk");
                    }
                    })
            }


        function openmodal_ket_1($id){
           $.ajax({
                type: "GET",
                url:'/api/revshare/'+$id+'/'+window.localStorage.getItem('year'),
                success: function(data_1) {
                    console.log(data_1);
                    
                    $("#id_1").val($id);
                    if (data_1.periode == null) {
                        $('#table_periode_1').append('<tr class="form_periode_1"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" value="" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')

                         $("#openmodal_periode_1").modal('show')
                    }else if(data_1.periode.tgl_1 == null){
                          $('#table_periode_1').append('<tr class="form_periode_1"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" value="" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')

                         $("#openmodal_periode_1").modal('show')
                    }else{

                    var data_tgl = data_1.periode.tgl_1;
                    var array_tgl_data = data_tgl.split(",");
                    var data_Keterangan = data_1.periode.keterangan_1;

                    var array_Keterangan_data = data_Keterangan.split(",");
                    $("#tgl_1").val();
                    $('#table_periode_1').append('<tr class="form_periode_1"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" value="'+array_tgl_data[0] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[0]+'</textarea></td></tr>')

                    for (let i = 1; i < array_tgl_data.length; i++) {
                    $('#table_periode_1').append('<tr class="form_periode_1"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_1" value="'+array_tgl_data[i] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_1"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[i]+'</textarea></td></tr>')
                    }
                      $("#openmodal_periode_1").modal('show')
                    }
              }
        })
        }
              function openmodal_ket_2($id){
           $.ajax({
                type: "GET",
                url:'/api/revshare/'+$id+'/'+window.localStorage.getItem('year'),
                success: function(data_1) {
                    $("#id_2").val($id);
                        if (data_1.periode == null) {
                        $('#table_periode_2').append('<tr class="form_periode_2"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_2" value="" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_2"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')

                         $("#openmodal_periode_2").modal('show')
                    }else if (data_1.periode.tgl_2 == null) {
                    $('#table_periode_2').append('<tr class="form_periode_2"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_2" value="" name="tgl[]" class="form-control" value=""></td> <td><textarea name="keterangan[]" id="keterangan_2" class="form-control" id="" cols="30" rows="10"></textarea></td></tr>')
                    
                    $("#openmodal_periode_2").modal('show')
                    }
                    {

                    var data_tgl = data_1.periode.tgl_2;
                    var array_tgl_data = data_tgl.split(",");
                    var data_Keterangan = data_1.periode.keterangan_2;

                    var array_Keterangan_data = data_Keterangan.split(",");
                    $("#tgl_2").val();
                    $('#table_periode_2').append('<tr class="form_periode_2"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_2" value="'+array_tgl_data[0] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_2"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[0]+'</textarea></td></tr>')

                    for (let i = 1; i < array_tgl_data.length; i++) {
                    $('#table_periode_2').append('<tr class="form_periode_2"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_2" value="'+array_tgl_data[i] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_2"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[i]+'</textarea></td></tr>')
                    }
                      $("#openmodal_periode_2").modal('show')
                    }
                    // console.log(data_1);
                    
                $("#openmodal_periode_2").modal('show')
              }
        })
        }
              function openmodal_ket_3($id){
           $.ajax({
                type: "GET",
                url:'/api/revshare/'+$id+'/'+window.localStorage.getItem('year'),
                success: function(data_1) {
                    $("#id_3").val($id);
                      if (data_1.periode == null) {
                        $('#table_periode_3').append('<tr class="form_periode_3"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_3" value="" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_3"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')

                         $("#openmodal_periode_3").modal('show')
                    }else if (data_1.periode.tgl_3 == null) {
                    $('#table_periode_3').append('<tr class="form_periode_3"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_3" value="" name="tgl[]" class="form-control" value=""></td> <td><textarea name="keterangan[]" id="keterangan_3" class="form-control" id="" cols="30" rows="10"></textarea></td></tr>')
                    
                    $("#openmodal_periode_3").modal('show')
                    }
                    {

                    var data_tgl = data_1.periode.tgl_3;
                    var array_tgl_data = data_tgl.split(",");
                    var data_Keterangan = data_1.periode.keterangan_3;

                    var array_Keterangan_data = data_Keterangan.split(",");
                    $("#tgl_3").val();
                    $('#table_periode_3').append('<tr class="form_periode_3"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_3" value="'+array_tgl_data[0] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_3"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[0]+'</textarea></td></tr>')

                    for (let i = 1; i < array_tgl_data.length; i++) {
                    $('#table_periode_3').append('<tr class="form_periode_3"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_3" value="'+array_tgl_data[i] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_3"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[i]+'</textarea></td></tr>')
                    }
                      $("#openmodal_periode_3").modal('show')
                    }
                    // console.log(data_1);
                    
                $("#openmodal_periode_3").modal('show')
              }
        })
        }
              function openmodal_ket_4($id){
           $.ajax({
                type: "GET",
                url:'/api/revshare/'+$id+'/'+window.localStorage.getItem('year'),
                success: function(data_1) {
                    $("#id_4").val($id);
                             if (data_1.periode == null) {
                        $('#table_periode_4').append('<tr class="form_periode_4"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_4" value="" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_4"  class="form-control" id="" cols="30" rows="10" ></textarea></td></tr>')

                         $("#openmodal_periode_4").modal('show')
                    }else if (data_1.periode.tgl_4 == null) {
                    $('#table_periode_4').append('<tr class="form_periode_4"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_4" value="" name="tgl[]" class="form-control" value=""></td> <td><textarea name="keterangan[]" id="keterangan_4" class="form-control" id="" cols="30" rows="10"></textarea></td></tr>')
                    
                    $("#openmodal_periode_4").modal('show')
                    }
                    {

                    var data_tgl = data_1.periode.tgl_4;
                    var array_tgl_data = data_tgl.split(",");
                    var data_Keterangan = data_1.periode.keterangan_4;

                    var array_Keterangan_data = data_Keterangan.split(",");
                    $("#tgl_4").val();
                    $('#table_periode_4').append('<tr class="form_periode_4"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_4" value="'+array_tgl_data[0] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_4"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[0]+'</textarea></td></tr>')

                    for (let i = 1; i < array_tgl_data.length; i++) {
                    $('#table_periode_4').append('<tr class="form_periode_4"><td> <input type="hidden" value="'+window.localStorage.getItem('year')+'" name="tahun"> <input type="text" id="tgl_4" value="'+array_tgl_data[i] +'" name="tgl[]" class="form-control" value=""></td><td><textarea name="keterangan[]" id="keterangan_4"   class="form-control" id="" cols="30" rows="10" >'+array_Keterangan_data[i]+'</textarea></td></tr>')
                    }
                      $("#openmodal_periode_4").modal('show')
                    }
                        $("#keterangan_4").val(data_1.periode.keterangan_4);
                    // console.log(data_1);
                    
                $("#openmodal_periode_4").modal('show')
              }
        })
        }
    </script>
    {{-- @include('admin.contentjs') --}}
    {{-- @include('staff.javascript') --}}
    @endsection
    {{-- 
    <tr>
        <td>No</td>
        <td>Building Name</td>
        <td>Rev Share</td>
        <td>Harga Sewa</td>
        <td>OTF</td>
        <td>Mulai</td>
        <td>Akhir</td>
        <td>Periode 1</td>
        <td>Periode 2</td>
        <td>Periode 3</td>
        <td>Periode 4</td>
    </tr>
    @foreach ($report as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
    <td>{{$data->BUILDING_NAME}}</td>
    <td>{{$data->Revenue_Share_persen}}</td>
    <td>{{$data->Harga_Sewa}}</td>
    <td>{{$data->ONE_TIME_FEE}}</td>
    <td>{{$data->BASO_DATE}}</td>
    <td>{{$data->PKS_END}}</td>
    <td>

        <div class="row">
            <div class="col-md-8 ml-4" style="padding:0px;">
                <select name="periode" id=" class=" form-control" periode_" onchange="save_progres({{$data->id}})">
                    <option value="Recuring">Recuring</option>
                    <option value="Invoice">Invoice</option>
                    <option value="Roling doc">Roling doc</option>
                    <option value="PR">PR</option>
                    <option value="PO">PO</option>
                    <option value="Terbayar">Terbayar</option>
                </select>
            </div>
            <div class="col-md-1" style="width: 10px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openmodal_periode_1">
                    ket
                </button>
            </div>
        </div>
    </td>
    <td>

        <div class="row">
            <div class="col-md-8 ml-4" style="padding:0px;">
                <select name="periode" id=" class=" form-control" periode_" onchange="save_progres({{$data->id}})">
                    <option value="Recuring">Recuring</option>
                    <option value="Invoice">Invoice</option>
                    <option value="Roling doc">Roling doc</option>
                    <option value="PR">PR</option>
                    <option value="PO">PO</option>
                    <option value="Terbayar">Terbayar</option>
                </select>
            </div>
            <div class="col-md-1" style="width: 10px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openmodal_periode_1">
                    ket
                </button>
            </div>
        </div>
    </td>
    <td>

        <div class="row">
            <div class="col-md-8 ml-4" style="padding:0px;">
                <select name="periode" id=" class=" form-control" periode_" onchange="save_progres({{$data->id}})">
                    <option value="Recuring">Recuring</option>
                    <option value="Invoice">Invoice</option>
                    <option value="Roling doc">Roling doc</option>
                    <option value="PR">PR</option>
                    <option value="PO">PO</option>
                    <option value="Terbayar">Terbayar</option>
                </select>
            </div>
            <div class="col-md-1" style="width: 10px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openmodal_periode_1">
                    ket
                </button>
            </div>
        </div>
    </td>
    <td>

        <div class="row">
            <div class="col-md-8 ml-4" style="padding:0px;">
                <select name="periode" id=" class=" form-control" periode_" onchange="save_progres({{$data->id}})">
                    <option value="Recuring">Recuring</option>
                    <option value="Invoice">Invoice</option>
                    <option value="Roling doc">Roling doc</option>
                    <option value="PR">PR</option>
                    <option value="PO">PO</option>
                    <option value="Terbayar">Terbayar</option>
                </select>
            </div>
            <div class="col-md-1" style="width: 10px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openmodal_periode_1">
                    ket
                </button>
            </div>
        </div>
    </td>
    </tr>

    @endforeach --}}