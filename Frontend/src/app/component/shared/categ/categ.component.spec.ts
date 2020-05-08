import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CategComponent } from './categ.component';

describe('CategComponent', () => {
  let component: CategComponent;
  let fixture: ComponentFixture<CategComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CategComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CategComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
