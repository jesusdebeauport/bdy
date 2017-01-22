<div id="main-wrapper">
    <div class="container">
        <section>
            <div class="row">
                <div id="account">
                    <header><h2>Les Recettes</h2></header>
                    <section>
                        <div>
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('user/update'); ?>
                            <div>
                                <div class="field-group">
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