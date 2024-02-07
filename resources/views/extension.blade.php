<?php
$extensions = get_loaded_extensions();

echo "Installed PHP Extensions:\n";

foreach ($extensions as $extension) {
    echo $extension . "\n";
}
?>
