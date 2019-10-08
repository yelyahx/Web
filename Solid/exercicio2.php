<?php
interface DescontoItem
{
    public function aplicaDesconto($desconto);
    public function aplicaCodigoPromocao($codigoPromocao);
}

interface ModeloItem extends DescontoItem
{
    public function defineCor($cor);
    public function defineTamanho($tamanho);
}

interface PrecoItem extends ModeloItem
{
    public function defineParcelas($parcelas);
    public function definePreco($preco);
}


?>