<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(strlen($profesor->foto)>0? '/imgs/'.$profesor->foto:'/imgs/default.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{explode(" ",$profesor->nombres)[0].' '.explode(" ",$profesor->apellidos)[0]}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <li >
                <a href="{{ url('/usuario/update/'.$profesor->id) }}">
                <i class="fa fa-laptop"></i> <span>Mi Usuario</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/profesor/update/'.$profesor->id) }}">
                <i class="fa fa-edit"></i> <span>Mis Datos Personales</span>
                </a>
            </li>


            @if (strlen($profesor->nombres)>0)
            <li>
                <a href="{{ url('/publicidad/show/'.$profesor->id)}}">
                <i class="fa fa-files-o" ></i> <span>Mis Publicaciones</span>
                </a>
            </li>
            @else
            <li>
                <a href="#" style="color:LightGray" title="Complete sus Datos Personales">
                <i class="fa fa-files-o" ></i> <span>Mis Publicaciones</span>
                </a>
            </li>
            @endif


          


            <li>
                <a href="datosPersonales">
                <i class="fa fa-envelope"></i> <span>Mis Mensajes</span>
                </a>
            </li>

            <li>
                <a href="datosPersonales">
                <i class="fa fa-share"></i> <span>Sitio Web</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>