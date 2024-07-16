<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceReport(){
        return view('admin.invoice.invoiceReport');
    }

    public function invoiceReportGeneratePDF()
    {
        // Custom dimensions: 14 inches wide, 8 inches high
        $customPaper = array(0,0,1280,596); // 14 inches wide and 8 inches high (1 inch = 72 points)
        $pdf = PDF::loadView('admin.invoice.invoiceReportPDF')->setPaper($customPaper);
        return $pdf->download('invoice-report.pdf');
    }

}
