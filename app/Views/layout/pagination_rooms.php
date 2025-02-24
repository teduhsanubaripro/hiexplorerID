<?php $pager->setSurroundCount(2); ?>

<nav aria-label="Rooms Pagination">
    <ul class="pagination justify-content-center">
        <!-- Tombol First & Prev -->
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" class="page-link">
                    « First
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPreviousPage() ?>" class="page-link">
                    ‹ Prev
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">« First</span>
            </li>
            <li class="page-item disabled">
                <span class="page-link">‹ Prev</span>
            </li>
        <?php endif; ?>

        <!-- Nomor Halaman -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Tombol Next & Last -->
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNextPage() ?>" class="page-link">
                    Next ›
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" class="page-link">
                    Last »
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Next ›</span>
            </li>
            <li class="page-item disabled">
                <span class="page-link">Last »</span>
            </li>
        <?php endif; ?>
    </ul>
</nav>
