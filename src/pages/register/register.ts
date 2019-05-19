import { Component } from '@angular/core';
import {  NavController, NavParams, LoadingController, AlertController } from 'ionic-angular';
import { Http } from '@angular/http';
import { LoginPage } from '../login/login';


@Component({
  selector: 'page-register',
  templateUrl: 'register.html',
})
export class RegisterPage {

  username : any;
  email : any;
  password : any;
  passwordTest:any;
  submitted: boolean;
  data: any;



  constructor(public navCtrl: NavController, public navParams: NavParams, public loadCtrl: LoadingController, public alertCtrl: AlertController, public http: Http) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad RegisterPage');
  }
  signUp(){
    if(this.username && this.email && this.password && (this.password == this.passwordTest)) {

      let loading = this.loadCtrl.create({

        content: 'memuat..'

      });



      loading.present();



      //apiPost

      let input = {

        username :this.username,

        email: this.email, 

        password: this.password

      };

      console.log(input);

      this.http.post("http://localhost/rest_api_php/create_user.php",input).subscribe(data => {

      let response = data.json();

      console.log(response); 

      if(response.status==200){
         
        this.navCtrl.setRoot(LoginPage);

        loading.dismiss();
      }

      else if(response.status==409) {

        loading.dismiss();

          let alert = this.alertCtrl.create({

            title: 'Email Already Taken',      

            buttons: ['OK']

          });

          alert.present();

          loading.dismiss();

      }

      else {

          let alert = this.alertCtrl.create({

            title: 'Failed Creating New Account',      

            buttons: ['OK']

          });

          alert.present();      

          loading.dismiss();

      }    

      });

      //apiPost  



    }

  }


  }


