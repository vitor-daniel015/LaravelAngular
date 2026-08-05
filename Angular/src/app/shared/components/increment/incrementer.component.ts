import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-incrementer',
  templateUrl: './incrementer.component.html',
  styleUrls: ['./incrementer.component.scss'],
})
export class IncrementerComponent {

  valor = 0;

  somar() {
    ++this.valor;
  }

  subtrair() {
    --this.valor;
  }

}
