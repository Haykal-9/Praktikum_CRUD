<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Admin Only Routes (CRUD)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Mahasiswa Routes (Write)
    Route::get('/input_mhs', [MahasiswaController::class, 'input']);
    Route::post('/simpan_mhs', [MahasiswaController::class, 'simpan']);
    Route::get('/edit_mhs/{NIM}', [MahasiswaController::class, 'edit']);
    Route::post('/update_mhs/{NIM}', [MahasiswaController::class, 'update']);
    Route::get('/hapus_mhs/{NIM}', [MahasiswaController::class, 'hapus']);

    // Prodi Routes (Write)
    Route::get('/input_prodi', [ProdiController::class, 'input']);
    Route::post('/simpan_prodi', [ProdiController::class, 'simpan']);
    Route::get('/edit_prodi/{id}', [ProdiController::class, 'edit']);
    Route::post('/update_prodi/{id}', [ProdiController::class, 'update']);
    Route::get('/hapus_prodi/{id}', [ProdiController::class, 'hapus']);

    // Dosen Routes (Write)
    Route::get('/input_dsn', [DosenController::class, 'input']);
    Route::post('/simpan_dsn', [DosenController::class, 'simpan']);
    Route::get('/edit_dsn/{id}', [DosenController::class, 'edit']);
    Route::post('/update_dsn/{id}', [DosenController::class, 'update']);
    Route::get('/hapus_dsn/{id}', [DosenController::class, 'hapus']);

    // MataKuliah Routes (Write)
    Route::get('/input_matakuliah', [MataKuliahController::class, 'input']);
    Route::post('/simpan_matakuliah', [MataKuliahController::class, 'simpan']);
    Route::get('/edit_matakuliah/{id}', [MataKuliahController::class, 'edit']);
    Route::post('/update_matakuliah/{id}', [MataKuliahController::class, 'update']);
    Route::get('/hapus_matakuliah/{id}', [MataKuliahController::class, 'hapus']);

    // Nilai Routes (Write - Moved to shared Admin/Dosen group)
});

// Admin & Dosen Routes (CRUD Nilai & Read Only Data)
Route::middleware(['auth', 'role:admin-dosen'])->group(function () {
    // CRUD Nilai
    Route::get('/input_nilai', [NilaiController::class, 'input']);
    Route::post('/simpan_nilai', [NilaiController::class, 'simpan']);
    Route::get('/edit_nilai/{id}', [NilaiController::class, 'edit']);
    Route::post('/update_nilai/{id}', [NilaiController::class, 'update']);
    Route::get('/hapus_nilai/{id}', [NilaiController::class, 'hapus']);

    // Read Only Access for Dosen (and Admin)
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/prodi', [ProdiController::class, 'index']);
});

// Public/Shared Routes (Authenticated - All Roles including Mahasiswa)
Route::middleware(['auth'])->group(function () {
    // Mahasiswa, Nilai, & Mata Kuliah (Read Only)
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/nilai', [NilaiController::class, 'index']);
    Route::get('/matakuliah', [MataKuliahController::class, 'index']);
});


// Set homepage to mahasiswa list
// Set homepage to login
Route::get('/', function () {
    return redirect('/login');
});

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Fallback for GET request to logout (optional, prevents MethodNotAllowed error)
Route::get('/logout', function () {
    return redirect('/dashboard');
});

// Dashboard Routes (Section B - Role-based)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth'); // memastikan user sudah login sebelum mengakses route

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin']);

Route::get('/mahasiswa-dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware(['auth', 'role:mahasiswa']);

// Example role-based routes (STEP 7)
Route::get('/admin', function () {
    return 'Halaman Admin hanya untuk admin';
})->middleware(['auth', 'role:admin']); // role disini nama middleware di bootstrap/app.php

Route::get('/staffpage', function () {
    return 'Halaman untuk admin atau dosen';
})->middleware(['auth', 'role:admin-dosen']); // menjalankan 2 middleware dalam array, yaitu auth dan role