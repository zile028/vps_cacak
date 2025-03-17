<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <div class="card p-3">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <h1 class="p-0 lh-1 m-0">Galerija</h1>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/gallery/create">
                    <div class="card card-hover m-0">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white m-0">
                                <i class="mdi mdi-library-plus"></i>
                            </h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <?php foreach ($galleries as $lang => $gallery): ?>
                <h3><?php echo $lang; ?></h3>
                <?php foreach ($gallery as $item): ?>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <a href="/gallery/<?php echo $item->id ?>">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">
                                        <i class="mdi mdi-folder-multiple-image"></i>
                                    </h1>
                                    <h6 class="text-white"><?php echo $item->title; ?></h6>
                                    <span class="text-white"><?php echo $item->count; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>