<?php ?>    
    <div class="container clearfix">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <ul class="side-nav">
                <li class="heading">Actions</li>
                <li><a href="<?=base_url().'post/post';?>">List Posts</a></li>
                <li><a href="<?=base_url().'user/user';?>">List Users</a></li>
                <li><a href="<?=base_url().'user/user/newUser';?>">New User</a></li>
            </ul>
        </nav>
        <div class="users form large-9 medium-8 columns content">
            <?php extract($view); ?> <!-- Extract all of current single user data from controller -->
                <fieldset>
                    <legend>View User</legend>
                    <div class="input text required">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" readonly /> <!-- view name of current user data -->
                    </div>
                    <div class="input email required">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" readonly /> <!-- view email of current user data -->
                    </div>
                    <div class="input password required">
                        <label for="password">Password</label>
                        <input type="text" name="password" value="<?php echo $password; ?>" readonly /> <!-- view password of current user data -->
                    </div>
                    <div class="input text required">
                        <label for="created">Created</label>
                        <input type="text" name="created" value="<?php echo $created; ?>" readonly /> <!-- view created date of current user data -->
                    </div>
                    <div class="input text required">
                        <label for="modified">Modified</label>
                        <input type="text" name="modified" value="<?php echo $modified; ?>" readonly /> <!-- view modified date of current user data -->
                    </div>
                </fieldset>
                
        </div>
    </div>
<?php ?>