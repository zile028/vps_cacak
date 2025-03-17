<?php require_once "partials/top.php" ?>
<main class="container-fluid bg-dark vh-100 d-flex justify-content-center align-items-center">
    <section class="d-flex w-100 align-items-center justify-content-center">
        <div class="col-md-3">
            <div>
                <img class="img-fluid mx-auto d-block" style="height: 100px"
                     src="<?php echo assetImage("/logo.png"); ?>" alt="">
            </div>
            <h1 class="text-white text-center lh-lg">Login</h1>
            <form action="/dashboard/login" method="post">
                <input class="form-control mb-3" placeholder="E-mail" name="email" type="email">
                <input class="form-control mb-3" placeholder="Password" name="password"
                       type="password">
                <button class="btn btn-primary form-control" style="border-radius: 10px">Login</button>
            </form>
        </div>
    </section>

</main>


<?php require_once "partials/bottom.php" ?>
