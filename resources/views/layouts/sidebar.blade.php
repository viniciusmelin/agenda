<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Painel Principal</li>
            <li>
              <a href="{{route('scheduling.index')}}">
                <i class="fa  fa-building-o"></i> <span>Agenda</span>
              </a>
            </li>
            <li>
              <a href="{{route('doctor.index')}}">
                <i class="fa fa-user-md"></i> <span>Médicos</span>
              </a>
            </li>
            <li>
                <a href="{{route('patient.index')}}">
                  <i class="fa fa-th"></i> <span>Pacientes</span>
                </a>
              </li>
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-hospital-o"></i>
                  <span>Segurança</span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i>Usuários</a></li>
                </ul>
              </li>
              <li>
                  <a href="{{route('doctor.jsonapi')}}" target="_blank" class="btn btn-danger btn-md">JSON
                      <i class="glyphicon glyphicon-list-alt"></i>
              </a>
              </li>

          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>