<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user/create'); ?>

    <label for="username">Username</label>
    <input type="input" name="username" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <input type="submit" name="submit" value="Create user" />

</form>