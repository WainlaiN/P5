<?php $title = 'Mon blog'; ?>
<?php //var_dump($posts); ?>
<?php ob_start(); ?>

    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>


<?php foreach ($posts as $post): ?>

    <div class="container">
        <div class="news">
            <h3>
                <?= htmlspecialchars($post->getTitle()); ?>
                <em>le <?= $post->date_creation; ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($post->getChapo())); ?>
                <br/>
                <?= nl2br(htmlspecialchars($post->getDescription())); ?>
                <br/>
                <em><a href="./index.php?action=post&amp;id=<?= $post->id ?>">Commentaires</a></em>
            </p>
        </div>
    </div>
    <?php endforeach;

$content = ob_get_clean();

require('layout.php'); ?>


