<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card">
    <div class="card-body">
        <h3>Додај у <?php echo $odbor->odbor; ?></h3>
        <form action="/dashboard/staff/category/<?php echo $odbor->id; ?>/position" class="row" method="post">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="pozicija">Позиција</label>
                        <input id="pozicija" type="text" class="form-control" name="pozicija"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="prioritet">Приоритет</label>
                        <input id="prioritet" type="number" min="1" value="1" class="form-control" name="prioritet"/>
                    </div>
                </div>
                <div class="col-md d-flex align-items-end mb-3">
                    <button class="btn btn-primary form-control" type="submit">ДОДАЈ ПОЗИЦИЈУ
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- ============================================================== -->
<!-- Start Table Content -->
<!-- ============================================================== -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table
                    id="zero_config"
                    class="table table-striped table-bordered"
            >
                <thead>
                <tr>
                    <th>РБ</th>
                    <th>Позиција</th>
                    <th>Приоритет</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pozicije as $index => $pozicija) : ?>
                    <tr id="<?php echo $pozicija->id; ?>">
                        <td style="width: 1%"><?php echo $index + 1; ?></td>
                        <td><?php echo $pozicija->pozicija; ?></td>
                        <td style="width: 1%">
                            <form
                                    action="/dashboard/staff/category/position/priority/<?php echo $pozicija->id; ?>"
                                    class="d-flex" method="post">
                                <input type="hidden" name="_method" value="patch">
                                <input style="width: 50px;" class="form-control" type="number" name="prioritet" min="0"
                                       value="<?php echo $pozicija->prioritet; ?>">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="mdi mdi-check"></i>
                                </button>
                            </form>

                        </td>
                        <td class="text-end">
                            <form action="/dashboard/staff/category/position/<?php echo $pozicija->id;
                            ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn btn-danger"><i class="mdi
                                    mdi-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Table Content -->
<!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
