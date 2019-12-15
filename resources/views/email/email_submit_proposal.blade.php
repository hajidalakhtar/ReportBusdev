@php
$data = $template->SUBMIT_PROPOSAL;
$data = explode("!!building!!",$data);
$data_sementara = $data[1];
$data[1] = $building;
$real_data[0] =implode("",$data);
$data_2 = $data_sementara;
if (Count(explode("!!status!!",$data_2)) == 1) {
// dd("tes");
$real_data[1] = $data_2;
// $real_data[1] =implode(" ",$data_2);
$real_data= implode("",$real_data) ;

} else {
$data_2 = explode("!!status!!",$data_2);
$data_2_sementara = $data_2[1];
$data_2[1] = $status;
array_push($data_2, $data_2_sementara);
$real_data[1] =implode("",$data_2);
$real_data= implode("",$real_data) ;
}

@endphp
{{$real_data}}
{{-- 








@php
$data = $template->SUBMIT_PROPOSAL;
$data = explode("!!building!!",$data);
$data_sementara = $data[1];
$data[1] = $building;
$real_data[0] =implode("",$data);

$data_2 = $data_sementara;
$data_2 = explode("!!status!!",$data_2);
// dd(Count($data_2));
if (Count($data_2) == 1) {
$data_2[1] = "";
}
$data_2_sementara = $data_2[1];
$data_2[1] = $status;
if (Count($data_2) == 1) {
$data_2[1] = "";
}
array_push($data_2, $data_2_sementara);
$real_data[1] =implode("",$data_2);
$real_data=implode("",$real_data) ;
dd($real_data);
@endphp
{{$real_data}} --}}