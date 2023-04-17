<?php
if(isset($_POST["execute"])) {

    shell_exec("sudo i2cset -y 1 0x20 0x14 0x01");
   
    //shell_exec("/usr/sbin/i2cset -y 1 0x20 0x14 0x01");
    //$output = shell_exec("i2cset -y 1 0x20 0x14 0x01");
    //echo "<pre>$output</pre>";
}
?>
