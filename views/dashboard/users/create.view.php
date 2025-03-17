<?php require_once __DIR__ . '/../partials/top.php'; ?>
    <!--  -->
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ДОДАЈ КОРИСНИКА</h4>
    <div class="card">
        <form class="form-horizontal" action="/users/create" method="post"
              enctype="multipart/form-data">

            <div class="card-body">
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
                                value="<?php echo $data["firstName"] ?? null; ?>"
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
                                value="<?php echo $data["lastName"] ?? null; ?>"
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
                                value="<?php echo $data["email"] ?? null; ?>"
                        />
                    </div>
                </div>
                <div class="form-group row">
                    <label
                            for="role"
                            class="col-sm-3 text-end control-label col-form-label"
                    >Улога</label
                    >
                    <div class="col-sm-9">
                        <select class="form-control" id="role" name="role">
                            <?php foreach ($roles as $role) : ?>
                                <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="border-top row">

                    <div class="card-body offset-sm-3">
                        <?php if (isset($error)): ?>
                            <p class="text-danger"><?php echo $error; ?></p>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary">
                            Додај
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

<?php require_once __DIR__ . '/../partials/bottom.php'; ?>