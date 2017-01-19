<?php
$this->load->helper('url_helper');
?>
<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="6u 12u(mobile)">
                <header><h2>S'authentifier</2></header>
                <div class="6u 12u(mobile)">
                    <section>
                        <?php echo validation_errors(); ?>

                        <?php echo form_open('user/login'); ?>
                            <div class="row 50%">
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="username" placeholder="Utilisateur" />
                                </div>
                                <div class="6u 12u(mobile)">
                                    <input type="password" name="password" placeholder="Mot de passe" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <input type="submit" name="submit" value="Se connecter" />
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="6u 12u(mobile)">
                <div class="row">
                    <a href="<?php echo site_url('user/create'); ?>" class="form-button-submit button ">S'enregistrer</a>
                </div>
            </div>
        </div>
    </div>
</div>