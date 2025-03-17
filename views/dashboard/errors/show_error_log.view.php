<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>


<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Errors Log</h1>
        <form action="/errors" method="post">
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-sm btn-danger">Obriši sve</button>
        </form>
    </div>
</div>
<div class="card">
    <?php foreach ($errors as $index => $error): ?>
        <?php $err = explode("##", $error); ?>
        <form class="alert alert-danger" role="alert" action="/errors/<?php echo $index; ?>" method="post">
            <input type="hidden" name="_method" value="delete"/>
            <h4 class="alert-heading"><?php echo $err[2]; ?></h4>
            <p>
                <?php echo $err[1]; ?>
            </p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">
                    <?php echo $err[0]; ?>
                </p>
                <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete-forever"></i></button>
            </div>
        </form>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
