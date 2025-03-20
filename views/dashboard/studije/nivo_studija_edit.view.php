<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>УРЕЂИВАЊЕ НИВОА СТУДИЈА</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="card">
        <form class="row p-3" action="/dashboard/study/level/<?php echo $nivo->id; ?>" method="post">
            <input type="hidden" name="_method" value="patch">
            <div class="col-md-6">
                <label for="title">Назив</label>
                <input class="form-control" id="title" name="title" type="text" value="<?php echo $nivo->title; ?>">
            </div>
            <div class="col-md-2">
                <label for="slug">Slug</label>
                <input class="form-control" id="slug" name="slug" type="text" value="<?php echo $nivo->slug; ?>">
            </div>
            <div class="col-md-2">
                <label for="lang">Језик</label>
                <select class="form-control" id="lang" name="lang">
                    <option value="srb">srb</option>
                    <option value="en">en</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="lvl">Ниво</label>
                <input class="form-control" id="lvl" name="lvl" type="number" value="<?php echo $nivo->lvl; ?>">
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <label for="description">Опис</label>
                        <?php quillEditor($nivo->description, "description"); ?>
                    </div>
                    <div class="col-md-4 flex-grow-1" style="height: 410px;">
                        <div class="d-flex flex-column h-100">
                            <div class="col-md-12 mb-3">
                                <label for="image">Истакнута слика</label><br>
                                <select class="select2 w-100" name="image" id="image" data-image="preview">
                                    <?php foreach ($images as $img): ?>
                                        <option data-storeName="<?php echo uploadPath($img->storeName); ?>"
                                                value="<?php echo $img->id; ?>"><?php echo $img->fileName; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12 border border-dark flex-grow-1 mb-3">
                                <img id="imagePreview" class="img-cover"
                                     src="<?php echo uploadPath($images[0]->storeName) ?>"
                                     alt="">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                <button class="btn btn-primary">Сачувај</button>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>