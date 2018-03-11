<div class="row">
  <div class="col-md-4 offset-md-4">
    <h2 class="title-category text-center"><?= $title; ?></h2>
    <ul class="list-group">
      <?php foreach($categories as $category) : ?>
        <li class="list-group-item"><a href="<?= site_url('/categories/posts/'.$category['id']); ?>"><?=$category['name']; ?></a>
      <?php if($this->session->userdata('user_id') == $category['user_id']) : ?>
          <form class="cat-delete" action="categories/delete/<?php echo $category['id']; ?>" method="post">
            <input type="submit" class="btn-link text-danger" value="[X]">
          </form>
        </li>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
</div>
