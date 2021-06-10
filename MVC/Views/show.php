<?php include('header.php'); ?>
<div class="container">
<h2>Show Post</h2>
  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th>Thumb</th>
        <th>Title</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dt  as $value) : ?>      
      <tr>
        <td><img src="Views/images/<?= $value['image']; ?>" alt="" style="width: 200px; height:150px;"></td>
        <td><?= $value['title']; ?></td>
      </tr>
      <?php  endforeach  ?>
    </tbody>
  </table>
</div>
<?php include('footer.php'); ?>