<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ДОДАЈ МОДУЛ</h4>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <div class="card">
        <form class="form-horizontal" action="/dashboard/studije/modul/dodaj" method="post"
              enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="modul" class="col-sm-3 text-end control-label
                    col-form-label">Модул</label>
                    <div class="col-sm-9">
                        <input
                                type="text"
                                class="form-control"
                                id="modul"
                                placeholder="Модул"
                                name="modul"
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label
                            for="spid"
                            class="col-sm-3 text-end control-label col-form-label"
                    >Студијски програм</label
                    >
                    <div class="col-sm-9">
                        <select class="form-control" name="spID" id="spid">
                            <?php foreach ($studijskiProgrami as $studije): ?>
                                <option value="<?php echo $studije->id; ?>">
                                    <?php
                                    echo mb_strtoupper($studije->nivo) . " - " . $studije->naziv;
                                    ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


            </div>
            <div class="row border-top">

                <div class="col-sm-9 offset-sm-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">
                            ДОДАЈ
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--  -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>