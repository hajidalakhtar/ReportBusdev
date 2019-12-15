<?php

/*
|--------------------------------------------------------------------------
| Web Routes (START)
|--------------------------------------------------------------------------
*/
// URL::forceSchema('https');

Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
| ROUTE UNTUK VIEW HOME
|
*/

Auth::routes();

Route::GET('/d/{id}', 'StaffController@ViewDetailsProgres')->name('DetailsProgres'); // DETAILS

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/staff', 'StaffController@ViewStaffhome')->name('staff.home');
Route::get('/staff/{PROGRESS_STATUS}', 'StaffController@ViewStaffSortByProgress')->name('PROGRESS_STATUS');
Route::GET('/planning', 'StaffController@ViewRolePlanning')->name('planning');
Route::GET('/pnl', 'StaffController@ViewRolePnl')->name('pnl_role');
Route::GET('/pks', 'StaffController@ViewRolePks')->name('pks_role');
Route::GET('/rts', 'StaffController@ViewRoleRts')->name('rts_role');
Route::GET('/admin', 'StaffController@admin_role')->name('admin_role');
Route::GET('/role/revshare', 'StaffController@ViewStaffRevshare')->name('revshare_role');



/*
|--------------------------------------------------------------------------
| UPDATE & NEW DATA
|--------------------------------------------------------------------------
|ROUTE UNTUK UPDATE & NEW DATA
|
*/

Route::POST('/post/new', 'StaffController@newReport')->name('new');
Route::POST('/update/report', 'StaffController@PostUpdateDeskSurvey')->name('update');
Route::POST('/update/proposal', 'StaffController@PostUpdateSubmitProposal')->name('update.proposal');
Route::POST('/update/proposal/building', 'StaffController@UpdateProposal_BUILDING')->name('update.proposal.UpdateProposal_BUILDING');
Route::POST('/post/tower/data', 'StaffController@PostTowerData')->name('post_data');

Route::POST('/update/negotiation', 'StaffController@PostUpdateNegotiation')->name('update.negotiation');
Route::POST('/update/boq', 'StaffController@boq')->name('update.boq');
Route::POST('/update/site_survey', 'StaffController@site_survey')->name('update.site_survey');
Route::POST('/update/pnl', 'StaffController@pnl')->name('update.pnl');
Route::POST('/update/pks_date', 'StaffController@pks_date')->name('update.pks_date');
Route::POST('/update/SIGNED_PKS', 'StaffController@SIGNED_PKS')->name('update.SIGNED_PKS');
Route::POST('/update/ROLL_OUT', 'StaffController@ROLL_OUT')->name('update.ROLL_OUT');
Route::POST('/update/reject', 'StaffController@reject')->name('update.reject');
Route::POST('/update/ready', 'StaffController@ready')->name('update.ready');


/*
|--------------------------------------------------------------------------
| UPLOAD PDF
|--------------------------------------------------------------------------
|ROUTE UNTUK UPDATE PDF
|
*/

Route::POST('/uploadFA', 'StaffController@PostPdfFa')->name('update.uploadFA');
Route::POST('/uploadFAFULL', 'StaffController@PostPdfFaFull')->name('update.uploadFAFULL');
Route::POST('/uploadFAFULLREJECT', 'StaffController@PostPdfFaRejectFull')->name('update.uploadFAFULLREJECT');

Route::POST('/uploadBOQ_SITE_SURVEY', 'StaffController@PostPdfBoqSiteSurvey')->name('uploadBOQ_SITE_SURVEY');
Route::POST('/uploadBOQ', 'StaffController@PostPdfBoq')->name('uploadBOQ');
Route::POST('/UploadPNL', 'StaffController@PostPdfPnl')->name('UploadPNL');
Route::POST('/updateIOM', 'StaffController@PostPdfIOM')->name('updateIOM');
Route::POST('/updateTAC', 'StaffController@PostPdfTac')->name('updateTAC');
Route::POST('/updateWO', 'StaffController@PostPdfWo')->name('updateWO');
Route::POST('/updateFIRSTWO', 'StaffController@PostPdfFirstWo')->name('update.FirstWO');
Route::POST('/uploadFP3', 'StaffController@PostPdfFp3')->name('update.uploadFP3');
Route::POST('/updateBASO', 'StaffController@PostPdfBaso')->name('update.updateBASO');
Route::POST('/uploadAPD', 'StaffController@PostPdfAPD')->name('uploadAPD');

