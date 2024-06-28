<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {

        return "ini list dokumen dari database";
    }

    public function listKaryawan()
    {
        return "ini list karyawan";
    }
}
