<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/'                       ,[App\Http\Controllers\HomeController::class, 'index'])     ->name('home');
Route::get('/psdviewscan{id}'        ,[App\Http\Controllers\Admin\TaskController::class, 'scan'])->name('scan');

///////////////////////////////////////////// Bosta view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/note'           ,[App\Http\Controllers\Admin\SignatureController::class,'noteVice'])   -> name('noteVice');
    Route::get('/noteshow'           ,[App\Http\Controllers\Admin\SignatureController::class,'viewnoteVice'])   -> name('noteVice.index');
    Route::get('/cat_noteshow{id}'           ,[App\Http\Controllers\Admin\SignatureController::class,'catviewnoteVice'])   -> name('noteSingle.show');
    Route::get('/note_delete/{id}'   ,[App\Http\Controllers\Admin\SignatureController::class    ,'notedestroy'])  -> name('note.delete');
    Route::get('/singlenote{id}'           ,[App\Http\Controllers\Admin\SignatureController::class,'shownoteVice'])   -> name('noteVice.show');
    Route::post('/noteStore'           ,[App\Http\Controllers\Admin\SignatureController::class,'noteViceCreate'])   -> name('noteVice.create');
    Route::post('/catenoteStore'           ,[App\Http\Controllers\Admin\SignatureController::class,'noteCategoryCreate'])   -> name('CatNote.create');
    Route::post('/note_comments'           ,[App\Http\Controllers\Admin\SignatureController::class,'NoteComment_create'])   -> name('vicecommnt.create');


    ///////////////////////////////////////////// {Vice_Nation} ///////////////////////////////////////////

    Route::get('/nation'           ,[App\Http\Controllers\Admin\SignatureController::class,'nationVice'])   -> name('nationVice');
    Route::get('/nationshow'           ,[App\Http\Controllers\Admin\SignatureController::class,'viewnationVice'])   -> name('nationVice.index');
    Route::get('/nation_delete/{id}'   ,[App\Http\Controllers\Admin\SignatureController::class    ,'nationdestroy'])  -> name('nation.delete');
    Route::get('/cat_nationshow{id}'           ,[App\Http\Controllers\Admin\SignatureController::class,'catviewNationVice'])   -> name('nationSingle.show');
    Route::get('/singlenation{id}'           ,[App\Http\Controllers\Admin\SignatureController::class,'shownationVice'])   -> name('nationVice.show');
    Route::post('/nationstore'           ,[App\Http\Controllers\Admin\SignatureController::class,'nationViceCreate'])   -> name('nationVice.create');
    Route::post('/nation_comments'           ,[App\Http\Controllers\Admin\SignatureController::class,'NationComment_create'])   -> name('vicecommnt_nation.create');
    Route::post('/catenationStore'           ,[App\Http\Controllers\Admin\SignatureController::class,'nationCategoryCreate'])   -> name('CatNation.create');


        ///////////////////////////////////////////// {Vice_Media} ///////////////////////////////////////////

    Route::get('/media'           ,[App\Http\Controllers\Admin\SignatureController::class,'mediaVice'])   -> name('mediaVice');
    Route::get('/mediashow'           ,[App\Http\Controllers\Admin\SignatureController::class,'viewmediaVice'])   -> name('mediaVice.index');
    Route::get('/media_delete/{id}'   ,[App\Http\Controllers\Admin\SignatureController::class    ,'mediadestroy'])  -> name('media.delete');
    Route::get('/singlemedia{id}'           ,[App\Http\Controllers\Admin\SignatureController::class,'showmediaVice'])   -> name('mediaVice.show');
    Route::post('/mediastore'           ,[App\Http\Controllers\Admin\SignatureController::class,'mediaViceCreate'])   -> name('mediaVice.create');
    Route::post('/media_comments'           ,[App\Http\Controllers\Admin\SignatureController::class,'MediaComment_create'])   -> name('vicecommnt_media.create');


});
///////////////////////////////////////////// Bosta view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/signature'           ,[App\Http\Controllers\Admin\SignatureController::class,'index'])   -> name('signature');
    Route::get('/signatu_delete{id}'  ,[App\Http\Controllers\Admin\SignatureController::class,'destroy'])   -> name('signature.delete');
    Route::post('/signature_save'     ,[App\Http\Controllers\Admin\SignatureController::class,'store'])   -> name('signpad.save');
    Route::get('/signature_show'      ,[App\Http\Controllers\Admin\BostaController::class,'indexPosta'])   -> name('signature.details');
    Route::get('/bosta'               ,[App\Http\Controllers\Admin\BostaController::class    ,'index'])   -> name('bosta.index');
    Route::get('/bosta_create'        ,[App\Http\Controllers\Admin\BostaController::class    ,'create'])  -> name('bosta.Create');
    Route::post('/bosta_save'         ,[App\Http\Controllers\Admin\BostaController::class    ,'store'])   -> name('bosta.store');
    Route::get('/bosta_show{id}'      ,[App\Http\Controllers\Admin\BostaController::class    ,'vic_done'])-> name('bosta.show');
    Route::post('/bosta_update/{id}'  ,[App\Http\Controllers\Admin\BostaController::class    ,'update'])  -> name('bosta.update');
    Route::get('/bosta_edit{id}'  ,[App\Http\Controllers\Admin\BostaController::class    ,'edit'])  -> name('bosta.edit');
    Route::get('/bosta_print{id}'  ,[App\Http\Controllers\Admin\BostaController::class    ,'Print_sign'])  -> name('bosta.print');
    Route::get('/bosta_delete/{id}'   ,[App\Http\Controllers\Admin\BostaController::class    ,'destroy'])  -> name('bosta.delete');
});
///////////////////////////////////////////// Bosta view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/calendar'           ,[App\Http\Controllers\Admin\CalendarController::class,'index']) -> name('calendar');
});
///////////////////////////////////////////// users view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/users'              ,[App\Http\Controllers\Admin\UserController::class      ,'index']) -> name('admin.users');
    Route::get('/user_create'        ,[App\Http\Controllers\Admin\UserController::class      ,'create'])-> name('user.Create');
    Route::post('/user_save'         ,[App\Http\Controllers\Admin\UserController::class      ,'save'])  -> name('user.store');
    Route::get('/user_edit{id}'      ,[App\Http\Controllers\Admin\UserController::class      ,'edit'])  -> name('admin.users.edit');
    Route::post('/user_update/{id}'  ,[App\Http\Controllers\Admin\UserController::class      ,'update'])-> name('admin.users.update');
    Route::get('/user_delete/{id}'   ,[App\Http\Controllers\Admin\UserController::class      ,'delete'])-> name('user.delete');
});
///////////////////////////////////////////// topics view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/import_topic'          ,[App\Http\Controllers\Admin\TopicController::class,'index'])       -> name('topic.index');
    Route::get('/create'                ,[App\Http\Controllers\Admin\TopicController::class,'create'])      -> name('topics.create');
    Route::get('/reply'                 ,[App\Http\Controllers\Admin\TopicController::class,'reply'])       -> name('topics.reply');
    Route::post('/reply_save'           ,[App\Http\Controllers\Admin\TopicController::class,'reply_save'])  -> name('topics.reply.save');
    Route::post('/save'                 ,[App\Http\Controllers\Admin\TopicController::class,'save'])        -> name('topics.save');
    Route::get('/edit/{id}'             ,[App\Http\Controllers\Admin\TopicController::class,'edit'])        -> name('topics.edit');
    Route::post('/update/{id}'          ,[App\Http\Controllers\Admin\TopicController::class,'update'])      ->name('topics.update');
    Route::get('/delete/{id}'           ,[App\Http\Controllers\Admin\TopicController::class,'destroy'])     ->name('topics.delete');
    Route::get('/archive/{id}'          ,[App\Http\Controllers\Admin\TopicController::class,'archive'])     -> name('topics.archive');
    Route::get('/topics_archive'        ,[App\Http\Controllers\Admin\TopicController::class,'T_archive'])   -> name('archive');
    Route::get('/read-mfile/{import_id}',[App\Http\Controllers\Admin\TopicController::class,'show'])        -> name('topics.show');
    Route::post('/viceNote'             ,[App\Http\Controllers\Admin\TopicController::class,'vice_note'])   -> name('viceNote');
    Route::post('/response'             ,[App\Http\Controllers\Admin\TopicController::class,'response'])    -> name('topics.response');

