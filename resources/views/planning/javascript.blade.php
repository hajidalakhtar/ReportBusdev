@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
  $( "#details" ).click(function() {
    window.localStorage.setItem('progres', "VIEW");
    setInterval(function(){ 
    window.localStorage.setItem('progres', "NOT");    
    // $("DESKSURVEY").removeClass("fade");
    // console.log("aaaaaaaaaaaaaaaaaa");
    window.localStorage.setItem('id_fase', "kosong");
    // $('#DESKSURVEY').modal('hide');
    }, 10);
    

    });
  $('input:radio[name="biaya"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'YES') {
          $("#perapihan_biaya").removeAttr("disabled");       
        }else{
          $("#perapihan_biaya").attr('disabled', 'disabled');
        }
    });

  $('input:radio[name="exclusive"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'YES') {
          $("#thn").show()  
          $("#thn_text").show()  
          
        }else{
          $("#thn").hide();
          $("#thn_text").hide();
        }
    });
    


  $('#nav-profile-tab').on('click', function (e) {
  e.preventDefault()
var donutOptions_reject = {
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                var dataset = data.datasets[tooltipItem.datasetIndex];
                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                    return previousValue + currentValue;
                });

                var currentValue = dataset.data[tooltipItem.index];
                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);

                  return data.labels[tooltipItem.index] +" - "+ percentage + "% "+ "("+currentValue+")";
                // return data.labels[tooltipItem.index] +" - "+ percentage + "%";
            }
        }
    }
}



  var donutChartCanvas_reject = $('#donutChart_reject').get(0).getContext('2d');
    var donutData_reject = {
        labels: [
            'CODE 1',
            'CODE 2',
            "CODE 3",
            "CODE 4",
            'CODE 5',
            'CODE 6',
        ],
        datasets: [{
          data: [{{$REJECT_1}},{{$REJECT_2}},{{$REJECT_3}},{{$REJECT_4}},{{$REJECT_5}},{{$REJECT_6}}], 
          backgroundColor : ['#007bff', '#6c757d', '#ffc107', '#d81b60', '#001f3f', '#ff851b'],
        }],
    }

    var donutChart_reject = new Chart(donutChartCanvas_reject, {
        type: 'doughnut',
        data: donutData_reject,
        options: donutOptions_reject
    })

console.log(donutData_reject);

$(this).tab('show');
  
})



// 
$('#nav-home-tab').on('click', function (e) {
  e.preventDefault()
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');

var donutData = {
    labels: [
        'DESK SURVEY',
        'SUBMIT PROPOSAL',
        'SITE SURVEY',
        'BOQ',
        'Pnl PROGRESS',
        'PKS REVIEW',
        'SIGN PKS',
        'ROLL-OUT',
        'READY TO SELL',
        'REJECT',
    ],
    datasets: [{
data: [{{$desk_survey}},{{$submit_proposal}},{{$site_survey}},{{$boq}},{{$pnl}},{{$pks_review}},{{$Sign_pks}},{{$roll}},{{$sell}},{{$reject}}],
backgroundColor : ['#fc038c','#03b1fc','#007bff', '#6c757d', '#ffc107', '#d81b60', '#001f3f', '#ff851b', '#01ff70','#dc3545'],
    }]
}

var donutOptions = {
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                var dataset = data.datasets[tooltipItem.datasetIndex];
                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                    return previousValue + currentValue;
                });

                var currentValue = dataset.data[tooltipItem.index];
                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);

return data.labels[tooltipItem.index] +" - "+ percentage + "% "+ "("+currentValue+")";
                // return data.labels[tooltipItem.index] +" - "+ percentage + "%";
            }
        }
    }
}
var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
})

    

$(this).tab('show');
  
})



$("#duration").on('input',function() {
var value = $(this).val();
var panjang = value.length;
    var data = $("#baso_date").val();
    var duration = $("#duration").val();
    
    var dateAr = data.split('-');
    var yearint =  parseInt(dateAr[2]) + parseInt(duration) 
    var newDate = dateAr[0] + '-' + dateAr[1] + '-' + yearint;
    $("#pks_end").val(newDate)

});
</script>

<script>
  $(document).ready(function (e) {
	$("#uploadFA").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('update.uploadFA')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
          console.log(data);
          
        }	        
	   });
	}));


    $("#UPLOAD_FIRST_WO").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('update.FirstWO')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	,     
       
	   });
	}));


  	$("#upload_draft_pnl_pdf").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('UploadDraftPnl')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	
	   });
	}));



  	$("#Edit_NEGOTIATION_1").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('update.negotiation')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	        
	   });
	}));




	$("#UPLOAD_FA_FULL_PDF").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('update.uploadFAFULL')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
          console.log(data);
          
        }	        
	   });
	}));


  




  	$("#site_survey_pdf").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('uploadBOQ_SITE_SURVEY')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	  
       
	   });
	}));





  	$("#upload_boq_pdf").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('uploadBOQ')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        console.log("data masuk");
        
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	
         
	   });
	}));



    	$("#id_PNL_PDF").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('UploadPNL')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	        
	   });
	}));


    	$("#uploadFAREJECT").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('update.uploadFAFULLREJECT')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	        
	   });
	}));



    	$("#wo_pdf").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('updateWO')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	        
	   });
	}));



    	$("#PKS_PDF").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('PKS_PDF')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
          console.log(data);
          
        }
        
	   });
	}));





    	$("#IOM_FULL_SIGNED").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('updateIOM')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	        
	   });
	}));



  $("#Term_And_Condition").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('updateTAC')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	        
	   });
	}));

    $("#upload_pnl_pdf").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "{{Route('UploadPNL')}}",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data) {
        Swal.fire({
            title: 'UPLOAD',
            text: 'Upload PDF Berhasil DI Tambahkan',
            type: 'success',
            timer: 1500
          })
        
        }	     
   
	   });
	}));




  $("#UpdateProposal").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
    console.log("ASDSADASDASDS");
    
	}));


  $("#Edit_SITE_SURVEY_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));




  $("#Edit_BOQ_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));


    $("#Edit_PNL_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));

  $("#Edit_PKS_SIGN_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));

    $("#Edit_ROLL_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));


  $("#Edit_READY_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));


  $("#id_REJECT_FORM").on('submit',(function(e) {
    let timerIntervals
    Swal.fire({
      title: 'Saving',
      html: 'Mungkin Akan Memakan Waktu lama',
      onBeforeOpen: () => {
        Swal.showLoading()
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
	}));





  
  
  
  // $("#Edit_REPORT_DESK_SURVEY_FORM").on('submit',(function(e) {
  //   e.preventDefault();
	// 	e.stopImmediatePropagation();
	// 	$.ajax({
  //       	url: "{{Route('update')}}",
	// 		type: "POST",
	// 		data:  new FormData(this),
	// 		contentType: false,
  //   	    cache: false,
	// 		processData:false,
	// 		success: function(data) {
  //       Swal.fire({
  //           title: 'Berhasil',
  //           text: 'Data berhasil di simpan',
  //           type: 'success',
  //           timer: 1500,
  //           onClose:()=>{
  //             $('#DESKSURVEY').modal('hide');
  //           }
  //         })
            
       
  //         return false
          
  //       }	     
   
	//    });
	// }));
    
  // $("#Edit_NEGOTIATION_FORM").on('submit',(function(e) {
  //   e.preventDefault();
	// 	e.stopImmediatePropagation();
	// 	$.ajax({
  //       	url: "{{Route('update.negotiation')}}",
	// 		type: "POST",
	// 		data:  new FormData(this),
	// 		contentType: false,
  //   	    cache: false,
	// 		processData:false,
	// 		success: function(data) {
  //       Swal.fire({
  //           title: 'Berhasil',
  //           text: 'Data berhasil di simpan',
  //           type: 'success',
  //           timer: 1500,
  //           onClose:()=>{
  //             $('#DESKSURVEY').modal('hide');
  //           }
  //         })
            
       
  //         return false
          
  //       }	     
   
	//    });
	// }));


});

</script>

<script>
  $('#exampleModal').on('hidden.bs.modal', function () {
  
      
    window.localStorage.setItem('alert', "NOT");


    
  })


      $('#DESKSURVEY').on('hidden.bs.modal', function () {
        $('form').trigger("reset");;
        
      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
      $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
      $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
      $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
      $("#Edit_NEGOTIATION_1").addClass("ilang")
      $("#Edit_NEGOTIATION_1").removeClass("muncul")
      $("#Edit_SITE_SURVEY").addClass("ilang")
      $("#Edit_SITE_SURVEY").removeClass("muncul")
      $("#Edit_BOQ").addClass("ilang")
      $("#Edit_BOQ").removeClass("muncul")
      $("#Edit_PNL").addClass("ilang")
      $("#Edit_PNL").removeClass("muncul")
      $("#Edit_PKS_REVIEW").addClass("ilang")
      $("#Edit_PKS_REVIEW").removeClass("muncul")
      $("#Edit_ROLL").addClass("ilang")
      $("#Edit_ROLL").removeClass("muncul")
      $("#Edit_REJECT").addClass("ilang")
      $("#Edit_REJECT").removeClass("muncul")
      $("#Edit_READY").addClass("ilang")
      $("#Edit_READY").removeClass("muncul")



      $("#Edit_PKS_SIGN").removeClass("muncul")
      $("#Edit_PKS_SIGN").addClass("ilang")


    
    $('input[type=checkbox]').prop('checked',false);
    
    window.localStorage.setItem('progres', "NOT");
    window.localStorage.setItem('id_fase', "kosong");
    document.cookie ='id_fase=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';


    
  })
</script>

<script>
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d');

var donutData = {
    labels: [
        'DESK SURVEY',
        'SUBMIT PROPOSAL',
        'SITE SURVEY',
        'BOQ',
        'Pnl PROGRESS',
        'PKS REVIEW',
        'SIGN PKS',
        'ROLL-OUT',
        'READY TO SELL',
        'REJECT',
    ],
    datasets: [{
data: [{{$desk_survey}},{{$submit_proposal}},{{$site_survey}},{{$boq}},{{$pnl}},{{$pks_review}},{{$Sign_pks}},{{$roll}},{{$sell}},{{$reject}}],
backgroundColor : ['#fc038c','#03b1fc','#007bff', '#6c757d', '#ffc107', '#d81b60', '#001f3f', '#ff851b', '#01ff70','#dc3545'],
    }]
}
var donutOptions = {
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                var dataset = data.datasets[tooltipItem.datasetIndex];
                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                    return previousValue + currentValue;
                });

                var currentValue = dataset.data[tooltipItem.index];
                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
return data.labels[tooltipItem.index] +" - "+ percentage + "% "+ "("+currentValue+")";
                // return data.labels[tooltipItem.index] +" - "+ percentage + "%";
            }
        }
    }
}
var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
})

</script>

<script>
  $('#launch_data').val(moment().format('D-MM-YYYY'));

  $(function() {
    $('[data-toggle="datepicker"]').datepicker({
      autoHide: true,
      zIndex: 2048,
      format: 'dd-mm-yyyy',
       
   
    });
      
    });
</script>

<script>

</script>

<script type="text/javascript">
  $(window).on('load',function(){
      if (window.localStorage.getItem('alert') != "NOT" ) {
        $('#exampleModal').modal('show');
      }
      
        window.localStorage.setItem('progres', ".");
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


        $("#CITY").change(function() {
                var provinsi_id = $(this).val();
                console.log(provinsi_id);
                $.ajax({
                type: "GET",
                url: '/Wilayah/'+provinsi_id,
                success: function(data){
                console.log(data);
                $('#SUBDISTRICT').html(data)
            }
           });
        })

        $("#PROVINCE_1").change(function() {
          var provinsi_id = $(this).val();
          console.log(provinsi_id);
          
          $.ajax({
          type: "GET",
          url: '/Kota/'+provinsi_id,
          success: function(data){
            console.log(data);
            $('#CITY_1').html(data)
          }
          });
        })


        $("#CITY_1").change(function() {
                var provinsi_id = $(this).val();
                console.log(provinsi_id);
                $.ajax({
                type: "GET",
                url: '/Wilayah/'+provinsi_id,
                success: function(data){
                console.log(data);
                $('#SUBDISTRICT_1').html(data)
            }
           });
        })





    });
