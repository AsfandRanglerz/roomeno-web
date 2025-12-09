<div class="container-fluid py-3 main-header-div-container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Roomeno</a>
        <button class="header-get-dollar-anchor" aria-current="page" href="#">Get $15</button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" data-bs-display="static">

                <li class="nav-item get-dollor-link-collapse">
                    <button class="nav-link nav-drop-login-header-btn" href="#">Get $ 15</button>
                </li>

                <li class="nav-item dropdown">
                    <button class="nav-link nav-drop-login-header-btn dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        English
                    </button>
                    <ul class="dropdown-menu drop-down-menu-for-languages mt-2" aria-labelledby="navbarDropdown"
                        data-bs-display="static"
                        data-bs-boundary="viewport">
                        <li>
                            <button class="dropdown-item drop-down-item-for-languge" href="#">English
                                <p>EN</p>
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item drop-down-item-for-languge" href="#">Deutsch
                                <p>DE</p>
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item drop-down-item-for-languge" href="#">Espanol
                                <p>ES</p>
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item drop-down-item-for-languge" href="#">Francais
                                <p>FR</p>
                            </button>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <button class="nav-link nav-drop-login-header-btn dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        USD
                    </button>
                    <ul class="dropdown-menu drop-down-menu-for-currency mt-2" data-bs-display="static"
                        aria-labelledby="navbarDropdown">
                        <li><button class="dropdown-item dropdown-item-for-currency" href="#">USD</button></li>
                        <li><button class="dropdown-item dropdown-item-for-currency" href="#">Euro</button></li>
                        <li><button class="dropdown-item dropdown-item-for-currency" href="#">British Pound</button></li>
                    </ul>
                </li>

                <li class="nav-item li-for-login-btn">
                    <button class="nav-link nav-drop-login-header-btn" href="#">Login</button>
                </li>

                <div class="btn-sell-room-div">
                    <li class="nav-item">
                        <button class="nav-link nav-drop-login-header-btn-sell-room" href="#">Sell My Room +</button>
                    </li>
                </div>

            </ul>
        </div>
    </nav>

    {{-- SEARCH FORM ONLY ON INDEX PAGE --}}
    @if(request()->routeIs('index'))
        <div class="container-fluid container-for-search-form">
            <form class="d-flex align-items-center form-main-for-search-in-header">

                <div class="first-header-form-input-div">
                    <input type="text" class="form-control header-form-input me-2" placeholder="Where to">
                </div>

                <div class="header-form-input-div">
                    <input type="text" class="form-control header-form-input header-form-input-for-border me-2"
                        placeholder="Check In">
                </div>

                <div class="header-form-input-div">
                    <input type="text" class="form-control header-form-input header-form-input-for-border me-2"
                        placeholder="Check Out">
                </div>

                <div class="header-form-input-div">
                    <input type="text" class="form-control header-form-input header-form-input-for-border me-2"
                        placeholder="2 Adults">
                </div>

                <button class="btn search-btn-in-header" type="submit">Search</button>

            </form>
        </div>
    @endif
</div>
