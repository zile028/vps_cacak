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
        <form class="row p-3" action="/study/level/<?php echo $nivo->id; ?>" method="post">
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
                <label for="description">Опис</label>
                <?php quillEditor($nivo->description, "description"); ?>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2">
                        <img class="img-fluid" src="<?php echo $nivo->image; ?>" alt="" data-preview="preview">
                    </div>
                    <div class="col-md-10">
                        <label for="image">Истакнута слика</label><br>
                        <input class="form-control" type="text" name="image" id="image" data-preview="src" value="<?php echo $nivo->image; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                <button class="btn btn-primary">Сачувај</button>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>