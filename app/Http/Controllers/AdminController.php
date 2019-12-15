<?php

namespace App\Http\Controllers;

use App\Report;
use Auth;
use App\sla;
use DateTime;
use DatePeriod;
use DateInterval;
use App\Produktivitas;
use App\Periode;
use App\Themplate;
use App\EmailSetting;
use App\Kota;
use App\Alert;
use App\Wilayah_kode;
use App\Message;
use App\Tahun;
use App\User;
use App\Provinsi;
use App\TemplateEmail;
use Carbon\Carbon;
use App\Export\ReportExport;
use App\WebSetting;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    | RETUN VIEW 
    |
    */
    public function Rev_share()
    {
        $report = Report::where('PROGRESS_STATUS', 'READY TO SELL')->get();
        $tahun = Tahun::all();
        $WebSetting = WebSetting::first();
        $report_data = [];


        for ($i = 0; $i < Count($report); $i++) {
            $mulai = $report[$i]->BASO_DATE;
            $mulai = explode("-", $mulai);
            $mulai = $mulai[2];
            $akhir = $report[$i]->PKS_END;
            $akhir = explode("-", $akhir);
            $akhir = $akhir[2];
            // dd($WebSetting->rev_share_tahun_range >= $mulai && $WebSetting->rev_share_tahun_range <= $akhir, $WebSetting->rev_share_tahun_range, $mulai, $akhir);
            if ($WebSetting->rev_share_tahun_range <= $mulai && $WebSetting->rev_share_tahun_range <= $akhir) {

                $periode = Periode::where("report_id", $report[$i]->id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
                if ($periode != null) {
                    $report[$i]->progress_1 = $periode->progress_1;
                    $report[$i]->progress_2 = $periode->progress_2;
                    $report[$i]->progress_3 = $periode->progress_3;
                    $report[$i]->progress_4 = $periode->progress_4;
                } else {
                    $report[$i]->progress_1 = "";
                    $report[$i]->progress_2 = "";
                    $report[$i]->progress_3 = "";
                    $report[$i]->progress_4 = "";
                }
                $report_data[$i] = $report[$i];
            }
        }
        return view('admin.rev_share', ['report' => $report_data, 'WebSetting' => $WebSetting, 'tahun' => $tahun]);

        // dd($report);


    }
    public function Ready(Request $req)
    {
        $report = Report::orderBy('id', 'DESC')->where('PROGRESS_STATUS', "READY TO SELL")->get();
        $provinsi = Provinsi::all();

        $site_survey = Report::where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where('PROGRESS_STATUS', "Sign PKS ")->count();
        $sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where('PROGRESS_STATUS', "REJECT")->count();
        // reject
        $REJECT_1 = Report::where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("REJECT_CODE", 6)->count();

        return view('admin.ready', [
            'report' => $report,
            'provinsi' => $provinsi,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'roll' => $roll,
            'pnl' => $pnl,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
        ]);
    }
    public function Dashboard_home()
    {



        $now = Carbon::now();
        $tahun = Tahun::all()->last();



        $lastData = Report::where('BASO_DATE', 'like', "%" . $tahun->tahun)->Where("PROGRESS_STATUS", "READY TO SELL")->get();
        $submit_proposal = Report::where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();


        $site_survey = Report::where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $negotiation = Report::where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();
        $boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where('PROGRESS_STATUS', "Sign PKS ")->count();
        $sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->get();
        $roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $roll_data = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->get();
        $pks_data = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->get();
        $reject = Report::where('PROGRESS_STATUS', "REJECT")->count();


        $total_hp = 0;
        for ($i = 0; $i < Count($sell); $i++) {
            $total_hp =  $sell[$i]->HP_PORT + $total_hp;
        }

        $total_hp_tahun = 0;
        for ($i = 0; $i < Count($lastData); $i++) {
            $total_hp_tahun =  $lastData[$i]->HP_PORT + $total_hp_tahun;
        }
        // dd($lastData);

        $total_hp_pnl = 0;
        for ($i = 0; $i < Count($roll_data); $i++) {
            $total_hp_pnl =  $roll_data[$i]->HP_PNL + $total_hp_pnl;
        }

        $total_hp_pnl_pks = 0;
        for ($i = 0; $i < Count($pks_data); $i++) {
            $total_hp_pnl_pks =  $pks_data[$i]->HP_PNL + $total_hp_pnl_pks;
        }
        $now->format('d-m-Y');

        $SUBMIT_PROPOSAL_NEGOTIATION = Alert::where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->select('tgl_mulai')->get();
        if (Count($SUBMIT_PROPOSAL_NEGOTIATION) != 0) {
            $SUBMIT_PROPOSAL_NEGOTIATION_DIFF = 0;
            for ($i = 0; $i < Count($SUBMIT_PROPOSAL_NEGOTIATION); $i++) {
                $date = $date = Carbon::parse($SUBMIT_PROPOSAL_NEGOTIATION[$i]->tgl_mulai);
                $SUBMIT_PROPOSAL_NEGOTIATION_ONE = $date->diffInDays($now->format('d-m-Y'));
                $SUBMIT_PROPOSAL_NEGOTIATION_DIFF = $SUBMIT_PROPOSAL_NEGOTIATION_DIFF + $SUBMIT_PROPOSAL_NEGOTIATION_ONE;
            }
            $SUBMIT_PROPOSAL_NEGOTIATION_DIFF_AVERAGE = $SUBMIT_PROPOSAL_NEGOTIATION_DIFF / Count($SUBMIT_PROPOSAL_NEGOTIATION);
        } else {
            $SUBMIT_PROPOSAL_NEGOTIATION_DIFF_AVERAGE = 0;
        }

        $NEGOTIATION_SITE_SURVEY = Alert::where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->select('tgl_mulai')->get();
        if (Count($NEGOTIATION_SITE_SURVEY) != 0) {
            $NEGOTIATION_SITE_SURVEY_DIFF = 0;
            for ($i = 0; $i < Count($NEGOTIATION_SITE_SURVEY); $i++) {
                $date = $date = Carbon::parse($NEGOTIATION_SITE_SURVEY[$i]->tgl_mulai);
                $NEGOTIATION_SITE_SURVEY_ONE = $date->diffInDays($now->format('d-m-Y'));
                $NEGOTIATION_SITE_SURVEY_DIFF = $NEGOTIATION_SITE_SURVEY_ONE + $NEGOTIATION_SITE_SURVEY_DIFF;
            }
            $NEGOTIATION_SITE_SURVEY_DIFF_AVERAGE = $NEGOTIATION_SITE_SURVEY_DIFF / Count($NEGOTIATION_SITE_SURVEY);
        } else {
            $NEGOTIATION_SITE_SURVEY_DIFF_AVERAGE = 0;
        }

        $SITE_SURVEY_BOQ = Alert::where('PROGRESS_STATUS', "SITE SURVEY")->select('tgl_mulai')->get();
        if (Count($SITE_SURVEY_BOQ) != 0) {
            $SITE_SURVEY_BOQ_DIFF = 0;
            for ($i = 0; $i < Count($SITE_SURVEY_BOQ); $i++) {
                $date = $date = Carbon::parse($SITE_SURVEY_BOQ[$i]->tgl_mulai);
                $SITE_SURVEY_BOQ_ONE = $date->diffInDays($now->format('d-m-Y'));
                $SITE_SURVEY_BOQ_DIFF = $SITE_SURVEY_BOQ_ONE + $SITE_SURVEY_BOQ_DIFF;
            }
            $SITE_SURVEY_BOQ_DIFF_AVERAGE = $SITE_SURVEY_BOQ_DIFF / Count($SITE_SURVEY_BOQ);
        } else {
            $SITE_SURVEY_BOQ_DIFF_AVERAGE = 0;
        }

        $BOQ_PNL = Alert::where('PROGRESS_STATUS', "BOQ, SITE SURVEY REPORT, DESIGN PROGRESS")->select('tgl_mulai')->get();
        if (Count($BOQ_PNL) != 0) {
            $BOQ_PNL_DIFF = 0;
            for ($i = 0; $i < Count($BOQ_PNL); $i++) {
                $date = $date = Carbon::parse($BOQ_PNL[$i]->tgl_mulai);
                $BOQ_PNL_ONE = $date->diffInDays($now->format('d-m-Y'));
                $BOQ_PNL_DIFF = $BOQ_PNL_ONE + $BOQ_PNL_DIFF;
            }
            $BOQ_PNL_DIFF_AVERAGE = $BOQ_PNL_DIFF / Count($BOQ_PNL);
        } else {
            $BOQ_PNL_DIFF_AVERAGE = 0;
        }

        $PNL_PKS = Alert::where('PROGRESS_STATUS', "PnL PROGRESS")->select('tgl_mulai')->get();
        if (Count($PNL_PKS) != 0) {
            $PNL_PKS_DIFF = 0;
            for ($i = 0; $i < Count($PNL_PKS); $i++) {
                $date = $date = Carbon::parse($PNL_PKS[$i]->tgl_mulai);
                $PNL_PKS_ONE = $date->diffInDays($now->format('d-m-Y'));
                $PNL_PKS_DIFF = $PNL_PKS_ONE + $PNL_PKS_DIFF;
            }
            $PNL_PKS_DIFF_AVERAGE = $PNL_PKS_DIFF / Count($PNL_PKS);
        } else {
            $PNL_PKS_DIFF_AVERAGE = 0;
        }

        $PKS_SIGEND_PKS = Alert::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->select('tgl_mulai')->get();
        if (Count($PKS_SIGEND_PKS) != 0) {
            $PKS_SIGEND_PKS_DIFF = 0;
            for ($i = 0; $i < Count($PKS_SIGEND_PKS); $i++) {
                $date = $date = Carbon::parse($PKS_SIGEND_PKS[$i]->tgl_mulai);
                $PKS_SIGEND_PKS_ONE = $date->diffInDays($now->format('d-m-Y'));
                $PKS_SIGEND_PKS_DIFF = $PKS_SIGEND_PKS_ONE + $PKS_SIGEND_PKS_DIFF;
            }
            $PKS_SIGEND_PKS_DIFF_AVERAGE = $PKS_SIGEND_PKS_DIFF / Count($PKS_SIGEND_PKS);
        } else {
            $PKS_SIGEND_PKS_DIFF_AVERAGE = 0;
        }

        $SIGEND_PKS_ROLL_OUT = Alert::where('PROGRESS_STATUS', "SIGNED PKS ")->select('tgl_mulai')->get();
        if (Count($SIGEND_PKS_ROLL_OUT) != 0) {
            $SIGEND_PKS_ROLL_OUT_DIFF = 0;
            for ($i = 0; $i < Count($SIGEND_PKS_ROLL_OUT); $i++) {
                $date = $date = Carbon::parse($SIGEND_PKS_ROLL_OUT[$i]->tgl_mulai);
                $SIGEND_PKS_ROLL_OUT_ONE = $date->diffInDays($now->format('d-m-Y'));
                $SIGEND_PKS_ROLL_OUT_DIFF = $SIGEND_PKS_ROLL_OUT_ONE + $SIGEND_PKS_ROLL_OUT_DIFF;
            }
            $SIGEND_PKS_ROLL_OUT_DIFF_AVERAGE = $SIGEND_PKS_ROLL_OUT_DIFF / Count($SIGEND_PKS_ROLL_OUT);
        } else {
            $SIGEND_PKS_ROLL_OUT_DIFF_AVERAGE = 0;
        }

        $ROLL_OUT_READY = Alert::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->select('tgl_mulai')->get();
        if (Count($ROLL_OUT_READY) != 0) {
            $ROLL_OUT_READY_DIFF = 0;
            for ($i = 0; $i < Count($ROLL_OUT_READY); $i++) {
                $date = $date = Carbon::parse($ROLL_OUT_READY[$i]->tgl_mulai);
                $ROLL_OUT_READY_ONE = $date->diffInDays($now->format('d-m-Y'));
                $ROLL_OUT_READY_DIFF = $ROLL_OUT_READY_ONE + $ROLL_OUT_READY_DIFF;
            }
            $ROLL_OUT_READY_DIFF_AVERAGE = $ROLL_OUT_READY_DIFF / Count($ROLL_OUT_READY);
        } else {
            $ROLL_OUT_READY_DIFF_AVERAGE = 0;
        }

        // dd($SUBMIT_PROPOSAL_NEGOTIATION, $NEGOTIATION_SITE_SURVEY, $SITE_SURVEY_BOQ, $BOQ_PNL, $PNL_PKS, $PKS_SIGEND_PKS, $SIGEND_PKS_ROLL_OUT, $ROLL_OUT_READY);
        $office_building = Report::where('PROPERTY_TYPE', "Office Building")->count();
        $apertemen = Report::where('PROPERTY_TYPE', "Apartemen")->count();
        $ruko = Report::where('PROPERTY_TYPE', "Ruko/Rukan")->count();
        $landed_house = Report::where('PROPERTY_TYPE', "Landed House")->count();
        $pergudangan = Report::where('PROPERTY_TYPE', "Pergudangan")->count();
        $mix = Report::where('PROPERTY_TYPE', "Mix Use")->count();





        $negotiation = Report::where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();
        $boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where('PROGRESS_STATUS', "Sign PKS ")->count();
        $sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->orderBy("BUILDING_NAME")->get();
        // dd($sell);
        $roll_out = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->orderBy("BUILDING_NAME")->get();
        $count_sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where('PROGRESS_STATUS', "REJECT")->count();

        // return view('admin.user', ['user' => $user]);


        $REJECT_1 = Report::where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("REJECT_CODE", 6)->count();

        return view('Dashboard_Home', [
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,
            'total_hp' => $total_hp,
            'total_hp_pnl' => $total_hp_pnl,
            'total_hp_tahun' => $total_hp_tahun,
            'total_hp_pnl_pks' => $total_hp_pnl_pks,
            'roll_out' => $roll_out,
            'pks_data' => $pks_data,


            'lastData' => $lastData,

            "office_building" => $office_building,
            "apertemen" => $apertemen,
            "ruko" => $ruko,
            "landed_house" => $landed_house,
            "pergudangan" => $pergudangan,
            "mix" => $mix,

            "SUBMIT_PROPOSAL_NEGOTIATION_DIFF_AVERAGE" => $SUBMIT_PROPOSAL_NEGOTIATION_DIFF_AVERAGE,
            "NEGOTIATION_SITE_SURVEY_DIFF_AVERAGE" => $NEGOTIATION_SITE_SURVEY_DIFF_AVERAGE,
            "SITE_SURVEY_BOQ_DIFF_AVERAGE" => $SITE_SURVEY_BOQ_DIFF_AVERAGE,
            "BOQ_PNL_DIFF_AVERAGE" => $BOQ_PNL_DIFF_AVERAGE,
            "PNL_PKS_DIFF_AVERAGE" => $PNL_PKS_DIFF_AVERAGE,
            "PKS_SIGEND_PKS_DIFF_AVERAGE" => $PKS_SIGEND_PKS_DIFF_AVERAGE,
            "SIGEND_PKS_ROLL_OUT_DIFF_AVERAGE" => $SIGEND_PKS_ROLL_OUT_DIFF_AVERAGE,
            "ROLL_OUT_READY_DIFF_AVERAGE" => $ROLL_OUT_READY_DIFF_AVERAGE,


            'negotiation' => $negotiation,
            'submit_proposal' => $submit_proposal,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'roll' => $roll,
            'pnl' => $pnl,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $count_sell,
            'ready_to_sell' => $sell,
            'reject' => $reject,
        ]);
    }

    public function ViewSLA()
    {
        $sla = sla::find(1);
        return view('admin.SLA', ['data' => $sla]);
    }
    public function databaseAdmin()
    {
        $report = Report::orderBy('id', 'DESC')->get();
        $provinsi = Provinsi::all();

        $site_survey = Report::where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where('PROGRESS_STATUS', "Sign PKS ")->count();
        $sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where('PROGRESS_STATUS', "REJECT")->count();
        // reject
        $REJECT_1 = Report::where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("REJECT_CODE", 6)->count();

        return view('admin.database', [
            'report' => $report,
            'provinsi' => $provinsi,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'roll' => $roll,
            'pnl' => $pnl,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
        ]);
    }

    public function home()
    {
        $report = Report::orderBy('id', 'DESC')->get();
        $report_ready_to_sell = Report::orderBy('id', 'DESC')->where('PROGRESS_STATUS', 'READY TO SELL')->paginate(5);
        $all_count_project = Report::all()->count();
        $site_survey = Report::where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where('PROGRESS_STATUS', "Sign PKS ")->count();
        $proposal = Report::where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $user = User::where('role', 'staff')->get();


        // reject
        $REJECT_1 = Report::where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("REJECT_CODE", 6)->count();
        // dd($REJECT_6);


        return view('admin.chart.charthome', [

            'Ready_To_sell' => $report_ready_to_sell,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,
            'report' => $report,
            'user' => $user,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
        ]);
    }

    public function summaryAdmin()
    {




        $report_all = Report::count();
        $desksurvey = Report::where('PROGRESS_STATUS', "DESK SURVEY")->count();
        // dd($desksurvey);
        $submit_proposal = Report::where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $site_survey = Report::where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $homepass_all = Report::where('PROGRESS_STATUS', "READY TO SELL")->get();
        $reject = Report::where('PROGRESS_STATUS', "REJECT")->get();
        $progress = $submit_proposal + $site_survey + $boq + $pnl + $pks_review + $Sign_pks   + $roll;
        $jumlah_homepass = 0;
        for ($i = 0; $i < Count($homepass_all); $i++) {
            $hasil = $jumlah_homepass + $homepass_all[$i]->HP_PORT;
            $jumlah_homepass = $hasil;
        }
        $ready_to_sell = Count($homepass_all);
        $reject = Count($reject);


        // $user = User::where('role', 'staff')->get();


        $Produktivitas = Produktivitas::find(1);
        $user = User::where('role', 'staff')->get();
        $holidayDays = explode(",", $Produktivitas->holidayDays);
        // dd($holidayDays[2]);
        // dd($this->getWorkingDays("01-01-2019", "30-08-2019", $holidayDays));
        // $holidays = array("2008-12-25", "2008-12-26", "2009-01-01");
        // dd($this->getWorkingDays("01-01-2019", "30-08-2019", $holidayDays));
        // 01-01-2019,05-02-2019,07-03-2019,03-04-2019,19-04-2019,01-05-2019,30-05-2019,03-06-2019,04-06-2019,05-06-2019,06-06-2019,07-06-2019,25-12-2019
        $produktivitas_jakarta_1 = 0;
        $produktivitas_jakarta_2 = 0;
        $produktivitas_jakarta_3 = 0;
        $produktivitas_semarang = 0;
        $produktivitas_surabaya = 0;
        for ($i = 0; $i < Count($user); $i++) {


            if ($user[$i]->wilayah == "JAKARTA 1") {
                $wilayah_reject = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT'");
            }
            if ($user[$i]->wilayah == "JAKARTA 2") {
                $wilayah_reject = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT'");
            }
            if ($user[$i]->wilayah == "JAKARTA 3") {
                $wilayah_reject = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT'");
            }
            if ($user[$i]->wilayah == "SEMARANG") {
                $wilayah_reject = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT'");
            }
            if ($user[$i]->wilayah == "SURABAYA") {
                $wilayah_reject = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT'");
            }


            if ($user[$i]->wilayah == "JAKARTA 1") {
                $wilayah_all = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` != 'REJECT'");
            }
            if ($user[$i]->wilayah == "JAKARTA 2") {
                $wilayah_all = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` != 'REJECT'");
            }
            if ($user[$i]->wilayah == "JAKARTA 3") {
                $wilayah_all = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` != 'REJECT'");
            }
            if ($user[$i]->wilayah == "SEMARANG") {
                $wilayah_all = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` != 'REJECT'");
            }
            if ($user[$i]->wilayah == "SURABAYA") {
                $wilayah_all = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` != 'REJECT'");
            }
            // $user[$i]->jumlah_hari =  $this->getWorkingDays($user[$i]->tgl_masuk, '30-08-2019', $holidayDays);
            $user[$i]->jumlah_hari =  $this->getWorkingDays($user[$i]->tgl_masuk, Carbon::now()->format('d-m-Y'), $holidayDays);
            $user[$i]->wilayah_reject = Count($wilayah_reject);
            $user[$i]->wilayah_all = Count($wilayah_all);
            $user[$i]->wilayah_total = Count($wilayah_reject) + Count($wilayah_all);
            $jumlah_hari =  $user[$i]->jumlah_hari;
            $wilayah_total =   $user[$i]->wilayah_total;
            if ($wilayah_total == 0) {
                $user[$i]->produktivitas = 0;
            } else {
                $hasil = $wilayah_total / $jumlah_hari;
                // dd($hasil);
                if ($user[$i]->wilayah == "JAKARTA 1") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_jakarta_1 =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "JAKARTA 2") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_jakarta_2 =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "JAKARTA 3") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_jakarta_3 =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "SEMARANG") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_semarang =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "SURABAYA") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_surabaya =  round($hasil, 5);
                    $user[$i]->save();
                }
            }
        }

        for ($i = 0; $i < Count($user); $i++) {
            $user[$i]->submit_proposal = Report::where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->site_survey = Report::where('PROGRESS_STATUS', "SITE SURVEY")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->boq = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->pnl = Report::where('PROGRESS_STATUS', "PnL PROGRESS")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->pks_review = Report::where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->Sign_pks = Report::where('PROGRESS_STATUS', "SIGNED PKS")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->proposal = Report::where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->sell = Report::where('PROGRESS_STATUS', "READY TO SELL")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->roll = Report::where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->Where('PIC_MNC', $user[$i]->name)->count();
            $user[$i]->reject = Report::where('PROGRESS_STATUS', "REJECT")->Where('PIC_MNC', $user[$i]->name)->count();
        }
        return  view('admin.summary', [
            'user' => $user,
            "report_all" => $report_all,
            "progress" => $progress,
            "jumlah_homepass" => $jumlah_homepass,
            "ready_to_sell" => $ready_to_sell,
            "reject" => $reject,
        ]);
    }

    public function ViewProduktivitas()
    {
        $Produktivitas = Produktivitas::find(1);
        $user = User::where('role', 'staff')->get();
        $holidayDays = explode(",", $Produktivitas->holidayDays);
        // dd($holidayDays[2]);
        // dd($this->getWorkingDays("01-01-2019", "30-08-2019", $holidayDays));
        // $holidays = array("2008-12-25", "2008-12-26", "2009-01-01");
        // dd($this->getWorkingDays("01-01-2019", "30-08-2019", $holidayDays));
        // 01-01-2019,05-02-2019,07-03-2019,03-04-2019,19-04-2019,01-05-2019,30-05-2019,03-06-2019,04-06-2019,05-06-2019,06-06-2019,07-06-2019,25-12-2019
        $produktivitas_jakarta_1 = 0;
        $produktivitas_jakarta_2 = 0;
        $produktivitas_jakarta_3 = 0;
        $produktivitas_semarang = 0;
        $produktivitas_surabaya = 0;
        for ($i = 0; $i < Count($user); $i++) {


            if ($user[$i]->wilayah == "JAKARTA 1") {
                $wilayah_reject = \DB::select('SELECT * FROM `jakarta_1` WHERE `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "JAKARTA 2") {
                $wilayah_reject = \DB::select('SELECT * FROM `jakarta_2` WHERE `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "JAKARTA 3") {
                $wilayah_reject = \DB::select('SELECT * FROM `jakarta_3` WHERE `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "SEMARANG") {
                $wilayah_reject = \DB::select('SELECT * FROM `semarang` WHERE `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "SURABAYA") {
                $wilayah_reject = \DB::select('SELECT * FROM `surabaya` WHERE `PROGRESS_STATUS` = "REJECT"');
            }


            if ($user[$i]->wilayah == "JAKARTA 1") {
                $wilayah_all = \DB::select('SELECT * FROM `jakarta_1` WHERE NOT `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "JAKARTA 2") {
                $wilayah_all = \DB::select('SELECT * FROM `jakarta_2` WHERE NOT `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "JAKARTA 3") {
                $wilayah_all = \DB::select('SELECT * FROM `jakarta_3` WHERE NOT `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "SEMARANG") {
                $wilayah_all = \DB::select('SELECT * FROM `semarang` WHERE NOT `PROGRESS_STATUS` = "REJECT"');
            }
            if ($user[$i]->wilayah == "SURABAYA") {
                $wilayah_all = \DB::select('SELECT * FROM `surabaya` WHERE `PROGRESS_STATUS` = "REJECT"');
            }
            // $user[$i]->jumlah_hari =  $this->getWorkingDays($user[$i]->tgl_masuk, '30-08-2019', $holidayDays);
            $user[$i]->jumlah_hari =  $this->getWorkingDays($user[$i]->tgl_masuk, Carbon::now()->format('d-m-Y'), $holidayDays);
            $user[$i]->wilayah_reject = Count($wilayah_reject);
            $user[$i]->wilayah_all = Count($wilayah_all);
            $user[$i]->wilayah_total = Count($wilayah_reject) + Count($wilayah_all);
            $jumlah_hari =  $user[$i]->jumlah_hari;
            $wilayah_total =   $user[$i]->wilayah_total;
            if ($wilayah_total == 0) {
                $user[$i]->produktivitas = 0;
            } else {
                $hasil = $wilayah_total / $jumlah_hari;
                // dd($hasil);
                if ($user[$i]->wilayah == "JAKARTA 1") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_jakarta_1 =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "JAKARTA 2") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_jakarta_2 =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "JAKARTA 3") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_jakarta_3 =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "SEMARANG") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_semarang =  round($hasil, 5);
                    $user[$i]->save();
                }
                if ($user[$i]->wilayah == "SURABAYA") {
                    $user[$i]->produktivitas = round($hasil, 5);
                    $produktivitas_surabaya =  round($hasil, 5);
                    $user[$i]->save();
                }
            }
        }
        // dd($produktivitas_jakarta_2);
        return view('admin.Produktivitas', [
            'Produktivitas' => $Produktivitas,
            'user' => $user,
            "produktivitas_jakarta_1" => $produktivitas_jakarta_1,
            "produktivitas_jakarta_2" => $produktivitas_jakarta_2,
            "produktivitas_jakarta_3" => $produktivitas_jakarta_3,
            "produktivitas_semarang" => $produktivitas_semarang,
            "produktivitas_surabaya" => $produktivitas_surabaya,
            'holidayDays' => $holidayDays
        ]);
    }
    public function viewTemplate()
    {
        $themplate = Themplate::all();
        return view('admin.themplate', ['themplate' => $themplate]);
    }

    public function updateAdmin()
    {
        // SELECT * FROM `TABLE 5` ORDER BY STR_TO_DATE(updated_at,'%d-%m-%Y') DESC
        $report = \DB::select('SELECT * FROM `TABLE 5`ORDER BY STR_TO_DATE(updated_at,"%d-%m-%Y %H:%i") DESC LIMIT 50');
        // 

        return view('admin.update', [
            'report' => $report
        ]);
    }
    public function User()
    {
        $user = User::all();
        return view('admin.user', ['user' => $user]);
    }


    public function Wilayah()
    {
        $wilayah = Wilayah_kode::all();
        $provinsi = Provinsi::all();
        return view('admin.wilayah', [
            'wilayah' => $wilayah,
            'provinsi' => $provinsi,
        ]);
    }

    public function ViewAlert()
    {
        $alert = Alert::all();
        $sla = sla::find(1);

        return view('admin.alert', ['alert' => $alert, 'sla' => $sla]);
    }
    public function email(Request $req)
    {
        $email = EmailSetting::first();
        $emailtemplate = TemplateEmail::first();

        return view('admin.email', ['email' => $email, 'emailtemplate' => $emailtemplate]);
    }















    /*
    |--------------------------------------------------------------------------
    | SAVE SETING 
    |--------------------------------------------------------------------------
    | NONE
    |
    */

    public function PostUpdateSLATemplate(Request $req)
    {
        $sla = SLA::find(1);
        $sla->template = $req->template;
        $sla->save();
        return redirect()->back();
    }

    public function PostUpdateProduktivitas(Request $req)
    {

        $Produktivitas = Produktivitas::find(1);
        // dd();
        //    1/1/2019,2/5/2019,3/7/2019,4/3/2019,4/19/2019,5/1/2019,5/30/2019,6/3/2019,6/4/2019,6/5/2019,6/6/2019,6/7/2019,12/25/2019
        $Produktivitas->holidayDays = implode(",", $req->produktivitas);
        // dd($Produktivitas->holidayDays);
        $Produktivitas->save();
        return redirect()->back();
    }
    public function ApiAllReport($user)
    {
        $report = Report::where('PIC_MNC', $user)->get();
        return ['data' => $report];
    }



    public function UpdateUser(Request $req)
    {
        $user  = User::find($req->id_user);


        $user->role = $req->role;
        $user->name = $req->pic_name;
        $user->gender = $req->gender;
        $user->real_email = $req->email;
        $user->wilayah = $req->wilayah;
        $user->save();

        if ($user->wilayah == "JAKARTA 1") {
            $wilayah = \DB::select("select `TABLE 5`.`id` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1'");
        }
        if ($user->wilayah == "JAKARTA 2") {
            $wilayah = \DB::select("select `TABLE 5`.`id` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2'");
        }
        if ($user->wilayah == "JAKARTA 3") {
            $wilayah = \DB::select("select `TABLE 5`.`id` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3'");
        }
        if ($user->wilayah == "SEMARANG") {
            $wilayah = \DB::select("select `TABLE 5`.`id` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG'");
        }

        if ($user->wilayah == "SURABAYA") {
            $wilayah = \DB::select("select `TABLE 5`.`id` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA'");
        } else {
            return redirect()->back();
        }

        // dd($wilayah);

        for ($i = 0; $i < count($wilayah); $i++) {
            $report = Report::find($wilayah[$i]->id);
            $report->PIC_MNC = $req->pic_name;
            $report->save();
        }

        for ($i = 0; $i < count($wilayah); $i++) {
            $alert = Alert::find($wilayah[$i]->id);
            $alert->PIC_MNC = $req->pic_name;
            $alert->save();
        }

        return redirect()->back();
    }


    public function newWilayah(Request $req)
    {
        $kota = Kota::find($req->CITY);
        $wilayah = new Wilayah_kode();
        $wilayah->name = $req->name;
        $wilayah->wilayah_kode = $req->CITY;
        $wilayah->nama_wilayah = $kota->name;
        $wilayah->save();

        return redirect()->back();
    }

    public function DeleteTemplate($id)
    {
        $template = Themplate::find($id);
        $template->delete();
        return redirect()->back();
    }


    public function PostUpdateSLA(Request $req)
    {
        $sla = sla::find(1);
        $sla->SUBMITPROPOSAL_TO_NEGOTIATION = $req->SUBMITPROPOSAL_TO_NEGOTIATION;
        $sla->NEGOTIATION_TO_SITESURVEY = $req->NEGOTIATION_TO_SITESURVEY;
        $sla->SITESURVE_TO_BOQ = $req->SITESURVE_TO_BOQ;
        $sla->BOQ_TO_PNL = $req->BOQ_TO_PNL;
        $sla->PNL_TO_PKSREVIEW = $req->PNL_TO_PKSREVIEW;
        $sla->PKSREVIEW_TO_SIGNEDPKS = $req->PKSREVIEW_TO_SIGNEDPKS;
        $sla->SIGNEDPKS_TO_ROLLOUT = $req->SIGNEDPKS_TO_ROLLOUT;
        $sla->ROLLOUT_TO_READYTOSELL = $req->ROLLOUT_TO_READYTOSELL;
        $sla->ROLLOUT_TO_REJECT = $req->ROLLOUT_TO_REJECT;
        $sla->template = $req->template;
        $sla->save();
        return redirect()->back();
    }

    public function  UpdatePIC(Request $req)
    {
        $report = Report::find($req->id_update_pic);
        $report->PIC_MNC = $req->staff;
        $report->BUILDING_NAME = $req->building_name;
        $report->save();
        return redirect()->back();
    }
    public function UpdateEmail(Request $req)
    {
        $email = EmailSetting::find(1);
        $email->SUBMIT_PROPOSAL = $req->SUBMIT_PROPOSAL;
        $email->BOQ = $req->BOQ;
        $email->PNL = $req->PNL;
        $email->SITE_SURVEY = $req->SITE_SURVEY;
        $email->SIGNED_PKS = $req->SIGNED_PKS;
        $email->save();
        return redirect()->back();
    }
    public function updateWilayah(Request $req)
    {
        $kota = Kota::find($req->CITY);
        $wilayah = Wilayah_kode::find($req->id);
        $wilayah->name = $req->name;
        $wilayah->wilayah_kode = $req->CITY;
        $wilayah->nama_wilayah = $kota->name;
        $wilayah->save();
        return redirect()->back();
    }

    // DELETE
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function deleteReport($id)
    {
        $alert = Alert::where('report_id', $id)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report =  Report::find($id);
        $report->delete();
        return redirect()->back();
    }




    /*
    |--------------------------------------------------------------------------
    | Template
    |--------------------------------------------------------------------------
    | NONE
    |
    */
    public function apiTemplate($id)
    {
        $themplate = Themplate::find($id);
        return $themplate;
    }
    public function postUpdateTemplate(Request $req)
    {
        $template = Themplate::find($req->id);
        $template->title = $req->title;
        $template->icon = $req->icon;
        $template->save();
        return redirect()->back();
    }
    public function postAddTemplate(Request $req)
    {
        $template = new Themplate;
        $file = $req->file('form');
        $ext = $file->getClientOriginalName();
        $newName_boq = $ext;
        $file->move('THEMPLATE', $newName_boq);
        $template->link = $newName_boq;
        $template->title = $req->title;
        $template->icon = $req->icon;
        $template->save();
        return redirect()->back();
    }
    public function UploadTemplate(Request $req)
    {
        $template = Themplate::find($req->id);
        $file = $req->file('form');
        $ext = $file->getClientOriginalName();
        $newName_boq = $ext;
        $file->move('THEMPLATE', $newName_boq);
        $template->link = $newName_boq;
        $template->save();
        return "berhasil";
    }
    public function UpdateTemplateEmailSUBMIT_PROPOSAL(Request $req)
    {
        $email = TemplateEmail::find(1);
        $email->SUBMIT_PROPOSAL = $req->SUBMIT_PROPOSAL;
        $email->save();
        return redirect()->back();
    }
    public function UpdateTemplateEmailSITE_SURVEY(Request $req)
    {
        $email = TemplateEmail::find(1);
        $email->SITE_SURVEY = $req->SITE_SURVEY;
        $email->save();
        return redirect()->back();
    }
    public function UpdateTemplateEmailBOQ(Request $req)
    {
        $email = TemplateEmail::find(1);
        $email->BOQ = $req->BOQ;
        $email->save();
        return redirect()->back();
    }
    public function UpdateTemplateEmailPNL(Request $req)
    {
        $email = TemplateEmail::find(1);
        $email->PNL = $req->PNL;
        $email->save();
        return redirect()->back();
    }
    public function UpdateTemplateEmailSIGNED_PKS(Request $req)
    {
        $email = TemplateEmail::find(1);
        $email->SIGNED_PKS = $req->SIGNED_PKS;
        $email->save();
        return redirect()->back();
    }


    /*
    |--------------------------------------------------------------------------
    | LAIN LAIN
    |--------------------------------------------------------------------------
    | NONE
    |
    */

    public function ExportReport($progress)
    {
        if ($progress == "Ready_To_sell") {
            $report = Report::Where('PROGRESS_STATUS', "READY TO SELL")->get();
            return view('ExportReport', ["report" => $report]);
        } else {
            $report = Report::all();
            return view('ExportReport', ["report" => $report]);
        }
    }

    function getWorkingDays($startDate, $endDate, $holidays)
    {
        $endDate = strtotime($endDate);
        $startDate = strtotime($startDate);

        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);
        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
        } else {

            if ($the_first_day_of_week == 7) {
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    $no_remaining_days--;
                }
            } else {
                $no_remaining_days -= 2;
            }
        }

        $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0) {
            $workingDays += $no_remaining_days;
        }
        foreach ($holidays as $holiday) {
            $time_stamp = strtotime($holiday);
            if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N", $time_stamp) != 6 && date("N", $time_stamp) != 7)
                $workingDays--;
        }

        return $workingDays;
    }
}
