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

	public function increase($item, $masp){
		if($item->giakhuyenmai == 0) {
            $item->dongia_or_giakhuyenmai = $item->dongia;
        } else {
            $item->dongia_or_giakhuyenmai = $item->giakhuyenmai;
        }
		if(empty($item->mamau))
			$item->mamau=1;
		if(empty($item->masize))
			$item->masize=1;
		$giohang = ['qty'=>0, 'price' => $item->dongia_or_giakhuyenmai, 'dongia' => $item->dongia, 'giakhuyenmai' => $item->giakhuyenmai,'mamau'=>$item->mamau,'masize'=>$item->masize,'hinhanh'=>$item->hinhanh, 'item' => $item];
        if($this->items){
            if(array_key_exists($masp, $this->items)){
                $giohang = $this->items[$masp];
            }
        }
        $giohang['qty']++;
        
        $giohang['price'] = $item->dongia_or_giakhuyenmai * $giohang['qty'];
        $this->items[$masp] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $item->dongia_or_giakhuyenmai;
    }

    public function add($item, $masp, $soluong){
		if($item->giakhuyenmai == 0) {
            $item->dongia_or_giakhuyenmai = $item->dongia;
        } else {
            $item->dongia_or_giakhuyenmai = $item->giakhuyenmai;
        }
		if(empty($item->mamau))
			$item->mamau=1;
		if(empty($item->masize))
			$item->masize=1;
		$giohang = ['qty'=>0, 'price' => $item->dongia_or_giakhuyenmai, 'dongia' => $item->dongia, 'giakhuyenmai' => $item->giakhuyenmai,'mamau'=>$item->mamau,'masize'=>$item->masize,'hinhanh'=>$item->hinhanh, 'item' => $item];
        if($this->items){
            if(array_key_exists($masp, $this->items)){
                $giohang = $this->items[$masp];
            }
        }
        
        $giohang['qty'] += $soluong;
        
        $giohang['price'] = $item->dongia_or_giakhuyenmai * $giohang['qty'];
        $this->items[$masp] = $giohang;
        $this->totalQty += $soluong;
        $this->totalPrice += ($item->dongia_or_giakhuyenmai * $soluong);
    }
        

	//xóa 1
	public function reduceByOne($masp){
		$this->items[$masp]['qty']--;
		$this->items[$masp]['price'] -= $this->items[$masp]['item']->dongia_or_giakhuyenmai;
		$this->totalQty--;
        $this->totalPrice -= $this->items[$masp]['item']->dongia_or_giakhuyenmai;

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
