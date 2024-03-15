<?php

namespace App\Livewire\Reports;

use App\Models\product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use setasign\Fpdi\Tcpdf\Fpdi;
use TCPDF_FONTS;

class GenerateInventoryReportComponent extends Component
{
    public function render()
    {
        return view('livewire.reports.generate-inventory-report-component');
    }

    public function inventory()
    {
        $categoryId = Session::get('categoryId');

        $product_data = product::where('department_id', auth()->user()->department_id)
            ->where('category_id', 'LIKE', '%' . $categoryId . '%')
            ->orderBy('name', 'asc')
            ->get();

        $pdf = new Fpdi();
        $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(false, 40);
        $pdf->SetCreator('NETI');
        $pdf->SetAuthor('NETI');
        $pdf->SetTitle('Consumable Inventory Report');
        $pdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
        $templatePath = public_path("storage/template/F-NETI-401.pdf");

        $pdf->AddPage('P');

        $templateId = $pdf->importPage($pdf->setSourceFile($templatePath));
        $pdf->useTemplate($templateId);
        $pdf->SetFont('Times', '', 8, '', true);
        
        $this->setDepartmentAndDate($pdf,$product_data[0]->department->name);

        $pdf->SetXY(15.6, 56.3);
        foreach ($product_data as $index => $data) {
            $pdf->SetX(15.6);
            // item name
            $pdf->Cell(65.8, 6.1, $data->name, 1, 0, 'L', 0, '', 0);
            // quantity
            $pdf->Cell(19.4, 6.1, $data->quantity." ".$data->unit->name, 1, 0, 'L', 0, '', 0);
            //required quantity
            $pdf->Cell(21.9, 6.1,  '', 1, 0, 'L', 0, '', 0);
            //new order
            $pdf->Cell(20.9, 6.1, '', 1, 0, 'L', 0, '', 0);
            //remarks
            $pdf->Cell(48.9, 6.1, '', 1, 1, 'L', 0, '', 0);

            if ($index != 0 && $index  % 30 == 0) {
                $pdf->AddPage('P');
                $pdf->useTemplate($templateId);
                $this->setDepartmentAndDate($pdf,$product_data[0]->department->name);
                $pdf->SetXY(15.5, 56.3);
            }
        }

        $pdf->Output();
    }

    public function setDepartmentAndDate($pdf,$department){
        $pdf->SetXY(44, 16);
        $pdf->Cell(65.8, 6.1, $department, 0, 0, 'L', 0, '', 0);
        $pdf->SetXY(30, 25);
        $pdf->Cell(65.8, 6.1, Carbon::now()->format('F d,Y'), 0, 0, 'L', 0, '', 0);
    }
}
