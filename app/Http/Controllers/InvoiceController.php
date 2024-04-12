<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('user', 'client', 'assignment')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('user', 'client', 'assignment')->find($id);

        if ($invoice) {
            $pdf = Pdf::loadView('invoices.ticket', compact('invoice'));
            return $pdf->download('invoice_' . $invoice->id . '.pdf');
        } else {
            return redirect()->back();
        }
    }
}
