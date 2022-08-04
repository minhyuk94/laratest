<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// foo URL파라미터를 아라비아 숫자, 영어 소문자,대문자로 구성된 세자리 글자로 한정 , /이후 아무런 url이 없으면 기본 bar를 출력(위에 있는 라우터가 있어서 bar가 아닌 welcome으로 라우팅됨)
Route::pattern('foo', '[0-9a-zA-Z]{3}');

Route::get('/{foo?}', function($foo = 'bar'){
    return $foo;
});

// 같은 url의 라우터가있으면 아래꺼가 적용됨
Route::get('/', function () {
    return 'ssss';
});



Route::get('/', [
    'as' => 'home',
    function() {
        return '제 이름은 home 입니다.';
    }
]);

Route::get('/home', function(){
    return redirect(route('home'));
});