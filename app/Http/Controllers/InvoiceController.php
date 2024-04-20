<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('user', 'client', 'assignment')->paginate(5);
        return view('invoices.index', compact('invoices'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('user', 'client', 'assignment')->find($id);

        if ($invoice) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('invoices.ticket', compact('invoice')));

            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = trim($invoice->client->user->name) . '_' . $invoice->created_at->format('d-m-Y') . '.pdf';

            return Response::make($pdf, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]);
        } else {
            return response()->json(['error' => 'Invoice not found'], 404);
        }
    }
}
