<?php require_once "ChiTietMay_OOP.php";
require_once "ChiTietPhuc.php";
require_once "ChiTietDon.php";
require_once "Kho.php";
require_once "helper.php";

class May {

    public $maSoMay;
    public $soLuong;
    public $dsChiTiet=[];
    public $tongTien=0;
    public $tongKhoiLuong=0;
    public $loai;

    public function nhap() {
        $this->maSoMay=helper:: inputIn($this->maSoMay, "Nhap ma so may: ");
        $this->soLuong=helper:: inputIn($this->soLuong, 'Ban muon nhap bao nhieu chi tiet may : ');
        echo ":::::::::::::::::::::::::::::::::::"."\n";
        for($i=0;
            $i<$this->soLuong;
            $i++) {
            do {
                $this->loai=helper:: inputIn($this->loai, '1> Nhap chi tiet don || 2> chi tiet phuc ');
            }
            while($this->loai!=1 && $this->loai!=2);
            $chiTiet=null;
            if($this->loai==1) {
                $chiTiet=new chiTietDon();
            }
            else {
                if($this->loai==2) {
                    $chiTiet=new chiTietPhuc();
                }
            }
            $chiTiet->nhap();
            array_push($this->dsChiTiet, $chiTiet);
        }
    }


    public function xuat() {
        echo "#################################"."\n";
        echo "May co ma so: ".$this->maSoMay."\n"."Bao gom cac chi tiet may"."\n"."==================================="."\n";
        foreach ($this->dsChiTiet as $item) {
            $item->xuat();
        }
    }


    public function tongGiaMay() {
        foreach ($this->dsChiTiet as $item) {
            $this->tongTien +=$item->tinhTien();
        }
        return $this->tongTien;
    }


    public function tongKhoiLuongMay() {
        foreach ($this->dsChiTiet as $item) {
            $this->tongKhoiLuong +=$item->tinhKhoiLuong();
        }
        return $this->tongKhoiLuong;
    }


    public function getMaMay() {
        return $this->maSoMay;
    }

}