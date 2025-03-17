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
                        <form class="row p-3" action="/study/level" method="post">
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
                                <label for="description">Опис</label>
                                <?php quillEditor(null, "description"); ?>
                            </div>
                            <div class="col-md-8">
                                <label for="image">Истакнута слика</label>
                                <input class="form-control" id="image" name="image" type="text">
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
<?php foreach ($nivoiStudija as $lang => $nivoi): ?>
    <div class="card">
        <div class="card-header alert alert-danger">
            <h6 class="text-uppercase lh-1 m-0"><?php echo $lang; ?></h6>
        </div>
        <?php foreach ($nivoi as $nivo): ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid" src="<?php echo $nivo->image; ?>" alt="">
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
                <a class="btn btn-sm btn-warning" href="/study/level/<?php echo $nivo->id; ?>">Edit</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>