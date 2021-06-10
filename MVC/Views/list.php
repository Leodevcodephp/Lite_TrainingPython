<?php include ('header.php'); ?>
<div class="container">
  <div class="row">
    <div class="col" style="background-color:lavender;">
      <h2>List</h2> 
    </div>
    <div class="col" style="background-color:lavender;">
      <button type="button" class="btn btn-primary"><a href="/home">Back</a></button>        
    </div>
  </div>
    <hr>

  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th>id</th>
        <th>Thumb</th>
        <th>Title</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dt  as $value): ?>
      <tr>
        <td><?php echo $value['id']; ?></td>
        <td><img src="Views/images/<?php echo $value['image']; ?>" alt="" style="width: 200px; height:150px;"></td>
        <td><?php echo $value['title']; ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?php include('footer.php'); ?>