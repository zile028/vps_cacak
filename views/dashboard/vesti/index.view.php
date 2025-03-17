<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>РАСПОРЕД</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
<?php require_once "navbar.php" ?>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <!-- ============================================================== -->
        <!-- Start Pagination -->
        <!-- ============================================================== -->
        <?php view("partials/pagination", ["count" => $count, "cbUrl" => $cbUrl]) ?>
        <!-- ============================================================== -->
        <!-- End Pagination -->
        <!-- ============================================================== -->
        <form action="/news" class="d-flex align-items-center">
            <label class="m-0 me-2" for="search">Претрага</label>
            <input id="search" class="form-control" type="text" name="search">
        </form>
    </div>
    <!-- ============================================================== -->
    <!-- START table -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Вести</h5>
            <div class="table-responsive">
                <table
                        id=""
                        class="table table-striped table-bordered"
                >
                    <thead>
                    <tr>
                        <th></th>
                        <th>Наслов</th>
                        <th>Вест</th>
                        <th>Објављено</th>
                        <th>Lang</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($vesti as $item): ?>
                        <tr>
                            <td style="width: 30px"><a
                                        href="/news/edit/<?php echo $item->id; ?>">
                                    <img style="height: 30px; width: 30px; object-fit: cover"
                                         class="rounded-circle"
                                         src="
                                         <?php empty($item->storeName) ? uploadPath("vest_avatar.png") :
                                             uploadPath($item->storeName); ?>"
                                         alt="<?php echo $item->fileName; ?>">
                                </a></td>
                            <td>
                                <a href="/news/edit/<?php echo $item->id; ?>"><?php echo $item->naslov; ?></a>
                            </td>
                            <td><?php echo getExcerpt($item->description); ?></td>
                            <td>
                                <?php if (haveRole(ADMIN)): ?>
                                    <?php updateSingle("/news/publish/" . $item->id, "createdAt", dateForInput($item->createdAt, "Y-m-d"), "date"); ?>
                                <?php else: ?>
                                    <?php dateDDMMYYY($item->createdAt); ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php $relation = json_decode($item->translate_relation, true) ?? []; ?>
                                <?php if ($item->lang === "srb"): ?>
                                    <a href="/news/edit/<?php echo $item->id; ?>"><i class="mdi mdi-settings"></i>
                                        <img src="/assets/images/srb.svg" alt="">
                                    </a>
                                    <?php if (isset($relation) && array_key_exists("en", $relation)): ?>
                                        <a class="d-flex align-items-center gap-1"
                                           href="/news/edit/<?php echo $relation["en"]; ?>">
                                            <i class="mdi mdi-settings"></i>
                                            <img src="/assets/images/en.svg" alt="">
                                        </a>
                                    <?php else: ?>
                                        <a class="d-flex align-items-center gap-1"
                                           href="/news/add?lang=en&id=<?php echo $relation->srb ?? $item->id; ?>">
                                            <i class="mdi mdi-plus-box"></i>
                                            <img src="/assets/images/en.svg" alt="">
                                        </a>
                                    <?php endif; ?>
                                <?php elseif ($item->lang === "en"): ?>
                                    <a href="/news/edit/<?php echo $item->id; ?>"><i class="mdi mdi-settings"></i>
                                        <img src="/assets/images/en.svg" alt="">
                                    </a>
                                    <?php if (isset($relation) && array_key_exists("srb", $relation)): ?>
                                        <a class="d-flex align-items-center gap-1"
                                           href="/news/edit/<?php echo $relation["srb"]; ?>"><i
                                                    class="mdi mdi-settings"></i>
                                            <img src="/assets/images/srb.svg" alt="">
                                        </a>
                                    <?php else: ?>
                                        <a class="d-flex align-items-center gap-1"
                                           href="/news/add?lang=en&id=<?php echo $relation->en ?? $item->id; ?>"><i
                                                    class="mdi mdi-plus-box"></i>
                                            <img src="/assets/images/srb.svg" alt="">
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </td>

                            <td class="">
                                <form action="/news/<?php echo $item->id; ?>"
                                      method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="translate_relation"
                                           value="<?php echo htmlspecialchars($item->translate_relation) ?>">
                                    <button class="btn btn-sm btn-danger"><i
                                                class="mdi mdi-delete"></i>
                                    </button>
                                </form>
                                <?php foreach ($relation as $lang => $vestID): ?>
                                    <?php if ($item->lang !== $lang): ?>
                                        <form class="mt-2" action="/news/<?php echo $vestID; ?>"
                                              method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="translate_relation"
                                                   value="<?php echo htmlspecialchars($item->translate_relation) ?>">
                                            <button class="btn btn-sm btn-danger"><i
                                                        class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>