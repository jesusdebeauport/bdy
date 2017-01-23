<div id="main-wrapper">
    <div class="container box">
        <section>
            <div class="row">
                <div id="signup">
                    <header><h2><?php echo $title; ?></h2></header>
                    <div>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('user/signup'); ?>
                            <div class="field-group">
                                <input type="text" name="username" placeholder="Utilisateur" />
                                <input type="password" name="password" placeholder="Mot de passe" />
                                <input type="password" name="password-confirm" placeholder="Confirmez le mot de passe" />
                                <input type="text" placeholder="Courriel" name="email" />
                                <input type="text" placeholder="Prénom" name="firstname" />
                                <input type="text" placeholder="Nom" name="lastname" />
                            </div>
                            <div class="button-wrapper">
                                <input type="submit" name="submit" value="Créer" />
                            </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>