<?php require_once __DIR__ . "/../partials/top.php"; ?>
    <style>
        #zero_config tr td {
            vertical-align: middle;
        }
    </style>
    <!--  -->
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="/staff">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">НАЗАД</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="/staff/add">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">ДОДАЈ НОВОГ</h6>
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
            <h5 class="card-title">Osoblje</h5>
            <div class="table-responsive">

                <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                >
                    <thead>
                    <tr>
                        <th></th>
                        <th>Име и Презиме</th>
                        <th>Звање</th>
                        <th>E-mail</th>
                        <th>Образовање</th>
                        <th>Језик</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($osoblje as $lang => $zaposleni): ?>
                        <tr>
                            <td colspan="6"><?php echo $lang; ?></td>
                            <td><?php echo count($zaposleni); ?></td>
                        </tr>
                        <?php foreach ($zaposleni as $item): ?>
                            <?php $relation = json_decode($item->translate_relation, true) ?? [] ?>
                            <tr>
                                <td style="width: 30px"><a
                                            href="/dashboard/osoblje/<?php echo $item->id; ?>">
                                        <img style="height: 30px; width: 30px; object-fit: cover"
                                             class="rounded-circle"
                                             src="<?php empty($item->image) ? uploadPath("avatar.png") :
                                                 uploadPath($item->image); ?>"
                                             alt="<?php echo $item->firstName; ?>">
                                    </a></td>
                                <td>
                                    <input type="checkbox" id="<?php echo "fullName" . $item->id; ?>"
                                           value="<?php echo $item->id ?>" data-lang="<?php echo $item->lang; ?>"
                                    >
                                    <label for="<?php echo "fullName" . $item->id; ?>">
                                        <?php echo $item->firstName; ?>
                                        <?php echo $item->lastName; ?>
                                    </label>
                                </td>
                                <td><?php echo $item->rank; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td>
                                    <?php if (isset($item->cv)): ?>
                                        <a class="btn btn-sm btn-warning"
                                           href="<?php uploadPath($item->cv); ?>"
                                           target="_blank">CV</a>
                                    <?php endif; ?>
                                    <a class="btn btn-sm rounded-pill btn-primary"
                                       href="/staff/education/<?php echo $item->id; ?>">
                                        <i class="mdi mdi-plus"></i> Образовање</a>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <?php if ($item->lang === "srb"): ?>
                                            <a href="/staff/edit/<?php echo $item->id; ?>"><i class="mdi mdi-settings"></i>
                                                <img src="/assets/images/srb.svg" alt="">
                                            </a>
                                            <?php if (isset($relation) && array_key_exists("en", $relation)): ?>
                                                <a href="/staff/edit/<?php echo $item->id; ?>">
                                                    <i class="mdi mdi-settings"></i>
                                                    <img src="/assets/images/en.svg" alt="">
                                                </a>
                                            <?php else: ?>
                                                <a class="d-flex align-items-center gap-1" href="/staff/add?lang=en&id=<?php echo $relation->srb ?? $item->id; ?>">
                                                    <i class="mdi mdi-plus-box"></i>
                                                    <img src="/assets/images/en.svg" alt="">
                                                </a>
                                            <?php endif; ?>

                                        <?php elseif ($item->lang === "en"): ?>
                                            <a href="/staff/edit/<?php echo $item->id; ?>"><i class="mdi mdi-settings"></i>
                                                <img src="/assets/images/en.svg" alt="">
                                            </a>
                                            <?php if (isset($relation) && array_key_exists("srb", $relation)): ?>
                                                <a href="/staff/edit/<?php echo $item->id; ?>">
                                                    <i class="mdi mdi-settings"></i>
                                                    <img src="/assets/images/srb.svg" alt="">
                                                </a>
                                            <?php else: ?>
                                                <a class="d-flex align-items-center gap-1" href="/staff/add?lang=en&id=<?php echo $relation->srb ?? $item->id; ?>">
                                                    <i class="mdi mdi-plus-box"></i>
                                                    <img src="/assets/images/srb.svg" alt="">
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <td class="d-flex gap-1">
                                    <form action="/staff/<?php echo $item->id; ?>"
                                          method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-sm btn-danger"><i
                                                    class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <button id="relateBtn" class="btn btn-primary" onclick="createRelation()">ПОВЕЖИ</button>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- END table -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <script>
        function createRelation() {
            let inputs = document.querySelectorAll("input[type='checkbox']:checked");
            let relation = {};
            inputs.forEach((el) => {
                relation[el.getAttribute("data-lang")] = parseInt(el.value);
            });

            fetch("/staff/relation", {
                method: "put",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify(relation)
            })
                .then((res) => res.json())
                .then((data) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    </script>
    <!--  -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>