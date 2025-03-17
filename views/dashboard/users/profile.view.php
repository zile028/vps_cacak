<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

<div class="card py-1 px-3">
    <h1 class="lh-1">My Profile</h1>
</div>
<div class="card py-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <h3><?php echo "$user->firstName $user->lastName"; ?></h3>
                <form class="col-md-6" method="post" action="/users/profile">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="image" class="form-control mb-2" placeholder="Image"
                           id="profileImage"
                           value="<?php echo $image ?? $user->image; ?>">
                    <div class="form-group">
                        <label for="firstName">Ime</label>
                        <input type="text" class="form-control"
                               name="firstName" id="firstName"
                               placeholder="Ime"
                               value="<?php echo $user->firstName ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Prezime</label>
                        <input type="text" class="form-control"
                               name="lastName" id="lastName"
                               placeholder="Prezime"
                               value="<?php echo $user->lastName ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control"
                               name="email" id="email"
                               placeholder="Email"
                               value="<?php echo $user->email ?? ""; ?>">
                    </div>
                    <fieldset class="border border-2 p-2">
                        <p class="m-0">Nalog
                            kreiran: <?php echo isset($user->createdAt) ? fullDateTime($user->createdAt) : ""; ?></p>
                        <p class="m-0">Role: <?php echo $user->role ?? ""; ?></p>
                        <p class="m-0">
                            Poslednji
                            pristup: <?php echo isset($user->lastAccess) ? fullDateTime($user->lastAccess) : ""; ?>
                        </p>
                    </fieldset>
                    <div class="col-md-6 offset-md-3 mt-3">
                        <button class="btn btn-primary form-control">Ažuriraj</button>
                    </div>
                </form>
                <form class="col-md-6" method="post" action="/users/profile">
                    <div class="mb-2 d-flex justify-content-end align-items-center gap-2">
                        <button type="button"
                                onclick="pasteInto('profileImage','imgPreview')"
                                class="btn text-dark border border-1 border-dark">
                            <i class="mdi mdi-link"></i>
                        </button>
                        <button type="submit" name="submit" value="image"
                                class="btn text-dark border border-1 border-dark"><i
                                    class="mdi mdi-image"></i>
                        </button>
                    </div>
                    <input type="hidden" name="_method" value="get">
                    <?php if (isset($user->image) && empty($image)): ?>
                        <img style="width:100%; max-height: 200px; object-fit: contain ;" id="imgPreview"
                             src="<?php echo uploadPath($user->image) ?>" alt="">
                    <?php elseif (isset($image) && !empty($image)): ?>
                        <img id="imgPreview" src="<?php echo uploadPath($image) ?>"
                             style="width:100%; max-height: 200px; object-fit: contain ;" alt="">
                    <?php else: ?>
                        <img id="imgPreview" class="img-fluid"
                             style="width:100%; max-height: 200px; object-fit: contain ;"
                             src="<?php echo assetImage("users/avatar.png") ?>" alt="">
                    <?php endif; ?>

                </form>
                <?php if (isError(ERRORS_FLASH) && getFlash(ERRORS_FLASH, "update")): ?>
                    <div class="col-md-12 mt-3">
                        <div class="alert alert-danger">
                            <p><?php echo getFlashErrors("update"); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!--------------------------------------
            --          CHANGE PASSWORD           --
            --------------------------------------->
            <form class="row mt-5" action="/users/password" method="post">
                <input type="hidden" name="_method" value="PUT"">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="oldPassword">Stara lozinka</label>
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="newPassword">Nova lozinka</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="repeatPassword">Ponovi novu lozinku</label>
                        <input type="password" class="form-control" name="repeatPassword" id="repeatPassword">
                    </div>
                </div>
                <div class="col-md-3  d-flex align-items-end">
                    <div class="form-group w-100">
                        <button class="btn btn-primary form-control">Promeni lozinku</button>
                    </div>
                </div>
            </form>
            <?php if (isError(ERRORS_FLASH) && getFlash(ERRORS_FLASH, "password")): ?>
                <div class="col-md-12 mt-3">
                    <div class="alert alert-danger">
                        <?php foreach (getFlashErrors("password") as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
