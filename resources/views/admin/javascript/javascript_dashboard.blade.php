@php
$ready_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");


$REJECT_1 = \DB::select('SELECT * FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "REJECT" AND
`REJECT_CODE` = "Exclusive"');
$REJECT_1 = Count($REJECT_1);
$REJECT_2 = \DB::select('SELECT * FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "REJECT" AND
`REJECT_CODE` = "Limited ISP Provider"');
$REJECT_2 = Count($REJECT_2);
$REJECT_3 = \DB::select('SELECT * FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "REJECT" AND
`REJECT_CODE` = "Sales isn t recommend"');
$REJECT_3 = Count($REJECT_3);
$REJECT_4 = \DB::select('SELECT * FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "REJECT" AND
`REJECT_CODE` = "IKR/OSP isn t recommend"');
$REJECT_4 = Count($REJECT_4);
$REJECT_5 = \DB::select('SELECT * FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "REJECT" AND
`REJECT_CODE` = "minimum margin profit"');
$REJECT_5 = Count($REJECT_5);
$REJECT_6 = \DB::select('SELECT * FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "REJECT" AND
`REJECT_CODE` = "Business Scheme is not meet SOP"');
$REJECT_6 = Count($REJECT_6);







// dd($ready_jkt_1);

// Exclusive
// Limited ISP Provider
// Sales isn t recommend
// IKR/OSP isn t recommend
// PnL calculation is not meet
// minimum margin profit
// Business Scheme is not meet SOP




$ready_hp_jkt_1 = \DB::select('SELECT `HP_PORT` FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "READY TO SELL" AND
`PROPERTY_TYPE` = "Office Building"');
if ($ready_hp_jkt_1 == []) {
$ready_hp_jkt_1 = 0;
}else{
$hasil = 0;
for ($i=0; $i < Count($ready_hp_jkt_1) ; $i++) { $hasil=$ready_hp_jkt_1[$i]->HP_PORT + $hasil;
  }
  $ready_hp_jkt_1 = $hasil;
  };
  $ready_hp_jkt_2 = \DB::select('SELECT `HP_PORT` FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "READY TO SELL" AND
  `PROPERTY_TYPE` = "Apartemen"');
  if ($ready_hp_jkt_2 == []) {
  $ready_hp_jkt_2 = 0;
  }else{
  $hasil = 0;
  for ($i=0; $i < Count($ready_hp_jkt_2) ; $i++) { $hasil=$ready_hp_jkt_2[$i]->HP_PORT + $hasil;
    }
    $ready_hp_jkt_2 = $hasil;
    };
    $ready_hp_jkt_3 = \DB::select('SELECT `HP_PORT` FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "READY TO SELL" AND
    `PROPERTY_TYPE` = "Ruko/Rukan"');
    if ($ready_hp_jkt_3 == []) {
    $ready_hp_jkt_3 = 0;
    }else{
    $hasil = 0;
    for ($i=0; $i < Count($ready_hp_jkt_3) ; $i++) { $hasil=$ready_hp_jkt_3[$i]->HP_PORT + $hasil;
      }
      $ready_hp_jkt_3 = $hasil;
      };
      $ready_hp_semarang = \DB::select('SELECT `HP_PORT` FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "READY TO SELL" AND
      `PROPERTY_TYPE` = "Landed House"');
      if ($ready_hp_semarang == []) {
      $ready_hp_semarang = 0;
      }else{
      $hasil = 0;
      for ($i=0; $i < Count($ready_hp_semarang) ; $i++) { $hasil=$ready_hp_semarang[$i]->HP_PORT + $hasil;
        }
        $ready_hp_semarang = $hasil;
        };
        $ready_hp_surabaya = \DB::select('SELECT `HP_PORT` FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "READY TO SELL" AND
        `PROPERTY_TYPE` = "Pergudangan"');
        if ($ready_hp_surabaya == []) {
        $ready_hp_surabaya = 0;
        }else{
        $hasil = 0;
        for ($i=0; $i < Count($ready_hp_surabaya) ; $i++) { $hasil=$ready_hp_surabaya[$i]->HP_PORT +
          $hasil;
          }
          $ready_hp_surabaya = $hasil;
          };
          $ready_hp_mix_use = \DB::select('SELECT `HP_PORT` FROM `TABLE 5` WHERE `PROGRESS_STATUS` = "READY TO SELL" AND
          `PROPERTY_TYPE` = "Mix Use"');
          if ($ready_hp_mix_use == []) {
          $ready_hp_mix_use = 0;
          }else{
          $hasil = 0;
          for ($i=0; $i < Count($ready_hp_mix_use) ; $i++) { $hasil=$ready_hp_mix_use[$i]->HP_PORT +
            $hasil;
            }
            $ready_hp_mix_use = $hasil;
            };
            @endphp

            <script>
              $(document).ready(function() {
              $('#datatable').DataTable( {
                "paging" : false,
                "bInfo":false,
                "searching": false,
                "scrollY" : "150px",
                "responsive" : true,
                // "pageLength" : 3,
              // "scrollY": "200px",
              // "scrollCollapse": true,
              // "paging": false
              } );
              } );


              var ctx = document.getElementById("progress");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['SUBMIT PROPOSAL', "NEGOTIATION 1 - BUSINESS SCHEME" ,'SITE SURVEY', 'BOQ & APD', 'ROLL OUT',"Pnl Progress","PKS REVIEW","SIGNED PKS"],
    datasets: [{
      label: '# of Tomatoes',
      data: [{{$submit_proposal}},{{$negotiation}}, {{$site_survey}}, {{$boq}}, {{$roll}},{{$pnl}},{{$pks_review}},{{$Sign_pks}}],
      backgroundColor: [
        '#07B1FA',
        '#8DA9C4',
        '#0679FB',
        '#6C757D',
        '#FD803A',
        '#FFEA4A',
        '#D94360',
        '#001F3F',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
      ],
    
      borderWidth: 1
    }]
  },
  options: {
      legend: {
            display: false,
            },
   	cutoutPercentage: 40,
    responsive: false,

  }
});


var ctx = document.getElementById("property");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Office Building', 'Apartemen', 'Ruko/Rukan', 'Landed House','Pergudangan','Mix Use'],
    datasets: [{
      label: '# of Tomatoes',
      
      data: [{{$office_building}}, {{$apertemen}}, {{$ruko}}, {{$landed_house}} ,{{$pergudangan}},{{$mix}}],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
      legend: {
            display: false,
            },
   	cutoutPercentage: 40,
    responsive: false,

  }
});

var ctx = document.getElementById("rts");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['JAKARTA 1', 'JAKARTA 2', 'JAKARTA 3', 'SEMARANG',"SURABAYA"],
    datasets: [{
      label: '# of Tomatoes',
      data: [{{Count($ready_jkt_1)}}, {{Count($ready_jkt_2)}}, {{Count($ready_jkt_3)}}, {{Count($ready_semarang)}},{{Count($ready_surabaya)}}],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
      legend: {
            display: false,
            },
   	cutoutPercentage: 40,
    responsive: false,

  }
});





var ctx = document.getElementById("homepass");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Office Building', 'Apartemen', 'Ruko/Rukan', 'Landed House',"Pergudangan","Mix Use"],
    datasets: [{
      label: '# of Tomatoes',
      data: [{{$ready_hp_jkt_1}}, {{$ready_hp_jkt_2}}, {{$ready_hp_jkt_3}}, {{$ready_hp_semarang}},{{$ready_hp_surabaya}},{{$ready_hp_mix_use}}],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(75, 192, 192, 1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
      legend: {
            display: false,
            },
   	cutoutPercentage: 40,
    responsive: false,

  }
});










var ctx = document.getElementById("reject");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Exclusive', 'Limited ISP Provider', 'IKR/OSP isn t recommend', 'PnL calculation is not meet minimum margin profit' ,'Sales isn t recommend','Business Scheme is not meet SOP'],
    datasets: [{
      label: '# of Tomatoes',
      data: [{{$REJECT_1}}, {{$REJECT_2}}, {{$REJECT_3}}, {{$REJECT_4}},{{$REJECT_5}},{{$REJECT_6}}],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
      legend: {
            display: false,
            },
   	cutoutPercentage: 40,
    responsive: false,

  }
});
      var areaChartData = {
        labels: ['SLA'],
        datasets: [{
                  label: 'SUBMIT PROPOSAL >  NEGOTIATION 1 - BUSINESS SCHEME',
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: false,
                  pointColor: '#3b8bba',
                  pointStrokeColor: 'rgba(60,141,188,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data: [{{$SUBMIT_PROPOSAL_NEGOTIATION_DIFF_AVERAGE}}]
          },
          {
                  label: 'NEGOTIATION 1 - BUSINESS SCHEME > SITE SURVEY',
                  backgroundColor: '#8DA9C4',
                  borderColor: '#8DA9C4',
                  pointRadius: false,
                  pointColor: '#8DA9C4',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$NEGOTIATION_SITE_SURVEY_DIFF_AVERAGE}}]
          },
          {
                  label: 'SITE SURVEY > BOQ, SITE SURVEY REPORT, DESIGN PROGRESS',
                  backgroundColor: '#0679FB',
                  borderColor: '#0679FB',
                  pointRadius: false,
                  pointColor: '#0679FB',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$SITE_SURVEY_BOQ_DIFF_AVERAGE}}]
            },
            {
                  label: 'BOQ, SITE SURVEY REPORT, DESIGN PROGRESS > PnL PROGRESS',
                  backgroundColor: '#6C757D',
                  borderColor: '#6C757D',
                  pointRadius: false,
                  pointColor: '#6C757D',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$BOQ_PNL_DIFF_AVERAGE}}]
            },
            {
                  label: 'PnL PROGRESS > PKS REVIEW',
                  backgroundColor: '#FD803A',
                  borderColor: '#FD803A',
                  pointRadius: false,
                  pointColor: '#FD803A',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$PNL_PKS_DIFF_AVERAGE}}]
            },
            {
                  label: 'PKS REVIEW > SIGNED PKS',
                  backgroundColor: '#FFEA4A',
                  borderColor: '#FFEA4A',
                  pointRadius: false,
                  pointColor: '#FFEA4A',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$PKS_SIGEND_PKS_DIFF_AVERAGE}}]
            },
            {
                  label: 'SIGNED PKS > ROLL-OUT PROGRESS',
                  backgroundColor: '#D94360',
                  borderColor: '#D94360',
                  pointRadius: false,
                  pointColor: '#D94360',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$SIGEND_PKS_ROLL_OUT_DIFF_AVERAGE}}]
            },
            {
                  label: 'ROLL-OUT PROGRESS > READY TO SELL',
                  backgroundColor: '#001F3F',
                  borderColor: '#001F3F',
                  pointRadius: false,
                  pointColor: '#001F3F',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [{{$ROLL_OUT_READY_DIFF_AVERAGE}}]
            },
       
        ]
      }

var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, areaChartData)
    
    var stackedBarChartOptions = {
    // responsive: true,
    width:500,
    height:500,
    tooltips: {
      yAlign: 'top'
      },
  tooltips: {
    mode: 'single'
    },
      
    legend: {
    display: false,
    },
    maintainAspectRatio: false,
    scales: {
    xAxes: [{
    stacked: true,
    }],
    yAxes: [{
    stacked: true
    }]
    }
    }
    
    var stackedBarChart = new Chart(stackedBarChartCanvas, {
    type: 'horizontalBar',
    data: stackedBarChartData,
    options: stackedBarChartOptions
    })









            </script>