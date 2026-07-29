import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ChinaPageRoutingModule } from './china-routing.module';

import { ChinaPage } from './china.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ChinaPageRoutingModule
  ],
  declarations: [ChinaPage]
})
export class ChinaPageModule {}
