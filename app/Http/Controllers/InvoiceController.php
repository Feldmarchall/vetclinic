<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Invoice;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{
	public function getIndex()
    {
        $patient = Patient::orderBy('created_at' , 'desc')->get();
        return view('admin.invoice', ['patients' => $patient]);
    }

    public function save(Request $request)
    {
        $this->validate($request , [
            'patient_type' => 'required',
            'Date' => 'required',
            'medicine' => 'required',
            'service' => 'required',
            'total_paid' => 'required'
        ]);

        $invoice          = new Invoice();
        $invoice->patient_type      = $request['patient_type'];
        $invoice->Date      = $request['Date'];
        $invoice->medicine    = $request['medicine'];
        $invoice->service = $request['service'];
        $invoice->total_paid = $request['total_paid'];
        $invoice->save();

        return redirect()->back()->with(['success' => 'Бланк успешно добавлен'] );
    }

    public function update(Request $request)
    {
        $this->validate($request , [
            'patient_type' => 'required',
            'Date' => 'required',
            'medicine' => 'required',
            'service' => 'required',
            'total_paid' => 'required'
        ]);


        $invoice            = Invoice::find($request['invoice_id']);
        $invoice->patient_type      = $request['patient_type'];
        $invoice->Date      = $request['Date'];
        $invoice->medicine    = $request['medicine'];
        $invoice->service = $request['service'];
        $invoice->total_paid = $request['total_paid'];
        $invoice->update();
        return redirect()->route('invoice.list')->with(['success' => 'Данные успешно обновлены'] );
    }

    public function viewList()
    {
        $invoice = Invoice::orderBy('created_at' , 'desc')->paginate(50);
        $patient = Patient::orderBy('created_at' , 'desc')->get();
        return view('admin.invoice_list' , ['invoices' => $invoice, 'patients' => $patient]);
    }

    public function delete(Request $request)
    {
        $invoice            = Invoice::find($request['invoice_id']);
        if(!$invoice){
            return redirect()->route('invoice.list')->with(['fail' => 'Page not found !']);
        }

        $invoice->delete();
        return redirect()->route('invoice.list')->with(['success' => 'Deleted Information Successfully !']);

    }


}