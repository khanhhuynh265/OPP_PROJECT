<?php

include "helper.php";

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

class chiTietDon extends  Chitietmay
{
    private $gia;
    private $khoiLuong;

    public function nhap(){
        parent::nhap();
        $this->gia = helper::inputIn($this->gia, "Nhap gia: ");
        $this->khoiLuong= helper::inputIn($this->khoiLuong,'Nhap khoi luong: ');
        echo "_____________________"."\n";
    }
    public function xuat()
    {
        parent::xuat(); // TODO: Change the autogenerated stub
        echo "Gia :".$this->gia."\n";
        echo "Khoi luong :".$this->khoiLuong."\n";
        echo "========================"."\n";
    }
    public function tinhTien()
    {
        return $this->gia;
    }
    public function tinhKhoiLuong()
    {
        return $this->khoiLuong;
    }
}

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

class May {
    public $maSoMay;
    public $soLuong;
    public $dsChiTiet=[];
    public $tongTien = 0;
    public $tongKhoiLuong = 0;
    public $loai;
    
    public function nhap(){
        $this->maSoMay= helper::inputIn($this->maSoMay,"Nhap ma so may: ");
        $this->soLuong= helper::inputIn($this->soLuong,'Ban muon nhap bao nhieu chi tiet may :');
        echo ":::::::::::::::::::::::::::::::::::"."\n";
        for($i=0; $i<$this->soLuong;$i++)
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
            array_push($this->dsChiTiet,$chiTiet);
        }
        
    }
    public function xuat(){
        echo "#################################"."\n";
        echo "May co ma so: ".$this->maSoMay."\n"."Bao gom cac chi tiet may"."\n"."==================================="."\n";
        foreach ($this->dsChiTiet as $item){
            $item->xuat();
        }
    }
    public function tongGiaMay(){
        foreach ($this->dsChiTiet as $item){
            $this->tongTien += $item->tinhTien();
        }
        return $this->tongTien;
    }
    public function tongKhoiLuongMay(){
        foreach ($this->dsChiTiet as $item){
            $this->tongKhoiLuong += $item->tinhKhoiLuong();
        }
        return $this->tongKhoiLuong;
    }
    public function getMaMay(){
        return $this->maSoMay;
    }
}

class Kho
{
    public $ten;
    public $soluong;
    public $tien = 0;
    public $khoiLuong = 0;
    public $danhsach = [];
    public $maSo;

    public function nhapMay(){
        $this->soluong = helper::inputIn($this->soluong,"Ban muon nhap bao nhieu may : ");
        for ($i = 0 ; $i < $this->soluong ; $i++){
            $may= new May();
            $may->nhap();
            array_push($this->danhsach,$may);
        }
    }
    public function thongke(){
        echo ":::::::::::::: danh sach may trong kho ::::::::::::::\n";
        foreach ($this->danhsach as $item){
            $item->xuat();
        }
    }
    public function tinhTongTien(){
        foreach ($this->danhsach as $item){
            $item = $item->tongGiaMay();
            $this->tien += $item;
        }
        echo "Tong so tien may co trong kho la:\n ".$this->tien."\n";
    }
    public  function  tinhTongKhoiLuong(){
        foreach ($this->danhsach as $item){
            $item = $item->tongKhoiLuongMay();
            $this->khoiLuong += $item;
        }
        echo "Tong khoi luong trong kho la: \n".$this->khoiLuong."\n";
    }
    public function timMay(){
        $this->maSo = readline('Nhap ma so may ban muon tim :');
        foreach ($this->danhsach as $item){
            echo $item->getMaMay();
            if($item->getMaMay() == $this->maSo){
                echo "May ban muon tim la :::::::::::::::::::::::::::::::::: \n";
                $item->xuat();
            }else{
                echo "Ma so vua nhap khong co ket qua !";
            }
        }
    }
}

$kho= new Kho();
$kho->nhapMay();

do{
    $chon = readline('1. Thong ke || 2. Xuat tong gia cua kho || 3. Xuat tong trong luong kho || 4. Tim kiem may   ...');
}while($chon!= 1 && $chon != 2 && $chon != 3 && $chon != 4);

if($chon==1){
    $kho->thongke();
}else{
    if($chon==2){
        $kho->tinhTongTien();
    }else{
        if($chon==3){
            $kho->tinhTongKhoiLuong();
        }else{
            $kho->timMay();
        }
    }
}




