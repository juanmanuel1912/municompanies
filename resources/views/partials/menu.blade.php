<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-users nav-icon">

                                    </i>
                                    {{ trans('cruds.team.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('basic_c_r_m_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.basicCRM.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('crm_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-statuses.index") }}" class="nav-link {{ request()->is('admin/crm-statuses') || request()->is('admin/crm-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-folder nav-icon">

                                    </i>
                                    {{ trans('cruds.crmStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_customer_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-customers.index") }}" class="nav-link {{ request()->is('admin/crm-customers') || request()->is('admin/crm-customers/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-plus nav-icon">

                                    </i>
                                    {{ trans('cruds.crmCustomer.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_note_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-notes.index") }}" class="nav-link {{ request()->is('admin/crm-notes') || request()->is('admin/crm-notes/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-sticky-note nav-icon">

                                    </i>
                                    {{ trans('cruds.crmNote.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_document_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-documents.index") }}" class="nav-link {{ request()->is('admin/crm-documents') || request()->is('admin/crm-documents/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-folder nav-icon">

                                    </i>
                                    {{ trans('cruds.crmDocument.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('city_access')
                <li class="nav-item">
                    <a href="{{ route("admin.cities.index") }}" class="nav-link {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.city.title') }}
                    </a>
                </li>
            @endcan
            @can('categories_item_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories-items.index") }}" class="nav-link {{ request()->is('admin/categories-items') || request()->is('admin/categories-items/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.categoriesItem.title') }}
                    </a>
                </li>
            @endcan
            @can('categories_type_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories-types.index") }}" class="nav-link {{ request()->is('admin/categories-types') || request()->is('admin/categories-types/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.categoriesType.title') }}
                    </a>
                </li>
            @endcan
            @can('territorio_veci_access')
                <li class="nav-item">
                    <a href="{{ route("admin.territorio-vecis.index") }}" class="nav-link {{ request()->is('admin/territorio-vecis') || request()->is('admin/territorio-vecis/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.territorioVeci.title') }}
                    </a>
                </li>
            @endcan
            @can('company_access')
                <li class="nav-item">
                    <a href="{{ route("admin.companies.index") }}" class="nav-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.company.title') }}
                    </a>
                </li>
            @endcan
            @can('centros_educativo_access')
                <li class="nav-item">
                    <a href="{{ route("admin.centros-educativos.index") }}" class="nav-link {{ request()->is('admin/centros-educativos') || request()->is('admin/centros-educativos/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.centrosEducativo.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>