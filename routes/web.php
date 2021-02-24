<?php


use App\Http\Controllers\Admin\BudgetController;
use App\Http\Controllers\Admin\DistributionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::post('/contact',function(Request $request){
    Contact::create($request->all());
    return redirect(route('beranda'));
});

Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum','web', 'verified'])->group(function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::resource('product', ProductController::class)->only(['index','create','edit']);
    Route::resource('distribution', DistributionController::class)->only(['index','create','edit']);
    Route::resource('budget', BudgetController::class)->only(['index','create','edit']);
    Route::get('/budget/download/{id}',[\App\Http\Controllers\Admin\BudgetController::class,"download"])->name('budget.download');

    Route::get('/user', [ UserController::class, "index" ])->name('user');
    Route::view('/user/new', "pages.user.create")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');

    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });

});
