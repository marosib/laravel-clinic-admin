<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StatisticsExport implements FromCollection, WithHeadings
{

    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $rows = collect();

        $rows->push(['Összes látogatás', $this->data['weekly_visits_count']]);
        $rows->push(['']);

        $rows->push(['--- Napi bontás ---']);
        $rows->push(['Dátum', 'Látogatások']);
        foreach ($this->data['weekly_daily_breakdown'] as $date => $db) {
            $rows->push([$date, $db]);
        }
        $rows->push(['']);

        $rows->push(['--- Leggyakoribb okok ---']);
        $rows->push(['Vizit oka/Panasz', 'Összes']);
        foreach ($this->data['weekly_top_reasons'] as $ok => $db) {
            $rows->push([$ok, $db]);
        }
        $rows->push(['']);

        $rows->push(['--- Legutóbbi látogatások ---']);
        $rows->push(['Páciens neve','Email','Születési dátum','Vizit oka/Panasz','Látogatás dátuma']);
        foreach ($this->data['weekly_visits'] as $v) {
            $rows->push([
                $v->patient->name ?? '-',
                $v->patient->email ?? '-',
                $v->patient->birth_date ?? '-',
                $v->reason,
                $v->visited_at->format('Y-m-d H:i'),
            ]);
        }

        return $rows;
    }

    public function headings(): array
    {
        return [];
    }
}

