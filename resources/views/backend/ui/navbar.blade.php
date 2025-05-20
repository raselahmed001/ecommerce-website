<div id="kt_header" class="header align-items-stretch" style="background-color: #F2FEFD;">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav"></div>

            <div class="flex-shrink-0 d-flex align-items-stretch">
                <!--begin::User menu-->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu wrapper-->
                    <div
                        class="cursor-pointer symbol symbol-30px symbol-md-40px"
                        id="kt_header_user_menu_toggle"
                        data-kt-menu-trigger="click"
                        data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end"
                    >
                        <img src="{{ asset('backend/assets/media/avatars/300-1.jpg') }}" alt="user"/>
                    </div>

                    <!--begin::User account menu-->
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold fs-6 w-275px"
                        data-kt-menu="true"
                    >
                        <div class="px-3 menu-item">
                            <div class="px-3 menu-content d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('backend/assets/media/avatars/300-1.jpg') }}"/>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                        {{ Auth::user()->name }}
                                        <span
                                            class="px-2 py-1 badge badge-light-success fw-bolder fs-8 ms-2">Active</span>
                                    </div>
                                    <a href="#"
                                       class="fw-bold text-muted text-hover-primary fs-7"> {{ Auth::user()->email }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="my-2 separator"></div>

                        <div class="px-5 menu-item">
                            <a href="#" class="px-5 menu-link"><i class="fa-solid fa-user"
                                                                  style="color: #000000; margin-right: 10px;"></i> My
                                Profile</a>
                            <style>
                                .fa-user {
                                    transition: transform 0.3s ease;
                                }

                                .menu-link:hover .fa-user {
                                    transform: translateX(5px);
                                }
                            </style>
                        </div>

                        <div class="px-5 my-1 menu-item">
                            <a href="#" class="px-5 menu-link"><i class="fa-solid fa-gear"
                                                                  style="color: #000000; margin-right: 10px;"></i>
                                Account Settings</a>
                            <style>
                                .fa-gear {
                                    transition: transform 0.3s ease;
                                }

                                .menu-link:hover .fa-gear {
                                    transform: translateX(5px);
                                }
                            </style>
                        </div>

                        <div class="px-5 menu-item">
                            <a href="{{ route('change.password') }}" class="px-5 menu-link" data-turbo-action="replace"
                               data-turbo-frame="content-frame"><i class="fa-solid fa-key"
                                                                   style="color: #000000; margin-right: 10px;"></i>
                                Change Password</a>
                            <style>
                                .fa-key {
                                    transition: transform 0.3s ease;
                                }

                                .menu-link:hover .fa-key {
                                    transform: translateX(5px);
                                }
                            </style>
                        </div>

                        <div class="px-5 menu-item">
                            <form id="logout-form" method="POST" data-turbo="true" action="{{ route('logout') }}">
                                @csrf

                                <a href="#" class="px-5 menu-link"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"
                                       style="color: #000000; margin-right: 10px;"></i> {{ __('Sign Out') }}
                                </a>
                                <style>
                                    .fa-right-from-bracket {
                                        transition: transform 0.3s ease;
                                    }

                                    .menu-link:hover .fa-right-from-bracket {
                                        transform: translateX(5px);
                                    }
                                </style>
                            </form>
                        </div>
                    </div>
                    <!--end::User account menu-->
                </div>
                <!--end::User menu-->
            </div>
        </div>
    </div>
</div>
