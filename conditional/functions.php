<?php

function parNepar($broj)  {
    return ($broj % 2 == 0) ? "Broj je paran" : "Broj je neparan";
}

function provjeraGolfa(string $golf, array $golfNiz) {
    if(is_array($golfNiz)) {
        switch(true) {
            case array_search("Golf 2", $golfNiz):
                return "Nasli smo najboljeg golfa";
            case array_search('Golf 1', $golfNiz) && array_search('Golf 3', $golfNiz):
                return "Dobri su i ovi, ali ne i klasa";
            default:
                return "Niste napisali da trazite golfa";
        }
    } else {
        return "Nesto nije u redu sa podacima";
    }
}  
// Pitanje za konsultcije



function brojGodina($godine) {
    return ($godine >= 18) ? "vi ste punoljetni" : "vi ste maloljetni";
}