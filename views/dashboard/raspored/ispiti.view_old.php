<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>РАСПОРЕД - ИСПИТА</h4>
    <div class="card">
        <form action="/dashboard/raspored/ispiti" class="card-body row gap-2" method="post">
            <div class="row col-lg-6 col-md-12">
                <label for="spID">Студијски програм/модул:</label>
                <select class="form-control" name="spID" id="spID">
                    <?php foreach ($studije as $nivo => $sp) : ?>
                        <optgroup label="<?php echo $nivo; ?>">
                            <?php foreach ($sp as $p) : ?>
                                <option value="<?php echo $p->id; ?>">
                                    <?php echo $p->naziv . (isset($p->modul) ? ": " . $p->modul : ""); ?>
                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row col-lg-6 col-md-12">
                <label for="mediaID">Придружи фајл:</label>
                <select class="form-control" name="mediaID" id="mediaID">
                    <?php foreach ($media as $type => $item) : ?>
                        <optgroup label="<?php echo $type; ?>">
                            <?php foreach ($item as $file) : ?>
                                <option value="<?php echo $file->id; ?>">
                                    <?php echo $file->fileName; ?>
                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary">ДОДАЈ</button>
            </div>
        </form>
    </div>
<?php require __DIR__ . "/../partials/raspored_table.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>