<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ДОДАЈ СТУДИЈСКИ ПРОГРАМ</h4>
<?php require_once "navbar.php" ?>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <div class="card">
        <form class="form-horizontal" action="/dashboard/study/program/add" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <h4>Srpski</h4>
                    <hr>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nivo"
                                   class="col-sm-3 text-end ">Ниво:</label>
                            <div class="col">
                                <select id="nivo" class="form-control" name="srb[nivoID]">
                                    <?php foreach ($nivoStudija["srb"] as $nivo) : ?>
                                        <option
                                                value="<?php echo $nivo->id; ?>"
                                        >
                                            <?php echo $nivo->title; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label
                    col-form-label">Назив</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="fname"
                                        placeholder="Назив"
                                        name="srb[naziv]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modul" class="col-sm-3 text-end control-label
                    col-form-label">Модул</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="modul"
                                        placeholder="Модул"
                                        name="srb[modul]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trajanje" class="col-sm-3 text-end control-label
                    col-form-label">Трајање (година)</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="trajanje"
                                        placeholder="Трајање (година)"
                                        name="srb[trajanje]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="espb" class="col-sm-3 text-end control-label
                    col-form-label">ЕСПБ</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="espb"
                                        placeholder="ЕСПБ"
                                        name="srb[espb]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zvanje" class="col-sm-3 text-end control-label
                    col-form-label">Звање</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="zvanje"
                                        placeholder="Звање"
                                        name="srb[zvanje]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="polje" class="col-sm-3 text-end control-label
                    col-form-label">Образовно поље</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="polje"
                                        placeholder="Образовно поље"
                                        name="srb[polje]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="akreditovan" class="col-sm-3 text-end control-label
                    col-form-label">Година акредитације</label>
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="akreditovan"
                                        placeholder="Година акредитације"
                                        name="srb[akreditovan]"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cilj" class="col-sm-3 text-end control-label
                    col-form-label">Циљ</label>
                            <div class="col-sm-9">
                                <?php quillEditor(null, "srb[cilj]"); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="opis" class="col-sm-3 text-end control-label
                    col-form-label">Опис</label>
                            <div class="col-sm-9">
                                <?php quillEditor(null, "srb[opis]"); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ishod" class="col-sm-3 text-end control-label
                    col-form-label">Исход</label>
                            <div class="col-sm-9">
                                <?php quillEditor(null, "srb[ishod]"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($nivoStudija["en"])): ?>
                    <div class="col-md-6">
                        <h4>Engleski</h4>
                        <hr>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nivo"
                                       class="col-sm-3 text-end d-lg-none">Ниво:</label>
                                <div class="col">
                                    <select id="nivo" class="form-control" name="en[nivoID]">
                                        <?php foreach ($nivoStudija["en"] as $nivo) : ?>
                                            <option
                                                    value="<?php echo $nivo->id; ?>"
                                            >
                                                <?php echo $nivo->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Назив</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="Назив"
                                            name="en[naziv]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="modul" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Модул</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="modul"
                                            placeholder="Модул"
                                            name="en[modul]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="trajanje" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Трајање (година)</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="trajanje"
                                            placeholder="Трајање (година)"
                                            name="en[trajanje]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="espb" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">ЕСПБ</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="espb"
                                            placeholder="ЕСПБ"
                                            name="en[espb]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zvanje" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Звање</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="zvanje"
                                            placeholder="Звање"
                                            name="en[zvanje]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="polje" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Образовно поље</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="polje"
                                            placeholder="Образовно поље"
                                            name="en[polje]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="akreditovan" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Година акредитације</label>
                                <div class="col">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="akreditovan"
                                            placeholder="Година акредитације"
                                            name="en[akreditovan]"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cilj" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Циљ</label>
                                <div class="col">
                                    <?php quillEditor(null, "en[cilj]"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="opis" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Опис</label>
                                <div class="col">
                                    <?php quillEditor(null, "en[opis]"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ishod" class="col-sm-3 d-lg-none text-end control-label
                    col-form-label">Исход</label>
                                <div class="col">
                                    <?php quillEditor(null, "en[ishod]"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row border-top">
                <div class="col-12">
                    <div class="card-body text-center">
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