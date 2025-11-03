<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_About;
use App\Http\Controllers\C_Mahasiswa;
use App\Http\Controllers\C_Contact;
use App\Http\Controllers\C_Dosen;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Login;

route::get('/', [C_Login::class,'index']);
route::get('/home', [C_Home::class,'index']);
route::get('/about', [C_Home::class,'about']);
route::get('/about2/{id}', [C_Home::class,'about2']);
// route::get('/dosen', [C_Dosen::class,'index'])->name('dosen');
// route::get('/dosen/detail/{id_dosen}', [C_Dosen::class,'detail']);

// Route::resource('dosen', C_Dosen::class);
// use App\Http\Controllers\C_Dosen;

Route::get('/dosen', [C_Dosen::class, 'index'])->name('dosen');
Route::get('/dosen/detail/{id_dosen}', [C_Dosen::class, 'detail']);
Route::get('/dosen/add', [C_Dosen::class, 'add']);
Route::post('/dosen/insert', [C_Dosen::class, 'insert']);
Route::get('/dosen/edit/{id_dosen}', [C_Dosen::class, 'edit']);
Route::post('/dosen/update/{id_dosen}', [C_Dosen::class, 'update']);
Route::get('/dosen/delete/{id_dosen}', [C_Dosen::class, 'delete']);






// route::view('/', 'v_dasboard');
// route::get('/home', [C_Home::class, 'index'])->name('home');
// route::get('/dosen', [C_Dosen::class, 'index'])->name('dosen');
// route::get('/mahasiswa', [C_Mahasiswa::class, 'index'])->name('mahasiswa');
// route::get('/contact', [C_Contact::class, 'index'])->name('contact');
// route::get('/about/{nama_pt}', [C_About::class, 'index'])->name('about');





// Route::get('/', function () {
//     return view('welcome2');
// });

// Route::get('/contact', function () {
//     return view('v_contact');

// });

// Route::get('/about', function () {
//     return view('v_about');
// });

// // Route::get('/kali', function () {
// //     return view('v_kali');
// // });

// route::view('/contact2', 'v_contact');

// route::view('/contact2', 'v_contact2',
// ['name'=>'Ari Ahmad', 'email'=>'ariahmad@kurtubi']
// );

// route::get('/contact2', function(){
//     return view('v_contact2',
//     ['name'=>'Ari', 'email'=>'ariahmad@kurtubi']);
// });

// route::view('/admin', 'admin.v_admin');
// route::get('/mahasiswa/{kelas?}',function($kelas='TRPL 2A'){
//     return view('v_mahasiswa', ['kelas'=>$kelas,
//     'nama_mahasiswa'=>'Ari']);
// });

// route::view('/about2', 'v_about2',[
//     'name'=>'mahasiswa a',
//     'alamat'=>'<h3>cibogo</h3>',

// ]);


// route::view('/', 'v_dasboard');
// route::view('/home', 'v_home');
// route::view('/dosen', 'v_dosen');
// route::view('/mahasiswa', 'v_mahasiswa');
// route::view('/contact', 'v_contact');
// route::view('/about', 'v_about');





