<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ci Blog</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main.css">
    <script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
     <a class="navbar-brand" href="<?= base_url(); ?>">Ci Blog</a>
         <ul class="navbar-nav mr-auto">
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>posts">Blog</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>categories">Categories</a>
           </li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <?php if(!$this->session->userdata('logged_in')) : ?>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>users/login">Login</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>users/register">Register</a>
           </li>
         <?php endif; ?>
         <?php if($this->session->userdata('logged_in')) : ?>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>posts">Welcome, <?= ucfirst($this->session->userdata('username')); ?></a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>posts/create">Create Post</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>categories/create">Create Category</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="<?= base_url(); ?>users/logout">Logout</a>
           </li>
          <?php endif; ?>
         </ul>
       </div>
     </nav>

     <div class="container">
       <!-- Flash massages -->
       <?php if($this->session->flashdata('user_registered')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('user_logged_in')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('user_logged_out')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('login_failed')) : ?>
         <?php echo '<p class="alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('post_created')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('post_updated')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('post_deleted')) : ?>
         <?php echo '<p class="alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('category_created')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('category_deleted')) : ?>
         <?php echo '<p class="alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
       <?php endif; ?>
