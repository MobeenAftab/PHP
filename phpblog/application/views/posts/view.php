<h2><?php echo $post['title']; ?></h2>
<section class="post-body">
  <small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
  <?php echo $post['body']; ?>
</section>

<div class="row">
  <div class="col-sm-3 pull-left">
    <a class="btn btn-default" href="<?php echo base_url();?>posts/edit/<?php echo $post['slug'];?>">Edit</a>
  </div>
  <div class="col-offset-sm-7 pull-right">
    <?php echo form_open('posts/delete/'.$post['id']); ?>
      <input type="submit" class="btn btn-danger" name="delete" value="Delete">
    </form>
  </div>
</div>
