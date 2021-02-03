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
    <a href="{{ url('/') }}" class="nav-link">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Data Pasien</p>
    </a>
</li>