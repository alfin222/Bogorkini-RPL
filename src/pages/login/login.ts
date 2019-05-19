import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, AlertController } from 'ionic-angular';
import { RegisterPage } from '../register/register';
import { Http } from '@angular/http';
import { TabsPage } from '../tabs/tabs';
import { AdminpagePage } from '../adminpage/adminpage';


@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

  username:any;
  password:any;

  constructor(
    public navCtrl: NavController, 
    public navParams: NavParams,
    public loadCtrl: LoadingController,
    public alertCtrl: AlertController,
    public http: Http
    ) {
      this.testApi();
  }

  login(){
    if(this.username && this.password){
      let loading = this.loadCtrl.create({
        content: 'memuat...'
      });

      loading.present();

      let input ={
        username: this.username,
        password: this.password
      };
      console.log(input);
      this.http.post("http://localhost/rest_api_php/login.php",input).subscribe(data =>{
      let response = data.json();
      console.log(response);
      if(response.status==200){
        this.navCtrl.setRoot(TabsPage);
        loading.dismiss();
      }
      else if (this.username == 'admin' && this.password=='admin'){
        this.navCtrl.setRoot(AdminpagePage);
        loading.dismiss();
      }
      else{
        loading.dismiss();
        let alert = this.alertCtrl.create({
          title: 'Login Failed',
          message: 'Please try again',
          buttons: ['OK']
        });
        alert.present();
      }
      });
    }
  }

  goRegister(){
    this.navCtrl.push(RegisterPage);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }
  testApi(){
    this.http.get("http://localhost/rest_api_php/db_connect.php").subscribe(data => {
      console.log(data);
    })
  }

}
