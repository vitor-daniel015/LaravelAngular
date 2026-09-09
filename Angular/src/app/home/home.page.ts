import { Component } from '@angular/core';
import { Storage, getDownloadURL, ref, uploadBytesResumable } from '@angular/fire/storage';
import { MessageService } from '../services/message.service';
import { Router } from '@angular/router';
import { CrudService } from '../services/api.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  produtos:any;

  constructor( 
    public crudService: CrudService
  ){ }

  listarProdutos() {
    this.crudService.get('produtos').subscribe(produtos => {
      this.produtos = produtos
    })
  }

}
