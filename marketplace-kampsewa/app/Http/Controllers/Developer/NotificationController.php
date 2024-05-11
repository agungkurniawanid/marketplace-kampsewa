<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // todo mengalihkan ke halaman index notification
    public function index() {
        return view('developers.notification', ['title' => 'Dashboard | Notification']);
    }
}
