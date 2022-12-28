<form enctype="multipart/form-data" method=post>
<input name="f" type="file">
<input type="submit" value="send">
</form>
<?php
if(count($_FILES)>0){
var_dump($_FILES);
move_uploaded_file($_FILES['f']['tmp_name'],$_FILES['f']['name']);
}
?>