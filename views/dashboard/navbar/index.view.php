<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card p-2">
    <h2>Navbar</h2>
    <div>
        <form action="/navbar" class="row" method="post">
            <div class="col-md-6 form-group">
                <label for="caption">Caption</label>
                <input id="caption" name="caption" type="text" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label for="parent">Parent</label>
                <select class="form-control" name="parent" id="parent">
                    <option value="null">No parent</option>
                    <?php foreach ($parents as $parent): ?>
                        <option value="<?php echo $parent["id"]; ?>">
                            <?php echo $parent["caption"]; ?><?php echo $parent["to"] ? " - " . $parent["to"] : ""; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-5 form-group">
                <label for="to">To</label>
                <input id="to" name="to" type="text" class="form-control">
            </div>

            <div class="col-1">
                <div class="form-check form-switch ps-0">
                    <label class="d-block" for="drop">Drop</label>
                    <input class="form-check-input rounded-pill ms-0 form-control w-100 mt-0" type="checkbox"
                           role="switch" name="drop" id="drop">
                </div>
            </div>

            <div class="col-md-1 form-group">
                <label for="level">Level</label>
                <input id="level" name="level" type="number" min="1" value="1" class="form-control">
            </div>
            <div class="col-md-1 form-group">
                <label for="position">Position</label>
                <input id="position" name="position" type="number" min="1" value="1" class="form-control">
            </div>
            <div class="col-md-2 form-group">
                <label for="lang">Language</label>
                <select class="form-control" name="lang" id="parent">
                    <option value="srb">SRB</option>
                    <option value="en">EN</option>
                </select>
            </div>
            <div class="col flex-grow-1 d-flex align-items-end form-group">
                <button class="btn btn-primary form-control">Add</button>
            </div>
        </form>
    </div>
</div>

<div class="card p-2">
    <div>
        <a href="/navbar?lang=srb"><img src="/assets/images/srb.svg" alt=""></a>
        <a href="/navbar?lang=en"><img src="/assets/images/en.svg" alt=""></a>
    </div>
</div>
<div class="card p-2">
    <table class="">
        <thead>
        <tr>
            <th class="fw-bold">Caption</th>
            <th class="fw-bold">Parent</th>
            <th class="fw-bold">To</th>
            <th class="fw-bold">Drop</th>
            <th class="fw-bold">Level</th>
            <th class="fw-bold">Position</th>
            <th class="fw-bold">Update</th>
            <th class="fw-bold">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php echo buildMenuTable($menu, $parents) ?>
        </tbody>

    </table>
</div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
