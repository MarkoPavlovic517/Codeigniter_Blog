<h2 class="title-category"><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/edit'); ?>
  <input type="hidden" name="id" value="<?= $post['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title" value="<?=$post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control" id="editor1" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category_id">
      <?php foreach($categories as $category) : ?>
        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
