<?php
ob_start();
?>
    <div>
        Citation de la semaine
    </div>
<?php
$content= ob_get_clean();

require_once 'template.php';