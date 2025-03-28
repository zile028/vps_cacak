<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="py-4">
                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard"
                            aria-expanded="false"
                    ><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/staff"
                            aria-expanded="false"
                    ><i class="mdi mdi-face"></i><span class="hide-menu">Особље</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/document"
                            aria-expanded="false"
                    ><i class="mdi mdi-border-inside"></i><span
                                class="hide-menu">Документа</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/study"
                            aria-expanded="false"
                    ><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Студије</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/admission"
                            aria-expanded="false"
                    ><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Упис</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/alumni"
                            aria-expanded="false"
                    ><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Алумни</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/news"
                            aria-expanded="false"
                    ><i class="mdi mdi-receipt"></i><span class="hide-menu">Вести</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/schedule"
                            aria-expanded="false"
                    ><i class="mdi mdi-calendar-check"></i><span
                                class="hide-menu">Распоред</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/cooperation"
                            aria-expanded="false"
                    ><i class="mdi mdi-account-multiple"></i><span
                                class="hide-menu">Сардња</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/widget"
                            aria-expanded="false"
                    >
                        <i class="mdi mdi-widgets"></i>
                        <span class="hide-menu">Widget</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/contact"
                            aria-expanded="false"
                    >
                        <i class="mdi mdi-contact-mail"></i>
                        <span class="hide-menu">Контакт инфо</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/gallery"
                            aria-expanded="false"
                    ><i class="mdi mdi-folder-multiple-image"></i><span
                                class="hide-menu">Галерија</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/media"
                            aria-expanded="false"
                    ><i class="mdi mdi-folder-multiple-image"></i><span
                                class="hide-menu">Медија</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard/tickets"
                            aria-expanded="false"
                    ><i class="mdi mdi-alert"></i><span
                                class="hide-menu">Tiket</span></a
                    >
                </li>

                <?php if (\Core\Session::currentUser("role") === "admin"): ?>
                    <li class="sidebar-item">
                        <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboard/errors"
                                aria-expanded="false"
                        ><i class="mdi mdi-alert"></i><span
                                    class="hide-menu">Errors</span></a
                        >
                    </li>
                    <li class="sidebar-item">
                        <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboard/navbar"
                                aria-expanded="false"
                        ><i class="mdi mdi-menu"></i><span
                                    class="hide-menu">Navbar</span></a
                        >
                    </li>
                    <li class="sidebar-item">
                        <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboard/users"
                                aria-expanded="false"
                        ><i class="mdi mdi-account-multiple"></i><span
                                    class="hide-menu">Корисници</span></a
                        >
                    </li>
                <?php endif; ?>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link btn btn-primary"
                       href="/dashboard/logout"
                       aria-expanded="false"
                    >
                        <i class="mdi mdi-logout-variant"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
                <li class="sidebar-item p-2 text-center">
                    <p class="text-white text-muted m-0">All Rights Reserved by Dejan Živkovic.</p>
                    <a class="text-white rounded-pill bg-primary px-2"
                       href="mailto:dejan.zivkovic@fim.rs">dejan.zivkovic@fim.rs</a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">