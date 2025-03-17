<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <div class="card p-2">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h1>Tickets</h1>
            <a class="btn btn-primary" href="/tickets/create"><i class="mdi mdi-plus"></i></a>
        </div>
    </div>
    <div class="card p-2">
        <?php foreach ($tickets as $done => $tasks): ?>

            <?php if ($done): ?>
                <div>
                    <h4 class="badge font-14 rounded-pill bg-success">Završeno</h4>
                </div>
            <?php else: ?>
                <div>
                    <h4 class="badge font-14 rounded-pill bg-danger">Nije završeno</h4>
                </div>
            <?php endif; ?>
            <div class="row mb-3 row-gap-3">
                <?php foreach ($tasks as $task): ?>
                    <div class="col-md-3 position-relative">
                        <?php if (getUser("role") === ADMIN): ?>
                            <form class="position-absolute end-0 top-0 translate-middle-x" style="z-index: 3"
                                  action="/tickets/<?php echo $task->id; ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger badge d-block fs-6"><i class="mdi mdi-delete-empty"></i>
                                </button>
                            </form>
                        <?php endif; ?>
                        <a class="card card-hover h-100 " href="/tickets/<?php echo $task->id; ?>">
                            <div class="alert h-100 d-flex mb-0 flex-column <?php echo $done ? "alert-success" : "alert-danger"; ?>"
                                 role="alert">
                                <div class="flex-grow-1">
                                    <h4 class="alert-heading"><?php echo $task->title; ?></h4>
                                    <div style="max-height: 100px; overflow: hidden; text-overflow-ellipsis: ellipsis; ">
                                        <?php echo getExcerpt($task->description, 10) ?>
                                    </div>
                                </div>
                                <p class="m-0 fw-bold"><?php echo $task->firstName . " " . $task->lastName; ?></p>
                                <hr class="my-1">
                                <div>

                                    <p class="mb-0">
                                        <?php isset($task->updatedAt) ? fullDateTime($task->updatedAt) : fullDateTime($task->createdAt); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>