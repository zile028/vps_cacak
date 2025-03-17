<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card container-fluid p-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-danger" role="alert">
                <h4>ERROR</h4>
                <p><?php echo $error->getMessage(); ?></p>
                <hr>
                <p>Kada dođe do bilo kakve greške ili problema molim vas da istu i prijavite klikom na dugme </p>
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <a class="btn btn-primary flex-grow-1" href="<?php echo $cbUrl; ?>">Nazad</a>
                    <form class="flex-grow-1" action="/tickets/create" method="post">
                        <input type="hidden" name="title" value="Prijava greške">
                        <textarea name="description" style="display: none;">
            <p>Došlo je do greške na stranici <?php echo $cbUrl; ?></p>
            <p>Metoda: <?php echo $_SERVER["REQUEST_METHOD"]; ?></p>
            <p>Vreme: <?php echo fullDateTime(); ?></p>
            <p>Greška koja se dobije je:</p>
            <p><?php echo $error->getMessage(); ?></p>
        </textarea>
                        <button class="btn btn-warning w-100">Prijavi grešku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
