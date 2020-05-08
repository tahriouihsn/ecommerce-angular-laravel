import { CartService } from './../../../services/cart.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
cart;
  constructor(private cartservice:CartService) { }

  ngOnInit() {
    this.cartservice.makeCart();
  }


}
