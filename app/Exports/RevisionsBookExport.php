<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Revision;
use Maatwebsite\Excel\Events\AfterSheet;

class RevisionsBookExport implements FromView
{
    protected $startDate, $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        $query = Revision::query();

        if (!is_null($this->startDate)) {
            $query->whereDate('planned_start_of_internal_revision', '>=', $this->startDate);
        }

        if (!is_null($this->endDate)) {
            $query->whereDate('planned_start_of_internal_revision', '<=', $this->endDate);
        }

        $revisions = $query->get();

        return view('revision_book_simple', [
            'revisions' => $revisions
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Apply background color to the first three rows
                $cellRange = 'A1:AL3'; // Adjust the range as per your table's columns
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFBCD4C3');

                // Set styles for the header row specifically, if different from other rows
                $headerRowRange = 'A1:AF1';
                $event->sheet->getDelegate()->getStyle($headerRowRange)->getFont()->setBold(true);

                // You can also set alignment, font size, etc., for the header or any specific cells
                $event->sheet->getDelegate()->getStyle($headerRowRange)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // Additional styling as needed
                // For example, to set borders, text wraps, or cell sizes
            },
        ];
    }
}
