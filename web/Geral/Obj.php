<?php

class Show {

public $show;
public $preço;
public $data;
public $local;
public $banner;
public $lotacao;
public $chave;

public function __construct($show, $preço, $data, $local, $banner, $lotacao, $chave){

    $this->show = $show;
    $this->preço = $preço;
    $this->data = $data;
    $this->local = $local;
    $this->banner = $banner;
    $this->lotacao = $lotacao;
    $this->chave = $chave;

}

public function exibir() {
echo "<img width='350vw' src='$this->banner'> <br><br>
      <p>$this->show</p>   <br>
      <p>$this->data</p>   <br>
      <p>R$ $this->preço</p>  <br>
      <p>$this->local</p>  <br>";
}


public function exibiring() {
    echo "<img width='350vw' src='$this->banner'> <br><br>
          <p>$this->show</p>   <br>
          <p>$this->data</p>   <br>
          <p>$this->local</p>  <br>";
    }


}

?>