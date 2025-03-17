<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ДОДАВАЊЕ ВЕСТИ</h4>

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

    <form action="/dashboard/vesti/<?php echo $vest->id; ?>"
          method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="fname" class="col-12 control-label col-form-label">Наслов</label>
                    <div class="col-12">
                        <input
                                type="text"
                                class="form-control"
                                id="fname"
                                placeholder="Наслов"
                                name="naslov"
                                value="<?php echo $vest->naslov ?? '' ?>"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="description" class="col-12 control-label
                    col-form-label">Вест</label>
                        <?php
                        $description = $vest->description ?? "";
                        require_once __DIR__ . "/../partials/quill_editor.php"
                        ?>
                        <?php if (count($attachment) > 0): ?>
                            <ul class="list-group">
                                <?php foreach ($attachment as $index => $file) : ?>
                                    <li class="list-group-item d-flex justify-content-between
                                    align-items-start">
                                        <a href="<?php uploadPath($file->storeName); ?>">
                                            <?php echo $file->fileName; ?>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                           href="/dashboard/vesti/remove_attacment/<?php
                                           echo $vest->id; ?>/<?php echo $file->mediaID; ?>">
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-5">
                        <p>Тренутна насловна слика:</p>
                        <img class="img-fluid" src="<?php empty($vest->thumbnail) ?
                            uploadPath("vest_avatar.png")
                            : uploadPath
                            ($vest->thumbnail); ?>"
                             alt="">
                        <div>
                            <label class="mt-2" for="featuredImage">Насловна слика</label>
                            <?php if (count($media) > 0): ?>
                                <select id="featuredImage" class="form-control"
                                        name="featured_imageID">
                                    <?php if (empty($vest->thumbnail) || $vest->thumbnail === "vest_avatar.png"): ?>
                                        <option value="">Подразумевана слика</option>
                                    <?php endif; ?>
                                    <?php foreach ($media as $image) : ?>
                                        <option value="<?php echo $image->id; ?>" <?php echo
                                        $vest->featured_imageID === $image->id ? "selected" : "" ?> >
                                            <?php echo $image->fileName; ?>
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
                </div>
                <div class="row">
                    <div id="fileSelector" class="attachment col-md-6">
                        <label class="btn btn-warning" for="attachment">Додај документ</label>
                        <input id="attachment" class="d-none" type="file" name="attachment[]"
                               multiple>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-primary">Ажурирај вест</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- ============================================================== -->
    <!-- End form -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>