<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('user.payment.create');
    }

    public function store(Request $request)
    {
        Payment::create($request->all());
        return redirect()->route('user.dashboard')->with('success', 'Pembayaran berhasil!');
    }
}
