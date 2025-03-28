<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4>ПРЕДМЕТИ</h4>
<?php require_once "navbar.php" ?>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<?php if (count($predmeti) > 0): ?>
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
                    <tr>
                        <th>Р.Б.</th>
                        <th>Шифра</th>
                        <th>Предмет</th>
                        <th>П</th>
                        <th>В</th>
                        <th>ЕСПБ</th>
                        <th>N.P.</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($predmeti as $index => $predmet): ?>
                        <tr>
                            <td style="width: 100px">
                                <?php if (isset($predmet->redniBroj)): ?>
                                    <form action="/dashboard/studije/sp/<?php echo $sp->id; ?>/predmet/<?php echo $predmet->id ?>/order"
                                          class="d-flex"
                                          method="post">
                                        <input type="hidden" name="_method" value="patch">
                                        <input class="form-control form-select-sm text-center"
                                               type="text" name="order"
                                               value="<?php echo $predmet->redniBroj; ?>" min="1">
                                        <button class="btn btn-sm btn-primary"><i
                                                    class="fas fa-check"></i></button>
                                    </form>


                                <?php else: ?>
                                    <?php echo $index + 1; ?>
                                <?php endif; ?>
                            </td>
                            <td class="">
                                <?php echo $predmet->sifra; ?>
                            </td>
                            <td class=""><?php echo $predmet->predmet; ?></td>

                            <td class=""><?php echo $predmet->predavanja; ?></td>
                            <td class=""><?php echo $predmet->vezbe; ?></td>
                            <td class=""><?php echo $predmet->espb; ?></td>
                            <td class="text-center">
                                <?php if (isset($predmet->plan)): ?>
                                    <a class="btn btn-sm btn-success text-white" target="_blank"
                                       href="<?php uploadPath
                                       ($predmet->plan); ?>"><i
                                                class="mdi mdi-file-multiple"
                                        ></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-warning"
                                       href="/dashboard/study/course/<?php echo $predmet->id; ?>">
                                        <i class="mdi mdi-settings"></i>
                                    </a>
                                    <form action="/dashboard/study/course/<?php echo $predmet->id ?>"
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- END table -->
    <!-- ============================================================== -->
<?php else: ?>
    <p>Тренутно нема предмета.</p>
<?php endif; ?>
<!--  -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
