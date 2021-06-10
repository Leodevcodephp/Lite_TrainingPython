<?php
  include 'header.php';
?>

<div class="container well">
  <div class="row">
    <div class="col" style="background-color:lavender;">
      <h2>MANAGE</h2> 
    </div>
    <div class="col" style="background-color:lavender;">
      <button type="button" class="btn btn-primary">
        <a href="/add">New</a>
      </button>        
    </div>
  </div>
  <hr>
  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th>id</th>
        <th>Thumb</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($afk as $value) : ?>
        <tr>
          <td><?= $value['id']; ?></td>
          <td><img src="Views/images/<?= $value['image']; ?>" alt="" style="width: 200px; height:150px;"></td>
          <td><?= $value['title']; ?></td>
          <td><?php  if ($value['status'] ==1) echo 'Enable'; else echo 'Disable'; ?></td>
          <td>
            <a href="/show">Show</a>||
            <a href="/edit/<?= $value['id'];?>">Edit</a>|| 
            <a onclick="return comfirm('Are U sure about that?')" href="/delete/<?= $value['id'];?>">Del</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  
  <div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
            <?php for($i =1; $i<= $pages; $i++) : ?>
            <li><a href="/home/<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
				  </ul>
				</nav>
			</div>

			<div class="text-center" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="#">
					<select name="limit-records" id="limit-records">
						<!-- <option disabled="disabled" selected="selected">---Limit Records---</option> -->
						<?php foreach([1,2,3,5] as $limit): ?>
							<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo 'selected="selected"'; $choose = $limit?> value="<?= $choose; ?>"><?= $choose; ?></option>
						<?php endforeach; ?>
					</select>
				</form>
			</div>
		</div>
</div>
<?php include('footer.php'); ?>
