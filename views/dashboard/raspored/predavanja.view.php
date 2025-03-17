<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4 class="text-uppercase">РАСПОРЕД - <?php echo $kategorija->kategorija; ?></h4>
    <div class="card">
        <form action="/schedule/<?php echo $kategorija->id; ?>/<?php echo $lang; ?>"
              class="card-body row align-items-end" method="post">
            <!-- STUDIJSKI PROGRAM-->
            <div class="col-lg-4 col-md-12 flex-grow-1">
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
            <div class="col-lg-3 col-md-12">
                <label for="godina">Година студија</label>
                <select class="form-control" name="godina" id="godina">
                    <?php foreach ($godine as $godina) : ?>
                        <option value="<?php echo $godina->id; ?>"><?php echo $godina->godina; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <!-- FAJL-->
            <div class="col-lg-4 col-md-12 flex-grow-1 d-flex flex-column">
                <label for="mediaID">Придружи фајл:</label>
                <select class="form-control select2" name="mediaID" id="mediaID">
                    <?php foreach ($media as $type => $item) : ?>
                        <optgroup label="<?php echo $type; ?>">
                            <?php foreach ($item as $file) : ?>
                                <option value="<?php echo $file->id; ?>">
                                    (<?php echo $file->id; ?>)
                                    <?php echo $file->fileName; ?>
                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col">
                <button class="btn btn-primary">ДОДАЈ</button>
            </div>
        </form>
    </div>
<?php require __DIR__ . "/../partials/raspored_table.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>