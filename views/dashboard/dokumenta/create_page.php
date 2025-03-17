<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4>ДОДАЈ ДОКУМЕНТ</h4>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<div class="card">
    <form class="form-horizontal" action="/dashboard/dokumenta/dodaj" method="post"
          enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label
                    col-form-label">Назив документа</label
                >
                <div class="col-sm-9">
                    <input
                            type="text"
                            class="form-control"
                            id="fname"
                            placeholder="Назив документа"
                            name="title"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label
                        for="category"
                        class="col-sm-3 text-end control-label col-form-label"
                >Категорија</label
                >
                <div class="col-sm-9">
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($kategorije as $kategorija): ?>
                            <option value="<?php echo $kategorija["id"]; ?>"><?php echo
                                $kategorija["category"];
                                ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <?php if (count($dokumenta) > 0): ?>
                <div class="form-group row">
                    <label
                            for="parent"
                            class="col-sm-3 text-end control-label col-form-label"
                    >Повезано са:</label
                    >
                    <div class="col-sm-9">
                        <select class="form-control" name="parentID" id="parent">
                            <option value="0">Није повезан</option>
                            <?php foreach ($dokumenta as $dokument): ?>
                                <option value="<?php echo $dokument["id"]; ?>">
                                    <?php echo $dokument["title"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group row">
                <div class="offset-sm-3 col ">
                    <label class="btn btn-warning" for="attach">Одабери
                        документ</label>
                    <input type="file" class="d-none" name="attachment" accept="application/pdf"
                           id="attach">
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
