<?php require_once 'partials/top.php'; ?>
    <!--  -->
<?php require_once 'partials/sidebar.php'; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <form class="form-horizontal" action="/dashboard/cenovnik/dodaj" method="post"
              enctype="multipart/form-data">
            <div class="card-body">
                <h4 class="card-title">Cenovnik/Dodaj</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label
                    col-form-label">Услуга</label
                    >
                    <div class="col-sm-9">
                        <input
                                type="text"
                                class="form-control"
                                id="fname"
                                placeholder="Услуга"
                                name="service"
                        />
                    </div>
                </div>
                <div class="form-group row">
                    <label
                            for="lname"
                            class="col-sm-3 text-end control-label col-form-label"
                    >Цена</label
                    >
                    <div class="col-sm-9">
                        <input
                                type="text"
                                class="form-control"
                                id="lname"
                                placeholder="Цена"
                                name="price"
                        />
                    </div>
                </div>
                <div class="col-sm-9 offset-sm-3">
                    <div class="border-top">
                        <div class="card-body">
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

    <!--  -->
<?php require_once 'partials/bottom.php'; ?>