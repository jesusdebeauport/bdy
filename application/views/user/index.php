<?php
?>
<h2><?php echo $title; ?></h2>

<?php foreach ($users as $user_item): ?>

    <h3><?php echo $user_item['username']; ?></h3>
    <div class="main">
        <?php echo $user_item['email']; ?>
    </div>
    <p><a href="<?php echo site_url('user/'.$user_item['user_id']); ?>">View User</a></p>

<?php endforeach; ?>