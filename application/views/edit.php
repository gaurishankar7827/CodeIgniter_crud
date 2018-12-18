<h3>Upload a picture!</h3>
<hr />

<div style="color:red">
  <?php echo validation_errors(); ?>
  <?php if(isset($error)){print $error;}?>
</div>
<?php // echo form_open_multipart('upload/edit/'.$pic_id['pic_id']);?>
<?php echo form_open('upload/edit/'.$pic_id['pic_id']); ?>

  <div class="form-group">
    <label for="pic_title">Picture Title*:</label>
    <input type="text" class="form-control" name="pic_title" value="<?= set_value('<?=$pic->pic_title;?>'); ?>" id="pic_title">
    </input>
  </div>
  <div class="form-group">
    <label for="pic_desc">Picture Description:</label>
    <textarea name="pic_desc" class="form-control" id="pic_desc" value="<?= set_value('<?=$pic->pic_desc;?>'); ?>"></textarea>
  </div>
 <!--  <div class="form-group">
    <label for="pic_file">Select Image*:</label>
    <input type="file" name="pic_file" class="form-control"  id="pic_file">   
  </div> -->
  <a href="<?=base_url();?>" class="btn btn-warning">Back</a>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

