<?php
// dd($database_all);
// SELECT gbts_table.SiteName,gbts_table.NodeName,egbts_table.Email,egbts_table.username,egbts_table.Address FROM gbts_table INNER JOIN egbts_table ON gbts_table.SiteName=egbts_table.SiteName
foreach ($database_all as $rec){
    foreach ($rec as $key => $value) {
        echo"==>". $key ."==>". $value ."<br>";
    }
    // echo "||";
    // print_r($rec['NodeName']);

    echo "<br>";
}
?><?php /**PATH C:\Users\nasim.khan\Documents\Nasim_PHP\Intern\resources\views/database_view.blade.php ENDPATH**/ ?>