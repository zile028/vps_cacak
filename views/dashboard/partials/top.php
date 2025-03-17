<?php use Core\Session; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <base href="/">
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta
            name="keywords"
            content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin"
    />
    <meta
            name="description"
            content="Powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow"/>
    <title>VPS - Dashboard</title>
    <!-- Favicon icon -->
    <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link
            href="assets/libs/fullcalendar/dist/fullcalendar.min.css"
            rel="stylesheet"
    />
    <link href="assets/extra-libs/calendar/calendar.css" rel="stylesheet"/>

    <link href="assets/dist/css/quill.snow.css" rel="stylesheet"/>

    <link href="assets/dist/css/style.min.css" rel="stylesheet"/>

    <link
            href="../assets/libs/magnific-popup/dist/magnific-popup.css"
            rel="stylesheet"
    />

    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin5"
        data-sidebartype="full"
        data-sidebar-position="absolute"
        data-header-position="absolute"
        data-boxed-layout="full"
>
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php if (isLogged()): ?>
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-2">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img
                                    src="<?php echo "/assets/images/logo.png"; ?>"
                                    alt="homepage"
                                    class="light-logo"
                                    width="25"
                            />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text ms-2">
                <!-- dark Logo text -->
                        VPS - <?php echo getUser("role") ?>
              </span>

                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a
                            class="nav-toggler waves-effect waves-light d-block d-md-none"
                            href="javascript:void(0)"
                    ><i class="ti-menu ti-close"></i
                        ></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div
                        class="navbar-collapse collapse"
                        id="navbarSupportedContent"
                        data-navbarbg="skin5"
                >
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block">
                            <a
                                    class="nav-link sidebartoggler waves-effect waves-light"
                                    href="javascript:void(0)"
                                    data-sidebartype="mini-sidebar"
                            ><i class="mdi mdi-menu font-24"></i
                                ></a>
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">

                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <?php if (isLogged()): ?>
                            <li class="nav-item dropdown">
                                <a
                                        class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                        href="#"
                                        id="navbarDropdown"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                >
                                    <span><?php echo Session::currentUser("fullName"); ?></span>
                                    <img
                                            src="<?php echo getUser("image") ? uploadPath(getUser("image")) : assetImage("users/avatar.png") ?>"
                                            alt="user"
                                            class="rounded-circle"
                                            width="31"
                                            height="31"
                                    />
                                </a>
                                <ul
                                        class="dropdown-menu dropdown-menu-end user-dd animated"
                                        aria-labelledby="navbarDropdown"
                                >
                                    <a class="dropdown-item" href="/dashboard/users/profile"
                                    ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/dashboard/logout"
                                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-0 d-flex justify-content-center align-items-center"
                                   href="/dashboard/logout">
                                <span class="d-flex justify-content-center align-items-center bg-primary rounded-circle"
                                      style="width: 32px;height: 32px;">
                                <i class="mdi mdi-logout-variant"></i>
                                </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
    <?php endif; ?>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->