</script>
<script>
  $("[id^='VIEW']").click(function(id){
    window.localStorage.setItem('progres', "VIEW");
    $('#VIEW_MODAL').modal('show');
    console.log($(this).data("value"));
     $.ajax({
          type: "GET",
          url: '/apireport/'+$(this).data("value"),
          success: function(data){
          console.log(data);
            $('#text_BUILDING_name').text("- "+data.BUILDING_NAME);
            $('#text_pic_mnc').text("- "+data.PIC_MNC);
            // $('#text_PROVINCE').text("- "+data.PROVINCE);
            $('#text_ADDRESS').text("- "+data.ADDRESS);
            $('#text_PROGRESS_STATUS').text("- "+data.PROGRESS_STATUS);
            $('#text_COLOR_MAP').text("- "+data.COLOR_MAP_ONLINE);
            // $('#text_CITY').text("- "+data.CITY);
            // $('#text_SUBDISTRICT').text("- "+data.SUBDISTRICT);
            $('#tSITEext_COORDINATE').text("- "+data.COORDINATE);
            $('#text_DEVELOPERORCOMPANY_NAME').text("- "+data.DEVELOPERORCOMPANY_NAME);
            $('#text_NAME').text("- "+data.NAME);
            $('#text_PHONEORMOBILE').text("- "+data.PHONEORMOBILE);
            $('#text_EMAIL').text("- "+data.EMAIL);
            $('#text_ISP_EXISTING').text("- "+data.ISP_EXISTING);
            $('#text_PROPERTY_TYPE').text("- "+data.PROPERTY_TYPE);
            $('#text_TOTAL_TOWER').text("- "+data.TOTAL_TOWER);
            $('#text_EXCLUSIVE').text("- "+data.EXCLUSIVE);
            $('#text_REVENUE_SHARE').text("- "+data.REVENUE_SHARE);
            $('#text_TOTAL_OCCUPANCY').text("- "+data.TOTAL_OCCUPANCY);
            $('#text_RENTAL_BASE').text("- "+data.RENTAL_BASE);
            $('#text_ONE_TIME_FEE').text("- "+data.ONE_TIME_FEE);
            $('#text_FREE_SERVICES').text("- "+data.FREE_SERVICES);
            $('#text_FREE_WIFI').text("- "+data.FREE_WIFI);
            $('#text_RESIDENTIAL').text("- "+data.RESIDENTIAL);
            $('#text_SOHO').text("- "+data.SOHO);
            $('#text_DEDICATED_INTERNET').text("- "+data.DEDICATED_INTERNET);
            $('#text_DATA_COMMUNICATION').text("- "+data.DATA_COMMUNICATION);
            $('#text_SUBMIT_PROPOSAL_DATE').text("- "+data.SUBMIT_PROPOSAL_DATE);
            $('#text_SITE_SURVEY').text("- "+data.SITE_SURVEY);

            $('#text_BUSDEV_SIGNED').text("- "+data.BUSDEV_SIGNED);              


                $.ajax({
                           type: "GET",
                            url:'/cek/provinsi/'+data.PROVINCE,
                            success: function(data_1) {
                             $('#text_PROVINCE').text(data_1.name);    
                             console.log(data_1.name);
                            }
                         })

                      $.ajax({
                           type: "GET",
                            url:'/cek/CekKota/'+data.CITY,
                            success: function(data_1) {
                             $('#text_CITY').text(data_1.name);    
                             console.log(data_1.name);
                            }
                         })

                        $.ajax({
                           type: "GET",
                            url:'/cek/CekWilayah/'+data.SUBDISTRICT,
                            success: function(data_1) {
                            $('#text_SUBDISTRICT').text(data_1.name);
                             console.log(data_1.name);
                            }
                         })

            $('#text_BM_SIGNED').text("- "+data.BM_SIGNED);
            $('#text_SALES_SIGNED').text("- "+data.SALES_SIGNED);
            $('#text_GM_SALES_SIGNED').text("- "+data.GM_SALES_SIGNED);
            $('#text_RECOMMENDATION').text("- "+data.RECOMMENDATION);
            $('#text_BOQ_RECEIVED_DATE').text("- "+data.BOQ_RECEIVED_DATE);
            $('#text_DESIGN_RECEIVED_DATE').text("- "+data.DESIGN_RECEIVED_DATE);
            $('#text_SURVEY_RESULT_REPORT_DATE').text("- "+data.SURVEY_RESULT_REPORT_DATE);
            $('#text_SUBMIT_DRAFT_PKS_DATE').text("- "+data.SUBMIT_DRAFT_PKS_DATE);
            $('#text_PNL_DRAFT_RECEIVE_DATE').text("- "+data.PNL_DRAFT_RECEIVE_DATE);
            $('#text_PNL_FULL_SIGN_DATE').text("- "+data.PNL_FULL_SIGN_DATE);
            $('#text_IOM_FULL_SIGN_DATE').text("- "+data.IOM_FULL_SIGN_DATE);
            $('#text_CONTRACT_DURATION').text("- "+data.CONTRACT_DURATION);
            $('#text_PKS_DATE').text("- "+data.PKS_DATE);
            $('#text_DEAL_YEAR').text("- "+data.DEAL_YEAR);
            $('#text_PKS_START').text("- "+data.PKS_START);
            $('#text_PKS_DATE').text("- "+data.PKS_DATE);
            $('#text_PKS_END').text("- "+data.PKS_END);
            $('#text_NO_PKS').text("- "+data.NO_PKS);
            $('#text_REJECT_CODE').text("- "+data.REJECT_CODE);
            $('#text_COORDINATE').text("- "+data.COORDINATE);
            $('#text_TOTAL_FLOORORTOWER').text("- "+data.TOTAL_FLOORORTOWER);
            


            $('#text_BASOORBAST_No').text("- "+data.BASOORBAST_No);
            $('#text_UPDATE_PROGRESS').val("- "+data.UPDATE_PROGRESS);
            $('#FA_DETAILS').attr("href",'Form_FA/'+data.NO_FA);
            $('#SITE_SURVEY_DETAILS').attr("href",'SITE_SURVEY/'+data.SITE_SURVEY_PDF);
            $('#BOQ_DETAILS').attr("href",'BOQ/'+data.BOQ_PDF);
            $('#PNL_DETAILS').attr("href",'PNL/'+data.PNL_PDF);
            $('#IOM_DETAILS').attr("href",'IOM_FULL_SIGNED/'+data.IOM_FULL_SIGNED_PDF);
            $('#TERM_DETAILS').attr("href",'Term_And_Condition/'+data.Term_And_Condition_pdf);
            $('#WO_DETAILS').attr("href",'WO/'+data.WO_PDF);
            $('#PKS_DETAILS').attr("href",'PKS/'+data.PKS_PDF);
            $('#download_pdf').attr("href",'details_pdf/'+data.id);
            


            
            
            
      
            
            
          }
          });
          
    
    })
  $('#VIEW_MODAL').on('hidden.bs.modal', function(){
  window.localStorage.setItem('progres', "DESK SURVEY");
  });
  
        

  $("#status_bagunan").show();
  $("#harga_sewa_text").hide();
  $("#harga_sewa").hide();
  $("#UDER_DEVELOPER_BOX").hide();
  $("#NOT_DEVELOPER_BOX").hide();
  $("#Clustering_BOX").hide();
  $("#Open_Area_BOX").hide();
  $("#STRATA_TITLE_BOX").hide();
  $("#SERVICE_APARTMENT_new").hide();
  
  


        function fase(sel) {
          console.log("data = "+sel.NEXT_PROGRESS);
            $("#DESKSURVEY_TITLE").text(sel.value);
            if (sel.value == "DESK SURVEY") {
                var id = $("#id").val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(response) {
                        console.log(response);
                    }
                });

                $("#Edit_REPORT_DESK_SURVEY").addClass("muncul")
                $("#Edit_REPORT_DESK_SURVEY").removeClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
             

            }else if (sel.value == "SUBMIT PROPOSAL") {
              $("#error_kewarganegaraan").hide();
                $("#error_pekerjaan").hide();
                $("#error_status_penghuni").hide();
             
                var id = window.localStorage.getItem("id_fase");
              $.ajax({
              type: "GET",
              url: '/apireport/' + id,
              success: function(data) {
              var next = data.NEXT_PROGRESS;
            
              console.log(next);
              
                if (next != "2" ) {
                  Swal.fire(
                  'Tidak Bisa lanjut',
                  'Anda belom save progress',
                  'error'
                  )
                $('#PROGRESS_STATUS').val('DESK SURVEY');
                  
                } else {
                  
                var id = window.localStorage.getItem("id_fase");                
                $('#id_proposal').val(id);
                $('#id_proposal_pdf').val(id);
                var id = $("#id_proposal").val();


                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                        console.log(data);
                        $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                        
                        $('#DEVELOPERORCOMPANY_NAME').val(data.DEVELOPERORCOMPANY_NAME);
                        $('#NAME').val(data.NAME);
                        $('#PHONEORMOBILE').val(data.PHONEORMOBILE);
                        if (data.BUSDEV_SIGNED == "01-01-1970" ||data.BUSDEV_SIGNED == null) {
                        $('#BUSDEV_SIGNED').val(moment().format('D-MM-YYYY'));
                        }else{
                        $('#BUSDEV_SIGNED').val(data.BUSDEV_SIGNED);
                        
                        }
              

                        if (data.SUBMIT_PROPOSAL_DATE == "01-01-1970" ||data.SUBMIT_PROPOSAL_DATE == null) {
                          $('#SUBMIT_PROPOSAL_DATE').val(moment().format('D-MM-YYYY'));
                          }else{
                          $('#SUBMIT_PROPOSAL_DATE').val(data.SUBMIT_PROPOSAL_DATE);
                          
                          }
                          if (data.BM_SIGNED == "01-01-1970" ||data.BM_SIGNED == null) {
                            $('#BM_SIGNED').val(moment().format('D-MM-YYYY'));
                            }else{
                           $('#BM_SIGNED').val(data.BM_SIGNED);                            
                            }
                        $('#EMAIL').val(data.EMAIL);
                        $('#TOTAL_UNIT').val(data.TOTAL_UNIT);
                        $('#MOBILEPHONE').val(data.MOBILEPHONE);
                        $('#TOTAL_OCCUPANCY').val(data.TOTAL_OCCUPANCY);
                        $('#ISP_EXISTING').val(data.ISP_EXISTING);
                        $('#TOTAL_FLOORORTOWER').val(data.TOTAL_FLOORORTOWER);

                        
                        if (data.EXCLUSIVE == " NO " || data.EXCLUSIVE == "on") {
                          $('#exclusive_1').prop('checked', false);
                          $('#exclusive_2').prop('checked', true);
                          console.log("no");
                          }else{
                          $('#exclusive_1').prop('checked', true);
                          $('#exclusive_2').prop('checked', false);
                          console.log("yes");
                          }
                          $('.jumlah_area_komersial_dihuni').keyup(function() {
                                              var jumlah_area_komersial_dihuni_1 = Number($('input[name="jumlah_area_komersial_dihuni_1"]').val());
                                              var jumlah_area_komersial_dihuni_2 = Number($('input[name="jumlah_area_komersial_dihuni_2"]').val());
                                              var jumlah_area_komersial_dihuni_3 = Number($('input[name="jumlah_area_komersial_dihuni_3"]').val());
                                              var jumlah_area_komersial_dihuni_4 = Number($('input[name="jumlah_area_komersial_dihuni_4"]').val());
                                              var jumlah_area_komersial_dihuni_5 = Number($('input[name="jumlah_area_komersial_dihuni_5"]').val());
                                              var jumlah_area_komersial_dihuni_6 = Number($('input[name="jumlah_area_komersial_dihuni_6"]').val());
                                              var jumlah_area_komersial_dihuni_7 = Number($('input[name="jumlah_area_komersial_dihuni_7"]').val());
                                              var jumlah_area_komersial_dihuni_8 = Number($('input[name="jumlah_area_komersial_dihuni_8"]').val());
                                              var jumlah_area_komersial_dihuni_9 = Number($('input[name="jumlah_area_komersial_dihuni_9"]').val());
                                              var jumlah_area_komersial_dihuni_10 = Number($('input[name="jumlah_area_komersial_dihuni_10"]').val());
                                              $('input[name="jumlah_area_komersial_dihuni_total"]').val(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                                              +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                                              console.log(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                                              +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                                              });
                                              
                                              
                                              
                                              $('.jumlah_lantai').keyup(function() {
                                              var jumlah_lantai_1 = Number($('input[name="jumlah_lantai_1"]').val());
                                              var jumlah_lantai_2 = Number($('input[name="jumlah_lantai_2"]').val());
                                              var jumlah_lantai_3 = Number($('input[name="jumlah_lantai_3"]').val());
                                              var jumlah_lantai_4 = Number($('input[name="jumlah_lantai_4"]').val());
                                              var jumlah_lantai_5 = Number($('input[name="jumlah_lantai_5"]').val());
                                              var jumlah_lantai_6 = Number($('input[name="jumlah_lantai_6"]').val());
                                              var jumlah_lantai_7 = Number($('input[name="jumlah_lantai_7"]').val());
                                              var jumlah_lantai_8 = Number($('input[name="jumlah_lantai_8"]').val());
                                              var jumlah_lantai_9 = Number($('input[name="jumlah_lantai_9"]').val());
                                              var jumlah_lantai_10 = Number($('input[name="jumlah_lantai_10"]').val());
                                              $('input[name="jumlah_lantai_total"]').val(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8
                                              +jumlah_lantai_9+jumlah_lantai_10);
                                              console.log(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8
                                              +jumlah_lantai_9+jumlah_lantai_10);
                                              });
                                              
                                              
                                              
                                              $('.jumlah_lantai').keyup(function() {
                                              var jumlah_lantai_1 = Number($('input[name="jumlah_lantai_1"]').val());
                                              var jumlah_lantai_2 = Number($('input[name="jumlah_lantai_2"]').val());
                                              var jumlah_lantai_3 = Number($('input[name="jumlah_lantai_3"]').val());
                                              var jumlah_lantai_4 = Number($('input[name="jumlah_lantai_4"]').val());
                                              var jumlah_lantai_5 = Number($('input[name="jumlah_lantai_5"]').val());
                                              var jumlah_lantai_6 = Number($('input[name="jumlah_lantai_6"]').val());
                                              var jumlah_lantai_7 = Number($('input[name="jumlah_lantai_7"]').val());
                                              var jumlah_lantai_8 = Number($('input[name="jumlah_lantai_8"]').val());
                                              var jumlah_lantai_9 = Number($('input[name="jumlah_lantai_9"]').val());
                                              var jumlah_lantai_10 = Number($('input[name="jumlah_lantai_10"]').val());
                                              $('input[name="jumlah_lantai_total"]').val(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8
                                              +jumlah_lantai_9+jumlah_lantai_10);
                                              console.log(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8
                                              +jumlah_lantai_9+jumlah_lantai_10);
                                              });
                                              
                                              
                                              $('.jumlah_unit').keyup(function() {
                                              var jumlah_unit_1 = Number($('input[name="jumlah_unit_1"]').val());
                                              var jumlah_unit_2 = Number($('input[name="jumlah_unit_2"]').val());
                                              var jumlah_unit_3 = Number($('input[name="jumlah_unit_3"]').val());
                                              var jumlah_unit_4 = Number($('input[name="jumlah_unit_4"]').val());
                                              var jumlah_unit_5 = Number($('input[name="jumlah_unit_5"]').val());
                                              var jumlah_unit_6 = Number($('input[name="jumlah_unit_6"]').val());
                                              var jumlah_unit_7 = Number($('input[name="jumlah_unit_7"]').val());
                                              var jumlah_unit_8 = Number($('input[name="jumlah_unit_8"]').val());
                                              var jumlah_unit_9 = Number($('input[name="jumlah_unit_9"]').val());
                                              var jumlah_unit_10 = Number($('input[name="jumlah_unit_10"]').val());
                                              $('input[name="jumlah_unit_total"]').val(jumlah_unit_1+jumlah_unit_2+jumlah_unit_3+jumlah_unit_4+jumlah_unit_5+jumlah_unit_6+jumlah_unit_7+jumlah_unit_8
                                              +jumlah_unit_9+jumlah_unit_10);
                                              console.log(jumlah_unit_1+jumlah_unit_2+jumlah_unit_3+jumlah_unit_4+jumlah_unit_5+jumlah_unit_6+jumlah_unit_7+jumlah_unit_8
                                              +jumlah_unit_9+jumlah_unit_10);
                                              });
                                              
                                              
                                              $('.jumlah_yang_dihuni').keyup(function() {
                                              var jumlah_yang_dihuni_1 = Number($('input[name="jumlah_yang_dihuni_1"]').val());
                                              var jumlah_yang_dihuni_2 = Number($('input[name="jumlah_yang_dihuni_2"]').val());
                                              var jumlah_yang_dihuni_3 = Number($('input[name="jumlah_yang_dihuni_3"]').val());
                                              var jumlah_yang_dihuni_4 = Number($('input[name="jumlah_yang_dihuni_4"]').val());
                                              var jumlah_yang_dihuni_5 = Number($('input[name="jumlah_yang_dihuni_5"]').val());
                                              var jumlah_yang_dihuni_6 = Number($('input[name="jumlah_yang_dihuni_6"]').val());
                                              var jumlah_yang_dihuni_7 = Number($('input[name="jumlah_yang_dihuni_7"]').val());
                                              var jumlah_yang_dihuni_8 = Number($('input[name="jumlah_yang_dihuni_8"]').val());
                                              var jumlah_yang_dihuni_9 = Number($('input[name="jumlah_yang_dihuni_9"]').val());
                                              var jumlah_yang_dihuni_10 = Number($('input[name="jumlah_yang_dihuni_10"]').val());
                                              $('input[name="jumlah_yang_dihuni_total"]').val(jumlah_yang_dihuni_1+jumlah_yang_dihuni_2+jumlah_yang_dihuni_3+jumlah_yang_dihuni_4+jumlah_yang_dihuni_5+jumlah_yang_dihuni_6+jumlah_yang_dihuni_7+jumlah_yang_dihuni_8
                                              +jumlah_yang_dihuni_9+jumlah_yang_dihuni_10);
                                              console.log(jumlah_yang_dihuni_1+jumlah_yang_dihuni_2+jumlah_yang_dihuni_3+jumlah_yang_dihuni_4+jumlah_yang_dihuni_5+jumlah_yang_dihuni_6+jumlah_yang_dihuni_7+jumlah_yang_dihuni_8
                                              +jumlah_yang_dihuni_9+jumlah_yang_dihuni_10);
                                              });
                                              
                                              
                                              $('.tingkat_okupansi').keyup(function() {

                                              var tingkat_okupansi_1 = Number($('input[name="tingkat_okupansi_1"]').val());
                                              var tingkat_okupansi_2 = Number($('input[name="tingkat_okupansi_2"]').val());
                                              var tingkat_okupansi_3 = Number($('input[name="tingkat_okupansi_3"]').val());
                                              var tingkat_okupansi_4 = Number($('input[name="tingkat_okupansi_4"]').val());
                                              var tingkat_okupansi_5 = Number($('input[name="tingkat_okupansi_5"]').val());
                                              var tingkat_okupansi_6 = Number($('input[name="tingkat_okupansi_6"]').val());
                                              var tingkat_okupansi_7 = Number($('input[name="tingkat_okupansi_7"]').val());
                                              var tingkat_okupansi_8 = Number($('input[name="tingkat_okupansi_8"]').val());
                                              var tingkat_okupansi_9 = Number($('input[name="tingkat_okupansi_9"]').val());
                                              var tingkat_okupansi_10 = Number($('input[name="tingkat_okupansi_10"]').val());
                                              $('input[name="tingkat_okupansi_total"]').val(tingkat_okupansi_1+tingkat_okupansi_2+tingkat_okupansi_3+tingkat_okupansi_4+tingkat_okupansi_5+tingkat_okupansi_6+tingkat_okupansi_7+tingkat_okupansi_8
                                              +tingkat_okupansi_9+tingkat_okupansi_10);
                                              console.log(tingkat_okupansi_1+tingkat_okupansi_2+tingkat_okupansi_3+tingkat_okupansi_4+tingkat_okupansi_5+tingkat_okupansi_6+tingkat_okupansi_7+tingkat_okupansi_8
                                              +tingkat_okupansi_9+tingkat_okupansi_10);
                                              });
                                              
                                              
                                              $('.jumlah_unit_area_kemerial').keyup(function() {
                                              var jumlah_unit_area_kemerial_1 = Number($('input[name="jumlah_unit_area_kemerial_1"]').val());
                                              var jumlah_unit_area_kemerial_2 = Number($('input[name="jumlah_unit_area_kemerial_2"]').val());
                                              var jumlah_unit_area_kemerial_3 = Number($('input[name="jumlah_unit_area_kemerial_3"]').val());
                                              var jumlah_unit_area_kemerial_4 = Number($('input[name="jumlah_unit_area_kemerial_4"]').val());
                                              var jumlah_unit_area_kemerial_5 = Number($('input[name="jumlah_unit_area_kemerial_5"]').val());
                                              var jumlah_unit_area_kemerial_6 = Number($('input[name="jumlah_unit_area_kemerial_6"]').val());
                                              var jumlah_unit_area_kemerial_7 = Number($('input[name="jumlah_unit_area_kemerial_7"]').val());
                                              var jumlah_unit_area_kemerial_8 = Number($('input[name="jumlah_unit_area_kemerial_8"]').val());
                                              var jumlah_unit_area_kemerial_9 = Number($('input[name="jumlah_unit_area_kemerial_9"]').val());
                                              var jumlah_unit_area_kemerial_10 = Number($('input[name="jumlah_unit_area_kemerial_10"]').val());
                                              $('input[name="jumlah_unit_area_kemerial_total"]').val(jumlah_unit_area_kemerial_1+jumlah_unit_area_kemerial_2+jumlah_unit_area_kemerial_3+jumlah_unit_area_kemerial_4+jumlah_unit_area_kemerial_5+jumlah_unit_area_kemerial_6+jumlah_unit_area_kemerial_7+jumlah_unit_area_kemerial_8
                                              +jumlah_unit_area_kemerial_9+jumlah_unit_area_kemerial_10);
                                              console.log(jumlah_unit_area_kemerial_1+jumlah_unit_area_kemerial_2+jumlah_unit_area_kemerial_3+jumlah_unit_area_kemerial_4+jumlah_unit_area_kemerial_5+jumlah_unit_area_kemerial_6+jumlah_unit_area_kemerial_7+jumlah_unit_area_kemerial_8
                                              +jumlah_unit_area_kemerial_9+jumlah_unit_area_kemerial_10);
                                              });
                                              
                                              
                                              $('.jumlah_area_komersial_dihuni').keyup(function() {
                                              var jumlah_area_komersial_dihuni_1 = Number($('input[name="jumlah_area_komersial_dihuni_1"]').val());
                                              var jumlah_area_komersial_dihuni_2 = Number($('input[name="jumlah_area_komersial_dihuni_2"]').val());
                                              var jumlah_area_komersial_dihuni_3 = Number($('input[name="jumlah_area_komersial_dihuni_3"]').val());
                                              var jumlah_area_komersial_dihuni_4 = Number($('input[name="jumlah_area_komersial_dihuni_4"]').val());
                                              var jumlah_area_komersial_dihuni_5 = Number($('input[name="jumlah_area_komersial_dihuni_5"]').val());
                                              var jumlah_area_komersial_dihuni_6 = Number($('input[name="jumlah_area_komersial_dihuni_6"]').val());
                                              var jumlah_area_komersial_dihuni_7 = Number($('input[name="jumlah_area_komersial_dihuni_7"]').val());
                                              var jumlah_area_komersial_dihuni_8 = Number($('input[name="jumlah_area_komersial_dihuni_8"]').val());
                                              var jumlah_area_komersial_dihuni_9 = Number($('input[name="jumlah_area_komersial_dihuni_9"]').val());
                                              var jumlah_area_komersial_dihuni_10 = Number($('input[name="jumlah_area_komersial_dihuni_10"]').val());
                                              $('input[name="jumlah_area_komersial_dihuni_total"]').val(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                                              +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                                              console.log(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                                              +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                                              });
                                              
                                              $('.jumlah_area_komersial_dihuni').keyup(function() {
                                              var jumlah_area_komersial_dihuni_1 = Number($('input[name="jumlah_area_komersial_dihuni_1"]').val());
                                              var jumlah_area_komersial_dihuni_2 = Number($('input[name="jumlah_area_komersial_dihuni_2"]').val());
                                              var jumlah_area_komersial_dihuni_3 = Number($('input[name="jumlah_area_komersial_dihuni_3"]').val());
                                              var jumlah_area_komersial_dihuni_4 = Number($('input[name="jumlah_area_komersial_dihuni_4"]').val());
                                              var jumlah_area_komersial_dihuni_5 = Number($('input[name="jumlah_area_komersial_dihuni_5"]').val());
                                              var jumlah_area_komersial_dihuni_6 = Number($('input[name="jumlah_area_komersial_dihuni_6"]').val());
                                              var jumlah_area_komersial_dihuni_7 = Number($('input[name="jumlah_area_komersial_dihuni_7"]').val());
                                              var jumlah_area_komersial_dihuni_8 = Number($('input[name="jumlah_area_komersial_dihuni_8"]').val());
                                              var jumlah_area_komersial_dihuni_9 = Number($('input[name="jumlah_area_komersial_dihuni_9"]').val());
                                              var jumlah_area_komersial_dihuni_10 = Number($('input[name="jumlah_area_komersial_dihuni_10"]').val());
                                              $('input[name="jumlah_area_komersial_dihuni_total"]').val(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                                              +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                                              console.log(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                                              +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                                              });
                                              
                                              
                                              $('.jumlah_tingkat_okupansi').keyup(function() {
                                              var jumlah_tingkat_okupansi_1 = Number($('input[name="jumlah_tingkat_okupansi_1"]').val());
                                              var jumlah_tingkat_okupansi_2 = Number($('input[name="jumlah_tingkat_okupansi_2"]').val());
                                              var jumlah_tingkat_okupansi_3 = Number($('input[name="jumlah_tingkat_okupansi_3"]').val());
                                              var jumlah_tingkat_okupansi_4 = Number($('input[name="jumlah_tingkat_okupansi_4"]').val());
                                              var jumlah_tingkat_okupansi_5 = Number($('input[name="jumlah_tingkat_okupansi_5"]').val());
                                              var jumlah_tingkat_okupansi_6 = Number($('input[name="jumlah_tingkat_okupansi_6"]').val());
                                              var jumlah_tingkat_okupansi_7 = Number($('input[name="jumlah_tingkat_okupansi_7"]').val());
                                              var jumlah_tingkat_okupansi_8 = Number($('input[name="jumlah_tingkat_okupansi_8"]').val());
                                              var jumlah_tingkat_okupansi_9 = Number($('input[name="jumlah_tingkat_okupansi_9"]').val());
                                              var jumlah_tingkat_okupansi_10 = Number($('input[name="jumlah_tingkat_okupansi_10"]').val());
                                              $('input[name="jumlah_tingkat_okupansi_total"]').val(jumlah_tingkat_okupansi_1+jumlah_tingkat_okupansi_2+jumlah_tingkat_okupansi_3+jumlah_tingkat_okupansi_4+jumlah_tingkat_okupansi_5+jumlah_tingkat_okupansi_6+jumlah_tingkat_okupansi_7+jumlah_tingkat_okupansi_8
                                              +jumlah_tingkat_okupansi_9+jumlah_tingkat_okupansi_10);
                                              console.log(jumlah_tingkat_okupansi_1+jumlah_tingkat_okupansi_2+jumlah_tingkat_okupansi_3+jumlah_tingkat_okupansi_4+jumlah_tingkat_okupansi_5+jumlah_tingkat_okupansi_6+jumlah_tingkat_okupansi_7+jumlah_tingkat_okupansi_8
                                              +jumlah_tingkat_okupansi_9+jumlah_tingkat_okupansi_10);
                                              });
                                              
                                              $('.jumlah_kendaraan_terdaftar').keyup(function() {
                                              var jumlah_kendaraan_terdaftar_1 = Number($('input[name="jumlah_kendaraan_terdaftar_1"]').val());
                                              var jumlah_kendaraan_terdaftar_2 = Number($('input[name="jumlah_kendaraan_terdaftar_2"]').val());
                                              var jumlah_kendaraan_terdaftar_3 = Number($('input[name="jumlah_kendaraan_terdaftar_3"]').val());
                                              var jumlah_kendaraan_terdaftar_4 = Number($('input[name="jumlah_kendaraan_terdaftar_4"]').val());
                                              var jumlah_kendaraan_terdaftar_5 = Number($('input[name="jumlah_kendaraan_terdaftar_5"]').val());
                                              var jumlah_kendaraan_terdaftar_6 = Number($('input[name="jumlah_kendaraan_terdaftar_6"]').val());
                                              var jumlah_kendaraan_terdaftar_7 = Number($('input[name="jumlah_kendaraan_terdaftar_7"]').val());
                                              var jumlah_kendaraan_terdaftar_8 = Number($('input[name="jumlah_kendaraan_terdaftar_8"]').val());
                                              var jumlah_kendaraan_terdaftar_9 = Number($('input[name="jumlah_kendaraan_terdaftar_9"]').val());
                                              var jumlah_kendaraan_terdaftar_10 = Number($('input[name="jumlah_kendaraan_terdaftar_10"]').val());
                                              $('input[name="jumlah_kendaraan_terdaftar_total"]').val(jumlah_kendaraan_terdaftar_1+jumlah_kendaraan_terdaftar_2+jumlah_kendaraan_terdaftar_3+jumlah_kendaraan_terdaftar_4+jumlah_kendaraan_terdaftar_5+jumlah_kendaraan_terdaftar_6+jumlah_kendaraan_terdaftar_7+jumlah_kendaraan_terdaftar_8
                                              +jumlah_kendaraan_terdaftar_9+jumlah_kendaraan_terdaftar_10);
                                              console.log(jumlah_kendaraan_terdaftar_1+jumlah_kendaraan_terdaftar_2+jumlah_kendaraan_terdaftar_3+jumlah_kendaraan_terdaftar_4+jumlah_kendaraan_terdaftar_5+jumlah_kendaraan_terdaftar_6+jumlah_kendaraan_terdaftar_7+jumlah_kendaraan_terdaftar_8
                                              +jumlah_kendaraan_terdaftar_9+jumlah_kendaraan_terdaftar_10);
                                              });
                                              
                                              
                                              $('#jumlah_yang_dihuni_1').keyup(function() {
                                                
                                              var jumlah_unit_1 = Number($('#jumlah_unit_1').val());
                                              var jumlah_yang_dihuni_1 = Number($('#jumlah_yang_dihuni_1').val());
                                              var hasil = jumlah_yang_dihuni_1/jumlah_unit_1
                                              
                                              $('input[name="tingkat_okupansi_1"]').val( hasil * 100 + "%");
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_2').keyup(function() {
                                                
                                              var jumlah_unit_2 = Number($('#jumlah_unit_2').val());
                                              var jumlah_yang_dihuni_2 = Number($('#jumlah_yang_dihuni_2').val());
                                              var hasil = jumlah_yang_dihuni_2/jumlah_unit_2
                                              
                                              $('input[name="tingkat_okupansi_2"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_3').keyup(function() {
                                                
                                              var jumlah_unit_3 = Number($('#jumlah_unit_3').val());
                                              var jumlah_yang_dihuni_3 = Number($('#jumlah_yang_dihuni_3').val());
                                              var hasil = jumlah_yang_dihuni_3/jumlah_unit_3
                                              
                                              $('input[name="tingkat_okupansi_3"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_4').keyup(function() {
                                                
                                              var jumlah_unit_4 = Number($('#jumlah_unit_4').val());
                                              var jumlah_yang_dihuni_4 = Number($('#jumlah_yang_dihuni_4').val());
                                              var hasil = jumlah_yang_dihuni_4/jumlah_unit_4
                                              
                                              $('input[name="tingkat_okupansi_4"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_5').keyup(function() {
                                                
                                              var jumlah_unit_5 = Number($('#jumlah_unit_5').val());
                                              var jumlah_yang_dihuni_5 = Number($('#jumlah_yang_dihuni_5').val());
                                              var hasil = jumlah_yang_dihuni_5/jumlah_unit_5
                                              
                                              $('input[name="tingkat_okupansi_5"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_6').keyup(function() {
                                                
                                              var jumlah_unit_6 = Number($('#jumlah_unit_6').val());
                                              var jumlah_yang_dihuni_6 = Number($('#jumlah_yang_dihuni_6').val());
                                              var hasil = jumlah_yang_dihuni_6/jumlah_unit_6
                                              
                                              $('input[name="tingkat_okupansi_6"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_7').keyup(function() {
                                                
                                              var jumlah_unit_7 = Number($('#jumlah_unit_7').val());
                                              var jumlah_yang_dihuni_7 = Number($('#jumlah_yang_dihuni_7').val());
                                              var hasil = jumlah_yang_dihuni_7/jumlah_unit_7
                                              
                                              $('input[name="tingkat_okupansi_7"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_8').keyup(function() {
                                                
                                              var jumlah_unit_8 = Number($('#jumlah_unit_8').val());
                                              var jumlah_yang_dihuni_8 = Number($('#jumlah_yang_dihuni_8').val());
                                              var hasil = jumlah_yang_dihuni_8/jumlah_unit_8
                                              
                                              $('input[name="tingkat_okupansi_8"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_9').keyup(function() {
                                                
                                              var jumlah_unit_2 = Number($('#jumlah_unit_2').val());
                                              var jumlah_yang_dihuni_9 = Number($('#jumlah_yang_dihuni_9').val());
                                              var hasil = jumlah_yang_dihuni_9/jumlah_unit_2
                                              
                                              $('input[name="tingkat_okupansi_9"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_yang_dihuni_10').keyup(function() {
                                                
                                              var jumlah_unit_10 = Number($('#jumlah_unit_10').val());
                                              var jumlah_yang_dihuni_10 = Number($('#jumlah_yang_dihuni_10').val());
                                              var hasil = jumlah_yang_dihuni_10/jumlah_unit_10
                                              
                                              $('input[name="tingkat_okupansi_10"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              
                                              
                                              
                                              $('#jumlah_area_komersial_dihuni_1').keyup(function() {
                                              var jumlah_unit_area_kemerial_1 = Number($('#jumlah_unit_area_kemerial_1').val());
                                              var jumlah_area_komersial_dihuni_1 = Number($('#jumlah_area_komersial_dihuni_1').val());
                                              var hasil = jumlah_area_komersial_dihuni_1/jumlah_unit_area_kemerial_1
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_1"]').val( hasil * 100 + "%");
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_2').keyup(function() {
                                              var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                                              var jumlah_area_komersial_dihuni_2 = Number($('#jumlah_area_komersial_dihuni_2').val());
                                              var hasil = jumlah_area_komersial_dihuni_2/jumlah_unit_area_kemerial_2
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_2"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_3').keyup(function() {
                                              var jumlah_unit_area_kemerial_3 = Number($('#jumlah_unit_area_kemerial_3').val());
                                              var jumlah_area_komersial_dihuni_3 = Number($('#jumlah_area_komersial_dihuni_3').val());
                                              var hasil = jumlah_area_komersial_dihuni_3/jumlah_unit_area_kemerial_3
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_3"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_4').keyup(function() {
                                              var jumlah_unit_area_kemerial_4 = Number($('#jumlah_unit_area_kemerial_4').val());
                                              var jumlah_area_komersial_dihuni_4 = Number($('#jumlah_area_komersial_dihuni_4').val());
                                              var hasil = jumlah_area_komersial_dihuni_4/jumlah_unit_area_kemerial_4
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_4"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_5').keyup(function() {
                                              var jumlah_unit_area_kemerial_5 = Number($('#jumlah_unit_area_kemerial_5').val());
                                              var jumlah_area_komersial_dihuni_5 = Number($('#jumlah_area_komersial_dihuni_5').val());
                                              var hasil = jumlah_area_komersial_dihuni_5/jumlah_unit_area_kemerial_5
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_5"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_6').keyup(function() {
                                              var jumlah_unit_area_kemerial_6 = Number($('#jumlah_unit_area_kemerial_6').val());
                                              var jumlah_area_komersial_dihuni_6 = Number($('#jumlah_area_komersial_dihuni_6').val());
                                              var hasil = jumlah_area_komersial_dihuni_6/jumlah_unit_area_kemerial_6
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_6"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_7').keyup(function() {
                                              var jumlah_unit_area_kemerial_7 = Number($('#jumlah_unit_area_kemerial_7').val());
                                              var jumlah_area_komersial_dihuni_7 = Number($('#jumlah_area_komersial_dihuni_7').val());
                                              var hasil = jumlah_area_komersial_dihuni_7/jumlah_unit_area_kemerial_7
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_7"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_8').keyup(function() {
                                              var jumlah_unit_area_kemerial_8 = Number($('#jumlah_unit_area_kemerial_8').val());
                                              var jumlah_area_komersial_dihuni_8 = Number($('#jumlah_area_komersial_dihuni_8').val());
                                              var hasil = jumlah_area_komersial_dihuni_8/jumlah_unit_area_kemerial_8
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_8"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_9').keyup(function() {
                                              var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                                              var jumlah_area_komersial_dihuni_9 = Number($('#jumlah_area_komersial_dihuni_9').val());
                                              var hasil = jumlah_area_komersial_dihuni_9/jumlah_unit_area_kemerial_9
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_9"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_area_komersial_dihuni_10').keyup(function() {
                                              var jumlah_unit_area_kemerial_10 = Number($('#jumlah_unit_area_kemerial_10').val());
                                              var jumlah_area_komersial_dihuni_10 = Number($('#jumlah_area_komersial_dihuni_10').val());
                                              var hasil = jumlah_area_komersial_dihuni_10/jumlah_unit_area_kemerial_10
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_10"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              
                                              
                                              
                                              
                                              $('#jumlah_unit_area_kemerial_1').keyup(function() {
                                              var jumlah_unit_area_kemerial_1 = Number($('#jumlah_unit_area_kemerial_1').val());
                                              var jumlah_area_komersial_dihuni_1 = Number($('#jumlah_area_komersial_dihuni_1').val());
                                              var hasil = jumlah_area_komersial_dihuni_1/jumlah_unit_area_kemerial_1
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_1"]').val( hasil * 100 + "%");
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_2').keyup(function() {
                                              var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                                              var jumlah_area_komersial_dihuni_2 = Number($('#jumlah_area_komersial_dihuni_2').val());
                                              var hasil = jumlah_area_komersial_dihuni_2/jumlah_unit_area_kemerial_2
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_2"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_3').keyup(function() {
                                              var jumlah_unit_area_kemerial_3 = Number($('#jumlah_unit_area_kemerial_3').val());
                                              var jumlah_area_komersial_dihuni_3 = Number($('#jumlah_area_komersial_dihuni_3').val());
                                              var hasil = jumlah_area_komersial_dihuni_3/jumlah_unit_area_kemerial_3
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_3"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_4').keyup(function() {
                                              var jumlah_unit_area_kemerial_4 = Number($('#jumlah_unit_area_kemerial_4').val());
                                              var jumlah_area_komersial_dihuni_4 = Number($('#jumlah_area_komersial_dihuni_4').val());
                                              var hasil = jumlah_area_komersial_dihuni_4/jumlah_unit_area_kemerial_4
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_4"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_5').keyup(function() {
                                              var jumlah_unit_area_kemerial_5 = Number($('#jumlah_unit_area_kemerial_5').val());
                                              var jumlah_area_komersial_dihuni_5 = Number($('#jumlah_area_komersial_dihuni_5').val());
                                              var hasil = jumlah_area_komersial_dihuni_5/jumlah_unit_area_kemerial_5
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_5"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_6').keyup(function() {
                                              var jumlah_unit_area_kemerial_6 = Number($('#jumlah_unit_area_kemerial_6').val());
                                              var jumlah_area_komersial_dihuni_6 = Number($('#jumlah_area_komersial_dihuni_6').val());
                                              var hasil = jumlah_area_komersial_dihuni_6/jumlah_unit_area_kemerial_6
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_6"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_7').keyup(function() {
                                              var jumlah_unit_area_kemerial_7 = Number($('#jumlah_unit_area_kemerial_7').val());
                                              var jumlah_area_komersial_dihuni_7 = Number($('#jumlah_area_komersial_dihuni_7').val());
                                              var hasil = jumlah_area_komersial_dihuni_7/jumlah_unit_area_kemerial_7
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_7"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_8').keyup(function() {
                                              var jumlah_unit_area_kemerial_8 = Number($('#jumlah_unit_area_kemerial_8').val());
                                              var jumlah_area_komersial_dihuni_8 = Number($('#jumlah_area_komersial_dihuni_8').val());
                                              var hasil = jumlah_area_komersial_dihuni_8/jumlah_unit_area_kemerial_8
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_8"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_9').keyup(function() {
                                              var jumlah_unit_area_kemerial_9 = Number($('#jumlah_unit_area_kemerial_2').val());
                                              var jumlah_area_komersial_dihuni_9 = Number($('#jumlah_area_komersial_dihuni_9').val());
                                              var hasil = jumlah_area_komersial_dihuni_9/jumlah_unit_area_kemerial_9
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_9"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });
                                              $('#jumlah_unit_area_kemerial_10').keyup(function() {
                                              var jumlah_unit_area_kemerial_10 = Number($('#jumlah_unit_area_kemerial_10').val());
                                              var jumlah_area_komersial_dihuni_10 = Number($('#jumlah_area_komersial_dihuni_10').val());
                                              var hasil = jumlah_area_komersial_dihuni_10/jumlah_unit_area_kemerial_10
                                              
                                              $('input[name="jumlah_tingkat_okupansi_area_10"]').val(hasil * 100 + "%" );
                                              console.log(hasil * 100);
                                              
                                              });

                          $( function() {
                              var Provider = [
                              "Telkom",
                              "First Media",
                              "Biznet",
                              "MyRepublic",
                              "Indihome"
                              ];
                              $( "#Provider_1" ).autocomplete({
                              source: Provider
                              });
                              $( "#Provider_2" ).autocomplete({
                              source: Provider
                              });
                              $( "#Provider_3" ).autocomplete({
                              source: Provider
                              });
                              $( "#Provider_4" ).autocomplete({
                              source: Provider
                              });
                              $( "#Provider_5" ).autocomplete({
                              source: Provider
                              });
                              } );
                          
                          if (data.SOHO != null) {
                          $('#SOHO').prop('checked', true);
                          }
                          if (data.DEDICATED_INTERNET != null) {
                          $('#DEDICATED_INTERNET').prop('checked', true);
                          }
                          if (data.DATA_COMMUNICATION != null ) {
                          $('#DATA_COMMUNICATION').prop('checked', true);
                          }
                          if (data.RESIDENTIAL != null) {
                          
                          $('#RESIDENTIAL').prop('checked', true);
                          }

                          
                        if ( data.PROPERTY_TYPE == "Office Building") {
                        $("#Main_Hole_Ready_gedung").show()
                        $("#membantu_gedung").show()
                        $("#Infrastruktur_building").show()
                        $("#pembangunan_gedung").show()
                        $("#internet_service_gedung").show()
                        $("#mayoritas_jenis_usaha_gedung").show()
                        $("#rata_rata_gedung").show()

                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#average_apartemen").hide()
                        $("#main_hole_apartemen").hide()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").hide()
                        $("#status_penghuni").hide()
                        $("#pembangunan_land").hide()
                        $("#Metode_Pembangunan_land").hide()
                        $("#tower_apartemen").show ()
                        
                        $("#45ketas_text").hide()
                        $("#45keatas_input").hide()
                        $("#text_keluarga").text("Keluarga")

                        $("#jumlah_lantai_tower").show()
                        $("#jumlah_unit_tower").show()
                        $("#jumlah_yang_dihuni_tower").show()
                        $("#jumlah_tingkat_okupansi_tower").show()
                        $("#jumlah_unit_area_komersial_tower").hide()
                        $("#jumlah_area_komersial_dihuni_tower").hide()
                        $("#tingkat_okupansi_2").hide()
                        $("#jumlah_kendaraan_terdaftar").hide()
                        $("#presentase").hide();

                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                    } 


                     if ( data.PROPERTY_TYPE == "Pergudangan") {
                        $("#Main_Hole_Ready_gedung").show()
                        $("#membantu_gedung").show()
                        $("#Infrastruktur_building").show()
                        $("#pembangunan_gedung").show()
                        $("#internet_service_gedung").show()
                        $("#mayoritas_jenis_usaha_gedung").show()
                        $("#rata_rata_gedung").show()

                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#average_apartemen").hide()
                        $("#main_hole_apartemen").hide()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").hide()
                        $("#status_penghuni").hide()
                        $("#pembangunan_land").hide()
                        $("#Metode_Pembangunan_land").hide()
                        $("#tower_apartemen").show ()
                        
                        $("#45ketas_text").hide()
                        $("#45keatas_input").hide()
                        $("#text_keluarga").text("Keluarga")

                        $("#jumlah_lantai_tower").show()
                        $("#jumlah_unit_tower").show()
                        $("#jumlah_yang_dihuni_tower").show()
                        $("#jumlah_tingkat_okupansi_tower").show()
                        $("#jumlah_unit_area_komersial_tower").hide()
                        $("#jumlah_area_komersial_dihuni_tower").hide()
                        $("#tingkat_okupansi_2").hide()
                        $("#jumlah_kendaraan_terdaftar").hide()
                        $("#presentase").hide();

                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")

                    
                      } 

                       if ( data.PROPERTY_TYPE == "Ruko/Rukan") {
                        $("#Main_Hole_Ready_gedung").show()
                        $("#membantu_gedung").show()
                        $("#Infrastruktur_building").show()
                        $("#pembangunan_gedung").show()
                        $("#internet_service_gedung").show()
                        $("#mayoritas_jenis_usaha_gedung").show()
                        $("#rata_rata_gedung").show()

                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#average_apartemen").hide()
                        $("#main_hole_apartemen").show()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").hide()
                        $("#status_penghuni").hide()
                        $("#pembangunan_land").hide()
                        $("#Metode_Pembangunan_land").show()
                        $("#tower_apartemen").show ()
                        
                                                   $("#45ketas_text").hide()
                          $("#45keatas_input").hide()
                          $("#text_keluarga").text("Keluarga")
                    
                        $("#presentase").show();

                         $("#jumlah_lantai_tower").show()
                         $("#jumlah_unit_tower").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").hide()
                         $("#jumlah_area_komersial_dihuni_tower").hide()
                         $("#tingkat_okupansi_2").hide()
                         $("#jumlah_kendaraan_terdaftar").hide()


                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")

                      } 
                     if ( data.PROPERTY_TYPE == "Mix Use") {
                        $("#Main_Hole_Ready_gedung").hide()
                          $("#membantu_gedung").hide()
                          $("#Infrastruktur_building").hide()
                          $("#pembangunan_gedung").hide()
                          $("#internet_service_gedung").hide()
                          $("#mayoritas_jenis_usaha_gedung").hide()
                          $("#rata_rata_gedung").hide()
                          $("#pembangunan_land").hide()
                          $("#Metode_Pembangunan_land").hide()
                         $("#tower_apartemen_Building").hide()
                          $("#presentase").hide();

                            
                        //  $("#jumlah_lantai_tower").hide()
                        //  $("#jumlah_unit_tower").hide()
                        //  $("#jumlah_yang_dihuni_tower").hide()
                        //  $("#jumlah_tingkat_okupansi_tower").hide()
                        //  $("#jumlah_unit_area_komersial_tower").hide()
                        //  $("#jumlah_area_komersial_dihuni_tower").hide()
                        //  $("#tingkat_okupansi_2").hide()
                        //  $("#jumlah_kendaraan_terdaftar").hide()

                         $("#jumlah_lantai_tower").show()
                         $("#jumlah_unit_tower").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").show()
                         $("#jumlah_area_komersial_dihuni_tower").show()
                         $("#tingkat_okupansi_2").show()
                         $("#jumlah_kendaraan_terdaftar").show()

                          
                          
                          
                           $("#45ketas_text").hide()
                          $("#45keatas_input").hide()
                          $("#text_keluarga").text("Keluarga")
                          
                          
                          



                          $("#re_wiring_apartemen").show()
                          $("#tower_apartemen").show()
                          
                          $("#perapihan_apartemen").show()
                          $("#type_unit_apartemen").show()
                          $("#average_apartemen").show()
                          $("#main_hole_apartemen").show()
                          $("[id=Infrastruktur_apartemen]").show()
                          $("#biaya_apartemen").show()
                          $("#perofile_penghuni_apartemen").show()
                          $("#jenis_pekerjaan_apartemen").show()
                          $("#status_penghuni").show()

                      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                        } 

                        if ( data.PROPERTY_TYPE == "Apartemen") {
                        $("#Main_Hole_Ready_gedung").hide()
                          $("#membantu_gedung").hide()
                          $("#Infrastruktur_building").hide()
                          $("#pembangunan_gedung").hide()
                          $("#internet_service_gedung").hide()
                          $("#mayoritas_jenis_usaha_gedung").hide()
                          $("#rata_rata_gedung").hide()
                          $("#pembangunan_land").hide()
                          $("#Metode_Pembangunan_land").hide()
                         $("#tower_apartemen_Building").hide()
                          $("#presentase").hide();
                          $("#mt_Infrastruktur").removeClass("mt-3");
                          $("#mt_Infrastruktur").addClass("mt-5");

                            
                        //  $("#jumlah_lantai_tower").hide()
                        //  $("#jumlah_unit_tower").hide()
                        //  $("#jumlah_yang_dihuni_tower").hide()
                        //  $("#jumlah_tingkat_okupansi_tower").hide()
                        //  $("#jumlah_unit_area_komersial_tower").hide()
                        //  $("#jumlah_area_komersial_dihuni_tower").hide()
                        //  $("#tingkat_okupansi_2").hide()
                        //  $("#jumlah_kendaraan_terdaftar").hide()

                         $("#jumlah_lantai_tower").show()
                         $("#jumlah_unit_tower").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").show()
                         $("#jumlah_area_komersial_dihuni_tower").show()
                         $("#tingkat_okupansi_2").show()
                         $("#jumlah_kendaraan_terdaftar").show()

                          
                          
                          
                           $("#45ketas_text").hide()
                          $("#45keatas_input").hide()
                          $("#text_keluarga").text("Keluarga")
                          
                          
                          



                          $("#re_wiring_apartemen").show()
                          $("#tower_apartemen").show()
                          
                          $("#perapihan_apartemen").show()
                          $("#type_unit_apartemen").show()
                          $("#average_apartemen").show()
                          $("#main_hole_apartemen").show()
                          $("[id=Infrastruktur_apartemen]").show()
                          $("#biaya_apartemen").show()
                          $("#perofile_penghuni_apartemen").show()
                          $("#jenis_pekerjaan_apartemen").show()
                          $("#status_penghuni").show()

                      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                        } 


                      if ( data.PROPERTY_TYPE == "Landed House") {
                    
                    
                        $("#Main_Hole_Ready_gedung").hide()
                        $("#Infrastruktur_building").hide()
                        $("#pembangunan_gedung").hide()
                        $("#mayoritas_jenis_usaha_gedung").hide()
                        $("#rata_rata_gedung").hide()
                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#main_hole_apartemen").hide()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").show()
                        $("#tower_apartemen").show()                        
                        $("#presentase").hide();
                        $("#Komposisi_Kewarganegaraan").hide();
                    
                    
                         $("#text_jumlah_yang_dihuni").text("Jumlah Unit Terisi")

                         $("#jumlah_lantai_tower").hide()
                         $("#jumlah_unit_tower").show()
                         $("#empatlimakeatas").show()

                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").hide()
                         $("#jumlah_area_komersial_dihuni_tower").hide()
                         $("#tingkat_okupansi_2").hide()
                         $("#jumlah_kendaraan_terdaftar").hide()

                    
                    
                   
                          $("#45ketas_text").show()
                          $("#45keatas_input").show()
                          $("#text_keluarga").text("Pasangan Muda")



                          $("#status_penghuni").show()
                          $("#membantu_gedung").show()
                          $("#perofile_penghuni_apartemen").show()
                          $("#internet_service_gedung").show()
                          $("#average_apartemen").show()
                          $("#pembangunan_land").show()
                          $("#Metode_Pembangunan_land").show()



                        $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                          $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                      }      
                


                          
                          $('#UPDATE_PROGRESS').val(data.UPDATE_PROGRESS);
                          
                          $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                              $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                              $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                          // cek aftifitas
                          var aktifitas = data.MARKETING_AKTIFITAS
                          if (aktifitas.match(/aktifitas_lobby/) == "aktifitas_lobby") {
                          $('#aktifitas_lobby').prop('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_basemant/) == "aktifitas_basemant") {
                          $('#aktifitas_basemant').prop('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_pintu_parkir/) == "aktifitas_pintu_parkir") {
                          $('#aktifitas_pintu_parkir').prosel.value('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_lift/) == "aktifitas_lift") {
                          $('#aktifitas_lift').prop('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_swmg_pool/) == "aktifitas_swmg_pool") {
                          $('#aktifitas_swmg_pool').prop('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_fitness/) == "aktifitas_fitness") {
                          $('#aktifitas_fitness').prop('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_mgmt_office/) == "aktifitas_mgmt_office") {
                          $('#aktifitas_mgmt_office').prop('checked', true);
                          }
                          if (aktifitas.match(/aktifitas_receptionist/) == "aktifitas_receptionist") {
                          $('#aktifitas_receptionist').prop('checked', true);
                          }



                          var pop_up = data.MARKETING_POP_UP
                          if (pop_up.match(/POP_UP_TABLE_lobby/) == "POP_UP_TABLE_lobby") {
                          $('#POP_UP_TABLE_lobby').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_basemant/) == "POP_UP_TABLE_basemant") {
                          $('#POP_UP_TABLE_basemant').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_pintu_parkir/) == "POP_UP_TABLE_pintu_parkir") {
                          $('#POP_UP_TABLE_pintu_parkir').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_lift/) == "POP_UP_TABLE_lift") {
                          $('#POP_UP_TABLE_lift').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_swmg_pool/) == "POP_UP_TABLE_swmg_pool") {
                          $('#POP_UP_TABLE_swmg_pool').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_fitness/) == "POP_UP_TABLE_fitness") {
                          $('#POP_UP_TABLE_fitness').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_mgmt_office/) == "POP_UP_TABLE_mgmt_office") {
                          $('#POP_UP_TABLE_mgmt_office').prop('checked', true);
                          }
                          if (pop_up.match(/POP_UP_TABLE_receptionist/) == "POP_UP_TABLE_receptionist") {
                          $('#POP_UP_TABLE_receptionist').prop('checked', true);
                          }
                          
                          
                          // spanduk
                          
                          
                          
                          
                          var spanduk = data.MARKETING_SPANDUK
                          if (spanduk.match(/penempatan_standuk_lobby/) == "penempatan_standuk_lobby") {
                          $('#penempatan_standuk_lobby').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_basemant/) == "penempatan_standuk_basemant") {
                          $('#penempatan_standuk_basemant').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_pintu_parkir/) == "penempatan_standuk_pintu_parkir") {
                          $('#penempatan_standuk_pintu_parkir').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_lift/) == "penempatan_standuk_lift") {
                          $('#penempatan_standuk_lift').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_swmg_pool/) == "penempatan_standuk_swmg_pool") {
                          $('#penempatan_standuk_swmg_pool').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_fitness/) == "penempatan_standuk_fitness") {
                          $('#penempatan_standuk_fitness').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_mgmt_office/) == "penempatan_standuk_mgmt_office") {
                          $('#penempatan_standuk_mgmt_office').prop('checked', true);
                          }
                          if (spanduk.match(/penempatan_standuk_receptionist/) == "penempatan_standuk_receptionist") {
                          $('#penempatan_standuk_receptionist').prop('checked', true);
                          }
                          
                          
                          
                          
                          var poster = data.MARKETING_POSTER
                          if (poster.match(/Penempatan_Poster_lobby/) == "Penempatan_Poster_lobby") {
                          $('#Penempatan_Poster_lobby').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_basemant/) == "Penempatan_Poster_basemant") {
                          $('#Penempatan_Poster_basemant').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_pintu_parkir/) == "Penempatan_Poster_pintu_parkir") {
                          $('#Penempatan_Poster_pintu_parkir').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_lift/) == "Penempatan_Poster_lift") {
                          $('#Penempatan_Poster_lift').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_swmg_pool/) == "Penempatan_Poster_swmg_pool") {
                          $('#Penempatan_Poster_swmg_pool').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_fitness/) == "Penempatan_Poster_fitness") {
                          $('#Penempatan_Poster_fitness').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_mgmt_office/) == "Penempatan_Poster_mgmt_office") {
                          $('#Penempatan_Poster_mgmt_office').prop('checked', true);
                          }
                          if (poster.match(/Penempatan_Poster_receptionist/) == "Penempatan_Poster_receptionist") {
                          $('#Penempatan_Poster_receptionist').prop('checked', true);
                          }
                          
                          
                          var stiker = data.MARKETING_STICKER
                          console.log(stiker);
                          
                          if (stiker.match(/sticker_lobby/) == "sticker_lobby") {
                          $('#sticker_lobby').prop('checked', true);
                          }
                          if (stiker.match(/sticker_basemant/) == "sticker_basemant") {
                          $('#sticker_basemant').prop('checked', true);
                          }
                          if (stiker.match(/sticker_pintu_parkir/) == "sticker_pintu_parkir") {
                          $('#sticker_pintu_parkir').prop('checked', true);
                          }
                          if (stiker.match(/sticker_lift/) == "sticker_lift") {
                          $('#sticker_lift').prop('checked', true);
                          }
                          if (stiker.match(/sticker_swmg_pool/) == "sticker_swmg_pool") {
                          $('#sticker_swmg_pool').prop('checked', true);
                          }
                          if (stiker.match(/sticker_fitness/) == "sticker_fitness") {
                          $('#sticker_fitness').prop('checked', true);
                          }
                          if (stiker.match(/sticker_mgmt_office/) == "sticker_mgmt_office") {
                          $('#sticker_mgmt_office').prop('checked', true);
                          }
                          if (stiker.match(/sticker_receptionist/) == "sticker_receptionist") {
                          $('#sticker_receptionist').prop('checked', true);
                          }
                          
                          
                          var roll = data.MARKETING_ROLL
                          if (roll.match(/roll_up_lobby/) == "roll_up_lobby") {
                          $('#roll_up_lobby').prop('checked', true);
                          }
                          if (roll.match(/roll_up_basemant/) == "roll_up_basemant") {
                          $('#roll_up_basemant').prop('checked', true);
                          }
                          if (roll.match(/roll_up_pintu_parkir/) == "roll_up_pintu_parkir") {
                          $('#roll_up_pintu_parkir').prop('checked', true);
                          }
                          if (roll.match(/roll_up_lift/) == "roll_up_lift") {
                          $('#roll_up_lift').prop('checked', true);
                          }
                          if (roll.match(/roll_up_swmg_pool/) == "roll_up_swmg_pool") {
                          $('#roll_up_swmg_pool').prop('checked', true);
                          }
                          if (roll.match(/roll_up_fitness/) == "roll_up_fitness") {
                          $('#roll_up_fitness').prop('checked', true);
                          }
                          if (roll.match(/roll_up_mgmt_office/) == "roll_up_mgmt_office") {
                          $('#roll_up_mgmt_office').prop('checked', true);
                          }
                          if (roll.match(/roll_up_receptionist/) == "roll_up_receptionist") {
                          $('#roll_up_receptionist').prop('checked', true);
                          }
                          
                          var acrilic = data.MARKETING_ACRILIC
                          if (acrilic.match(/acrilic_lobby/) == "acrilic_lobby") {
                          $('#acrilic_lobby').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_basemant/) == "acrilic_basemant") {
                          $('#acrilic_basemant').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_pintu_parkir/) == "acrilic_pintu_parkir") {
                          $('#acrilic_pintu_parkir').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_lift/) == "acrilic_lift") {
                          $('#acrilic_lift').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_swmg_pool/) == "acrilic_swmg_pool") {
                          $('#acrilic_swmg_pool').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_fitness/) == "acrilic_fitness") {
                          $('#acrilic_fitness').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_mgmt_office/) == "acrilic_mgmt_office") {
                          $('#acrilic_mgmt_office').prop('checked', true);
                          }
                          if (acrilic.match(/acrilic_receptionist/) == "acrilic_receptionist") {
                          $('#acrilic_receptionist').prop('checked', true);
                          }
                          $('#DESKSURVEY').modal('show');
                    }
                });

            
                }
                }
           });                
            }else if (sel.value == "NEGOTIATION 1 - BUSINESS SCHEME") {
            // console.log(sel.value);
              $('#FREE_SERVICE_4').val("Entertainment");

            var id_proposal = window.localStorage.getItem("id_fase");
            $.ajax({
              type: "GET",
              url: '/apireport/' + id_proposal,
              success: function(data) {
              var next = data.NEXT_PROGRESS;
              console.log(next);
              
              if (next != "3") {
                              $('#PROGRESS_STATUS_SUBMIT_PROPOSAL').val('SUBMIT PROPOSAL');
                Swal.fire(
                              'Tidak Bisa lanjut',
                              'Anda belom save progress',
                              'error'
                              )
              }else{

                var id_proposal = window.localStorage.getItem("id_fase");
                $('#id_NEGOTIATION').val(id_proposal);
                var id = $("#id_NEGOTIATION").val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                        // console.log(response);
                      $("#PROGRESS_STATUS").val("NEGOTIATION 1 - BUSINESS SCHEME")
                        $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                        $("#Edit_NEGOTIATION_1").addClass("muncul")
                        $("#Edit_NEGOTIATION_1").removeClass("ilang")

                        $('#REVENUE_SHARE').val(data.REVENUE_SHARE);
                                        $('#RENTAL_BASE').val(data.RENTAL_BASE);
                                        $('#ONE_TIME_FEE').val(data.ONE_TIME_FEE);
                                        $('#FREE_WIFI').val(data.FREE_WIFI);
                                        $('#UPDATE_PROGRESS_NEGOTION_1').val(data.UPDATE_PROGRESS);
                                        $('#FREE_SERVICE_1').val(data.FREE_SERVICE_1);
                                        // $('#FREE_SERVICE_2').val(data.FREE_SERVICE_2);
                                        $('#FREE_SERVICE_3').val(data.FREE_SERVICE_3);
                                        // $('#FREE_SERVICE_4').val(data.FREE_SERVICE_4);
                    }
                });
              }
              }
            })

       
        

            }else if (sel.value == "SITE SURVEY") {
                var id_proposal = window.localStorage.getItem("id_fase");
                      $.ajax({
                      type: "GET",
                      url: '/apireport/' + id_proposal,
                      success: function(data) {
                      var next = data.NEXT_PROGRESS;
                      console.log(next);
                      if (next != "4") {
                      $('#PROGRESS_STATUS_NEGOTIATION_1').val('NEGOTIATION 1 - BUSINESS SCHEME');
                      Swal.fire(
                      'Tidak Bisa lanjut',
                      'Anda belom save progress',
                      'error'
                      )
                      }else{
                var id_1 = window.localStorage.getItem("id_fase");
                 $('#id_SITE_SURVEY_PDF').val(id_1);
                 $('#id_SITE_SURVEY').val(id_1);
                 $('#id_FIRST_WO_PDF').val(id_1);
                 
                var id = $("#id_SITE_SURVEY").val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                $("#Edit_NEGOTIATION_1").addClass("ilang")
                $("#Edit_SITE_SURVEY").removeClass("ilang")
                $("#Edit_SITE_SURVEY").addClass("muncul")

                        if (data.SALES_SIGNED == "01-01-1970"||data.SALES_SIGNED == null) {
                       $('#SALES_SIGNED').val(moment().format('D-MM-YYYY'));                         
                        }else{
                       $('#SALES_SIGNED').val(data.SALES_SIGNED );
                        }
                        if (data.GM_SALES_SIGNED == "01-01-1970" ||data.GM_SALES_SIGNED == null) {
                              $('#GM_SALES_SIGNED').val(moment().format('D-MM-YYYY'));
                              }else{
                          $('#GM_SALES_SIGNED').val(data.GM_SALES_SIGNED);
                              }
                          $('#UPDATE_PROGRESS_SITE_SURVEY').val(data.UPDATE_PROGRESS);
                          // $('#RECOMENDATION').val(data.RECOMMENDATION);
                          if (data.SITE_SURVEY == "01-01-1970" ||data.SITE_SURVEY == null) {
                            $('#SITE_SURVEY_DATE').val(moment().format('D-MM-YYYY'));
                            }else{
                          $('#SITE_SURVEY_DATE').val(data.SITE_SURVEY);
                            }
                            if (data.WO_DATE_SITE_SURVEY == "01-01-1970" ||data.WO_DATE_SITE_SURVEY == null) {
                            $('#WO_DATE_SITE_SURVEY').val(moment().format('D-MM-YYYY'));
                            }else{
                          $('#WO_DATE_SITE_SURVEY').val(data.SITE_SURVEY);
                            }


                          $('#DESKSURVEY').modal('show');
                          
                  }
                });
              }
              }
            })
           }else if (sel.value == "BOQ, SITE SURVEY REPORT, DESIGN") {
                       var id_proposal = window.localStorage.getItem("id_fase");
                      $.ajax({
                      type: "GET",
                      url: '/apireport/' + id_proposal,
                      success: function(data) {
                      var next = data.NEXT_PROGRESS;
                      console.log(next);
                      if (next != "5") {
                        console.log(next);
                        
                      $('#PROGRESS_STATUS_SURVEY').val('SITE SURVEY');
                      Swal.fire(
                      'Tidak Bisa lanjut',
                      'Anda belom save progress',
                      'error'
                      )
                      }else{

                var id_proposal = window.localStorage.getItem("id_fase");
                $("#id_BOQ").val(id_proposal);
                $("#id_BOQ_UPLOAD").val(id_proposal);
                $("#id_BOQ_PDF_SITE_SURVEY").val(id_proposal);
                var id = $("#id_BOQ").val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
              $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                    $("#Edit_NEGOTIATION_1").addClass("ilang")
                    $("#Edit_NEGOTIATION_1").removeClass("muncul")
                    $("#Edit_SITE_SURVEY").addClass("ilang")
                    $("#Edit_SITE_SURVEY").removeClass("muncul")
                    $("#Edit_BOQ").removeClass("ilang")
                    $("#Edit_BOQ").addClass("muncul")

                          $('#UPDATE_PROGRESS_BOQ').val(data.UPDATE_PROGRESS);
                        if (data.BOQ_RECEIVED_DATE == "01-01-1970" ||data.BOQ_RECEIVED_DATE == null) {
                          $('#BOQ_DATE').val(moment().format('D-MM-YYYY'));
                          }else{
                        $('#BOQ_DATE').val(data.BOQ_RECEIVED_DATE);
                          }
                          $('#DESKSURVEY').modal('show');
             
                }
                });
              }
              }
            })

            }else if (sel.value == "PnL PROGRESS") {
                             var id_proposal = window.localStorage.getItem("id_fase");
                      $.ajax({
                      type: "GET",
                      url: '/apireport/' + id_proposal,
                      success: function(data) {
                      var next = data.NEXT_PROGRESS;
                      console.log(next);
                      if (next != "6") {
                        console.log(next);
                       
                        
                      $('#PROGRESS_STATUS_BOQ').val('BOQ, SITE SURVEY REPORT, DESIGN');
                      Swal.fire(
                      'Tidak Bisa lanjut',
                      'Anda belom save progress',
                      'error'
                      )
                      
                      }else{
                var id_proposal = window.localStorage.getItem("id_fase");
                 $("#id_PNL").val(id_proposal)
                 $("#id_PNL_PDF").val(id_proposal)
                 $("#id_Draft_PNL_PDF").val(id_proposal)
                 
                 var id = $("#id_PNL").val();
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                      $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                      $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                      $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                      $("#Edit_NEGOTIATION_1").addClass("ilang")
                      $("#Edit_NEGOTIATION_1").removeClass("muncul")
                      $("#Edit_SITE_SURVEY").removeClass("muncul")
                      $("#Edit_SITE_SURVEY").addClass("ilang")
                      $("#Edit_BOQ").removeClass("muncul")
                      $("#Edit_BOQ").addClass("ilang")
                      $("#Edit_PNL").removeClass("ilang")
                      $("#Edit_PNL").addClass("muncul")


              if (data.PNL_FULL_SIGN_DATE == "01-01-1970" ||data.PNL_FULL_SIGN_DATE == null) {
                  $('#PNL_DATE').val(moment().format('D-MM-YYYY'));
                  }else{
              $('#PNL_DATE').val(data.PNL_FULL_SIGN_DATE);
                  
                  }
                $('#UPDATE_PROGRESS_PNL').val(data.UPDATE_PROGRESS);
                $('#DESKSURVEY').modal('show');
           }
                });
              }
              }
            })
             

            }else if (sel.value == "NEGOTIATION 2 - PKS REVIEW") {
                 var id_proposal = window.localStorage.getItem("id_fase");
                      $.ajax({
                      type: "GET",
                      url: '/apireport/' + id_proposal,
                      success: function(data) {
                      var next = data.NEXT_PROGRESS;
                      console.log(next);
                      if (next != "7") {
                        console.log(next);
                        
                      $('#PROGRESS_STATUS_PNL').val('PnL PROGRESS');
                      Swal.fire(
                      'Tidak Bisa lanjut',
                      'Anda belom save progress',
                      'error'
                      )
                      }else{
                var id_proposal = window.localStorage.getItem("id_fase");
                 $("#id_PKS_REVIEW").val(id_proposal)
                   var id = $("#id_PKS_REVIEW").val();
                $.ajax({
                    type: "GET",
                    url: '/apireport/'+ id,
                    success: function(data) {
                      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                      $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                      $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                      $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                      $("#Edit_NEGOTIATION_1").addClass("ilang")
                      $("#Edit_NEGOTIATION_1").removeClass("muncul")
                      $("#Edit_SITE_SURVEY").addClass("ilang")
                      $("#Edit_SITE_SURVEY").removeClass("muncul")
                      $("#Edit_BOQ").addClass("ilang")
                      $("#Edit_BOQ").removeClass("muncul")
                      $("#Edit_PNL").addClass("ilang")
                      $("#Edit_PNL").removeClass("muncul")
                      $("#Edit_PKS_REVIEW").removeClass("ilang")
                      $("#Edit_PKS_REVIEW").addClass("muncul")
                      if (data.PKS_REVIEW_DATE == "01-01-1970" ||data.PKS_REVIEW_DATE == null) {
                        $('#pks_review_date').val(moment().format('D-MM-YYYY'));
                        }else{
                        
                        $('#pks_review_date').val(data.PKS_REVIEW_DATE);
                        }
                          $('#UPDATE_PROGRESS_PKS_REVIEW').val(data.UPDATE_PROGRESS);
                          $('#DESKSURVEY').modal('show');
          }
                });
              }
              }
            })


            }else if (sel.value == "SIGNED PKS") {

               var id_proposal = window.localStorage.getItem("id_fase");
                      $.ajax({
                      type: "GET",
                      url: '/apireport/' + id_proposal,
                      success: function(data) {
                      var next = data.NEXT_PROGRESS;
                      console.log(next);
                      if (next != "8") {
                        console.log(next);
                        
                      $('#PROGRESS_STATUS_PKS_REVIEW').val('NEGOTIATION 2 - PKS REVIEW');
                      Swal.fire(
                      'Tidak Bisa lanjut',
                      'Anda belom save progress',
                      'error'
                      )
                      }else{
              var id_proposal = window.localStorage.getItem("id_fase");
                    $("#id_PKS_SIGN").val(id_proposal)
                    $("#id_iom_pdf").val(id_proposal)
                    $("#id_tac_pdf").val(id_proposal)
                    
                var id = $("#id_PKS_SIGN").val();
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                        $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                        $("#Edit_NEGOTIATION_1").addClass("ilang")
                        $("#Edit_NEGOTIATION_1").removeClass("muncul")
                        $("#Edit_SITE_SURVEY").addClass("ilang")
                        $("#Edit_SITE_SURVEY").removeClass("muncul")
                        $("#Edit_BOQ").addClass("ilang")
                        $("#Edit_BOQ").removeClass("muncul")
                        $("#Edit_PNL").addClass("ilang")
                        $("#Edit_PNL").removeClass("muncul")
                        $("#Edit_PKS_REVIEW").addClass("ilang")
                        $("#Edit_PKS_REVIEW").removeClass("muncul")
                        $("#Edit_PKS_SIGN").removeClass("ilang")
                        $("#Edit_PKS_SIGN").addClass("muncul")

                        if (data.PKS_DATE == "01-01-1970" ||data.PKS_DATE == null) {
                          $('#PKS_DATE').val(moment().format('D-MM-YYYY'));
                          }else{
                        $('#PKS_DATE').val(data.PKS_DATE);
                             }

                                    $('#UPDATE_PROGRESS_PKS_SIGN').val(data.UPDATE_PROGRESS);
                                    $('#Deal_Year').val(data.DEAL_YEAR);
                                    $('#No_PKS').val(data.NO_PKS);
                      }
                });
              }
              }
            })



            }else if (sel.value == "ROLL-OUT PROGRESS") {
                      var id_proposal = window.localStorage.getItem("id_fase");
                      $.ajax({
                      type: "GET",
                      url: '/apireport/' + id_proposal,
                      success: function(data) {
                      var next = data.NEXT_PROGRESS;
                      console.log(next);
                      if (next != "9") {
                        console.log(next);
                        

                      $('#PROGRESS_STATUS_PKS_SIGN').val('SIGNED PKS');
                      Swal.fire(
                      'Tidak Bisa lanjut',
                      'Anda belom save progress',
                      'error'
                      )
                      
                      }else{
                var id_proposal = window.localStorage.getItem("id_fase");
                $("#id_ROLL").val(id_proposal)
                $("#id_WO_PDF").val(id_proposal)
                
                var id = $("#id_ROLL").val();
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                  $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                  $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                  $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                  $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                  $("#Edit_NEGOTIATION_1").addClass("ilang")
                  $("#Edit_NEGOTIATION_1").removeClass("muncul")
                  $("#Edit_SITE_SURVEY").addClass("ilang")
                  $("#Edit_SITE_SURVEY").removeClass("muncul")
                  $("#Edit_BOQ").addClass("ilang")
                  $("#Edit_BOQ").removeClass("muncul")
                  $("#Edit_PNL").addClass("ilang")
                  $("#Edit_PNL").removeClass("muncul")
                  $("#Edit_PKS_REVIEW").addClass("ilang")
                  $("#Edit_PKS_REVIEW").removeClass("muncul")
                  $("#Edit_PKS_SIGN").addClass("ilang")
                  $("#Edit_PKS_SIGN").removeClass("muncul")
                  $("#Edit_ROLL").removeClass("ilang")
                  $("#Edit_ROLL").addClass("muncul")

                  $('#UPDATE_PROGRESS_ROLL').val(data.UPDATE_PROGRESS);
                  if (data.WO_DATE == "01-01-1970" ||data.WO_DATE == null) {
                        $('#wo_date').val(moment().format('D-MM-YYYY'));
                        }else{
                        
                  $('#wo_date').val(data.WO_DATE);
                        }
                  $('#DESKSURVEY').modal('show');
                      }
                });
              }
              }
            })

            }else if (sel.value == "REJECT") {
              // id_REJECT
              
                  var id_proposal = window.localStorage.getItem("id_fase");
                  $("#id_REJECT").val(id_proposal);
            $('#id_proposal_pdf_reject').val(id_proposal);
                  var id = $("#id_REJECT").val();
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                        $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                        $("#Edit_NEGOTIATION_1").addClass("ilang")
                        $("#Edit_SITE_SURVEY").addClass("ilang")
                        $("#Edit_BOQ").addClass("ilang")
                        $("#Edit_PNL").addClass("ilang")
                        $("#Edit_PKS_REVIEW").addClass("ilang")
                        $("#Edit_PKS_SIGN").addClass("ilang")
                        $("#Edit_ROLL").addClass("ilang")
                        $("#Edit_REJECT").removeClass("ilang")
                        $("#Edit_REJECT").addClass("muncul")
                        $('#reject_date').val(data.REJECT_DATE);
                        $('#UPDATE_PROGRESS_REJECT').val(data.UPDATE_PROGRESS);
                        $('#Reject_Code').val(data.REJECT_CODE);
                        $('#DESKSURVEY').modal('show');
                    }
                });

            }else if (sel.value == "READY TO SELL") {
              var id_proposal = window.localStorage.getItem("id_fase");
                  $.ajax({
                  type: "GET",
                  url: '/apireport/' + id_proposal,
                  success: function(data) {
                  var next = data.NEXT_PROGRESS;
                  console.log(next);
                  if (next != "10") {
                  console.log(next);
                  
                  $('#PROGRESS_STATUS_NEGOTIATION_1').val('NEGOTIATION 1 - BUSINESS SCHEME');
                  Swal.fire(
                  'Tidak Bisa lanjut',
                  'Anda belom save progress',
                  'error'
                  )
                  }else{
                // var id_proposal = $("#id_ROLL").val();
                
                $("#id_READY").val(id_proposal)
                $("#id_PKS_PDF").val(id_proposal)
                var id = $("#id_READY").val();
                console.log(id);
                
                $.ajax({
                    type: "GET",
                    url: '/apireport/' + id,
                    success: function(data) {
                      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                      $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                      $("#Edit_NEGOTIATION_1").addClass("ilang")
                      $("#Edit_SITE_SURVEY").addClass("ilang")
                      $("#Edit_BOQ").addClass("ilang")
                      $("#Edit_PNL").addClass("ilang")
                      $("#Edit_PKS_REVIEW").addClass("ilang")
                      $("#Edit_PKS_SIGN").addClass("ilang")
                      $("#Edit_ROLL").addClass("ilang")
                      $("#Edit_REJECT").addClass("ilang")
                      $("#Edit_READY").removeClass("ilang")
                      $("#Edit_READY").addClass("muncul")
                      if (data.BASO_DATE == "01-01-1970" ||data.BASO_DATE == null) {
                          $('#baso_date').val(moment().format('D-MM-YYYY'));
                          }else{
                          
                      $('#baso_date').val(data.BASO_DATE);
                          }
                      $('#pks_end').val(data.PKS_END);
                      $('#UPDATE_PROGRESS_READY').val(data.UPDATE_PROGRESS);
                      $('#hp_port').val(data.HP_PORT);
                      $('#BASO').val(data.BASOORBAST_No);
                      $('#DESKSURVEY').modal('show');
                        }
                    });
                  }
                  }
                
                })
          }
        }
