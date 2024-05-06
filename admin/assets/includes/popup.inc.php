<div class="popup-alert">
    <?php if (!empty($msgErr)): ?>
        <div class="alert alert-danger alert-dismissible fade show mx-auto">
            <?= $msgErr ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (!empty($msgSuc)): ?>
        <div class="alert alert-success alert-dismissible fade show mx-auto">
            <?= $msgSuc ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>