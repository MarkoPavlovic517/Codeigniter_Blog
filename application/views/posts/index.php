<h2 class="title-category"><?= $title; ?></h2>
<br>
  <div class="container post-container">
    <?php foreach($posts as $post) : ?>
      <h3><?= $post['title']; ?></h3>
      <div class="row">
        <div class="col-md-3">
          <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
        </div>
        <div class="col-md-9">
          <small class="post-date">Posted on: <?=$post['created_at']; ?><span>&nbsp|&nbsp<b><?php echo $post['name']; ?></span></b></small><br>
          <?= word_limiter($post['body'], 60); ?>
          <br><br>
          <p><a class="btn btn-primary" href="<?=site_url('/posts/'.$post['slug']); ?>">Read more</a></p>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
    <div class="pagination-links">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
