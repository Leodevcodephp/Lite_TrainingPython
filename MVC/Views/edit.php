<?= include('header.php'); ?>

<div class="EditPost"> 
    <div class="row">
        <div class="col" style="background-color:lavender;">
            <h2>Edit</h2> 
        </div>
        <div class="col" style="background-color:lavender;">
            <button type="button" class="btn btn-light"><a href="/home">Back</a></button> 
            <button type="button" class="btn btn-primary"><a href="/add">New</a></button>        
        </div>
    </div>

    <form action = "" method= "POST" class="form-group"  enctype="multipart/form-data">
        <table class='table'>
            <tr>
                <td>Tiile</td>
                <td><input type="text" name="title" placeholder="tiêu đề" value="<?= $data['title']; ?>" ></td>
            </tr>

            <tr>
                <td><label for="comment">Description</label></td>
                <td><textarea class="form-control" rows="5" id="comment" placeholder="description" name="desc"><?= $data['description']; ?> </textarea></td>
            </tr>

            <tr>
                <td>Images</td>
                <td>
                    <input type="file" name="file" onchange="readURL(this);">
                    <img style="width: 150px; height: 150px;" id="blah" src="Views/images/<?= $data['image']; ?>"/>
                </td>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    <select class="form-control choose" name="choose" id="sel1" style="width: 110px;">
                        <option value="1" <?php if($data['status'] == 1 ){echo 'selected="selected"';}?>>Enable</option>
                        <option value="0" <?php if($data['status'] == 0 ){echo 'selected="selected"';}?>>Disable</option>
                    </select>
                    <br>
                    <input class="submit" type="submit" name="editPost" value="Summit" style="width: 110px;">
                </td>
            </tr>
        </table>
    </form>
</div>
<?= include("footer.php"); ?>