import { TokenService } from './../../services/token.service';
import { AuthService } from './../../services/auth.service';
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { Router } from '@angular/router';

@Component({
  selector: "app-login",
  templateUrl: "./login.component.html",
  styleUrls: ["./login.component.css"]
})
export class LoginComponent implements OnInit {
  public loggedIn: boolean;
  public error: any;
  Onloading:boolean=false;
  constructor(private Token: TokenService,
    private router: Router,
    private Auth: AuthService) {}

  ngOnInit() {
    this.InitLogin();
  }
  //Validtion form Login
  login = new FormGroup({
    email: new FormControl("", [Validators.required,Validators.email]),
    password: new FormControl("", [Validators.required,Validators.minLength(6)])
  });
  UserLogin(){

    if (this.login.invalid) {
      return;
  }
    this.Onloading=true;
    this.Auth.login(this.login.value)
    .subscribe(res => {if(res.success) { this.handleResponse(res);this.Onloading=false}else{ this.error = res.message;this.Onloading=false }(error) => {this.error = error;this.Onloading=false }});

  }
  handleResponse(data) {

    this.Token.handle(data.token);
    this.Auth.changeAuthStatus(true);
    this.router.navigateByUrl('/');
  }
  InitLogin(){
    this.Auth.authStatus.subscribe(value => this.loggedIn = value);
    if(this.loggedIn){
      this.router.navigateByUrl('/');
    }
  }
}
