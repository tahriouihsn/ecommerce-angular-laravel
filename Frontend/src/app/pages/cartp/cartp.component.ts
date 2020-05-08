import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cartp',
  templateUrl: './cartp.component.html',
  styleUrls: ['./cartp.component.css']
})
export class CartpComponent implements OnInit {
cart=JSON.parse(localStorage.getItem('cart'));
empty:boolean;
  constructor() { }

  ngOnInit() {
  }
  getCart(){
    if(this.cart.length===0){
      this.empty=true;
    }
  }

}
