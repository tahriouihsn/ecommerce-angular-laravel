import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { shareReplay } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  ROOT_URL='http://localhost:8000/api';
  constructor(private http:HttpClient) { }
  getUser(){
    return this.http.get(`${this.ROOT_URL}/profile`).pipe(shareReplay(1));
  }
}
