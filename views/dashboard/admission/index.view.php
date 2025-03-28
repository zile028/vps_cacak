<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<div class="card p-2">
    <div class="d-flex justify-content-between align-content-center">
        <h2>Upis</h2>
        <div class="d-flex gap-2">
            <a class="btn btn-primary d-flex justify-content-center align-items-center"
               href="/dashboard/admission/create?lang=srb">
                <i class="mdi mdi-plus-box font-24 lh-1"></i>SRB</a>
            <a class="btn btn-primary d-flex justify-content-center align-items-center"
               href="/dashboard/admission/create?lang=en">
                <i class="mdi mdi-plus-box font-24 lh-1"></i>EN</a>
        </div>
    </div>
</div>


<div class="card p-2">
    <?php foreach ($nivoStudija as $lang => $nivoi): ?>

        <div class="bg-dark text-white rounded-2 p-1">
            <h4 class="text-uppercase lh-1 m-0"><?php echo $lang; ?></h4>
        </div>
        <div class="py-2">
            <?php foreach ($nivoi as $nivo): ?>
                <div class="alert alert-dark py-1 px-0 mb-1">
                    <h5 class="ms-3 lh-1 m-0 p-2"><?php echo $nivo->title; ?></h5>
                </div>
                <?php if (isset($uslovi[$nivo->id])): ?>
                    <div class="accordion accordion-flush mb-3 ps-3" id="accordionFlushExample">
                        <?php foreach ($uslovi[$nivo->id] as $uslov): ?>
                            <div class="accordion-item mb-1">
                                <div class="accordion-header alert alert-dark m-0 border-1 p-1 d-flex gap-1 align-items-center justify-content-between">
                                    <form action="/dashboard/admission/requirement/priority/<?php echo $uslov->id; ?>"
                                          class="d-flex" method="post">
                                        <input type="hidden" name="_method" value="patch">
                                        <input name="prioritet" class="form-control p-1" style="width: 45px"
                                               type="number" value="<?php echo $uslov->prioritet; ?>">
                                        <button class="btn btn-sm btn-primary"><i class="mdi mdi-check"></i></button>
                                    </form>
                                    <h6 class="w-100 m-0"
                                        id="flush-heading-<?php echo $uslov->id; ?>">
                                        <button class="accordion-button collapsed border-0 p-0" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse-<?php echo $uslov->id; ?>"
                                                aria-expanded="false"
                                                aria-controls="flush-collapse-<?php echo $uslov->id; ?>">
                                            <?php echo $uslov->title; ?>
                                        </button>
                                    </h6>
                                </div>
                                <div id="flush-collapse-<?php echo $uslov->id; ?>"
                                     class="accordion-collapse collapse"
                                     aria-labelledby="flush-heading-<?php echo $uslov->id; ?>"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?php echo $uslov->content ?>
                                        <div class="accordion_footer alert alert-dark p-1 d-flex gap-1 justify-content-between">
                                            <a class="btn btn-sm btn-warning"
                                               href="/dashboard/admission/requirement/<?php echo $uslov->id ?>">Измена</a>
                                            <form action="/dashboard/admission/requirement/<?php echo $uslov->id; ?>"
                                                  method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="btn btn-sm btn-danger">Обриши</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    <?php endforeach; ?>

</div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>

