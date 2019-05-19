import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';

import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { LoginPage } from '../pages/login/login';
import { RegisterPage } from '../pages/register/register';
import { HttpModule } from '@angular/http';
import { IonicStorageModule } from '@ionic/storage'
import { NewsviewPage } from '../pages/newsview/newsview';
import { DestviewPage } from '../pages/destview/destview';
import { FoodviewPage } from '../pages/foodview/foodview';
import { HotelPage } from '../pages/hotel/hotel';
import { HotelviewPage } from '../pages/hotelview/hotelview';
import { AdminpagePage } from '../pages/adminpage/adminpage';

@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    RegisterPage,
    NewsviewPage,
    DestviewPage,
    FoodviewPage,
    HotelPage,
    HotelviewPage,
    AdminpagePage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    HttpModule,
    IonicStorageModule.forRoot()
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    RegisterPage,
    NewsviewPage,
    DestviewPage,
    FoodviewPage,
    HotelPage,
    HotelviewPage,
    AdminpagePage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
