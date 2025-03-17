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
                <label for="skolskaGodina">Школска година:</label>
                <input class="form-control" name="skolskaGodina" id="skolskaGodina" pattern="[2]{1}[0-9]{3}[/]{1}[2]{1}[0-9]{3}" placeholder="2024/2025" title="Uneti skolsku godinu u navedenom formatu"/>
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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>