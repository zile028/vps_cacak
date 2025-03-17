<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

<div class="card p-3">
    <h1>Saradnja</h1>
    <div>
        <?php foreach ($types as $lang => $type): ?>
            <div class="mb-2">
                <img height="40" width="40" src="<?php echo assetImage($lang . ".svg") ?>" alt="">
            </div>
            <div class="row align-items-stretch">
                <?php foreach ($type as $item): ?>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <a class="d-flex h-100"
                           href="/cooperation/<?php echo $item->type; ?>?lang=<?php echo $item->lang; ?>">
                            <div class="card card-hover w-100">
                                <div class="box bg-cyan text-center h-100 ">
                                    <h3 class="text-white"><?php echo translate($lang, "cooperation.$item->type"); ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a class="d-md-flex h-100"
                       href="/cooperation/create?lang=<?php echo $item->lang; ?>">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center h-100 d-flex align-items-center justify-content-center">
                                <h3 class="text-white"><i class="mdi mdi-plus-box"></i></h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>


