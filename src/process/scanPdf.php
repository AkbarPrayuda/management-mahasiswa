<?php

require_once '../../vendor/autoload.php';
require_once '../../config/config.php';

$stmt = "SELECT nim, nama, alamat, nomor_wa, program_studi, tanggal_lahir FROM mahasiswa";
$stmt = $pdo->query($stmt);
$mahasiswa = $stmt->fetchAll();

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor WhatsApp</th>
                    <th>Program Studi</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>';

            $i = "1";
            foreach($mahasiswa as $m) {
                $html .= '<tr>
                    <td>' . $i++ . '</td>
                    <td>' . $m['nim'] . '</td>
                    <td>' . $m['nama'] . '</td>
                    <td>' . $m['alamat'] . '</td>
                    <td>' . $m['nomor_wa'] . '</td>
                    <td>' . $m['program_studi'] . '</td>
                    <td>' . $m['tanggal_lahir'] . '</td>
                </tr>';
            }

$html .= '
            </tbody>
        </table>
    </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>