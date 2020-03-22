<?php ?>
    <div class="container clearfix">
        <br> <!-- skapa login forum -->
        <div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
            <div class="panel">
                <h2 class="text-center">Login</h2>
                <!-- show messages if the form validation fails/success -->
                <?php if ($this->session->flashdata()) { ?> 
                    <div class="alert alert-warning">
                        <?= $this->session->flashdata('msg'); ?> 
                    </div>
                <?php } ?>
                <form method="post" accept-charset="utf-8" action="<?= base_url(); ?>login/doLogin"> <!-- Login Form at login page -->
                    <div class="input email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />  <!-- Input field of email to login -->
                    </div>
                    <div class="input password">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" /> <!-- Input field of password to login -->
                    </div>
                    <div class="submit">
                        <input type="submit" class="button" value="Login" /> <!-- Submit button to login -->
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php ?>