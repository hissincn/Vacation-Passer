<?php
require ('function.php');






if (isset($_POST['log'])) {
    $date='"'.date('Y-m-d', time()).'"';
    $logsql='"'.$_POST['log'].'"';
    getsql("INSERT INTO log (date,log) VALUES ($date, $logsql)");
    echo "<script type=\"text/javascript\">window.location='https://xk.hissin.cn/logsub.php'</script>";


}

?>
<html>
<form method="POST" action="logsub.php">
<input type="textarea" id="log" name="log">
<input type="submit">

</form>


</html>