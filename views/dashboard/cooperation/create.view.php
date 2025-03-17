<?php use Core\Session; ?>
<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<style>
    .select2.select2-container {
        display: block;
        border: 1px solid #cccccc;
        width: 100% !important;
    }

</style>
<div class="card p-3">

    <h1>   <?php echo $title ?></h1>

    <div class="row">
        <form action="/cooperation/<?php echo $type; ?>?lang=<?php echo $lang; ?>" method="post">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="title">Naziv</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Naziv"
                               value="<?php echo $inputs["title"] ?? null ?>"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="webAdresa">Web adresa</label>
                        <input type="text" id="webAdresa" name="url" class="form-control" placeholder="Web adresa"
                               value="<?php echo $inputs["url"] ?? null ?>"
                        >
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label class="form-label" for="color">Head color</label>
                        <input type="color" value="<?php echo $inputs["color"] ?? "#072248" ?>" id="color" name="color"
                               class="form-control p-1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="flag">Država/Zastava</label>
                        <select class="form-control select2" id="flag" name="flag">
                            <?php foreach ($flags as $flag): ?>
                                <option
                                        value="<?php echo $flag->id; ?>"
                                        data-image="<?php echo UPLOAD_DIR_NAME . "/" . $flag->flag32; ?>"
                                    <?php echo ($inputs["flag"] ?? null) == $flag->id ? "selected" : "" ?>
                                >
                                    <?php echo $flag->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="logo">Logo</label>
                            <div class="form-control px-0 d-flex align-items-center gap-1">
                                <select class="select2" id="logo" name="logo">
                                    <?php foreach ($logos as $logo): ?>
                                        <option value="<?php echo $logo->id; ?>"
                                            <?php echo ($inputs["logo"] ?? null) == $logo->id ? "selected" : "" ?>
                                        >
                                            <?php echo $logo->fileName ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="col">
                                    <button class="btn btn-warning form-control" type="submit" name="submit"
                                            value="add_logo">
                                        <i class="mdi mdi-plus-box-outline"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" value="save">Додај</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>


