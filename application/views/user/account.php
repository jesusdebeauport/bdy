<div id="main-wrapper">
    <div class="container box">
        <section>
            <div class="row">
                <div id="account">
                    <header><h2><?php echo $title; ?></h2></header>
                    <section>
                        <div>
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('user/account'); ?>
                            <div>
                                <div class="field-group">
                                    <input type="text" name="username" placeholder="Utilisateur" value="<?php echo set_value('username', $user_item['username']); ?>" />
                                    <input type="text" name="email" placeholder="E-mail" value="<?php echo set_value('email', $user_item['email']); ?>" />
                                    <input type="text" name="firstname" placeholder="Prénom" value="<?php echo set_value('firstname', $user_item['firstname']); ?>" />
                                    <input type="text" name="lastname" placeholder="Nom" value="<?php echo set_value('lastname', $user_item['lastname']); ?>" />
                                </div>
                            </div>
                            <div class="button-wrapper">
                                <div>
                                    <button name="submit" type="submit" class="form-button-submit button ">Enregistrer</button>
                                    <a name="submit" href="user/change-password" class="form-button-submit button ">Modifier mon mot de passe</a>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
</div>