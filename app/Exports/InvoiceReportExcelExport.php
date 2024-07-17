<?php

namespace App\Exports;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvoiceReportExcelExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithCustomStartCell, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $invoicesQuery = Invoice::where('purchase_order_id', '!=', null)
            ->with(['purchaseOrder.requisition.department', 'organization'])
            ->orderBy('id', 'DESC')
            ->limit(40);

        if ($this->startDate && $this->endDate) {
            $invoicesQuery->whereDate('invoice_date', '>=', $this->startDate)
                ->whereDate('invoice_date', '<=', $this->endDate);
        }

        $invoices = $invoicesQuery->get();

        return $invoices->map(function ($invoice) {
            return [
                $invoice->organization->short_name,
                $invoice->supplier_id,
                $invoice->invoice_no,
                $invoice->purchaseOrder->reference_no,
                $invoice->invoice_amount,
                $invoice->purchaseOrder->actual_payable_amount,
                $invoice->purchaseOrder->total_amount,
                $invoice->purchaseOrder->purchase_order_no,
                $invoice->purchaseOrder->issue_date,
                $invoice->purchaseOrder->requisition->department->department_name,
                $invoice->purchaseOrder->mpr_no,
                $invoice->purchaseOrder->mpr_date,
                $invoice->purchaseOrder->credit_limit,
            ];
        });
    }

    public function headings(): array
    {
        return [
            trans('cruds.invoice_report.fields.unit'),
            trans('cruds.invoice_report.fields.supplier_name'),
            trans('cruds.invoice_report.fields.invoice_no'),
            trans('cruds.invoice_report.fields.bill_ref'),
            trans('cruds.invoice_report.fields.bill_amount'),
            trans('cruds.invoice_report.fields.payable_amount'),
            trans('cruds.invoice_report.fields.po_amount'),
            trans('cruds.invoice_report.fields.po_no'),
            trans('cruds.invoice_report.fields.po_date'),
            trans('cruds.invoice_report.fields.req_form'),
            trans('cruds.invoice_report.fields.mpr'),
            trans('cruds.invoice_report.fields.mpr_rcv_date'),
            trans('cruds.invoice_report.fields.cre_period'),
        ];
    }

    public function title(): string
    {
        return 'Invoices';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:M1');
        $sheet->setCellValue('A1', 'Invoice Report');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        $sheet->getStyle('A2:M2')->getFont()->setBold(true);

        foreach (range('A', 'M') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(false);
            $sheet->getColumnDimension($columnID)->setWidth(20);
        }

        return [
            'A1' => ['font' => ['bold' => true]],
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }
}
