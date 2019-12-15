@extends('layouts.admin')
@section('content')
<div class="card w-100">
    <div class="card-body">
        <h1 class="text-center mb-4"> <b>EMAIL SETTING</b>
            <label class="switch float-right">
                <input type="checkbox" id="setting" checked>
                <span class="slider round"></span> </label>
        </h1>
        <form action="{{Route('admin.UpdateEmail')}}" method="POST">
            <div class="form-group row" style="margin-bottom:0px">
                <label for="" class="col-sm-2 col-form-label">SUBMIT PROPOSAL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="SUBMIT_PROPOSAL" placeholder="SUBMIT PROPOSAL"
                        value="{{$email->SUBMIT_PROPOSAL}}">
                </div>
            </div>
            <p>
                <a data-toggle="collapse" style="margin-left:180px;" href="#collapseSUBMIT_PROPOSAL" role="button"
                    aria-expanded="false" aria-controls="collapseSUBMIT_PROPOSAL">
                    Edit template
                </a>
                <i>
            </p>
            <div class="collapse" id="collapseSUBMIT_PROPOSAL" style="margin-left:180px">
                <form action="" method="post"></form>
                <form action="UpdateTemplateEmailSUBMIT_PROPOSAL" method="post">
                    <div class="card card-body">
                        <div class="w-100">
                            <textarea name="SUBMIT_PROPOSAL" id="" class="form-control" cols="30"
                                rows="10">{{$emailtemplate->SUBMIT_PROPOSAL}}</textarea>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary w-25 float-right mt-2" class="w-25">
                    </div>
                </form>
            </div>

            <div class="form-group row" style="margin-bottom:0px">
                <label for="" class="col-sm-2 col-form-label">SITE SURVEY</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="SITE SURVEY" name="SITE_SURVEY"
                        value="{{$email->SITE_SURVEY}}">
                </div>
            </div>
            <p>
                <a data-toggle="collapse" style="margin-left:180px;" href="#collapseSITE_SURVEY" role="button"
                    aria-expanded="false" aria-controls="collapseSITE_SURVEY">
                    Edit template
                </a>
                <i>
            </p>
            <div class="collapse" id="collapseSITE_SURVEY" style="margin-left:180px">
                <form action="" method="post"></form>
                <form action="UpdateTemplateEmailSITE_SURVEY" method="post">
                    <div class="card card-body">
                        <div class="w-100">
                            <textarea name="SITE_SURVEY" id="" class="form-control" cols="30"
                                rows="10">{{$emailtemplate->SITE_SURVEY}}</textarea>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary w-25 float-right mt-2" class="w-25">
                    </div>
                </form>
            </div>

            <div class="form-group row" style="margin-bottom:0px;">
                <label for="" class="col-sm-2 col-form-label">BOQ & APD</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="BOQ, SITE SURVEY REPORT, DESIGN PROGRESS"
                        name="BOQ" value="{{$email->BOQ}}">
                </div>
            </div>
            <p>
                <a data-toggle="collapse" style="margin-left:180px;" href="#collapseBOQ" role="button"
                    aria-expanded="false" aria-controls="collapseBOQ">
                    Edit template
                </a>
                <i>
            </p>
            <div class="collapse" id="collapseBOQ" style="margin-left:180px">
                <form action="" method="post"></form>
                <form action="UpdateTemplateEmailBOQ" method="post">
                    <div class="card card-body">
                        <div class="w-100">
                            <textarea name="BOQ" id="" class="form-control" cols="30"
                                rows="10">{{$emailtemplate->BOQ}}</textarea>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary w-25 float-right mt-2" class="w-25">
                    </div>
                </form>
            </div>
            <div class="form-group row" style="margin-bottom:0px;">
                <label for="" class="col-sm-2 col-form-label">PnL PROGRESS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="PNL" placeholder="PnL PROGRESS"
                        value="{{$email->PNL}}">
                </div>
            </div>
            <p>
                <a data-toggle="collapse" style="margin-left:180px;" href="#collapsePNL" role="button"
                    aria-expanded="false" aria-controls="collapsePNL">
                    Edit template
                </a>
                <i>
            </p>
            <div class="collapse" id="collapsePNL" style="margin-left:180px">
                <form action="" method="post"></form>
                <form action="UpdateTemplateEmailPNL" method="post">
                    <div class="card card-body">
                        <div class="w-100">
                            <textarea name="PNL" id="" class="form-control" cols="30"
                                rows="10">{{$emailtemplate->PNL}}</textarea>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary w-25 float-right mt-2" class="w-25">
                    </div>
                </form>
            </div>
            <div class="form-group row" style="margin-bottom:0px;">
                <label for="" class="col-sm-2 col-form-label">SIGNED PKS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="SIGNED_PKS" id=""
                        placeholder="NEGOTIATION 2 - PKS REVIEW" value="{{$email->SIGNED_PKS}}">
                </div>
            </div>
            <p>
                <a data-toggle="collapse" style="margin-left:180px;" href="#collapsePKS" role="button"
                    aria-expanded="false" aria-controls="collapsePKS">
                    Edit template
                </a>
                <i>
            </p>
            <div class="collapse" id="collapsePKS" style="margin-left:180px">
                <form action="" method="post"></form>
                <form action="UpdateTemplateEmailSIGNED_PKS" method="post">
                    <div class="card card-body">
                        <div class="w-100">
                            <textarea name="SIGNED_PKS" id="" class="form-control" cols="30"
                                rows="10">{{$emailtemplate->SIGNED_PKS}}</textarea>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary w-25 float-right mt-2" class="w-25">
                    </div>
                </form>
            </div>
            <input type="submit" class="btn btn-primary float-right" value="save">
        </form>
    </div>
</div>

@section('script')
<script>
    $.ajax({
           type: "GET",
           url: '/api/email',
           success: function(data) {
            if (data == 0) {
                $('#setting').prop('checked', false);
                console.log("mati");
            }else{
                $('#setting').prop('checked', true);
                console.log("nyala");
            }
            console.log(data);
            
           }
       });
    $( "#setting" ).change(function() {
        var status = $("#setting").prop('checked');
        if (status) {
            console.log("on");
            
            $.ajax({
                type: "GET",
                url: '/email/1',
                success: function(data) {
                console.log(data);
                }
                });
        } else {
            console.log("off");
            $.ajax({
                type: "GET",
                url: '/email/0',
                success: function(data) {
                console.log(data);
                }
                });         
        }
    });
</script>
@endsection
@endsection