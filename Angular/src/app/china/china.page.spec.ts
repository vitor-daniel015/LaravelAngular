import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ChinaPage } from './china.page';

describe('ChinaPage', () => {
  let component: ChinaPage;
  let fixture: ComponentFixture<ChinaPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(ChinaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
