  <h2>List of Pictures</h2>
  <?php if(count($picture_list)){?>
	  <table class="table table-bordered">
		<thead>
		  <tr>
			<th>Title</th>
			<th>Description</th>
			<th>Thumbnail</th>
			<th>Edit</th>
			<th>Delete</th>
		  </tr>
		</thead>
		<tbody>
		<?php foreach ($picture_list as $pic): ?>
		  <tr>
			<td><?=$pic->pic_title;?></td>
			<td><?=$pic->pic_desc;?></td>

			<td><a href="<?=base_url().'assets/uploads/'.$pic->pic_file;?>" target="_blank"><img src="<?=base_url().'assets/uploads/'.$pic->pic_file;?>" width="100"></a></td>

			<td><a href="<?php echo site_url('upload/edit/'.$pic->pic_id); ?>">Edit</a></td>

			<td><a href="<?php echo site_url('upload/delete/'.$pic->pic_id); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
		  </tr>
		<?php endforeach ?>
		</tbody>
	  </table>
	  <br />
	  <a href="<?=base_url().'upload/form';?>" class="btn btn-primary">Upload More</a>
  <?php } else { ?>
    <h4>No Pictures have been uploaded!. Click this button to <a href="<?=base_url().'upload/form';?>" class="btn btn-primary">upload</a></h4>            
  <?php } ?>