<?php require_once __DIR__ . "/../partials/top.php"; ?>
    <style>
        #zero_config tr td {
            vertical-align: middle;
        }
    </style>
    <!--  -->
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <?php if (getUser("role") === ADMIN): ?>
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/dashboard/staff/category/add">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-view-dashboard"></i>
                            </h1>
                            <h6 class="text-white">ДОДАЈ КАТЕГОРИЈУ</h6>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="/dashboard/staff/add">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">ДОДАЈ ЗАПОСЛЕНОГ</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="/dashboard/staff/all">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">СВИ ЗАПОСЛЕНИ</h6>
                    </div>
                </div>
            </a>
        </div>
        <?php foreach ($odbori as $key => $lang) : ?>
            <hr>
            <img class="langIcon" src="/assets/images/<?php echo $key; ?>.svg" alt="">
            <hr>
            <?php foreach ($lang as $odbor) : ?>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="/dashboard/staff/category/<?php echo $odbor->id; ?>">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-view-dashboard"></i>
                                </h1>
                                <h6 class="text-white text-uppercase"><?php echo $odbor->odbor ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>

    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!--  -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>