import { InterceptorService } from './services/interceptor.service';
import { FormControl, ReactiveFormsModule } from "@angular/forms";
import { MatInputModule } from "@angular/material/input";
import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";
import {MatSnackBarModule} from '@angular/material/snack-bar';
import { AppRoutingModule } from "./app-routing.module";
import {MatProgressBarModule} from '@angular/material/progress-bar';
import { AppComponent } from "./app.component";
import { UsernavComponent } from "./component/shared/usernav/usernav.component";
import { NavbarComponent } from "./component/shared/navbar/navbar.component";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { MatIconModule, MatFormFieldModule, MatIcon } from "@angular/material";
import { HomeComponent } from "./component/home/home.component";
import { ProductComponent } from "./component/shared/product/product.component";
import { SearchComponent } from "./component/shared/search/search.component";
import { BrandComponent } from "./component/shared/brand/brand.component";
import { CartComponent } from "./component/shared/cart/cart.component";
import { SliderComponent } from "./component/shared/slider/slider.component";
import { FooterComponent } from "./component/shared/footer/footer.component";
import { CategComponent } from "./component/shared/categ/categ.component";
import { RankComponent } from "./component/shared/rank/rank.component";
import { PromoComponent } from "./component/shared/promo/promo.component";
import { MoreComponent } from "./component/shared/more/more.component";
import { PartnerComponent } from "./component/shared/partner/partner.component";
import { CarouselModule } from "ngx-owl-carousel-o";
import { ProductDetailComponent } from "./pages/product-detail/product-detail.component";
import { NavigationComponent } from "./component/shared/navigation/navigation.component";
import { TestComponent } from "./test/test/test.component";
import { LoginComponent } from "./pages/login/login.component";
import { MatButtonModule } from "@angular/material/button";
import { MatCheckboxModule } from "@angular/material/checkbox";
import { CartpComponent } from "./pages/cartp/cartp.component";
import { CategorieComponent } from "./pages/categorie/categorie.component";
import { HttpClientModule, HTTP_INTERCEPTORS } from "@angular/common/http";
import { Product } from "./models/product";
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import {FormsModule} from '@angular/forms';
import { NotfoundComponent } from './pages/notfound/notfound.component';
import { ProfileComponent } from './pages/profile/profile.component';

@NgModule({
  declarations: [
    ProfileComponent,
    AppComponent,
    UsernavComponent,
    NavbarComponent,
    HomeComponent,
    ProductComponent,
    SearchComponent,
    BrandComponent,
    CartComponent,
    SliderComponent,
    FooterComponent,
    CategComponent,
    RankComponent,
    PromoComponent,
    MoreComponent,
    PartnerComponent,
    ProductDetailComponent,
    NavigationComponent,
    TestComponent,
    LoginComponent,
    CartpComponent,
    CategorieComponent,
    NotfoundComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatIconModule,
    MatProgressBarModule,
    FormsModule,
    MatFormFieldModule,
    MatSnackBarModule,
    MatInputModule,
    ReactiveFormsModule,
    MatButtonModule,
    MatCheckboxModule,
    CarouselModule,
    HttpClientModule,
    MatProgressSpinnerModule
  ],
  providers: [ {
    provide: HTTP_INTERCEPTORS,
    useClass: InterceptorService  ,
    multi: true
  }],
  bootstrap: [AppComponent]
})
export class AppModule {}
