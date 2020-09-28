  
<?php
    require_once('../config/koneksi.php');
    require_once('../models/database.php');
    include "../models/m_barang.php";
    $connection = new Database($host, $user, $pass, $database);
    $brg = new Barang($connection);

$content = '
    <style type="text/css">
        .tabel{ border-collapse:collapse;}
        .tabel th { padding:8px 5px; background-color:#f60; color:#fff; }
    </style>

';

$content .= '
    <page>
        <div style="padding:4mm; border=1px solid;" align="center">
            <span style="font-size:25px;" > Laporan Bulanan</span>
        </div>
        <div style="padding:20px 0 10px 0; font-size=15px;">
            Laporan data pemakaian barang
        </div>
        <table border="1px" class="tabel" width="100%">
            <tr>
                <th>No</th>
                <th>Nama barang</th>
                <th>Jumlah barang</th>
                <th>Tanggal</th>
            </tr>';
            $no = 1;
            if(@$_GET['id_pakai'] != '') {
                $tampil_pakai= $brg->tampil_pakai(@$_GET['id_pakai']);
            } else {
                if (@$_POST['cetak_pakai_barang']) {
                    $tampil_pakai= $brg->tampil_tgl(@$_POST['tgl_a'], @$_POST['tgl_b']);
                } else {
                    $tampil_pakai= $brg->tampil_pakai();
                }
                
            }
            
            while ($data = $tampil_pakai->fetch_object()) {
                $content .= '
            <tr>
                <td align="center">'.$no++.'</td>
                <td>'.$data->nama_brg.'</td>
                <td>'.$data->jumlah_brg.'</td>
                <td>'.$data->tanggal.'</td>
            </tr>"
                ';
            }

 $content .= ' 
    </table>

    </page>

';
require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
ob_end_clean();
$html2pdf->Output('laporan_pemakaian_barang.pdf');