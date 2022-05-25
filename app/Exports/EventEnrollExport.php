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

class EventEnrollExport implements FromView, WithStyles, ShouldAutoSize
{
    
    public $data,$pertanyaan,$num_file = 0;
    public $jenis;

    public function __construct($id)
    {
        $id_produk = Produk::where('id_kategori',$id)->pluck('id');
        $this->data = Transaksi::whereIn('id_produk',$id_produk)->get();

        $form = FormSetting::where('id_produk_kategori',$id)->first();
        $pertanyaan = explode(",",$form->pertanyaan);
        $tipe = explode(",",$form->tipe);

        foreach ($tipe as $key => $tp){
            if($tp == 'file'){
                unset($pertanyaan[$key]);
                $this->num_file ++;
            }
        }
        $this->pertanyaan = $pertanyaan;
        
        $this->jenis = $id == 2 ? 'beduk' : 'webinar';

    }

    public function view(): View
    {

        return view('export.beduk_export',
            [
                'datas' => $this->data, 
                'pertanyaan' => $this->pertanyaan,
                'num_file' => $this->num_file,
                'jenis' => $this->jenis,
            ]);
    }

    public function styles(Worksheet $sheet)
    {
        // merge cells
        // $sheet->mergeCells('A3:K3')->setCellValue('A3',"Daftar Jabatan Supervisor yang ada di sekolah.");
        // $sheet->getStyle('A3:K3')->getFont()->setBold(true);

        

    }
}
