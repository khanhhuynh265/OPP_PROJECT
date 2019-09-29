<?php


class helper
{

    static function inputIn($cost,$req)
    {
        do{
            $cost = readline($req);

            if (is_numeric($cost)) {
                if(!((float) $cost != (int) $cost)){
                    return $cost;
                }
            }
        }while($cost >= 1 && $cost <= 5000);

    }


    static function inputPrice($cost,$req)
    {
        do {
            $cost = readline($req);
            if ($cost >= 10000 && $cost <= 100000000) {
                if(!((float) $cost != (int) $cost)){
                    return $cost;
                }
            }
        } while (is_numeric($cost));
    }

}

