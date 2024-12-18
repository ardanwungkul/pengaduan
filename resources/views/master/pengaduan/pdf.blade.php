<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        padding: 5px
    }

    table {
        width: 100%
    }
</style>

<body>
    <div>
        <table style="border: none">
            <tr>
                <td style="width: 20%;border: none"></td>
                <td style="width: 20%;border: none"></td>
                <td style="width: 20%;border: none">
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logo-kab-paser.png'))) }}"
                        style="width: 100%">
                <td style="width: 20%;border: none"></td>
                </td>
                <td style="width: 20%;border: none"></td>
            </tr>
        </table>

    </div>
    <div>
        <p
            style="text-align: center;
                    font-size: 18px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    font-weight: 700;
                    width: auto;
                    margin-left: auto;
                    margin-right: auto;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.053);">
            BUKTI TANDA REGISTRASI LAYANAN PENGADUAN
        </p>
    </div>
    <table style="width: 100%">
        <tr>
            <td style="width: 150px">Nomor Registrasi</td>
            <td>{{ $pengaduan->nomor_pendaftaran }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Nama Lengkap</td>
            <td>{{ $pengaduan->nama }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Alamat</td>
            <td>{{ $pengaduan->alamat }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Email/Hp</td>
            <td>{{ $pengaduan->email }} / {{ $pengaduan->telepon }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Tanggal Pengaduan</td>
            <td>{{ $pengaduan->created_at->format('d M Y h:i') }}</td>
        </tr>
    </table>
</body>

</html>
