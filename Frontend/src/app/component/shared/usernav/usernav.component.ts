import { Profile } from './../../../models/profile';
import { UserService } from './../../../services/user.service';
import { AuthService } from './../../../services/auth.service';
import { Router } from '@angular/router';
import { TokenService } from './../../../services/token.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-usernav',
  templateUrl: './usernav.component.html',
  styleUrls: ['./usernav.component.css']
})
export class UsernavComponent implements OnInit {

  public loggedIn: boolean;
  public user:Profile;

  constructor(
    private Auth: AuthService,
    private router: Router,
    private Token: TokenService,
    private userService: UserService
  ) { }

  ngOnInit() {
    this.Auth.authStatus.subscribe(value => this.loggedIn = value);
    this.getUser();
  }
  logout() {
    this.Token.remove();
    this.Auth.changeAuthStatus(false);
    this.router.navigateByUrl('/login');
  }
  getUser(){
    if(this.loggedIn){
    this.userService.getUser().subscribe((res:Profile)=>this.user=res);

    }
    return;
  }

}
