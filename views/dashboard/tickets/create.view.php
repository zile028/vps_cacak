<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <div class="card p-2">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h1>Novi tiket</h1>
            <!--            <a class="btn btn-primary" href="/tickets/create"><i class="mdi mdi-plus"></i></a>-->
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <form class="col-md-6 offset-md-3" action="/tickets/create" method="post">
                <div class="form-group">
                    <label for="title">Naslov</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Naslov">
                </div>

                <div class="form-group">
                    <label for="description">Opis</label>
                    <?php quillEditor(null, "description"); ?>
                </div>
                <button class="btn btn-primary">Kreiraj</button>
            </form>
        </div>

    </div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>