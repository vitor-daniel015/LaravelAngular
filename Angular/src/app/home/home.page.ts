import { Component } from '@angular/core';
import { AuthenticateService } from '../services/auth.service';
import { CrudService } from '../services/crud.service';
import { Storage, getDownloadURL, ref, uploadBytesResumable } from '@angular/fire/storage';
import { MessageService } from '../services/message.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

 aluno: any = [
  {nome: "Miranta", email: "a@gmail.com"},
  {nome: "AeroNauta", email: "b@gmail.com"},
 ];
titulo: string = "Listagem de Alunos";
subtitulo: string = "Sistema de Integração de Gestão Academico";

  constructor(){
fetch("http://localhost:8000/aluno/index")
.then(resp => resp.json())
.then(resp => {this.alunos = resp;})
.catch(erro => {console.log(erro);
})
.finally(()=>{console.log('Finalizado ai');
})

   }



}
