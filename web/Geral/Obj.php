<?php

class Show {

public $show;
public $preço;
public $data;
public $local;
public $banner;
public $lotacao;
public $chave;
public $disponiveis;

public function __construct($show, $preço, $data, $local, $banner, $lotacao, $chave, $disponiveis){

    $this->show = $show;
    $this->preço = $preço;
    $this->data = $data;
    $this->local = $local;
    $this->banner = $banner;
    $this->lotacao = $lotacao;
    $this->chave = $chave;
    $this->disponiveis = $disponiveis;

}

public function exibir() {
echo "<img width='350vw' src='$this->banner'> <br><br>
      <p>$this->show</p>   <br>
        <p>$this->local  -  $this->data</p>  
        <br>
      ";

if($this->disponiveis > 0){


echo "<p>Ingressos Disponíveis: $this->disponiveis</p>
      <br>
      <p>Preço: R$$this->preço</p>
      <br>
      <form method='POST' action='../../Geral/cmpr.php'>
        
          <button name='Comprar' value='$this->chave' type='submit'>Comprar Ingresso</button>
      
      </form>
    
";

}else{

echo "<p>Ingressos Esgotados";

}


}


public function exibiring() {
    echo "<img width='350vw' src='$this->banner'> <br><br>
          <p>$this->show</p>   <br>
          <p>$this->data</p>   <br>
          <p>$this->local</p>  <br>";
    }


}

?>