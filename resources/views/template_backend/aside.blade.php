 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
    @if(Auth::guard('web')->check())
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ asset('asset/dist/img/AdminLTELogo.png')}}" alt="Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SI</span>
        </a> 
    @endif
     

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                @if(Auth::guard('web')->check())
                    @include('template_backend/sidebaradmin')
                @else 
                <p class="text-success">
                    You Must Login
                </p>
                @endif
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