Route::POST('/updatePKS', 'StaffController@PostPdfPks')->name('PKS_PDF');
Route::POST('/uploadDrafPnl', 'StaffController@PostPdfDraftPnl')->name('UploadDraftPnl');




/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
| ROUTE UNTUK API (SEND EMAIL,DOWNLOAD PDF,DOWNLOAD EXCEL,API UNRUK FRONTEND)
|
*/

// mobail

Route::POST('/api/login', 'StaffController@PostLoginUser')->name('api.PostLoginUser');
Route::get('/api/report/user', 'StaffController@ApiReportDataUser')->name('api.ApiReportDataUser');
Route::get('/api/user', 'StaffController@ApiDetailsUser')->name('api.ApiDetailsUser');


Route::get('/api/report/data', 'StaffController@ApiReportData')->name('api.ApiReportData');

Route::get('/api/report/data/{progress}', 'StaffController@ApiReportByData')->name('api.ApiReportByData');

Route::get('/api/revshare/{id}/{tahun}', 'StaffController@details_revshare')->name('api.revshare');
Route::POST('/api/periode/1', 'StaffController@addPeriode_1')->name('addPeriode_1');
Route::POST('/api/periode/2', 'StaffController@addPeriode_2')->name('addPeriode_2');
Route::POST('/api/periode/3', 'StaffController@addPeriode_3')->name('addPeriode_3');
Route::POST('/api/periode/4', 'StaffController@addPeriode_4')->name('addPeriode_4');
Route::POST('/api/rev/tahun', 'StaffController@PostAddRevWebSetting')->name('api_rev_share_tahun');
Route::POST('/api/rev/range/tahun', 'StaffController@PostAddRevWebReageSetting')->name('api_rev_share__range_tahun');


Route::POST('/api/progress/periode/1/{id}', 'StaffController@addProgressPeriode_1')->name('addProgressPeriode');
Route::POST('/api/progress/periode/2/{id}', 'StaffController@addProgressPeriode_2')->name('addProgressPeriode');
Route::POST('/api/progress/periode/3/{id}', 'StaffController@addProgressPeriode_3')->name('addProgressPeriode');
Route::POST('/api/progress/periode/4/{id}', 'StaffController@addProgressPeriode_4')->name('addProgressPeriode');


Route::get('/apireport/{id}', 'StaffController@apiReport')->name('api.staff.report');
Route::get('/api/ApiTowerData/{id}', 'StaffController@ApiTowerData')->name('api.ApiTowerData');
Route::POST('/KirimEmail/{id}', 'StaffController@KirimEmail')->name('KirimEmail');
Route::get('/email/{status}', 'HomeController@email')->name('email.setting');
Route::get('/api/email', 'HomeController@cekemail')->name('email.cek');
Route::get('/details_pdf/{id}', 'StaffController@details_pdf')->name('staff.details_pdf'); // DOWNLOAD PDF
Route::GET('/export/excel/{progress}', 'AdminController@ExportReport')->name('ExportReport'); //DOWNLOAD EXCEL
Route::get('/api/template/{id}', 'AdminController@apiTemplate')->name('admin.apiTemplate');
Route::get('/api/all/report/{user}', 'AdminController@ApiAllReport')->name('admin.ApiAllReport');


/*
|--------------------------------------------------------------------------
| LEADER (Middleware => LEADER)
|--------------------------------------------------------------------------
| ROUTE UNTUK LEADER HANYA ROLE ADMIN SAYA YANG BISA MASUK
|
*/

