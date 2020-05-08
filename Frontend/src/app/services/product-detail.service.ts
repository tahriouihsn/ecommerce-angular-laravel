import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ProductDetailService {
  url="http://localhost:8000/api/products";
  constructor(private http:HttpClient) { }
  getDetails(id:number){
    return this.http.get(`${this.url}/${id}`)
  }
}
