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
            <form method="post" accept-charset="utf-8" action="<?= base_url(); ?>user/user/createUser"> <!-- Form at view page which redirect data to controller(user) page to add new user data  -->
                <fieldset>
                    <legend>Add User</legend>
                
                    <div class="input text required">
                        <label for="name">Name</label>
                        <input type="text" name="name" required="required" maxlength="255" id="name" /><!-- Input field to set name of new user -->
                    </div>
                    <div class="input email required">
                        <label for="email">Email</label>
                        <input type="email" name="email" required="required" maxlength="255" id="email" /> <!-- Input field to set email of new user -->
                    </div>
                    <div class="input password required">
                        <label for="password">Password</label>
                        <input type="password" name="password" required="required" id="password" /> <!-- Input field to set password of new user -->
                    </div>
                </fieldset>
                <button type="submit">Submit</button> <!-- Submit the data to Controller -->
            </form>
        </div>
    </div>
<?php ?>