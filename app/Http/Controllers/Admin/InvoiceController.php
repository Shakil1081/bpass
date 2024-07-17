<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvoiceReportExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function invoiceReport(Request $request)
    {
        $dateRange = $request->input('date_range');
        // Start the query
        $invoicesQuery = Invoice::where('purchase_order_id', '!=', null)
            ->with(['purchaseOrder', 'organization']);

        if ($dateRange) {
            list($startDate, $endDate) = explode(' - ', $dateRange);

            $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

            $invoicesQuery->whereDate('invoice_date', '>=', $startDate)
                ->whereDate('invoice_date', '<=', $endDate);
        }

        $invoices = $invoicesQuery->orderBy('id', 'DESC')->paginate(30);

        return view('admin.invoice.invoiceReport', compact('invoices'));
    }

    public function invoiceReportGeneratePDF(Request $request)
    {
        $dateRange = $request->input('date_range');

        $invoicesQuery = Invoice::where('purchase_order_id', '!=', null)
            ->with(['purchaseOrder', 'organization']);

        if ($dateRange) {
            list($startDate, $endDate) = explode(' - ', $dateRange);

            $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

            $invoicesQuery->whereDate('invoice_date', '>=', $startDate)
                ->whereDate('invoice_date', '<=', $endDate);
        }

        $invoices = $invoicesQuery->orderBy('id', 'DESC')->get();

        $customPaper = array(0,0,1280,596);
        $pdf = PDF::loadView('admin.invoice.invoiceReportPDF',compact('invoices'))->setPaper($customPaper);
        return $pdf->download('invoice-report.pdf');
    }

    public function invoiceReportGenerateExcel(Request $request)
    {
        $dateRange = $request->input('date_range');

        if ($dateRange) {
            list($startDate, $endDate) = explode(' - ', str_replace('+', ' ', $dateRange));

            $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        } else {
            $startDate = null;
            $endDate = null;
        }

        return Excel::download(new InvoiceReportExcelExport($startDate, $endDate), 'table-data.xlsx');
    }
}
