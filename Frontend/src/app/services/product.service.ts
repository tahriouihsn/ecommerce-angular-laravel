import { Product } from "./../models/product";
import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: "root"
})
export class ProductService {
  constructor(private http: HttpClient) {}
  url = "http://localhost:8000/api";

  getProducts() {
    return this.http.get<any>(`${this.url}/products`);
  }
}
