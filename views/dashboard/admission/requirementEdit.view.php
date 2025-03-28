<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card p-2">
    <div class="d-flex justify-content-between align-content-center">
        <h2>Упис/Измена</h2>
        <a class="btn btn-primary d-flex justify-content-center align-items-center" href="/dashboard/admission">
            <i class="mdi mdi-backspace font-24 lh-1"></i></a>
    </div>
</div>

<div class="card p-2">
    <form action="/dashboard/admission/requirement/<?php echo $uslov->id; ?>" class="row" method="post">
        <input type="hidden" name="_method" value="patch">
        <input type="hidden" name="lang" value="<?php echo $uslov->lang; ?>">
        <div class="d-flex flex-column col-md-6">
            <label for="title">Uslov</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $uslov->title ?>">
        </div>
        <div class="d-flex flex-column col-md-6">
            <label for="nivoStudija">Uslov</label>
            <select name="nivoLang" id="nivoStudija" class="form-control">
                <?php foreach ($nivoStudija as $lang => $nivoi): ?>
                    <optgroup label="<?php echo $lang ?>">
                        <?php foreach ($nivoi as $nivo): ?>
                            <option value='<?php echo json_encode([$nivo->id, $nivo->lang]); ?>'
                                <?php echo $nivo->id === $uslov->nivoID ? "selected" : "" ?>
                            ><?php echo $nivo->title; ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-12 mt-3">
            <?php quillEditor($uslov->content, "content"); ?>
        </div>
        <div class="text-end">
            <button class="btn btn-primary">Сачувај измене</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>

