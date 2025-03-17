<?php require_once "partials/top.php" ?>
<?php require_once "partials/sidebar.php" ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <h4>Ценовник</h4>
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="/dashboard/cenovnik/dodaj">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">DODAJ</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
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
                    <tr>
                        <th>РБ</th>
                        <th>Услуга</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($cenovnik as $item):$i++ ?>
                        <tr>
                            <td style="width: 30px">
                                <a href="/dashboard/cenovnik/<?php echo $item["id"]; ?>">
                                    <?php echo $i; ?>
                                </a></td>
                            <td>
                                <?php echo $item["service"]; ?>
                            </td>
                            <td><?php echo $item["price"]; ?></td>
                            <td class="d-flex gap-1">
                                <a class="btn btn-sm btn-info"
                                   href="/dashboard/cenovnik/<?php echo $item["id"]; ?>"><i
                                            class="mdi mdi-account-card-details"></i></a>
                                <form action="/dashboard/cenovnik/<?php echo $item["id"]; ?>"
                                      method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-sm btn-danger"><i
                                                class="mdi mdi-delete"></i>
                                    </button>
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
    <!-- END table -->
    <!-- ============================================================== -->
<?php require_once "partials/bottom.php" ?>