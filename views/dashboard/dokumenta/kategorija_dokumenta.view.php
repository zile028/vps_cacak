<?php require_once __DIR__ . '/../partials/top.php'; ?>
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4 class="text-uppercase"><?php echo $kategorija->category ?></h4>

<div class="card">
    <div class="card-body">
        <form action="/dashboard/document/category/<?php echo $kategorija->id; ?>" class="row" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-0">
                        <label for="odbor">Назив</label>
                        <input class="form-control"
                               type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Подкатегорија</label>
                        <select id="subcategory" class="form-control" type="text" name="subcategory">
                            <option value="<?php echo null ?>">Нема подкатегорију</option>
                            <?php foreach ($subcategory as $category): ?>
                                <option value="<?php echo $category->id; ?>">
                                    <span><?php echo $category->category; ?></span>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-0">
                        <label for="attachment">Документ</label>
                        <div class="select2-border">
                            <select id="attachment" class="select2 form-control" type="text"
                                    name="attachment">
                                <?php foreach ($media as $type => $files): ?>
                                    <optgroup label="<?php echo $type; ?>">
                                        <?php foreach ($files as $file): ?>
                                            <option value="<?php echo $file->id; ?>">
                                                (<?php echo $file->id; ?>) <?php echo $file->fileName; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="povezan">Повезан са</label>
                        <select id="povezan" class="form-control" type="text" name="povezan">
                            <option value="0">Није повезан</option>
                            <?php foreach ($povezan as $file): ?>
                                <option value="<?php echo $file->id; ?>">
                                    <span><?php echo $file->title; ?></span>
                                    <span class="ms-2"><?php dateDDMMYYY($file->createdAt); ?></span>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md d-flex align-items-end">
                    <button class="btn btn-primary form-control mb-3 nowrap" type="submit">ДОДАЈ ДОКУМЕНТ
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th class="fw-bold">Документ</th>
                <th class="fw-bold">Повезан са</th>
                <th class="fw-bold">Прави назив</th>
                <th class="fw-bold">Креиран</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dokumenta as $dokument) : ?>
                <tr>
                    <td>
                        <a class="" href="/dashboard/document/edit/<?php echo $dokument->id; ?>"><i
                                    class="mdi mdi-settings"></i></a>
                        <a href="<?php echo $dokument->storeName; ?>">
                            <?php echo $dokument->title; ?>
                        </a>
                    </td>
                    <td><?php echo $dokument->parent; ?></td>
                    <td><?php echo $dokument->fileName; ?></td>
                    <td><?php dateDDMMYYY($dokument->createdAt); ?></td>
                    <td style="width: 10%">
                        <?php if ($dokument->haveChilde): ?>
                            <p>Прво обрисати повезан документ.</p>
                        <?php else: ?>
                            <?php deleteForm("/dashboard/document/" . $dokument->id); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<?php require_once __DIR__ . '/../partials/bottom.php'; ?>

