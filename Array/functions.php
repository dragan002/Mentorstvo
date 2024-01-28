<?php
    function Lotonumbers() {
    $Lotonumber = [];

    for($i = 0; $i < 7 ; $i++) {
        $Lotonumber[] = rand(0, 39);
    }

     return $Lotonumber = implode(', ', $Lotonumber);
}
?>