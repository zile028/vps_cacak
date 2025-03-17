<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4 class="card-title">Особље/Додавање</h4>
    <div class="card ">
        <form class="form-horizontal" action="/staff/edit/<?php echo $osoba->id; ?>"
              method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label
                    col-form-label">Име</label
                            >
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="fname"
                                        placeholder="Име"
                                        name="firstName"
                                        value="<?php echo $osoba->firstName; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                    for="lname"
                                    class="col-sm-3 text-end control-label col-form-label"
                            >Презиме</label
                            >
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="lname"
                                        placeholder="Презиме"
                                        name="lastName"
                                        value="<?php echo $osoba->lastName; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                    for="title"
                                    class="col-sm-3 text-end control-label col-form-label"
                            >Титула</label
                            >
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        placeholder="Титула"
                                        name="title"
                                        value="<?php echo $osoba->title; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                    for="zvanje"
                                    class="col-sm-3 text-end control-label col-form-label"
                            >Звање</label
                            >
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="zvanje"
                                        placeholder="Звање"
                                        name="rank"
                                        value="<?php echo $osoba->rank; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                    for="sufix"
                                    class="col-sm-3 text-end control-label col-form-label"
                            >Суфикс</label
                            >
                            <div class="col-sm-9">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="sufix"
                                        placeholder="Суфикс"
                                        name="sufix"
                                        title="Уколико је некоме потребно додати нешто након имена и презимена."
                                        value="<?php echo $osoba->sufix; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                    for="email"
                                    class="col-sm-3 text-end control-label col-form-label"
                            >Email</label
                            >
                            <div class="col-sm-9">
                                <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="E-mail"
                                        name="email"
                                        value="<?php echo $osoba->email; ?>"
                                />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div>
                            <img id="imagePreview" class="img-fluid" style="height: 300px"
                                 src="<?php empty($osoba->image) ? uploadPath("avatar.png") :
                                     uploadPath($osoba->image); ?>"
                                 alt="<?php echo $osoba->firstName; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="featuredImage">Насловна слика</label>
                            <?php if (count($media) > 0): ?>
                                <select id="featuredImage" class="form-control select2" name="imageID">
                                    <?php foreach ($media as $image) : ?>
                                        <option value="<?php echo $image->id; ?>"
                                            <?php echo $image->id === $osoba->imageID ? "selected" : "" ?>
                                                data-storeName="<?php uploadPath($image->storeName); ?>">
                                            (<?php echo $image->id; ?>) <?php echo $image->fileName; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                                <p class="text-danger fw-bold">
                                    Насловна слика је обавезна, додајте је
                                    прво у медијима како би сте је овде могли одабрати.
                                </p>
                            <?php endif; ?>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Биографија</h4>
                                <?php quillEditor($osoba->description, "description"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                        Сачувај измене
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>