<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
@include('pasien/css_show')
<div class='card'>
    <header>
        <h1>Data Pasien</h1>
    </header>
    <article>
        <img id='thumb' src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('data_pasien', $pasien->nomor_pasien), 'QRCODE')}}" alt="barcode" />
        <div class='area'>
            <h2>{{ $pasien->nama_pasien }}</h2>
            <ul>
                <li>
                    Tanggal Lahir
                    : {{ $pasien->tgl_lahir }}
                </li>
                <li>
                    Alamat
                    : {{ $pasien->alamat }}
                </li>
                <li>
                    No Telepon
                    : 
                    {{ $pasien->telepon }}
                </li>
            </ul>
        </div>
    </article>
</div>

</html>
