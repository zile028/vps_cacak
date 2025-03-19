<?php require_once __DIR__ . '/../partials/top.php'; ?>
<!--  -->
<?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
<style>
    .table tr td {
        padding: 5px 10px;
    }
</style>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<h4>КАТЕГОРИЈЕ</h4>

<div class="card">
    <div class="card-body">
        <form action="/dashboard/document/category" class="row" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category">Нова кетегорија</label>
                        <input id="category" class="form-control" type="text" name="category">
                    </div>
                    <div class="form-group">
                        <label for="parent">Подкатегорија</label>
                        <select id="parent" class="form-control" type="text" name="parent">
                            <option value="<?php echo null; ?>" selected></option>
                            <?php foreach ($parentcategory as $category): ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div style="width: 80px;">
                    <div class="form-group">
                        <label for="lang">Језик</label>
                        <select id="lang" class="form-control" type="text" name="lang">
                            <option value="srb" selected>SRB</option>
                            <option value="en">EN</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" class="form-control" type="text" name="slug">
                    </div>
                </div>
                <div style="width: 100px;">
                    <div class="form-group">
                        <label for="prioritet">Приоритет</label>
                        <input id="prioritet" class="form-control" type="number" min="1" name="prioritet" value="1">
                    </div>
                </div>

                <div class="col-md d-flex align-items-end">
                    <button class="btn btn-primary form-control mb-3 nowrap" type="submit">ДОДАЈ КАТЕГОРИЈУ
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
                <th class="fw-bold">Категорија</th>
                <th class="fw-bold">Приоритет</th>
                <th class="fw-bold">Slug</th>
                <th class="fw-bold">Језик</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($kategorije as $lang => $kategorija) : ?>
                <tr>
                    <th class="text-uppercase fw-bold bg-body" colspan="5">
                        <?php echo $lang; ?>
                    </th>
                </tr>
                <?php foreach ($kategorija as $item): ?>
                    <tr>
                        <td>
                            <?php updateSingle("/dashboard/document/category/" . $item->id, "category", $item->category); ?>
                        </td>
                        <td>
                            <?php updatePriority("/document/category/" . $item->id, $item->prioritet); ?>
                        </td>
                        <td>
                            <?php updateSingle("/dashboard/document/category/" . $item->id, "slug", $item->slug); ?>
                        </td>
                        <td>
                            <?php updateSingle("/dashboard/document/category/" . $item->id, "lang", $item->lang); ?>
                        </td>
                        <td style="width: 15%">
                            <?php if ($item->count > 0): ?>
                                <p>Већ постоје документа!</p>
                            <?php else: ?>
                                <?php deleteForm("/dashboard/document/category/" . $item->id); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php if (isset($subcategory[$item->id])): ?>
                        <?php foreach ($subcategory[$item->id] as $subitem): ?>
                            <tr>
                                <td>
                                    <?php updateSingle("/dashboard/document/category/" . $subitem->id, "category", $subitem->category); ?>
                                </td>
                                <td>
                                    <?php updatePriority("/document/category/" . $subitem->id, $subitem->prioritet); ?>
                                </td>
                                <td>
                                    <?php updateSingle("/dashboard/document/category/" . $subitem->id, "slug", $subitem->slug); ?>
                                </td>
                                <td>
                                    <?php updateSingle("/dashboard/document/category/" . $subitem->id, "lang", $subitem->lang); ?>
                                </td>
                                <td style="width: 15%">
                                    <?php if ($subitem->count > 0): ?>
                                        <p>Већ постоје документа!</p>
                                    <?php else: ?>
                                        <?php deleteForm("/dashboard/document/category/" . $subitem->id); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<?php require_once __DIR__ . '/../partials/bottom.php'; ?>

