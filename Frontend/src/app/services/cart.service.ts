import { Injectable } from '@angular/core';
import { ifStmt } from '@angular/compiler/src/output/output_ast';
import * as _ from 'lodash';
import { bind } from 'lodash';

@Injectable({
  providedIn: 'root'
})
export class CartService {
  public cart: any = [];
  constructor() { }
  makeCart() {
    if (!!!localStorage.getItem('cart')) {
    localStorage.setItem('cart', JSON.stringify(this.cart));
    } else {
    return;
  }
}
  cartLength() {
    return this.cart.length;
  }
  addProduct(id, product, quantity) {
    this.cart.push({...product, quantity});

  }
  getCart() {
    this.cart = JSON.parse(localStorage.getItem('cart'));
    console.log(this.cart);
  }
  setCart() {
    localStorage.setItem('cart', JSON.stringify(this.cart));
  }
  addProductCart(id, product, quantity: number) {
    if (this.cart.length === 0) {
      console.log('firstIf');
      return this.addProduct(id, product, quantity);
    }
    else {
      let exist = _.find(this.cart, function(cart) {
        if (cart.id == id) {
         return [cart.quantity = cart.quantity + quantity, true];
        }});
      if (!exist) {
          this.addProduct(id, product, quantity);
        }
      }
    }
}
