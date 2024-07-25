<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvoiceReportExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Organization;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function invoiceReport(Request $request)
    {
        $dateRange = $request->input('date_range');
        $organization = $request->input('organization');
        // Start the query
        $invoicesQuery = Invoice::with([ 'purchaseOrder' => function ($query) {
            // Apply the scope to ignore `team_id`
            $query->withoutTeamId();
        }, 'organization']);
dd($invoicesQuery->get());
        if ($dateRange) {
            list($startDate, $endDate) = explode(' - ', $dateRange);

            $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

            $invoicesQuery->whereDate('invoice_date', '>=', $startDate)
                ->whereDate('invoice_date', '<=', $endDate);
        }else{
            $invoicesQuery->whereDate('invoice_date', '>=', Carbon::today()->format('Y-m-d'))
                ->whereDate('invoice_date', '<=', Carbon::today()->format('Y-m-d'));
        }

        if ($organization){
            $invoicesQuery->where('organization_id', $organization);
        }
        $invoices = $invoicesQuery->orderBy('id', 'DESC')->paginate(30);

        $organization = Organization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.invoice.invoiceReport', compact('invoices','organization'));
    }

    public function invoiceReportGeneratePDF(Request $request)
    {
        $validatedData = $request->validate([
            'date_range' => 'nullable|string',
            'organization' => 'nullable|integer|exists:organization,id'
        ]);

        $dateRange = $validatedData['date_range'] ?? null;
        $organization = $validatedData['organization'] ?? null;

        $invoicesQuery = Invoice::whereNotNull('purchase_order_id')
            ->with(['purchaseOrder', 'organization']);

        if ($dateRange) {
            try {
                list($startDate, $endDate) = explode(' - ', $dateRange);
                $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
                $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

                $invoicesQuery->whereDate('invoice_date', '>=', $startDate)
                    ->whereDate('invoice_date', '<=', $endDate);
            } catch (\Exception $e) {
                return back()->withErrors(['date_range' => 'Invalid date range format']);
            }
        }

        $organizationName = 'ALL';
        if ($organization) {
            $invoicesQuery->where('organization_id', $organization);
            $organizationName = Organization::findOrFail($organization)->name;
        }

        $invoices = $invoicesQuery->orderBy('id', 'DESC')->get();

        $customPaper = [0, 0, 1280, 596];
        $pdf = PDF::loadView('admin.invoice.invoiceReportPDF', compact('invoices', 'organizationName', 'dateRange'))
            ->setPaper($customPaper);

        return $pdf->download('invoice-report.pdf');
    }


    public function invoiceReportGenerateExcel(Request $request)
    {
        $dateRange = $request->input('date_range');
        $organization = $request->input('organization');

        if ($dateRange) {
            list($startDate, $endDate) = explode(' - ', str_replace('+', ' ', $dateRange));

            $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        } else {
            $startDate = null;
            $endDate = null;
        }

        return Excel::download(new InvoiceReportExcelExport($startDate, $endDate,$organization), 'table-data.xlsx');
    }
}
