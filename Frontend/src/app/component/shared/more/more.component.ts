import { Product } from "./../../../models/product";
import { ProductService } from "./../../../services/product.service";
import { Component, OnInit } from "@angular/core";

import { log } from "util";

@Component({
  selector: "app-more",
  templateUrl: "./more.component.html",
  styleUrls: ["./more.component.css"]
})
export class MoreComponent implements OnInit {
  products: any = [];
  productAvaible=false;
  constructor(private productSerivce: ProductService) {}

  ngOnInit() {
    this.getpro();

  }

  getpro() {
    this.productSerivce.getProducts().subscribe(res => {
      this.products = res;
      this.productAvaible=true;

    });
  }
}
