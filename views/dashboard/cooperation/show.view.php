<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <style>
        .dataTables_filter {
            display: flex;
            justify-content: flex-end;
        }
    </style>

    <div class="card">
        <div class="d-flex gap-3 justify-content-between align-items-center w-100 p-3">
            <h1><?php echo translate($lang, "cooperation.$type") ?></h1>
            <a href="/cooperation/create/corporate" class="btn btn-primary">Dodaj</a>
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
                            <th>Logo</th>
                            <th>Naziv</th>
                            <th>Drzava</th>
                            <th>Sajt</th>
                            <th>Lang</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cooperations as $cooperation) : ?>
                            <tr style="<?php echo "border-top: 5px solid $cooperation->color"; ?>">
                                <td>
                                    <img height="40" src="<?php echo uploadPath($cooperation->storeName); ?>" alt="">
                                </td>
                                <td style="vertical-align: middle"><?php echo $cooperation->title; ?></td>
                                <td style="vertical-align: middle">
                                    <div class="d-flex gap-1 align-items-center">
                                        <img class="rounded-3"
                                             src="<?php echo uploadPath($cooperation->flagSM); ?>" alt="">
                                        <?php echo $cooperation->state; ?>
                                    </div>
                                </td>
                                <td style="vertical-align: middle">
                                    <a href="<?php echo $cooperation->url; ?>" target="_blank"><i
                                                class="mdi mdi-web"></i> <?php echo $cooperation->url; ?></a></td>
                                <td style="vertical-align: middle"><?php echo $cooperation->lang; ?></td>
                                <td style="vertical-align: middle">
                                    <div class="d-flex gap-1 align-items-center">

                                        <a class="btn btn-warning"
                                           href="/cooperation/edit/<?php echo $cooperation->id; ?>"><i
                                                    class="mdi mdi-settings"></i></a>
                                        <?php echo deleteFormTable("/cooperation/$cooperation->id") ?>
                                    </div>
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

    </div>


<?php require_once __DIR__ . "/../partials/bottom.php"; ?>