<?php require_once "ChiTietMay_OOP.php";
require_once "ChiTietPhuc.php";
require_once "ChiTietDon.php";
require_once "May.php";
require_once "helper.php";

class Kho {

    private $soluong;
    protected $tien=0;
    protected $khoiLuong=0;
    protected $danhsach=[];
    private $maSo;


    public function nhapMay() {
        $this->soluong=helper:: inputIn($this->soluong, "Ban muon nhap bao nhieu may : ");
        for ($i=0; $i < $this->soluong; $i++) {
            $may=new May();
            $q = $i + 1;
            echo "Nhap may ".$q." :\n ";
            $may->nhap();
            array_push($this->danhsach, $may);
        }
    }


    public function thongke() {
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
        echo ":::::::::::::: danh sach may trong kho ::::::::::::::\n";
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
        foreach ($this->danhsach as $item) {
            $item->xuat();
        }
    }


    public function tinhTongTien() {
        foreach ($this->danhsach as $item) {
            $item=$item->tongGiaMay();
            $this->tien +=$item;
        }
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
        echo "Tong so tien may co trong kho la:\n ".number_format($this->tien)." VND \n";
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
    }


    public function tinhTongKhoiLuong() {
        foreach ($this->danhsach as $item) {
            $item=$item->tongKhoiLuongMay();
            $this->khoiLuong +=$item;
        }
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
        echo "Tong khoi luong trong kho la: \n".number_format($this->khoiLuong)."\n";
        echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
    }


    public function timMay() {
        $this->maSo=readline('Nhap ma so may ban muon tim :');
        foreach ($this->danhsach as $item) {
            if($item->getMaMay()==$this->maSo) {
                echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
                echo "May ban muon tim la :::::::::::::::::::::::::::::::::: \n";
                $item->xuat();
                echo ":::::::::::::::::::::::::::::::::::::::::::::::::::::\n";
            }
            echo "\n\n\n\n";
        }
    }
}


$kho=new Kho();
$kho->nhapMay();


do {
    do {
        $chon=readline('1. Thong ke || 2. Xuat tong gia cua kho || 3. Xuat tong trong luong kho || 4. Tim kiem may   ...');
    }
    while($chon!=1 && $chon !=2 && $chon !=3 && $chon !=4);
    switch($chon) {
        case 1: $kho->thongke();
            break;
        case 2: $kho->tinhTongTien();
            break;
        case 3: $kho->tinhTongKhoiLuong();
            break;
        case 4: $kho->timMay();
            break;
        default: break;
    }
    $next=readline('Nhap 1 de ket thuc chuong trinh...');

} while($next !=1);