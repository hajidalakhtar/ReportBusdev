<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Alert;
use Carbon\Carbon;
use App\EmailSetting;
use App\Http\Livewire\Tower;
use App\Report;
use App\WebSetting;
use App\Periode;
use App\Tahun;
use App\Provinsi;
use App\Kota;
use App\Themplate;
use Illuminate\Support\Facades\Hash;
use App\Message;
use App\Wilayah;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;
use App\TowerModel;
use App\TemplateEmail;
use App\Wilayah_kode;
use File;
use PDF;
use DataTables;
use Dompdf\Dompdf;

class StaffController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | StaffController (START)
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | VIEW STAFF 
    |--------------------------------------------------------------------------
    | RETURN VIEW STAFF
    |
    */

    public function ViewStaffRevshare()
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

        return view('planning.revshare',  ['report' => $report_data, 'WebSetting' => $WebSetting, 'tahun' => $tahun]);
    }

    public function ViewStaffhome(Request $req)
    {

        $report = Report::where("PIC_MNC", Auth::user()->name)->orderBy('id', 'DESC')->get();
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->whereNotIn("PROGRESS_STATUS", ["DESK SURVEY"])->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();
        // $hp = explode(",", $report->Jumlah_unit);
        // dd($hp);
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();




        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", "Exclusive")->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", "Limited ISP Provider")->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", "Sales isn t recommend")->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", "IKR/OSP isn t recommend")->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", "PnL calculation is not meet minimum margin profit")->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", "Business Scheme is not meet SOP")->count();
        // dd($REJECT_6);
        $total_hp_real = 0;
        for ($i = 0; $i < Count($report); $i++) {
            if ($report[$i]->PROGRESS_STATUS == "READY TO SELL") {
                if ($report[$i]->HP_PORT != null) {
                    $total_1 = $report[$i]->HP_PORT + $total_hp_real;
                    $total_hp_real = $total_1;
                }
            } else {
                $hp = explode(",", $report[$i]->Jumlah_unit);
                if ($hp[0] != null) {
                    $total_1 = $hp[10] + $total_hp_real;
                    $total_hp_real = $total_1;
                } else {
                    $total_1 = 0 + $total_hp_real;
                    $total_hp_real = $total_1;
                }
            }
        }



        return view('staff/home', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
            'total_hp' => $total_hp_real
        ]);
    }

    public function ViewStaffSortByProgress($PROGRESS_STATUS)
    {

        $report = Report::where("PIC_MNC", Auth::user()->name)->where("PROGRESS_STATUS", $PROGRESS_STATUS)->orderBy('id', 'DESC')->get();
        $report_all = Report::where("PIC_MNC", Auth::user()->name)->orderBy('id', 'DESC')->get();
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->whereNotIn("PROGRESS_STATUS", ["DESK SURVEY"])->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();
        // $hp = explode(",", $report->Jumlah_unit);
        // dd($hp);
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();




        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();
        // dd($REJECT_6);
        $total_hp_real = 0;
        // dd($report[1]->Jumlah_unit);

        $total_hp_real = 0;
        for ($i = 0; $i < Count($report_all); $i++) {
            if ($report_all[$i]->PROGRESS_STATUS == "READY TO SELL") {
                if ($report_all[$i]->HP_PORT != null) {
                    $total_1 = $report_all[$i]->HP_PORT + $total_hp_real;
                    $total_hp_real = $total_1;
                }
            } else {
                $hp = explode(",", $report_all[$i]->Jumlah_unit);
                if ($hp[0] != null) {
                    $total_1 = $hp[10] + $total_hp_real;
                    $total_hp_real = $total_1;
                } else {
                    $total_1 = 0 + $total_hp_real;
                    $total_hp_real = $total_1;
                }
            }
        }


        return view('staff.cari', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,
            'progres' => $PROGRESS_STATUS,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
            'total_hp' => $total_hp_real
        ]);
    }

    public function ViewRolePlanning()
    {
        $report = Report::where('PROGRESS_STATUS', 'like', 'BOQ%')->orderBy('id', 'DESC')->get();
        // dd($report);
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();


        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();

        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();


        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();

        return view('planning.home', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
        ]);
    }


    public function ViewRolePnl()
    {
        $report = Report::where('PROGRESS_STATUS', 'PnL PROGRESS')->orderBy('id', 'DESC')->get();
        // dd($report);
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();


        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();

        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();


        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();

        return view('planning.home', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'negotiation' => $negotiation,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
        ]);
    }

    public function ViewRolePks()
    {
        $report = Report::where('PROGRESS_STATUS', 'READY TO SELL')->orderBy('id', 'DESC')->get();
        // dd($report);
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();


        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();

        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();


        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();

        return view('planning.home', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
        ]);
    }


    public function ViewRoleRts()
    {
        $report = Report::where('PROGRESS_STATUS', 'READY TO SELL')->orderBy('id', 'DESC')->get();
        // dd($report);
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();


        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();

        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();


        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();

        return view('planning.rts', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | INPUT DATA
    |--------------------------------------------------------------------------
    | RETURN VIEW STAFF
    |
    */


    public function PostPdfIOM(Request $req)
    {
        $report = Report::find($req->id_iom_pdf);
        $file = $req->file('IOM_FULL_SIGNED');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('IOM_FULL_SIGNED', $newName);
        $report->IOM_FULL_SIGNED_PDF = $newName;
        if ($report->PKS_DATE != null) {
            $report->NEXT_PROGRESS = 9;
        }
        $report->save();

        return redirect()->back();
    }

    public function PostPdfDraftPnl(Request $req)
    {
        $report = Report::find($req->id_PNL_PDF);
        $file = $req->file('upload_draft_pnl_pdf');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('DraftPnl', $newName);
        $report->DraftPnlPdf = $newName;
        if ($report->PKS_DATE != null) {
            $report->NEXT_PROGRESS = 9;
        }
        $report->save();

        return redirect()->back();
    }


    public function PostPdfFp3(Request $req)
    {
        $report = Report::find($req->id_upload_FP3);
        $file = $req->file('upload_FP3');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('FP3', $newName);
        $report->FP3_PDF = $newName;
        dd($report->FP3_PDF);
        $report->save();

        return redirect()->back();
    }
    public function PostPdfAPD(Request $req)
    {
        $report = Report::find($req->id_apd_UPLOAD);
        $file = $req->file('upload_apd_pdf');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('APD', $newName);
        $report->APD_PDF = $newName;

        $report->save();

        return redirect()->back();
    }


    public function PostPdfPks(Request $req)
    {
        $report = Report::find($req->id_PKS_PDF);
        $file = $req->file('PKS_PDF_SIGN');
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('PKS', $newName);
        $report->PKS_PDF = $newName;
        $report->save();
        // return redirect()->back();
        return redirect()->back();
    }

    public function ViewDetailsProgres($id)
    {
        $report  = Report::find($id);
        // $tower = TowerModel::where('report_id', $id)->get();
        return view('details_progres', ['data' => $report]);
    }




    public function PostPdfWo(Request $req)
    {
        $report = Report::find($req->id_WO_PDF);
        $file = $req->file('wo_pdf');
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('WO', $newName);
        $report->WO_PDF = $newName;
        if ($report->WO_DATE != null) {
            $report->NEXT_PROGRESS = 5;
        }
        $report->save();
        return redirect()->back();
    }


    public function PostPdfBaso(Request $req)
    {
        $report = Report::find($req->id_BASO_PDF);
        $file = $req->file('baso_pdf');
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('BASO', $newName);
        $report->BASO_PDF = $newName;
        $report->save();
        return redirect()->back();
    }



    public function PostPdfFirstWo(Request $req)
    {
        $report = Report::find($req->id_FIRST_WO_PDF);
        $file = $req->file('UPLOAD_FIRST_WO');
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('WO_SITE_SURVEY', $newName);
        $report->WO_SITE_SURVEY = $newName;
        if ($report->WO_DATE != null) {
            $report->NEXT_PROGRESS = 10;
        }
        $report->save();
        return redirect()->back();
    }


    public function PostPdfTac(Request $req)
    {
        $report = Report::find($req->id_tac_pdf);
        $file = $req->file('Term_And_Condition');
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";

        $file->move('Term_And_Condition', $newName);
        $report->Term_And_Condition_pdf = $newName;
        if ($report->PKS_DATE != null) {
            $report->NEXT_PROGRESS = 9;
        }
        $report->save();
        return redirect()->back();
    }



    public function PostPdfFa(Request $req)
    {
        $report = Report::find($req->id_proposal_pdf);
        if ($report->ISP_EXISTING != null) {
            $report->NEXT_PROGRESS = 3;
        }
        $file = $req->file('form_fa');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('Form_FA', $newName);
        $report->NO_FA = $newName;

        $report->save();
        return redirect()->back();
    }

    public function PostPdfFaFull(Request $req)
    {
        $report = Report::find($req->id_SITE_SURVEY_PDF);
        File::delete('Form_FA/' . $report->NO_FA);
        $file = $req->file('UPLOAD_FA_FULL');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }

        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('Form_FA', $newName);
        $report->NO_FA = $newName;
        $report->save();

        return redirect()->back();
    }

    public function PostPdfFaRejectFull(Request $req)
    {
        $report = Report::find($req->id_proposal_pdf_reject);
        File::delete('Form_FA/' . $report->NO_FA);

        $file = $req->file('form_fa');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('Form_FA', $newName);
        $report->NO_FA = $newName;

        $report->save();
        return redirect()->back();
    }


    public function PostPdfBoqSiteSurvey(Request $req)
    {

        $report = Report::find($req->id_BOQ_PDF_SITE_SURVEY);
        // dd($report);
        $file = $req->file('site_survey_pdf');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $newName_survey = $ext;
        $file->move('SITE_SURVEY', $newName_survey);

        if ($report->BOQ_RECEIVED_DATE != null) {
            $report->NEXT_PROGRESS = 6;
        }

        $report->SITE_SURVEY_PDF = $newName_survey;
        $report->save();

        return redirect()->back();
    }

    public function PostPdfBoq(Request $req)
    {

        $report = Report::find($req->id_BOQ_UPLOAD);
        $file = $req->file('upload_boq_pdf');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $newName_boq = $ext;
        $file->move('BOQ', $newName_boq);
        $report->BOQ_PDF = $newName_boq;
        if ($report->BOQ_RECEIVED_DATE != null) {
            $report->NEXT_PROGRESS = 6;
        }
        $report->save();
        return redirect()->back();
    }

    public function PostPdfPnl(Request $req)
    {

        $report = Report::find($req->id_PNL_PDF);
        $file = $req->file('upload_pnl_pdf');
        if ($file->getClientSize() > 10000000) {
            return "Error file size terlalu besar";
        }
        $ext = $file->getClientOriginalName();
        $ext = explode('.', $ext);
        $newName = $ext[0] . ".pdf";
        $file->move('PNL', $newName);
        $report->PNL_PDF = $newName;
        if ($report->PNL_FULL_SIGN_DATE != null) {
            $report->NEXT_PROGRESS = 7;
        }
        $report->save();
        return redirect()->back();
    }
    // mobail
    public function ApiDetailsUser(Request $req)
    {
        $report = Report::where("PIC_MNC",$req->username)->orderBy('id', 'DESC')->count();
        $all_count_project = Report::where('PIC_MNC',$req->username)->whereNotIn("PROGRESS_STATUS", ["DESK SURVEY"])->count();
        $site_survey = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $boq = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $negotiation = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();
        // $hp = explode(",", $report->Jumlah_unit);
        // dd($hp);
        $proposal = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC",$req->username)->where('PROGRESS_STATUS', "REJECT")->count();
        $alertAll = Alert::where("user_id",$req->username)->get();




        $REJECT_1 = Report::where("PIC_MNC",$req->username)->where("REJECT_CODE", "Exclusive")->count();
        $REJECT_2 = Report::where("PIC_MNC",$req->username)->where("REJECT_CODE", "Limited ISP Provider")->count();
        $REJECT_3 = Report::where("PIC_MNC",$req->username)->where("REJECT_CODE", "Sales isn t recommend")->count();
        $REJECT_4 = Report::where("PIC_MNC",$req->username)->where("REJECT_CODE", "IKR/OSP isn t recommend")->count();
        $REJECT_5 = Report::where("PIC_MNC",$req->username)->where("REJECT_CODE", "PnL calculation is not meet minimum margin profit")->count();
        $REJECT_6 = Report::where("PIC_MNC",$req->username)->where("REJECT_CODE", "Business Scheme is not meet SOP")->count();
        
        return [
            'status' => 200,
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,

            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
        ];
    }
    public function PostLoginUser(Request $req)
    {
        $user = User::where('name', $req->username)->first();
        // dd($user);
        if ($user == null) {
            return ['status' => 404, 'login' => "email salah", "data" => "-"];
        }

        if (Hash::check($req->password, $user->password)) {
            return ['status' => 200, 'login' => "Behasil", "data" => $user];
        } else {
            return ['status' => 404, 'login' => "gagal", "data" => "-"];
        }
    }
    public function ApiReportDataUser(Request $req)
    {
        $report = Report::where("PIC_MNC", $req->username)->select("id", "BUILDING_NAME", 'ADDRESS')->orderBy('id', 'DESC')->get();
        return ["Status" => 200, "data" => $report];
    }


    public function apiReport($id)
    {
        $report = Report::find($id);

        $REVENUE_SHARE_new = (explode("%", $report->REVENUE_SHARE));
        $report->REVENUE_SHARE = $REVENUE_SHARE_new[0];
        $SALES_SIGNED = $report->SALES_SIGNED;
        $newSALES_SIGNED = date("m-d-Y", strtotime($SALES_SIGNED));
        $report->SALES_SIGNED = $newSALES_SIGNED;

        $SUBMIT_PROPOSAL_DATE = $report->SUBMIT_PROPOSAL_DATE;
        $newSUBMIT_PROPOSAL_DATE = date("m-d-Y", strtotime($SUBMIT_PROPOSAL_DATE));
        $report->SUBMIT_PROPOSAL_DATE = $newSUBMIT_PROPOSAL_DATE;

        $BUSDEV_SIGNED = $report->BUSDEV_SIGNED;
        $newBUSDEV_SIGNED = date("m-d-Y", strtotime($BUSDEV_SIGNED));
        $report->BUSDEV_SIGNED = $newBUSDEV_SIGNED;

        $BM_SIGNED = $report->BM_SIGNED;
        $newBM_SIGNED = date("m-d-Y", strtotime($BM_SIGNED));
        $report->BM_SIGNED = $newBM_SIGNED;

        $SALES_SIGNED = $report->SALES_SIGNED;
        $newSALES_SIGNED = date("m-d-Y", strtotime($SALES_SIGNED));
        $report->SALES_SIGNED = $newSALES_SIGNED;
        return $report;
    }
    public function PostUpdateDeskSurvey(Request $req)
    {


        $report = Report::find($req->id_DESK);
        // dd($report);

        // $report->PIC_MNC = $report->PIC_MNC;
        $report->NEXT_PROGRESS = 2;
        // $report->STATUS_BAGUNAN = $req->STRATA_TITLE_new . "," . $req->UDER_DEVELOPER . "," . $req->NOT_DEVELOPER . "," . $req->Clustering . "," . $req->Open_Area . "," . $req->SERVICE_APARTMENT . "," . $req->Existing . "," . $req->On_Progres;
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->COLOR_MAP_ONLINE = $req->COLOR_MAP_ONLINE;
        $report->ADDRESS = $req->ADDRESS;
        $report->CITY = $req->CITY;
        $report->PROVINCE = $req->PROVINCE;
        $report->SUBDISTRICT = $req->SUBDISTRICT;
        $report->COORDINATE = $req->COORDINATE;
        $report->PROPERTY_TYPE = $req->PROPERTY_TYPE;
        $report->STATUS_BAGUNAN = $req->status_bagunan;
        // $report->SITE_SURVEY = $req->tgl_desk_survey;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_DESK;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;

        // dd($report);
        $report->save();
        return redirect()->back();
    }



    public function PostUpdateSubmitProposal(Request $req)
    {

        if ($req->get("aktifitas") != null) {
            $aktifitas = $req->get("aktifitas") + array_fill(0, 3, 0);
            ksort($aktifitas);
            $str_aktifitas_implode = implode(",", $aktifitas);
        } else {
            $str_aktifitas_implode = "";
        }

        if ($req->get("POP_UP") != null) {
            $POP_UP = $req->get("POP_UP") + array_fill(0, 3, 0);
            ksort($POP_UP);
            $str_POP_UP_TABLE_implode = implode(",", $POP_UP);
        } else {
            $str_POP_UP_TABLE_implode = "";
        }

        if ($req->get("spanduk") != null) {
            $spanduk = $req->get("spanduk") + array_fill(0, 3, 0);
            ksort($spanduk);
            $str_penempatan_standuk_implode = implode(",", $spanduk);
        } else {
            $str_penempatan_standuk_implode = "";
        }

        if ($req->get("poster") != null) {
            $poster = $req->get("poster") + array_fill(0, 3, 0);
            ksort($poster);
            $str_Penempatan_Poster_implode = implode(",", $poster);
        } else {
            $str_Penempatan_Poster_implode = "";
        }


        if ($req->get("sticker") != null) {

            $sticker = $req->get("sticker") + array_fill(0, 3, 0);
            ksort($sticker);
            $str_sticker_implode = implode(",", $sticker);
        } else {
            $str_sticker_implode = "";
        }

        if ($req->get("roll") != null) {
            $roll = $req->get("roll") + array_fill(0, 3, 0);
            ksort($roll);
            $str_roll_implode = implode(",", $roll);
        } else {
            $str_roll_implode = "";
        }

        if ($req->get("acrilic") != null) {
            $acrilic = $req->get("acrilic") + array_fill(0, 3, 0);
            ksort($acrilic);
            $str_acrilic_implode = implode(",", $acrilic);
        } else {
            $str_acrilic_implode = '';
        }

        // if ($req->get("Infrastruktur") != null) {
        //     $Infrastruktur = $req->get("Infrastruktur") + array_fill(0, 3, 0);
        //     ksort($Infrastruktur);
        //     $str_Infrastruktur_implode = implode(",", $Infrastruktur);
        // } else {
        //     $str_Infrastruktur_implode = '';
        // }
        $alert = Alert::where('report_id', $req->id_proposal)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_proposal);


        $report->Jumlah_Lantai = $req->jumlah_lantai_1 . "," . $req->jumlah_lantai_2 . "," . $req->jumlah_lantai_3 . "," . $req->jumlah_lantai_4 . "," . $req->jumlah_lantai_5 . "," . $req->jumlah_lantai_6 . "," . $req->jumlah_lantai_7 . "," . $req->jumlah_lantai_8 . "," . $req->jumlah_lantai_9 . "," . $req->jumlah_lantai_10 . "," . $req->jumlah_lantai_total;
        $report->Jumlah_unit = $req->jumlah_unit_1 . "," . $req->jumlah_unit_2 . "," . $req->jumlah_unit_3 . "," . $req->jumlah_unit_4 . "," . $req->jumlah_unit_5 . "," . $req->jumlah_unit_6 . "," . $req->jumlah_unit_7 . "," . $req->jumlah_unit_8 . "," . $req->jumlah_unit_9 . "," . $req->jumlah_unit_10 . "," . $req->jumlah_unit_total;
        $report->Jumlah_Yang_di_huni = $req->jumlah_yang_dihuni_1 . "," . $req->jumlah_yang_dihuni_2 . "," . $req->jumlah_yang_dihuni_3 . "," . $req->jumlah_yang_dihuni_4 . "," . $req->jumlah_yang_dihuni_5 . "," . $req->jumlah_yang_dihuni_6 . "," . $req->jumlah_yang_dihuni_7 . "," . $req->jumlah_yang_dihuni_8 . "," . $req->jumlah_yang_dihuni_9 . "," . $req->jumlah_yang_dihuni_10 . "," . $req->jumlah_yang_dihuni_total;
        $report->Tingkat_Okupansi = $req->tingkat_okupansi_1 . "," . $req->tingkat_okupansi_2 . "," . $req->tingkat_okupansi_3 . "," . $req->tingkat_okupansi_4 . "," . $req->tingkat_okupansi_5 . "," . $req->tingkat_okupansi_6 . "," . $req->tingkat_okupansi_7 . "," . $req->tingkat_okupansi_8 . "," . $req->tingkat_okupansi_9 . "," . $req->tingkat_okupansi_10 . "," . $req->tingkat_okupansi_total;
        $report->JUMLAH_UNIT_AREA_KOMERSIAL = $req->jumlah_unit_area_kemerial_1 . "," . $req->jumlah_unit_area_kemerial_2 . "," . $req->jumlah_unit_area_kemerial_3 . "," . $req->jumlah_unit_area_kemerial_4 . "," . $req->jumlah_unit_area_kemerial_5 . "," . $req->jumlah_unit_area_kemerial_6 . "," . $req->jumlah_unit_area_kemerial_7 . "," . $req->jumlah_unit_area_kemerial_8 . "," . $req->jumlah_unit_area_kemerial_9 . "," . $req->jumlah_unit_area_kemerial_10 . "," . $req->jumlah_unit_area_kemerial_total;

        $report->JUMLAH_AREA_KOMERSIAL_DIHUNI = $req->jumlah_area_komersial_dihuni_1 . "," . $req->jumlah_area_komersial_dihuni_2 . "," . $req->jumlah_area_komersial_dihuni_3 . "," . $req->jumlah_area_komersial_dihuni_4 . "," . $req->jumlah_area_komersial_dihuni_5 . "," . $req->jumlah_area_komersial_dihuni_6 . "," . $req->jumlah_area_komersial_dihuni_7 . "," . $req->jumlah_area_komersial_dihuni_8 . "," . $req->jumlah_area_komersial_dihuni_9 . "," . $req->jumlah_area_komersial_dihuni_10 . "," . $req->jumlah_area_komersial_dihuni_total;
        $report->Jumlah_Tingkat_Okupansi = $req->jumlah_tingkat_okupansi_area_1 . "," . $req->jumlah_tingkat_okupansi_area_2 . "," . $req->jumlah_tingkat_okupansi_area_3 . "," . $req->jumlah_tingkat_okupansi_area_4 . "," . $req->jumlah_tingkat_okupansi_area_5 . "," . $req->jumlah_tingkat_okupansi_area_6 . "," . $req->jumlah_tingkat_okupansi_area_7 . "," . $req->jumlah_tingkat_okupansi_area_8 . "," . $req->jumlah_tingkat_okupansi_area_9 . "," . $req->jumlah_tingkat_okupansi_area_10 . "," . $req->jumlah_tingkat_okupansi_area_total;
        $report->JUMLAH_KENDARAAN_TERDAFTAR     = $req->jumlah_kendaraan_terdaftar_1 . "," . $req->jumlah_kendaraan_terdaftar_2 . "," . $req->jumlah_kendaraan_terdaftar_3 . "," . $req->jumlah_kendaraan_terdaftar_4 . "," . $req->jumlah_kendaraan_terdaftar_5 . "," . $req->jumlah_kendaraan_terdaftar_6 . "," . $req->jumlah_kendaraan_terdaftar_7 . "," . $req->jumlah_kendaraan_terdaftar_8 . "," . $req->jumlah_kendaraan_terdaftar_9 . "," . $req->jumlah_kendaraan_terdaftar_10 . "," . $req->jumlah_kendaraan_terdaftar_total;









        $report->MARKETING_AKTIFITAS = $req->aktifitas_lobby . "," . $req->aktifitas_basemant . "," . $req->aktifitas_pintu_parkir . "," . $req->aktifitas_lift . "," . $req->aktifitas_swmg_pool . "," . $req->aktifitas_fitness . "," . $req->aktifitas_mgmt_office . "," . $req->aktifitas_receptionist . "," . $req->aktifitas_harga;
        $report->MARKETING_POP_UP = $req->POP_UP_TABLE_lobby . "," . $req->POP_UP_TABLE_basemant . "," . $req->POP_UP_TABLE_pintu_parkir . "," . $req->POP_UP_TABLE_lift . "," . $req->POP_UP_TABLE_swmg_pool . "," . $req->POP_UP_TABLE_fitness . "," . $req->POP_UP_TABLE_mgmt_office . "," . $req->POP_UP_TABLE_receptionist . "," . $req->POP_UP_TABLE_harga;
        $report->MARKETING_SPANDUK = $req->penempatan_standuk_lobby . "," . $req->penempatan_standuk_basemant . "," . $req->penempatan_standuk_pintu_parkir . "," . $req->penempatan_standuk_lift . "," . $req->penempatan_standuk_swmg_pool . "," . $req->penempatan_standuk_fitness . "," . $req->penempatan_standuk_mgmt_office . "," . $req->penempatan_standuk_receptionist . "," . $req->standuk_harga;
        $report->MARKETING_POSTER = $req->Penempatan_Poster_lobby . "," . $req->Penempatan_Poster_basemant . "," . $req->Penempatan_Poster_pintu_parkir . "," . $req->Penempatan_Poster_lift . "," . $req->Penempatan_Poster_swmg_pool . "," . $req->Penempatan_Poster_fitness . "," . $req->Penempatan_Poster_mgmt_office . "," . $req->Penempatan_Poster_receptionist . "," . $req->Penempatan_Poster_harga;
        $report->MARKETING_STICKER = $req->sticker_lobby . "," . $req->sticker_basemant . "," . $req->sticker_pintu_parkir . "," . $req->sticker_lift . "," . $req->sticker_swmg_pool . "," . $req->sticker_fitness . "," . $req->sticker_mgmt_office . "," . $req->sticker_receptionist . "," . $req->sticker_harga;
        $report->MARKETING_ROLL = $req->roll_up_lobby . "," . $req->roll_up_basemant . "," . $req->roll_up_pintu_parkir . "," . $req->roll_up_lift . "," . $req->roll_up_swmg_pool . "," . $req->roll_up_fitness . "," . $req->roll_up_mgmt_office . "," . $req->roll_up_receptionist . "," . $req->roll_up_harga;
        $report->MARKETING_ACRILIC = $req->acrilic_lobby . "," . $req->acrilic_basemant . "," . $req->acrilic_pintu_parkir . "," . $req->acrilic_lift . "," . $req->acrilic_swmg_pool . "," . $req->acrilic_fitness . "," . $req->acrilic_mgmt_office . "," . $req->acrilic_receptionist . "," . $req->acrilic_harga;


        if ($report->NO_FA != null) {
            $report->NEXT_PROGRESS = 3;
        }


        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->Jumlah_Biaya = $req->PROGRESS_STATUS;










        $report->exclusivet_tahun = $req->thn;

        // $report->CITY = $req->CITY;
        // $report->PROVINCE = $req->PROVINSI;
        // $report->SUBDISTRICT = $req->WILAYAH;


        $report->Provider_Existing = $req->Provider_1 . "," . $req->Provider_2 . "," . $req->Provider_3 . "," . $req->Provider_4 . "," . $req->Provider_5;
        $report->Inet = $req->Inet_1 . "," . $req->Inet_2 . "," . $req->Inet_3 . "," . $req->Inet_4 . "," . $req->Inet_5;
        $report->TV = $req->TV_1 . "," . $req->TV_2 . "," . $req->TV_3 . "," . $req->TV_4 . "," . $req->TV_5;
        $report->Telp = $req->Telp_1 . "," . $req->Telp_2 . "," . $req->Telp_3 . "," . $req->Telp_4 . "," . $req->Telp_5;
        $report->Eksklusif_Y = $req->Eksklusif_y_1 . "," . $req->Eksklusif_y_2 . "," . $req->Eksklusif_y_3 . "," . $req->Eksklusif_y_4 . "," . $req->Eksklusif_y_5;
        // $report->Eksklusif_N = $req->Eksklusif_N_1 . "," . $req->Eksklusif_N_2 . "," . $req->Eksklusif_N_3 . "," . $req->Eksklusif_N_4 . "," . $req->Eksklusif_N_5;
        $report->Durasi_Kerjasama = $req->Durasi_Kerjasama_1 . "," . $req->Durasi_Kerjasama_2 . "," . $req->Durasi_Kerjasama_3 . "," . $req->Durasi_Kerjasama_4 . "," . $req->Durasi_Kerjasama_5;
        $report->Rev_Share = $req->Rev_Share_1 . "," . $req->Rev_Share_2 . "," . $req->Rev_Share_3 . "," . $req->Rev_Share_4 . "," . $req->Rev_Share_5;
        $report->Sewa_Lahan = $req->Sewa_Lahan_1 . "," . $req->Sewa_Lahan_2 . "," . $req->Sewa_Lahan_3 . "," . $req->Sewa_Lahan_4 . "," . $req->Sewa_Lahan_5;
        $report->Presentase_Operasional = $req->Weekday . "," . $req->Weekend . "," . $req->minggu;


        $report->Metode_Pembangunan_Infrastruktur = $req->KU . "," . $req->UG . "," . $req->Mixed;
        $report->Pembangunan_Infrastruktur_landed_house = $req->ODP . "," . $req->unit;
        $report->TYPE_UNIT = $req->type_unit_studio . ',' . $req->type_unit_1br . "," . $req->type_unit_2br . "," . $req->type_unit_3br . "," . $req->type_unit_penthouse;
        $report->HARGA_UNIT_TERTINGGI =  $req->tertingi;
        $report->HARGA_UNIT_TERENDAH =  $req->terendah;
        $report->RE_WIRING_FTTH =  $req->rewiring;
        $report->PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI = $req->perapihan;
        $report->MAIN_HOLE_READY_UNIT =  $req->main_hole_unit . "," . $req->main_hole_unit_gedung;
        $report->MAIN_HOLE_READY_KORIDOR = $req->main_hole_koridor;
        $report->INFRASTRUKTUR_TERSEDIA = $req->Infrastruktur_Coaxial . "," . $req->Infrastruktur_FTTH . "," . $req->Infrastruktur_ADSL . "," . $req->Infrastruktur_UTP;
        $report->TOTAL_OCCUPANCY = $req->TOTAL_OCCUPANCY . "%";
        $report->Membantu_Penjualan = $req->membantu;
        $report->INFRASTRUKTUR_KEPEMILIKAN = "Coaxial=" . $req->coaxial_radio . ",FTTH=" . $req->FTTH_radio . ",ADSL=" . $req->ADSL_radio . ",UTP=" . $req->UTP_radio;
        $report->BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI = $req->biaya . "," . $req->perapihan_biaya;
        $report->LAYANAN_YANG_DI_SEDIAKAN_MKM = $req->Internet . "," . $req->IPTV . "," . $req->Telephony;
        $report->TOTAL_UNIT = $req->TOTAL_UNIT;
        $report->KEWARGA_NEGARAAN_PENGHUNI = $req->Expatriat . "," . $req->Mayoritas_Negara . "," . $req->indonesia;
        $report->JENIS_PEKERJAAN = $req->mahasiswa . "," . $req->karyawan . "," . $req->pengusaha;
        $report->STATUS_PENGHUNI = $req->single . "," . $req->keluarga . "," . $req->empatlimakeatas;
        $report->MOBILEPHONE = $req->MOBILEPHONE;
        $report->SUBMIT_PROPOSAL_DATE = $req->SUBMIT_PROPOSAL_DATE;

        $report->BM_SIGNED = explode('-', $req->BM_SIGNED)[1] . '-' . explode('-', $req->BM_SIGNED)[0] . '-' . explode('-', $req->BM_SIGNED)[2];
        // dd($report->BM_SIGNED);
        $report->BUSDEV_SIGNED = explode('-', $req->BUSDEV_SIGNED)[1] . '-' . explode('-', $req->BUSDEV_SIGNED)[0] . '-' . explode('-', $req->BUSDEV_SIGNED)[2];
        // $report-> = $req->BUSDEV_SIGNED;
        $report->DEVELOPERORCOMPANY_NAME = $req->DEVELOPERORCOMPANY_NAME;
        $report->PHONEORMOBILE = $req->PHONEORMOBILE;
        $report->EMAIL = $req->EMAIL;
        $report->EMAIL_1 = $req->EMAIL_1;
        $report->NAME = $req->NAME;
        $report->Pembangunan_Infrastruktur = $req->Control_Room . "," . $req->Shaft;
        $report->Internet_Service = $req->Dedicated . "," . $req->Broadband;
        $report->ISP_EXISTING = $req->ISP_EXISTING;
        $report->TOTAL_TOWER = $req->TOTAL_TOWER;
        $report->TOTAL_FLOORORTOWER = $req->TOTAL_FLOORORTOWER;
        $report->exclusive = $req->exclusive;
        $report->rata_rata = $req->rata_rata;

        // dd($req->exclusive);
        $report->SOHO = $req->SOHO;
        $report->DEDICATED_INTERNET =  $req->DEDICATED_INTERNET;
        $report->DATA_COMMUNICATION = $req->DATA_COMMUNICATION;
        $report->RESIDENTIAL = $req->RESIDENTIAL;
        $report->Mayoritas_Jenis_Usaha = $req->Distributor . "," . $req->Resto . "," . $req->Bank . "," . $req->Mini_Market . "," . $req->Tour . "," . $req->Lembaga_Pendidikan . "," . $req->Konsultan . "," . $req->Modern_Market . "," . $req->ATPM . "," . $req->Agency . "," . $req->Others;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        return $this->KirimEmail($report->id);
        // return "Tes123123";
    }


    public function PostUpdateNegotiation(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_NEGOTIATION)->first();
        if ($alert != null) {
            $alert->delete();
        }

        $report = Report::find($req->id_NEGOTIATION);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->REVENUE_SHARE = $req->REVENUE_SHARE;
        $report->RENTAL_BASE = $req->RENTAL_BASE;
        $report->FREE_SERVICES = $req->FREE_SERVICE_1 . " Layanan + " . $req->FREE_SERVICE_2 . " + " . $req->FREE_SERVICE_3 . " + ." . $req->FREE_SERVICE_4;
        $report->FREE_SERVICES_1 = $req->FREE_SERVICE_5 . " Layanan + " . $req->FREE_SERVICE_6 . " + " . $req->FREE_SERVICE_7 . " + ." . $req->FREE_SERVICE_8;
        $report->FREE_WIFI = $req->FREE_WIFI;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_NEGOTION_1;
        $report->NEXT_PROGRESS = 4;

        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->ONE_TIME_FEE = $req->ONE_TIME_FEE;
        $report->save();
        return redirect()->back();
    }
    public function GetDeleteWilayah($id)
    {
        $wilayah = Wilayah_kode::find($id);
        $wilayah->delete();
        return redirect()->back();
    }


    public function site_survey(Request $req)
    {

        // dd($req->SELES_SIGNED);
        $alert = Alert::where('report_id', $req->id_SITE_SURVEY)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_SITE_SURVEY);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->SITE_SURVEY_DATE = $req->SITE_SURVEY_DATE;
        $report->NEXT_PROGRESS = 5;

        $report->SALES_SIGNED = $req->SALES_SIGNED;
        $report->WO_DATE_SITE_SURVEY = $req->WO_DATE_SITE_SURVEY;
        $report->GM_SALES_SIGNED = $req->GM_SALES_SIGNED;
        $report->RECOMMENDATION = $req->RECOMENDATION;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_SITE_SURVEY;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        // dd($report);
        // dd($report->GM_SALES_SIGNED);
        // return redirect()->back();
        return $this->KirimEmail($report->id);
    }
    public function admin_role(Request $req)
    {

        $report = Report::where('PROGRESS_STATUS', 'READY TO SELL')->orderBy('id', 'DESC')->get();
        // dd($report);
        $all_count_project = Report::where('PIC_MNC', Auth::user()->name)->count();
        $site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->count();
        $desk_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "DESK SURVEY")->count();
        $boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->count();
        $pnl = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->count();
        $pks_review = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->count();
        $Sign_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->count();
        $proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->count();
        $sell = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->count();
        $roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->count();
        $reject = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "REJECT")->count();
        $provinsi = Provinsi::all();
        $alertAll = Alert::where("user_id", Auth::user()->id)->get();

        $negotiation = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->count();

        $REJECT_1 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 1)->count();
        $REJECT_2 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 2)->count();
        $REJECT_3 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 3)->count();
        $REJECT_4 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 4)->count();
        $REJECT_5 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 5)->count();
        $REJECT_6 = Report::where("PIC_MNC", Auth::user()->name)->where("REJECT_CODE", 6)->count();

        return view('planning.admin', [
            'alert' => $alertAll,
            'REJECT_1' => $REJECT_1,
            'REJECT_2' => $REJECT_2,
            'REJECT_3' => $REJECT_3,
            'REJECT_4' => $REJECT_4,
            'REJECT_5' => $REJECT_5,
            'REJECT_6' => $REJECT_6,
            'report' => $report,
            'site_survey' => $site_survey,
            'boq' => $boq,
            'pnl' => $pnl,
            'negotiation' => $negotiation,
            'pks_review' => $pks_review,
            'Sign_pks' => $Sign_pks,
            'sell' => $sell,
            'reject' => $reject,
            'all' => $all_count_project,
            "proposal" => $proposal,
            'desk_survey' => $desk_survey,
            'submit_proposal' => $submit_proposal,
            'roll' => $roll,
            'provinsi' => $provinsi,
        ]);
    }
    public function pnl(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_PNL)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_PNL);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->PNL_FULL_SIGN_DATE = $req->PNL_DATE;
        $report->HP_PNL = $req->hp;
        $report->EXCLUSIVE = $req->status_kerjasama_pnl;


        $report->Tingkat_Okupansi_PNL = $req->tingkat_okupansi_pnl;
        $report->Occp_Based = $req->occp_based;
        $report->Total_Revenue = $req->total_revenue;
        $report->Investasi = $req->Investasi;
        $report->cpe_cost = $req->cpe_cost;
        $report->COGS = $req->COGS;
        $report->breakeven_point = $req->Breakeven;
        $report->Periode_kerjasama = $req->Periode_kerjasama;
        $report->Revenue_Share_persen = $req->pnl_rev_share_persen;
        $report->Revenue_Share_rp = $req->rev_share_rp;
        $report->Biaya_Sewa = $req->biaya_sewa;
        $report->ONE_TIME_FEE = $req->one_time_fee;
        $report->total_biaya = $req->total_biaya;
        $report->margin_by_total_duration = $req->magin_duration;
        $report->margin_persen = $req->margin_persentase;

        $report->FREE_SERVICES = $req->FREE_SERVICE_1 . " Layanan + " . $req->FREE_SERVICE_2 . " + " . $req->FREE_SERVICE_3 . " + ." . $req->FREE_SERVICE_4;
        $report->FREE_SERVICES_1 = $req->FREE_SERVICE_5 . " Layanan + " . $req->FREE_SERVICE_6 . " + " . $req->FREE_SERVICE_7 . " + ." . $req->FREE_SERVICE_8;
        // dd($report->FREE_SERVICES_1);
        if ($report->PNL_PDF != null) {
            $report->NEXT_PROGRESS = 7;
        }
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_PNL;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        return $this->KirimEmail($report->id);

        // return redirect()->back();
    }

    public function pks_date(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_PKS_REVIEW)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_PKS_REVIEW);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->NEXT_PROGRESS = 8;

        $report->PKS_REVIEW_DATE = $req->pks_review_date;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_PKS_REVIEW;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;

        $report->save();
        return redirect()->back();
    }

    public function ROLL_OUT(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_ROLL)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_ROLL);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->WO_DATE = $req->wo_date;
        // $report->PKS_DATE = $req->PKS_DATE;


        if ($report->WO_PDF != null) {
            $report->NEXT_PROGRESS = 10;
        }


        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_ROLL;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;

        $report->save();
        return $this->KirimEmail($report->id);

        // return redirect()->back();
    }

    public function SIGNED_PKS(Request $req)
    {

        $alert = Alert::where('report_id', $req->id_PKS_SIGN)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_PKS_SIGN);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;

        if ($report->IOM_FULL_SIGNED_PDF && $report->Term_And_Condition_pdf) {
            $report->NEXT_PROGRESS = 9;
        }

        $report->PKS_DATE = $req->PKS_DATE;
        // dd($report->PKS_DATE);

        $report->DEAL_YEAR = $req->Deal_Year;
        $report->NO_PKS = $req->No_PKS;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_PKS_SIGN;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        return $this->KirimEmail($report->id);

        // return redirect()->back();
    }

    public function reject(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_REJECT)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_REJECT);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->REJECT_DATE = $req->reject_date;
        $report->REJECT_CODE = $req->Reject_Code;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_REJECT;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        // dd($report);
        return $this->KirimEmail($report->id);
    }
    public function ready(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_READY)->first();
        if ($alert != null) {
            $alert->delete();
        }
        $report = Report::find($req->id_READY);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;

        $report->BASO_DATE = $req->baso_date;
        $report->PKS_END = $req->pks_end;
        $report->CONTRACT_DURATION = $req->duration;
        $report->HP_PORT = $req->hp_port;
        $report->BASOORBAST_No = $req->BASO;
        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_READY;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        return $this->KirimEmail($report->id);

        // return redirect()->back();
    }


    public function boq(Request $req)
    {
        $alert = Alert::where('report_id', $req->id_BOQ)->first();
        if ($alert != null) {
            $alert->delete();
        }
        // dd($req->id_4);
        $report = Report::find($req->id_BOQ);
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;

        $report->BOQ_RECEIVED_DATE = $req->BOQ_DATE;

        if ($report->BOQ_RECEIVED_DATE != null && $report->BOQ_PDF != null) {
            $report->NEXT_PROGRESS = 6;
        }

        $report->UPDATE_PROGRESS = $req->UPDATE_PROGRESS_BOQ;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        return $this->KirimEmail($report->id);

        // return redirect()->back();
    }

    // public function update_site_survey($id)
    // {
    //     $report = Report::find($req->id);
    //     $report->SITE_SURVEY = $req->tangal_upload_site_survey;
    //     $file = $req->file('form_fa');

    //     $newName = rand(100000000,1001238912).".".$ext;
    //     $file->move('Form_FA',$newName);
    //     $report->NO_FA = $newName;
    //     $report->save();
    //     return redirect()->back()  ;      
    // }




    public function newReport(Request $req)
    {
        $report = new Report;
        $report->PIC_MNC = Auth::user()->name;
        $report->BUILDING_NAME = $req->BUILDING_NAME;
        $report->PROGRESS_STATUS = $req->PROGRESS_STATUS;
        $report->COLOR_MAP_ONLINE = $req->COLOR_MAP_ONLINE;
        $report->ADDRESS = $req->ADDRESS;

        $report->COORDINATE = $req->COORDINATE;
        $report->PROPERTY_TYPE = $req->PROPERTY_TYPE;
        $report->STATUS_BAGUNAN = $req->status_bangunan;

        // dd($req->COORDINATE, $req->status_bangunan);

        $provinsi = $this->CekProvinsi($req->PROVINCE_1)->name;
        $kota = $this->CekKota($req->CITY)->name;
        $wilayah = $this->CekWilayah($req->SUBDISTRICT)->name;
        $report->CITY = $kota;
        $report->PROVINCE = $provinsi;
        $report->SUBDISTRICT = $wilayah;

        // dd($report);

        $report->Harga_Sewa = $req->harga_sewa;
        $report->SITE_SURVEY = $req->SUBMIT_PROPOSAL_DATE;
        $report->LAUNCH_DATE = $req->launch_data;
        $report->updated_at = \Carbon\Carbon::now()->format('d-m-Y  H:i');;
        $report->save();
        return redirect()->back();
    }



    /*
    |--------------------------------------------------------------------------
    | WILAYAH
    |--------------------------------------------------------------------------
    | RETURN API WILAYAH
    |
    */

    public function Kota($id)
    {
        $kota = Kota::where('province_id', $id)->get();
        // $kota[0] = "<option selected>Pilih Kota</option>";
        echo  "<option selected value='default'>Pilih Kota</option>";
        for ($i = 0; $i < count($kota); $i++) {
            echo "<option value='" . $kota[$i]->id . "'>" . $kota[$i]->name . "</option>";
        }
    }
    public function Wilayah($id)
    {
        $wilayah = Wilayah::where('regency_id', $id)->get();
        // $kota[0] = "<option selected>Pilih Kota</option>";
        echo  "<option selected value='default'>Pilih Wilayah</option>";
        for ($i = 0; $i < count($wilayah); $i++) {
            echo "<option value='" . $wilayah[$i]->id . "'>" . $wilayah[$i]->name . "</option>";
        }
    }

    public function CekProvinsi($id)
    {
        $provinsi = Provinsi::find($id);
        return $provinsi;
    }
    public function CekKota($id)
    {
        $provinsi = kota::find($id);
        return $provinsi;
    }
    public function CekWilayah($id)
    {
        $provinsi = Wilayah::find($id);
        return $provinsi;
    }

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    | API
    |
    */
    // 
    public function ApiReportByData($progress)
    {
        $report = Report::where("PIC_MNC", Auth::user()->name)->where("PROGRESS_STATUS", $progress)->orderBy('id', 'DESC')->get();
        // 
        return DataTables::of($report)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a class="btn btn-primary"  class="detailss" onclick="window.localStorage.setItem(' . "'progres'" . ', ' . "'VIEW'" . ');" target="_blank" href="' . Route("DetailsProgres", $row->id) . '">DETAILS</a>';

                // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                return $btn;
            })
            ->addColumn('alert', function ($row) {
                $alert =  Alert::where('report_id', $row->id)->first();
                if ($alert != null) {
                    return "YES";
                } else {
                    return "NO";
                }
            })
            ->rawColumns(['action', 'alert'])
            ->make(true);
    }
    public function ApiReportData()
    {
        $report = Report::where("PIC_MNC", Auth::user()->name)->get();
        // dd($report);    
        // 
        return DataTables::of($report)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a class="btn btn-primary"  class="detailss" onclick="window.localStorage.setItem(' . "'progres'" . ', ' . "'VIEW'" . ');" target="_blank" href="' . Route("DetailsProgres", $row->id) . '">DETAILS</a>';

                // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                return $btn;
            })
            ->addColumn('alert', function ($row) {
                $alert =  Alert::where('report_id', $row->id)->first();
                if ($alert != null) {
                    return "YES";
                } else {
                    return "NO";
                }
            })
            ->rawColumns(['action', 'alert'])
            ->make(true);
    }
    public function PostAddRevWebSetting(Request $req)
    {
        $WebSetting = WebSetting::first();
        $WebSetting->rev_share_tahun = $req->tahun;
        $WebSetting->save();
        // dd($WebSetting);
        return "bisa";
    }
    public function PostAddRevWebReageSetting(Request $req)
    {
        $WebSetting = WebSetting::first();
        $WebSetting->rev_share_tahun_range = $req->tahun;
        $WebSetting->save();
        // dd($WebSetting);
        return "bisa";
    }
    public function details_revshare($id)
    {
        $WebSetting = WebSetting::first();
        $Periode = Periode::where("report_id", $id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
        return ["periode" => $Periode];
    }
    public function addPeriode_1(Request $req)
    {
        $WebSetting = WebSetting::first();

        $Periode = Periode::where("report_id", $req->id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }


        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        $Periode->keterangan_1 = implode(",", $req->keterangan);
        $Periode->tgl_1 = implode(",", $req->tgl);
        $Periode->tahun_periode = $req->tahun;
        $Periode->save();
        return redirect()->back();
    }
    public function addPeriode_2(Request $req)
    {
        $WebSetting = WebSetting::first();

        $Periode = Periode::where("report_id", $req->id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();

        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        $Periode->keterangan_2 = implode(",", $req->keterangan);
        $Periode->tgl_2 = implode(",", $req->tgl);
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        return redirect()->back();
    }
    public function addPeriode_3(Request $req)
    {
        $WebSetting = WebSetting::first();
        $Periode = Periode::where("report_id", $req->id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();

        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        $Periode->keterangan_3 = implode(",", $req->keterangan);
        $Periode->tgl_3 = implode(",", $req->tgl);
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        return redirect()->back();
    }
    public function addPeriode_4(Request $req)
    {
        $WebSetting = WebSetting::first();

        $Periode = Periode::where("report_id", $req->id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();

        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        $Periode->keterangan_4 = implode(",", $req->keterangan);
        $Periode->tgl_4 = implode(",", $req->tgl);
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        return redirect()->back();
    }
    public function addProgressPeriode_1(Request $req, $id)
    {
        // dd($id);
        $WebSetting = WebSetting::first();
        $Periode = Periode::where("report_id", $id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        // $Periode->keterangan = $req->keterangan;
        // $Periode->tgl = $req->tgl;
        $Periode->progress_1 = $req->progress;
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        return "save";
    }
    public function addProgressPeriode_2(Request $req, $id)
    {
        // dd($id);
        $WebSetting = WebSetting::first();
        $Periode = Periode::where("report_id", $id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        // $Periode->keterangan = $req->keterangan;
        // $Periode->tgl = $req->tgl;
        $Periode->progress_2 = $req->progress;
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        // return redirect()->back();
        return "save";
    }
    public function addProgressPeriode_3(Request $req, $id)
    {
        // dd($id);
        $WebSetting = WebSetting::first();
        $Periode = Periode::where("report_id", $id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        // $Periode->keterangan = $req->keterangan;
        // $Periode->tgl = $req->tgl;
        $Periode->progress_3 = $req->progress;
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        return redirect()->back();
    }
    public function addProgressPeriode_4(Request $req, $id)
    {
        // dd($id);
        $WebSetting = WebSetting::first();
        $Periode = Periode::where("report_id", $id)->where('tahun_periode', $WebSetting->rev_share_tahun)->first();
        if ($Periode == null) {
            $Periode = new Periode;
            $Periode->report_id = $id;
        }
        if ($Periode->tahun_periode != $req->tahun) {
            $Periode = new Periode;
            $Periode->report_id = $req->id;
        }
        // $Periode->keterangan = $req->keterangan;
        // $Periode->tgl = $req->tgl;
        $Periode->progress_4 = $req->progress;
        $Periode->tahun_periode = $req->tahun;

        $Periode->save();
        return redirect()->back();
    }
    public function details_pdf($id)
    {
        $report = Report::find($id);
        return view('details_pdf', ['data' => $report]);
    }

    public function KirimEmail($id)
    {

        $setting = WebSetting::find(1);
        if ($setting->email == 1) {
            // update progres status
            $email = EmailSetting::first();
            $template = TemplateEmail::first();
            $report = Report::find($id);
            // dd($report->PROGRESS_STATUS);
            // dd();
            $TO_SUBMIT_PROPOSAL = explode(",", $email->SUBMIT_PROPOSAL);
            $TO_SITE_SURVEY = explode(",", $email->SITE_SURVEY);
            $TO_BOQ = explode(",", $email->BOQ);
            $TO_PNL = explode(",", $email->PNL);
            $TO_SIGNED_PKS = explode(",",  $email->SIGNED_PKS);
            $TO_ROLL_OUT = explode(",",  $email->ROLL_OUT);
            $TO_READY_TO_SELL = explode(",",  $email->READY_TO_SELL);
            // dd($TO_READY_TO_SELL);
            $to_name = "hajidalakhtar";
            $datamailer = array(
                'building' => $report->BUILDING_NAME,
                'status' => $report->PROGRESS_STATUS,
                'template' => $template,
                'id' => $id

            );
            $tampung_submit_proposal = 'email.email_submit_proposal';
            $tampung_site_survey = 'email.email_site_survey';
            $tampung_boq = 'email.email_boq';
            $tampung_pnl = 'email.email_pnl';
            $tampung_signed_pks = 'email.email_site_signed_pks';
            $tampung_roll_out = 'email.email_roll_out';
            $tampung_ready_to_sell = 'email.email_ready_to_sell';



            $tampung = 'emailku';
            if ($report->PROGRESS_STATUS == "SUBMIT PROPOSAL") {
                Mail::send($tampung_submit_proposal, $datamailer, function ($message) use ($to_name, $TO_SUBMIT_PROPOSAL, $report) {
                    $message->to($TO_SUBMIT_PROPOSAL, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");
                    $message->attach(public_path('/') . 'Form_FA/' . $report->NO_FA, [
                        'as' => $report->NO_FA,
                    ]);
                });
            }

            if ($report->PROGRESS_STATUS == "SITE SURVEY") {
                Mail::send($tampung_site_survey, $datamailer, function ($message) use ($to_name, $TO_SITE_SURVEY, $report) {
                    $message->to($TO_SITE_SURVEY, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");
                    $message->attach(public_path('/') . 'Form_FA/' . $report->NO_FA, [
                        'as' => $report->NO_FA,
                    ]);
                    $message->attach(public_path('/') . 'WO_SITE_SURVEY/' . $report->WO_SITE_SURVEY, [
                        'as' => $report->WO_SITE_SURVEY,
                    ]);
                });
            }



            if ($report->PROGRESS_STATUS == "BOQ, SITE SURVEY REPORT, DESIGN") {
                Mail::send($tampung_boq, $datamailer, function ($message) use ($to_name, $TO_BOQ, $report) {
                    $message->to($TO_BOQ, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");

                    $message->attach(public_path('/') . 'SITE_SURVEY/' . $report->SITE_SURVEY_PDF, [
                        'as' => $report->NO_SITE_SURVEY_PDFFA,
                    ]);
                    $message->attach(public_path('/') . 'BOQ/' . $report->BOQ_PDF, [
                        'as' => $report->BOQ_PDF,
                    ]);
                });
            }

            if ($report->PROGRESS_STATUS == "PnL PROGRESS") {
                Mail::send($tampung_pnl, $datamailer, function ($message) use ($to_name, $TO_PNL, $report) {
                    $message->to($TO_PNL, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");


                    $message->attach(public_path('/') . 'PNL/' . $report->PNL_PDF, [
                        'as' => $report->PNL_PDF,
                    ]);

                    $message->attach(public_path('/') . 'DraftPnl/' . $report->DraftPnlPdf, [
                        'as' => $report->DraftPnlPdf,
                    ]);
                });
            }
            if ($report->PROGRESS_STATUS == "SIGNED PKS") {
                Mail::send($tampung_signed_pks, $datamailer, function ($message) use ($to_name, $TO_SIGNED_PKS, $report) {
                    $message->to($TO_SIGNED_PKS, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");
                    $message->attach(public_path('/') . 'IOM_FULL_SIGNED/' . $report->IOM_FULL_SIGNED_PDF, [
                        'as' => $report->IOM_FULL_SIGNED_PDF,
                    ]);


                    $message->attach(public_path('/') . 'Term_And_Condition/' . $report->Term_And_Condition_pdf, [
                        'as' => $report->Term_And_Condition_pdf,
                    ]);
                });
            }
            if ($report->PROGRESS_STATUS == "ROLL-OUT PROGRESS") {
                Mail::send($tampung_roll_out, $datamailer, function ($message) use ($to_name, $TO_ROLL_OUT, $report) {
                    $message->to($TO_ROLL_OUT, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");

                    $message->attach(public_path('/') . 'WO/' . $report->WO_PDF, [
                        'as' => $report->WO_PDF,
                    ]);
                });
            }
            if ($report->PROGRESS_STATUS == "READY TO SELL") {
                Mail::send($tampung_ready_to_sell, $datamailer, function ($message) use ($to_name, $TO_READY_TO_SELL, $report) {
                    $message->to($TO_READY_TO_SELL, $to_name)
                        ->subject('Report Busdev');
                    $message->from('Busdev@mncplay.com', "Busdev");


                    $message->attach(public_path('/') . 'PKS/' . $report->PKS_PDF, [
                        'as' => $report->PKS_PDF,
                    ]);
                });
            }

            // if ($report->PROGRESS_STATUS == "REJECT") {
            //     Mail::send($tampung, $datamailer, function ($message) use ($to_name, $to_emails, $report) {
            //         $message->to($to_emails, $to_name)
            //             ->subject('Report Busdev');
            //         $message->from('Busdev@mncplay.com', "Busdev");


            //         $message->attach(public_path('/') . 'PKS/' . $report->PKS_PDF, [
            //             'as' => $report->PKS_PDF,
            //         ]);
            //     });
            // }
            return redirect()->back();
        } else {
            // dd('asdasd');
            return redirect()->back();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PASSWORD USER
    |--------------------------------------------------------------------------
    | NONE
    |
    */
    public function UpdatePassword(Request $req)
    {
        $user = User::find($req->id_user);
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back();
    }

    /*
    |--------------------------------------------------------------------------
    | Lain Lain
    |--------------------------------------------------------------------------
    | NONE
    |
    */
    // public function NowTahun()
    // {
    //     $now = Carbon::now()->format("Y");
    //     return $now;
    // }




    /*
    |--------------------------------------------------------------------------
    | StaffController (END)
    |--------------------------------------------------------------------------
    */
}
