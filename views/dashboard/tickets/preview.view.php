<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <div class="card p-2">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h1>Tiket - <?php echo $ticket->title; ?></h1>
        </div>
        <?php if ($ticket->changeBy): ?>
            <div>
                <p class="text-muted text-center m-0 lh-1 mt-1"
                   style="font-style: italic">Status <strong
                            class="text-uppercase"><?php echo $ticket->status; ?></strong>
                    promenjen: <strong><?php echo fullDateTime($ticket->updatedAt); ?></strong>
                    od strane <strong><?php echo "$ticket->changerFirstName $ticket->changerLastName" ?></strong>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <div class="card p-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="alert alert-dark position-relative" role="alert">
                    <div class="position-absolute top-0 end-0 translate-middle-y z-3">
                        <span class="badge bg-info d-block"><?php echo $ticket->status; ?></span>
                    </div>
                    <div>
                        <?php echo $ticket->description ?>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center w-100 gap-3 flex-wrap">
                        <p class="m-0"><?php echo "$ticket->firstName $ticket->lastName"; ?></p>
                        <p class="m-0"><?php echo fullDateTime($ticket->createdAt) ?></p>
                    </div>
                </div>
                <?php foreach ($responses as $response): ?>
                    <div class="alert alert-dark" role="alert">
                        <div>
                            <?php echo $response->response ?>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center w-100 gap-3 flex-wrap">
                            <p class="m-0"><?php echo "$response->firstName $response->lastName"; ?></p>
                            <p class="m-0"><?php echo fullDateTime($response->createdAt) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (!$ticket->done): ?>
                <form action="/tickets/<?php echo $ticket->id; ?>/status" class="col-md-6 offset-md-3"
                      method="POST">
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="d-flex justify-content-between align-items-center w-100 gap-3 flex-wrap">
                        <button class="btn btn-warning flex-grow-1"
                                type="submit" <?php echo $ticket->status === "otvoren" ? "disabled" : ""; ?>
                                name="status" value="otvoren">
                            Otvori
                        </button>
                        <button class="btn btn-success flex-grow-1" type="submit" name="status"
                                value="rešen" <?php echo $ticket->status === "rešen" ? "disabled" : ""; ?>>Rešeno
                        </button>
                        <?php if (getUser("role") === ADMIN): ?>
                            <button class="btn btn-danger flex-grow-1" type="submit" name="status"
                                    value="zatvoren" <?php echo $ticket->status === "zatvoren" ? "disabled" : ""; ?>>
                                Zatvori
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            <?php endif; ?>
            <?php if (!$ticket->done && !($ticket->status === "rešen")): ?>
                <form class="col-md-6 offset-md-3" action="/tickets/<?php echo $ticket->id; ?>" method="post">
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group">
                        <label for="response">Odgovor</label>
                        <?php quillEditor(null, "response"); ?>
                    </div>
                    <div class="d-flex justify-content-between align-items-center w-100 gap-3 flex-wrap">
                        <button class="btn btn-primary">Odgovori</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>

    </div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>