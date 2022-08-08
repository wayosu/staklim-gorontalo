<!DOCTYPE html>
<html>
<head>
    <title>Stasiun Klimatologi Bone Bolango</title>
</head>
<body>
    <p>Hi,</p>
    <p>Mohon maaf data anda tidak dapat diproses. Silahkan cek kembali data anda!</p>
    
    <hr>
    <p style="margin-bottom: 0px"><b>Info Data Pemohon: </b></p>
    <table>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td>{{ $mailData->judul }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $mailData->user->name }}</td>
        </tr>
        <tr>
            <td>Nim</td>
            <td>:</td>
            <td>{{ $mailData->user->nim }}</td>
        </tr>
        <tr>
            <td>Universitas</td>
            <td>:</td>
            <td>{{ $mailData->user->universitas }}</td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td>:</td>
            <td>{{ $mailData->user->prodi }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>Gagal Verifikasi</td>
        </tr>
    </table>
     
    <p>Thank you!</p>
</body>
</html>