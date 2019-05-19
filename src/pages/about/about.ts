import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Http } from '@angular/http';
import { FoodviewPage } from '../foodview/foodview';
import { LoginPage } from '../login/login';

@Component({
  selector: 'page-about',
  templateUrl: 'about.html'
})
export class AboutPage {
  food: any;
  constructor(public navCtrl: NavController, public http:Http) {

  }
  ionViewDidLoad() {
    console.log('ionViewDidLoad AboutPage');
  }
  ionViewWillEnter() {
    this.getdataFood();
   }
  getdataFood(){
    this.http.get("http://localhost/rest_api_php/food.php").subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.food = response.data;
      }
    });
  }
  goViewFood(data){
    this.navCtrl.push(FoodviewPage,{data:data});
  }
  goLogin(){
    this.navCtrl.setRoot(LoginPage);
  }
}
