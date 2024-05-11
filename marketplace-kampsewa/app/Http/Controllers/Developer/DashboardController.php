<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckUserLogin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('dev');
    }
    public function index() {
        return view('developers.dashboard', ['title' => 'Dashboard | Developer Kamp Sewa']);
    }
}
