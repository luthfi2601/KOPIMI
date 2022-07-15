<?php
// include "koneksi.php";
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "kopimi";
$connect = mysqli_connect($host, $user, $pass, $dbnm);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Nyambung gais";
mysqli_close($connect);
//end

$query = "SELECT no_pesan, nama_pesan FROM tbl_order";
$sql = mysqli_query($connect, $query);
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
    array_push($data, $row);
}
#setting judul dan header tabel
$judul = "FAKTUR PENJUALAN";
$header = array(
    array("label"=>"NO PESANAN", "length"=>25, "align"=>"L"),
    array("label"=>"NAMA PESANAN", "length"=>25, "align"=>"L")
);

require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

#judul
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 20, $judul, '0', 1, 'C');

#header
$pdf->SetFont('Arial', '', '12');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

#tampilkan data tabelnya
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
    $i = 0;
    foreach ($baris as $cell){
        $pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
    $i++;
    }
    $fill = !$fill;
$pdf->Ln();
}
#output
$pdf->Output();
?>