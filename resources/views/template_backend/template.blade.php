@include('template_backend/header')
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    @yield('modal')
@include('template_backend/javascript')
