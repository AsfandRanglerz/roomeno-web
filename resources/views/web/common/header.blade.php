<div class="container-fluid py-3 main-header-div-container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="{{asset('public/web/assets/images/header_logo.png')}}"
                class="header-logo-img" alt=""></a>
        <button class="header-get-dollar-anchor" aria-current="page" href="#">Get $15</button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" data-bs-display="static">



                <li class="nav-item dropdown">
                    <button class="nav-link nav-drop-login-header-btn " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        English <span><img src="{{asset('public\web\assets\images\vector.png')}}" class="px-2"
                                alt=""></span>
                    </button>
                    <ul class="dropdown-menu drop-down-menu-for-languages mt-2" aria-labelledby="navbarDropdown"
                        data-bs-display="static" data-bs-boundary="viewport">
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
                    <button class="nav-link nav-drop-login-header-btn" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        USD <span><img src="{{asset('public/web/assets/images/vector.png')}}" class="px-2"
                                alt=""></span>
                    </button>
                    <ul class="dropdown-menu drop-down-menu-for-currency mt-2" data-bs-display="static"
                        aria-labelledby="navbarDropdown">
                        <li><button class="dropdown-item dropdown-item-for-currency" href="#">USD</button></li>
                        <li><button class="dropdown-item dropdown-item-for-currency" href="#">Euro</button></li>
                        <li><button class="dropdown-item dropdown-item-for-currency" href="#">British Pound</button>
                        </li>
                    </ul>
                </li>

                <li class="nav-item li-for-login-btn">
                    <button class="nav-link nav-drop-login-header-btn" href="#">Login</button>
                </li>

                <li class="nav-item btn-sell-room">
                    <button class="nav-link  nav-drop-login-header-btn-sell-room" href="#">Sell My Room +</button>
                </li>


            </ul>
        </div>
    </nav>


</div>