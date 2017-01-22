<?php
?>
<div id="main-wrapper">
    <div class="container box">
        <section>
            <div class="row">
                <div id="account">
                    <header><h2>Mon Compte</h2></header>
                    <section>
                        <div>
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('user/update'); ?>
                            <div>
                                <div class="field-group">
                                    <input type="text" name="username" placeholder="Utilisateur" value="<?php echo set_value('username'); ?>" />
                                    <input type="text" name="email" placeholder="E-mail" value="<?php echo set_value('emial'); ?>" />
                                    <input type="text" name="firstname" placeholder="Prénom" value="<?php echo set_value('firstname'); ?>" />
                                    <input type="text" name="lastname" placeholder="Nom" value="<?php echo set_value('lastname'); ?>" />
                                </div>
                            </div>
                            <div class="button-wrapper">
                                <div>
                                    <button name="submit" type="submit" class="form-button-submit button ">Enregistrer</button>
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