<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('recipe/create'); ?>
    <label for="name">Titre</label>
    <input type="input" name="name" /><br />

    <label for="category_id">Catégorie</label>
    <input type="input" name="category_id" /><br />

    <label for="nb_portion">Nombre de portions</label>
    <input type="input" name="nb_portion" /><br />

    <label for="preparation_time">Temps de préparation</label>
    <input type="input" name="preparation_time" /><br />

    <label for="waiting_time">Temps d'attente</label>
    <input type="input" name="waiting_time" /><br />

    <input type="submit" name="submit" value="Créer" />
</form>