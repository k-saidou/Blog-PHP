<h1>Bienvenue post</h1>

<?php foreach($posts as $post): ?>

<h2><?= $post['titre'] ?></h2>

<p><?= $post['contenu'] ?></p>

<?php endforeach ?>