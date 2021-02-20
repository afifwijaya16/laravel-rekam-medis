<li class="nav-item">
    <a href="{{ route('resep.index') }}" class="nav-link {{ request()->is('resep*') ? 'active' : '' }}">
        <i class="fa fa-file-text nav-icon"></i>
        <p>Resep</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('diagnosa.index') }}" class="nav-link {{ request()->is('diagnosa*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Diagnosa</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rekam_medis.index') }}" class="nav-link {{ request()->is('rekam_medis*') ? 'active' : '' }}">
        <i class="fa fa-address-card nav-icon"></i>
        <p>Rekam Medis</p>
    </a>
</li>