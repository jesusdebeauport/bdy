<?php
?>
<h2><?php echo $title; ?></h2>

<?php foreach ($recipes as $recipe_item): ?>

    <h3><?php echo $recipe_item['name']; ?></h3>
    <div class="main">
        <?php echo $recipe_item['comment']; ?>
    </div>
    <p><a href="<?php echo site_url('recipe/'.$recipe_item['recipe_id']); ?>">Lien</a></p>

<?php endforeach; ?>