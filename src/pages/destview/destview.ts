import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the DestviewPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-destview',
  templateUrl: 'destview.html',
})
export class DestviewPage {
  data:any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
  this.data = navParams.get('data');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DestviewPage');
  }

}
