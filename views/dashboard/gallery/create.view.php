<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <div class="card p-3">
        <h1>Galerija/Kreiranje</h1>
        <div class="row">
            <!-- Column -->
            <form class="row" action="/gallery/create" method="post">
                <div class="form-group col-md-4 col-lg-4 col-xlg-3">
                    <label for="title">Naziv</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Naziv galerije">
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xlg-3">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xlg-3">
                    <label for="lang">Jezik</label>
                    <select name="lang" id="lang" class="form-control">
                        <?php foreach ($lang as $ln): ?>
                            <option value="<?php echo $ln; ?>"><?php echo $ln; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-lg-2 col-xlg-2 d-flex align-items-end">
                    <button class="btn btn-primary form-control">Kreiraj</button>
                </div>
                <?php if (hasErrors()): ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Greška!</h4>
                            <hr>
                            <ul>
                                <?php foreach (getFlashErrors() as $err): ?>
                                    <li><?php echo $err; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <?php foreach ($galleries as $lang => $gallery): ?>
                <h3><?php echo $lang; ?></h3>
                <?php foreach ($gallery as $item): ?>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <a href="/gallery/<?php echo $item->id ?>">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">
                                        <i class="mdi mdi-folder-multiple-image"></i>
                                    </h1>
                                    <h6 class="text-white"><?php echo $item->title; ?></h6>
                                    <span class="text-white"><?php echo $item->count; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>