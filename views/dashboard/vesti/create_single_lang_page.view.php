<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ДОДАВАЊЕ ВЕСТИ</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
<?php require_once "navbar.php" ?>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
<?php if (isset($error) && count($error) > 0): ?>
    <div class="card p-2">
        <ul class="list-group">
            <?php foreach ($error as $err) : ?>
                <li class="list-group-item list-group-item-danger"><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


    <!-- ============================================================== -->
    <!-- Start form -->
    <!-- ============================================================== -->
    <div class="card">
        <form class="card-body" action="/news/add?<?php echo "id=$id&lang=$lang"; ?>" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <h4><img class="me-2" src="/assets/images/<?php echo $lang; ?>.svg"
                             alt=""><?php echo $lang === "srb" ? "Српски" : "Енглески"; ?></h4>
                    <div class="card">
                        <div class="form-group flex-lg-grow-1 col-sm">
                            <label for="fname" class="control-label col-form-label">Наслов</label>
                            <div class="col-12">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="fname"
                                        placeholder="Наслов"
                                        name="naslov"
                                        value="<?php echo $previous->naslov ?? "" ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-12 control-label
                    col-form-label">Вест</label>
                            <?php quillEditor($previous->description ?? "", "description"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($canAtachFile): ?>
                    <div id="fileSelector" class="attachment col-md-6">
                        <label class="btn btn-warning" for="attachment">Додај документ</label>
                        <input id="attachment" class="d-none" type="file" name="attachment[]"
                               multiple>
                    </div>
                <?php endif; ?>
                <div class="d-flex col-md-6 gap-3">
                    <div class="col-md-3 border border-dark" style="height: 150px">
                        <a id="imagePreviewA" href="<?php uploadPath($media[0]->storeName); ?>" target="_blank">
                            <img id="imagePreview" class="h-100 w-100" style="object-fit: cover"
                                 src="<?php uploadPath($previous->storeName); ?>"
                                 alt="featured image">
                        </a>
                    </div>

                    <div class="col">
                        <label for="featuredImage">Насловна слика</label>
                        <?php if (count($media) > 0): ?>
                            <select id="featuredImage" class="form-control select2" name="featured_imageID">
                                <?php foreach ($media as $image) : ?>
                                    <option
                                        <?php echo (int)$previous->featured_imageID === (int)$image->id ? "selected" : "" ?>
                                            value="<?php echo $image->id; ?>"
                                            data-storeName="<?php uploadPath($image->storeName); ?>">
                                        (<?php echo $image->id; ?>) <?php echo $image->fileName; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <p class="text-danger fw-bold">
                                Насловна слика је обавезна, додајте је
                                прво у медијима како би сте је овде могли одабрати.
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <button class="btn btn-primary">Сачувај измене</button>
                </div>
            </div>

        </form>
    </div>
    <!-- ============================================================== -->
    <!-- End form -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>