<?php

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

Route::get('/', function () {
    return redirect('/logincd ..');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/fichas', 'Fichas\FichaController');
Route::resource('/consultas', 'Consultas\ConsultasController')->middleware('auth');;
Route::get('/financas', 'Financas\FinancasController@index');
Route::get('/banho-tosa', 'Banho\BanhoController@index');
Route::get('/servicos', 'Servicos\ServicoController@indexView')->middleware('auth');
Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::post('/caralho', function(){
//    $i = 0;
//    $x = 60;
//     while($i < 100000000){
        
//         set_time_limit($x + 30);
//         $i++;
        
//         if($i == 10000000){
        
//        return "break";
//     break;    
//     }
    

return "ok";
// return json_encode(["homem" => "macho", "mulher" => "femea"]);

});  