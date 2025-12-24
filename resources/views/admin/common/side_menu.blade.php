<div class="main-sidebar sidebar-style-2">
    <aside" id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/admin/dashboard') }}">
                <img alt="image" src="{{ asset('public/admin/assets/img/logo.png') }}" class="header-logo" />
                {{-- <span class="logo-name">Crop Secure</span> --}}
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link"><i
                        data-feather="home"></i><span>Dashboard</span></a>
            </li>



            {{--  Roles --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Roles') && $sideMenuPermissions['Roles']->contains('view')))
                {{-- FAQS --}}
                <li class="dropdown {{ request()->is('admin/roles*') ? 'active' : '' }}">
                    <a href="{{ url('admin/roles') }}" class="nav-link"><i
                            data-feather="user"></i><span>Roles</span></a>
                </li>
            @endif



            {{--  SubAdmin --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Sub Admins') && $sideMenuPermissions['Sub Admins']->contains('view')))
                {{-- FAQS --}}
                <li class="dropdown {{ request()->is('admin/subadmin*') ? 'active' : '' }}">
                    <a href="{{ url('admin/subadmin') }}" class="nav-link"><i data-feather="user"></i><span>Sub
                            Admins</span></a>
                </li>
            @endif

            {{--  Users --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Users') && $sideMenuPermissions['Users']->contains('view')))
                <li class="dropdown {{ request()->is('admin/user*') ? 'active' : '' }}">
                    <a href="{{ url('admin/user') }}" class="nav-link">
                        <i data-feather="users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endif

             {{--  Hotel Info --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Hotelinfo') && $sideMenuPermissions['Hotelinfo']->contains('view')))
                <li class="dropdown {{ request()->is('admin/hotel-info*') ? 'active' : '' }}">
                    <a href="{{ url('admin/hotel-info') }}" class="nav-link">
                        <i data-feather="info"></i>
                        <span>Hotel Info</span>
                    </a>
                </li>
            @endif

            {{--  Reservation Info --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('ReservationInfo') && $sideMenuPermissions['ReservationInfo']->contains('view')))
                <li class="dropdown {{ request()->is('admin/reservation-info*') ? 'active' : '' }}">
                    <a href="{{ url('admin/reservation-info') }}" class="nav-link">
                        <i data-feather="info"></i>
                        <span>Reservation Info</span>
                    </a>
                </li>
            @endif

            {{--  Bookings --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Booking') && $sideMenuPermissions['Booking']->contains('view')))
                <li class="dropdown {{ request()->is('admin/bookings*') ? 'active' : '' }}">
                    <a href="{{ url('admin/bookings') }}" class="nav-link">
                        <i data-feather="calendar"></i>
                        <span>Bookings</span>
                        <div id="updatebookingCounter"
                        class="badge {{ request()->is('admin/booking*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle"
                        style="display: inline-flex; justify-content: center; align-items: center; 
                            min-width: 22px; height: 22px; border-radius: 50%; 
                            text-align: center; font-size: 12px; margin-left: 5px; padding: 3px;">
                        0
                    </div>
                    </a>
                </li>
            @endif

             {{--  How it works --}}

           @if (Auth::guard('admin')->check() ||
                ($sideMenuPermissions->has('HowItWorks') && $sideMenuPermissions['HowItWorks']->contains('view')))
                
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="layout"></i> {{-- Icon for How it works --}}
                        <span>How it works</span>
                    </a>

                    <ul class="dropdown-menu {{ request()->is('admin/selling*') || request()->is('admin/buying*') || request()->is('admin/questions*') ? 'show' : '' }}">

                        <li>
                            <a href="{{ url('admin/selling') }}"
                            class="nav-link {{ request()->is('admin/selling*') ? 'active bg-primary text-white' : '' }}">
                                <span>Selling</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/buying') }}"
                            class="nav-link {{ request()->is('admin/buying*') ? 'active bg-primary text-white' : '' }}">
                                <span>Buying</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/questions') }}"
                            class="nav-link {{ request()->is('admin/questions*') ? 'active bg-primary text-white' : '' }}">
                                <span>Questions</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- Seller Protection --}}

            @if (Auth::guard('admin')->check() ||
                ($sideMenuPermissions->has('SellerProtection') && $sideMenuPermissions['SellerProtection']->contains('view')))
                
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="shield"></i> 
                        <span>Seller Protection</span>
                    </a>

                    <ul class="dropdown-menu {{ request()->is('admin/seller-protection-intro*') ||  request()->is('admin/seller-protection-section-one*') ||  request()->is('admin/seller-protection-section-two*') ||  request()->is('admin/seller-protection-section-three*') ? 'show' : '' }}">

                        <li>
                            <a href="{{ url('admin/seller-protection-intro') }}"
                            class="nav-link {{ request()->is('admin/seller-protection-intro*') ? 'active bg-primary text-white' : '' }}">
                                <span>Introduction</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/seller-protection-section-one') }}"
                            class="nav-link {{ request()->is('admin/seller-protection-section-one*') ? 'active bg-primary text-white' : '' }}">
                                <span>Seller Protection Section One</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/seller-protection-section-two') }}"
                            class="nav-link {{ request()->is('admin/seller-protection-section-two*') ? 'active bg-primary text-white' : '' }}">
                                <span>Seller Protection Section Two</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/seller-protection-section-three') }}"
                            class="nav-link {{ request()->is('admin/seller-protection-section-three*') ? 'active bg-primary text-white' : '' }}">
                                <span>Questions</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            
            {{-- Cancellation Guide  --}}
              @if (Auth::guard('admin')->check() ||
                ($sideMenuPermissions->has('CancellationGuide') && $sideMenuPermissions['CancellationGuide']->contains('view')))
                
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="x-circle"></i> 
                        <span>Hotel Cancellation Guide</span>
                    </a>

                    <ul class="dropdown-menu {{ request()->is('admin/cancellation-guide-one*') || request()->is('admin/cancellation-guide-two*') ? 'show' : '' }}">


                        <li>
                            <a href="{{ url('admin/cancellation-guide-one') }}"
                            class="nav-link {{ request()->is('admin/cancellation-guide-one*') ? 'active bg-primary text-white' : '' }}">
                                <span>Cancellation Guide One</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/cancellation-guide-two') }}"
                            class="nav-link {{ request()->is('admin/cancellation-guide-two*') ? 'active bg-primary text-white' : '' }}">
                                <span>Cancellation Guide Two</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
            @endif

            {{-- How to sell a room --}}
             @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Sell a Room') && $sideMenuPermissions['Sell a Room']->contains('view')))
                <li class="dropdown {{ request()->is('admin/sell-a-room*') ? 'active' : '' }}">
                    <a href="{{ url('admin/sell-a-room') }}" class="nav-link">
                        <i data-feather="tag"></i>
                        <span>Sell a Room</span>
                    </a>
                </li>
            @endif

            {{-- Sell Reservation --}}
             @if (Auth::guard('admin')->check() ||
                ($sideMenuPermissions->has('Sell Reservation') && $sideMenuPermissions['Sell Reservation']->contains('view')))
                
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="tag"></i> 
                        <span>Sell Reservation</span>
                    </a>

                    <ul class="dropdown-menu {{ request()->is('admin/sell-reservation*')  || request()->is('admin/roomeno-works*') || request()->is('admin/protect-sellers*')? 'show' : '' }}">


                        <li>
                            <a href="{{ url('admin/sell-reservation') }}"
                            class="nav-link {{ request()->is('admin/sell-reservation*') ? 'active bg-primary text-white' : '' }}">
                                <span>Changed Travel Plans</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/roomeno-works') }}"
                            class="nav-link {{ request()->is('admin/roomeno-works*') ? 'active bg-primary text-white' : '' }}">
                                <span>How Roomeno Works</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/protect-sellers') }}"
                            class="nav-link {{ request()->is('admin/protect-sellers*') ? 'active bg-primary text-white' : '' }}">
                                <span>We Protect Our Sellers</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            {{-- Cancellation Policy --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Cancellation Policy') && $sideMenuPermissions['Cancellation Policy']->contains('view')))
                {{-- Notification --}}
                <li class="dropdown {{ request()->is('admin/cancellation-policy*') ? 'active' : '' }}">
                    <a href="{{ route('cancellationpolicy.index') }}" class="nav-link">
                        <i data-feather="x-circle"></i><span>Cancellation Policy</span>
                    </a>
                </li>
            @endif

            {{-- Career --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Career') && $sideMenuPermissions['Career']->contains('view')))
                {{-- Notification --}}
                <li class="dropdown {{ request()->is('admin/career*') ? 'active' : '' }}">
                    <a href="{{ route('career.index') }}" class="nav-link">
                        <i data-feather="briefcase"></i><span>Career</span>
                    </a>
                </li>
            @endif

            {{-- Partner with us --}}

              @if (Auth::guard('admin')->check() ||
                ($sideMenuPermissions->has('Partner with us') && $sideMenuPermissions['Partner with us']->contains('view')))
                
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="user-plus"></i> 
                        <span>Partner with us</span>
                    </a>

                    <ul class="dropdown-menu {{ request()->is('admin/partner-introduction*') || request()->is('admin/roomeno-helps-hotels*') || request()->is('admin/roomeno-helps-agencies*') || request()->is('admin/roomeno-solutions*') ? 'show' : '' }}">


                        <li>
                            <a href="{{ url('admin/partner-introduction') }}"
                            class="nav-link {{ request()->is('admin/partner-introduction*') ? 'active bg-primary text-white' : '' }}">
                                <span>Introduction</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/roomeno-helps-hotels') }}"
                            class="nav-link {{ request()->is('admin/roomeno-helps-hotels*') ? 'active bg-primary text-white' : '' }}">
                                <span>Roomeno Helps Hotels</span>
                            </a>
                        </li>

                        
                        <li>
                            <a href="{{ url('admin/roomeno-helps-agencies') }}"
                            class="nav-link {{ request()->is('admin/roomeno-helps-agencies*') ? 'active bg-primary text-white' : '' }}">
                            <span>Roomeno Helps Agencies</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/roomeno-solutions') }}"
                            class="nav-link {{ request()->is('admin/roomeno-solutions*') ? 'active bg-primary text-white' : '' }}">
                                <span>Roomeno Solutions</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif   

            {{-- Press --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Press') && $sideMenuPermissions['Press']->contains('view')))
                {{-- Notification --}}
                <li class="dropdown {{ request()->is('admin/press*') ? 'active' : '' }}">
                    <a href="{{ route('press.index') }}" class="nav-link">
                        <i data-feather="file-text"></i><span>Press</span>
                    </a>
                </li>
            @endif
            
            {{-- Partner with us --}}

              @if (Auth::guard('admin')->check() ||
                ($sideMenuPermissions->has('Trust & Safety') && $sideMenuPermissions['Trust & Safety']->contains('view')))
                
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="shield"></i> 
                        <span>Trust & Safety</span>
                    </a>

                    <ul class="dropdown-menu {{ request()->is('admin/trust-and-safety-introduction*') || request()->is('admin/protect-our-buyers*') || request()->is('admin/protect-our-sellers*') || request()->is('admin/not-real-reservation*') || request()->is('admin/roomeno-benefits-everyone*') ? 'show' : '' }}">


                        <li>
                            <a href="{{ url('admin/trust-and-safety-introduction') }}"
                            class="nav-link {{ request()->is('admin/trust-and-safety-introduction*') ? 'active bg-primary text-white' : '' }}">
                                <span>Introduction</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/protect-our-buyers') }}"
                            class="nav-link {{ request()->is('admin/protect-our-buyers*') ? 'active bg-primary text-white' : '' }}">
                                <span>We Protect Our Buyers</span>
                            </a>
                        </li>

                        
                        <li>
                            <a href="{{ url('admin/protect-our-sellers') }}"
                            class="nav-link {{ request()->is('admin/protect-our-sellers*') ? 'active bg-primary text-white' : '' }}">
                            <span>We Protect Our Sellers</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/not-real-reservation') }}"
                            class="nav-link {{ request()->is('admin/not-real-reservation*') ? 'active bg-primary text-white' : '' }}">
                                <span>Verified Reservations</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/roomeno-benefits-everyone') }}"
                            class="nav-link {{ request()->is('admin/roomeno-benefits-everyone*') ? 'active bg-primary text-white' : '' }}">
                                <span>Roomeno Benefits Everyone</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif 
            

            {{--  Blogs --}}

            {{-- @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Blogs') && $sideMenuPermissions['Blogs']->contains('view')))
                
                <li class="dropdown {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                    <a href="{{ url('admin/blogs-index') }}" class="nav-link"><i
                            data-feather="book-open"></i><span>Blogs</span></a>
                </li>
            @endif --}}

             {{--  SEO --}}

            {{-- @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Roles') && $sideMenuPermissions['seo']->contains('seo')))
                
                <li class="dropdown {{ request()->is('admin/seo*') ? 'active' : '' }}">
                    <a href="{{ url('admin/seo') }}" class="nav-link"><i
                            data-feather="trending-up"></i><span>SEO</span></a>
                </li>
            @endif --}}
            
             {{-- Notification --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Notifications') && $sideMenuPermissions['Notifications']->contains('view')))
                {{-- Notification --}}
                <li class="dropdown {{ request()->is('admin/notification*') ? 'active' : '' }}">
                    <a href="
                {{ route('notification.index') }}
                " class="nav-link">
                        <i data-feather="bell"></i><span>Notifications</span>
                    </a>
                </li>
            @endif

            {{--  FAQS --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Faqs') && $sideMenuPermissions['Faqs']->contains('view')))
                <li class="dropdown {{ request()->is('admin/faq*') ? 'active' : '' }}">
                    <a href="{{ url('admin/faq') }}" class="nav-link">
                        <i data-feather="settings"></i>
                        <span>FAQ's</span>
                    </a>
                </li>
            @endif
            
             {{-- Contact Us  --}}


            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Contact us') && $sideMenuPermissions['Contact us']->contains('view')))
                {{-- Contact Us --}}
                <li class="dropdown {{ request()->is('admin/admin/contact-us*') ? 'active' : '' }}">
                    <a href="{{ url('admin/admin/contact-us') }}" class="nav-link"><i
                            data-feather="mail"></i><span>Contact
                            Us</span></a>
                </li>
            @endif


            {{--  About Us --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('About us') && $sideMenuPermissions['About us']->contains('view')))
                {{-- About Us --}}
                <li class="dropdown {{ request()->is('admin/about-us*') ? 'active' : '' }}">
                    <a href="{{ url('admin/about-us') }}" class="nav-link"><i
                            data-feather="help-circle"></i><span>About
                            Us</span></a>
                </li>
            @endif

            


            {{--  Privacy Policy --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Privacy & Policy') && $sideMenuPermissions['Privacy & Policy']->contains('view')))
                {{--  Privacy Policy --}}
                <li class="dropdown {{ request()->is('admin/privacy-policy*') ? 'active' : '' }}">
                    <a href="{{ url('admin/privacy-policy') }}" class="nav-link"><i
                            data-feather="shield"></i><span>Privacy
                            & Policy</span></a>
                </li>
            @endif




            {{--  Terms & Conditions --}}

            @if (Auth::guard('admin')->check() ||
                    ($sideMenuPermissions->has('Terms & Conditions') &&
                        $sideMenuPermissions['Terms & Conditions']->contains('view')))
                <li class="dropdown {{ request()->is('admin/term-condition*') ? 'active' : '' }}">
                    <a href="{{ url('admin/term-condition') }}" class="nav-link"><i
                            data-feather="file-text"></i><span>Terms
                            & Conditions</span></a>
                </li>
            @endif



        </ul>
        </aside>
</div>
