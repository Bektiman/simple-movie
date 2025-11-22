<?php


use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::group(
    [
        'prefix' => 'movie',
        'as' => 'movie.'
    ], function () {

        Route::get('/',[MovieController::class, 'index']);
        Route::get('/{id}', [MovieController::class, 'show']);
        Route::post('/',[MovieController::class, 'store']);
        Route::patch('/{id}',[MovieController::class, 'update']);
        Route::delete('/{id}',[MovieController::class, 'destroy']);

    }
);

Route::get('/phpinfo', function () {
    ob_start();
    phpinfo();
    return ob_get_clean();
});

Route::get('/pricing', function() {
    return 'Please buy  a membership';
});

Route::get('/login', function() {
    return 'Please login or Register';
});

Route::get('/logout', function() {
    return 'Please login or Register';
});
Route::post('/request', function(Request $request ){

    if ($request->has('email', 'name')) {

        return 'Login berhasil';
    }
    $input =$request->input();

    $query = $request->query();

    return($query);


});

Route::post('/date', function(Request $request ){

   $data = $request->date('schedule', 'Y-m-d', 'Asia/Jakarta');

    return($data->diffForHumans());

});

Route::post('/hasany', function(Request $request ){

    if ($request->hasany('email', 'name')) {

        return 'Data berhasil diambil';
    }
    $input =$request->input();

    $query = $request->query();

    return($query);

 });

 Route::post('/missing', function(Request $request ){

    if($request->missing('email')){

        $request->merge(['email'=>'abc@gmail.com']);
    }
    return $request->all();

    //fungsi untuk menambakan data di parameter;

 });

 Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
    Route::get('/dashboard', function () {
        $user = 'admin';
        return  response('Login Succesfull')->cookie('user',$user);

    });
    Route::get('/logout', function () {
        return  response('Logout Succesfull')->withoutCookie('user');

    });

 });

 Route::get('/response', function(){
    return(response('OK', 200)->header('Content-Type', 'text/plain'));

 });

 Route::get('/home', [HomeController::class, 'index']);
 Route::get('/contact', function () {
    return view('contact');

 });
 Route::get('/about', function () {
    return view('about');

 });
