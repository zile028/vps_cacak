<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>СТУДИЈЕ</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
<?php require_once "navbar.php" ?>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- START table -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                >
                    <thead>
                    <tr class="text-center">
                        <th>R.B.</th>
                        <th>Studijski program</th>
                        <th>Trajanje</th>
                        <th>ESPB</th>
                        <th>Akreditovan</th>
                        <th>Lang</th>
                        <th>Aktivan</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($studije as $nivo => $program): ?>
                        <tr>
                            <th colspan="8">
                                <?php echo $nivo; ?>
                            </th>
                        </tr>
                        <?php foreach ($program as $index => $sp): ?>
                            <tr id="<?php echo $sp->id; ?>">
                                <td style="width: 30px">
                                    <a href="/study/program/<?php echo $sp->id; ?>">
                                        <?php echo $index + 1; ?>
                                    </a>
                                </td>
                                <td class="">
                                    <a href="/study/program/<?php echo $sp->id; ?>">
                                        <?php echo $sp->naziv . " " . $sp->modul; ?>
                                    </a>
                                    <p>Broj predmeta: <?php echo $sp->predmetCount; ?></p>
                                </td>
                                <td><?php echo $sp->trajanje; ?></td>
                                <td><?php echo $sp->espb; ?></td>
                                <td><?php echo $sp->akreditovan; ?></td>
                                <td><?php echo $sp->lang; ?></td>
                                <td>
                                    <form
                                            action="/study/active/<?php echo $sp->id; ?>"
                                            method="post"
                                    >
                                        <input type="hidden" name="_method" value="patch">
                                        <?php if ($sp->aktivan): ?>
                                            <button class="btn bnt-sm btn-success w-100">Деактивирај</button>
                                        <?php else: ?>
                                            <button class="btn bnt-sm btn-warning w-100 ">Активирај</button>
                                        <?php endif; ?>

                                    </form>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-sm btn-warning"
                                           href="/study/program/<?php echo $sp->id; ?>"><i
                                                    class="mdi mdi-wrench"></i></a>
                                        <form action="/study/program/<?php echo $sp->id; ?>"
                                              method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <button class="btn btn-sm btn-danger"><i
                                                        class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- END table -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>