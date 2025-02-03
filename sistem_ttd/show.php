<?php
// Koneksi Database
include "system/koneksi.php";

// Ambil data tanda tangan dari database
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_ttd ORDER BY no DESC");
$data = mysqli_fetch_array($tampil);
$ttd = $data['ttd']; // Tanda tangan dalam bentuk gambar

// Menggunakan PHPWord
require_once 'vendor/autoload.php'; // Memasukkan autoload Composer

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Membuat instance PHPWord
$phpWord = new PhpWord();
$section = $phpWord->addSection();

// Menambahkan teks (misalnya tempat untuk nama)
$section->addText('Jakarta, ' . date('d') . ' ' . date('F') . ' ' . date('Y'));

// Menambahkan gambar tanda tangan
$section->addImage($ttd, array('width' => 100, 'height' => 50));

// Menambahkan teks tanda tangan (tempat untuk nama)
$section->addText('(Fill with Your Name bro)');

// Simpan file Word
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('document_with_signature.docx');

// Output file untuk diunduh
header('Content-Type: application/msword');
header('Content-Disposition: attachment; filename="document_with_signature.docx"');
readfile('document_with_signature.docx');
?>
