<li class="nav-item">
    <a href="{{ route('obat.index') }}" class="nav-link {{ request()->is('obat*') ? 'active' : '' }}">
        <i class="fa fa-medkit nav-icon"></i>
        <p>Obat</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('dokter.index') }}" class="nav-link {{ request()->is('dokter*') ? 'active' : '' }}">
        <i class="fa fa-users nav-icon"></i>
        <p>Data Dokter</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pasien.index') }}" class="nav-link {{ request()->is('pasien*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Data Pasien</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('resep.index') }}" class="nav-link {{ request()->is('resep*') ? 'active' : '' }}">
        <i class="fa fa-file-text nav-icon"></i>
        <p>Resep</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('registrasi.index') }}" class="nav-link {{ request()->is('registrasi') ? 'active' : '' }}">
        <i class="fa fa-registered nav-icon"></i>
        <p>Registrasi</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('diagnosa.index') }}" class="nav-link {{ request()->is('diagnosa*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Diagnosa</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('apotik.index') }}" class="nav-link {{ request()->is('apotik*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Apotik</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pembayaran.index') }}" class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Pembayaran</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rekam_medis.index') }}" class="nav-link {{ request()->is('rekam_medis*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Rekam Medis</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('laporan_pengunjung') }}" class="nav-link {{ request()->is('laporan_pengunjung*') ? 'active' : '' }}">
        <i class="fa fa-file nav-icon"></i>
        <p>Laporan Pengunjung</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('laporan_pengeluaran_obat') }}" class="nav-link {{ request()->is('laporan_pengeluaran_obat*') ? 'active' : '' }}">
        <i class="fa fa-file nav-icon"></i>
        <p>Laporan Pengeluaran Obat</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('laporan_pendapatan') }}" class="nav-link {{ request()->is('laporan_pendapatan*') ? 'active' : '' }}">
        <i class="fa fa-file nav-icon"></i>
        <p>Laporan Pendapatan</p>
    </a>
</li>
<!-- <li class="nav-item">
    <a href="{{ url('/test') }}" class="nav-link">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Test</p>
    </a>
</li> -->