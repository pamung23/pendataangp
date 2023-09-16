<?php

namespace App\Exports;

use App\Models\PembinaanUsaha1;
use App\Models\PembinaanUsaha2;
use App\Models\PembinaanUsaha3;
use App\Models\PembinaanUsaha4;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PembinaanUsahaExport implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    use Exportable;

    protected $triwulan;
    protected $year;

    public function __construct($triwulan, $year)
    {
        $this->triwulan = $triwulan;
        $this->year = $year;
    }

    public function collection()
    {
        // Ambil model yang sesuai berdasarkan triwulan
        $model = $this->getModelForTriwulan($this->triwulan);

        if (!$model) {
            return collect(); // Return empty collection jika model tidak ditemukan
        }

        // Query dan ambil data sesuai dengan model dan tahun yang dipilih
        $query = $model::query();

        if ($this->year) {
            $query->whereYear('created_at', $this->year);
        }

        $data = $query->get();

        // Tambahkan nomor urut pada setiap baris
        $data->each(function ($item, $key) {
            $item->nomor_urut = $key + 1;
        });

        // Ubah data menjadi koleksi
        $collection = collect($data);

        // Debugging: Log data to check if it's retrieved correctly
        Log::info('Data retrieved:', $collection->toArray());

        return $collection;
    }


    public function headings(): array
    {
        return [
            [
                'Tabel : Pembinaan Usaha Ekonomi Produktif pada Daerah Penyangga Kawasan Konservasi',

            ],
            [],
            [
                'Tahun : ' . $this->year,
            ],
            [
                'Periode (Triwulan) : Triwulan ' . $this->triwulan,
            ],
            [
                '',
                'No.',
                'Register Kawasan Konservasi',
                '',
                '',
                '',
                'Pembinaan Usaha Ekonomi Produktif',
                '',
                '',
                '',
                'Keterangan',
            ],
            [
                '',
                '',
                '',
                'Nama Kelompok',
                'Anggota (Orang)',
                'Jenis Kegiatan',
                'Jumlah Dana (Rp)',
                'Sumber Dana',
                'Hasil dan Manfaat',
                'Pendamping',
                '',
            ],
        ];
    }


    public function map($row): array
    {
        return [
            '',
            $row->nomor_urut,
            $row->no_register_kawasan,
            $row->nama_kelompok,
            $row->anggota,
            $row->jenis_kegiatan,
            $row->jumlah_dana,
            $row->sumber_dana,
            $row->hasil_manfaat,
            $row->pendamping,
            $row->keterangan,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Define column widths based on your desired sizes
        $columnWidths = [
            'A' => 5,   // No. Urut
            'B' => 5,  // Register Kawasan Konservasi
            'C' => 30,  // Nama Kelompok
            'D' => 20,  // Anggota (Orang)
            'E' => 20,  // Jenis Kegiatan
            'F' => 20,  // Jumlah Dana (Rp)
            'G' => 20,  // Sumber Dana
            'H' => 20,  // Hasil dan Manfaat
            'I' => 25,  // Pendamping
            'J' => 25,  // Keterangan
            'K' => 25,
        ];

        // Set column widths according to the defined values
        foreach ($columnWidths as $column => $width) {
            $sheet->getColumnDimension($column)->setWidth($width);
        }

        // Define styles for each row
        $styles = [
            1 => [
                'font' => ['bold' => true, 'size' => 14],
                'alignment' => ['horizontal' => 'left', 'vertical' => 'center'],
            ],
            3 => [
                'font' => ['size' => 12],
                'alignment' => ['horizontal' => 'left', 'vertical' => 'center'],
            ],
            4 => [
                'font' => ['size' => 12],
                'alignment' => ['horizontal' => 'left', 'vertical' => 'center'],
            ],
            5 => [
                'font' => ['bold' => true, 'size' => 12],
                'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                    'top' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                    'left' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                    'right' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                ],
            ],
            6 => [
                'font' => ['bold' => true, 'size' => 12],
                'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                    'top' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                    'left' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                    'right' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                ],
            ],
        ];


        // Apply the defined styles to the cells
        foreach ($styles as $row => $style) {
            // Adjusted to columns B to J
            $sheet->getStyle('B' . $row . ':K' . $row)->applyFromArray($style);
        }

        // Get the highest row number with data in column B
        $highestRow = $sheet->getHighestDataRow('B');

        // Apply center alignment to all rows from B7 to the highest row in column K
        $sheet->getStyle('B7:K' . $highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B7:K' . $highestRow)->getAlignment()->setVertical('center');
        return $styles;
    }


    protected function getModelForTriwulan($triwulan)
    {
        // Buat peta pemetaan model untuk triwulan tertentu
        $modelMapping = [
            1 => PembinaanUsaha1::class,
            2 => PembinaanUsaha2::class,
            3 => PembinaanUsaha3::class,
            4 => PembinaanUsaha4::class,
        ];

        return $modelMapping[$triwulan] ?? null;
    }
}
