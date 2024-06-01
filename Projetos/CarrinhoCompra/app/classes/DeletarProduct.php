<?php

namespace app\classes;
use app\traits\VerificarProductInCart;

class DeletarProduct extends Action{
    use VerificarProductInCart;
    public function deletarProduct(){
        if ($this->productIsExistInCart($this->cart, $this->product) == true){
            $this->cart[$this->product]["Quantidade"] -= 1;
            if ($this->cart[$this->product]["Quantidade"] == 0){
                unset($this->cart[$this->product]);
            }
            $this->Cart->setCart($this->cart);
        }
    }
    public function zerarProduct(){
        if ($this->productIsExistInCart($this->cart, $this->product) == true){
            unset($this->cart[$this->product]);
            $this->Cart->setCart($this->cart);
        }
    }
        
}