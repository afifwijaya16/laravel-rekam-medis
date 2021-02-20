<li class="nav-item">
    <a href="{{ route('registrasi.index') }}" class="nav-link {{ request()->is('registrasi') ? 'active' : '' }}">
        <i class="fa fa-registered nav-icon"></i>
        <p>Registrasi</p>
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