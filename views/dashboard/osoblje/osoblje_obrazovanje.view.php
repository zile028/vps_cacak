<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

<div class="card">
    <div class="card-body">
        <h3>Образовање - <?php echo $zaposleni->firstName . " " . $zaposleni->lastName; ?></h3>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/dashboard/staff/education/<?php echo $zaposleni->id; ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tema">Тема</label>
                        <textarea class="form-control" style="resize: none" name="tema" id="tema" cols="30" rows="3"
                                  required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ustanova">Установа</label>
                        <textarea class="form-control" style="resize: none" name="ustanova" id="tema" cols="30" rows="3"
                                  required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2">
                        <label for="godina">Година</label>
                        <input id="godina" class="form-control" name="godina" type="text"
                               pattern="(u toku|19[5-9][0-9]|[2-9][0-9][0-9][0-9])" required
                               placeholder='Унети годину од 1950 па навише или "u toku"'
                        >
                    </div>

                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary">ДОДАЈ</button>
                </div>
            </div>

        </form>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>Година</th>
                <th>Тема</th>
                <th>Установа</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($obrazovanje as $item): ?>
                <tr>
                    <td><?php echo $item->godina; ?></td>
                    <td><?php echo $item->tema; ?></td>
                    <td><?php echo $item->ustanova; ?></td>
                    <td>
                        <form action="/dashboard/staff/education/<?php echo $item->id ?>" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
