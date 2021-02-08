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
        <i class="fa fa-address-card nav-icon"></i>
        <p>Resep</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rekam_medis.index') }}" class="nav-link {{ request()->is('rekam_medis') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Registrasi</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('diagnosa') }}" class="nav-link {{ request()->is('diagnosa*') ? 'active' : '' }}">
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
<!-- <li class="nav-item">
    <a href="{{ url('/test') }}" class="nav-link">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Test</p>
    </a>
</li> -->