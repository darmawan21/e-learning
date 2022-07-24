<?php

namespace App\Http\Controllers;

use App\Models\KelasUjian;
use Illuminate\Http\Request;
use App\Notifications\UserUjianAlertNotification;

class HeaderUserController extends Controller
{
    public function header()
    {
        return view('layouts.header');
    }

    
}
