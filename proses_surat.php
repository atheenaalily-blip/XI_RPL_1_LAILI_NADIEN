```php
<?php

// Masukkan library Dompdf
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Zona waktu Indonesia
date_default_timezone_set('Asia/Jakarta');

// Cek apakah form dikirim dengan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama'] ?? '');
    $nis = htmlspecialchars($_POST['nis'] ?? '');
    $kelas = htmlspecialchars($_POST['kelas'] ?? '');
    $alasan = htmlspecialchars($_POST['alasan'] ?? '');
    $keterangan = htmlspecialchars($_POST['keterangan'] ?? '');

    // Format tanggal
    $tgl_mulai = date('d F Y', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('d F Y', strtotime($_POST['tgl_selesai']));
    $tgl_sekarang = date('d F Y');

    // Template HTML untuk PDF
    $html = '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">

        <title>Surat Izin</title>

        <style>

            body {
                font-family: "Times New Roman";
                font-size: 12pt;
                margin: 20px;
            }

            .kop {
                font-family: "Century Gothic";
                text-align: center;
                border-bottom: 3px double #000;
                padding-bottom: 10px;
                margin-bottom: 20px;
            }

            .kop h2 {
                margin: 0;
                font-size: 16pt;
                text-transform: uppercase;
            }

            .kop p {
                margin: 2px;
                font-size: 10pt;
            }

            .title {
                text-align: center;
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: 20px;
            }

            .content {
                line-height: 1.6;
                text-align: justify;
            }

            .table-data {
                margin: 15px 0 15px 30px;
                width: 90%;
            }

            .table-data td {
                padding: 4px 0;
                vertical-align: top;
            }

            .ttd-container {
                width: 100%;
                margin-top: 50px;
            }

            .ttd-box {
                float: right;
                width: 200px;
                text-align: center;
            }

        </style>
    </head>

    <body>

        <!-- KOP SURAT -->
        <div class="kop">

            <h2>SMK TEXMACO SEMARANG</h2>

            <p>
                Jl. Raya Mangkang Kulon | Telp: (012) 245-6789
            </p>

        </div>


        <!-- JUDUL -->
        <div class="title">

            SURAT IZIN MENINGGALKAN KELAS

        </div>


        <!-- ISI SURAT -->
        <div class="content">

            <p>
                Yang bertanda tangan di bawah ini:
            </p>


            <!-- DATA SISWA -->
            <table class="table-data">

                <tr>

                    <td width="130">
                        Nama
                    </td>

                    <td width="15">
                        :
                    </td>

                    <td>
                        <b>' . $nama . '</b>
                    </td>

                </tr>


                <tr>

                    <td>
                        NIS
                    </td>

                    <td>
                        :
                    </td>

                    <td>
                        <b>' . $nis . '</b>
                    </td>

                </tr>


                <tr>

                    <td>
                        Kelas
                    </td>

                    <td>
                        :
                    </td>

                    <td>
                        <b>' . $kelas . '</b>
                    </td>

                </tr>

            </table>


            <!-- ALASAN IZIN -->
            <p>

                Bermaksud untuk mengajukan izin meninggalkan kelas,
                pada tanggal <b>' . $tgl_mulai . '</b>
                sampai dengan <b>' . $tgl_selesai . '</b>
                dikarenakan <b>' . $alasan . '</b>.

            </p>


            <!-- KETERANGAN -->
            ' . ($keterangan
                ? '<p>
                        <b>Detail Keterangan:</b>
                        ' . $keterangan . '
                   </p>'
                : '') . '


            <!-- PENUTUP -->
            <p>

                Demikian surat pengajuan izin ini saya buat.
                Atas perhatian dan pengertian Bapak/Ibu,
                saya ucapkan terima kasih.

            </p>

        </div>


        <!-- TANDA TANGAN -->
        <div class="ttd-container">

            <div class="ttd-box">

                <p>

                    Semarang, ' . $tgl_sekarang . '<br>

                    Hormat Saya,

                </p>


                <br>
                <br>
                <br>


                <p>

                    <b>(' . $nama . ')</b>

                </p>

            </div>

        </div>

    </body>
    </html>
    ';


    // ==========================================
    // KONFIGURASI DOMPDF
    // ==========================================

    $options = new Options();

    // Mengizinkan gambar/file eksternal
    $options->set('isRemoteEnabled', true);


    // Membuat objek Dompdf
    $dompdf = new Dompdf($options);


    // Memasukkan HTML ke Dompdf
    $dompdf->loadHtml($html);


    // Ukuran kertas A4 dan posisi portrait
    $dompdf->setPaper('A4', 'portrait');


    // Proses render
    $dompdf->render();


    // Nama file PDF
    $nama_file = 'Surat_Izin_' . str_replace(' ', '_', $nama) . '.pdf';


    // Tampilkan PDF di browser
    $dompdf->stream(
        $nama_file,
        array(
            "Attachment" => false
        )
    );
}

?>
```
