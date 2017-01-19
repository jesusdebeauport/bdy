<?php
$this->load->helper('url_helper');
?>
<nav id="nav">
    <ul>
        <li><a class="icon fa-home" href="."><span>Accueil</span></a></li>
        <li>
            <a class="icon fa-bar-chart-o" href="<?php echo site_url('recipe'); ?>"><span>Recette</span></a>
            <ul>
                <li><a href="#">Déjeuner</a></li>
                <li><a href="#">Plat principal</a></li>
                <li><a href="#">Accompagnement</a></li>
                <li><a href="#">Dessert</a></li>
            </ul>
        </li>
        <li><a class="icon fa-cog" href="<?php echo site_url('user/login'); ?>"><span>Se connecter</span></a></li>
        <!--<li><a class="icon fa-retweet" href="right-sidebar.html"><span>Right Sidebar</span></a></li>-->
        <!--<li><a class="icon fa-sitemap" href="no-sidebar.html"><span>No Sidebar</span></a></li>-->
    </ul>
</nav>