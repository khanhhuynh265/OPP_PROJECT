<?php

require_once "ChiTietMay_OOP.php";
require_once "ChiTietDon.php";
require_once "Kho.php";
require_once  "May.php";
require_once "helper.php";

class chiTietPhuc extends Chitietmay
{
    public $soluong;
    public $chitietcon= [];
    public $loai;

    public function nhap(){
        parent::nhap();
        $this->soluong= helper::inputIn($this->soluong,'Ban muon nhap bao nhieu chi tiet con: ');
        for( $i=0 ; $i < $this->soluong ; $i++)
        {
            do{
                $this->loai= helper::inputIn($this->loai,'1> Nhap chi tiet don || 2> chi tiet phuc ');
            }while($this->loai!=1 && $this->loai!=2);

            $chiTiet = null;
            if($this->loai==1){
                $chiTiet = new chiTietDon();

            }else{
                if($this->loai==2){
                    $chiTiet = new chiTietPhuc();
                }
            }
            $chiTiet->nhap();
            array_push($this->chitietcon,$chiTiet);
        }
    }


    public function xuat(){
        foreach ($this->chitietcon as $item)
        {
            $item->xuat();
        }

    }


    public function tinhTien()
    {
        $tong=0;
        foreach ($this->chitietcon as $item)
        {
            $tong += $item->tinhTien();
        }
        return $tong;
    }


    public function tinhKhoiLuong()
    {
        $tong=0;
        foreach ($this->chitietcon as $item)
        {
            $tong += $item->tinhKhoiLuong();
        }
        return $tong;
    }

}