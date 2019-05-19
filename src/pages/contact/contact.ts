import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Http } from '@angular/http';
import { DestviewPage } from '../destview/destview';
import { LoginPage } from '../login/login';

@Component({
  selector: 'page-contact',
  templateUrl: 'contact.html'
})
export class ContactPage {
  dest : any ;
  constructor(public navCtrl: NavController, public http:Http) {

  }
  goViewDest(data){
    this.navCtrl.push(DestviewPage,{data:data});
  }
  ionViewDidLoad() {
    console.log('ionViewDidLoad ContactPage');
  }
  ionViewWillEnter() {
    this.getdataDest();
   }
  getdataDest(){
    this.http.get("http://localhost/rest_api_php/dest.php").subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.dest = response.data;
      }
    });
  }
  goLogin(){
    this.navCtrl.setRoot(LoginPage);
  }

}
