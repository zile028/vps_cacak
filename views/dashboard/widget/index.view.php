<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

<div class="card p-2">
    <div class="d-flex justify-content-between align-content-center">
        <h2>Wdgets</h2>
        <a class="btn btn-primary d-flex justify-content-center align-items-center" href="/widget/create">
            <i class="mdi mdi-plus-box font-24 lh-1"></i></a>
    </div>
</div>
<div class="card p-2">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php foreach ($widgets as $widgetName => $widget): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading-<?php echo $widgetName ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo $widgetName ?>" aria-expanded="false" aria-controls="flush-collapse-<?php echo $widgetName ?>">
                        <?php echo $widgetName; ?>
                    </button>
                </h2>
                <div id="flush-collapse-<?php echo $widgetName ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo $widgetName ?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php foreach ($widget as $item): ?>
                            <form action="widget/<?php echo $item->id; ?>" method="post" class="row">
                                <input type="hidden" name="_method" value="put">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <p class="form-control"><?php echo $item->name; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Type</label>
                                        <p class="form-control"><?php echo $item->type; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">position</label>
                                        <input class="form-control" type="text" name="position" value="<?php echo $item->position; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Lang</label>
                                        <input class="form-control" type="text" name="lang" value="<?php echo $item->lang; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group d-flex flex-column align-items-center">
                                        <label class="form-check-label" for="">Is active</label>
                                        <div class="input-group-text">
                                            <input class="form-check-input" type="checkbox" name="isActive"
                                                <?php echo $item->isActive ? "checked" : null ?> >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <?php if ($item->type === "html"): ?>
                                            <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php echo $item->content; ?></textarea>
                                        <?php elseif ($item->type === "wysiwyg"): ?>
                                            <?php quillEditor($item->content, "content"); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 my-3">
                                    <div class="form-group d-flex flex-column justify-content-between h-100">
                                        <label for="">Settings as JSON</label>
                                        <textarea class="form-control flex-grow-1" style="resize: none" name="settings" cols="30"><?php echo $item->settings; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 offset-md-9 text-end">
                                    <button class="btn btn-primary">Quick Update</button>

                                </div>
                            </form>
                            <form action="/widget/<?php echo $item->id; ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            <hr>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
