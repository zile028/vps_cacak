<?php require_once __DIR__ . '/../partials/top.php'; ?>
    <!--  -->
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
    <style>
        .error {
            color: #ff6347;
        }
    </style>
    <!-- =============================== =============================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card p-3">
        <h4 class="m-0">АЛУМНИ КЛУБ</h4>
    </div>
    <div class="card p-3">
        <form action="/dashboard/alumni/<?php echo $alumnista->id; ?>" method="POST">
            <input type="hidden" name="_method" value="put">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="firstName">Име</label>
                        <input class="form-control" id="firstName" name="firstName" type="text" placeholder="Име"
                               value="<?php echo $alumnista->firstName ?? getFlash(INPUTS_FLASH, "firstName"); ?>">
                        <?php showError("firstName"); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName">Презиме</label>
                        <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Презиме"
                               value="<?php echo $alumnista->lastName ?? getFlash(INPUTS_FLASH, "lastName"); ?>">
                        <?php showError("lastName"); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jmbg">ЈМБГ</label>
                        <input class="form-control" id="jmbg" name="jmbg" type="text"
                               placeholder="ЈМБГ неће бити јавно доступан"
                               value="<?php echo getFlash(INPUTS_FLASH, "jmbg") ?? $alumnista->jmbg; ?>">
                        <?php showError("jmbg"); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="E-mail"
                               value="<?php echo $alumnista->email ?? getFlash(INPUTS_FLASH, "email"); ?>">
                        <?php showError("email"); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="diplomirao">Година дипломирања (1999...)</label>
                        <input class="form-control" id="diplomirao" name="diplomirao" type="text"
                               placeholder="Година дипломирања"
                               value="<?php echo $alumnista->diplomirao ?? getFlash(INPUTS_FLASH, "diplomirao"); ?>">
                        <?php showError("diplomirao"); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="studyLevel">Ниво студија</label>
                        <select class="form-control" id="studyLevel" name="studyLevel">
                            <?php foreach ($studyLevel as $level): ?>
                                <option value="<?php echo $level->id; ?>"
                                    <?php echo ((int)$alumnista->nivoID ?? (int)getFlash(INPUTS_FLASH, "nivoID")) == $level->id ? "selected" : ""; ?>
                                ><?php echo $level->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="poslodavac">Послодавац</label>
                        <input class="form-control" id="poslodavac" name="poslodavac" type="text"
                               placeholder="Послодавац"
                               value="<?php echo $alumnista->poslodavac ?? getFlash(INPUTS_FLASH, "poslodavac"); ?>">
                        <?php showError("poslodavac"); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="radnoMesto">Радно место</label>
                        <input class="form-control" id="radnoMesto" name="radnoMesto" type="text"
                               placeholder="Радно место"
                               value="<?php echo $alumnista->radnoMesto ?? getFlash(INPUTS_FLASH, "radnoMesto"); ?>">
                        <?php showError("radnoMesto"); ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="active">Активан</label>
                        <div>
                            <input class="form-check-input" style="height: 2em; width: 2em;" id="active" name="active"
                                   type="checkbox"
                                <?php echo $alumnista->active ? "checked" : '' ?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex flex-column justify-content-end">
                    <div class="form-submit d-flex justify-content-end mb-3">
                        <button class="btn btn-primary">Сачувај</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php require_once __DIR__ . '/../partials/bottom.php'; ?>