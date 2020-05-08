import { ProductService } from './../../../services/product.service';
import { Component, OnInit } from "@angular/core";
import { OwlOptions } from "ngx-owl-carousel-o";

@Component({
  selector: "app-rank",
  templateUrl: "./rank.component.html",
  styleUrls: ["./rank.component.css"]
})
export class RankComponent implements OnInit {
  products: any = [];
  productAvaible=false;
  constructor(private productSerivce: ProductService) {}
  ngOnInit() {
    this.getpro();

  }
  isDragging: boolean = true;

  customOptions: OwlOptions = {
    loop: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    dots: false,
    navSpeed: 400,
    navText: ["", ""],

    responsive: {
      0: {
        items: 1
      },
      200: {
        items: 2
      },
      400: {
        items: 3
      },
      600: {
        items: 4
      },
      800: {
        items: 5
      }
    },
    nav: false
  };
  getpro() {
    this.productSerivce.getProducts().subscribe(res => {
      console.log(res);
      this.products = res;
      this.productAvaible=true;

    });
  }
}
