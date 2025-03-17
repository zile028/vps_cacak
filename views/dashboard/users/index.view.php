<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>Корисници</h4>
    <!-- ============================================================== -->
    <!-- Start Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="/users/create">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">ДОДАЈ КОРИСНИКА</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Table Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php foreach ($users as $user) : ?>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="card card-hover">
                            <div class="card-header bg-dark text-white" style="border-radius: 10px 10px 0 0 ">
                                <h4 class="m-0"><?php echo $user->firstName . " " . $user->lastName; ?></h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Email: <?php echo $user->email; ?></li>
                                    <li class="list-group-item d-flex align-items-center"><span class="me-1">Role:</span>
                                        <?php updateSelect(
                                            "/users/" . $user->id, "role", $roles, $user->role); ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <?php echo deleteForm("/users/" . $user->id); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Table Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>