<?php
?>
<nav id="nav">
    <ul>
        <li><a class="icon fa-home" href="."><span>Accueil</span></a></li>
        <li>
            <a class="icon fa-cutlery" href="<?php echo site_url('recipe'); ?>"><span>Recette</span></a>
            <ul class="nav-second-level">
                <li><a class="icon fa-cutlery" href="<?php echo site_url('recipe/dejeuner'); ?>"><span>Déjeuner</span></a></li>
                <li><a class="icon fa-cutlery" href="<?php echo site_url('recipe/plat-principal'); ?>"><span>Plat principal</span></a></li>
                <li><a class="icon fa-cutlery" href="<?php echo site_url('recipe/accompagnement'); ?>"><span>Accompagnement</span></a></li>
                <li><a class="icon fa-cutlery" href="<?php echo site_url('recipe/dessert'); ?>"><span>Dessert</span></a></li>
            </ul>
        </li>
        <?php if ($this->session->userdata('login')) { ?>
            <li>
                <a class="icon fa-user" href="<?php echo site_url('user/account'); ?>"><span><?php echo $this->session->userdata('username'); ?></span></a>
                <ul class="nav-second-level">
                    <li><a class="icon fa-user" href="<?php echo site_url('user/account'); ?>"><span>Mon compte</span></a></li>
                    <li><a class="icon fa-sign-out" href="<?php echo site_url('user/logout'); ?>"><span>Se déconnecter</span></a></li>
                </ul>
            </li>
        <?php } else { ?>
            <li><a class="icon fa-sign-in" href="<?php echo site_url('user/login'); ?>"><span>Se connecter</span></a></li>
        <?php } ?>
    </ul>
</nav>