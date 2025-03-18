<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card">
    <div class="card-body">
        <h3>Додавање категорије</h3>

        <form action="/dashboard/staff/category/add" class="row" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="odbor">Нова кетегорија</label>
                        <input class="form-control" type="text" name="odbor">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="lang">Језик</label>
                        <select id="lang" class="form-control" type="text" name="lang">
                            <option value="srb" selected>SRB</option>
                            <option value="en">EN</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="prioritet">Приоритет</label>
                        <input id="prioritet" class="form-control" type="number" min="1" name="prioritet" value="1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" class="form-control" type="text" name="slug">
                    </div>
                </div>
                <div class="col-md d-flex align-items-end">
                    <button class="btn btn-primary form-control mb-3 nowrap" type="submit">ДОДАЈ КАТЕГОРИЈУ
                    </button>
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
                <th>Категорија</th>
                <th>Приоритет</th>
                <th>Slug</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($odbori as $lang => $odbor): ?>
                <tr>
                    <td class="text-uppercase bg-secondary fw-bold text-light" colspan="5"><?php echo $lang; ?></td>
                </tr>
                <?php foreach ($odbor as $item): ?>
                    <tr>
                        <td><?php echo $item->odbor; ?></td>
                        <td>
                            <form
                                    action="/dashboard/staff/category/priority/<?php echo $item->id; ?>"
                                    class="d-flex" method="post">
                                <input type="hidden" name="_method" value="patch">
                                <input style="width: 50px;" class="form-control" type="number" name="prioritet" min="0"
                                       value="<?php echo $item->prioritet; ?>">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="mdi mdi-check"></i>
                                </button>
                            </form>
                        </td>
                        <td><?php echo $item->slug; ?></td>
                        <td>
                            <a class="btn btn-sm rounded-pill btn-primary"
                               href="/dashboard/staff/category/<?php echo $item->id; ?>/position">
                                <i class="mdi mdi-plus"></i> Позиција (<?php echo $item->pozicije; ?>)</a>
                        </td>
                        <td>
                            <form action="/dashboard/staff/category/<?php echo $item->id ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>