</script>

<script>
  $(function() {


      $("form[name='new']").validate({
        rules: {
          BUILDING_NAME: "required",
          COLOR_MAP_ONLINE: "required",
          ADDRESS: "required",
          PROVINCE: "required",
          CITY: "required",
          SUBDISTRICT: "required",
          COORDINATE: "required",
          tgl_desk_survey: "required",
        },
        
        submitHandler: function(form) {
          form.submit();
          
        }
      });
      $("form[name='Edit_PNL']").validate({
        rules: {
          PNL_DATE: "required",
          upload_pnl_pdf: "required",
        },
        
        submitHandler: function(form) {
          form.submit();
        }
      });


           $("form[name='Edit_PKS_SIGN']").validate({
        rules: {
          IOM_FULL_SIGNED: "required",
          Term_And_Condition: "required",
          PKS_DATE: "required",
          Deal_Year: "required",
          No_PKS: "required",
        },
        
        submitHandler: function(form) {
          form.submit();
        }
      });


           $("form[name='Edit_READY']").validate({
        rules: {
          baso_date: "required",
          pks_end: "required",
          hp_port: "required",
          Deal_Year: "required",
          BASO: "required",
        },
        
        submitHandler: function(form) {
          form.submit();
        }
      });
      $("form[name='Edit_NEGOTIATION_1']").validate({
            rules: {
            REVENUE_SHARE: "required",
            RENTAL_BASE: "required",
            ONE_TIME_FEE: "required",
            FREE_WIFI: "required",
            FREE_SERVICE_1: "required",
            },
            
            submitHandler: function(form) {
            form.submit();
            }
            });


      $("form[name='Edit_BOQ']").validate({
            rules: {
            BOQ_DATE: "required",
            site_survey_pdf: "required",
            upload_boq_pdf: "required",
            },
            
            submitHandler: function(form) {
            form.submit();
            }
            });

        $("form[name='Edit_SITE_SURVEY']").validate({
                  rules: {
                  SALES_SIGNED: "required",
                  GM_SALES_SIGNED: "required",
                  UPLOAD_FA_FULL: "required",
                  ONE_TIME_FEE: "required",
            SITE_SURVEY_DATE: "required",
                  FREE_WIFI: "required",
                  FREE_SERVICE_1: "required",
                  },
                  
                  submitHandler: function(form) {
                  form.submit();
                  }
                  });

              $("form[name='Edit_PKS_REVIEW']").validate({
                  rules: {
                  pks_review_date: "required",
                  },
                  
                  submitHandler: function(form) {
                  form.submit();
                  }
                  });

           $("form[name='Edit_ROLL']").validate({
                  rules: {
                  wo_date: "required",
                  wo_pdf: "required",
                  },
                  
                  submitHandler: function(form) {
                  form.submit();
                  }
                  });


            $("form[name='Edit_ROLL']").validate({
                  rules: {
                  wo_date: "required",
                  wo_pdf: "required",
                  },
                  
                  submitHandler: function(form) {
                  form.submit();
                  }
                  });
                  
                  


        $("form[name='Edit_REPORT_SUBMIT_PROPOSAL']").validate({
        rules: {
          DEVELOPERORCOMPANY_NAME: "required",
          NAME: "required",
          EMAIL: "required",
          PHONEORMOBILE: "required",
          MOBILEPHONE: "required",
          
          ISP_EXISTING: "required",
          TOTAL_TOWER: "required",
          TOTAL_FLOORORTOWER: "required",
          exclusive: "required",
        
          BUSDEV_SIGNED: "required",
          SUBMIT_PROPOSAL_DATE: "required",
          BM_SIGNED: "required",
          form_fa: {
            required :true,
            extension: "png"
            }
        },
        
        submitHandler: function(form) {
              form.submit();
        }
      });

   
      $("form[name='Edit_REPORT_DESK_SURVEY']").validate({
          rules: {
          BUILDING_NAME: "required",
          COLOR_MAP_ONLINE: "required",
          ADDRESS: "required",
          PROVINCE: "required",
          CITY: "required",
          SUBDISTRICT: "required",
          COORDINATE: "required",
          tgl_desk_survey: "required",
          },
          
          submitHandler: function(form) {
          form.submit();
      }
      });

    });
