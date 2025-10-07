<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;

class HasilController extends Controller
{
    public function show(Paket $paket)
    {
        return view('user.hasil.show', compact('paket'));
    }
}
