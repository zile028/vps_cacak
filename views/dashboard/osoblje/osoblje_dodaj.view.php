<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="card">
    <form class="form-horizontal" action="/dashboard/staff/add" method="post" enctype="multipart/form-data">
        <?php if (isset($staff, $lang)): ?>
            <input type="hidden" name="rel_lang" value="<?php echo $lang ?>">
            <input type="hidden" name="rel_id" value="<?php echo $staff->id ?>">
        <?php endif; ?>
        <div class="card-body">
            <h4 class="card-title">Особље/Додавање</h4>
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
                                        value="<?php echo $staff->email ?? null; ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                    for=""
                                    class="col-sm-3 text-end control-label col-form-label"
                            >Jezik</label
                            >
                            <div class="col-sm-9 d-flex gap-3">
                                <?php if (isset($staff, $lang)): ?>
                                    <div class="form-group m-0 d-flex align-items-center gap-1">
                                        <input
                                                type="hidden"
                                                id="langSrb"
                                                class="cursor-pointer"
                                                placeholder="Lang"
                                                name="lang"
                                                value="<?php echo $lang; ?>"
                                        />
                                        <label for="langSrb" class="m-0 cursor-pointer">
                                            <img class="langIcon langIcon-sm"
                                                 src="/assets/images/<?php echo $lang; ?>.svg" alt="">
                                        </label>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group m-0 d-flex align-items-center gap-1">

                                        <input
                                                type="radio"
                                                id="langSrb"
                                                class="cursor-pointer"
                                                placeholder="Lang"
                                                name="lang"
                                                value="srb"
                                                checked
                                        />
                                        <label for="langSrb" class="m-0 cursor-pointer">
                                            <img class="langIcon langIcon-sm" src="/assets/images/srb.svg" alt="">
                                        </label>
                                    </div>
                                    <div class="form-group m-0 d-flex align-items-center gap-1">
                                        <input
                                                type="radio"
                                                class="cursor-pointer"
                                                id="langEn"
                                                placeholder="Lang"
                                                name="lang"
                                                value="en"
                                        />
                                        <label for="langEn" class="m-0 cursor-pointer">
                                            <img class="langIcon langIcon-sm" src="/assets/images/en.svg" alt="">
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div>
                            <img id="imagePreview" class="img-fluid" style="height: 300px"
                                 src="<?php
                                 uploadPath($staff->image ?? $media[0]->storeName);
                                 ?>"
                                 alt="<?php echo $staff->image ?? $media[0]->storeName; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="featuredImage">Насловна слика</label>
                            <?php if (count($media) > 0): ?>
                                <select id="featuredImage" class="form-control select2" name="imageID">
                                    <?php foreach ($media as $image) : ?>
                                        <option value="<?php echo $image->id; ?>"
                                            <?php echo isset($staff->imageID) && $staff->imageID === $image->id ? "selected" : null ?>
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
                                <?php quillEditor("", "description"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                        Додај
                    </button>
                </div>
            </div>
    </form>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
