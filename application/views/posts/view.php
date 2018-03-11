<h2 class="title-category"><?=$post['title']; ?></h2>
  <small class="post-date">Posted on: <?=$post['created_at']; ?><span>&nbsp|&nbsp<b><?php echo $category_name; ?></span></small><br>
  <img class="" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
  <br><br>
  <div class="post-body">
    <?=$post['body']; ?>
  </div>

  <?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
<hr>
<a class="btn btn-primary float-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<?php echo form_open('posts/delete/'.$post['id']); ?>
  <input class="btn btn-danger" type="submit"  value="Delete">
</form>
  <?php endif; ?>
<hr>

<?php if($comments) : ?>
  <?php foreach($comments as $comment) : ?>
      <div class="well">
        <h5><?= $comment['body']; ?> by <strong><?= $comment['name']; ?></strong></h5>---
      </div>
  <?php endforeach; ?>
<?php else : ?>
  <p>No comments for this post yet.</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
<div class="form-group">
  <label>Name</label>
  <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
  <label>Email</label>
  <input type="text" class="form-control" name="email">
</div>
<div class="form-group">
  <label>Comment</label>
  <textarea type="text" class="form-control" name="body"></textarea>
</div>
<input type="hidden" name="slug" value="<?=$post['slug']; ?>">
<button type="submit" class="btn btn-primary" name="submit">Send comment</button>
</form>
