import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
import { HotelviewPage } from '../hotelview/hotelview';
import { LoginPage } from '../login/login';


@IonicPage()
@Component({
  selector: 'page-hotel',
  templateUrl: 'hotel.html',
})
export class HotelPage {
  hot : any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad HotelPage');
  }
  ionViewWillEnter() {
    this.getdataHot();
   }
  getdataHot(){
    this.http.get("http://localhost/rest_api_php/hot.php").subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.hot = response.data;
      }
    });
  }
  goViewHot(data){
    this.navCtrl.push(HotelviewPage,{data:data});
  }
  goLogin(){
    this.navCtrl.setRoot(LoginPage);
  }
}
