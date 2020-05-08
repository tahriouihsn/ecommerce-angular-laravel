import { CartService } from './../../services/cart.service';
import { Product } from './../../models/product';
import { ProductDetailService } from './../../services/product-detail.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { MatSnackBar } from '@angular/material';
import { FormControl } from '@angular/forms';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {
  product:any[]=[];
  Image;
  quantity:number=1;
  cart=[];
  some;
  id;

  Activated=false;
  constructor(private activatedroute: ActivatedRoute, private productDetailService:ProductDetailService,
    private _snackBar: MatSnackBar, private cartService:CartService) {

   }

  ngOnInit() {

    this.activatedroute.params.subscribe(params => {

      this.productDetailService.getDetails(params.id)
          .subscribe((res: any[]) => {
            this.id=res['data'].id;
            this.product = res['data'];
            this.Image=res['data'].images[0].path;

          })
    })




    this.Activated=true;

  }
  addToCart(){
    this.cartService.getCart();
    this.cartService.addProductCart(this.id,this.product,this.quantity);
    this.cartService.setCart();

    }

    openSnackBar(message: string, action: string) {
      this._snackBar.open(message, action, {
        duration: 2000,
      });
    }



  changeImg(img){
    return this.Image=img;
  }
  addOne(){
    return this.quantity=this.quantity+1;
  }
  minOne(){
    if(this.quantity>1){
      return this.quantity=this.quantity-1;
    }
    return ;


  }

}
