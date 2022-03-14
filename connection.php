<?php
//connection for users
 $db = mysqli_connect('localhost', 'id15248527_cwtxyzu', 'LvatunB0212!') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'id15248527_user_system' ) or die(mysqli_error($db));
?>