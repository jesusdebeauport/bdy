<div id="main-wrapper">
    <div class="container box">
        <section>
            <div class="row">
                <div id="login" class="two-columns">
                    <header><h2><?php echo $title; ?></h2></header>
                    <div>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('user/login'); ?>
                            <div>
                                <div class="field-group">
                                    <input type="text" name="username" placeholder="Utilisateur" value="<?php echo set_value('username'); ?>" />
                                    <input type="password" name="password" placeholder="Mot de passe" value="<?php echo set_value('password'); ?>" />
                                </div>
                            </div>
                            <div class="button-wrapper">
                                <div>
                                    <button name="submit" type="submit" class="form-button-submit button ">Se connecter</button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div id="ask-create-account" class="two-columns">
                    <header><h2>S'inscrire</2></header>
                    <div>
                        <div id="signup-msg">
                            <span>Vous n'avez pas de compte? Inscrivez-vous!</span>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <div>
                            <a href="<?php echo site_url('user/signup'); ?>" class="form-button-submit button ">Créer un compte</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>