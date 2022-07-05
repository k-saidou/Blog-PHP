<?php foreach ($comments as $comment): ?>

<h2><a href="<?= $comment->url ?>"><?= $comment->content; ?></a></h2>

<p><?= $comment->extrait; ?></p>

<?php endforeach; ?>
