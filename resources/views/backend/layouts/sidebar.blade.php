@php
    $user = Auth::guard('admin')->user();
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('frontend.home') }}">
                @php
                    $settings = \App\Models\Setting::first();
                @endphp
                <img alt="image" src="{{ $settings ? url('storage/' . $settings->logo) : '' }}" class="header-logo"
                    style="height: 70%" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>

            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            @if ($user->can('transactions-read'))
                <li class="dropdown">
                    <a href="{{ route('admin.transactions_history.index') }}" class="nav-link">
                        <i data-feather="dollar-sign"></i>
                        <span>Transaction History</span></a>
                </li>
            @endif



            @if (
                $user->can('biodata-create') or
                    $user->can('biodata-pending') or
                    $user->can('biodata-approved') or
                    $user->can('biodata-married') or
                    $user->can('biodata-deleted') or
                    $user->can('biodata-suspected'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="book"></i><span>Biodata</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('biodata-create'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.create') }}">Create Biodata</a></li>
                        @endif
                        @if ($user->can('biodata-pending'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.pending') }}">Pending Biodata</a>
                            </li>
                        @endif
                        @if ($user->can('biodata-approved'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.approved') }}">Approved Biodata</a>
                            </li>
                        @endif
                        @if ($user->can('biodata-suspected'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.suspected') }}">Suspected Biodata</a>
                            </li>
                        @endif
                        @if ($user->can('biodata-married'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.married') }}">Married Biodata</a>
                            </li>
                        @endif
                        @if ($user->can('biodata-deleted'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.deleted') }}">Deleted Biodata</a>
                            </li>
                        @endif
                        @if ($user->can('biodata-incomplete'))
                            <li><a class="nav-link" href="{{ route('admin.biodata.incomplete') }}">Incomplete Biodata</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if ($user->can('packages-read'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="package"></i><span>Packages</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('packages-read'))
                            <li><a class="nav-link" href="{{ route('admin.packages.index') }}">All Packages</a></li>
                        @endif
                        @if ($user->can('packages-create'))
                            <li><a class="nav-link" href="{{ route('admin.packages.create') }}">Create Packages</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($user->can('coupons-read'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="tag"></i><span>Coupons</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('coupons-read'))
                            <li><a class="nav-link" href="{{ route('admin.coupons.index') }}">All Coupons</a></li>
                        @endif
                        @if ($user->can('coupons-create'))
                            <li><a class="nav-link" href="{{ route('admin.coupons.create') }}">Create Coupons</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if ($user->can('admin-view') || $user->can('user-read'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>All
                            Users & Admin</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('admin-view'))
                            <li><a class="nav-link" href="{{ route('admin.admin.index') }}">Admin</a></li>
                        @endif
                        @if ($user->can('user-read'))
                            <li><a class="nav-link" href="{{ route('admin.users.index') }}">Users</a></li>
                        @endif
                        {{-- @if ($user->can('admin-view') && $user->can('user-read'))
                            <li><a class="nav-link" href="{{ route('admin.allUser.admin.show') }}">Users & Admin</a>
                            </li>
                        @endif --}}
                    </ul>
                </li>
            @endif
            @if ($user->can('biodata_report-read'))
                <li class="dropdown">
                    <a href="{{ route('admin.biodata_report.index') }}" class="nav-link">
                        <i data-feather="alert-triangle"></i>
                        <span>Reports</span></a>
                </li>
            @endif
            @if ($user->can('contact_form-read'))
                <li class="dropdown">
                    <a href="{{ route('admin.contact_form.index') }}" class="nav-link">
                        <i data-feather="mail"></i>
                        <span>Contact Form</span></a>
                </li>
            @endif
            @if ($user->can('permission-read') || $user->can('role-read'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="settings"></i><span>Role & Permission</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('role-read'))
                            <li><a class="nav-link" href="{{ route('admin.roles.index') }}">Role</a></li>
                        @endif
                        @if ($user->can('permission-read'))
                            <li><a class="nav-link" href="{{ route('admin.permissions.index') }}">Permission</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($user->can('settings-read'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="settings"></i><span>Settings</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('seeting-index'))
                            <li><a class="nav-link" href="{{ route('admin.settings.index') }}">Settings</a></li>
                        @endif
                        @if ($user->can('seeting-page'))
                            <li><a class="nav-link" href="{{ route('admin.settings.page_content') }}">Page Content</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{-- @if ($user->can('success-index'))
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="award"></i><span>Success Story</span></a>
                    <ul class="dropdown-menu">
                        @if ($user->can('success-index'))
                            <li><a class="nav-link" href="{{ route('admin.success.index') }}">All Story</a></li>
                        @endif
                        @if ($user->can('success-create'))
                            <li><a class="nav-link" href="{{ route('admin.success.create') }}">Create Story</a></li>
                        @endif
                    </ul>
                </li>
            @endif --}}
        </ul>
    </aside>
</div>
