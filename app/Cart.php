<?php

namespace App;

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

	public function add($item, $masp){
		 $giohang = ['qty'=>0, 'price' => $item->dongia_or_giakhuyenmai, 'dongia' => $item->dongia, 'giakhuyenmai' => $item->giakhuyenmai, 'item' => $item];
        if($this->items){
         if(array_key_exists($masp, $this->items)){
          $giohang = $this->items[$masp];
         }
        }
        $giohang['qty']++;
        if($item->giakhuyenmai == 0) {
         $item->dongia_or_giakhuyenmai = $item->dongia;
        } else {
         $item->dongia_or_giakhuyenmai = $item->giakhuyenmai;
        }
        $giohang['price'] = $item->dongia_or_giakhuyenmai * $giohang['qty'];
        $this->items[$masp] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $item->dongia_or_giakhuyenmai;
       
	}
	//xóa 1
	public function reduceByOne($masp){
		$this->items[$masp]['qty']--;
		$this->items[$masp]['price'] -= $this->items[$masp]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$masp]['item']['price'];
		if($this->items[$masp]['qty']<=0){
			unset($this->items[$masp]);
		}
	}
	//xóa nhiều
	public function removeItem($masp){
		$this->totalQty -= $this->items[$masp]['qty'];
		$this->totalPrice -= $this->items[$masp]['price'];
		unset($this->items[$masp]);
	}
	//Cập nhật giỏ hàng
	public function update($rowId, $qty)
    {
        $cartItem = $this->get($rowId);

        if ($qty instanceof Buyable) {
            $cartItem->updateFromBuyable($qty);
        } elseif (is_array($qty)) {
            $cartItem->updateFromArray($qty);
        } else {
            $cartItem->qty = $qty;
        }

        $content = $this->getContent();

        if ($rowId !== $cartItem->rowId) {
            $content->pull($rowId);

            if ($content->has($cartItem->rowId)) {
                $existingCartItem = $this->get($cartItem->rowId);
                $cartItem->setQuantity($existingCartItem->qty + $cartItem->qty);
            }
        }

        if ($cartItem->qty <= 0) {
            $this->remove($cartItem->rowId);
            return;
        } else {
            $content->put($cartItem->rowId, $cartItem);
        }

        $this->events->fire('cart.updated', $cartItem);

        $this->session->put($this->instance, $content);

        return $cartItem;
    }


}
