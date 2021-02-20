<li class="nav-item">
    <a href="{{ route('obat.index') }}" class="nav-link {{ request()->is('obat*') ? 'active' : '' }}">
        <i class="fa fa-medkit nav-icon"></i>
        <p>Obat</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('resep.index') }}" class="nav-link {{ request()->is('resep*') ? 'active' : '' }}">
        <i class="fa fa-file-text nav-icon"></i>
        <p>Resep</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('apotik.index') }}" class="nav-link {{ request()->is('apotik*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Apotik</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rekam_medis.index') }}" class="nav-link {{ request()->is('rekam_medis*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Rekam Medis</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('laporan_pengeluaran_obat') }}" class="nav-link {{ request()->is('laporan_pengeluaran_obat*') ? 'active' : '' }}">
        <i class="fa fa-file nav-icon"></i>
        <p>Laporan Pengeluaran Obat</p>
    </a>
</li>