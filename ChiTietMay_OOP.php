<?php

require_once "May.php";
require_once "Kho.php";
require_once "helper.php";
require_once "ChiTietPhuc.php";
require_once "ChiTietDon.php";

abstract class Chitietmay
{
    private $maso;

    public function nhap(){
        $this->maso= helper::inputIn($this->maso,'Nhap ma chi tiet: ');
    }


    public  function xuat(){
        echo "ma so: ".$this->maso."\n";
    }


    public abstract  function tinhTien();
    public abstract function tinhKhoiLuong();

    public function getMaSo(){
        echo $this->maso;
    }

}













