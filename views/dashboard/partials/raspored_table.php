<div class="card">
    <div class="card-body">
        <h5 class="card-title">Распореди</h5>
        <div class="table-responsive">
            <table
                    class="table table-striped table-bordered"
            >
                <thead>
                <tr>
                    <th>Р.Б.</th>
                    <th>Студијски програм</th>
                    <th>Назив фајла</th>
                    <th>Година</th>
                    <th>Објављен</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rasporedi as $kategorja => $raspored) : ?>
                    <tr>
                        <td colspan="6">
                            <h6><?php echo $kategorja ? "Активни" : "Неактивни"; ?></h6></td>
                    </tr>
                    <?php foreach ($raspored as $index => $item) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td>
                                <span><?php echo $item->nivo; ?></span> <br>
                                <p class="fw-bold m-0"><?php echo $item->naziv; ?>
                                    <?php echo $item->modul; ?></p>
                            </td>
                            <td><a href="<?php uploadPath($item->storeName); ?>"
                                   target="_blank"><?php echo
                                    $item->fileName;
                                    ?></a></td>
                            <td><?php echo $item->godina; ?></td>
                            <td><?php dateDDMMYYY($item->createdAt); ?></td>
                            <td>
                                <form action="/schedule/lecture/active/<?php echo $item->id;
                                ?>" method="post">
                                    <input type="hidden" name="_method" value="patch">
                                    <input type="hidden" name="active" value="<?php echo
                                    $item->active ? 0 : 1; ?>">
                                    <button class="btn btn-sm btn-warning w-100 mb-1"><?php echo
                                        ($item->active ? "ДЕАКТИВИРАЈ" : "АКТИВИРАЈ");
                                        ?></button>
                                </form>
                                <form action="/schedule/<?php echo $item->id; ?>"
                                      method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-sm btn-danger w-100">ОБРИШИ</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>