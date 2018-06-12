<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class InvoiceController extends Controller
{
	public function invoice()
    {
        $patient = Patient::orderBy('created_at' , 'desc')->get();
        return view('admin.invoice', ['patients' => $patient]);
    }
}