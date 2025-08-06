<?php

namespace App\Exports;

use App\Models\Replenishment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReplenishmentExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $search;
    protected $startDate;
    protected $endDate;

    public function __construct($search = null, $startDate = null, $endDate = null)
    {
        $this->search = $search;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        if (auth()->user()->usertype_id == 2) {
            $query = Replenishment::whereHas('product', function ($query) {
                $query->where('department_id', '=', auth()->user()->department_id);
            });
        } else {
            $query = Replenishment::query();
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('description', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('DataModifier', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('product', function ($query2) {
                        $query2->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }

        // Apply date filters
        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        return $query->with(['product.category'])->orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'Item Name',
            'Category',
            'Quantity',
            'Description',
            'Replenished By',
            'Date Created',
            'Last Modified'
        ];
    }

    public function map($replenishment): array
    {
        return [
            $replenishment->product->name ?? 'N/A',
            $replenishment->product->category->name ?? 'N/A',
            $replenishment->quantity,
            $replenishment->description,
            $replenishment->DataModifier,
            $replenishment->created_at->format('Y-m-d H:i:s'),
            $replenishment->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4CAF50']
                ],
                'font' => [
                    'color' => ['rgb' => 'FFFFFF'],
                    'bold' => true
                ]
            ],
        ];
    }
}
