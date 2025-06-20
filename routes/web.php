<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Models\Profil;

Route::middleware('log')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
     Route::get('/lihatkategori', [KategoriController::class, 'lihatkategori'])->name('admin.lihatkategori');
    Route::get('/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('admin.tambahkategori');
    Route::post('/simpankategori', [KategoriController::class, 'simpankategori'])->name('admin.simpankategori');
    Route::get('/editkategori/{id}', [KategoriController::class, 'editkategori'])->name('admin.editkategori');
    Route::post('/updatekategori/{id}', [KategoriController::class, 'updatekategori'])->name('admin.updatekategori');
    Route::post('/deletekategori/{id}', [KategoriController::class, 'deletekategori'])->name('admin.deletekategori');
    Route::get('/lihatproduk', [ProdukController::class, 'lihatproduk'])->name('admin.lihatproduk');
    Route::get('/tambahproduk', [Produkcontroller::class, 'tambahproduk'])->name('admin.tambahproduk');
    Route::post('/simpanproduk', [Produkcontroller::class, 'simpanproduk'])->name('admin.simpanproduk');
    Route::get('/editproduk/{id}', [Produkcontroller::class, 'editproduk'])->name('admin.editproduk');
    Route::post('/updateproduk/{id}', [Produkcontroller::class, 'updateproduk'])->name('admin.updateproduk');
    Route::post('/deleteproduk/{id}', [ProdukController::class, 'deleteproduk'])->name('admin.deleteproduk');
      Route::get('/admin/lihattransaksi', [TransaksiController::class, 'lihattransaksiAdmin'])->name('admin.lihattransaksi');
      Route::get('/tambahprofil',[ProfilController::class, 'lihatTambah'])->name('tambahProfil');
       Route::post('/simpanprofil',[ProfilController::class, 'simpanprofil'])->name('simpanProfil');
       Route::get('/lihatprofil',[ProfilController::class, 'lihatProfil'])->name('lihatProfil');
       Route::get('/editprofil/{id}', [ProfilController::class, 'editProfil'])->name('editProfil');
       Route::post('/simpanedit/{id}', [ProfilController::class, 'simpanedit'])->name('simpanedit');
    Route::post('/deleteprofil/{id}',[ProfilController::class, 'deleteprofil'])->name('deleteprofil');
});

Route::middleware('auth', 'supervisor')->group(function () {
    Route::get('/supervisor/dashboard', [UserController::class, 'supervisorDashboard'])->name('supervisor.dashboard');
    Route::get('/supervisor/kategori', [KategoriController::class, 'lihatkategoriSupervisor'])->name('supervisor.lihatkategori');
    Route::get('/supervisor/produk', [ProdukController::class, 'lihatprodukSupervisor'])->name('supervisor.lihatproduk');
    Route::get('/supervisor/transaksi', [TransaksiController::class, 'lihattransaksiSupervisor'])->name('supervisor.lihattransaksi');
});
Route::middleware('auth', 'staf')->group(function () {
    Route::get('/staf/dashboard', [UserController::class, 'stafDashboard'])->name('staf.dashboard');
    Route::get('/lihattransaksi', [TransaksiController::class, 'lihattransaksi'])->name('staf.lihattransaksi');
    Route::get('/tambahtransaksi', [TransaksiController::class, 'tambahtransaksi'])->name('staf.tambahtransaksi');
    Route::post('/simpantransaksi', [TransaksiController::class, 'simpantransaksi'])->name('staf.simpantransaksi');
    Route::get('/edittransaksi/{id}', [TransaksiController::class, 'edittransaksi'])->name('staf.edittransaksi');
    Route::post('/updatetransaksi/{id}', [TransaksiController::class, 'updatetransaksi'])->name('staf.updatetransaksi');
    Route::post('/deletetransaksi/{id}', [TransaksiController::class, 'deletetransaksi'])->name('staf.deletetransaksi');
    Route::get('/staf/produk', [ProdukController::class, 'lihatprodukStaf'])->name('staf.lihatproduk');

});
