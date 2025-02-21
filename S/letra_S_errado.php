<?php

/* ❌ Código Errado (Violando o SRP)
A classe abaixo mistura lógica de negócio (gerar fatura) e responsabilidade de persistência (salvar no banco) junto com o envio de e-mail.

 */

 class Fatura {
    private string $cliente;
    private float $valor;

    public function __construct(string $cliente, float $valor) {
        $this->cliente = $cliente;
        $this->valor = $valor;
    }

    public function gerar() {
        return "Fatura gerada para {$this->cliente} no valor de R$ {$this->valor}";
    }

    public function salvarNoBanco() {
        echo "Salvando fatura no banco de dados...\n";
    }

    public function enviarEmail() {
        echo "Enviando e-mail para {$this->cliente}...\n";
    }
}

$fatura = new Fatura("João", 500);
echo $fatura->gerar();
$fatura->salvarNoBanco();
$fatura->enviarEmail();


/* Problemas:
Mistura de responsabilidades: A classe Fatura cuida da geração, armazenamento no banco e envio de e-mail.
Dificuldade de manutenção: Se precisarmos alterar a lógica de persistência, precisamos modificar essa classe, o que pode impactar outras funcionalidades.
Baixa reutilização: Se quisermos salvar outro tipo de dado no banco, teríamos que duplicar esse código. */
