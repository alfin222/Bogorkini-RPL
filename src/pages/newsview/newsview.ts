import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the NewsviewPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-newsview',
  templateUrl: 'newsview.html',
})
export class NewsviewPage {
  data:any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
  this.data = navParams.get('data');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad NewsviewPage');
    console.log(this.data);
  }

}
