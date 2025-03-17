<!-- ============================================================== -->
<!-- START table -->
<!-- ============================================================== -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table
                    id="zero_config"
                    class="table table-striped table-bordered"
            >
                <thead>
                <tr>
                    <th>Р.Б.</th>
                    <th>Шифра</th>
                    <th>Предмет</th>
                    <th>С</th>
                    <th>П</th>
                    <th>В</th>
                    <th>О/И</th>
                    <th>ЕСПБ</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($predmeti as $index => $predmet): ?>
                    <tr>
                        <td style="width: 100px">
                            <?php if (isset($predmet->redniBroj)): ?>
                                <form action="/study/<?php echo $sp->id; ?>/<?php echo $predmet->id ?>/order"
                                      class="d-flex" method="post">
                                    <input type="hidden" name="_method" value="patch">
                                    <input class="form-control form-select-sm text-center"
                                           type="text" name="order"
                                           value="<?php echo $predmet->redniBroj; ?>" min="1">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-check"></i></button>
                                </form>
                            <?php else: ?>
                                <?php echo $index + 1; ?>
                            <?php endif; ?>
                        </td>
                        <td class="">
                            <?php echo $predmet->sifra; ?>
                        </td>
                        <td class=""><?php echo $predmet->predmet; ?></td>
                        <td class=""><?php echo $predmet->semestar; ?></td>
                        <td class=""><?php echo $predmet->predavanja; ?></td>
                        <td class=""><?php echo $predmet->vezbe; ?></td>
                        <td class=""><?php echo $predmet->izborni ? "Изборни" : "Обавезан"; ?></td>
                        <td class=""><?php echo $predmet->espb; ?></td>
                        <td>
                            <?php if (isset($flag) && $flag === "remove") {
                                $href = "/study/$sp->id/course/remove/$predmet->id";
                            } else {
                                $href = "/study/course/$predmet->id";
                            } ?>

                            <form action="<?php echo $href; ?>"
                                  method="post">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-sm btn-danger"><i
                                            class="mdi mdi-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- END table -->
<!-- ============================================================== -->