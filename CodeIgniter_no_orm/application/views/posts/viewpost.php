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
        <div class="posts form large-9 medium-8 columns content">
            <?php extract($view); ?> <!-- Extract all of current single post data from controller -->
     
            <fieldset>
                <legend>View Post</legend>
                    
                <div class="input text required">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?php echo $title; ?>" required="required" maxlength="255" id="title" readonly /> <!-- view title of current post data --> 
                </div>
                <div class="input textarea required">
                    <label for="body">Body</label>
                    <textarea name="body" required="required" id="body" rows="5" readonly><?php echo $body; ?></textarea> <!-- view body of current post data --> 
                </div>
                <div class="input select">
                    <label for="user-id">User</label>
                    <select name="user_id" id="user-id" readonly>
                        <option value="<?php echo $user_id; ?>"><?php echo $name; ?></option> <!-- view user-name of current post data --> 
                    </select>
                </div>
            </fieldset>               
        </div>
    </div>
<?php ?>