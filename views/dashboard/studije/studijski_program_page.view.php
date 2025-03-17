<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>СТУДИЈСКИ ПРОГРАМ - <?php echo $sp->naziv; ?></h4>
<?php require_once "navbar.php" ?>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <form action="/study/program/<?php echo $sp->id; ?>" method="post">
        <input type="hidden" name="_method" value="put">
        <div class="card container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="fname" class="col flex-grow-0 col-form-label text-nowrap">Студијски
                                програм:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="fname"
                                        placeholder="Назив"
                                        name="naziv"
                                        value="<?php echo $sp->naziv; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modul"
                                   class="col flex-grow-0 col-form-label text-nowrap">Модул:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="modul"
                                        placeholder="Модул"
                                        name="modul"
                                        value="<?php echo $sp->modul; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nivo"
                                   class="col flex-grow-0 col-form-label text-nowrap">Ниво:</label>
                            <div class="col">

                                <select id="nivo" class="form-control fw-bold" name="nivoID">
                                    <?php foreach ($nivoStudija as $nivo) : ?>
                                        <option
                                                class="fw-bold"
                                                value="<?php echo $nivo->id; ?>"
                                            <?php echo $nivo->id === $sp->nivoID ? 'selected' : ''; ?>
                                        >
                                            <?php echo $nivo->title; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trajanje"
                                   class="col flex-grow-0 col-form-label text-nowrap">Трајање:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="trajanje"
                                        placeholder="Трајање (година)"
                                        name="trajanje"
                                        value="<?php echo $sp->trajanje; ?>"
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="opis" class="text-end control-label
                    col-form-label">Опис</label>
                            <div>
                                <?php quillEditor($sp->opis, "opis"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group row">
                            <label for="espb" class="col flex-grow-0 col-form-label text-nowrap">Број
                                ЕСПБ:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="espb"
                                        placeholder="ЕСПБ"
                                        name="espb"
                                        value="<?php echo $sp->espb; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zvanje" class="col flex-grow-0 col-form-label text-nowrap">Звање:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="zvanje"
                                        placeholder="Звање"
                                        name="zvanje" value="<?php echo $sp->zvanje; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="polje" class="col flex-grow-0 col-form-label text-nowrap">Образовно
                                поље:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="polje"
                                        placeholder="Образовно поље"
                                        name="polje" value="<?php echo $sp->polje; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akreditovan"
                                   class="col flex-grow-0 col-form-label text-nowrap">Година
                                акредитације:</label>
                            <div class="col">
                                <input
                                        type="text"
                                        class="form-control fw-bold"
                                        id="akreditovan"
                                        placeholder="Година акредитације"
                                        name="akreditovan" value="<?php echo $sp->akreditovan; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cilj" class="text-end control-label
                    col-form-label">Циљ</label>
                            <div class="">
                                <div>
                                    <?php quillEditor($sp->cilj, "cilj"); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ishod" class=" text-end control-label
                    col-form-label">Исход</label>
                            <div class="">
                                <?php quillEditor($sp->ishod, "ishod"); ?>
                            </div>
                        </div>
                        <button class="btn btn-primary">Ажурирај</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php if (count($slobodniPredmeti) > 0): ?>
    <div class="card">
        <div class="card-body">
            <h6>Додај предмет</h6>
            <form id="addForm" action="/study/program/<?php echo $sp->id; ?>/course" class="row"
                  method="post">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="redniBroj" value="<?php echo count($predmeti) + 1; ?>">
                <div class="col-md-5">
                    <select id="predmetID" class="form-control select2" name="predmetID">
                        <?php foreach ($slobodniPredmeti as $predmet) : ?>
                            <option value="<?php echo $predmet->id; ?>">
                                <?php echo $predmet->sifra; ?> - <?php echo $predmet->predmet; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md d-flex gap-2 align-items-center">
                    <input class="form-control" type="text" name="godina" placeholder="Година">
                </div>
                <div class="col-md d-flex gap-2 align-items-center">
                    <input class="form-control" type="text" name="semestar" placeholder="Семестар">
                </div>
                <div class="col-md d-flex gap-2 align-items-center">
                    <label for="izborni" class="form-check-label mb-0 pb-0">Изборни</label>
                    <input type="checkbox" class="form-check-input" value="1" name="izborni">
                </div>
                <div class="col-md">
                    <button class="btn btn-primary form-control" type="submit">ДОДАЈ ПРЕДМЕТ
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
<?php if (count($predmeti) > 0): ?>
    <?php require_once "predmeti_table.php" ?>
<?php else: ?>
    <p>Тренутно нема предмета.</p>
<?php endif; ?>
    <!--  -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>