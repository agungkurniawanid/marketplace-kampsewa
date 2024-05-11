<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // index
    public function index($nama_lengkap){
        return view('developers.menu-profile.profile', ['title' => 'Profile | Developer Kamp Sewa', 'name' => $nama_lengkap]);
    }
}
