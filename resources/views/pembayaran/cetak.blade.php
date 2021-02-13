<html>

<head>
    <title>Cetak Nota Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('asset/dist/css/app.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        @page {
            size: A58mm Roll Max;
            margin: 0;
        }

        @media print {
            #harga_list {
                text-align: right;
            }
        }

    </style>

<body>
    <div id="print_button_container" class="section-bill">
        <div class="bill-wrapper epson">
            <span class="img-triangle-top"></span>
            <div class="col-md-12 col-xs-12 bill-body" style="padding-right:15;padding-left:5;">
                <div class="img-receipt"></div>
                <div class="title"></div>

                <div class="text-wrapper clearfix">
                    <ul>
                        <div class="blockx col-sm-12 col-xs-12 text-center company-detailx">
                            <li>
                                <span class="company-namex" style="font-size:15pt;"> </span><br>
                                <span class="company-addresxs"> </span><br>
                                <span class="company-phonex">Telp. </span>
                                <p>&nbsp;</p>
                            </li>
                        </div>
                        <div class="top-bill">
                            <div class="block col-sm-12 col-xs-12">
                                <li>Nomor Nota : #{{ $rekam_medis->no_rekam }}</li>
                            </div>

                            <div class="block col-sm-12 col-xs-12">
                                <li>Tanggal : {{ Carbon\Carbon::parse($rekam_medis->created_at)->translatedFormat('d F Y') }}</li>
                            </div>
                            <div class="block col-sm-12 col-xs-12">
                                <li>Pasien : {{ $rekam_medis->pasien->nama_pasien }}</li>
                            </div>
                            <div class="block col-sm-12 col-xs-12">
                                <li>Kasir : {{ $rekam_medis->kasir->name }}</li>
                            </div>

                        </div>

                        <div class="dashed col-sm-12 col-xs-12"></div>
						@foreach ($rekam_medis->resep->detailpengeluaran as $detail_resep)
							<div class="block col-sm-12 col-xs-12">
								<li class="col-sm-8 col-xs-8 no-padding"> {{ $detail_resep->obat->nama }} </li>
								<li class="col-sm-1 col-xs-1 no-padding"> {{ $detail_resep->qty }} </li>
								<li class="col-sm-3 col-xs-3 text-right"> Rp.{{ number_format($detail_resep->total) }} </li>
							</div>
						@endforeach

                        <div class="dashed col-sm-12 col-xs-12"></div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Subtotal</li>
                            <li class="col-sm-3 col-xs-3 text-right"> Rp.{{ number_format($total_harga) }} </li>
                        </div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Biaya Tindakan </li>
                            <li class="col-sm-3 col-xs-3" style="text-align:right;"> {{ number_format($rekam_medis->user->biaya_tindakan) }}</li>
                        </div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding"><b>Total</b></li>
                            <li class="col-sm-3 col-xs-3 text-right"><b> Rp.{{ number_format($total_harga + $rekam_medis->user->biaya_tindakan) }} </li>
                        </div>

                        <div class="dashed col-sm-12 col-xs-12"></div>

                        <!-- <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Tunai</li>
                            <li class="col-sm-3 col-xs-3 text-right"> </li>
                        </div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Kembali</li>
                            <li class="col-sm-3 col-xs-3 text-right"> </li>
                        </div> -->

                        <div class="dashed dashed-block-social col-sm-12 col-xs-12" style="display: none;"></div>

                        <div class="bill-footer col-md-12 col-xs-12" style=""><strong id="get-watermark"> Powered by Layanan Klinik</strong></div>
                    </ul>
                </div>
            </div>
            <span class="img-triangle-bottom"></span>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script>
        window.print();

    </script> -->
</body>

</html>