</script>
<script>
  var rupiah = document.getElementById("ONE_TIME_FEE");
      rupiah.addEventListener("keyup", function(e) {
      rupiah.value = formatRupiah(this.value, "Rp. ");
      });
      function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
      }
      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
      }

      var rupiah4 = document.getElementById("terendah");
        rupiah4.addEventListener("keyup", function(e) {
        rupiah4.value = formatRupiah4(this.value, "Rp. ");
        });
        function formatRupiah4(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah4 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
        separator = sisa ? "." : "";
        rupiah4 += separator + ribuan.join(".");
        }
        rupiah4 = split[1] != undefined ? rupiah4 + "," + split[1] : rupiah4;
        return prefix == undefined ? rupiah4 : rupiah4 ? "Rp. " + rupiah4 : "";
        }

      var rupiah5 = document.getElementById("tertingi");
        rupiah5.addEventListener("keyup", function(e) {
        rupiah5.value = formatRupiah5(this.value, "Rp. ");
        });
        function formatRupiah5(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah5 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
        separator = sisa ? "." : "";
        rupiah5 += separator + ribuan.join(".");
        }
        rupiah5 = split[1] != undefined ? rupiah5 + "," + split[1] : rupiah5;
        return prefix == undefined ? rupiah5 : rupiah5 ? "Rp. " + rupiah5 : "";
        }


      // var rupiah6 = document.getElementById("harga_sewa");
      //   rupiah6.addEventListener("keyup", function(e) {
      //   rupiah6.value = formatRupiah6(this.value, "Rp. ");
      //   });
      //   function formatRupiah6(angka, prefix) {
      //   var number_string = angka.replace(/[^,\d]/g, "").toString(),
      //   split = number_string.split(","),
      //   sisa = split[0].length % 3,
      //   rupiah6 = split[0].substr(0, sisa),
      //   ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      //   if (ribuan) {
      //   separator = sisa ? "." : "";
      //   rupiah6 += separator + ribuan.join(".");
      //   }
      //   rupiah6 = split[1] != undefined ? rupiah6 + "," + split[1] : rupiah6;
      //   return prefix == undefined ? rupiah6 : rupiah6 ? "Rp. " + rupiah6 : "";
      //   }


        var rupiah_rata_rata = document.getElementById("rata-rata");
        rupiah_rata_rata.addEventListener("keyup", function(e) {
        rupiah_rata_rata.value = formatrupiah_rata_rata(this.value, "Rp. ");
        });
        function formatrupiah_rata_rata(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah_rata_rata = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
        separator = sisa ? "." : "";
        rupiah_rata_rata += separator + ribuan.join(".");
        }
        rupiah_rata_rata = split[1] != undefined ? rupiah_rata_rata + "," + split[1] : rupiah_rata_rata;
        return prefix == undefined ? rupiah_rata_rata : rupiah_rata_rata ? "Rp. " + rupiah_rata_rata : "";
        }



        var rupiah_jumlah_biaya = document.getElementById("perapihan_biaya");
        rupiah_jumlah_biaya.addEventListener("keyup", function(e) {
        rupiah_jumlah_biaya.value = formatrupiah_jumlah_biaya(this.value, "Rp. ");
        });
        function formatrupiah_jumlah_biaya(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah_jumlah_biaya = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
        separator = sisa ? "." : "";
        rupiah_jumlah_biaya += separator + ribuan.join(".");
        }
        rupiah_jumlah_biaya = split[1] != undefined ? rupiah_jumlah_biaya + "," + split[1] : rupiah_jumlah_biaya;
        return prefix == undefined ? rupiah_jumlah_biaya : rupiah_jumlah_biaya ? "Rp. " + rupiah_jumlah_biaya : "";
        }

        

                        var rupiahharga = document.getElementById("aktifitas_harga");
                        rupiahharga.addEventListener("keyup", function(e) {
                        rupiahharga.value = formatRupiahharga(this.value, "Rp. ");
                        });
                        function formatRupiahharga(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga += separator + ribuan.join(".");
                        }
                        rupiahharga = split[1] != undefined ? rupiahharga + "," + split[1] : rupiahharga;
                        return prefix == undefined ? rupiahharga : rupiahharga ? "Rp. " + rupiahharga : "";
                        }

                       var rupiahharga1 = document.getElementById("POP_UP_TABLE_harga");
                        rupiahharga1.addEventListener("keyup", function(e) {
                        rupiahharga1.value = formatRupiahharga1(this.value, "Rp. ");
                        });
                        function formatRupiahharga1(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga1 = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga1 += separator + ribuan.join(".");
                        }
                        rupiahharga1 = split[1] != undefined ? rupiahharga1 + "," + split[1] : rupiahharga1;
                        return prefix == undefined ? rupiahharga1 : rupiahharga1 ? "Rp. " + rupiahharga1 : "";
                        }

                         var rupiahharga2 = document.getElementById("standuk_harga");
                        rupiahharga2.addEventListener("keyup", function(e) {
                        rupiahharga2.value = formatRupiahharga2(this.value, "Rp. ");
                        });
                        function formatRupiahharga2(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga2 = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga2 += separator + ribuan.join(".");
                        }
                        rupiahharga2 = split[1] != undefined ? rupiahharga2 + "," + split[1] : rupiahharga2;
                        return prefix == undefined ? rupiahharga2 : rupiahharga2 ? "Rp. " + rupiahharga2 : "";
                        }


                         var rupiahharga3 = document.getElementById("Penempatan_Poster_harga");
                        rupiahharga3.addEventListener("keyup", function(e) {
                        rupiahharga3.value = formatRupiahharga3(this.value, "Rp. ");
                        });
                        function formatRupiahharga3(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga3 = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga3 += separator + ribuan.join(".");
                        }
                        rupiahharga3 = split[1] != undefined ? rupiahharga3 + "," + split[1] : rupiahharga3;
                        return prefix == undefined ? rupiahharga3 : rupiahharga3 ? "Rp. " + rupiahharga3 : "";
                        }

                        var rupiahharga4 = document.getElementById("sticker_harga");
                        rupiahharga4.addEventListener("keyup", function(e) {
                        rupiahharga4.value = formatRupiahharga4(this.value, "Rp. ");
                        });
                        function formatRupiahharga4(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga4 = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga4 += separator + ribuan.join(".");
                        }
                        rupiahharga4 = split[1] != undefined ? rupiahharga4 + "," + split[1] : rupiahharga4;
                        return prefix == undefined ? rupiahharga4 : rupiahharga4 ? "Rp. " + rupiahharga4 : "";
                        }

                        var rupiahharga5 = document.getElementById("roll_up_harga");
                        rupiahharga5.addEventListener("keyup", function(e) {
                        rupiahharga5.value = formatRupiahharga5(this.value, "Rp. ");
                        });
                        function formatRupiahharga5(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga5 = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga5 += separator + ribuan.join(".");
                        }
                        rupiahharga5 = split[1] != undefined ? rupiahharga5 + "," + split[1] : rupiahharga5;
                        return prefix == undefined ? rupiahharga5 : rupiahharga5 ? "Rp. " + rupiahharga5 : "";
                        }


                        var rupiahharga6 = document.getElementById("acrilic_harga");
                        rupiahharga6.addEventListener("keyup", function(e) {
                        rupiahharga6.value = formatRupiahharga6(this.value, "Rp. ");
                        });
                        function formatRupiahharga6(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiahharga6 = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiahharga6 += separator + ribuan.join(".");
                        }
                        rupiahharga6 = split[1] != undefined ? rupiahharga6 + "," + split[1] : rupiahharga6;
                        return prefix == undefined ? rupiahharga6 : rupiahharga6 ? "Rp. " + rupiahharga6 : "";
                        }

                      var rupiah7 = document.getElementById("perapihan_biaya");
                            rupiah7.addEventListener("keyup", function(e) {
                            rupiah7.value = formatRupiah7(this.value, "Rp. ");
                            });
                            function formatRupiah7(angka, prefix) {
                            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                            split = number_string.split(","),
                            sisa = split[0].length % 3,
                            rupiah7 = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                            if (ribuan) {
                            separator = sisa ? "." : "";
                            rupiah7 += separator + ribuan.join(".");
                            }
                            rupiah7 = split[1] != undefined ? rupiah7 + "," + split[1] : rupiah7;
                            return prefix == undefined ? rupiah7 : rupiah7 ? "Rp. " + rupiah7 : "";
                            }


</script>
<script>
  var rupiah1 = document.getElementById("RENTAL_BASE");
  rupiah1.addEventListener("keyup", function(e) {
  rupiah1.value = formatRupiah1(this.value, "Rp. ");
  });
  function formatRupiah1(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
  split = number_string.split(","),
  sisa = split[0].length % 3,
  rupiah1 = split[0].substr(0, sisa),
  ribuan1 = split[0].substr(sisa).match(/\d{3}/gi);
  if (ribuan1) {
  separator = sisa ? "." : "";
  rupiah1 += separator + ribuan1.join(".");
  }
  rupiah1 = split[1] != undefined ? rupiah1 + "," + split[1] : rupiah1;
  return prefix == undefined ? rupiah1 : rupiah1 ? "Rp. " + rupiah1 : "";
  }
