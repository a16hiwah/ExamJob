<?php ?>

    <div class="container clearfix">
        <br>
        <div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
            <div class="panel">
                <h2 class="text-center">Please Register</h2>

                <!-- show error messages if the form validation fails -->

                <?php if ($this->session->flashdata()) { ?>
                    <div class="alert alert-danger">
                        <?=$this->session->flashdata('errors'); ?>
                    </div>
                <?php } ?>
                
                <form method="post" accept-charset="utf-8" action="<?= base_url(); ?>register/doRegister"> <!-- Form at view page which redirect data to controller(Register) page to add new user   -->
                    <div class="input text required">
                        <label for="name">Name</label>
                        <input type="text" name="name" required="required" maxlength="255" id="name" /> <!-- Input field to set name of new user -->
                    </div>
                    <div class="input email required">
                        <label for="email">Email</label>
                        <input type="email" name="email" required="required" maxlength="255" id="email" /> <!-- Input field to set email of new user -->
                    </div>
                    <div class="input password required">
                        <label for="password">Password</label>
                        <input type="password" name="password" required="required" id="password" /> <!-- Input field to set password of new user -->
                    </div>
                    <div class="submit">
                        <input type="submit" class="button" value="Register" /> <!-- Submit data to Controller -->
                    </div>
                </form>
            </div>
        </div>
    </div>    
<?php ?>
