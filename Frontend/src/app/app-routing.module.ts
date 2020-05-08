import { CartpComponent } from "./pages/cartp/cartp.component";
import { ProfileComponent } from './pages/profile/profile.component';
import { LoginComponent } from "./pages/login/login.component";
import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { ProductDetailComponent } from "./pages/product-detail/product-detail.component";
import { HomeComponent } from "./component/home/home.component";

const routes: Routes = [
  { path: "product/:id", component: ProductDetailComponent },
  { path: "", component: HomeComponent },
  { path: "login", component: LoginComponent },
  { path: "profile", component: ProfileComponent },
  { path: "cart", component: CartpComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
