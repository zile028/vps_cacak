<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card">
    <div class="card-body">
        <h3>Додај у <?php echo $odbor->odbor; ?></h3>
        <form action="/dashboard/staff/category/<?php echo $odbor->id; ?>" class="row" method="post">
            <input type="hidden" name="_method" value="put">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="osobljeID">Запослени</label>
                        <select id="osobljeID" class="form-control" name="osobljeID">
                            <?php foreach ($osoblje as $osoba) : ?>
                                <option value="<?php echo $osoba->id; ?>">
                                    <?php echo $osoba->firstName; ?>
                                    <?php echo $osoba->lastName; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="pozicija">Позиција</label>
                            <a class="btn btn-sm rounded-pill btn-primary py-0"
                               href="/dashboard/staff/category/<?php echo $odbor->id; ?>/position">
                                <i class="mdi mdi-plus"></i> Позиција</a>
                        </div>
                        <select id="pozicija" class="form-control"
                                name="pozicija"
                                placeholder="Одабери или унеси позицију">

                            <?php foreach ($pozicije as $pozicija) : ?>
                                <option value="<?php echo $pozicija->id; ?>">
                                    <?php echo $pozicija->pozicija; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md d-flex align-items-end mb-3">
                    <button class="btn btn-primary form-control" type="submit">
                        ДОДАЈ ЗАПОСЛЕНОГ
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
                    <th></th>
                    <th>Име и презиме</th>
                    <th>Звање</th>
                    <th>Приоритет</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pozicije as $pozicija): ?>
                    <?php if (isset($clanovi[$pozicija->pozicija])): ?>
                        <tr>
                            <td colspan="6"><?php echo $pozicija->pozicija; ?></td>
                        </tr>
                        <?php foreach ($clanovi[$pozicija->pozicija] as $index => $clan) : ?>
                            <tr id="<?php echo $clan->id; ?>">
                                <td style="width: 1%"><?php echo $index + 1; ?></td>
                                <td style="width: 30px">
                                    <img style="height: 30px; width: 30px; object-fit: cover"
                                         class="rounded-circle"
                                         src="<?php uploadPath($clan->image); ?>"
                                         alt="<?php echo $clan->fullName; ?>">
                                </td>
                                <td><?php echo $clan->fullName; ?></td>
                                <td><?php echo $clan->rank; ?></td>
                                <td style="width: 1%">
                                    <form
                                            action="/dashboard/staff/category/<?php echo $odbor->id; ?>/<?php echo $clan->osobljeID; ?>"
                                            class="d-flex" method="post">
                                        <input type="hidden" name="_method" value="patch">
                                        <input style="width: 70px;" class="form-control" type="number" name="prioritet"
                                               min="0" value="<?php echo $clan->prioritet; ?>">
                                        <button class="btn btn-sm btn-primary" type="submit"><i
                                                    class="mdi mdi-check"></i></button>
                                    </form>

                                </td>
                                <td>
                                    <form action="/dashboard/staff/category/member/<?php echo $clan->id;
                                    ?>" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn btn-danger"><i class="mdi
                                    mdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
