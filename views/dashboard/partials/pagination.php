<?php
$perPage = $limit ?? 10;
$numItems = $items ?? 5;
$numPages = ceil($count / $perPage);
$numItems = min($numPages, $numItems);
$currentPage = (int)($_GET["page"] ?? 1);
if ($currentPage < 4) {
    $startFrom = 1;
} elseif ($currentPage > $numPages - 2) {
    $startFrom = $numPages - 4;
} else {
    $startFrom = $currentPage - 2;

}
$pageItems = array_fill($startFrom, $numItems, $startFrom);
$previous = $currentPage === 1 ? 1 : $currentPage - 1;
$next = $currentPage + 1;
$cbUrl .= isset($_GET["search"]) ? "?search=" . $_GET["search"] . "&" : "?";
?>

<nav aria-label="..." class="d-flex flex-wrap">
    <div class="col">
        <ul class="pagination">
            <li class="page-item  <?php echo $currentPage === 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?php echo $cbUrl; ?>page=<?php echo $previous; ?>" tabindex="-1">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </li>

            <?php foreach ($pageItems as $index => $value): ?>
                <li class="page-item <?php echo $currentPage === $index ? 'active' : ''; ?>">
                    <?php if ($currentPage === $index): ?>
                        <span class="page-link"><?php echo $index; ?></span>
                    <?php else: ?>
                        <a class="page-link"
                           href="<?php echo $cbUrl; ?>page=<?php echo $index; ?>"><?php echo $index; ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            <li class="page-item <?php echo $currentPage < $numPages ? '' : 'disabled' ?>">
                <a class="page-link" href="<?php echo $cbUrl ?>page=<?php echo $next; ?>">
                    <i class="mdi mdi-arrow-right"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="col">
        <ul class="pagination">
            <li class="page-item">
                <span class="page-link"><?php echo $numPages; ?> стране</span>
            </li>
            <li class="page-item">
                <span class="page-link"><?php echo $count; ?> погодака</span>
            </li>
        </ul>
    </div>
</nav>
