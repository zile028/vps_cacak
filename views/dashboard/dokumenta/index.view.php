<?php require_once __DIR__ . '/../partials/top.php'; ?>
<!--  -->
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4>ДОКУМЕНТА</h4>
<!-- ============================================================== -->
<!-- Sales Cards  -->
<!-- ============================================================== -->
<div class="row">

    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <a href="/dashboard/document/category">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-view-dashboard"></i>
                    </h1>
                    <h6 class="text-white">ДОДАЈ КАТЕГОРИЈУ</h6>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<?php if (count($kategorije) > 0): ?>
    <?php foreach ($kategorije as $lang => $kategorija) : ?>
        <div class="card">
            <div class="card-body">
                <h5><?php echo $lang; ?></h5>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- START table -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php foreach ($kategorija as $item): ?>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <a href="/dashboard/document/category/<?php echo $item->id; ?>">
                                <div class="card card-hover">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-view-dashboard"></i>
                                        </h1>
                                        <h6 class="text-white"><?php echo $item->category; ?>
                                            (<?php echo $item->docCount ?>)</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- END table -->
        <!-- ============================================================== -->
    <?php endforeach; ?>


<?php else: ?>
    <p>Тренутно нема докумената.</p>
<?php endif; ?>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<?php require_once __DIR__ . '/../partials/bottom.php'; ?>

