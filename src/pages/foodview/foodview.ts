import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the FoodviewPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-foodview',
  templateUrl: 'foodview.html',
})
export class FoodviewPage {
  data:any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.data = navParams.get('data');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad FoodviewPage');
  }

}