///////////////////////////////////////////// Export view ///////////////////////////////////////////

    Route::get('/export'                ,[App\Http\Controllers\Admin\ExportController::class,'index'])          -> name('exports');
    Route::get('/export_create'         ,[App\Http\Controllers\Admin\ExportController::class,'create'])         -> name('exports.create');
    Route::get('/export_intenal'        ,[App\Http\Controllers\Admin\ExportController::class,'export_internal'])-> name('export.internal');
    Route::post('/ex-intenal_save'      ,[App\Http\Controllers\Admin\ExportController::class,'save_internal'])  -> name('save.internal');
    Route::post('/export_save'          ,[App\Http\Controllers\Admin\ExportController::class,'save'])           -> name('exports.save');
    Route::get('/export_edit/{id}'      ,[App\Http\Controllers\Admin\ExportController::class,'edit'])           -> name('exports.edit');
    Route::post('/export_update/{id}'   ,[App\Http\Controllers\Admin\ExportController::class,'update'])         -> name('exports.update');
    Route::get('/export_delete/{id}'    ,[App\Http\Controllers\Admin\ExportController::class,'destroy'])        -> name('exports.delete');
    Route::get('/export_archive'        ,[App\Http\Controllers\Admin\ExportController::class,'archive'])        -> name('Ex.archive');
    Route::get('/move/{id}'             ,[App\Http\Controllers\Admin\ExportController::class,'delete'])         -> name('exports.archive');
    Route::get('/export_show/{id}'      ,[App\Http\Controllers\Admin\ExportController::class,'show'])           -> name('exports.show');

    ///////////////////////////////////////////// management view ///////////////////////////////////////////

    Route::get('/manage-profile{id}'     ,[App\Http\Controllers\Admin\ManagController::class,'show'])  -> name('manage.profile');
    Route::get('/managemente'            ,[App\Http\Controllers\Admin\ManagController::class,'index']) -> name('manage');
    Route::get('/managemente-create'     ,[App\Http\Controllers\Admin\ManagController::class,'create'])-> name('manage.create');
    Route::post('/manage-store'          ,[App\Http\Controllers\Admin\ManagController::class,'store']) -> name('manage.store');
    Route::get('/manage-edit{id}'        ,[App\Http\Controllers\Admin\ManagController::class,'edit'])  -> name('manage.edit');
    Route::post('/manage-update{id}'     ,[App\Http\Controllers\Admin\ManagController::class,'update'])-> name('manage.update');

    ///////////////////////////////////////////// side view ///////////////////////////////////////////

    Route::get('/side-profile{id}'        ,[App\Http\Controllers\Admin\SideController::class,'show'])  -> name('side.profile');
    Route::get('/side'                    ,[App\Http\Controllers\Admin\SideController::class,'index']) -> name('side');
    Route::get('/side-create'             ,[App\Http\Controllers\Admin\SideController::class,'create'])-> name('side.create');
    Route::post('/side-store'             ,[App\Http\Controllers\Admin\SideController::class,'store']) -> name('side.store');
    Route::post('/store'                  ,[App\Http\Controllers\Admin\SideController::class,'Qstore'])-> name('q.store');
    Route::post('/storeMange'                  ,[App\Http\Controllers\Admin\SideController::class,'Mstore'])-> name('M.store');
    Route::get('/side-edit{id}'           ,[App\Http\Controllers\Admin\SideController::class,'edit'])  -> name('side.edit');
    Route::post('/side-update{id}'        ,[App\Http\Controllers\Admin\SideController::class,'update'])-> name('side.update');


        ///////////////////////////////////////////// role view ///////////////////////////////////////////

    Route::get('/role'                    ,[App\Http\Controllers\Admin\RoleController::class, 'index'])  ->name('role');
    Route::get('/role-create'             ,[App\Http\Controllers\Admin\RoleController::class, 'create']) ->name('role.Create');
    Route::POST('/role-store'             ,[App\Http\Controllers\Admin\RoleController::class, 'store'])  ->name('role.store');
    Route::get('/role-delete{id}'         ,[App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.delete');
    Route::get('/role-edit{id}'           ,[App\Http\Controllers\Admin\RoleController::class, 'edit'])   ->name('role.edite');
    Route::post('/role-update{id}'        ,[App\Http\Controllers\Admin\RoleController::class, 'update']) ->name('role.update');

    ///////////////////////////////////////////// connection view ///////////////////////////////////////////

    Route::get('/edit_inside{id}'         ,[App\Http\Controllers\Admin\ExportController::class, 'inside'])       ->name('inside.edit');
    Route::post('/update_inside{id}'      ,[App\Http\Controllers\Admin\ExportController::class, 'inside_update'])->name('inside.update');

    ///////////////////////////////////////////// connection view ///////////////////////////////////////////

    Route::get('/report'                  ,[App\Http\Controllers\Admin\OfficereportController::class, 'index'])      ->name('report');
    Route::post('/report_search'          ,[App\Http\Controllers\Admin\OfficereportController::class, 'ajax_search'])->name('report.ajax_search');

});

Route::get('fullcalendar' ,[App\Http\Controllers\FullCalendarController::class, 'index']);
Route::get('fullcalendar/create',[App\Http\Controllers\FullCalendarController::class, 'create']);
Route::post('fullcalendar/update',[App\Http\Controllers\FullCalendarController::class, 'update']);
Route::get('fullcalendar/delete',[App\Http\Controllers\FullCalendarController::class, 'destroy']);

