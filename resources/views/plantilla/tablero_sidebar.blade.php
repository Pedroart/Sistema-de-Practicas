<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">

            <a class="d-block"> {{ ucfirst(Auth::user()->getRoleNames()->first()) }} {{ Auth::user()->name }}</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <x-nav-dropdown :permiso="'files.conf'" :title="'Archivos'" :icon="'fas fa-file'" :links="[
                ['url' =>  route('rutafiles.index') , 'text' => 'Conf. Rutas'],
                ['url' =>  route('files.index') , 'text' => 'Listado'],
                ['url' =>  route('enlaces.index') , 'text' => 'Pagina Enlaces'],
            ]" />
            <x-nav-dropdown :permiso="'user.conf'" :title="'Usuarios'" :icon="'fas fa-user'" :links="[
                //['url' =>  route('personas.index') , 'text' => 'Personas'],
                ['url' =>  route('userinstitucionals.index') , 'text' => 'Institucionales'],
            ]" />
            <x-nav-dropdown :permiso="'empresas.conf'" :title="'Empresa'" :icon="'fas fa-building'" :links="[
                ['url' =>  route('empresas.index') , 'text' => 'Empresas (RUC)'],
                ['url' =>  route('empleados.index') , 'text' => 'Empleados'],
            ]" />
            <x-nav-dropdown :permiso="'confproceso.view'" :title="'Conf. Proceso'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('semestres.index') , 'text' => 'Semestres'],
                ['url' =>  route('tipoprocesos.index') , 'text' => 'Conf. Proceso'],
                ['url' =>  route('tipoetapas.index') , 'text' => 'Conf. Etapas'],
                ['url' =>  route('estados.index') , 'text' => 'Conf. Estados'],
            ]" />

            <li class="nav-item">
                <div style="height: 20px;"></div> <!-- Puedes ajustar la altura según lo necesites -->
            </li>

            <x-nav-dropdown :permiso="'matricula.view'" :title="'Matricula'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('matriculas.index') , 'text' => 'Registro'],
            ]" />
            <x-nav-dropdown :permiso="'registro.view'" :title="'Validación'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('registros.index') , 'text' => 'Docente Supervisor'],
            ]" />

            <li class="nav-item">
                <div style="height: 20px;"></div> <!-- Puedes ajustar la altura según lo necesites -->
            </li>

            <x-nav-dropdown :permiso="'procesos.view'" :title="'Procesos'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('procesos.index') , 'text' => 'Listado'],
            ]" />

            <x-nav-dropdown :permiso="'procesos.view'" :title="'Seccion'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('secciones.index') , 'text' => 'Listado'],
                ['url' =>  route('validacion.index',['nombre'=>'Registro de Supervicion']) , 'text' => 'Registro de Supervicion'],
            ]" />

            <x-nav-dropdown :permiso="'proceso.view'" :title="'Desarrollo Regulares'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('proceso.index',['nombre'=>'desarrollo']) , 'text' => 'Desarrollo'],
                ['url' =>  route('proceso.index',['nombre'=>'convalidacion']) , 'text' => 'Convalidacion'],
            ]" />
            <!--
            <x-nav-dropdown :permiso="'proceso.view'" :title="'Procesos Registro'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('proceso.index',['nombre'=>'emprendimiento']) , 'text' => 'Emprendimiento'],
                ['url' =>  route('proceso.index',['nombre'=>'complementarias']) , 'text' => 'Complementarias'],
            ]" />
            -->
            <x-nav-dropdown :permiso="'registro.create'" :title="'Supervisión'" :icon="'fas fa-book'" :links="[
                ['url' =>  route('validacion.index',['nombre'=>'Registro de Supervicion']) , 'text' => 'Registro de Supervicion'],
            ]" />

            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="tablero/index.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tablero/index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tablero/index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v3</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Widgets
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Layout Options
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">6</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Top Navigation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Top Navigation + Sidebar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/boxed.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Boxed</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/fixed-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Sidebar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Sidebar <small>+ Custom Area</small></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/fixed-topnav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Navbar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/fixed-footer.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Footer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/collapsed-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Collapsed Sidebar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Charts
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../charts/chartjs.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ChartJS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Flot</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../charts/inline.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inline</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../charts/uplot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>uPlot</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                        UI Elements
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../UI/general.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>General</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/icons.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/buttons.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buttons</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/sliders.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sliders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/modals.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Modals & Alerts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/navbar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Navbar & Tabs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/timeline.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Timeline</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../UI/ribbons.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ribbons</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Forms
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../forms/general.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>General Elements</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../forms/advanced.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Advanced Elements</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../forms/editors.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Editors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../forms/validation.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Validation</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Tables
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Simple Tables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../tables/data.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DataTables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../tables/jsgrid.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>jsGrid</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
                <a href="../calendar.html" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Calendar
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../gallery.html" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Gallery
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../kanban.html" class="nav-link">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>
                        Kanban Board
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Mailbox
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../mailbox/mailbox.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inbox</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../mailbox/compose.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Compose</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../mailbox/read-mail.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Pages
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../examples/invoice.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/profile.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/e-commerce.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>E-commerce</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/projects.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/project-add.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Project Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/project-edit.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Project Edit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/project-detail.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Project Detail</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/contacts.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contacts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/faq.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>FAQ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/contact-us.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact us</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Extras
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Login & Register v1
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../examples/login.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Login v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../examples/register.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../examples/forgot-password.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forgot Password v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../examples/recover-password.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Recover Password v1</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Login & Register v2
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../examples/login-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Login v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../examples/register-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../examples/forgot-password-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forgot Password v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../examples/recover-password-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Recover Password v2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/lockscreen.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lockscreen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/legacy-user-menu.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Legacy User Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/language-menu.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Language Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/404.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Error 404</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/500.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Error 500</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/pace.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pace</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../examples/blank.html" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blank Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tablero/starter.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Starter Page</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-search"></i>
                    <p>
                        Search
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../search/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Simple Search</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../search/enhanced.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Enhanced</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
                <a href="tablero/iframe.html" class="nav-link">
                    <i class="nav-icon fas fa-ellipsis-h"></i>
                    <p>Tabbed IFrame Plugin</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Documentation</p>
                </a>
            </li>
            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Level 1
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Level 2
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                </a>
            </li>
            <li class="nav-header">LABELS</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Important</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Warning</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>Informational</p>
                </a>
            </li> -->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
