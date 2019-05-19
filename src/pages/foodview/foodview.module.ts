import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { FoodviewPage } from './foodview';

@NgModule({
  declarations: [
    FoodviewPage,
  ],
  imports: [
    IonicPageModule.forChild(FoodviewPage),
  ],
})
export class FoodviewPageModule {}
