<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>МЕДИЈА</h4>
    <div class="card container-fluid p-3">
        <div class="d-flex w-100">
            <form class="form-inline row gap-2 align-items-center w-100" action="/media"
                  method="post"
                  enctype="multipart/form-data">
                <div class="col-sm-12 col-lg-8 d-flex align-items-center gap-2 ">
                    <label for="fileName" style="white-space: nowrap">Назив фајла</label>
                    <input id="fileName" type="text" name="fileName" class="form-control"
                           placeholder="Назив">
                </div>
                <div class="col-lg-4 col-sm-12 row gap-2 ">
                    <label for="attachment" class="btn btn-warning m-0 text-nowrap col">Одабери
                        фајл</label>
                    <input id="attachment" type="file" class="d-none" placeholder="file"
                           name="attachment">
                    <button class="btn btn-primary col">ДОДАЈ</button>

                </div>
            </form>
            <?php if (\Core\Session::has("cooperation") || \Core\Session::has(MEDIA_FLASH)) : ?>
                <form id="selectionFileForm" class="col" action="<?php echo \Core\Session::get(MEDIA_FLASH)["cb"]; ?>"
                      method="post">
                    <input type="hidden" name="_method" value="get">
                    <button class="btn btn-success col">НАЗАД</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Start Pagination -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6">
            <?php view("partials/pagination", ["count" => $count, "cbUrl" => "/media", "limit" => $limit]) ?>
        </div>
        <div class="col-md-6">
            <form action="" class="d-flex gap-2">
                <input class="form-control" type="text" name="search"
                       value="<?php echo $_GET["search"] ?? null; ?>"
                >
                <button class="btn btn-skype col-md-1" type="submit">
                    <i class="mdi mdi-magnify"></i>
                </button>

                <a href="/media" class="btn btn-warning col-md-1" type="reset">
                    <i class="mdi mdi-stop-circle-outline"></i>
                </a>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Pagination -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Gallery -->
    <!-- ============================================================== -->

    <div class="row el-element-overlay">
        <?php foreach ($media as $index => $file) : ?>
            <div class="col-lg-3 col-md-6 d-flex flex-column" data-id="<?php echo $file->id; ?>">
                <div class="card h-100 d-flex flex-column">
                    <div class="el-card-item flex-grow-1 d-flex flex-column">
                        <div class="el-card-avatar el-overlay-1">
                            <?php if (str_contains($file->mimetype, "image")): ?>
                                <img style="height: 300px; width: 100%; object-fit: cover"
                                     src="<?php uploadPath($file->storeName); ?>"
                                     alt="<?php echo $file->fileName; ?>"/>
                            <?php else: ?>
                                <div style="height: 300px; width: 100%; object-fit: cover"
                                     class="d-flex justify-content-center align-items-center border-1 border-secondary border">
                                    <h3 class="text-uppercase display-7"><?php echo $file->type; ?></h3>
                                </div>
                            <?php endif; ?>

                            <div class="el-overlay">
                                <!-- overlay button -->
                                <ul class="list-style-none el-info d-flex justify-content-center gap-2">
                                    <li class="el-item">
                                        <?php if (str_contains($file->mimetype, "image")): ?>
                                            <a class="btn default btn-outline image-popup-vertical-fit el-link"
                                               href="<?php uploadPath($file->storeName); ?>">
                                                <i class="mdi mdi-magnify-plus"></i>
                                            </a>
                                        <?php else: ?>
                                            <a class="btn default btn-outline el-link" target="_blank"
                                               href="<?php uploadPath($file->storeName); ?>">
                                                <i class="mdi mdi-magnify-plus"></i>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                    <li class="el-item">
                                        <button class="btn default btn-outline el-link m-0"
                                                data-link="<?php uploadPath($file->storeName); ?>"
                                                onclick="copyLink(this)">
                                            <i class="mdi mdi-link"></i>
                                        </button>
                                    </li>
                                    <li class="el-item">
                                        <a class="btn default btn-outline el-link btn-warning"
                                           href="/media/edit/<?php echo $file->id; ?>">
                                            <i class="mdi mdi-settings"></i>
                                        </a>
                                    </li>

                                    <li class="el-item">
                                        <label class="btn default btn-outline el-link">
                                            <input data-select="checked" type="checkbox"
                                                   value="<?php echo $file->id; ?>" class="form-check-input">
                                        </label>
                                    </li>

                                    <?php if (haveRole("admin")): ?>
                                        <li class="el-item">
                                            <form action="/media/<?php echo $file->id; ?>" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="storeName"
                                                       value="<?php echo $file->storeName; ?>">
                                                <button class="btn default btn-outline el-link btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </form>
                                        </li>
                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>

                        <div class="el-card-content d-flex flex-column flex-grow-1">
                            <div class="flex-grow-1">
                                <h4 class="mb-0"><?php echo $file->fileName; ?></h4>
                            </div>
                            <div>
                                <span class="text-muted me-2"><?php dateDDMMYYY($file->createdAt); ?></span>
                                <span><?php echo $file->id; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- ============================================================== -->
    <!-- End Gallery -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>