<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user/create'); ?>

    <label for="username">Utilisateur</label>
    <input type="input" name="username" /><br />

    <label for="password">Mot de passe</label>
    <input type="input" name="password" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <label for="firstname">Prénom</label>
    <input type="input" name="firstname" /><br />

    <label for="lastname">Nom</label>
    <input type="input" name="lastname" /><br />

    <input type="submit" name="submit" value="Create user" />

</form>