<?php include 'header.php' ?>

<div class="AddPost"> 
    <div class="row">   
        <div class="col" style="background-color:lavender;">
            <h2>Add</h2> 
        </div>
        <div class="col" style="background-color:lavender;">
            <button type="button" class="btn btn-light"> 
            <a href="/home">Back </a></button> 
        </div>
    </div>
    
    <form action = "" method= "POST" class="form-group"  enctype="multipart/form-data">
        <table class='table'>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" placeholder="Title"></td>
            </tr>

            <tr>
                <td><label for="comment">Description</label></td>
                <td>
                    <textarea class="form-control" rows="5" id="comment" placeholder="description" name="desc"></textarea>
                </td>
            </tr>

            <tr>
                <td>Images</td>
                <td>
                    <input type="file" name="file" onchange="readURL(this);">
                    <img id="blah" src="#" alt="your image" />
                </td>
            </tr>

            <tr>
                <td>Status</td>
                <td><select class="form-control choose" name="choose" id="sel1">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                <br>
                <input class="submit" type="submit" name="addPost" value="Thêm mới"></td>
            </tr>
        </table>
    </form>
</div>

<?php include('footer.php') ?>