</script>
<script>
  $(function() {

    
    var table = $('#users-table').removeAttr('width').DataTable({
        scrollX: true,
        fixedColumns: true,
        "lengthChange": false,
        "order": [[ 5, "desc" ]]
    });

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        } );
        } ).draw();
    
    $('#users-table tbody ').on('click', "tr", function() {
   $('.building_name ').on('click', function() {
    window.localStorage.setItem('progres', "NOT");
    })
        var data = table.row(this).data();
        console.log(data);
        window.localStorage.setItem('id_fase', data[0]);

        
        if (window.localStorage.getItem('progres') == "VIEW") {
          console.log("123132123");
          
          }
        if (window.localStorage.getItem('progres') != "VIEW") {
        window.localStorage.setItem('progres', data[2]);
        console.log("123132123");
        
        }
        // console.log(window.localStorage.getItem('progres'));
                
        if (window.localStorage.getItem('progres') == "DESK SURVEY" ) {
        $("#DESKSURVEY_TITLE").text("DESK SURVEY");
            $('#id_DESK').val(data[0]);
            var id = $("#id_DESK").val();
            console.log(id);
            $.ajax({
                type: "GET",
                url: '/apireport/' + id,
                success: function(data) {
                    console.log(data);
                    $("#Edit_REPORT_DESK_SURVEY").addClass("muncul")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")

                    $('#COLOR_MAP_ONLINE').val(data.COLOR_MAP_ONLINE); 
                    $('#ADDRESS').val(data.ADDRESS);
                    // $('#launch_data_edit').val(data.LAUNCH_DATE);
                    
                   window.localStorage.setItem('PROPERTY_TYPE', data.PROPERTY_TYPE);
                    // console.log();
                    var data_2 =data.PROVINCE
                  console.log(data_2.match(/^-{0,1}\d+$/));
                  
                    if (data_2.match(/^-{0,1}\d+$/)) {
                    $.ajax({
                           type: "GET",
                            url:'/cek/provinsi/'+data.PROVINCE,
                            success: function(data_1) {
                             $('#PROVINCE').val(data_1.name);    
                             console.log(data_1.name);
                            }
                         })

                      $.ajax({
                           type: "GET",
                            url:'/cek/CekKota/'+data.CITY,
                            success: function(data_1) {
                             $('#CITY').val(data_1.name);    
                             console.log(data_1.name);
                            }
                         })

                        $.ajax({
                           type: "GET",
                            url:'/cek/CekWilayah/'+data.SUBDISTRICT,
                            success: function(data_1) {
                            $('#SUBDISTRICT').val(data_1.name);
                             console.log(data_1.name);
                            }
                         })
                    }else{

                      $('#PROVINCE').val(data.PROVINCE);
                        $('#CITY').val(data.CITY);
                        $('#SUBDISTRICT').val(data.SUBDISTRICT);
                
                    }        
                       $("#status_bagunan").show();
                        $("#harga_sewa_text_UPDATE").hide();
                        $("#harga_sewa_input_update").hide();
                        
                        if (data.PROPERTY_TYPE == "Office Building") {
                        $("#UDER_DEVELOPER_UPDATE").hide();
                        $("#NOT_DEVELOPER_UPDATE").hide();
                        $("#Clustering_UPDATE").hide();
                        $("#Open_Area_UPDATE").hide();
                        $("#STRATA_TITLE_UPDATE").hide();
                        $("#SERVICE_APARTMENT_new").hide();
                        $("#status_bagunan").show();
                        
                        
                        $("#harga_sewa_text_UPDATE").show();
                        $("#harga_sewa_input_update").show();
                        $("#SERVICE_APARTMENT_UPDATE").hide();
                        console.log(data.PROPERTY_TYPE);
                        
                        
                        }
                        if (data.PROPERTY_TYPE == "Pergudangan") {
                        $("#UDER_DEVELOPER_UPDATE").hide();
                        $("#NOT_DEVELOPER_UPDATE").hide();
                        $("#Clustering_UPDATE").hide();
                        $("#Open_Area_UPDATE").hide();
                        $("#STRATA_TITLE_UPDATE").hide();
                        $("#SERVICE_APARTMENT_new").hide();
                        $("#status_bagunan").show();
                        
                        
                        $("#harga_sewa_text_UPDATE").show();
                        $("#harga_sewa_input_update").show();
                        $("#SERVICE_APARTMENT_UPDATE").hide();
                        console.log(data.PROPERTY_TYPE);
                        
                        
                        }
                        if(data.PROPERTY_TYPE == "Apartemen"){
                        // localStorage.setItem("PROPERTY_TYPE", "Apartemen");
                        $("#status_bagunan").show();
                        $("#harga_sewa_text").hide();
                        $("#harga_sewa").hide();
                        $("#UDER_DEVELOPER_UPDATE").hide();
                        $("#NOT_DEVELOPER_UPDATE").hide();
                        $("#Clustering_UPDATE").hide();
                        $("#Open_Area_UPDATE").hide();
                        $("#STRATA_TITLE_UPDATE").hide();
                        $("#SERVICE_APARTMENT_new").hide();
                        $("#SERVICE_APARTMENT_UPDATE").show();
                        
                        }
                        if (data.PROPERTY_TYPE == "Landed House") {
                        // localStorage.setItem("PROPERTY_TYPE", "Landed House");
                        $("#harga_sewa_text").hide();
                        $("#harga_sewa").hide();
                        $("#STRATA_TITLE_UPDATE").hide();
                        $("#SERVICE_APARTMENT_new").hide();
                        $("#UDER_DEVELOPER_UPDATE").show();
                        $("#NOT_DEVELOPER_UPDATE").show();
                        $("#Clustering_UPDATE").show();
                        $("#Open_Area_UPDATE").show();
                        
                        
                        
                        
                        
                        }if (data.PROPERTY_TYPE == "Ruko/Rukan") {
                        // localStorage.setItem("PROPERTY_TYPE", "Ruko/Rukan");
                        $("#harga_sewa_text").hide();
                        $("#STRATA_TITLE_UPDATE").hide();
                        $("#harga_sewa").hide();
                        
                        $("#UDER_DEVELOPER_UPDATE").hide();
                        $("#NOT_DEVELOPER_UPDATE").hide();
                        $("#Clustering_UPDATE").show();
                        $("#Open_Area_UPDATE").show();
                        
                        }

                    
                    $("#launch_data_edit").val(data.LAUNCH_DATE)
                    $("#harga_sewa_update").val(data.Harga_Sewa)
                    $("#PROPERTY_TYPE").val(data.PROPERTY_TYPE)
                    
                    console.log(data.Harga_Sewa);
                    
                    
                    var status_bagunan = data.STATUS_BAGUNAN;
                    console.log(status_bagunan);
                    if (status_bagunan != null) {
                      
                    
                   if (status_bagunan.match(/STRATA_TITLE/) == "STRATA_TITLE") {
                    $('#STRATA_TITLE').prop('checked', true);
                    console.log("STRATA_TITLE");
                    }
                    if (status_bagunan.match(/SERVICE_APARTMENT/) == "SERVICE_APARTMENT") {
                    $('#SERVICE_APARTMENT').prop('checked', true);
                    console.log("SERVICE_APARTMENT");                    
                    }
                    if (status_bagunan.match(/Existing/)=="Existing") {
                    $('#Existing').prop('checked', true);
                    console.log("Existing_data");                    
                    }
                    if (status_bagunan.match(/On_Progres/)=="On_Progres") {
                    console.log("On_Progres");                    
                    $('#On_Progres').prop('checked', true);
                    }
                    if (status_bagunan.match(/Open_Area/)=="Open_Area") {
                    console.log("Open_Area");
                    $('#Open_Area').prop('checked', true);
                    }
                    if (status_bagunan.match(/Clustering/)=="Clustering") {
                    console.log("Clustering");
                    $('#Clustering').prop('checked', true);
                    }
                    if (status_bagunan.match(/STRATA_TITLE/)=="STRATA_TITLE") {
                    console.log("STRATA_TITLE");
                    $('#STRATA_TITLE').prop('checked', true);
                    }
                    if (status_bagunan.match(/UDER_DEVELOPER/)=="UDER_DEVELOPER") {
                    console.log("UDER_DEVELOPER");
                    $('#UDER_DEVELOPER').prop('checked', true);
                    }
                    if (status_bagunan.match(/NOT_DEVELOPER/)=="NOT_DEVELOPER") {
                    console.log("NOT_DEVELOPER");
                    $('#NOT_DEVELOPER').prop('checked', true);
                    }
                    if (status_bagunan.match(/SERVICE_APARTMENT/)=="SERVICE_APARTMENT") {
                    console.log("SERVICE_APARTMENT");
                    $('#SERVICE_APARTMENT').prop('checked', true);
                    }
                }                
         
                 
                    
                    $('#UPDATE_PROGRESS_DESK').val(data.UPDATE_PROGRESS);
                    $('#PROPERTY_TYPE').val(data.PROPERTY_TYPE);
                    $('#COORDINATE').val(data.COORDINATE);
                    $('#PROPERTYTYPE').val(data.PROPERTYTYPE);
                    $('#DESKSURVEY').modal('show');
                }
            });
        }


        if (window.localStorage.getItem('progres') == "NEGOTIATION 1 - BUSINESS SCHEME" ) {
                $("#DESKSURVEY_TITLE").text(" NEGOTIATION 1 - BUSINESS SCHEME");
                $('#id_NEGOTIATION').val(data[0]);
                var id = $("#id_NEGOTIATION").val();
                console.log(id);
                $.ajax({
                type: "GET",
                url: '/apireport/' + id,
                success: function(data) {
                console.log(data);
                $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                $("#Edit_NEGOTIATION_1").removeClass("ilang")
                $("#Edit_NEGOTIATION_1").addClass("muncul")

                $('#REVENUE_SHARE').val(data.REVENUE_SHARE);
                $('#RENTAL_BASE').val(data.RENTAL_BASE);
                $('#ONE_TIME_FEE').val(data.ONE_TIME_FEE);
                $('#FREE_WIFI').val(data.FREE_WIFI);
                $('#UPDATE_PROGRESS_NEGOTION_1').val(data.UPDATE_PROGRESS);

              if (data.FREE_SERVICES != null ) {

                  var service = data.FREE_SERVICES
                  var FREE_SERVICES = service.split(" ");
                  var FREE_SERVICES_ALACARTE = service.split(".");
                  console.log(FREE_SERVICES_ALACARTE);

                  var service_1 = data.FREE_SERVICES_1
                  var FREE_SERVICES_1 = service_1.split(" ");
                  var FREE_SERVICES_ALACARTE_1 = service_1.split(".");
                  console.log(FREE_SERVICES_1);
                    console.log(FREE_SERVICES[3]+" "+FREE_SERVICES[4]);
                    

                $('#FREE_SERVICE_1').val(FREE_SERVICES[0]);
                $('#FREE_SERVICE_2').val(FREE_SERVICES[3]+" "+FREE_SERVICES[4]);

                $('#FREE_SERVICE_5').val(FREE_SERVICES_1[0]);
                $('#FREE_SERVICE_6').val(FREE_SERVICES[3]+" "+FREE_SERVICES[4]);
               
  
          
                $('#FREE_SERVICE_7').val("Family Pack");
                $('#FREE_SERVICE_8').val(FREE_SERVICES_ALACARTE_1[1]);

                $('#FREE_SERVICE_3').val("Family Pack");
                $('#FREE_SERVICE_4').val(FREE_SERVICES_ALACARTE[1]);
                

                } 


                
                



                
                // $('#FREE_SERVICE_5').val(FREE_SERVICES_1[0]);
                //   $('#FREE_SERVICE_6').val(FREE_SERVICES_1[3]);
                
                $('#DESKSURVEY').modal('show');
                }
                });
                }


if (window.localStorage.getItem('progres') == "BOQ, SITE SURVEY REPORT, DESIGN" ) {
        $("#DESKSURVEY_TITLE").text("BOQ, SITE SURVEY REPORT, DESIGN");
        $('#id_BOQ').val(data[0]);
        $('#id_BOQ_UPLOAD').val(data[0])
        $("#id_BOQ_PDF_SITE_SURVEY").val(data[0]);
                // $("#id_BOQ").val(id_proposal);
        
        var id = $("#id_BOQ").val();
        console.log("id nya adalah id_BOQ "+id);
        $.ajax({
        type: "GET",
        url: '/apireport/' + id,
        success: function(data) {
        console.log(data);
                $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                $("#Edit_NEGOTIATION_1").addClass("ilang")
                $("#Edit_NEGOTIATION_1").removeClass("muncul")
                $("#Edit_SITE_SURVEY").removeClass("muncul")
                $("#Edit_SITE_SURVEY").addClass("ilang")
                $("#Edit_BOQ").removeClass("ilang")
                $("#Edit_BOQ").addClass("muncul")
        
        
        $('#BOQ_DATE').val(data.BOQ_RECEIVED_DATE);
        $('#UPDATE_PROGRESS_BOQ').val(data.UPDATE_PROGRESS);
        $('#DESKSURVEY').modal('show');
        }
        });
        }


                if (window.localStorage.getItem('progres') == "PnL PROGRESS" ) {
                $("#DESKSURVEY_TITLE").text("PnL PROGRESS");
                $('#id_PNL').val(data[0]);
                $("#id_PNL_PDF").val(data[0])
                $("#id_Draft_PNL_PDF").val(data[0])
                var id = $("#id_PNL").val();
                console.log("id nya adalah id_PNL "+id);
                $.ajax({
                type: "GET",
                url: '/apireport/' + id,
                success: function(data) {
                console.log(data);
                $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                $("#Edit_NEGOTIATION_1").addClass("ilang")
                $("#Edit_NEGOTIATION_1").removeClass("muncul")
                $("#Edit_SITE_SURVEY").removeClass("muncul")
                $("#Edit_SITE_SURVEY").addClass("ilang")
                $("#Edit_BOQ").removeClass("muncul")
                $("#Edit_BOQ").addClass("ilang")
                $("#Edit_PNL").removeClass("ilang")
                $("#Edit_PNL").addClass("muncul")


                $('#PNL_DATE').val(data.PNL_FULL_SIGN_DATE);
                $('#UPDATE_PROGRESS_PNL').val(data.UPDATE_PROGRESS);
                $('#DESKSURVEY').modal('show');
                }
                });
                }



        if (window.localStorage.getItem('progres') == "SITE SURVEY" ) {
        $("#DESKSURVEY_TITLE").text("SITE SURVEY");
        $('#id_SITE_SURVEY').val(data[0]);
        $('#id_SITE_SURVEY_PDF').val(data[0]);
        $('#id_FIRST_WO_PDF').val(data[0]);
        
        var id = $("#id_SITE_SURVEY").val();
        console.log("id nya adalah id_SITE_SURVEY "+id);
        $.ajax({
        type: "GET",
        url: '/apireport/' + id,
        success: function(data) {
        console.log(data);
                $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                $("#Edit_NEGOTIATION_1").addClass("ilang")
                $("#Edit_NEGOTIATION_1").removeClass("muncul")
                $("#Edit_SITE_SURVEY").removeClass("ilang")
                $("#Edit_SITE_SURVEY").addClass("muncul")
        
        $('#SALES_SIGNED').val(data.SALES_SIGNED);
        $('#GM_SALES_SIGNED').val(data.GM_SALES_SIGNED);
        $('#SITE_SURVEY_DATE').val(data.SITE_SURVEY_DATE);
        $('#UPDATE_PROGRESS_SITE_SURVEY').val(data.UPDATE_PROGRESS);
        $('#RECOMENDATION').val(data.RECOMMENDATION);
        $('#WO_DATE_SITE_SURVEY').val(data.WO_DATE_SITE_SURVEY);
        $('#DESKSURVEY').modal('show');
        
        }
        });
        }



        if (window.localStorage.getItem('progres') == "NEGOTIATION 2 - PKS REVIEW" ) {
                $("#DESKSURVEY_TITLE").text("NEGOTIATION 2 - PKS REVIEW");
                $('#id_PKS_REVIEW').val(data[0]);
                var id = $("#id_PKS_REVIEW").val();
                console.log("id nya adalah id_PNL "+id);
                $.ajax({
                type: "GET",
                url: '/apireport/' + id,
                success: function(data) {
                console.log(data);

                     $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                     $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                    $("#Edit_NEGOTIATION_1").addClass("ilang")
                    $("#Edit_NEGOTIATION_1").removeClass("muncul")
                    $("#Edit_SITE_SURVEY").addClass("ilang")
                    $("#Edit_SITE_SURVEY").removeClass("muncul")
                    $("#Edit_BOQ").addClass("ilang")
                    $("#Edit_BOQ").removeClass("muncul")
                    $("#Edit_PNL").addClass("ilang")
                    $("#Edit_PNL").removeClass("muncul")
                    $("#Edit_PKS_REVIEW").removeClass("ilang")
                    $("#Edit_PKS_REVIEW").addClass("muncul")



                $('#pks_review_date').val(data.PKS_REVIEW_DATE);
                $('#UPDATE_PROGRESS_PKS_REVIEW').val(data.UPDATE_PROGRESS);
                $('#DESKSURVEY').modal('show');
                
                }
                });
                }


                    $('#indonesia').keyup(function() {
                        var indonesia = Number($('#indonesia').val());
                        var expatriat = Number($("#Expatriat").val());
                         var hasil = 100 - indonesia;
                        $("#Expatriat").val(hasil)
                        console.log(indonesia + expatriat);
                    });

                    $('#Expatriat').keyup(function() {

                        var indonesia = Number($('#indonesia').val());
                        var expatriat = Number($("#Expatriat").val());
                     var hasil = 100 - expatriat;
                      $("#indonesia").val(hasil)
                        console.log(indonesia + expatriat);
                    
                    });



                       $('#mahasiswa').keyup(function() {
                        var mahasiswa = Number($('#mahasiswa').val());
                        var karyawan = Number($("#karyawan").val());
                        var pengusaha = Number($("#pengusaha").val());
                        var hasil = 100 - karyawan - mahasiswa
                        $("#pengusaha").val(hasil)
                    
                    }); 


                       $('#karyawan').keyup(function() {
                        var mahasiswa = Number($('#mahasiswa').val());
                        var karyawan = Number($("#karyawan").val());
                        var pengusaha = Number($("#pengusaha").val());

                        var hasil = 100 - karyawan - mahasiswa
                        $("#pengusaha").val(hasil)

                        console.log(mahasiswa + karyawan + pengusaha);
                    
                    }); 


                       $('#pengusaha').keyup(function() {
                        var mahasiswa = Number($('#mahasiswa').val());
                        var karyawan = Number($("#karyawan").val());
                        var pengusaha = Number($("#pengusaha").val());

                          var hasil = 100 - pengusaha - mahasiswa
                        $("#karyawan").val(hasil) 
                        console.log("data = " +mahasiswa + karyawan + pengusaha);
                    
                    }); 


            

           

if (window.localStorage.getItem('progres') == "SIGNED PKS" ) {
        $("#DESKSURVEY_TITLE").text("SIGNED PKS");
        $('#id_PKS_SIGN').val(data[0]);
        $('#id_tac_pdf').val(data[0]);
        $('#id_iom_pdf').val(data[0]);

        var id = $("#id_PKS_SIGN").val();
        console.log("id nya adalah id_PKS_SIGN "+id);
        $.ajax({
        type: "GET",
        url: '/apireport/' + id,
        success: function(data) {
        console.log(data);
        
            $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
            $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
            $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
            $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
            $("#Edit_NEGOTIATION_1").addClass("ilang")
            $("#Edit_NEGOTIATION_1").removeClass("muncul")
            $("#Edit_SITE_SURVEY").addClass("ilang")
            $("#Edit_SITE_SURVEY").removeClass("muncul")
            $("#Edit_BOQ").addClass("ilang")
            $("#Edit_BOQ").removeClass("muncul")
            $("#Edit_PNL").addClass("ilang")
            $("#Edit_PNL").removeClass("muncul")
            $("#Edit_PKS_REVIEW").addClass("ilang")
            $("#Edit_PKS_REVIEW").removeClass("muncul")
            $("#Edit_PKS_SIGN").removeClass("ilang")
            $("#Edit_PKS_SIGN").addClass("muncul")
        
             $('#PKS_DATE').val(data.PKS_DATE);
             $('#UPDATE_PROGRESS_PKS_SIGN').val(data.UPDATE_PROGRESS);
        $('#Deal_Year').val(data.DEAL_YEAR);
        $('#No_PKS').val(data.NO_PKS);
        
        
        $('#DESKSURVEY').modal('show');
        
        }
        });
        }


        if (window.localStorage.getItem('progres') == "ROLL-OUT PROGRESS" ) {
                $("#DESKSURVEY_TITLE").text("ROLL-OUT PROGRESS");
                $('#id_ROLL').val(data[0]);
                $('#id_WO_PDF').val(data[0]);
                
                var id = $("#id_ROLL").val();
                console.log("id nya adalah id 8 "+id);
                $.ajax({
                type: "GET",
                url: '/apireport/' + id,
                success: function(data) {
                console.log(data);
                $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
                $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
                $("#Edit_NEGOTIATION_1").addClass("ilang")
                $("#Edit_NEGOTIATION_1").removeClass("muncul")
                $("#Edit_SITE_SURVEY").addClass("ilang")
                $("#Edit_SITE_SURVEY").removeClass("muncul")
                $("#Edit_BOQ").addClass("ilang")
                $("#Edit_BOQ").removeClass("muncul")
                $("#Edit_PNL").addClass("ilang")
                $("#Edit_PNL").removeClass("muncul")
                $("#Edit_PKS_REVIEW").addClass("ilang")
                $("#Edit_PKS_REVIEW").removeClass("muncul")
                $("#Edit_PKS_SIGN").addClass("ilang")
                $("#Edit_PKS_SIGN").removeClass("muncul")
                $("#Edit_ROLL").removeClass("ilang")
                $("#Edit_ROLL").addClass("muncul")

$('#UPDATE_PROGRESS_ROLL').val(data.UPDATE_PROGRESS);
                $('#wo_date').val(data.WO_DATE);
                $('#DESKSURVEY').modal('show');
                
                }
                });
                }


       if (window.localStorage.getItem('progres') == "READY TO SELL" ) {
              $("#DESKSURVEY_TITLE").text("READY TO SELL");
              // id_READY
              $('#id_READY').val(data[0]);
              $('#id_PKS_PDF').val(data[0]);
              
              var id = $("#id_READY").val();
              console.log("id nya adalah id 8 "+id);
              $.ajax({
              type: "GET",
              url: '/apireport/' + id,
              success: function(data) {
              console.log(data);
              $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
              $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
              $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
              $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
              $("#Edit_NEGOTIATION_1").addClass("ilang")
              $("#Edit_NEGOTIATION_1").removeClass("muncul")
              $("#Edit_SITE_SURVEY").addClass("ilang")
              $("#Edit_SITE_SURVEY").removeClass("muncul")
              $("#Edit_BOQ").addClass("ilang")
              $("#Edit_BOQ").removeClass("muncul")
              $("#Edit_PNL").addClass("ilang")
              $("#Edit_PNL").removeClass("muncul")
              $("#Edit_PKS_REVIEW").addClass("ilang")
              $("#Edit_PKS_REVIEW").removeClass("muncul")
              $("#Edit_PKS_SIGN").addClass("ilang")
              $("#Edit_PKS_SIGN").removeClass("muncul")
              $("#Edit_ROLL").removeClass("ilang")
              $("#Edit_ROLL").addClass("muncul")
              $("#Edit_ROLL").removeClass("muncul")
              $("#Edit_ROLL").addClass("ilang")
              $("#Edit_READY").removeClass("ilang")
              $("#Edit_READY").addClass("muncul")
              
              $('#baso_date').val(data.BASO_DATE);
              $('#pks_end').val(data.PKS_END);
              $('#duration').val(data.CONTRACT_DURATION);
              $('#UPDATE_PROGRESS_READY').val(data.UPDATE_PROGRESS);
              $('#hp_port').val(data.HP_PORT);
              $('#BASO').val(data.BASOORBAST_No);
              $('#DESKSURVEY').modal('show');
              
              }
              });
              }



              if (window.localStorage.getItem('progres') == "REJECT" ) {
              $("#DESKSURVEY_TITLE").text("REJECT");
              $('#id_REJECT').val(data[0]);
               $('#id_proposal_pdf_reject').val(data[0]);
              var id = $("#id_REJECT").val();
              console.log("id nya adalah id 8 "+id);
              $.ajax({
              type: "GET",
              url: '/apireport/' + id,
              success: function(data) {
              console.log(data);
              $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
              $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
              $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
              $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
              $("#Edit_NEGOTIATION_1").addClass("ilang")
              $("#Edit_NEGOTIATION_1").removeClass("muncul")
              $("#Edit_SITE_SURVEY").addClass("ilang")
              $("#Edit_SITE_SURVEY").removeClass("muncul")
              $("#Edit_BOQ").addClass("ilang")
              $("#Edit_BOQ").removeClass("muncul")
              $("#Edit_PNL").addClass("ilang")
              $("#Edit_PNL").removeClass("muncul")
              $("#Edit_PKS_REVIEW").addClass("ilang")
              $("#Edit_PKS_REVIEW").removeClass("muncul")
              $("#Edit_PKS_SIGN").addClass("ilang")
              $("#Edit_PKS_SIGN").removeClass("muncul")
              $("#Edit_ROLL").removeClass("ilang")
              $("#Edit_ROLL").addClass("muncul")
              $("#Edit_ROLL").removeClass("muncul")
              $("#Edit_ROLL").addClass("ilang")
              $("#Edit_READY").removeClass("muncul")
              $("#Edit_READY").addClass("ilang")
              $("#Edit_REJECT").removeClass("ilang")
               $("#Edit_REJECT").addClass("muncul")
              
              $('#reject_date').val(data.REJECT_DATE);
              $('#UPDATE_PROGRESS_REJECT').val(data.UPDATE_PROGRESS);
              $('#Reject_Code').val(data.REJECT_CODE);
              $('#DESKSURVEY').modal('show');
              
              }
              });
              }




        if (window.localStorage.getItem('progres') == "SUBMIT PROPOSAL") {
        $("#error_kewarganegaraan").hide();
        $("#error_pekerjaan").hide()
        $("#error_status_penghuni").hide()
        
        $("#DESKSURVEY_TITLE" ).text("SUBMIT PROPOSAL");
            $('#id_proposal').val(data[0]);
            $('#id_proposal_pdf').val(data[0]);
            
            var id = $("#id_proposal").val();
            console.log(id);
            $.ajax({
                type: "GET",
                url: '/apireport/' + id,
                success: function(data) {
                  console.log(data);
                  
              window.localStorage.setItem('PROPERTY_TYPE', data["PROPERTY_TYPE"]);


                    // $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    // $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    // $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    // $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                    
                    $("#thn").val(data.exclusivet_tahun);
                    $('input[name="DEVELOPERORCOMPANY_NAME"]').val(data.DEVELOPERORCOMPANY_NAME);
                    $('input[name="NAME"]').val(data.NAME);
                    $('input[name="PHONEORMOBILE"]').val(data.PHONEORMOBILE);
                    $('input[name="BUSDEV_SIGNED"]').val(data.BUSDEV_SIGNED);
                    $('input[name="BM_SIGNED"]').val(data.BM_SIGNED);
                    $('input[name="UPDATE_PROGRESS"]').val(data.UPDATE_PROGRESS);          
                    $('input[name="SUBMIT_PROPOSAL_DATE"]').val(data.SUBMIT_PROPOSAL_DATE);
                    $('input[name="EMAIL"]').val(data.EMAIL);
                    $('input[name="TOTAL_OCCUPANCY"]').val(data.TOTAL_OCCUPANCY);
                    $('textarea[name="ISP_EXISTING"]').val(data.ISP_EXISTING);
                    $('input[name="TOTAL_UNIT"]').val(data.TOTAL_UNIT);
                    $('input[name="MOBILEPHONE"]').val(data.MOBILEPHONE);
                    $('input[name="terendah"]').val(data.HARGA_UNIT_TERENDAH);
                    $('input[name="tertingi"]').val(data.HARGA_UNIT_TERTINGGI);
                    
                    
                     if (data.Jumlah_Lantai != null) {
                      var Jumlah_Lantai = data.Jumlah_Lantai;
                      Jumlah_Lantai = Jumlah_Lantai.split(",");
                      console.log(Jumlah_Lantai);
                      $('input[name="jumlah_lantai_1"]').val(Jumlah_Lantai[0]);
                      $('input[name="jumlah_lantai_2"]').val(Jumlah_Lantai[1]);
                      $('input[name="jumlah_lantai_3"]').val(Jumlah_Lantai[2]);
                      $('input[name="jumlah_lantai_4"]').val(Jumlah_Lantai[3]);
                      $('input[name="jumlah_lantai_5"]').val(Jumlah_Lantai[4]);
                      $('input[name="jumlah_lantai_6"]').val(Jumlah_Lantai[5]);
                      $('input[name="jumlah_lantai_7"]').val(Jumlah_Lantai[6]);
                      $('input[name="jumlah_lantai_8"]').val(Jumlah_Lantai[7]);
                      $('input[name="jumlah_lantai_9"]').val(Jumlah_Lantai[8]);
                      $('input[name="jumlah_lantai_10"]').val(Jumlah_Lantai[9]);
                      $('input[name="jumlah_lantai_total"]').val(Jumlah_Lantai[10]);
                     }
                     if (data.Jumlah_unit != null) {
                       
                      var Jumlah_unit = data.Jumlah_unit;
                      Jumlah_unit = Jumlah_unit.split(",");
                      console.log(Jumlah_unit);
                      $('input[name="jumlah_unit_1"]').val(Jumlah_unit[0]);
                      $('input[name="jumlah_unit_2"]').val(Jumlah_unit[1]);
                      $('input[name="jumlah_unit_3"]').val(Jumlah_unit[2]);
                      $('input[name="jumlah_unit_4"]').val(Jumlah_unit[3]);
                      $('input[name="jumlah_unit_5"]').val(Jumlah_unit[4]);
                      $('input[name="jumlah_unit_6"]').val(Jumlah_unit[5]);
                      $('input[name="jumlah_unit_7"]').val(Jumlah_unit[6]);
                      $('input[name="jumlah_unit_8"]').val(Jumlah_unit[7]);
                      $('input[name="jumlah_unit_9"]').val(Jumlah_unit[8]);
                      $('input[name="jumlah_unit_10"]').val(Jumlah_unit[9]);
                      $('input[name="jumlah_unit_total"]').val(Jumlah_unit[10]);
                      } 
                      if (data.Jumlah_Yang_di_huni != null) {
                        
                        var Jumlah_Yang_di_huni = data.Jumlah_Yang_di_huni;
                      Jumlah_Yang_di_huni = Jumlah_Yang_di_huni.split(",");
                      console.log(Jumlah_Yang_di_huni);
                      $('input[name="jumlah_yang_dihuni_1"]').val(Jumlah_Yang_di_huni[0]);
                      $('input[name="jumlah_yang_dihuni_2"]').val(Jumlah_Yang_di_huni[1]);
                      $('input[name="jumlah_yang_dihuni_3"]').val(Jumlah_Yang_di_huni[2]);
                      $('input[name="jumlah_yang_dihuni_4"]').val(Jumlah_Yang_di_huni[3]);
                      $('input[name="jumlah_yang_dihuni_5"]').val(Jumlah_Yang_di_huni[4]);
                      $('input[name="jumlah_yang_dihuni_6"]').val(Jumlah_Yang_di_huni[5]);
                      $('input[name="jumlah_yang_dihuni_7"]').val(Jumlah_Yang_di_huni[6]);
                      $('input[name="jumlah_yang_dihuni_8"]').val(Jumlah_Yang_di_huni[7]);
                      $('input[name="jumlah_yang_dihuni_9"]').val(Jumlah_Yang_di_huni[8]);
                      $('input[name="jumlah_yang_dihuni_10"]').val(Jumlah_Yang_di_huni[9]);
                      $('input[name="jumlah_yang_dihuni_total"]').val(Jumlah_Yang_di_huni[10]);
                      }


                      if (data.Jumlah_Tingkat_Okupansi != null) {
                        
                     var Jumlah_Tingkat_Okupansi = data.Jumlah_Tingkat_Okupansi;
                      Jumlah_Tingkat_Okupansi = Jumlah_Tingkat_Okupansi.split(",");
                      console.log("Jumlah_Tingkat_Okupansi"+Jumlah_Tingkat_Okupansi);
                      $('input[name="jumlah_tingkat_okupansi_area_1"]').val(Jumlah_Tingkat_Okupansi[0]);
                      $('input[name="jumlah_tingkat_okupansi_area_2"]').val(Jumlah_Tingkat_Okupansi[1]);
                      $('input[name="jumlah_tingkat_okupansi_area_3"]').val(Jumlah_Tingkat_Okupansi[2]);
                      $('input[name="jumlah_tingkat_okupansi_area_4"]').val(Jumlah_Tingkat_Okupansi[3]);
                      $('input[name="jumlah_tingkat_okupansi_area_5"]').val(Jumlah_Tingkat_Okupansi[4]);
                      $('input[name="jumlah_tingkat_okupansi_area_6"]').val(Jumlah_Tingkat_Okupansi[5]);
                      $('input[name="jumlah_tingkat_okupansi_area_7"]').val(Jumlah_Tingkat_Okupansi[6]);
                      $('input[name="jumlah_tingkat_okupansi_area_8"]').val(Jumlah_Tingkat_Okupansi[7]);
                      $('input[name="jumlah_tingkat_okupansi_area_9"]').val(Jumlah_Tingkat_Okupansi[8]);
                      $('input[name="jumlah_tingkat_okupansi_area_10"]').val(Jumlah_Tingkat_Okupansi[9]);
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Jumlah_Tingkat_Okupansi[10]);
                        console.log("data = " +Jumlah_Tingkat_Okupansi);
                        
                      }          
                      if (data.Tingkat_Okupansi != null) {
                     var Tingkat_Okupansi = data.Tingkat_Okupansi;
                      Tingkat_Okupansi = Tingkat_Okupansi.split(",");
                      console.log(Tingkat_Okupansi);
                      $('input[name="tingkat_okupansi_1"]').val(Tingkat_Okupansi[0]);
                      $('input[name="tingkat_okupansi_2"]').val(Tingkat_Okupansi[1]);
                      $('input[name="tingkat_okupansi_3"]').val(Tingkat_Okupansi[2]);
                      $('input[name="tingkat_okupansi_4"]').val(Tingkat_Okupansi[3]);
                      $('input[name="tingkat_okupansi_5"]').val(Tingkat_Okupansi[4]);
                      $('input[name="tingkat_okupansi_6"]').val(Tingkat_Okupansi[5]);
                      $('input[name="tingkat_okupansi_7"]').val(Tingkat_Okupansi[6]);
                      $('input[name="tingkat_okupansi_8"]').val(Tingkat_Okupansi[7]);
                      $('input[name="tingkat_okupansi_9"]').val(Tingkat_Okupansi[8]);
                      $('input[name="tingkat_okupansi_10"]').val(Tingkat_Okupansi[9]);
                      $('input[name="tingkat_okupansi_total"]').val(Tingkat_Okupansi[10]);
                }                
                if (data.JUMLAH_AREA_KOMERSIAL_DIHUNI != null) {
                  
                     var JUMLAH_AREA_KOMERSIAL_DIHUNI = data.JUMLAH_AREA_KOMERSIAL_DIHUNI;
                      JUMLAH_AREA_KOMERSIAL_DIHUNI = JUMLAH_AREA_KOMERSIAL_DIHUNI.split(",");
                      console.log(JUMLAH_AREA_KOMERSIAL_DIHUNI);
                      
                      $('input[name="jumlah_area_komersial_dihuni_1"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[0]);
                      $('input[name="jumlah_area_komersial_dihuni_2"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[1]);
                      $('input[name="jumlah_area_komersial_dihuni_3"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[2]);
                      $('input[name="jumlah_area_komersial_dihuni_4"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[3]);
                      $('input[name="jumlah_area_komersial_dihuni_5"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[4]);
                      $('input[name="jumlah_area_komersial_dihuni_6"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[5]);
                      $('input[name="jumlah_area_komersial_dihuni_7"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[6]);
                      $('input[name="jumlah_area_komersial_dihuni_8"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[7]);
                      $('input[name="jumlah_area_komersial_dihuni_9"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[8]);
                      $('input[name="jumlah_area_komersial_dihuni_10"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[9]);
                      $('input[name="jumlah_area_komersial_dihuni_total"]').val(JUMLAH_AREA_KOMERSIAL_DIHUNI[10]);
}
                      if (data.JUMLAH_UNIT_AREA_KOMERSIAL != null) {
                     var JUMLAH_UNIT_AREA_KOMERSIAL = data.JUMLAH_UNIT_AREA_KOMERSIAL;
                      JUMLAH_UNIT_AREA_KOMERSIAL = JUMLAH_UNIT_AREA_KOMERSIAL.split(",");
                      console.log(JUMLAH_UNIT_AREA_KOMERSIAL);
                      $('input[name="jumlah_unit_area_kemerial_1"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[0]);
                      $('input[name="jumlah_unit_area_kemerial_2"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[1]);
                      $('input[name="jumlah_unit_area_kemerial_3"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[2]);
                      $('input[name="jumlah_unit_area_kemerial_4"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[3]);
                      $('input[name="jumlah_unit_area_kemerial_5"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[4]);
                      $('input[name="jumlah_unit_area_kemerial_6"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[5]);
                      $('input[name="jumlah_unit_area_kemerial_7"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[6]);
                      $('input[name="jumlah_unit_area_kemerial_8"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[7]);
                      $('input[name="jumlah_unit_area_kemerial_9"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[8]);
                      $('input[name="jumlah_unit_area_kemerial_10"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[9]);
                      $('input[name="jumlah_unit_area_kemerial_total"]').val(JUMLAH_UNIT_AREA_KOMERSIAL[10]);
}
                      if (data.JUMLAH_KENDARAAN_TERDAFTAR != null) {
                      var JUMLAH_KENDARAAN_TERDAFTAR = data.JUMLAH_KENDARAAN_TERDAFTAR;
                      JUMLAH_KENDARAAN_TERDAFTAR = JUMLAH_KENDARAAN_TERDAFTAR.split(",");
                      console.log(JUMLAH_KENDARAAN_TERDAFTAR);
                      $('input[name="jumlah_kendaraan_terdaftar_1"]').val(JUMLAH_KENDARAAN_TERDAFTAR[0]);
                      $('input[name="jumlah_kendaraan_terdaftar_2"]').val(JUMLAH_KENDARAAN_TERDAFTAR[1]);
                      $('input[name="jumlah_kendaraan_terdaftar_3"]').val(JUMLAH_KENDARAAN_TERDAFTAR[2]);
                      $('input[name="jumlah_kendaraan_terdaftar_4"]').val(JUMLAH_KENDARAAN_TERDAFTAR[3]);
                      $('input[name="jumlah_kendaraan_terdaftar_5"]').val(JUMLAH_KENDARAAN_TERDAFTAR[4]);
                      $('input[name="jumlah_kendaraan_terdaftar_6"]').val(JUMLAH_KENDARAAN_TERDAFTAR[5]);
                      $('input[name="jumlah_kendaraan_terdaftar_7"]').val(JUMLAH_KENDARAAN_TERDAFTAR[6]);
                      $('input[name="jumlah_kendaraan_terdaftar_8"]').val(JUMLAH_KENDARAAN_TERDAFTAR[7]);
                      $('input[name="jumlah_kendaraan_terdaftar_9"]').val(JUMLAH_KENDARAAN_TERDAFTAR[8]);
                      $('input[name="jumlah_kendaraan_terdaftar_10"]').val(JUMLAH_KENDARAAN_TERDAFTAR[9]);
                      $('input[name="jumlah_kendaraan_terdaftar_total"]').val(JUMLAH_KENDARAAN_TERDAFTAR[10]);
                     }


                     $('.jumlah_area_komersial_dihuni').keyup(function() {
                      var jumlah_area_komersial_dihuni_1 = Number($('input[name="jumlah_area_komersial_dihuni_1"]').val());
                      var jumlah_area_komersial_dihuni_2 = Number($('input[name="jumlah_area_komersial_dihuni_2"]').val());
                      var jumlah_area_komersial_dihuni_3 = Number($('input[name="jumlah_area_komersial_dihuni_3"]').val());
                      var jumlah_area_komersial_dihuni_4 = Number($('input[name="jumlah_area_komersial_dihuni_4"]').val());
                      var jumlah_area_komersial_dihuni_5 = Number($('input[name="jumlah_area_komersial_dihuni_5"]').val());
                      var jumlah_area_komersial_dihuni_6 = Number($('input[name="jumlah_area_komersial_dihuni_6"]').val());
                      var jumlah_area_komersial_dihuni_7 = Number($('input[name="jumlah_area_komersial_dihuni_7"]').val());
                      var jumlah_area_komersial_dihuni_8 = Number($('input[name="jumlah_area_komersial_dihuni_8"]').val());
                      var jumlah_area_komersial_dihuni_9 = Number($('input[name="jumlah_area_komersial_dihuni_9"]').val());
                      var jumlah_area_komersial_dihuni_10 = Number($('input[name="jumlah_area_komersial_dihuni_10"]').val());
                      $('input[name="jumlah_area_komersial_dihuni_total"]').val(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8 +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                      console.log(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                      +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                    });



                    $('.jumlah_lantai').keyup(function() {
                      var jumlah_lantai_1 = Number($('input[name="jumlah_lantai_1"]').val());
                      var jumlah_lantai_2 = Number($('input[name="jumlah_lantai_2"]').val());
                      var jumlah_lantai_3 = Number($('input[name="jumlah_lantai_3"]').val());
                      var jumlah_lantai_4 = Number($('input[name="jumlah_lantai_4"]').val());
                      var jumlah_lantai_5 = Number($('input[name="jumlah_lantai_5"]').val());
                      var jumlah_lantai_6 = Number($('input[name="jumlah_lantai_6"]').val());
                      var jumlah_lantai_7 = Number($('input[name="jumlah_lantai_7"]').val());
                      var jumlah_lantai_8 = Number($('input[name="jumlah_lantai_8"]').val());
                      var jumlah_lantai_9 = Number($('input[name="jumlah_lantai_9"]').val());
                      var jumlah_lantai_10 = Number($('input[name="jumlah_lantai_10"]').val());
                      $('input[name="jumlah_lantai_total"]').val(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8 +jumlah_lantai_9+jumlah_lantai_10);
                      console.log(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8
                      +jumlah_lantai_9+jumlah_lantai_10);
                    });



                      $('.jumlah_lantai').keyup(function() {
                      var jumlah_lantai_1 = Number($('input[name="jumlah_lantai_1"]').val());
                      var jumlah_lantai_2 = Number($('input[name="jumlah_lantai_2"]').val());
                      var jumlah_lantai_3 = Number($('input[name="jumlah_lantai_3"]').val());
                      var jumlah_lantai_4 = Number($('input[name="jumlah_lantai_4"]').val());
                      var jumlah_lantai_5 = Number($('input[name="jumlah_lantai_5"]').val());
                      var jumlah_lantai_6 = Number($('input[name="jumlah_lantai_6"]').val());
                      var jumlah_lantai_7 = Number($('input[name="jumlah_lantai_7"]').val());
                      var jumlah_lantai_8 = Number($('input[name="jumlah_lantai_8"]').val());
                      var jumlah_lantai_9 = Number($('input[name="jumlah_lantai_9"]').val());
                      var jumlah_lantai_10 = Number($('input[name="jumlah_lantai_10"]').val());
                      $('input[name="jumlah_lantai_total"]').val(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8 +jumlah_lantai_9+jumlah_lantai_10);
                      console.log(jumlah_lantai_1+jumlah_lantai_2+jumlah_lantai_3+jumlah_lantai_4+jumlah_lantai_5+jumlah_lantai_6+jumlah_lantai_7+jumlah_lantai_8
                      +jumlah_lantai_9+jumlah_lantai_10);
                    });


                      $('.jumlah_unit').keyup(function() {
                      var jumlah_unit_1 = Number($('input[name="jumlah_unit_1"]').val());
                      var jumlah_unit_2 = Number($('input[name="jumlah_unit_2"]').val());
                      var jumlah_unit_3 = Number($('input[name="jumlah_unit_3"]').val());
                      var jumlah_unit_4 = Number($('input[name="jumlah_unit_4"]').val());
                      var jumlah_unit_5 = Number($('input[name="jumlah_unit_5"]').val());
                      var jumlah_unit_6 = Number($('input[name="jumlah_unit_6"]').val());
                      var jumlah_unit_7 = Number($('input[name="jumlah_unit_7"]').val());
                      var jumlah_unit_8 = Number($('input[name="jumlah_unit_8"]').val());
                      var jumlah_unit_9 = Number($('input[name="jumlah_unit_9"]').val());
                      var jumlah_unit_10 = Number($('input[name="jumlah_unit_10"]').val());
                      $('input[name="jumlah_unit_total"]').val(jumlah_unit_1+jumlah_unit_2+jumlah_unit_3+jumlah_unit_4+jumlah_unit_5+jumlah_unit_6+jumlah_unit_7+jumlah_unit_8 +jumlah_unit_9+jumlah_unit_10);
                      console.log(jumlah_unit_1+jumlah_unit_2+jumlah_unit_3+jumlah_unit_4+jumlah_unit_5+jumlah_unit_6+jumlah_unit_7+jumlah_unit_8
                      +jumlah_unit_9+jumlah_unit_10);
                    });


                    $('.jumlah_yang_dihuni').keyup(function() {
                      var jumlah_yang_dihuni_1 = Number($('input[name="jumlah_yang_dihuni_1"]').val());
                      var jumlah_yang_dihuni_2 = Number($('input[name="jumlah_yang_dihuni_2"]').val());
                      var jumlah_yang_dihuni_3 = Number($('input[name="jumlah_yang_dihuni_3"]').val());
                      var jumlah_yang_dihuni_4 = Number($('input[name="jumlah_yang_dihuni_4"]').val());
                      var jumlah_yang_dihuni_5 = Number($('input[name="jumlah_yang_dihuni_5"]').val());
                      var jumlah_yang_dihuni_6 = Number($('input[name="jumlah_yang_dihuni_6"]').val());
                      var jumlah_yang_dihuni_7 = Number($('input[name="jumlah_yang_dihuni_7"]').val());
                      var jumlah_yang_dihuni_8 = Number($('input[name="jumlah_yang_dihuni_8"]').val());
                      var jumlah_yang_dihuni_9 = Number($('input[name="jumlah_yang_dihuni_9"]').val());
                      var jumlah_yang_dihuni_10 = Number($('input[name="jumlah_yang_dihuni_10"]').val());
                      $('input[name="jumlah_yang_dihuni_total"]').val(jumlah_yang_dihuni_1+jumlah_yang_dihuni_2+jumlah_yang_dihuni_3+jumlah_yang_dihuni_4+jumlah_yang_dihuni_5+jumlah_yang_dihuni_6+jumlah_yang_dihuni_7+jumlah_yang_dihuni_8 +jumlah_yang_dihuni_9+jumlah_yang_dihuni_10);
                      console.log(jumlah_yang_dihuni_1+jumlah_yang_dihuni_2+jumlah_yang_dihuni_3+jumlah_yang_dihuni_4+jumlah_yang_dihuni_5+jumlah_yang_dihuni_6+jumlah_yang_dihuni_7+jumlah_yang_dihuni_8
                      +jumlah_yang_dihuni_9+jumlah_yang_dihuni_10);
                    });


                   $('.tingkat_okupansi').keyup(function() {
                      var tingkat_okupansi_1 = Number($('input[name="tingkat_okupansi_1"]').val());
                      var tingkat_okupansi_2 = Number($('input[name="tingkat_okupansi_2"]').val());
                      var tingkat_okupansi_3 = Number($('input[name="tingkat_okupansi_3"]').val());
                      var tingkat_okupansi_4 = Number($('input[name="tingkat_okupansi_4"]').val());
                      var tingkat_okupansi_5 = Number($('input[name="tingkat_okupansi_5"]').val());
                      var tingkat_okupansi_6 = Number($('input[name="tingkat_okupansi_6"]').val());
                      var tingkat_okupansi_7 = Number($('input[name="tingkat_okupansi_7"]').val());
                      var tingkat_okupansi_8 = Number($('input[name="tingkat_okupansi_8"]').val());
                      var tingkat_okupansi_9 = Number($('input[name="tingkat_okupansi_9"]').val());
                      var tingkat_okupansi_10 = Number($('input[name="tingkat_okupansi_10"]').val());
                      $('input[name="tingkat_okupansi_total"]').val(tingkat_okupansi_1+tingkat_okupansi_2+tingkat_okupansi_3+tingkat_okupansi_4+tingkat_okupansi_5+tingkat_okupansi_6+tingkat_okupansi_7+tingkat_okupansi_8 +tingkat_okupansi_9+tingkat_okupansi_10);
                      console.log(tingkat_okupansi_1+tingkat_okupansi_2+tingkat_okupansi_3+tingkat_okupansi_4+tingkat_okupansi_5+tingkat_okupansi_6+tingkat_okupansi_7+tingkat_okupansi_8
                      +tingkat_okupansi_9+tingkat_okupansi_10);
                    });


                     $('.jumlah_unit_area_kemerial').keyup(function() {
                      var jumlah_unit_area_kemerial_1 = Number($('input[name="jumlah_unit_area_kemerial_1"]').val());
                      var jumlah_unit_area_kemerial_2 = Number($('input[name="jumlah_unit_area_kemerial_2"]').val());
                      var jumlah_unit_area_kemerial_3 = Number($('input[name="jumlah_unit_area_kemerial_3"]').val());
                      var jumlah_unit_area_kemerial_4 = Number($('input[name="jumlah_unit_area_kemerial_4"]').val());
                      var jumlah_unit_area_kemerial_5 = Number($('input[name="jumlah_unit_area_kemerial_5"]').val());
                      var jumlah_unit_area_kemerial_6 = Number($('input[name="jumlah_unit_area_kemerial_6"]').val());
                      var jumlah_unit_area_kemerial_7 = Number($('input[name="jumlah_unit_area_kemerial_7"]').val());
                      var jumlah_unit_area_kemerial_8 = Number($('input[name="jumlah_unit_area_kemerial_8"]').val());
                      var jumlah_unit_area_kemerial_9 = Number($('input[name="jumlah_unit_area_kemerial_9"]').val());
                      var jumlah_unit_area_kemerial_10 = Number($('input[name="jumlah_unit_area_kemerial_10"]').val());
                      $('input[name="jumlah_unit_area_kemerial_total"]').val(jumlah_unit_area_kemerial_1+jumlah_unit_area_kemerial_2+jumlah_unit_area_kemerial_3+jumlah_unit_area_kemerial_4+jumlah_unit_area_kemerial_5+jumlah_unit_area_kemerial_6+jumlah_unit_area_kemerial_7+jumlah_unit_area_kemerial_8 +jumlah_unit_area_kemerial_9+jumlah_unit_area_kemerial_10);
                      console.log(jumlah_unit_area_kemerial_1+jumlah_unit_area_kemerial_2+jumlah_unit_area_kemerial_3+jumlah_unit_area_kemerial_4+jumlah_unit_area_kemerial_5+jumlah_unit_area_kemerial_6+jumlah_unit_area_kemerial_7+jumlah_unit_area_kemerial_8
                      +jumlah_unit_area_kemerial_9+jumlah_unit_area_kemerial_10);
                    });


                    $('.jumlah_area_komersial_dihuni').keyup(function() {
                      var jumlah_area_komersial_dihuni_1 = Number($('input[name="jumlah_area_komersial_dihuni_1"]').val());
                      var jumlah_area_komersial_dihuni_2 = Number($('input[name="jumlah_area_komersial_dihuni_2"]').val());
                      var jumlah_area_komersial_dihuni_3 = Number($('input[name="jumlah_area_komersial_dihuni_3"]').val());
                      var jumlah_area_komersial_dihuni_4 = Number($('input[name="jumlah_area_komersial_dihuni_4"]').val());
                      var jumlah_area_komersial_dihuni_5 = Number($('input[name="jumlah_area_komersial_dihuni_5"]').val());
                      var jumlah_area_komersial_dihuni_6 = Number($('input[name="jumlah_area_komersial_dihuni_6"]').val());
                      var jumlah_area_komersial_dihuni_7 = Number($('input[name="jumlah_area_komersial_dihuni_7"]').val());
                      var jumlah_area_komersial_dihuni_8 = Number($('input[name="jumlah_area_komersial_dihuni_8"]').val());
                      var jumlah_area_komersial_dihuni_9 = Number($('input[name="jumlah_area_komersial_dihuni_9"]').val());
                      var jumlah_area_komersial_dihuni_10 = Number($('input[name="jumlah_area_komersial_dihuni_10"]').val());
                      $('input[name="jumlah_area_komersial_dihuni_total"]').val(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8 +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                      console.log(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                      +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                    });

                    $('.jumlah_area_komersial_dihuni').keyup(function() {
                      var jumlah_area_komersial_dihuni_1 = Number($('input[name="jumlah_area_komersial_dihuni_1"]').val());
                      var jumlah_area_komersial_dihuni_2 = Number($('input[name="jumlah_area_komersial_dihuni_2"]').val());
                      var jumlah_area_komersial_dihuni_3 = Number($('input[name="jumlah_area_komersial_dihuni_3"]').val());
                      var jumlah_area_komersial_dihuni_4 = Number($('input[name="jumlah_area_komersial_dihuni_4"]').val());
                      var jumlah_area_komersial_dihuni_5 = Number($('input[name="jumlah_area_komersial_dihuni_5"]').val());
                      var jumlah_area_komersial_dihuni_6 = Number($('input[name="jumlah_area_komersial_dihuni_6"]').val());
                      var jumlah_area_komersial_dihuni_7 = Number($('input[name="jumlah_area_komersial_dihuni_7"]').val());
                      var jumlah_area_komersial_dihuni_8 = Number($('input[name="jumlah_area_komersial_dihuni_8"]').val());
                      var jumlah_area_komersial_dihuni_9 = Number($('input[name="jumlah_area_komersial_dihuni_9"]').val());
                      var jumlah_area_komersial_dihuni_10 = Number($('input[name="jumlah_area_komersial_dihuni_10"]').val());
                      $('input[name="jumlah_area_komersial_dihuni_total"]').val(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8 +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                      console.log(jumlah_area_komersial_dihuni_1+jumlah_area_komersial_dihuni_2+jumlah_area_komersial_dihuni_3+jumlah_area_komersial_dihuni_4+jumlah_area_komersial_dihuni_5+jumlah_area_komersial_dihuni_6+jumlah_area_komersial_dihuni_7+jumlah_area_komersial_dihuni_8
                      +jumlah_area_komersial_dihuni_9+jumlah_area_komersial_dihuni_10);
                    });


                    $('.jumlah_tingkat_okupansi').keyup(function() {
                      var jumlah_tingkat_okupansi_1 = Number($('input[name="jumlah_tingkat_okupansi_1"]').val());
                      var jumlah_tingkat_okupansi_2 = Number($('input[name="jumlah_tingkat_okupansi_2"]').val());
                      var jumlah_tingkat_okupansi_3 = Number($('input[name="jumlah_tingkat_okupansi_3"]').val());
                      var jumlah_tingkat_okupansi_4 = Number($('input[name="jumlah_tingkat_okupansi_4"]').val());
                      var jumlah_tingkat_okupansi_5 = Number($('input[name="jumlah_tingkat_okupansi_5"]').val());
                      var jumlah_tingkat_okupansi_6 = Number($('input[name="jumlah_tingkat_okupansi_6"]').val());
                      var jumlah_tingkat_okupansi_7 = Number($('input[name="jumlah_tingkat_okupansi_7"]').val());
                      var jumlah_tingkat_okupansi_8 = Number($('input[name="jumlah_tingkat_okupansi_8"]').val());
                      var jumlah_tingkat_okupansi_9 = Number($('input[name="jumlah_tingkat_okupansi_9"]').val());
                      var jumlah_tingkat_okupansi_10 = Number($('input[name="jumlah_tingkat_okupansi_10"]').val());
                      $('input[name="jumlah_tingkat_okupansi_total"]').val(jumlah_tingkat_okupansi_1+jumlah_tingkat_okupansi_2+jumlah_tingkat_okupansi_3+jumlah_tingkat_okupansi_4+jumlah_tingkat_okupansi_5+jumlah_tingkat_okupansi_6+jumlah_tingkat_okupansi_7+jumlah_tingkat_okupansi_8 +jumlah_tingkat_okupansi_9+jumlah_tingkat_okupansi_10);
                      console.log(jumlah_tingkat_okupansi_1+jumlah_tingkat_okupansi_2+jumlah_tingkat_okupansi_3+jumlah_tingkat_okupansi_4+jumlah_tingkat_okupansi_5+jumlah_tingkat_okupansi_6+jumlah_tingkat_okupansi_7+jumlah_tingkat_okupansi_8
                      +jumlah_tingkat_okupansi_9+jumlah_tingkat_okupansi_10);
                    });

                    $('.jumlah_kendaraan_terdaftar').keyup(function() {
                      var jumlah_kendaraan_terdaftar_1 = Number($('input[name="jumlah_kendaraan_terdaftar_1"]').val());
                      var jumlah_kendaraan_terdaftar_2 = Number($('input[name="jumlah_kendaraan_terdaftar_2"]').val());
                      var jumlah_kendaraan_terdaftar_3 = Number($('input[name="jumlah_kendaraan_terdaftar_3"]').val());
                      var jumlah_kendaraan_terdaftar_4 = Number($('input[name="jumlah_kendaraan_terdaftar_4"]').val());
                      var jumlah_kendaraan_terdaftar_5 = Number($('input[name="jumlah_kendaraan_terdaftar_5"]').val());
                      var jumlah_kendaraan_terdaftar_6 = Number($('input[name="jumlah_kendaraan_terdaftar_6"]').val());
                      var jumlah_kendaraan_terdaftar_7 = Number($('input[name="jumlah_kendaraan_terdaftar_7"]').val());
                      var jumlah_kendaraan_terdaftar_8 = Number($('input[name="jumlah_kendaraan_terdaftar_8"]').val());
                      var jumlah_kendaraan_terdaftar_9 = Number($('input[name="jumlah_kendaraan_terdaftar_9"]').val());
                      var jumlah_kendaraan_terdaftar_10 = Number($('input[name="jumlah_kendaraan_terdaftar_10"]').val());
                      $('input[name="jumlah_kendaraan_terdaftar_total"]').val(jumlah_kendaraan_terdaftar_1+jumlah_kendaraan_terdaftar_2+jumlah_kendaraan_terdaftar_3+jumlah_kendaraan_terdaftar_4+jumlah_kendaraan_terdaftar_5+jumlah_kendaraan_terdaftar_6+jumlah_kendaraan_terdaftar_7+jumlah_kendaraan_terdaftar_8 +jumlah_kendaraan_terdaftar_9+jumlah_kendaraan_terdaftar_10);
                      console.log(jumlah_kendaraan_terdaftar_1+jumlah_kendaraan_terdaftar_2+jumlah_kendaraan_terdaftar_3+jumlah_kendaraan_terdaftar_4+jumlah_kendaraan_terdaftar_5+jumlah_kendaraan_terdaftar_6+jumlah_kendaraan_terdaftar_7+jumlah_kendaraan_terdaftar_8
                      +jumlah_kendaraan_terdaftar_9+jumlah_kendaraan_terdaftar_10);
                    });


                    $('#jumlah_yang_dihuni_1').keyup(function() {
                    
                      var jumlah_unit_1 = Number($('#jumlah_unit_1').val());
                      var jumlah_yang_dihuni_1 = Number($('#jumlah_yang_dihuni_1').val());
                      var hasil = jumlah_yang_dihuni_1/jumlah_unit_1


                      $('input[name="tingkat_okupansi_1"]').val( hasil * 100  + "%");
                      var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                      console.log(jumlah_unit_total +" "+jumlah_yang_dihuni_total +" = "+hasil_2 +"  " +hasil_2 * 100);
                      console.log(hasil * 100);
                      
                    });
                   $('#jumlah_yang_dihuni_2').keyup(function() {
                     
                      var jumlah_unit_2 = Number($('#jumlah_unit_2').val());
                      var jumlah_yang_dihuni_2 = Number($('#jumlah_yang_dihuni_2').val());
                      var hasil = jumlah_yang_dihuni_2/jumlah_unit_2

                      $('input[name="tingkat_okupansi_2"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                      
                    });
                    $('#jumlah_yang_dihuni_3').keyup(function() {
                      
                      var jumlah_unit_3 = Number($('#jumlah_unit_3').val());
                      var jumlah_yang_dihuni_3 = Number($('#jumlah_yang_dihuni_3').val());
                      var hasil = jumlah_yang_dihuni_3/jumlah_unit_3
                      
                      $('input[name="tingkat_okupansi_3"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_4').keyup(function() {
                      
                      var jumlah_unit_4 = Number($('#jumlah_unit_4').val());
                      var jumlah_yang_dihuni_4 = Number($('#jumlah_yang_dihuni_4').val());
                      var hasil = jumlah_yang_dihuni_4/jumlah_unit_4
                      
                      $('input[name="tingkat_okupansi_4"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_5').keyup(function() {
                      
                      var jumlah_unit_5 = Number($('#jumlah_unit_5').val());
                      var jumlah_yang_dihuni_5 = Number($('#jumlah_yang_dihuni_5').val());
                      var hasil = jumlah_yang_dihuni_5/jumlah_unit_5
                      
                      $('input[name="tingkat_okupansi_5"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_6').keyup(function() {
                      
                      var jumlah_unit_6 = Number($('#jumlah_unit_6').val());
                      var jumlah_yang_dihuni_6 = Number($('#jumlah_yang_dihuni_6').val());
                      var hasil = jumlah_yang_dihuni_6/jumlah_unit_6
                      
                      $('input[name="tingkat_okupansi_6"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_7').keyup(function() {
                      
                      var jumlah_unit_7 = Number($('#jumlah_unit_7').val());
                      var jumlah_yang_dihuni_7 = Number($('#jumlah_yang_dihuni_7').val());
                      var hasil = jumlah_yang_dihuni_7/jumlah_unit_7
                      
                      $('input[name="tingkat_okupansi_7"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_8').keyup(function() {
                      
                      var jumlah_unit_8 = Number($('#jumlah_unit_8').val());
                      var jumlah_yang_dihuni_8 = Number($('#jumlah_yang_dihuni_8').val());
                      var hasil = jumlah_yang_dihuni_8/jumlah_unit_8
                      
                      $('input[name="tingkat_okupansi_8"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_9').keyup(function() {
                      
                      var jumlah_unit_2 = Number($('#jumlah_unit_2').val());
                      var jumlah_yang_dihuni_9 = Number($('#jumlah_yang_dihuni_9').val());
                      var hasil = jumlah_yang_dihuni_9/jumlah_unit_2
                      
                      $('input[name="tingkat_okupansi_9"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_yang_dihuni_10').keyup(function() {
                      
                      var jumlah_unit_10 = Number($('#jumlah_unit_10').val());
                      var jumlah_yang_dihuni_10 = Number($('#jumlah_yang_dihuni_10').val());
                      var hasil = jumlah_yang_dihuni_10/jumlah_unit_10
                      
                      $('input[name="tingkat_okupansi_10"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                                            var jumlah_unit_total = Number($('input[name="jumlah_unit_total"]').val());
                      var jumlah_yang_dihuni_total =Number($('input[name="jumlah_yang_dihuni_total"]').val());
                      var hasil_2 = jumlah_yang_dihuni_total / jumlah_unit_total
                     
                      $('input[name="tingkat_okupansi_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });



                    $('#jumlah_area_komersial_dihuni_1').keyup(function() {
                      var jumlah_unit_area_kemerial_1 = Number($('#jumlah_unit_area_kemerial_1').val());
                      var jumlah_area_komersial_dihuni_1 = Number($('#jumlah_area_komersial_dihuni_1').val());
                      var hasil = jumlah_area_komersial_dihuni_1/jumlah_unit_area_kemerial_1

                      $('input[name="jumlah_tingkat_okupansi_area_1"]').val( hasil * 100  + "%");
                      console.log(hasil * 100);

                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total  
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");                      
                      
                    });
                   $('#jumlah_area_komersial_dihuni_2').keyup(function() {
                      var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                      var jumlah_area_komersial_dihuni_2 = Number($('#jumlah_area_komersial_dihuni_2').val());
                      var hasil = jumlah_area_komersial_dihuni_2/jumlah_unit_area_kemerial_2

                      $('input[name="jumlah_tingkat_okupansi_area_2"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_3').keyup(function() {
                      var jumlah_unit_area_kemerial_3 = Number($('#jumlah_unit_area_kemerial_3').val());
                      var jumlah_area_komersial_dihuni_3 = Number($('#jumlah_area_komersial_dihuni_3').val());
                      var hasil = jumlah_area_komersial_dihuni_3/jumlah_unit_area_kemerial_3

                      $('input[name="jumlah_tingkat_okupansi_area_3"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_4').keyup(function() {
                      var jumlah_unit_area_kemerial_4 = Number($('#jumlah_unit_area_kemerial_4').val());
                      var jumlah_area_komersial_dihuni_4 = Number($('#jumlah_area_komersial_dihuni_4').val());
                      var hasil = jumlah_area_komersial_dihuni_4/jumlah_unit_area_kemerial_4

                      $('input[name="jumlah_tingkat_okupansi_area_4"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_5').keyup(function() {
                      var jumlah_unit_area_kemerial_5 = Number($('#jumlah_unit_area_kemerial_5').val());
                      var jumlah_area_komersial_dihuni_5 = Number($('#jumlah_area_komersial_dihuni_5').val());
                      var hasil = jumlah_area_komersial_dihuni_5/jumlah_unit_area_kemerial_5

                      $('input[name="jumlah_tingkat_okupansi_area_5"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_6').keyup(function() {
                      var jumlah_unit_area_kemerial_6 = Number($('#jumlah_unit_area_kemerial_6').val());
                      var jumlah_area_komersial_dihuni_6 = Number($('#jumlah_area_komersial_dihuni_6').val());
                      var hasil = jumlah_area_komersial_dihuni_6/jumlah_unit_area_kemerial_6

                      $('input[name="jumlah_tingkat_okupansi_area_6"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_7').keyup(function() {
                      var jumlah_unit_area_kemerial_7 = Number($('#jumlah_unit_area_kemerial_7').val());
                      var jumlah_area_komersial_dihuni_7 = Number($('#jumlah_area_komersial_dihuni_7').val());
                      var hasil = jumlah_area_komersial_dihuni_7/jumlah_unit_area_kemerial_7

                      $('input[name="jumlah_tingkat_okupansi_area_7"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_8').keyup(function() {
                      var jumlah_unit_area_kemerial_8 = Number($('#jumlah_unit_area_kemerial_8').val());
                      var jumlah_area_komersial_dihuni_8 = Number($('#jumlah_area_komersial_dihuni_8').val());
                      var hasil = jumlah_area_komersial_dihuni_8/jumlah_unit_area_kemerial_8

                      $('input[name="jumlah_tingkat_okupansi_area_8"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_9').keyup(function() {
                      var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                      var jumlah_area_komersial_dihuni_9 = Number($('#jumlah_area_komersial_dihuni_9').val());
                      var hasil = jumlah_area_komersial_dihuni_9/jumlah_unit_area_kemerial_2

                      $('input[name="jumlah_tingkat_okupansi_area_9"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_area_komersial_dihuni_10').keyup(function() {
                      var jumlah_unit_area_kemerial_10 = Number($('#jumlah_unit_area_kemerial_10').val());
                      var jumlah_area_komersial_dihuni_10 = Number($('#jumlah_area_komersial_dihuni_10').val());
                      var hasil = jumlah_area_komersial_dihuni_10/jumlah_unit_area_kemerial_10

                      $('input[name="jumlah_tingkat_okupansi_area_10"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });




                  $('#jumlah_unit_area_kemerial_1').keyup(function() {
                      var jumlah_unit_area_kemerial_1 = Number($('#jumlah_unit_area_kemerial_1').val());
                      var jumlah_area_komersial_dihuni_1 = Number($('#jumlah_area_komersial_dihuni_1').val());
                      var hasil = jumlah_area_komersial_dihuni_1/jumlah_unit_area_kemerial_1

                      $('input[name="jumlah_tingkat_okupansi_area_1"]').val( hasil * 100  + "%");
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                   $('#jumlah_unit_area_kemerial_2').keyup(function() {
                      var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                      var jumlah_area_komersial_dihuni_2 = Number($('#jumlah_area_komersial_dihuni_2').val());
                      var hasil = jumlah_area_komersial_dihuni_2/jumlah_unit_area_kemerial_2

                      $('input[name="jumlah_tingkat_okupansi_area_2"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_3').keyup(function() {
                      var jumlah_unit_area_kemerial_3 = Number($('#jumlah_unit_area_kemerial_3').val());
                      var jumlah_area_komersial_dihuni_3 = Number($('#jumlah_area_komersial_dihuni_3').val());
                      var hasil = jumlah_area_komersial_dihuni_3/jumlah_unit_area_kemerial_3

                      $('input[name="jumlah_tingkat_okupansi_area_3"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_4').keyup(function() {
                      var jumlah_unit_area_kemerial_4 = Number($('#jumlah_unit_area_kemerial_4').val());
                      var jumlah_area_komersial_dihuni_4 = Number($('#jumlah_area_komersial_dihuni_4').val());
                      var hasil = jumlah_area_komersial_dihuni_4/jumlah_unit_area_kemerial_4

                      $('input[name="jumlah_tingkat_okupansi_area_4"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_5').keyup(function() {
                      var jumlah_unit_area_kemerial_5 = Number($('#jumlah_unit_area_kemerial_5').val());
                      var jumlah_area_komersial_dihuni_5 = Number($('#jumlah_area_komersial_dihuni_5').val());
                      var hasil = jumlah_area_komersial_dihuni_5/jumlah_unit_area_kemerial_5

                      $('input[name="jumlah_tingkat_okupansi_area_5"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_6').keyup(function() {
                      var jumlah_unit_area_kemerial_6 = Number($('#jumlah_unit_area_kemerial_6').val());
                      var jumlah_area_komersial_dihuni_6 = Number($('#jumlah_area_komersial_dihuni_6').val());
                      var hasil = jumlah_area_komersial_dihuni_6/jumlah_unit_area_kemerial_6

                      $('input[name="jumlah_tingkat_okupansi_area_6"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_7').keyup(function() {
                      var jumlah_unit_area_kemerial_7 = Number($('#jumlah_unit_area_kemerial_7').val());
                      var jumlah_area_komersial_dihuni_7 = Number($('#jumlah_area_komersial_dihuni_7').val());
                      var hasil = jumlah_area_komersial_dihuni_7/jumlah_unit_area_kemerial_7

                      $('input[name="jumlah_tingkat_okupansi_area_7"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_8').keyup(function() {
                      var jumlah_unit_area_kemerial_8 = Number($('#jumlah_unit_area_kemerial_8').val());
                      var jumlah_area_komersial_dihuni_8 = Number($('#jumlah_area_komersial_dihuni_8').val());
                      var hasil = jumlah_area_komersial_dihuni_8/jumlah_unit_area_kemerial_8

                      $('input[name="jumlah_tingkat_okupansi_area_8"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_9').keyup(function() {
                      var jumlah_unit_area_kemerial_2 = Number($('#jumlah_unit_area_kemerial_2').val());
                      var jumlah_area_komersial_dihuni_9 = Number($('#jumlah_area_komersial_dihuni_9').val());
                      var hasil = jumlah_area_komersial_dihuni_9/jumlah_unit_area_kemerial_2

                      $('input[name="jumlah_tingkat_okupansi_area_9"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });
                    $('#jumlah_unit_area_kemerial_10').keyup(function() {
                      var jumlah_unit_area_kemerial_10 = Number($('#jumlah_unit_area_kemerial_10').val());
                      var jumlah_area_komersial_dihuni_10 = Number($('#jumlah_area_komersial_dihuni_10').val());
                      var hasil = jumlah_area_komersial_dihuni_10/jumlah_unit_area_kemerial_10

                      $('input[name="jumlah_tingkat_okupansi_area_10"]').val(hasil * 100  + "%" );
                      console.log(hasil * 100);
                      var jumlah_unit_area_kemerial_total = Number($('input[name="jumlah_unit_area_kemerial_total"]').val());
                      var jumlah_area_komersial_dihuni_total =Number($('input[name="jumlah_area_komersial_dihuni_total"]').val());
                      var hasil_2 = jumlah_area_komersial_dihuni_total / jumlah_unit_area_kemerial_total
                      $('input[name="jumlah_tingkat_okupansi_area_total"]').val(Math.floor( hasil_2 * 100 ) + "%");
                      
                    });


                    

                    $('.type_unit').keyup(function() {
                   var jumlah_unit_total =  $('input[name="jumlah_unit_total"]').val();
                   var type_unit_studio =  $('input[name="type_unit_studio"]').val();
                   var type_unit_1br =  $('input[name="type_unit_studio"]').val();
                   var type_unit_2br =  $('input[name="type_unit_2br"]').val();
                   var type_unit_3br =  $('input[name="type_unit_3br"]').val();
                   var type_unit_penthouse =  $('input[name="type_unit_penthouse"]').val();

                    var hasil =type_unit_studio + type_unit_1br + type_unit_2br+type_unit_3br+type_unit_penthouse  
                
                // if (jumlah_unit_total < hasil) {
                //     alert("lebih");
                // }
                    });






                    if (data.PROPERTY_TYPE == "Landed House") {
                      $('#single').keyup(function() {
                        var single = Number($('#single').val());
                        var keluarga = Number($("#keluarga").val());
                        var empatlimakeatas = Number($("#empatlimakeatas").val());

                          var hasil = 100 - single  - empatlimakeatas
                        $("#keluarga").val(hasil) 
                        console.log("data = " +mahasiswa + karyawan + pengusaha);
                    }); 

                      $('#keluarga').keyup(function() {
                        var single = Number($('#single').val());
                        var keluarga = Number($("#keluarga").val());
                        var empatlimakeatas = Number($("#empatlimakeatas").val());
                          var hasil = 100 - single  - empatlimakeatas
                        $("#keluarga").val(hasil) 
                        console.log("data = " +mahasiswa + karyawan + pengusaha);
                    }); 
                    console.log("landad" + data.PROPERTY_TYPE);
                    
                  }else{
                   $('#single').keyup(function() {
                          var single = Number($('#single').val());
                          var keluarga = Number($("#keluarga").val());
                          
                          var hasil = 100 - single ;
                          $("#keluarga").val(hasil)
                          }); 
                          console.log("bukan landed" + data.PROPERTY_TYPE);
                          
                  }




               



       
                    

             








                    $('input[name="TOTAL_FLOORORTOWER"]').val(data.TOTAL_FLOORORTOWER);
                    var TYPE_UNIT = data.TYPE_UNIT;
                    if (TYPE_UNIT != null) {
                      TYPE_UNIT = TYPE_UNIT.split(",");
                      $('input[name="type_unit_studio"]').val(TYPE_UNIT[0]);
                      $('input[name="type_unit_1br"]').val(TYPE_UNIT[1]);
                      $('input[name="type_unit_2br"]').val(TYPE_UNIT[2]);
                      $('input[name="type_unit_3br"]').val(TYPE_UNIT[3]);
                      $('input[name="type_unit_penthouse"]').val(TYPE_UNIT[4]);
                      
                    }
                    if (data.EXCLUSIVE == "NO" || data.EXCLUSIVE == "on") {
                    $('#exclusive_1').prop('checked', false);
                    $('#exclusive_2').prop('checked', true);
                    $('#thn').hide();
                    $('#thn_text').hide();
                    
                    console.log("no");
                    }else{
                      $('#exclusive_1').prop('checked', true);
                      $('#exclusive_2').prop('checked', false);
                    console.log("yes");
                    }

                  
              
                    if (data.SOHO != null) {
                      $('input[name="SOHO"]').prop('checked', true);                      
                    } 
                    if (data.DEDICATED_INTERNET != null) {
                      $('input[name="DEDICATED_INTERNET"]').prop('checked', true);                      
                    }
                    if (data.DATA_COMMUNICATION != null ) {
                      $('input[name="DATA_COMMUNICATION"]').prop('checked', true);
                    }
                    if (data.RESIDENTIAL != null) {
                      
                      $('input[name="RESIDENTIAL"]').prop('checked', true);
                    }

                    $('#UPDATE_PROGRESS').val(data.UPDATE_PROGRESS);
                    
                    

                   
                    

                    // INFRASTRUKTUR_TERSEDIA
                      var INFRASTRUKTUR_TERSEDIA = data.INFRASTRUKTUR_TERSEDIA
                      if (INFRASTRUKTUR_TERSEDIA != null) {
                      if (INFRASTRUKTUR_TERSEDIA.match(/Coaxial/) == "Coaxial") {
                    console.log($('input[name="Infrastruktur[0]"]').prop('checked', true));
                      $('input[name="Infrastruktur[0]"]').prop('checked', true);
                      }
                      if (INFRASTRUKTUR_TERSEDIA.match(/FTTH/) == "FTTH") {
                    console.log($('input[name="Infrastruktur[1]"]').prop('checked', true));
                      $('input[name="Infrastruktur[1]"]').prop('checked', true);
                      }
                      if (INFRASTRUKTUR_TERSEDIA.match(/ADSL/) == "ADSL") {
                    console.log($('input[name="Infrastruktur[2]"]').prop('checked', true));
                      $('input[name="Infrastruktur[2]"]').prop('checked', true);
                      }
                      if (INFRASTRUKTUR_TERSEDIA.match(/UTP/) == "UTP") {
                    console.log($('input[name="Infrastruktur[1]"]').prop('checked', true)); 
                      $('input[name="Infrastruktur[3]"]').prop('checked', true);
                      }
                      }

                      // INFRASTRUKTUR_TERSEDIA
                        var LAYANAN_YANG_DI_SEDIAKAN_MKM = data.LAYANAN_YANG_DI_SEDIAKAN_MKM
                        if (LAYANAN_YANG_DI_SEDIAKAN_MKM != null) {
                          
                        if (LAYANAN_YANG_DI_SEDIAKAN_MKM.match(/Internet/) == "Internet") {
                        $('#Internet').prop('checked', true);
                        }
                        if (LAYANAN_YANG_DI_SEDIAKAN_MKM.match(/IPTV/) == "IPTV") {
                        $('#IPTV').prop('checked', true);
                        }
                        if (LAYANAN_YANG_DI_SEDIAKAN_MKM.match(/Telephony/) == "Telephony") {
                        $('#Telephony').prop('checked', true);
                        }
}


                        // Pembangunan Infrastruktur s/d.

                          var Pembangunan_Infrastruktur_landed_house = data.Pembangunan_Infrastruktur_landed_house
                          if (Pembangunan_Infrastruktur_landed_house != null) {
                            
                            if (Pembangunan_Infrastruktur_landed_house.match(/ODP/) == "ODP") {
                              $('#ODP').prop('checked', true);
                            }
                            if (Pembangunan_Infrastruktur_landed_house.match(/unit/) == "unit") {
                              $('#unit').prop('checked', true);
                            }
                          }



                          var Metode_Pembangunan_Infrastruktur = data.Metode_Pembangunan_Infrastruktur
                          
                          if (Metode_Pembangunan_Infrastruktur.match(/KU/) == "KU") {
                          $('#KU').prop('checked', true);
                          }
                          if (Metode_Pembangunan_Infrastruktur.match(/UG/) == "UG") {
                          $('#UG').prop('checked', true);
                          }
                          if (Metode_Pembangunan_Infrastruktur.match(/Mixed/) == "Mixed") {
                          $('#Mixed').prop('checked', true);
                          }




                          var Internet_Service = data.Internet_Service
                          if (Internet_Service.match(/Dedicated/) == "Dedicated") {
                          $('#Dedicated').prop('checked', true);
                          }
                          if (Internet_Service.match(/Broadband/) == "Broadband") {
                          $('#Broadband').prop('checked', true);
                          }

                          if (data.Membantu_Penjualan != null) {
                            
                          var Membantu_Penjualan = data.Membantu_Penjualan
                          if (Membantu_Penjualan.match(/YES/) == "YES") {
                          $('#membantu_1').prop('checked', true);
                          }
                          if (Membantu_Penjualan.match(/NO/) == "NO") {
                          $('#membantu_2').prop('checked', true);
                          }
                          }
                        
                        
                          

                          var Mayoritas_Jenis_Usaha = data.Mayoritas_Jenis_Usaha;
                          Mayoritas_Jenis_Usaha = Mayoritas_Jenis_Usaha.split(",");
                          console.log(Mayoritas_Jenis_Usaha);
                          $('#Distributor').val(Mayoritas_Jenis_Usaha[0]);
                          $('#Resto').val(Mayoritas_Jenis_Usaha[1]);
                          $('#Bank').val(Mayoritas_Jenis_Usaha[2]);
                          $('#Mini_Market').val(Mayoritas_Jenis_Usaha[3]);
                          $('#Tour').val(Mayoritas_Jenis_Usaha[4]);
                          $('#Lembaga_Pendidikan').val(Mayoritas_Jenis_Usaha[5]);
                          $('#Konsultan').val(Mayoritas_Jenis_Usaha[6]);
                          $('#Modern_Market').val(Mayoritas_Jenis_Usaha[7]);
                          $('#ATPM').val(Mayoritas_Jenis_Usaha[8]);
                          $('#Agency').val(Mayoritas_Jenis_Usaha[9]);
                          $('#Others').val(Mayoritas_Jenis_Usaha[10]);




                        var KEWARGA_NEGARAAN_PENGHUNI = data.KEWARGA_NEGARAAN_PENGHUNI;
                        KEWARGA_NEGARAAN_PENGHUNI = KEWARGA_NEGARAAN_PENGHUNI.split(",");
                        console.log(KEWARGA_NEGARAAN_PENGHUNI);
                        $('#Expatriat').val(KEWARGA_NEGARAAN_PENGHUNI[0]);
                        $('#Mayoritas_Negara').val(KEWARGA_NEGARAAN_PENGHUNI[1]);
                        $('#indonesia').val(KEWARGA_NEGARAAN_PENGHUNI[2]);


                        if (data.Presentase_Operasional != null) {
                        var Presentase_Operasional = data.Presentase_Operasional;
                            Presentase_Operasional = Presentase_Operasional.split(",");
                            console.log(Presentase_Operasional);
                            $('#Weekday').val(Presentase_Operasional[0]);
                            $('#Weekend').val(Presentase_Operasional[1]);
                            $('#minggu').val(Presentase_Operasional[2]);
                        }

                        if (data.Provider_Existing != null) {
                          
                        var Provider_Existing = data.Provider_Existing;
                        Provider_Existing = Provider_Existing.split(",");
                        console.log(Provider_Existing);
                        $('input[name="Provider_1"]').val(Provider_Existing[0]);
                        $('input[name="Provider_2"]').val(Provider_Existing[1]);
                        $('input[name="Provider_3"]').val(Provider_Existing[2]);
                        $('input[name="Provider_4"]').val(Provider_Existing[3]);
                        $('input[name="Provider_5"]').val(Provider_Existing[4]);
                        }

                      $( function() {
                        var Provider = [
                        "Telkom",
                        "First Media",
                        "Biznet",
                        "MyRepublic",
                        "Indihome"
                        ];
                        $( "#Provider_1" ).autocomplete({
                        source: Provider
                        });
                        $( "#Provider_2" ).autocomplete({
                        source: Provider
                        });
                        $( "#Provider_3" ).autocomplete({
                        source: Provider
                        });
                        $( "#Provider_4" ).autocomplete({
                        source: Provider
                        });
                        $( "#Provider_5" ).autocomplete({
                        source: Provider
                        });
                        } );
                        if (data.Inet != null) {
                          
                        var Inet = data.Inet;
                        Inet = Inet.split(",");
                        console.log(Inet);
                        
                     if (Inet[0] == "Inet") {
                        $('input[name="Inet_1"]').prop('checked', true);
                        }
                        if (Inet[1] == "Inet") {
                        $('input[name="Inet_2"]').prop('checked', true);
                        }
                        if (Inet[2] == "Inet") {
                        $('input[name="Inet_3"]').prop('checked', true);
                        }
                        if (Inet[3] == "Inet") {
                        $('input[name="Inet_4"]').prop('checked', true);
                        }
                        if (Inet[4] == "Inet") {
                        $('input[name="Inet_5"]').prop('checked', true);
                        
                        }
                        }


                     if (data.TV != null) {
                        var TV = data.TV;
                        TV = TV.split(",");
                        console.log(TV);
                     if (TV[0] == "TV") {
                        $('input[name="TV_1"]').prop('checked', true);
                        }
                        if (TV[1] == "TV") {
                        $('input[name="TV_2"]').prop('checked', true);
                        }
                        if (TV[2] == "TV") {
                        $('input[name="TV_3"]').prop('checked', true);
                        }
                        if (TV[3] == "TV") {
                        $('input[name="TV_4"]').prop('checked', true);
                        }
                        if (TV[4] == "TV") {
                        $('input[name="TV_5"]').prop('checked', true);
                        
                        }
                        }



                   

                          if (data.Telp != null) {
                          
                        var Telp = data.Telp;
                        Telp = Telp.split(",");
                        console.log(Telp);
                        
                     if (Telp[0] == "Telp") {
                        $('input[name="Telp_1"]').prop('checked', true);
                        }
                        if (Telp[1] == "Telp") {
                        $('input[name="Telp_2"]').prop('checked', true);
                        }
                        if (Telp[2] == "Telp") {
                        $('input[name="Telp_3"]').prop('checked', true);
                        }
                        if (Telp[3] == "Telp") {
                        $('input[name="Telp_4"]').prop('checked', true);
                        }
                        if (Telp[4] == "Telp") {
                        $('input[name="Telp_5"]').prop('checked', true);
                        
                        }
                        }

                

                      
                          
                        if (data.Eksklusif_Y != null) {
                        var Eksklusif_Y = data.Eksklusif_Y;
                        Eksklusif_Y = Eksklusif_Y.split(",");
                        console.log(Eksklusif_Y);
                        
                        if (Eksklusif_Y[0] == "NO") {
                        $('#Eksklusif_n_1').prop('checked', true);
                        }
                        if (Eksklusif_Y[1] == "NO") {
                        $('#Eksklusif_n_2').prop('checked', true);
                        }
                        if (Eksklusif_Y[2] == "NO") {
                        $('#Eksklusif_n_3').prop('checked', true);
                        }
                        if (Eksklusif_Y[3] == "NO") {
                        $('#Eksklusif_n_4').prop('checked', true);
                        }
                        if (Eksklusif_Y[4] == "NO") {
                        $('#Eksklusif_n_5').prop('checked', true);
                        }

                        if (Eksklusif_Y[0] == "YES") {
                        $('#Eksklusif_y_1').prop('checked', true);
                        }
                        if (Eksklusif_Y[1] == "YES") {
                        $('#Eksklusif_y_2').prop('checked', true);
                        }
                        if (Eksklusif_Y[2] == "YES") {
                        $('#Eksklusif_y_3').prop('checked', true);
                        }
                        if (Eksklusif_Y[3] == "YES") {
                        $('#Eksklusif_y_4').prop('checked', true);
                        }
                        if (Eksklusif_Y[4] == "YES") {
                        $('#Eksklusif_y_5').prop('checked', true);
                        
                        }
                        }


                      

                        console.log(Durasi_Kerjasama);
                        if (data.Durasi_Kerjasama != null) {
                          
                        var Durasi_Kerjasama = data.Durasi_Kerjasama;
                        Durasi_Kerjasama = Durasi_Kerjasama.split(",");
                        $('input[name="Durasi_Kerjasama_1"]').val(Durasi_Kerjasama[0]);
                        $('input[name="Durasi_Kerjasama_2"]').val(Durasi_Kerjasama[1]);
                        $('input[name="Durasi_Kerjasama_3"]').val(Durasi_Kerjasama[2]);
                        $('input[name="Durasi_Kerjasama_4"]').val(Durasi_Kerjasama[3]);
                        $('input[name="Durasi_Kerjasama_5"]').val(Durasi_Kerjasama[4]);
                        } 

                        if (data.Rev_Share != null) {
                        var Rev_Share = data.Rev_Share;
                        Rev_Share = Rev_Share.split(",");
                        console.log(Rev_Share);
                        $('input[name="Rev_Share_1"]').val(Rev_Share[0]);
                        $('input[name="Rev_Share_2"]').val(Rev_Share[1]);
                        $('input[name="Rev_Share_3"]').val(Rev_Share[2]);
                        $('input[name="Rev_Share_4"]').val(Rev_Share[3]);
                        $('input[name="Rev_Share_5"]').val(Rev_Share[4]);
                        }

                        if (data.Sewa_Lahan != null) {
                        var Sewa_Lahan = data.Sewa_Lahan;
                        Sewa_Lahan = Sewa_Lahan.split(",");
                        console.log(Sewa_Lahan);
                        $('input[name="Sewa_Lahan_1"]').val(Sewa_Lahan[0]);
                        $('input[name="Sewa_Lahan_2"]').val(Sewa_Lahan[1]);
                        $('input[name="Sewa_Lahan_3"]').val(Sewa_Lahan[2]);
                        $('input[name="Sewa_Lahan_4"]').val(Sewa_Lahan[3]);
                        $('input[name="Sewa_Lahan_5"]').val(Sewa_Lahan[4]);
                        }
                          

                        if (data.JENIS_PEKERJAAN != null) {
                        var JENIS_PEKERJAAN = data.JENIS_PEKERJAAN;
                        JENIS_PEKERJAAN = JENIS_PEKERJAAN.split(",");
                        console.log(JENIS_PEKERJAAN);
                        $('#mahasiswa').val(JENIS_PEKERJAAN[0]);
                        $('#karyawan').val(JENIS_PEKERJAAN[1]);
                        $('#pengusaha').val(JENIS_PEKERJAAN[2]);
                        }

                        if (data.STATUS_PENGHUNI != null) {
                        var STATUS_PENGHUNI = data.STATUS_PENGHUNI;
                          STATUS_PENGHUNI = STATUS_PENGHUNI.split(",");
                          console.log(STATUS_PENGHUNI);
                          $('#single').val(STATUS_PENGHUNI[0]);
                          $('#keluarga').val(STATUS_PENGHUNI[1]);
                          $('#empatlimakeatas').val(STATUS_PENGHUNI[2]);

                        }
                      





                      if (data.MAIN_HOLE_READY_UNIT.match(/YES/) == "YES") {
                      $('#main_hole_unit_1').prop('checked', true);
                      }
                      if (data.MAIN_HOLE_READY_UNIT.match(/NO/) == "NO") {
                      $('#main_hole_unit_2').prop('checked', true);
                      }



                      if (data.MAIN_HOLE_READY_UNIT.match(/YES/) == "YES") {
                      $('#main_hole_unit_1_GEDUNG').prop('checked', true);
                      }
                      if (data.MAIN_HOLE_READY_UNIT.match(/NO/) == "NO") {
                      $('#main_hole_unit_2_GEDUNG').prop('checked', true);
                      }

                      $("#rata-rata").val(data.rata_rata);
                      console.log(data.rata_rata);
                      

                      if (data.MAIN_HOLE_READY_KORIDOR == "YES") {
                        $('#main_hole_koridor_1').prop('checked', true);
                        console.log( " main_hole_koridor_1 yes" );
                        }
                        if (data.MAIN_HOLE_READY_KORIDOR == "NO") {
                        $('#main_hole_koridor_NO').prop('checked', true);
                        console.log("NO KORIDOR");
                        
                        }

                    // var INFRASTRUKTUR_KEPEMILIKAN = data.INFRASTRUKTUR_KEPEMILIKAN;
                    //     INFRASTRUKTUR_KEPEMILIKAN = INFRASTRUKTUR_KEPEMILIKAN.split(",");
                        console.log(data.INFRASTRUKTUR_KEPEMILIKAN);
                        

                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/coaxial=BM/) == "coaxial=BM") {
                      $('#coaxial_radio1').prop('checked', true);
                      }
                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/coaxial=Operator/) == "coaxial=Operator") {
                      $('#coaxial_radio2').prop('checked', true);
                      }


                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/FTTH=BM/) == "FTTH=BM") {
                      $('#FTTH_radio1').prop('checked', true);
                      }
                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/FTTH=Operator/) == "FTTH=Operator") {
                      $('#FTTH_radio2').prop('checked', true);
                      }


                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/ADSL=BM/) == "ADSL=BM") {
                      $('#ADSL_radio1').prop('checked', true);
                      }
                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/ADSL=Operator/) == "ADSL=Operator") {
                      $('#ADSL_radio2').prop('checked', true);
                      }



                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/UTP=BM/) == "UTP=BM") {
                      $('#UTP_radio1').prop('checked', true);
                      }
                      if (data.INFRASTRUKTUR_KEPEMILIKAN.match(/UTP=Operator/) == "UTP=Operator") {
                      $('#UTP_radio2').prop('checked', true);
                      }

                     

                      
                      
                      if (data.BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI.match(/YES/) == "YES") {
                      $('#biaya_1').prop('checked', true);
                      }
                      if (data.BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI.match(/NO/) == "NO") {
                      $('#biaya_2').prop('checked', true);
                      $("#perapihan_biaya").attr('disabled', 'disabled');
                      }


                      if (data.PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI.match(/YES/) == "YES") {
                      $('#perapihan_1').prop('checked', true);
                      }
                      if (data.PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI.match(/NO/) == "NO") {
                      $('#perapihan_2').prop('checked', true);
                      }



                      

                      if (data.RE_WIRING_FTTH.match(/YES/) == "YES") {
                      $('#rewiring1').prop('checked', true);
                      }
                      if (data.RE_WIRING_FTTH.match(/NO/) == "NO") {
                      $('#rewiring2').prop('checked', true);
                      }


                      if (data.Pembangunan_Infrastruktur.match(/Control_Room/) == "Control_Room") {
                      $('#Control_Room').prop('checked', true);
                      }
                      if (data.Pembangunan_Infrastruktur.match(/Shaft/) == "Shaft") {
                      $('#Shaft').prop('checked', true);
                      }


                      var BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI = data.BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI;
                        BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI = BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI.split(",");
                      if (data.BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[0] == "YES") {
                      $('#biaya_1').prop('checked', true);
                      }
                      if (data.BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[0] == "NO") {
                      $('#biaya_2').prop('checked', true);
                      $("#perapihan_biaya").attr('disabled', 'disabled');
                      }
                      $("#perapihan_biaya").val(BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[1])
                      


              



                    // cek aftifitas
                  var harga_aktifitas = data.MARKETING_AKTIFITAS.split(",");
                  var harga_pop_up = data.MARKETING_POP_UP.split(",");
                  var harga_spanduk = data.MARKETING_SPANDUK.split(",");
                  var harga_poster = data.MARKETING_POSTER.split(",");
                  var harga_stiker = data.MARKETING_STICKER.split(",");
                  var harga_roll = data.MARKETING_ROLL.split(",");
                  var harga_acrilic = data.MARKETING_ACRILIC.split(",");



                    var aktifitas = data.MARKETING_AKTIFITAS;
                    if (harga_aktifitas[0] == "aktifitas_lobby") {
                    $('#aktifitas_lobby').prop('checked', true);
                    }
                    if (harga_aktifitas[1] == "aktifitas_basemant") {
                    $('#aktifitas_basemant').prop('checked', true);
                    }
                    if (harga_aktifitas[2] == "aktifitas_pintu_parkir") {
                    $('#aktifitas_pintu_parkir').prop('checked', true);
                    }
                    if (harga_aktifitas[3] == "aktifitas_lift") {
                    $('#aktifitas_lift').prop('checked', true);
                    }
                    if (harga_aktifitas[4] == "aktifitas_swmg_pool") {
                    $('#aktifitas_swmg_pool').prop('checked', true);
                    }
                    if (harga_aktifitas[5] == "aktifitas_fitness") {
                    $('#aktifitas_fitness').prop('checked', true);
                    }
                    if (harga_aktifitas[6] == "aktifitas_mgmt_office") {
                    $('#aktifitas_mgmt_office').prop('checked', true);
                    }
                    if (harga_aktifitas[7] == "aktifitas_receptionist") {
                    $('#aktifitas_receptionist').prop('checked', true);
                    }
                    $("input[name='aktifitas_harga']").val(harga_aktifitas[8]);
                    





                    var pop_up = data.MARKETING_POP_UP
                    if (pop_up.match(/POP_UP_TABLE_lobby/) == "POP_UP_TABLE_lobby") {
                    $('#POP_UP_TABLE_lobby').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_basemant/) == "POP_UP_TABLE_basemant") {
                    $('#POP_UP_TABLE_basemant').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_pintu_parkir/) == "POP_UP_TABLE_pintu_parkir") {
                    $('#POP_UP_TABLE_pintu_parkir').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_lift/) == "POP_UP_TABLE_lift") {
                    $('#POP_UP_TABLE_lift').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_swmg_pool/) == "POP_UP_TABLE_swmg_pool") {
                    $('#POP_UP_TABLE_swmg_pool').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_fitness/) == "POP_UP_TABLE_fitness") {
                    $('#POP_UP_TABLE_fitness').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_mgmt_office/) == "POP_UP_TABLE_mgmt_office") {
                    $('#POP_UP_TABLE_mgmt_office').prop('checked', true);
                    }
                    if (pop_up.match(/POP_UP_TABLE_receptionist/) == "POP_UP_TABLE_receptionist") {
                    $('#POP_UP_TABLE_receptionist').prop('checked', true);
                    }
                    $("input[name='POP_UP_TABLE_harga']").val(harga_pop_up[8]);
                   
                    
                    // spanduk
                    
                    
                    
                    
                    var spanduk = data.MARKETING_SPANDUK
                    if (spanduk.match(/penempatan_standuk_lobby/) == "penempatan_standuk_lobby") {
                    $('#penempatan_standuk_lobby').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_basemant/) == "penempatan_standuk_basemant") {
                    $('#penempatan_standuk_basemant').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_pintu_parkir/) == "penempatan_standuk_pintu_parkir") {
                    $('#penempatan_standuk_pintu_parkir').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_lift/) == "penempatan_standuk_lift") {
                    $('#penempatan_standuk_lift').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_swmg_pool/) == "penempatan_standuk_swmg_pool") {
                    $('#penempatan_standuk_swmg_pool').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_fitness/) == "penempatan_standuk_fitness") {
                    $('#penempatan_standuk_fitness').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_mgmt_office/) == "penempatan_standuk_mgmt_office") {
                    $('#penempatan_standuk_mgmt_office').prop('checked', true);
                    }
                    if (spanduk.match(/penempatan_standuk_receptionist/) == "penempatan_standuk_receptionist") {
                    $('#penempatan_standuk_receptionist').prop('checked', true);
                    }
                    $("input[name='standuk_harga']").val(harga_spanduk[8]);
                    
                    
                  
                    
                    var poster = data.MARKETING_POSTER
                    if (poster.match(/Penempatan_Poster_lobby/) == "Penempatan_Poster_lobby") {
                    $('#Penempatan_Poster_lobby').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_basemant/) == "Penempatan_Poster_basemant") {
                    $('#Penempatan_Poster_basemant').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_pintu_parkir/) == "Penempatan_Poster_pintu_parkir") {
                    $('#Penempatan_Poster_pintu_parkir').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_lift/) == "Penempatan_Poster_lift") {
                    $('#Penempatan_Poster_lift').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_swmg_pool/) == "Penempatan_Poster_swmg_pool") {
                    $('#Penempatan_Poster_swmg_pool').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_fitness/) == "Penempatan_Poster_fitness") {
                    $('#Penempatan_Poster_fitness').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_mgmt_office/) == "Penempatan_Poster_mgmt_office") {
                    $('#Penempatan_Poster_mgmt_office').prop('checked', true);
                    }
                    if (poster.match(/Penempatan_Poster_receptionist/) == "Penempatan_Poster_receptionist") {
                    $('#Penempatan_Poster_receptionist').prop('checked', true);
                    }
                    $("input[name='Penempatan_Poster_harga']").val(harga_poster[8]);
                    
                
                    
                    var stiker = data.MARKETING_STICKER
                    console.log(stiker);
                    
                    if (stiker.match(/sticker_lobby/) == "sticker_lobby") {
                    $('#sticker_lobby').prop('checked', true);
                    }
                    if (stiker.match(/sticker_basemant/) == "sticker_basemant") {
                    $('#sticker_basemant').prop('checked', true);
                    }
                    if (stiker.match(/sticker_pintu_parkir/) == "sticker_pintu_parkir") {
                    $('#sticker_pintu_parkir').prop('checked', true);
                    }
                    if (stiker.match(/sticker_lift/) == "sticker_lift") {
                    $('#sticker_lift').prop('checked', true);
                    }
                    if (stiker.match(/sticker_swmg_pool/) == "sticker_swmg_pool") {
                    $('#sticker_swmg_pool').prop('checked', true);
                    }
                    if (stiker.match(/sticker_fitness/) == "sticker_fitness") {
                    $('#sticker_fitness').prop('checked', true);
                    }
                    if (stiker.match(/sticker_mgmt_office/) == "sticker_mgmt_office") {
                    $('#sticker_mgmt_office').prop('checked', true);
                    }
                    if (stiker.match(/sticker_receptionist/) == "sticker_receptionist") {
                    $('#sticker_receptionist').prop('checked', true);
                    }
                    $("input[name='sticker_harga']").val(harga_stiker[8])                   
                        
  
                    
                    

                    
                    var roll = data.MARKETING_ROLL
                    if (roll.match(/roll_up_lobby/) == "roll_up_lobby") {
                    $('#roll_up_lobby').prop('checked', true);
                    }
                    if (roll.match(/roll_up_basemant/) == "roll_up_basemant") {
                    $('#roll_up_basemant').prop('checked', true);
                    }
                    if (roll.match(/roll_up_pintu_parkir/) == "roll_up_pintu_parkir") {
                    $('#roll_up_pintu_parkir').prop('checked', true);
                    }
                    if (roll.match(/roll_up_lift/) == "roll_up_lift") {
                    $('#roll_up_lift').prop('checked', true);
                    }
                    if (roll.match(/roll_up_swmg_pool/) == "roll_up_swmg_pool") {
                    $('#roll_up_swmg_pool').prop('checked', true);
                    }
                    if (roll.match(/roll_up_fitness/) == "roll_up_fitness") {
                    $('#roll_up_fitness').prop('checked', true);
                    }
                    if (roll.match(/roll_up_mgmt_office/) == "roll_up_mgmt_office") {
                    $('#roll_up_mgmt_office').prop('checked', true);
                    }
                    if (roll.match(/roll_up_receptionist/) == "roll_up_receptionist") {
                    $('#roll_up_receptionist').prop('checked', true);
                    }
                    $("input[name='roll_up_harga']").val(harga_roll[8])      



                    var acrilic = data.MARKETING_ACRILIC
                    if (acrilic.match(/acrilic_lobby/) == "acrilic_lobby") {
                    $('#acrilic_lobby').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_basemant/) == "acrilic_basemant") {
                    $('#acrilic_basemant').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_pintu_parkir/) == "acrilic_pintu_parkir") {
                    $('#acrilic_pintu_parkir').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_lift/) == "acrilic_lift") {
                    $('#acrilic_lift').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_swmg_pool/) == "acrilic_swmg_pool") {
                    $('#acrilic_swmg_pool').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_fitness/) == "acrilic_fitness") {
                    $('#acrilic_fitness').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_mgmt_office/) == "acrilic_mgmt_office") {
                    $('#acrilic_mgmt_office').prop('checked', true);
                    }
                    if (acrilic.match(/acrilic_receptionist/) == "acrilic_receptionist") {
                    $('#acrilic_receptionist').prop('checked', true);
                    }
                    $("input[name='acrilic_harga']").val(harga_acrilic[8])
                    $('#DESKSURVEY').modal('show');
                }
            });

            setTimeout(function(){
            
            
            
                    if ( window.localStorage.getItem('PROPERTY_TYPE') == "Office Building") {
                        $("#Main_Hole_Ready_gedung").show()
                        $("#membantu_gedung").show()
                        $("#Infrastruktur_building").show()
                        $("#pembangunan_gedung").show()
                        $("#internet_service_gedung").show()
                        $("#mayoritas_jenis_usaha_gedung").show()
                        $("#rata_rata_gedung").show()

                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#average_apartemen").hide()
                        $("#main_hole_apartemen").hide()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").hide()
                        $("#status_penghuni").hide()
                        $("#pembangunan_land").hide()
                        $("#Metode_Pembangunan_land").hide()
                        $("#tower_apartemen").show ()
                        
                        $("#45ketas_text").hide()
                        $("#45keatas_input").hide()
                        $("#text_keluarga").text("Keluarga")

                        $("#jumlah_lantai_tower").show()
                        $("#jumlah_unit_tower").show()
                        $("#jumlah_yang_dihuni_tower").show()
                        $("#jumlah_tingkat_okupansi_tower").show()
                        $("#jumlah_unit_area_komersial_tower").hide()
                        $("#jumlah_area_komersial_dihuni_tower").hide()
                        $("#tingkat_okupansi_2").hide()
                        $("#jumlah_kendaraan_terdaftar").hide()
                        $("#presentase").hide();

                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                    } 


                     if ( window.localStorage.getItem('PROPERTY_TYPE') == "Pergudangan") {
                        $("#Main_Hole_Ready_gedung").show()
                        $("#membantu_gedung").show()
                        $("#Infrastruktur_building").show()
                        $("#pembangunan_gedung").show()
                        $("#internet_service_gedung").show()
                        $("#mayoritas_jenis_usaha_gedung").show()
                        $("#rata_rata_gedung").show()

                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#average_apartemen").hide()
                        $("#main_hole_apartemen").hide()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").hide()
                        $("#status_penghuni").hide()
                        $("#pembangunan_land").hide()
                        $("#Metode_Pembangunan_land").hide()
                        $("#tower_apartemen").show ()
                        
                        $("#45ketas_text").hide()
                        $("#45keatas_input").hide()
                        $("#text_keluarga").text("Keluarga")

                        $("#jumlah_lantai_tower").show()
                        $("#jumlah_unit_tower").show()
                        $("#jumlah_yang_dihuni_tower").show()
                        $("#jumlah_tingkat_okupansi_tower").show()
                        $("#jumlah_unit_area_komersial_tower").hide()
                        $("#jumlah_area_komersial_dihuni_tower").hide()
                        $("#tingkat_okupansi_2").hide()
                        $("#jumlah_kendaraan_terdaftar").hide()
                        $("#presentase").hide();

                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")

                    
                      } 

                       if ( window.localStorage.getItem('PROPERTY_TYPE') == "Ruko/Rukan") {
                        $("#Main_Hole_Ready_gedung").show()
                        $("#membantu_gedung").show()
                        $("#Infrastruktur_building").show()
                        $("#pembangunan_gedung").show()
                        $("#internet_service_gedung").show()
                        $("#mayoritas_jenis_usaha_gedung").show()
                        $("#rata_rata_gedung").show()

                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#average_apartemen").hide()
                        $("#main_hole_apartemen").show()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").hide()
                        $("#status_penghuni").hide()
                        $("#pembangunan_land").hide()
                        $("#Metode_Pembangunan_land").show()
                        $("#tower_apartemen").show ()
                        
                                                   $("#45ketas_text").hide()
                          $("#45keatas_input").hide()
                          $("#text_keluarga").text("Keluarga")
                    
                        $("#presentase").show();

                         $("#jumlah_lantai_tower").show()
                         $("#jumlah_unit_tower").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").hide()
                         $("#jumlah_area_komersial_dihuni_tower").hide()
                         $("#tingkat_okupansi_2").hide()
                         $("#jumlah_kendaraan_terdaftar").hide()


                    $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                    $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                    $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")

                      } 
                     if ( window.localStorage.getItem('PROPERTY_TYPE') == "Mix Use") {
                        $("#Main_Hole_Ready_gedung").hide()
                          $("#membantu_gedung").hide()
                          $("#Infrastruktur_building").hide()
                          $("#pembangunan_gedung").hide()
                          $("#internet_service_gedung").hide()
                          $("#mayoritas_jenis_usaha_gedung").hide()
                          $("#rata_rata_gedung").hide()
                          $("#pembangunan_land").hide()
                          $("#Metode_Pembangunan_land").hide()
                         $("#tower_apartemen_Building").hide()
                          $("#presentase").hide();


                         $("#jumlah_lantai_tower").show()
                         $("#jumlah_unit_tower").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").show()
                         $("#jumlah_area_komersial_dihuni_tower").show()
                         $("#tingkat_okupansi_2").show()
                         $("#jumlah_kendaraan_terdaftar").show()
                          $("#45ketas_text").hide()
                          $("#45keatas_input").hide()
                          $("#text_keluarga").text("Keluarga")
                          $("#re_wiring_apartemen").show()
                          $("#tower_apartemen").show()
                          $("#perapihan_apartemen").show()
                          $("#type_unit_apartemen").show()
                          $("#average_apartemen").show()
                          $("#main_hole_apartemen").show()
                          $("[id=Infrastruktur_apartemen]").show()
                          $("#biaya_apartemen").show()
                          $("#perofile_penghuni_apartemen").show()
                          $("#jenis_pekerjaan_apartemen").show()
                          $("#status_penghuni").show()

                      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                        } 

                        if ( window.localStorage.getItem('PROPERTY_TYPE') == "Apartemen") {
                        $("#Main_Hole_Ready_gedung").hide()
                          $("#membantu_gedung").hide()
                          $("#Infrastruktur_building").hide()
                          $("#pembangunan_gedung").hide()
                          $("#internet_service_gedung").hide()
                          $("#mayoritas_jenis_usaha_gedung").hide()
                          $("#rata_rata_gedung").hide()
                          $("#pembangunan_land").hide()
                          $("#Metode_Pembangunan_land").hide()
                         $("#tower_apartemen_Building").hide()
                          $("#presentase").hide();
                          $("#mt_Infrastruktur").removeClass("mt-3");
                          $("#mt_Infrastruktur").addClass("mt-5");

                         $("#jumlah_lantai_tower").show()
                         $("#jumlah_unit_tower").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").show()
                         $("#jumlah_area_komersial_dihuni_tower").show()
                         $("#tingkat_okupansi_2").show()
                         $("#jumlah_kendaraan_terdaftar").show()

                          
                          
                          
                           $("#45ketas_text").hide()
                          $("#45keatas_input").hide()
                          $("#text_keluarga").text("Keluarga")
                          
                          
                          



                          $("#re_wiring_apartemen").show()
                          $("#tower_apartemen").show()
                          
                          $("#perapihan_apartemen").show()
                          $("#type_unit_apartemen").show()
                          $("#average_apartemen").show()
                          $("#main_hole_apartemen").show()
                          $("[id=Infrastruktur_apartemen]").show()
                          $("#biaya_apartemen").show()
                          $("#perofile_penghuni_apartemen").show()
                          $("#jenis_pekerjaan_apartemen").show()
                          $("#status_penghuni").show()

                      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                        $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                        $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                        } 


                      if ( window.localStorage.getItem('PROPERTY_TYPE') == "Landed House") {
                    
                    
                        $("#Main_Hole_Ready_gedung").hide()
                        $("#Infrastruktur_building").hide()
                        $("#pembangunan_gedung").hide()
                        $("#mayoritas_jenis_usaha_gedung").hide()
                        $("#rata_rata_gedung").hide()
                        $("#re_wiring_apartemen").hide()
                        $("#perapihan_apartemen").hide()
                        $("#type_unit_apartemen").hide()
                        $("#main_hole_apartemen").hide()
                        $("[id=Infrastruktur_apartemen]").hide()
                        $("#biaya_apartemen").hide()
                        $("#perofile_penghuni_apartemen").hide()
                        $("#jenis_pekerjaan_apartemen").show()
                        $("#tower_apartemen").show()                        
                        $("#presentase").hide();
                        $("#Komposisi_Kewarganegaraan").hide();
                        
                    
                    
                         $("#text_jumlah_yang_dihuni").text("Jumlah Unit Terisi")

                         $("#jumlah_lantai_tower").hide()
                         $("#jumlah_unit_tower").show()
                         $("#empatlimakeatas").show()
                         $("#jumlah_yang_dihuni_tower").show()
                         $("#jumlah_tingkat_okupansi_tower").show()
                         $("#jumlah_unit_area_komersial_tower").hide()
                         $("#jumlah_area_komersial_dihuni_tower").hide()
                         $("#tingkat_okupansi_2").hide()
                         $("#jumlah_kendaraan_terdaftar").hide()

                    
                    
                   
                          $("#45ketas_text").show()
                          $("#45keatas_input").show()
                          $("#text_keluarga").text("Pasangan Muda")



                          $("#status_penghuni").show()
                          $("#membantu_gedung").show()
                          $("#perofile_penghuni_apartemen").show()
                          $("#internet_service_gedung").show()
                          $("#average_apartemen").show()
                          $("#pembangunan_land").show()
                          $("#Metode_Pembangunan_land").show()



                        $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
                          $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").removeClass("muncul")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL_GEDUNG").addClass("ilang")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("ilang")
                          $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("muncul")
                      }      
                
}, 100);

        }

        $('#BUILDING_NAME').text(data[1]);

    });

});
</script>
@endsection



{{-- jumlah_lantai_total 

jumlah_lantai_1
jumlah_unit_1
jumlah_yang_dihuni_1
tingkat_okupansi_1
jumlah_unit_area_kemerial_1
jumlah_area_komersial_dihuni_1
jumlah_tingkat_okupansi_1
jumlah_kendaraan_terdaftar_1 --}}