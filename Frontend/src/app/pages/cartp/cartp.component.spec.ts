import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CartpComponent } from './cartp.component';

describe('CartpComponent', () => {
  let component: CartpComponent;
  let fixture: ComponentFixture<CartpComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CartpComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CartpComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
