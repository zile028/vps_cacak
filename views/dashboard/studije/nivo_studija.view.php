<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>НИВО СТУДИЈА</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h5 class="accordion-header bg-white" id="flush-heading">
                    <button class="accordion-button collapsed bg-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
                        Додај ниво студија
                    </button>
                </h5>
                <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form class="row p-3" action="/dashboard/study/level/add" method="post">
                            <div class="col-md-6">
                                <label for="title">Назив</label>
                                <input class="form-control" id="title" name="title" type="text">
                            </div>
                            <div class="col-md-2">
                                <label for="slug">Slug</label>
                                <input class="form-control" id="slug" name="slug" type="text">
                            </div>
                            <div class="col-md-2">
                                <label for="lang">Језик</label>
                                <select class="form-control" id="lang" name="lang">
                                    <option value="srb">srb</option>
                                    <option value="en">en</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="lvl">Ниво</label>
                                <input class="form-control" id="lvl" name="lvl" type="number">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="description">Опис</label>
                                        <?php quillEditor("", "description"); ?>
                                    </div>
                                    <div class="col-md-4 flex-grow-1" style="height: 410px;">
                                        <div class="d-flex flex-column h-100">
                                            <div class="col-md-12 mb-3">
                                                <label for="image">Истакнута слика</label><br>
                                                <div class="select2-border">

                                                    <select class="select2 w-100" name="image" id="image"
                                                            data-image="preview">
                                                        <?php foreach ($images as $img): ?>
                                                            <option data-storeName="<?php echo uploadPath($img->storeName); ?>"
                                                                    value="<?php echo $img->id; ?>"><?php echo $img->fileName; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 border border-dark flex-grow-1 mb-3">
                                                <img id="imagePreview" class="img-cover"
                                                     src=""
                                                     alt="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                                <button class="btn btn-primary">Сачувај</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if (hasErrors()): ?>
    <div class="alert alert-danger mt-2" role="alert">
        <h4 class="alert-heading">Greška!</h4>
        <hr>
        <ul>
            <?php foreach (getFlashErrors() as $err): ?>
                <li><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<?php foreach ($nivoiStudija as $lang => $nivoi): ?>
    <div class="card">
        <div class="card-header alert alert-danger">
            <h6 class="text-uppercase lh-1 m-0"><?php echo $lang; ?></h6>
        </div>
        <?php foreach ($nivoi as $nivo): ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid" src="<?php echo uploadPath($nivo->thumbnail) ?>" alt="">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Назив:</p>
                                <p><?php echo $nivo->title ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Slug:</p>
                                <p><?php echo $nivo->slug ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Ниво:</p>
                                <p><?php echo $nivo->lvl ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php echo getExcerpt($nivo->description, 100); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer alert alert-primary d-flex justify-content-end">
                <a class="btn btn-sm btn-warning rounded-2"
                   href="/dashboard/study/level/<?php echo $nivo->id; ?>"><i class="mdi mdi-settings"></i></a>
                <form action="/dashboard/study/level/<?php echo $nivo->id; ?>" method="post">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-sm btn-danger ms-1 rounded-2"><i class="mdi mdi-delete"></i>
                    </button>

                </form>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>