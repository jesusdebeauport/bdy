<div id="main-wrapper">
    <div class="container">
        <header><h2><?php echo $title; ?></2></header>
        <div class="6u 12u(mobile)">
            <section>
                <?php echo validation_errors(); ?>

                <?php echo form_open('user/create'); ?>
                    <div class="row 50%">
                        <div class="6u 12u(mobile)">
                            <input type="text" name="username" placeholder="Utilisateur" />
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" name="password" placeholder="Mot de passe" />
                        </div>
                    </div>
                    <div class="row 50%">
                        <div class="6u 12u(mobile)">
                            <input type="text" placeholder="Prénom" name="firstname" />
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" placeholder="Nom" name="lastname" />
                        </div>
                    </div>
                    <div class="row 50%">
                        <div class="6u 12u(mobile)">
                            <input type="submit" name="submit" value="Créer" />
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>