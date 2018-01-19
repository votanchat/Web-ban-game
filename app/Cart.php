<?php

namespace App;
use App\Game;
class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		if(isset($item->khuyenMai)){
			$giohang = ['qty'=>0, 'price' => $item->gia*$item->khuyenMai->soPhanTramKm/100, 'item' => $item];
		}
		else{
		$giohang = ['qty'=>0, 'price' => $item->gia, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $giohang['price'];
	}
	public function addnhieu($item, $id, $soluong){
		if(isset($item->khuyenMai)){
			$giohang = ['qty'=>$soluong, 'price' => $item->gia*$item->khuyenMai->soPhanTramKm/100, 'item' => $item];
		}
		else{
		$giohang = ['qty'=>$soluong, 'price' => $item->gia, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
				$this->totalQty-= $giohang['qty'];
				$giohang['qty'] = $soluong;
			}
		}
		$this->items[$id] = $giohang;
		$this->totalQty+=$soluong;
		$this->totalPrice += $giohang['price'];
	}
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
