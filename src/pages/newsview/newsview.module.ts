import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { NewsviewPage } from './newsview';

@NgModule({
  declarations: [
    NewsviewPage,
  ],
  imports: [
    IonicPageModule.forChild(NewsviewPage),
  ],
})
export class NewsviewPageModule {}
