<?php require_once __DIR__ . '/../partials/top.php'; ?>
    <!--  -->
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
    <style>
        td {
            vertical-align: middle;
            width: 1%;
            text-wrap: nowrap;
        }
    </style>
    <!-- =============================== =============================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>АЛУМНИ КЛУБ</h4>
    <div class="card p-3">
        <form action="/dashboard/alumni" class="row" method="post" enctype="multipart/form-data">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <label for="firstName">Име</label>
                <input class="form-control" id="firstName" type="text" name="firstName"
                       placeholder="Име">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <label for="lastName">Презиме</label>
                <input class="form-control" id="lastName" type="text" name="lastName"
                       placeholder="Презиме">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <label for="spID">Студијски програм</label>
                <select name="spID" id="spID" class="form-control">
                    <?php foreach ($studije as $nivo => $studijski) : ?>
                        <optgroup label="<?php echo $nivo; ?>">
                            <?php foreach ($studijski as $sp) : ?>
                                <option value="<?php echo $sp->id; ?>"><?php echo $sp->spNaziv;
                                    ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                    <?php endforeach; ?>

                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <label for="godina">Година дипломирања</label>
                <input class="form-control" id="godina" type="text"
                       pattern="[1-2][0-9][0-9][0-9]" name="diplomirao"
                       placeholder="0000"
                       inputmode="numeric"
                >
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6">
                <label for="tema">Тема</label>
                <input class="form-control" id="tema" type="text"
                       name="tema"
                       placeholder="Тема"
                >
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <label for="poslodavac">Послодавац</label>
                <input list="listPoslodavac" class="form-control" id="poslodavac" type="text"
                       name="poslodavac"
                       placeholder="Послодавац">
                <datalist id="listPoslodavac">
                    <?php foreach ($poslodavci as $poslodavac) : ?>
                        <option value="<?php echo $poslodavac->poslodavac; ?>"></option>
                    <?php endforeach; ?>
                </datalist>


            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <label for="posao">Посао</label>
                <input class="form-control" id="posao" type="text" name="posao"
                       placeholder="Посао">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <label for="social">Социјалан мрежа</label>
                <input class="form-control" id="social" type="url" name="social"
                       placeholder="Социјалан мрежа">
            </div>

            <div class="col-12 mt-3">
                <div class="row mx-0 gap-2">
                    <label class="btn btn-warning col-md-auto m-0" for="profile">Додај
                        нову
                        слику</label>
                    <input type="file" class="d-none" name="image" id="profile">
                    <select class="form-control col-md" name="mediaID" id="">
                        <?php foreach ($media as $image) : ?>
                            <option value="<?php echo $image->id; ?>"><?php echo
                                $image->fileName; ?></option>
                        <?php endforeach; ?>

                    </select>

                    <button class="btn btn-primary col-md-auto">Додај</button>
                </div>
            </div>
        </form>
    </div>

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
                        <th></th>
                        <th>Име и Презиме</th>
                        <th>Ниво</th>
                        <th>Дипломирао</th>
                        <th>Послодавац</th>
                        <th>Посао</th>
                        <th>Одобри</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($alumnisti as $item): ?>
                        <tr id="<?php echo $item->id; ?>">
                            <td style="width: 30px">
                                <a
                                        href="/dashboard/alumni/<?php echo $item->id; ?>">
                                    <img style="height: 30px; width: 30px; object-fit: cover"
                                         class="rounded-circle"
                                         src="<?php echo uploadPath($item->storeName); ?>"
                                         alt="<?php echo $item->firstName; ?>">
                                </a>
                            </td>
                            <td style="width: auto">
                                <?php echo $item->firstName; ?>
                                <?php echo $item->lastName; ?>
                            </td>
                            <td><?php echo $item->nivo; ?></td>
                            <td><?php echo $item->diplomirao; ?></td>
                            <td><?php echo $item->poslodavac; ?></td>
                            <td><?php echo $item->radnoMesto; ?></td>
                            <td>
                                <form action="/dashboard/alumni/status/<?php echo $item->id; ?>" method="post"
                                      class="d-flex justify-content-center align-items-center"
                                >
                                    <input type="hidden" name="_method" value="patch">
                                    <button style="height: 1em;width: 1em; font-size: 24px"
                                            class="btn text-primary m-0 p-0 lh-1">
                                        <?php if ($item->active): ?>
                                            <i class="mdi mdi-checkbox-marked-circle"></i>
                                        <?php else: ?>
                                            <i class="mdi mdi-checkbox-blank-circle-outline"></i>
                                        <?php endif; ?>
                                    </button>
                                </form>
                            </td>
                            <td class="d-flex gap-1 w-auto">
                                <a class="btn btn-sm btn-warning"
                                   href="/dashboard/alumni/<?php echo $item->id; ?>">
                                    <i class="mdi mdi-account-settings"></i>
                                </a>
                                <!---->
                                <form action="/dashboard/alumni/<?php echo $item->id; ?>"
                                      method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="mediaID" value="<?php echo $item->imageID; ?>">
                                    <input type="hidden" name="storeName" value="<?php echo $item->storeName; ?>">
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


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!--  -->
<?php require_once __DIR__ . '/../partials/bottom.php'; ?>