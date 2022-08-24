<?php

namespace App\Exports;

use App\Models\EventEnroll;
use App\Models\FormSetting;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KonsultasiEnrollExport implements FromView, WithStyles, ShouldAutoSize
{
    
    public $data,$pertanyaan,$num_file = 0;

    public function __construct()
    {
        $id_produk = Produk::where('id_kategori',3)->pluck('id');
        $this->data = Transaksi::whereIn('id_produk',$id_produk)->get();

        $form = FormSetting::where('id_produk_kategori',3)->first();

        if(empty($form)){
            $this->pertanyaan = [];
            $this->num_file = 0;
        }else{
            $pertanyaan = explode(",",$form->pertanyaan);
            $tipe = explode(",",$form->tipe);

            foreach ($tipe as $key => $tp){
                if($tp == 'file'){
                    unset($pertanyaan[$key]);
                    $this->num_file ++;
                }
            }
            $this->pertanyaan = $pertanyaan;
        }
        

    }

    public function view(): View
    {

        return view('export.konsultasi_export',
            [
                'datas' => $this->data, 
                'pertanyaan' => $this->pertanyaan,
                'num_file' => $this->num_file,
                'jenis' => 'Konsultasi',
            ]);
    }

    public function styles(Worksheet $sheet)
    {
        // merge cells
        // $sheet->mergeCells('A3:K3')->setCellValue('A3',"Daftar Jabatan Supervisor yang ada di sekolah.");
        // $sheet->getStyle('A3:K3')->getFont()->setBold(true);

        

    }
}
