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
        if($calegory == 1 || $calegory == 2){
            return $calegory;
        }else{
            echo "##########Nhap sai !\n";
            self::inputcate($calegory,$req);
        }
    }
}

