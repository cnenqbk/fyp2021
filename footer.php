<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
?>
<style>
.footer {
    text-align: center;
    padding: 5px;
    background-color: black;
    color: white;
    display:table-footer-group;
    position: absolute;
    padding-bottom: 5px;
    bottom: 0;
    position: absolute;
    width: 100%;
}


</style>

<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by CWTXYZ All Right Reserved</p>
    </div>
</div>
