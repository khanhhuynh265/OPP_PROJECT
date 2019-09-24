<?php


class helper
{
    static function inputIn($cost,$req)
    {
        $cost = readline($req);
        if (is_numeric($cost)) {
            return $cost;
        } else {
            self::inputIn($cost,$req);
        }
    }
    static function inputcate($calegory, $req){
        $calegory= readline($req);
        if(is_numeric($calegory)){
            switch($calegory)
            {
                case 1:
                    return $calegory;break;
                case 2:
                    return $calegory;break;
                default:
                    self::inputcate($calegory,$req);
            }

        }else{
            self::inputcate($calegory,$req);
        }
    }
}

