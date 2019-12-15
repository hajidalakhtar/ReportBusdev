<?php

namespace App\Http\Controllers;

use Auth;
use App\Alert;
use App\Report;
use App\WebSetting;
use App\Tahun;
use DateTime;
use Illuminate\Auth\Access\Gate;
use App\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\sla;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function email($status)
    {

        $setting = WebSetting::find(1);
        $setting->email = $status;
        $setting->save();
        return "bisa";
    }
  
    public function cekemail()
    {
        $setting = WebSetting::find(1);
        return $setting->email;
    }

    public function index(Request $req)
    {

        // $data = Report::all();
        // for ($i = 0; $i < Count($data); $i++) {

        //     $date = new Carbon($data[$i]->PNL_FULL_SIGN_DATE);
        //     $date_1 = $date->format('d-m-Y');
        //     $data[$i]->PNL_FULL_SIGN_DATE = $date_1;
        //     $data[$i]->save();
        //     return "bisa";
        // }
        // dd(date('z'));
        if (date('z') === '0') {
            $tahun = new Tahun;
            $tahun->tahun = Carbon::now()->format('Y');
            $tahun->color =    str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            $tahun->save();
        }


        if (Auth::user()->role == "staff") {
            $user = User::find(Auth::user()->id);

            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();
            auth()->user()->assignRole('user');
            $now = Carbon::now();
            $repot_submit_proposal = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SUBMIT PROPOSAL")->where('SUBMIT_PROPOSAL_DATE', '!=', '0000-00-00')->get();
            $repot_boq = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', 'like', 'BOQ%')->where('BOQ_RECEIVED_DATE', '!=', '0000-00-00')->get();
            $repot_pks_sign = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SIGNED PKS")->where('PKS_DATE', '!=', '0000-00-00')->get();
            $repot_site_survey = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "SITE SURVEY")->where('SITE_SURVEY_DATE', '!=', '0000-00-00')->get();
            $repot_NEGOTIATION = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 1 - BUSINESS SCHEME")->where('SUBMIT_PROPOSAL_DATE', '!=', '0000-00-00')->get();
            $repot_PNL = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "PnL PROGRESS")->where('PNL_FULL_SIGN_DATE', '!=', '0000-00-00')->where('PNL_FULL_SIGN_DATE', '!=', '-')->where('PNL_FULL_SIGN_DATE', '!=', '?')->where('PNL_FULL_SIGN_DATE', '!=', '')->get();
            $repot_pks = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "NEGOTIATION 2 - PKS REVIEW")->where('PKS_REVIEW_DATE', '!=', '0000-00-00')->where('PKS_REVIEW_DATE', '!=', '-')->where('PKS_REVIEW_DATE', '!=', '?')->where('PKS_REVIEW_DATE', '!=', '')->get();
            $repot_roll = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "ROLL-OUT PROGRESS")->where('WO_DATE', '!=', '0000-00-00')->where('WO_DATE', '!=', '-')->where('WO_DATE', '!=', '?')->where('WO_DATE', '!=', '')->get();
            $repot_ready = Report::where("PIC_MNC", Auth::user()->name)->where('PROGRESS_STATUS', "READY TO SELL")->where('PKS_PDF', '!=', '0000-00-00')->get();
            $sla = sla::find(1);
            for ($i = 0; $i < Count($repot_submit_proposal); $i++) {
                $alert_submit_proposal = Alert::where('report_id', $repot_submit_proposal[$i]->id)->first();
                if ($alert_submit_proposal == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_submit_proposal[$i]->SUBMIT_PROPOSAL_DATE);
                    $date->addDay($sla->SUBMITPROPOSAL_TO_NEGOTIATION);
                    $submit_proposal_date = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($submit_proposal_date);


                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!!", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->BOQ_TO_PNL;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_submit_proposal[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->pesan = $real_data;
                        $alert->PROGRESS_STATUS = $repot_submit_proposal[$i]->PROGRESS_STATUS;

                        $alert->tgl_mulai = $submit_proposal_date;
                        $alert->report_id = $repot_submit_proposal[$i]->id;
                        $alert->save();
                    }
                }
            }

            // dd($repot_boq);
            for ($i = 0; $i < Count($repot_boq); $i++) {


                $alert_repot_boq = Alert::where('report_id', $repot_boq[$i]->id)->first();
                if ($alert_repot_boq == null) {

                    $date_boq = Carbon::createFromFormat('d-m-Y', $repot_boq[$i]->BOQ_RECEIVED_DATE);
                    $date_boq->addDay($sla->BOQ_TO_PNL);
                    $BOQ_RECEIVED_DATE = $date_boq->format('d-m-Y');
                    // dd($date_boq, $BOQ_RECEIVED_DATE);

                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($BOQ_RECEIVED_DATE);
                    // dd($bol);
                    // 
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!!", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->BOQ_TO_PNL;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_boq[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->pesan = $real_data;
                        $alert->PROGRESS_STATUS = $repot_boq[$i]->PROGRESS_STATUS;

                        $alert->tgl_mulai = $BOQ_RECEIVED_DATE;
                        $alert->report_id = $repot_boq[$i]->id;
                        $alert->save();
                    }
                }
            }


            for ($i = 0; $i < Count($repot_pks_sign); $i++) {
                $alert_pks_sign = Alert::where('report_id', $repot_pks_sign[$i]->id)->first();
                if ($alert_pks_sign == null) {

                    $pks_sign = Carbon::createFromFormat('d-m-Y', $repot_pks_sign[$i]->PKS_DATE);
                    $pks_sign->addDay($sla->SIGNEDPKS_TO_ROLLOUT);
                    $PKS_DATE = $pks_sign->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($PKS_DATE);
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!! ", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->SIGNEDPKS_TO_ROLLOUT;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_pks_sign[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $PKS_DATE;
                        $alert->PROGRESS_STATUS = $repot_pks_sign[$i]->PROGRESS_STATUS;

                        $alert->pesan = $real_data;
                        $alert->report_id = $repot_pks_sign[$i]->id;
                        $alert->save();
                    }
                }
            }



            for ($i = 0; $i < Count($repot_site_survey); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_site_survey[$i]->id)->first();
                if ($alert_site_survey == null) {

                    $date = Carbon::createFromFormat('d-m-Y', $repot_site_survey[$i]->SITE_SURVEY_DATE);
                    $date->addDay($sla->SITESURVE_TO_BOQ);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!! ", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->SITESURVE_TO_BOQ;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_site_survey[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_site_survey[$i]->PROGRESS_STATUS;

                        $alert->pesan = $real_data;
                        $alert->report_id = $repot_site_survey[$i]->id;
                        $alert->save();
                    }
                }
            }


            for ($i = 0; $i < Count($repot_NEGOTIATION); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_NEGOTIATION[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_NEGOTIATION[$i]->SUBMIT_PROPOSAL_DATE);
                    $date->addDay($sla->NEGOTIATION_TO_SITESURVEY);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!! ", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->NEGOTIATION_TO_SITESURVEY;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_NEGOTIATION[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_NEGOTIATION[$i]->PROGRESS_STATUS;

                        $alert->pesan = $real_data;
                        $alert->report_id = $repot_NEGOTIATION[$i]->id;
                        $alert->save();
                    }
                }
            }


            for ($i = 0; $i < Count($repot_PNL); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_PNL[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_PNL[$i]->PNL_FULL_SIGN_DATE);
                    $date->addDay($sla->PNL_TO_PKSREVIEW);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!! ", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->PNL_TO_PKSREVIEW;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_PNL[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_PNL[$i]->PROGRESS_STATUS;

                        $alert->pesan = $real_data;
                        $alert->report_id = $repot_PNL[$i]->id;
                        $alert->save();
                    }
                }
            }




            for ($i = 0; $i < Count($repot_pks); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_pks[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_pks[$i]->PKS_REVIEW_DATE);
                    $date->addDay($sla->PKSREVIEW_TO_SIGNEDPKS);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!! ", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->PKSREVIEW_TO_SIGNEDPKS;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_pks[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_pks[$i]->PROGRESS_STATUS;

                        $alert->pesan = $real_data;
                        $alert->report_id = $repot_pks[$i]->id;
                        $alert->save();
                    }
                }
            }

            for ($i = 0; $i < Count($repot_roll); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_roll[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_roll[$i]->WO_DATE);
                    $date->addDay($sla->ROLLOUT_TO_READYTOSELL);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $data = $sla->template;
                        $data = explode("!!lama!! ", $data);
                        $data_sementara = $data[1];
                        $data[1] = $sla->ROLLOUT_TO_READYTOSELL;
                        $real_data[0] = implode("", $data);
                        $data_2 = $data_sementara;
                        $data_2 = explode("!!building!!", $data_2);
                        $data_2_sementara = $data_2[1];
                        $data_2[1] = $repot_roll[$i]->BUILDING_NAME;
                        array_push($data_2, $data_2_sementara);
                        $real_data[1] = implode("", $data_2);
                        $real_data = implode("", $real_data);
                        // dd($real_data);
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_roll[$i]->PROGRESS_STATUS;

                        $alert->pesan = $real_data;
                        $alert->report_id = $repot_roll[$i]->id;
                        $alert->save();
                    }
                }
            }
            for ($i = 0; $i < Count($repot_ready); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_ready[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_ready[$i]->PKS_END);
                    $date->addMonths(-3);
                    $date_format = $date->format('d-m-Y');

                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    // dd(($now->format('d-m-Y')), strtotime($date_format), strtotime($now->format('d-m-Y')) >= strtotime($date_format));
                    if ($bol) {
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_ready[$i]->PROGRESS_STATUS;

                        $alert->pesan = "3 bulan lagi Contract " . $repot_ready[$i]->BUILDING_NAME . " Habis";
                        $alert->report_id = $repot_ready[$i]->id;
                        $alert->save();
                    }
                }
            }

            for ($i = 0; $i < Count($repot_ready); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_ready[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_ready[$i]->PKS_END);
                    $date->addMonths(-6);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_ready[$i]->PROGRESS_STATUS;
                        $alert->pesan = "6 bulan lagi Contract " . $repot_ready[$i]->BUILDING_NAME . " Habis";

                        // $alert->pesan = "Sudah 6 bulan Lebih Anda Masih Di ROLL-OUT di " . $repot_ready[$i]->BUILDING_NAME;
                        $alert->report_id = $repot_ready[$i]->id;
                        $alert->save();
                    }
                }
            }

            for ($i = 0; $i < Count($repot_ready); $i++) {
                $alert_site_survey = Alert::where('report_id', $repot_ready[$i]->id)->first();
                if ($alert_site_survey == null) {
                    $date = Carbon::createFromFormat('d-m-Y', $repot_ready[$i]->PKS_END);
                    $date->addMonths(-9);
                    $date_format = $date->format('d-m-Y');
                    $bol =  strtotime($now->format('d-m-Y')) >= strtotime($date_format);
                    if ($bol) {
                        $alert = new Alert;
                        $alert->user_id = Auth::user()->id;
                        $alert->tgl_mulai = $date_format;
                        $alert->PROGRESS_STATUS = $repot_ready[$i]->PROGRESS_STATUS;
                        $alert->pesan = "9 bulan lagi Contract " . $repot_ready[$i]->BUILDING_NAME . " Habis";

                        // $alert->pesan = "Sudah 9 bulan Lebih Anda Masih Di ROLL-OUT di " . $repot_ready[$i]->BUILDING_NAME;
                        $alert->report_id = $repot_ready[$i]->id;
                        $alert->save();
                    }
                }
            }


            return redirect(Route('staff.home'));
        } elseif (Auth::user()->role == "Master Admin") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();
            // Role::create(['name' => 'Master Admin']);
            // Permission::create(['name' => 'leader']);
            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('leader');
            auth()->user()->assignRole('Master Admin');

            // return view('admin/home');
            return redirect(Route('admin.Dashboard_home'));
        } elseif (Auth::user()->role == "planning") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();

            // Role::create(['name' => 'planning']);
            // Permission::create(['name' => 'leader']);
            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('planning');
            // dd("planning");
            // return view('planning.home');


            return redirect(Route('planning'));
        } elseif (Auth::user()->role == "pnl") {

            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();
            // Role::create(['name' => 'pnl']);
            // Permission::create(['name' => 'leader']);
            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('pnl');
            // dd("planning");
            // return view('pnl_role');
            return redirect(Route('pnl_role'));
        } elseif (Auth::user()->role == "pks") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();

            // Permission::create(['name' => 'pks']);
            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('pks');
            // dd("planning");
            // return view('pnl_role');
            return redirect(Route('pks_role'));
        } elseif (Auth::user()->role == "rts") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();

            // Permission::create(['name' => 'rts']);
            // Role::create(['name' => 'rts']);

            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('rts');
            // dd("planning");
            // return view('pnl_role');
            return redirect(Route('rts_role'));
        } elseif (Auth::user()->role == "rts") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();

            // Permission::create(['name' => 'rts']);
            // Role::create(['name' => 'rts']);

            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('rts');
            // dd("planning");
            // return view('pnl_role');
            return redirect(Route('rts_role'));
        } elseif (Auth::user()->role == "admin") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();

            // Permission::create(['name' => 'admin']);
            // Role::create(['name' => 'admin']);

            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('admin');
            // dd("planning");
            // return view('pnl_role');
            return redirect(Route('admin_role'));
        } elseif (Auth::user()->role == "revshare") {
            $user = User::find(Auth::user()->id);
            $user->last_login = \Carbon\Carbon::now()->format('d-m-Y  H:i');
            $user->save();

            // Permission::create(['name' => 'admin']);
            // Role::create(['name' => 'revshare']);

            // Permission::create(['name' => 'edit articles']);
            // $permission = Permission::create(['name' => 'edit articles']);
            // $permission->assignRole('planning');
            auth()->user()->assignRole('revshare');
            // dd("planning");
            // return view('pnl_role');
            return redirect(Route('revshare_role'));
        }
    }
}
