<?php require_once __DIR__ . '/../partials/top.php'; ?>
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4 class="text-uppercase">уређивање<br><?php echo $dokument->title ?></h4>

<div class="card">
    <div class="card-body">
        <form action="/document/<?php echo $dokument->id; ?>" class="row" method="post">
            <input type="hidden" name="_method" value="patch">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="odbor">Назив</label>
                        <input class="form-control" type="text" name="title" value="<?php echo $dokument->title; ?>">
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="attachment">Документ</label>
                        <div>
                            <select id="attachment" class="select2 form-select " type="text"
                                    name="attachment">
                                <?php foreach ($media as $type => $files): ?>
                                    <optgroup label="<?php echo $type; ?>">
                                        <?php foreach ($files as $file): ?>
                                            <option
                                                    value="<?php echo $file->id; ?>"
                                                <?php echo (int)$file->id === (int)$dokument->attachment ? "selected" : "" ?>
                                            >
                                                (<?php echo $file->id; ?>) <?php echo $file->fileName; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="povezan">Повезан са</label>
                        <select id="povezan" class="form-control" type="text" name="parentID">
                            <option value="0">Није повезан</option>
                            <?php foreach ($povezan as $file): ?>
                                <option value="<?php echo $file->id; ?>"
                                    <?php echo (int)$file->id === (int)$dokument->parentID ? "selected" : ""; ?>
                                >
                                    <span class="ms-2"><?php dateDDMMYYY($file->createdAt); ?></span>
                                    <span><?php echo $file->title; ?></span>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3 d-flex align-items-end">
                    <button class="btn btn-primary form-control mb-3 nowrap" type="submit">САЧУВАЈ ПРОМЕНЕ
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<?php require_once __DIR__ . '/../partials/bottom.php'; ?>

