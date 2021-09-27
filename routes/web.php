<?php

use App\Http\Controllers\About_usersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\personalController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('Dashboard.index');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// halaman super admin
Route::middleware(['role:super admin'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/{user:id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('admin/{user:id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('admin/{user:id}/store', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('admin/{user:id}/delete', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('admin/{user:name}/editpassword', [AdminController::class, 'changepassword'])->name('changePassword');
    Route::patch('admin/{user:name}/editpassword', [AdminController::class, 'storepassword'])->name('storePassword');
    Route::get('roles/{user:id}/edit', [AdminController::class, 'editRoles'])->name('changeRoles');
    Route::patch('role/{user:id}/edit', [AdminController::class, 'storeRoles'])->name('storeRoles');
    Route::get('role/{user:name}/create', [AdminController::class, 'createRole'])->name('createRoles');
    Route::patch('role/{user:name}/create', [AdminController::class, 'sendRole'])->name('sendRoles');
    Route::get('permission/{user:id}/create', [AdminController::class, 'givePermission'])->name('givePermission');
    Route::put('permission/{user:id}/store', [AdminController::class, 'storePermission'])->name('store.Permission');
    Route::get('permission/{user:id}/edit', [AdminController::class, 'editPermission'])->name('changePermissions');
    Route::patch('permission/{user:id}/store', [AdminController::class, 'sendPermission'])->name('updatePermissions');
    Route::delete('permission/{user}/delete/permission', [AdminController::class, 'deletePermission'])->name('deletePermission');
    Route::delete('roles/{user:name}/delete_roles', [AdminController::class, 'delete_Roles'])->name('delete_Roles');
    Route::get('roles/Tambah_Admin', [AdminController::class, 'Tambah_Admin'])->name('Tambah_Admin');
    Route::patch('roles/Store_Tambah_Admin', [AdminController::class, 'store_Tambah_Admin'])->name('store_Tambah_Admin');
});

Route::middleware(['role:super admin|admin'])->group(function () {
    Route::get('profile/{user:name}/editProgram', [profileController::class, 'editProgram'])->name('user.ediProgram');
    Route::patch('profile/{user:name}/editProgram', [profileController::class, 'storeProgram'])->name('user.storeProgram');
    Route::get('profile/Daptar_Mahasiswa', [profileController::class, 'Daptar_Mahasiswa'])->name('Daptar_Mahasiswa');
    Route::get('personal/{user:name}/index', [profileController::class, 'Daptar_mahasiswa_personal'])->name('daptar_mahasiswa_personal');
    Route::get('personal/Daptar_Admin', [profileController::class, 'Daptar_admin'])->name('Daptar_Admin');
    Route::get('personal/{program:name}/Daptar_Jurusan', [profileController::class, 'Daptar_Jurusan'])->name('Daptar_Jurusan');
    Route::delete('personal/{user:name}/Delete_Mahasiswa', [profileController::class, 'Delete_Mahasiswa'])->name('Delete_Mahasiswa');
    Route::get('personal/Daptar_Dosen', [profileController::class, 'Daptar_Dosen'])->name('Daptar_Dosen');
    Route::get('personal/{dosen_wali:name}/Detail_Dosen', [profileController::class, 'Detail_Dosen'])->name('Detail_Dosen');
    Route::get('personal/Tambah_Dosen', [profileController::class, 'Tambah_Dosen'])->name('Tambah_Dosen');
    Route::patch('personal/Tambah_Dosen', [profileController::class, 'store_Tambah_Dosen'])->name('store_Tambah_Dosen');
    Route::delete('personal/{dosen_wali:name}/Delete_Dosen', [profileController::class, 'Delete_Dosen'])->name('Delete_Dosen');
    Route::get('personal/Daptar_Semua_jurusan', [profileController::class, 'Daptar_Semua_Jurusan'])->name('Daptar_Semua_Jurusan');
    Route::get('personal/Tambah_jurusan', [profileController::class, 'Tambah_Jurusan'])->name('Tambah_Jurusan');
    Route::patch('personal/Store_Tambah_jurusan', [profileController::class, 'Store_Tambah_Jurusan'])->name('Store_Tambah_Jurusan');
    Route::delete('personal/{program:name}/Delete_jurusan', [profileController::class, 'Delete_Jurusan'])->name('Delete_Jurusan');
    Route::get('roles/Tambah_mahasiswa', [profileController::class, 'Tambah_Mahasiswa'])->name('Tambah_Mahasiswa');
    Route::patch('/roles/Tambah_Mahasiswa', [profileController::class, 'Store_Tambah_Mahasiswa'])->name('Store_Tambah_Mahasiswa');
    Route::get('/roles/Daptar_Kurikulum', [profileController::class, 'Daptar_Kurikulum'])->name('Daptar_Kurikulum');
    Route::get('/roles/Tambah_Kurikulum', [profileController::class, 'Tambah_Kurikulum'])->name('Tambah_Kurikulums');
    Route::patch('/roles/Tambah_Kurikulum', [profileController::class, 'Store_Tambah_Kurikulum'])->name('Store_Tambah_Kurikulum');
    Route::delete('/roles/{kurikulum:name}Delete_Kurikulum', [profileController::class, 'Delete_Kurikulum'])->name('Delete_Kurikulum');


});




// halaman profile user
Route::middleware(['auth'])->group(function () {
    Route::get('profile', [profileController::class, 'show'])->name('profile.show');
    Route::patch('profile/store/{user:id}', [profileController::class, 'store'])->name('profile.store');
    Route::get('profile/thumbnail/{user:id}', [profileController::class, 'thumbnail'])->name('user.thumbnail');
    Route::patch('profile/thumbnail/{user:id}', [profileController::class, 'store_thumbnail'])->name('store.thumbnail');
    Route::get('profile/gantiPassword/{user:name}', [profileController::class, 'gantiPassword'])->name('user.gantiPassword');
    Route::patch('profile/gantiPassword/{user:name}', [profileController::class, 'storeGantiPassword'])->name('user.storeGantiPassword');
   

    Route::get('profile/{user:name}/orangtuaWali', [profileController::class, 'orangTuaWali'])->name('profile.orang_tuaWali');
    Route::patch('profile/{user:id}/updateOrangtuaWali', [profileController::class, 'updateOrangTuaWali'])->name('profile.updateOrangTuaWali');
    Route::get('profile/{user:name}/asalSekolah', [profileController::class, 'asalSekolah'])->name('profile.asalSekolah');
    Route::patch('profile/{user:name}/asalSekolah', [profileController::class, 'storeSekolah'])->name('profile.storeSekolah');
    Route::get('profile/{user:name}/alamat', [profileController::class, 'alamat'])->name('profile.alamat');
    Route::patch('profile/{user:name}/alamat', [profileController::class, 'storeAlamat'])->name('profile.alamat');
    Route::get('profile/{user:name}/mahasiswaAsing', [profileController::class, 'mahasiswa_asing'])->name('profile.mahasiswaAsing');
    Route::patch('profile/{user:name}/mahasiswaAsing', [profileController::class, 'store_mahasiswa_asing'])->name('profile.store_MahasiswaAsing');
});