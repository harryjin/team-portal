<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('computer_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/real-pcs*") ? "menu-open" : "" }} {{ request()->is("admin/remote-pcs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/real-pcs*") ? "active" : "" }} {{ request()->is("admin/remote-pcs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-desktop">

                            </i>
                            <p>
                                {{ trans('cruds.computer.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('real_pc_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.real-pcs.index") }}" class="nav-link {{ request()->is("admin/real-pcs") || request()->is("admin/real-pcs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.realPc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('remote_pc_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.remote-pcs.index") }}" class="nav-link {{ request()->is("admin/remote-pcs") || request()->is("admin/remote-pcs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.remotePc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('communication_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/emails*") ? "menu-open" : "" }} {{ request()->is("admin/skypes*") ? "menu-open" : "" }} {{ request()->is("admin/discords*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/emails*") ? "active" : "" }} {{ request()->is("admin/skypes*") ? "active" : "" }} {{ request()->is("admin/discords*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-address-book">

                            </i>
                            <p>
                                {{ trans('cruds.communication.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('email_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.emails.index") }}" class="nav-link {{ request()->is("admin/emails") || request()->is("admin/emails/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-at">

                                        </i>
                                        <p>
                                            {{ trans('cruds.email.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('skype_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.skypes.index") }}" class="nav-link {{ request()->is("admin/skypes") || request()->is("admin/skypes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-skype">

                                        </i>
                                        <p>
                                            {{ trans('cruds.skype.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('discord_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.discords.index") }}" class="nav-link {{ request()->is("admin/discords") || request()->is("admin/discords/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-discord">

                                        </i>
                                        <p>
                                            {{ trans('cruds.discord.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('time_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/time-work-types*") ? "menu-open" : "" }} {{ request()->is("admin/time-projects*") ? "menu-open" : "" }} {{ request()->is("admin/time-entries*") ? "menu-open" : "" }} {{ request()->is("admin/time-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/time-work-types*") ? "active" : "" }} {{ request()->is("admin/time-projects*") ? "active" : "" }} {{ request()->is("admin/time-entries*") ? "active" : "" }} {{ request()->is("admin/time-reports*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-clock">

                            </i>
                            <p>
                                {{ trans('cruds.timeManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('time_work_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-work-types.index") }}" class="nav-link {{ request()->is("admin/time-work-types") || request()->is("admin/time-work-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-th">

                                        </i>
                                        <p>
                                            {{ trans('cruds.timeWorkType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('time_project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-projects.index") }}" class="nav-link {{ request()->is("admin/time-projects") || request()->is("admin/time-projects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.timeProject.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('time_entry_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-entries.index") }}" class="nav-link {{ request()->is("admin/time-entries") || request()->is("admin/time-entries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.timeEntry.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('time_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-reports.index") }}" class="nav-link {{ request()->is("admin/time-reports") || request()->is("admin/time-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.timeReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('client_management_setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/currencies*") ? "menu-open" : "" }} {{ request()->is("admin/transaction-types*") ? "menu-open" : "" }} {{ request()->is("admin/income-sources*") ? "menu-open" : "" }} {{ request()->is("admin/client-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/project-statuses*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/currencies*") ? "active" : "" }} {{ request()->is("admin/transaction-types*") ? "active" : "" }} {{ request()->is("admin/income-sources*") ? "active" : "" }} {{ request()->is("admin/client-statuses*") ? "active" : "" }} {{ request()->is("admin/project-statuses*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cog">

                            </i>
                            <p>
                                {{ trans('cruds.clientManagementSetting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('currency_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.currencies.index") }}" class="nav-link {{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-bill">

                                        </i>
                                        <p>
                                            {{ trans('cruds.currency.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transaction-types.index") }}" class="nav-link {{ request()->is("admin/transaction-types") || request()->is("admin/transaction-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transactionType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_source_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-sources.index") }}" class="nav-link {{ request()->is("admin/income-sources") || request()->is("admin/income-sources/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-database">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incomeSource.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.client-statuses.index") }}" class="nav-link {{ request()->is("admin/client-statuses") || request()->is("admin/client-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.clientStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-statuses.index") }}" class="nav-link {{ request()->is("admin/project-statuses") || request()->is("admin/project-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.projectStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('client_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/clients*") ? "menu-open" : "" }} {{ request()->is("admin/projects*") ? "menu-open" : "" }} {{ request()->is("admin/notes*") ? "menu-open" : "" }} {{ request()->is("admin/documents*") ? "menu-open" : "" }} {{ request()->is("admin/transactions*") ? "menu-open" : "" }} {{ request()->is("admin/client-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/clients*") ? "active" : "" }} {{ request()->is("admin/projects*") ? "active" : "" }} {{ request()->is("admin/notes*") ? "active" : "" }} {{ request()->is("admin/documents*") ? "active" : "" }} {{ request()->is("admin/transactions*") ? "active" : "" }} {{ request()->is("admin/client-reports*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-briefcase">

                            </i>
                            <p>
                                {{ trans('cruds.clientManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('client_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-plus">

                                        </i>
                                        <p>
                                            {{ trans('cruds.client.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.project.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('note_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.notes.index") }}" class="nav-link {{ request()->is("admin/notes") || request()->is("admin/notes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sticky-note">

                                        </i>
                                        <p>
                                            {{ trans('cruds.note.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.document.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-credit-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.client-reports.index") }}" class="nav-link {{ request()->is("admin/client-reports") || request()->is("admin/client-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.clientReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>