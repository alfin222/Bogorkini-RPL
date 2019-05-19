import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Http } from '@angular/http';
import { NewsviewPage } from '../newsview/newsview';
import { LoginPage } from '../login/login';


@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  news : any=[] ;
  constructor(public navCtrl: NavController, public http:Http) {

  }
  
  ionViewDidLoad() {
    console.log('ionViewDidLoad HomePage');
  }
  ionViewWillEnter() {
    this.getdataNews();
   }
  getdataNews(){
    this.http.get("http://localhost/rest_api_php/news.php").subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.news = response.data;
        console.log(this.news);
      }
    });
  }
  goViewNews(data){
    this.navCtrl.push(NewsviewPage,{data:data});
  }
  goLogin(){
    this.navCtrl.setRoot(LoginPage);
  }

}
