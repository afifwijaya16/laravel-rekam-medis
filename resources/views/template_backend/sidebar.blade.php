@if (Auth::user()->level == 'admin')
    @include('template_backend/sidebaradmin')
@elseif (Auth::user()->level == 'Dokter')
    @include('template_backend/sidebardokter')
@elseif (Auth::user()->level == 'Apoteker')
    @include('template_backend/sidebarapoteker')
@elseif (Auth::user()->level == 'Kasir')
    @include('template_backend/sidebarkasir')
@endif