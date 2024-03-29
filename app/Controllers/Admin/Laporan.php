<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Libraries\PdfLibrary;

class Laporan extends BaseController
{
    function __construct()
    {
        $this->transaksi = new TransaksiModel();

        if (session()->get('role') != "Admin") {
            echo '<script>
            alert("Access Denied!");
            </script>';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => "Data Laporan | SIAPSIR - Sistem Aplikasi Kasir",
            'header' => "Data Laporan",
            'cardtitle' => "Tabel Rincian Laporan",
        ];

        $data['transaksi']  = $this->transaksi->getTransaksiByAllId()->getResult();

        $data['transaksicount'] = $this->transaksi->countAll();

        $data['page'] = view('admin/v_laporan', $data);

        echo view("admin/v_homepage", $data);
    }

    public function generatePdf()
    {
        // paste code here for generate report
        $pdf = new PdfLibrary(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://instagram.com/prodbyzxnz');
        $pdf->SetTitle('Laporan Transaksi | SIAPSIR - Sistem Aplikasi Kasir '. date('d-m-y'));
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('dejavusans', '', 8, '', true);

        // ---------------------------------------------------------


        //Generate HTML table data from MySQL - start
        $table = new \CodeIgniter\View\Table();

        $template = array(
            'table_open' => '<table border="1" cellpadding="4" cellspacing="4" style="padding: 10px;"><thead style="background-color: rgb(187, 214, 255);">'
        );

        $table->setTemplate($template);

        $table->setHeading('Tanggal Transaksi', 'Nama Pelanggan', 'Nama Produk', 'Harga', 'Jumlah Produk', 'Total Harga');

        $transaksi = $this->transaksi->getTransaksiByAllId()->getResult();


        foreach ($transaksi as $item) :
            $table->addRow($item->tgl_transaksi, $item->nama_pelanggan, $item->nama_produk, $item->harga, $item->jumlah_produk, $item->total_harga);
        endforeach;

        $html = $table->generate();
        //Generate HTML table data from MySQL - end

        // add a page
        $pdf->AddPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();

        //Close and output PDF document
        $pdf->Output('Laporan Transaksi SIAPSIR '. date('d-m-y') . '.pdf', 'D');
    }
}
