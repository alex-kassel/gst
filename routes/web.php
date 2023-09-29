<?php

use App\Http\Controllers\StakeholderController;
use App\Models\Stakeholder;
use App\Models\StakeholderUrl;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stakeholders', StakeholderController::class);


###############################################################################################################################
Route::prefix('stakeholdersXXL')->controller(StakeholderController::class)
    ->group(
        function () {
            Route::get('/create', 'create');
            Route::get('/edit/{stakeholder}', 'edit');
        }
    );


Route::post('/stakeholdersXXL/create', function () {
    request()->flash();
    $stakeholder = new Stakeholder();
    if (request('id')) {
        $stakeholder->id = request('id');
    }
    $stakeholder->name = request('name');
    $stakeholder->inprint = request('inprint');
    dump($stakeholder->save());

    foreach (explode("\r\n", request('urls')) as $url) {
        $stakeholderUrl = new StakeholderUrl();
        $stakeholderUrl->stakeholder_id = $stakeholder->id;
        $stakeholderUrl->url = $url;
        dump($stakeholderUrl->save());
    }

    return view('components.stakeholders.form', [
        'title' => __('Einen neuen Stakeholder anlegen'),
    ]);
});



