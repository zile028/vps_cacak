<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4>ДОДАЈ ПРЕДМЕТ</h4>
<?php require_once "navbar.php" ?>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<div class="card">
    <form class="form-horizontal" action="/study/course/add" method="post"
          enctype="multipart/form-data">
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
                    />
                </div>
            </div>

            <div class="form-group row">
                <label for="lang" class="col-sm-3 text-end control-label
                    col-form-label">Jezik</label>
                <div class="col-sm-9">
                    <select name="lang" id="lang" class="form-control">
                        <option value="srb">srb</option>
                        <option value="en">en</option>
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
                            name="predavanje"
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
                    />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col ">
                <label class="btn btn-warning" for="nastavniPlan">Наставни план</label>
                <input type="file" class="d-none" name="nastavniPlan" accept="application/pdf"
                       id="nastavniPlan">
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
