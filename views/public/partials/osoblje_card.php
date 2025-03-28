<div class="card">
    <img src="<?php empty($nastavnik->image) ? uploadPath('avatar.png') : uploadPath($nastavnik->image); ?>"
         alt="<?php echo $nastavnik->firstName; ?>">
    <div class="card-body">
        <div class="card-body_group">

            <h4><?php echo $nastavnik->firstName; ?>
                <br><?php echo $nastavnik->lastName; ?></h4>
            <p><?php echo $nastavnik->rank; ?></p>

            <a class="email" href="mailto:<?php echo $nastavnik->email;
            ?>"><?php echo $nastavnik->email; ?></a>
        </div>

        <a href="osoblje/<?php echo $nastavnik->id; ?>" class="btn
                        btn-sm">Детаљније</a>
    </div>
</div>