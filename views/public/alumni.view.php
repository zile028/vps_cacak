<?php require_once __DIR__ . "/partials/top.php" ?>
<?php require_once __DIR__ . "/partials/hero_pages.php" ?>
    <section class="alumni container py">
        <article>
            <?php getWidget("alumni"); ?>
        </article>
        <article class="m-t1">
            <?php showResponse(ERROR_RESPONSE_FLASH); ?>
            <?php showResponse(RESPONSE_FLASH, "success"); ?>
            <form action="/alumni/subscribe" method="POST">
                <div class="form-group">
                    <label for="firstName">Име</label>
                    <input id="firstName" name="firstName" type="text" placeholder="Име"
                           value="<?php echo getFlash(INPUTS_FLASH, "firstName"); ?>">
                    <?php showError("firstName"); ?>
                </div>
                <div class="form-group">
                    <label for="lastName">Презиме</label>
                    <input id="lastName" name="lastName" type="text" placeholder="Презиме"
                           value="<?php echo getFlash(INPUTS_FLASH, "lastName"); ?>">
                    <?php showError("lastName"); ?>
                </div>
                <div class="form-group">
                    <label for="jmbg">ЈМБГ</label>
                    <input id="jmbg" name="jmbg" type="text" placeholder="ЈМБГ неће бити јавно доступан"
                           value="<?php echo getFlash(INPUTS_FLASH, "jmbg"); ?>">
                    <?php showError("jmbg"); ?>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="E-mail"
                           value="<?php echo getFlash(INPUTS_FLASH, "email"); ?>">
                    <?php showError("email"); ?>
                </div>
                <div class="form-group">
                    <label for="diplomirao">Година дипломирања (1999...)</label>
                    <input id="diplomirao" name="diplomirao" type="text" placeholder="Година дипломирања"
                           value="<?php echo getFlash(INPUTS_FLASH, "diplomirao"); ?>">
                    <?php showError("diplomirao"); ?>
                </div>
                <div class="form-group">
                    <label for="studyLevel">Ниво студија</label>
                    <select id="studyLevel" name="studyLevel">
                        <?php foreach ($studyLevel as $level): ?>
                            <option value="<?php echo $level->id; ?>"
                                <?php echo (int)getFlash(INPUTS_FLASH, "studyLevel") == $level->id ? "selected" : ""; ?>
                            ><?php echo $level->title; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="poslodavac">Послодавац</label>
                    <input id="poslodavac" name="poslodavac" type="text" placeholder="Послодавац"
                           value="<?php echo getFlash(INPUTS_FLASH, "poslodavac"); ?>">
                    <?php showError("poslodavac"); ?>
                </div>
                <div class="form-group">
                    <label for="radnoMesto">Радно место</label>
                    <input id="radnoMesto" name="radnoMesto" type="text" placeholder="Радно место"
                           value="<?php echo getFlash(INPUTS_FLASH, "radnoMesto"); ?>">
                    <?php showError("radnoMesto"); ?>
                </div>
                <div class="form-submit">
                    <button class="btn">Пријави се</button>
                </div>
            </form>
        </article>
    </section>
<?php if (count($alumnisti) > 0): ?>
    <section class="alumni teacher container py">
        <article class="">
            <?php foreach ($alumnisti as $student) : ?>
                <div class="card">
                    <img src="<?php is_null($student->storeName) ? uploadPath("avatar.png") : uploadPath($student->storeName); ?>"
                         alt="<?php echo
                         $student->firstName; ?>">
                    <div class="card-body">
                        <h5><?php echo "$student->firstName $student->lastName"; ?></h5>
                        <p><?php echo $student->spNaziv; ?></p>
                        <p><?php echo $student->nivo; ?></p>
                        <a href="/alumni?poslodavac=<?php echo $student->poslodavac; ?>"><?php echo
                            $student->poslodavac; ?></a>
                    </div>
                    <div class="card-footer">
                        <a href="/alumni/<?php echo $student->id; ?>" class="btn btn-sm">Више</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </article>
    </section>
<?php endif; ?>
<?php require_once __DIR__ . "/partials/bottom.php" ?>