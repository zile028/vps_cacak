<?php require base_path("API/public/study/study_feature.php"); ?>
    <section class="features py">
    <article class="title-section container">
        <h2>СТУДИЈЕ</h2>
    </article>
    <article class="container col-4">
        <?php foreach ($studije as $sp => $plan): ?>
            <?php foreach ($plan as $info) : ?>
                <div class="wrapper ">
                    <div class="wrapper-body">
                        <div class="icon">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h6><?php echo mb_strtoupper($sp); ?></h6>
                        <?php if (isset($info->modul)): ?>
                            <span><strong><?php echo $info->modul; ?></strong></span>
                        <?php endif; ?>
                        <ul class="listGroup">
                            <li><?php echo $info->nivo; ?></li>
                            <li><?php echo $info->zvanje; ?></li>
                            <li><?php echo $info->espb; ?> ЕСПБ</li>
                        </ul>
                    </div>
                    <div class="wrapper-footer">
                        <a class="btn btn-sm" href="/studije/<?php echo $info->id; ?>">ВИШЕ</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>


    </article>
    </section><?php
