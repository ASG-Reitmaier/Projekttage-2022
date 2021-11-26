
<?php
move_uploaded_file($_FILES['datei']['tmp_name'], 'uploads/'.$_FILES['datei']['name']);
?>