<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Galerija: <?php echo $gallery->title; ?></h1>
            <a href="/gallery" class="btn btn-primary chamfer">Nazad</a>
        </div>
        <div class="d-flex align-items-end gap-2">
            <!-- Column -->
            <form class="d-flex gap-2 flex-grow-1 col-md-11" action="/gallery/<?php echo $gallery->id; ?>"
                  method="post">
                <input type="hidden" name="_method" value="put">
                <div class="form-group col-md-4 col-lg-4 col-xlg-3">
                    <label for="title">Naziv</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Naziv galerije"
                           value="<?php echo $gallery->title; ?>">
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xlg-3">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug"
                        <?php echo $gallery->slug; ?>
                    >
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xlg-3">
                    <label for="lang">Jezik</label>
                    <select name="lang" id="lang" class="form-control">
                        <?php foreach ($lang as $ln): ?>
                            <option value="<?php echo $ln; ?>" <?php echo $gallery->lang === $ln ? "selected" : ""; ?>><?php echo $ln; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col d-flex align-items-end">
                    <button class="btn btn-primary w-100">Izmeni</button>
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
            <form class="col" action="/gallery/<?php echo $gallery->id; ?>" method="post">
                <input type="hidden" name="_method" value="delete">
                <div class="form-group">
                    <button class="btn btn-danger"><i
                                class="mdi mdi-close-outline"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <form action="/gallery/<?php echo $gallery->id ?>" method="post">
                <div class="form-group col-md-2 col-lg-2 col-xlg-2 d-flex align-items-center justify-content-between w-100">
                    <button class="btn btn-primary font-20" name="submit" value="mediaSelect">
                        <i class="mdi mdi-folder-multiple-image"></i>
                    </button>
                    <?php if (count($media) > 0): ?>
                        <button class="btn btn-primary font-20" name="submit" value="save">
                            <i class="mdi mdi-content-save-all"></i>
                        </button>
                    <?php endif; ?>
                </div>
                <!--SELEKTOVANE SLIKE ZA DODAVANJE-->
                <?php if (count($media) > 0): ?>
                    <h3>Slike koje ste odabrali</h3>
                    <?php foreach ($media as $index => $item): ?>
                        <div class="row mb-3">
                            <input type="hidden" name="images[]" value="<?php echo $item->id; ?>">
                            <div class="col-md-4" style="height: 200px;">
                                <img class="h-100 w-100" style="object-fit: contain"
                                     src="<?php uploadPath($item->storeName); ?>" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="caption">Opis</label>
                                    <input class="form-control" type="text" id="caption" name="caption[]"
                                           value="<?php echo getPrevInput("caption")[$index] ?? ""; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="position">Redosled</label>
                                    <input class="form-control" type="number" id="position" name="position[]"
                                           value="<?php echo $index + 1; ?>" min="1"
                                           max="<?php echo count($media); ?>">
                                </div>
                                <button class="btn btn-danger" name="submit" value="remove_<?php echo $item->id ?>">
                                    Ukloni
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </form>
            <!--SLIKE DODATE U GALERIJI-->
            <form action="/gallery/<?php echo $gallery->id ?>" method="post">
                <h3>Slike u galeriji</h3>
                <input type="hidden" name="_method" value="patch">
                <?php if (count($galleryMedia) > 0): ?>
                    <?php foreach ($galleryMedia as $index => $item): ?>
                        <div id="image<?php echo $item->mediaID ?>" class="row mb-3">
                            <input type="hidden" name="images[]" value="<?php echo $item->mediaID; ?>">
                            <div class="col-md-4" style="height: 200px;">
                                <img class="h-100 w-100" style="object-fit: contain"
                                     src="<?php uploadPath($item->storeName); ?>" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="caption">Opis</label>
                                    <input class="form-control" type="text" id="caption" name="caption[]"
                                           value="<?php echo getPrevInput("caption")[$index] ?? $item->caption; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="position">Redosled</label>
                                    <input class="form-control" type="number" id="position" name="position[]"
                                           value="<?php echo $item->position ?? $index + 1; ?>" min="1">
                                </div>
                                <button class="btn btn-warning" name="submit"
                                        value="<?php echo "update_{$item->mediaID}_{$index}" ?>">
                                    Ažuriraj
                                </button>
                                <button class="btn btn-danger" name="submit"
                                        value="<?php echo "remove_{$item->mediaID}_{$index}" ?>">
                                    Ukloni
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . "/../partials/bottom.php"; ?>