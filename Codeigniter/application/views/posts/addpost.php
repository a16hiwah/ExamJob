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
            <form method="post" accept-charset="utf-8" action="<?= base_url(); ?>post/post/createPost"> <!--Add Form at view page which redirect data to controller(post) page to add new post data  -->
                
                <fieldset>
                    <legend>Add Post</legend>
                    <?php if ($this->session->flashdata()) { ?>
                    <div class="alert alert-warning">
                        <?= $this->session->flashdata('msg'); ?>
                    </div>
                    <?php } ?>
                    <div class="input text required">
                        <label for="title">Title</label>
                        <input type="text" name="title" required="required" maxlength="255" id="title" /> <!-- Input field to set title of current post -->
                    </div>
                    <div class="input textarea required">
                        <label for="body">Body</label>
                        <textarea name="body" required="required" id="body" rows="5"></textarea> <!-- Textarea field to set body of current post -->
                    </div>
                    <div class="input select">
                        <label for="user-id">User</label>
                        
                        <select name="user_id" id="user-id">
                            <?php foreach($users as $user){ ?> <!-- Dropdown field to set user of current post -->
                            <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                            <?php }?>
                        </select>
                    </div>

                </fieldset>
                <button type="submit">Submit</button> <!-- Submit the form to controller -->
            </form>
        </div>
    </div>
<?php ?>