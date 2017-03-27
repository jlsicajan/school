<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
        @endif

    <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><span>DIRECTORA</span></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/directora/profesores') }}"><i class='fa fa-address-card'></i><span> Profesores</span></a></li>
            <li><a href="{{ url('/directora/grados') }}"><i class='fa fa-signal'></i><span> Grados</span></a></li>
            <li><a href="{{ url('directora/administradores') }}"><i class='fa fa-server'></i><span> Administradores</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
