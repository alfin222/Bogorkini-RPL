import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { HotelviewPage } from './hotelview';

@NgModule({
  declarations: [
    HotelviewPage,
  ],
  imports: [
    IonicPageModule.forChild(HotelviewPage),
  ],
})
export class HotelviewPageModule {}
