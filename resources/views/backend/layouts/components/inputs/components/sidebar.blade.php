<!-- Sidebar Nav -->
<aside id="sidebar" class="js-custom-scroll side-nav">
    <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0 pb-5">
        @can('dashboard-read')
            <!-- Title -->
            <li class="sidebar-heading h6">Dashboard</li>
            <!-- End Title -->

            <!-- Dashboard -->
            <li class="side-nav-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="side-nav-menu-link media align-items-center" href="{{ route('backend.dashboard') }}">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <iconify-icon icon="clarity:dashboard-line"></iconify-icon>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard -->
        @endcan
        @canany(['task-access-others', 'task-status', 'task-view', 'task-create', 'task-edit', 'task-delete',
            'project-create', 'project-read', 'project-update', 'project-delete'])
            <!-- Title -->
            <li class="sidebar-heading h6">Operations</li>
            <!-- End Title -->
            @canany(['task-access-others', 'task-status', 'task-view', 'task-create', 'task-edit', 'task-delete'])
                <!-- Dashboard -->
                <li class="side-nav-menu-item {{ Request::is('tasks') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('backend.tasks.index') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <iconify-icon icon="clarity:tasks-line"></iconify-icon>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Task Board</span>
                    </a>
                </li>
                <!-- End Dashboard -->
            @endcanany
            @canany(['project-create', 'project-read', 'project-update', 'project-delete'])
                <!-- Dashboard -->
                <li class="side-nav-menu-item {{ Request::is('projects') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('backend.projects.index') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <iconify-icon icon="eos-icons:project"></iconify-icon>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Projects</span>
                    </a>
                </li>
                <!-- End Dashboard -->
            @endcanany
        @endcanany
        @canany(['transaction_type-create', 'transaction_type-read', 'transaction_type-update',
            'transaction_type-delete', 'transaction-create', 'transaction-read', 'transaction-update', 'transaction-delete',
            'salary-create', 'salary-read', 'salary-update', 'salary-delete', 'financial-create', 'financial-read',
            'financial-update', 'financial-delete'])
            <!-- Title -->
            <li class="sidebar-heading h6">Financial Dashboard</li>
            <!-- End Title -->
            <!-- Dashboard -->
            <li class="side-nav-menu-item  side-nav-has-menu {{ Request::is('transaction_types') ? 'active' : '' }}">
                <a class="side-nav-menu-link media align-items-center" href="#" data-target="#financial">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <iconify-icon icon="map:finance"></iconify-icon>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Financial Dashboard</span>
                    <span class="side-nav-control-icon d-flex">
                        <iconify-icon icon="pepicons-pencil:angle-right" class="side-nav-fadeout-on-closed"></iconify-icon>
                    </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>
                <ul id="financial"
                    class="side-nav-menu side-nav-menu-second-level mb-0 {{ Request::is('transaction') ? 'active' : '' }}">
                    @canany(['transaction_type-create', 'transaction_type-read', 'transaction_type-update',
                        'transaction_type-delete'])
                        <li class="side-nav-menu-item {{ Request::is('transaction_types/index') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.transaction_types.index') }}">Transaction
                                Types</a>
                        </li>
                    @endcanany
                    @canany(['transaction-create', 'transaction-read', 'transaction-update', 'transaction-delete'])
                        <li class="side-nav-menu-item {{ Request::is('transactions/index') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.transactions.index') }}">All Transactions</a>
                        </li>
                    @endcanany
                    @canany(['salary-create', 'salary-read', 'salary-update', 'salary-delete'])
                        <li class="side-nav-menu-item {{ Request::is('salaries/index') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.salaries.index') }}">Salaries</a>
                        </li>
                    @endcanany
                    @canany(['financial-create', 'financial-read', 'financial-update', 'financial-delete'])
                        <li class="side-nav-menu-item {{ Request::is('financial_dashboard/index') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.financial_dashboard.index') }}">Financial
                                Statement</a>
                        </li>
                    @endcanany
                </ul>
            </li>
            <!-- End Dashboard -->
        @endcanany
        @canany(['blog-view', 'blog-edit', 'blog-create', 'blog-delete', 'blog-access-others', 'blog-categories-view',
            'blog-categories-create', 'blog-categories-edit', 'blog-categories-delete'])
            <!-- Title -->
            <li class="sidebar-heading h6">Blogs</li>
            <!-- End Title -->

            <!-- Dashboard -->
            <li class="side-nav-menu-item side-nav-has-menu {{ Request::is('blogs') ? 'active' : '' }}">
                <a class="side-nav-menu-link media align-items-center" href="#" data-target="#blogs">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <iconify-icon icon="bytesize:feed"></iconify-icon>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Blogs</span>
                    <span class="side-nav-control-icon d-flex">
                        <iconify-icon icon="pepicons-pencil:angle-right" class="side-nav-fadeout-on-closed"></iconify-icon>
                    </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>
                <ul id="blogs"
                    class="side-nav-menu side-nav-menu-second-level mb-0 {{ Request::is('blogs/*') ? 'active' : '' }}">
                    @can('blog-categories-view')
                        <li class="side-nav-menu-item {{ Request::is('categories/index') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.categories.index') }}">All Categories</a>
                        </li>
                    @endcan
                    @can('blog-view')
                        <li class="side-nav-menu-item {{ Request::is('blogs/index') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.blogs.index') }}">All Blogs</a>
                        </li>
                    @endcan
                </ul>
            </li>
            <!-- End Dashboard -->
        @endcan
        @can('frontend-edit')
            <!-- Title -->
            <li class="sidebar-heading h6">Website Management</li>
            <!-- End Title -->

            <!-- Homepage -->
            <li class="side-nav-menu-item side-nav-has-menu {{ Request::is('frontend') ? 'active' : '' }}">
                <a class="side-nav-menu-link media align-items-center" href="#" data-target="#frontend">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <iconify-icon icon="mdi:home-outline"></iconify-icon>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Contents</span>
                    <span class="side-nav-control-icon d-flex">
                        <iconify-icon icon="pepicons-pencil:angle-right" class="side-nav-fadeout-on-closed"></iconify-icon>
                    </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>
                <!-- Pages: sub -->
                <ul id="frontend"
                    class="side-nav-menu side-nav-menu-second-level mb-0 {{ Request::is('frontend/*') ? 'active' : '' }}">
                    @can('frontend-edit')
                        <li class="side-nav-menu-item {{ Request::is('frontend/homepage') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.frontend.homepage.index') }}">Homepage</a>
                        </li>
                        <li class="side-nav-menu-item {{ Request::is('frontend/about') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.frontend.about.index') }}">About</a>
                        </li>
                        <li class="side-nav-menu-item {{ Request::is('frontend/services') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.frontend.services.index') }}">Services</a>
                        </li>
                        <li class="side-nav-menu-item {{ Request::is('frontend/career') ? 'active' : '' }}">
                            <a class="side-nav-menu-link" href="{{ route('backend.frontend.career.index') }}">Career</a>
                        </li>
                    @endcan
                </ul>
                <!-- Users: sub -->
                {{-- <a class="side-nav-menu-link media align-items-center" href="{{ route('backend.free_giveaway.index') }}">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <iconify-icon icon="mdi:home-outline"></iconify-icon>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Free Giveaway</span>
                </a> --}}
            </li>
            <!-- End Homepage -->
        @endcanany
        @canany(['user-read', 'user-create', 'user-update', 'user-delete'])
            <!-- Title -->
            <li class="sidebar-heading h6">Users</li>
            <!-- End Title -->
            <!-- Users -->
            <li class="side-nav-menu-item side-nav-has-menu {{ Request::is('users') ? 'active' : '' }}">
                <a class="side-nav-menu-link media align-items-center" href="#" data-target="#users">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <iconify-icon icon="clarity:user-line"></iconify-icon>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Users</span>
                    <span class="side-nav-control-icon d-flex">
                        <iconify-icon icon="pepicons-pencil:angle-right"
                            class="side-nav-fadeout-on-closed"></iconify-icon>
                    </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>
                <!-- Users: sub -->
                <ul id="users" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item {{ Request::is('users') ? 'active' : '' }}">
                        <a class="side-nav-menu-link" href="{{ route('backend.users.index') }}">All Users</a>
                    </li>
                </ul>
                <!-- Users: sub -->
            </li>
            <!-- End Users -->
        @endcanany
        @canany(['role-read', 'role-create', 'role-update', 'role-delete', 'permission-read', 'permission-create',
            'permission-update', 'permission-delete', 'settings-update', 'settings-read', 'activity_log', 'third-party', 'database'])
            <!-- Title -->
            <li class="sidebar-heading h6">Administration</li>
            <!-- End Title -->
            @canany(['activity_log'])
                <!-- activity_log -->
                <li class="side-nav-menu-item {{ Request::is('activity_log') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('backend.activity_log.index') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <iconify-icon icon="ph:note-light"></iconify-icon>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Activity Log</span>
                    </a>

                </li>
                <!-- End activity_log -->
            @endcanany
            @canany(['role-read', 'role-create', 'role-update', 'role-delete', 'permission-read', 'permission-create',
                'permission-update', 'permission-delete'])
                <!-- Roles -->
                <li class="side-nav-menu-item side-nav-has-menu {{ Request::is('roles') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#roles">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <iconify-icon icon="clarity:user-line"></iconify-icon>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Roles & Permission</span>
                        <span class="side-nav-control-icon d-flex">
                            <iconify-icon icon="pepicons-pencil:angle-right"
                                class="side-nav-fadeout-on-closed"></iconify-icon>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>
                    <!-- Roles: sub -->
                    <ul id="roles" class="side-nav-menu side-nav-menu-second-level mb-0">
                        @canany(['role-read', 'role-create', 'role-update', 'role-delete'])
                            <li class="side-nav-menu-item {{ Request::is('roles') ? 'active' : '' }}">
                                <a class="side-nav-menu-link" href="{{ route('backend.roles.index') }}">Roles</a>
                            </li>
                        @endcanany
                        @canany(['permission-read', 'permission-create', 'permission-update', 'permission-delete'])
                            <li class="side-nav-menu-item {{ Request::is('permissions') ? 'active' : '' }}">
                                <a class="side-nav-menu-link" href="{{ route('backend.permissions.index') }}">Permission</a>
                            </li>
                        @endcanany
                    </ul>
                    <!-- Roles: sub -->

                </li>
                <!-- End Roles -->
            @endcanany
            @canany(['settings-update', 'settings-read', 'database'])
                <!-- Settings -->
                <li class="side-nav-menu-item side-nav-has-menu {{ Request::is('settings') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#settings">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <iconify-icon icon="ph:gear-light"></iconify-icon>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Settings</span>
                        <span class="side-nav-control-icon d-flex">
                            <iconify-icon icon="pepicons-pencil:angle-right"
                                class="side-nav-fadeout-on-closed"></iconify-icon>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>
                    <!-- Settings: sub -->
                    <ul id="settings" class="side-nav-menu side-nav-menu-second-level mb-0">
                        @canany(['settings-update', 'settings-read'])
                            <li class="side-nav-menu-item {{ Request::is('settings') ? 'active' : '' }}">
                                <a class="side-nav-menu-link" href="{{ route('backend.settings.index') }}">System Settings</a>
                            </li>
                        @endcanany
                        @canany(['database'])
                            <li class="side-nav-menu-item {{ Request::is('settings/backup') ? 'active' : '' }}">
                                <a class="side-nav-menu-link" href="{{ route('backend.settings.backup') }}">Backup and
                                    Restore</a>
                            </li>
                        @endcanany
                    </ul>
                    <!-- Settings: sub -->

                </li>
                <!-- End Settings -->
            @endcanany
            @canany(['third-party'])
                <!-- third_party -->
                <li class="side-nav-menu-item side-nav-has-menu {{ Request::is('third_party/*') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#third_party">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <iconify-icon icon="clarity:plugin-line"></iconify-icon>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Third Party</span>
                        <span class="side-nav-control-icon d-flex">
                            <iconify-icon icon="pepicons-pencil:angle-right"
                                class="side-nav-fadeout-on-closed"></iconify-icon>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>
                    <!-- third_party: sub -->
                    <ul id="third_party" class="side-nav-menu side-nav-menu-second-level mb-0">
                        @canany(['third_party'])
                            <li class="side-nav-menu-item {{ Request::is('third_party') ? 'active' : '' }}">
                                <a class="side-nav-menu-link"
                                    href="{{ route('backend.settings.third_party.facebook.index') }}">Meta
                                    Pixel</a>
                            </li>
                            <li class="side-nav-menu-item {{ Request::is('third_party') ? 'active' : '' }}">
                                <a class="side-nav-menu-link"
                                    href="{{ route('backend.settings.third_party.google_analytics.index') }}">Google Analytics</a>
                            </li>
                            <li class="side-nav-menu-item {{ Request::is('third_party') ? 'active' : '' }}">
                                <a class="side-nav-menu-link"
                                    href="{{ route('backend.settings.third_party.youtube.index') }}">Youtube Videos API</a>
                            </li>
                        @endcanany
                    </ul>
                    <!-- Settings: sub -->

                </li>
                <!-- End Settings -->
            @endcanany
        @endcanany
    </ul>
</aside>
<!-- End Sidebar Nav -->
