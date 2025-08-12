<?php

namespace App\Exports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle, WithProperties, WithEvents
{
    protected $department_id;
    protected $category_id;

    public function __construct($department_id = null, $category_id = null)
    {
        $this->department_id = $department_id;
        $this->category_id = $category_id;
    }

    public function collection()
    {
        try {
            $query = product::query();

            // Apply department filter based on user type
            if (auth()->user()->usertype_id == 2) {
                // Regular user - only their department
                $query->where('department_id', auth()->user()->department_id);
            } elseif ($this->department_id) {
                // Admin user with specific department filter
                $query->where('department_id', $this->department_id);
            }
            // If admin and no department filter, get all products

            // Apply category filter
            if ($this->category_id) {
                $query->where('category_id', $this->category_id);
            }



            // Only active products
            $query->where('is_active', true);

            return $query->with(['department', 'category', 'supplier', 'unit'])
                ->orderBy('name', 'asc')
                ->get();
        } catch (\Exception $e) {
            Log::error('Error in ProductsExport collection: ' . $e->getMessage());
            return collect(); // Return empty collection on error
        }
    }

    private function getDepartmentName()
    {
        if (auth()->user()->usertype_id == 2) {
            return auth()->user()->department->name ?? 'User Department';
        } elseif ($this->department_id) {
            $dept = \App\Models\department::find($this->department_id);
            return $dept ? $dept->name : 'Specific Department';
        }
        return 'All Departments';
    }

    private function getCategoryName()
    {
        if ($this->category_id) {
            $cat = \App\Models\Category::find($this->category_id);
            return $cat ? $cat->name : 'Specific Category';
        }
        return 'All Categories';
    }

    private function calculateTotalValue()
    {
        $query = product::query();

        if (auth()->user()->usertype_id == 2) {
            $query->where('department_id', auth()->user()->department_id);
        } elseif ($this->department_id) {
            $query->where('department_id', $this->department_id);
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        $query->where('is_active', true);

        $products = $query->get();

        $totalValue = $products->sum(function ($product) {
            return ($product->price ?? 0) * ($product->quantity ?? 0);
        });

        return number_format($totalValue, 2);
    }

    private function getStatusSummary()
    {
        $query = product::query();

        if (auth()->user()->usertype_id == 2) {
            $query->where('department_id', auth()->user()->department_id);
        } elseif ($this->department_id) {
            $query->where('department_id', $this->department_id);
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        $query->where('is_active', true);

        $products = $query->get();

        $outOfStock = $products->where('quantity', 0)->count();
        $lowStock = $products->where('quantity', '>', 0)->where('quantity', '<=', function ($product) {
            return $product->low_stock_level;
        })->count();
        $onStock = $products->where('quantity', '>', function ($product) {
            return $product->low_stock_level;
        })->count();

        return "Out of Stock: {$outOfStock}, Low Stock: {$lowStock}, On Stock: {$onStock}";
    }

    public function headings(): array
    {
        return [
            'Name',
            'Description',
            'Price',
            'Quantity',
            'Unit',
            'Category',
            'Supplier',
            'Modified By',
            'Last Modified'
        ];
    }

    public function map($product): array
    {
        return [
            $product->name ?? 'N/A',
            $product->description ?? 'N/A',
            $product->price ?? '0',
            $product->quantity ?? '0',
            $product->unit->name ?? 'N/A',
            $product->category->name ?? 'N/A',
            $product->supplier->name ?? 'N/A',
            $product->LastModifiedBy ?? 'N/A',
            $product->updated_at ? $product->updated_at->format('Y-m-d H:i:s') : 'N/A',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();

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
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ],
            // Add borders to all cells
            'A1:I' . $highestRow => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ],
            // Add alternating row colors for better readability
            'A2:I' . $highestRow => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'F8F9FA']
                ]
            ]
        ];
    }

    public function title(): string
    {
        $deptName = $this->getDepartmentName();
        $catName = $this->getCategoryName();

        if ($deptName !== 'All Departments' || $catName !== 'All Categories') {
            return 'Inventory Report - ' . $deptName . ' - ' . $catName;
        }

        return 'Inventory Report - All Data';
    }

    public function properties(): array
    {
        return [
            'creator'        => 'NETI-CAMS',
            'lastModifiedBy' => auth()->user()->name ?? 'System',
            'title'          => 'Inventory Report',
            'description'    => 'Inventory export generated on ' . now()->format('Y-m-d H:i:s'),
            'subject'        => 'Inventory Management',
            'keywords'       => 'inventory, products, stock',
            'category'       => 'Reports',
            'manager'        => 'NETI-CAMS',
            'company'        => 'NETI',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $highestRow = $event->sheet->getHighestRow();

                // Add filter information
                $event->sheet->setCellValue('A' . ($highestRow + 2), 'EXPORT FILTERS');
                $event->sheet->setCellValue('A' . ($highestRow + 3), 'Department:');
                $event->sheet->setCellValue('B' . ($highestRow + 3), $this->getDepartmentName());
                $event->sheet->setCellValue('A' . ($highestRow + 4), 'Category:');
                $event->sheet->setCellValue('B' . ($highestRow + 4), $this->getCategoryName());
                $event->sheet->setCellValue('A' . ($highestRow + 5), 'User Type:');
                $event->sheet->setCellValue('B' . ($highestRow + 5), auth()->user()->usertype_id == 1 ? 'Administrator' : 'Regular User');

                // Add summary row
                $event->sheet->setCellValue('A' . ($highestRow + 7), 'SUMMARY');
                $event->sheet->setCellValue('A' . ($highestRow + 8), 'Total Items:');
                $event->sheet->setCellValue('B' . ($highestRow + 8), $highestRow - 1);
                $event->sheet->setCellValue('A' . ($highestRow + 9), 'Total Value:');
                $event->sheet->setCellValue('B' . ($highestRow + 9), $this->calculateTotalValue());
                $event->sheet->setCellValue('A' . ($highestRow + 10), 'Status Summary:');
                $event->sheet->setCellValue('B' . ($highestRow + 10), $this->getStatusSummary());
                $event->sheet->setCellValue('A' . ($highestRow + 11), 'Generated By:');
                $event->sheet->setCellValue('B' . ($highestRow + 11), auth()->user()->name ?? 'System');
                $event->sheet->setCellValue('A' . ($highestRow + 12), 'Generated On:');
                $event->sheet->setCellValue('B' . ($highestRow + 12), now()->format('Y-m-d H:i:s'));

                // Style the filter section
                $event->sheet->getStyle('A' . ($highestRow + 2) . ':B' . ($highestRow + 5))->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FFF3E0']
                    ]
                ]);

                // Style the summary section
                $event->sheet->getStyle('A' . ($highestRow + 7) . ':B' . ($highestRow + 12))->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E3F2FD']
                    ]
                ]);

                // Set column widths for better readability
                $event->sheet->getColumnDimension('A')->setWidth(30);
                $event->sheet->getColumnDimension('B')->setWidth(40);
                $event->sheet->getColumnDimension('C')->setWidth(15);
                $event->sheet->getColumnDimension('D')->setWidth(15);
                $event->sheet->getColumnDimension('E')->setWidth(15);
                $event->sheet->getColumnDimension('F')->setWidth(20);
                $event->sheet->getColumnDimension('G')->setWidth(25);
                $event->sheet->getColumnDimension('H')->setWidth(20);
                $event->sheet->getColumnDimension('I')->setWidth(20);

                // Add freeze panes for better navigation
                $event->sheet->freezePane('A2');
            }
        ];
    }
}
