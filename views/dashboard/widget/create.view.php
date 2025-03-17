<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<?php datalist($options["name"], "nameList"); ?>
<?php datalist($options["type"], "typeList"); ?>

<div class="card p-2">
    <div class="d-flex justify-content-between align-content-center">
        <h2>Create wdget</h2>
        <a class="btn btn-primary d-flex justify-content-center align-items-center" href="/widget">
            <i class="mdi mdi-backspace font-24 lh-1"></i></a>
    </div>
</div>
<div class="card p-2">
    <form id="widgetCreate" action="widget/create" method="post" class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" list="nameList" autocomplete="off"/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" data-type="content-type">
                    <option value="html">HTML</option>
                    <option value="wysiwyg">WYSIWYG</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="position">Position</label>
                <input class="form-control" id="position" type="text" name="position">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="lang">Language</label>
                <input class="form-control" id="lang" type="text" name="lang">
            </div>
        </div>

        <div class="col-md-2">
            <div class="input-group d-flex flex-column align-items-center">
                <label class="form-check-label" for="is_active">Is active</label>
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" id="is_active" name="isActive">
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group" data-type="content">
                <label for="content">Content</label>
                <div class='mb-3 flex-column' data-editor='quillEditor' data-editor-type="wysiwyg" style="display: none">
                    <div class='col-12'>
                        <!-- Create the editor container -->
                        <div data-editor='container' style='height: 300px'></div>
                    </div>
                    <textarea id="content" name='content[wysiwyg]' style='display: none; width: 100%; min-height: 300px; resize: none; padding: 12px 15px' class='flex-grow-1' data-editor='content'></textarea>
                </div>
                <div data-editor-type="html">
                    <textarea name="content[html]" class="form-control" id="content" data-type="html" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="form-group h-100 d-flex flex-column justify-content-between">
                <label for="settings">Settings as JSON</label>
                <textarea class="form-control flex-grow-1" style="resize: none" id="settings" name="settings" cols="30"></textarea>
            </div>
        </div>
        <div class="col-md-3 offset-md-9 text-end">
            <button class="btn btn-primary">Create</button>
        </div>
    </form>
</div>


<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
