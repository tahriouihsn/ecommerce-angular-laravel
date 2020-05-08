import { Profile } from './../models/profile';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { TokenService } from './token.service';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
export interface LoginResponse {
  success: boolean;
  message: string;
}
@Injectable({
  providedIn: 'root'
})

export class AuthService {


  ROOT_URL='http://localhost:8000/api';
  constructor(private http: HttpClient,private Token: TokenService) { }

  private loggedIn = new BehaviorSubject<boolean>(this.Token.loggedIn());
  authStatus = this.loggedIn.asObservable();

  changeAuthStatus(value: boolean) {
    this.loggedIn.next(value);
  }

  login(data){
   return this.http.post<LoginResponse>(`${this.ROOT_URL}/login`,data).pipe(
    catchError(this.handleError)
);
  }
  register(data){
   return this.http.post<Profile>(`${this.ROOT_URL}/register`,data);
  }
  handleError(error) {

    return throwError(error.message || 'Server Error');
}
}
