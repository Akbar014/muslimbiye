<!-- Header -->
<header class="header bg-body">
    <nav class="navbar flex-nowrap p-0">
        <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
            <!-- Logo For Mobile View -->
            <a class="navbar-brand navbar-brand-mobile" href="/">
                <img class="img-fluid w-100" src="{{ asset('public/img/logo-mini.png') }}"
                    alt="{{ config('app.name', 'Laravel') }}">
            </a>
            <!-- End Logo For Mobile View -->

            <!-- Logo For Desktop View -->
            <a class="navbar-brand navbar-brand-desktop" href="/">
                <img class="side-nav-show-on-closed" src="{{ asset('public/img/logo-mini.png') }}"
                    alt="{{ config('app.name', 'Laravel') }}" style="width: auto; height: 33px;">
                <img class="side-nav-hide-on-closed" src="{{ asset('public/img/logo.png') }}"
                    alt="{{ config('app.name', 'Laravel') }}" style="width: auto; height: 33px;">
            </a>
            <!-- End Logo For Desktop View -->
        </div>

        <div class="header-content col px-md-3">
            <div class="d-flex align-items-center">
                <!-- Side Nav Toggle -->
                <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose"
                    data-target="#sidebar" data-target-wrapper="body">
                    <iconify-icon icon="pepicons-pencil:menu"></iconify-icon>
                </a>
                <!-- End Side Nav Toggle -->

                {{-- frontend button --}}
                <div class="dropdown ml-auto">
                    <a href="{{ route('index') }}" target="_BLANK" class='header-invoker'>
                        <iconify-icon icon="fluent-mdl2:world"></iconify-icon>
                    </a>

                </div>
                {{-- frontend End --}}

                {{-- Dark Light Toggle --}}
                {{-- <div class="dropdown" onclick="darkModeSwitch()">
			<a id="darkLight" class="header-invoker" href="#">
				<img src="{{asset('public/img/dark_mode.svg')}}" class="dark-icon" style="height:25px;"/>
				<img src="{{asset('public/img/light_mode.svg')}}" class="light-icon" style="height:25px;"/>
			</a>
		</div> --}}
                {{-- Dark Light Toggle End --}}

                <!-- User Notifications -->
                <div class="dropdown">
                    <a id="notificationsInvoker" class="header-invoker" href="#" aria-controls="notifications"
                        aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                        data-unfold-target="#notifications" data-unfold-type="css-animation" data-unfold-duration="300"
                        data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        @if (count($notifications) > 0)
                            {{-- <span
                                class="indicator indicator-bordered indicator-top-right indicator-danger rounded-circle"></span> --}}
                            <span id="notificationCount"
                                class="bg-secondary text-dark">{{ count($notifications) }}</span>
                        @endif
                        <iconify-icon icon="mdi:bell-outline"></iconify-icon>

                    </a>

                    <div id="notifications"
                        class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden"
                        aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-bottom py-3">
                                <h5 class="mb-0">Notifications</h5>
                                @if (count($notifications) > 0)
                                    <a class="link small ml-auto cursor-pointer clear_notification_btn"
                                        onclick="clearAllNotifications()">Clear All</a>
                                @endif
                                @php
                                    $dangerCount = 0;
                                    // $recentCount = 0;
                                @endphp
                            </div>

                            <div class="card-body p-0">
                                <div class="list-group list-group-flush notification_container"
                                    style="max-height: 80vh; overflow-y: scroll;">
                                    @forelse ($notifications as $key => $notification)
                                        @php
                                            $label = $notification->label;
                                            $label = $label == 'danger' ? 'error' : $label;

                                            // if (
                                            //     $notification->created_at->lessThanOrEqualTo(
                                            //         \Carbon\Carbon::now()->subDays(2),
                                            //     )
                                            // ) {
                                            //     $recentCount++;
                                            // }

                                        @endphp
                                        <div class="list-group-item list-group-item-action cursor-pointer notification"
                                            id='notification_{{ $key }}'
                                            onclick="swal(`{{ $notification->title }}`, `{{ $notification->details }}`, `{{ $label }}`);">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                @if ($notification->label == 'success')
                                                    <iconify-icon icon="icon-park-outline:success"
                                                        class="icon-text text-success mr-2"></iconify-icon>
                                                @elseif($notification->label == 'danger')
                                                    @php
                                                        $dangerCount++;
                                                    @endphp
                                                    <iconify-icon icon="material-symbols:dangerous"
                                                        class="icon-text text-danger mr-2"></iconify-icon>
                                                @elseif($notification->label == 'warning')
                                                    <iconify-icon icon="solar:danger-bold"
                                                        class="icon-text text-warning mr-2"></iconify-icon>
                                                @else
                                                    <iconify-icon icon="ph:info-light"
                                                        class="icon-text text-info mr-2"></iconify-icon>
                                                @endif
                                                <h6 class="font-weight-semi-bold mb-0">{{ $notification->title }}</h6>
                                                <span
                                                    class="list-group-item-date text-muted ml-auto">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="mb-0">
                                                {{ Illuminate\Support\Str::limit($notification->details, 40) }}
                                            </p>
                                            <a class="list-group-item-closer text-muted"
                                                onclick="notificationRead(event, '{{ route('backend.notification.clear', $notification->id) }}', `notification_{{ $key }}`)">
                                                <iconify-icon icon="material-symbols-light:close"
                                                    style="font-size: 20px;"></iconify-icon></a>
                                        </div>
                                    @empty
                                        <div
                                            class="list-group-item list-group-item-action cursor-pointer text-center no_notifications">
                                            <span class="d-block p-5 text-gray">No New Notifications</span>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            @if ($dangerCount > 0)
                                <script>
                                    document.getElementById('notificationsInvoker').insertAdjacentHTML('beforeend',
                                        `<div id="notificationsTooltip" class="bg-danger text-white">{{ $dangerCount }} Critical Notifications</div>`
                                    )
                                </script>
                                {{-- @elseif($recentCount > 0)
                                <script>
                                    document.getElementById('notificationsInvoker').insertAdjacentHTML('beforeend',
                                        `<div id="notificationsTooltip" class="bg-info text-white">{{ $recentCount }} New Notifications</div>`
                                    )
                                </script> --}}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End User Notifications -->
                <!-- User Avatar -->
                <div class="dropdown mx-3 dropdown ml-2">
                    <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu"
                        aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                        data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300"
                        data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">

                        @if (Auth::user()->photo)
                            <img class="avatar rounded-circle mr-md-2"
                                src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ auth()->user()->name }}">
                        @else
                            <span class="mr-md-2 avatar-placeholder">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        @endif

                        <span class="d-none d-md-block">
                            {{ Auth::user()->name }}
                            @if (count(auth()->user()->getRoleNames()) > 0)
                                <br />
                                <small>{{ auth()->user()->getRoleNames()[0] }}</small>
                            @endif
                        </span>
                        <iconify-icon icon="la:angle-down" class="d-none d-md-block ml-2"></iconify-icon>
                    </a>

                    <ul id="profileMenu"
                        class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                        aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                        <li class="unfold-item">
                            <a class="unfold-link d-flex align-items-center text-nowrap"
                                href="{{ route('backend.profile.edit') }}">
                                <span class="unfold-item-icon mr-3">
                                    <iconify-icon icon="clarity:user-line"></iconify-icon>
                                </span>
                                My Profile
                            </a>
                        </li>
                        <li class="unfold-item unfold-item-has-divider">
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
                                <span class="unfold-item-icon mr-3">
                                    <iconify-icon icon="ant-design:poweroff-outlined"></iconify-icon>
                                </span>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- End User Avatar -->
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->
