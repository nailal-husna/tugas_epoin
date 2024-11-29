<?php

namespace App\Http\Controllers\Admin; // Pastikan huruf besar pada "Admin"

use App\Http\Controllers\Controller; // Pastikan untuk mengimpor Controller dengan benar
use Illuminate\Http\Request; // Pastikan untuk mengimpor Request dengan benar

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Perbaiki penamaan view dari 'dashoard' menjadi 'dashboard'
    }

    // Tambahkan metode lain sesuai kebutuhan
}