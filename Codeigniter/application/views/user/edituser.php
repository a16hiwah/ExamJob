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
            <?php extract($edit); ?> <!-- Extract all of current single user data from controller -->
            <form method="post" accept-charset="utf-8" action="<?= base_url(); ?>user/user/update/<?php echo $id; ?>"> <!-- Form at view page which redirect data to controller(user) page to edit current user data  -->
                <fieldset>
                    <legend>Edit User</legend> 
                    <div class="input text required">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" required="required" maxlength="255" id="name" /> <!-- view editable name of current user data -->
                    </div>
                    <div class="input email required">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" required="required" maxlength="255" id="email" /> <!-- view editable email of current user data -->
                    </div>                    
                </fieldset>
                <button type="submit">Submit</button> <!-- submit button to submit the form -->
            </form>
        </div>
    </div>
<?php ?>