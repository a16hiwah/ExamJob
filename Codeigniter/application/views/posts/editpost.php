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
            <?php extract($edit); ?> <!-- Extract all of current single post data from controller -->

            <form method="post" accept-charset="utf-8" action="<?= base_url(); ?>post/post/update/<?php echo $id; ?>"><!-- Edit Form at view page which redirect data to controller(post) page to edit current post data  -->
                
                <fieldset>
                    <legend>Edit Post</legend>
                    
                    <div class="input text required">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" required="required" maxlength="255" id="title" /> <!-- view editable title of current post data -->
                    </div>
                    <div class="input textarea required">
                        <label for="body">Body</label>
                        <textarea name="body" required="required" id="body" rows="5"><?php echo $body; ?></textarea> <!-- view editable body of current post data -->
                    </div>
                    <div class="input select">
                        <label for="user-id">User</label> 
                        
                        <select name="user_id" id="user-id"> 
                            <option value="<?php echo $user_id; ?>"><?php echo $name; ?></option> <!-- view current post user-name -->
                            <?php foreach($users as $user){ ?><!-- editable dropdown of current post user-name -->
                            <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                            <?php }?>
                        </select>
                    </div>

                </fieldset>
                <button type="submit">Submit</button> <!-- submit button to submit the form -->
            </form>
        </div>
    </div>
<?php ?>