Route::group(['middleware' => ['role:leader']], function () {

    Route::get('/dashboard', 'AdminController@Dashboard_home')->name('admin.Dashboard_home');
    Route::get('/leader', 'AdminController@home')->name('admin.home');
    Route::get('/summary', 'AdminController@summaryAdmin')->name('admin.summary');
    Route::get('/update', 'AdminController@updateAdmin')->name('admin.update');
    Route::get('/alert', 'AdminController@ViewAlert')->name('admin.alert');
    Route::get('/user', 'AdminController@user')->name('admin.user');
    Route::get('/wilayah', 'AdminController@Wilayah')->name('admin.wilayah');
    Route::get('/email', 'AdminController@email')->name('admin.email');
    Route::get('/ready-to-sell', 'AdminController@Ready')->name('admin.Ready');
    Route::get('/SLA', 'AdminController@ViewSLA')->name('admin.SLA');
    Route::get('/template', 'AdminController@viewTemplate')->name('admin.Template');
    Route::get('/produktivitas', 'AdminController@ViewProduktivitas')->name('admin.ViewProduktivitas');
    Route::get('/revshare', 'AdminController@Rev_share')->name('admin.Rev_share');


    Route::get('/delete/wilayah/{id}', 'StaffController@GetDeleteWilayah')->name('admin.deleteWilayah');
    Route::get('/delete/report/{id}', 'AdminController@deleteReport')->name('admin.deleteReport');
    Route::get('/delete/user/{id}', 'AdminController@deleteUser')->name('admin.deleteUser');
    Route::get('/delete/template/{id}', 'AdminController@DeleteTemplate')->name('admin.DeleteTemplate');


    Route::post('/sendmessage', 'AdminController@message')->name('admin.send.message');
    Route::post('/UpdatePassword', 'StaffController@UpdatePassword')->name('admin.UpdatePassword');


    Route::post('/update/SLA/template', 'AdminController@PostUpdateSLATemplate')->name('admin.Update.sla.template');
    Route::post('/update/user', 'AdminController@UpdateUser')->name('admin.UpdateUser');
    Route::post('/update/wilayah', 'AdminController@updateWilayah')->name('admin.updateWilayah');
    Route::post('/new/wilayah', 'AdminController@newWilayah')->name('admin.newWilayah');
    Route::post('/update/email', 'AdminController@UpdateEmail')->name('admin.UpdateEmail');
    Route::post('/update/sla', 'AdminController@PostUpdateSLA')->name('admin.PostUpdateSLA');
    Route::post('/update/pic', 'AdminController@UpdatePIC')->name('admin.UpdatePIC');
    Route::POST('/update/template', 'AdminController@postUpdateTemplate')->name('admin.postUpdateTemplate');
    Route::POST('/add/template', 'AdminController@postAddTemplate')->name('admin.postAddTemplate');
    Route::POST('/upload/file/template', 'AdminController@UploadTemplate')->name('admin.UploadTemplate');
    Route::POST('/UpdateTemplateEmailSUBMIT_PROPOSAL', 'AdminController@UpdateTemplateEmailSUBMIT_PROPOSAL')->name('admin.UpdateTemplateEmailSUBMIT_PROPOSAL');
    Route::POST('/UpdateTemplateEmailSITE_SURVEY', 'AdminController@UpdateTemplateEmailSITE_SURVEY')->name('admin.UpdateTemplateEmailSITE_SURVEY');
    Route::POST('/UpdateTemplateEmailBOQ', 'AdminController@UpdateTemplateEmailBOQ')->name('admin.UpdateTemplateEmailBOQ');
    Route::POST('/UpdateTemplateEmailPNL', 'AdminController@UpdateTemplateEmailPNL')->name('admin.UpdateTemplateEmailPNL');
    Route::POST('/UpdateTemplateEmailSIGNED_PKS', 'AdminController@UpdateTemplateEmailSIGNED_PKS')->name('admin.UpdateTemplateEmailSIGNED_PKS');
    Route::POST('/update/produktivitas', 'AdminController@PostUpdateProduktivitas')->name('admin.PostUpdateProduktivitas');
    Route::get('/database', 'AdminController@databaseAdmin')->name('admin.database');
});
/*
|--------------------------------------------------------------------------
| WILAYAH
|--------------------------------------------------------------------------
| ROUTE UNTUK WILAYAH SELURUH INDONESIA
|
*/

Route::get('/Kota/{id}', 'StaffController@Kota')->name('Kota')->middleware('auth');
Route::get('/Wilayah/{id}', 'StaffController@Wilayah')->name('Wilayah');

Route::get('/cek/provinsi/{id}', 'StaffController@CekProvinsi')->name('Wilayah');
Route::get('/cek/CekKota/{id}', 'StaffController@CekKota')->name('CekKota');
Route::get('/cek/CekWilayah/{id}', 'StaffController@CekWilayah')->name('CekWilayah');

/*
|--------------------------------------------------------------------------
| Web Routes (END)
|--------------------------------------------------------------------------
*/
