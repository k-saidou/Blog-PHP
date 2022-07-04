<div class="row">
    <div class="col-sm-8">
        <?php foreach ($comment as $comment): ?>

            <h2><a href="<?= $comment->url ?>"><?= $comment->content; ?></a></h2>

            <p><?= $comment->extrait; ?></p>

        <?php endforeach; ?>

    </div>
</div>