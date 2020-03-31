<?php ?>
    <div class="container clearfix">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <ul class="side-nav">
                <!-- Right side menubar -->
                <li class="heading">Actions</li>
                <li><a href="<?=base_url().'post/post/addPost';?>">New Post</a></li>
                <li><a href="<?=base_url().'user/user';?>">List Users</a></li>
                <li><a href="<?=base_url().'user/user/newUser';?>">New User</a></li>
            </ul>
        </nav>
        <div class="posts index large-9 medium-8 columns content">
            <h3>Posts</h3>
            <?php if ($this->session->flashdata()) { ?> <!-- Success message show here -->
                <div class="alert alert-warning">
                    <?= $this->session->flashdata('msg'); ?>
                 </div>
            <?php } ?>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><a href="#">Id</a></th>
                        <th scope="col"><a href="#">Title</a></th>
                        <th scope="col"><a href="#">User</a></th>
                        <th scope="col"><a href="#">Created</a></th>
                        <th scope="col"><a href="#">Modified</a></th>
                        <th scope="col" class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- fetch data from controller -->
                    <?php foreach ($posts->result() as $post) { ?>        
                    <tr>
                        <td><?php echo $post->id; ?></td>
                        <td><?php echo $post->title; ?></td>
                        <td><?php echo $post->user_id; ?></td>
                        <td><?php echo $post->created; ?></td>
                        <td><?php echo $post->modified; ?></td>
                        <td class="actions"> <!-- Actions redirect to controller -->
                            <a href="<?php echo base_url(); ?>post/post/view/<?php echo $post->id; ?>">View</a> 
                            <a href="<?php echo base_url(); ?>post/post/edit/<?php echo $post->id; ?>">Edit</a>
                            <a href="<?php echo base_url(); ?>post/post/delete/<?php echo $post->id; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php }  ?>                        
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination"> <!-- pagination links -->
                    <?php if (strlen($pagination)) {
                        echo $pagination;} ?>
                </ul>
                <p><?php echo $pagination_des; ?></p> <!-- pagination description -->
            </div>
        </div>
    </div>
<?php ?>