<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $post['title']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Body</label>
    <div class="col-sm-10">
      <textarea id="editor1" class="form-control" name="body"><?php echo $post['body']; ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Post</button>
    </div>
  </div>
</form>
