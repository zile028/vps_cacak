<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ОБРАСЦИ - УПУТСТВА</h4>
    <div class="card">
        <form action="/dashboard/preuzimanja" class="card-body row gap-2" method="post"
              enctype="multipart/form-data">

            <div class="row col-lg-6 col-md-12">
                <label for="fileName">Назив:</label>
                <input class="form-control"
                       id="fileName"
                       type="text"
                       name="fileName">
            </div>

            <div class="row col-lg-6 col-md-12">
                <label for="mediaID">Придружи фајл:</label>
                <select class="form-control" name="mediaID" id="mediaID">
                    <?php foreach ($media as $type => $item) : ?>
                        <optgroup label="<?php echo $type; ?>">
                            <?php foreach ($item as $file) : ?>
                                <option value="<?php echo $file->id; ?>">
                                    <?php echo $file->fileName; ?>
                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row col-lg-6 col-md-12">
                <label for="kategorijaID">Категорија (опционо):</label>
                <input class="form-control"
                       id="kategorijaID"
                       type="text" list="kategorija"
                       name="kategorija">
                <datalist id="kategorija">
                    <?php foreach ($kategorije as $kategorija) : ?>
                        <option value="<?php echo $kategorija; ?>"><?php echo $kategorija;
                            ?></option>
                    <?php endforeach; ?>
                </datalist>

            </div>
            <div class="row col-lg-6 align-content-end justify-content-end gap-2">
                <div class="row col-md col-md">
                    <span style="font-weight: 600;" class="mb-1 col-12">Додај фајл: (приоритет
                        има прикачен фајл)</span>
                    <label for="attachment" class="btn btn-warning mb-0">Одабери фајл</label>
                    <input class="d-none"
                           id="attachment"
                           type="file"
                           name="attachment">
                </div>
                <button class="btn btn-primary w-auto align-self-end">ДОДАЈ</button>
            </div>
        </form>
    </div>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

<?php if (count($dokumenta) > 0): ?>
    <div class="card">
        <div class="card-body">
            <!-- ============================================================== -->
            <!-- START table -->
            <!-- ============================================================== -->
            <div class="table-responsive">
                <table
                        id="zero_config"
                        class="table table-striped table-bordered"
                >
                    <thead>
                    <tr>
                        <th>РБ</th>
                        <th>Назив</th>
                        <th>Датум објаве</th>
                        <th>Објавио</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dokumenta as $kategorije => $kategorija) : ?>
                        <tr>
                            <td colspan="5">
                                <h5><?php echo $kategorije; ?></h5>

                            </td>
                        </tr>

                        <?php $i = 0;
                        foreach ($kategorija as $item):$i++ ?>
                            <tr>
                                <td style="width: 30px">
                                    <a href="/dashboard/dokument/<?php echo $item->id; ?>">
                                        <?php echo $i; ?>
                                    </a></td>
                                <td>
                                    <a href="<?php echo uploadPath($item->storeName); ?>"
                                       target="_blank">
                                        <?php echo $item->fileName; ?>
                                    </a>
                                </td>
                                <td><?php dateDDMMYYY($item->createdAt); ?></td>
                                <td class="d-flex gap-1">
                                    <form action="/dashboard/preuzimanja/<?php echo $item->id; ?>"
                                          method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="storeName" value="<?php echo
                                        $item->storeName; ?>">
                                        <button class="btn btn-sm btn-danger"><i
                                                    class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                                <td></td>
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

<?php else: ?>
    <p>Тренутно нема докумената.</p>
<?php endif; ?>


<?php require_once __DIR__ . "/../partials/bottom.php"; ?>