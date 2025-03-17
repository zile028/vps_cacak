<?php require_once "partials/top.php" ?>
<main class="container-fluid bg-dark vh-100 d-flex justify-content-center align-items-center">
    <section class="row w-100">
        <div class="col-md-4 offset-md-4">
            <h1 class="text-white">Registracija</h1>
            <form action="/register" method="post">
                <input class="form-control mb-3" placeholder="Ime" name="firstName" type="text">
                <input class="form-control mb-3" placeholder="Prezime" name="lastName" type="text">
                <input class="form-control mb-3" placeholder="E-mail" name="email" type="email">
                <input class="form-control mb-3" placeholder="Password" name="password"
                       type="password">
                <input class="form-control mb-3" placeholder="Confirm password"
                       name="confirmPassword"
                       type="password">
                <button class="btn btn-primary">Register</button>
            </form>
        </div>
    </section>

</main>


<?php require_once "partials/bottom.php" ?>
