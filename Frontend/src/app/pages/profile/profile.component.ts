import { Profile } from './../../models/profile';
import { UserService } from './../../services/user.service';

import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

  constructor(private userService:UserService) { }
  user:Profile;
  ngOnInit() {
    this.getUser();
  }
  getUser(){
    this.userService.getUser().subscribe((res:Profile)=>{this.user=res;
    console.log(res);
    });
  }

}
