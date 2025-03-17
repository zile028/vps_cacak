<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card p-2">
    <div class="d-flex justify-content-between align-content-center">
        <h2>Упис/Додавање</h2>
        <a class="btn btn-primary d-flex justify-content-center align-items-center" href="/admission">
            <i class="mdi mdi-backspace font-24 lh-1"></i></a>
    </div>
</div>

<div class="card p-2">
    <form action="/admission/create" class="row" method="post">
        <input type="hidden" name="lang" value="<?php echo $nivoStudija[0]->lang; ?>">
        <div class="d-flex flex-column col-md-6">
            <label for="title">Uslov</label>
            <input type="text" name="title" id="title" class="form-control" tabindex="1">
        </div>
        <div class="d-flex flex-column col-md-6">
            <label for="nivoStudija">Uslov</label>
            <select name="nivoID" id="nivoStudija" class="form-control" tabindex="2">
                <?php foreach ($nivoStudija as $nivo): ?>
                    <option value="<?php echo $nivo->id; ?>"><?php echo $nivo->title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-12 mt-3">
            <?php quillEditor(null, "content", false, 3); ?>
        </div>
        <div class="text-end">
            <button class="btn btn-primary">Сачувај</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>

