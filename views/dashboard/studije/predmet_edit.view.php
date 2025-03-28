<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4>УРЕДИ ПРЕДМЕТ</h4>

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<div class="card">
    <form class="form-horizontal" action="/dashboard/study/course/<?php echo $predmet->id; ?>" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        <div class="card-body">
            <div class="form-group row">
                <label for="predmet" class="col-sm-3 text-end control-label
                    col-form-label">Предмет</label>
                <div class="col-sm-9">
                    <input
                            type="text"
                            class="form-control"
                            id="predmet"
                            placeholder="Предмет"
                            name="predmet"
                            value="<?php echo $predmet->predmet; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label for="sifra" class="col-sm-3 text-end control-label
                    col-form-label">Шифра</label>
                <div class="col-sm-9">
                    <input
                            type="text"
                            class="form-control"
                            id="sifra"
                            placeholder="Шифра"
                            name="sifra"
                            value="<?php echo $predmet->sifra; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label for="lang" class="col-sm-3 text-end control-label
                    col-form-label">Jezik</label>
                <div class="col-sm-9">
                    <select name="lang" id="lang" class="form-control">
                        <option value="srb" <?php echo $predmet->lang === "srb" ? "selected" : null; ?>>srb</option>
                        <option value="en" <?php echo $predmet->lang === "en" ? "selected" : null; ?>>en</option>
                    </select>

                </div>
            </div>

            <div class="form-group row">
                <label for="predavanje" class="col-sm-3 text-end control-label
                    col-form-label">Предавање</label>
                <div class="col-sm-9">
                    <input
                            type="text"
                            class="form-control"
                            id="predavanje"
                            placeholder="Предавање"
                            name="predavanja"
                            value="<?php echo $predmet->predavanja; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label for="vezbe" class="col-sm-3 text-end control-label
                    col-form-label">Вежбе</label>
                <div class="col-sm-9">
                    <input
                            type="text"
                            class="form-control"
                            id="vezbe"
                            placeholder="Вежбе"
                            name="vezbe"
                            value="<?php echo $predmet->vezbe; ?>"
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
                            name="espb"
                            value="<?php echo $predmet->espb; ?>"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-sm-3 text-end" for="nastavniPlan">Наставни план</label>
                <div class="col-sm-9">
                    <div class="select2-border">
                        <select class="select2" id="nastavniPlan" name="nastavniPlan">
                            <option value="<?php echo null; ?>" selected>Нема наставни план</option>
                            <?php foreach ($nastavniPlanovi as $plan): ?>
                                <option value="<?php echo $plan->id; ?>" <?php echo $plan->id == $predmet->nastavniPlan ? "selected" : ""; ?> ><?php echo $plan->fileName; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <!--            <div class="offset-sm-3 col ">-->
            <!--                <label class="btn btn-warning" for="nastavniPlan">Наставни план</label>-->
            <!--                <input type="file" class="d-none" name="nastavniPlan" accept="application/pdf"-->
            <!--                       id="nastavniPlan">-->
            <!--            </div>-->

            <div class="row border-top">
                <div class="col-sm-9 offset-sm-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">ИЗМЕНИ</button>
                    </div>
                </div>
            </div>
    </form>
</div>
<!--  -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
