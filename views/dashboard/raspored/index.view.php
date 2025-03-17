<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>РАСПОРЕД</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <?php foreach ($kategorije as $lang => $kategorija): ?>
            <?php foreach ($kategorija as $item): ?>
                <!-- Column -->
                <div class="col-md-4 col-lg-4 col-xlg-3 col-sm-12">
                    <a href="/schedule/<?php echo $item->id; ?>/<?php echo $lang; ?>">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-view-dashboard"></i>
                                </h1>
                                <h6 class="text-white text-uppercase"><?php echo $item->kategorija; ?> </h6>
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
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>