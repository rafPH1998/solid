<?php


/* Imagine que temos um sistema de pagamentos onde temos uma classe base MetodoPagamento. 
No entanto, ao introduzir PagamentoPix, acabamos violando o LSP. */

class MetodoPagamento {
    protected float $saldo;

    public function __construct(float $saldo) {
        $this->saldo = $saldo;
    }

    public function pagar(float $valor): string {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
            return "Pagamento de R$ {$valor} realizado com sucesso!";
        } else {
            return "Saldo insuficiente!";
        }
    }
}

class PagamentoCartao extends MetodoPagamento {
    public function pagar(float $valor): string {
        return "Pagamento de R$ {$valor} realizado no cartão!";
    }
}

class PagamentoPix extends MetodoPagamento {
    public function pagar(float $valor): string {
        throw new Exception("O pagamento via PIX não usa saldo da conta.");
    }
}

// Uso da classe:
function processarPagamento(MetodoPagamento $metodo, float $valor) {
    echo $metodo->pagar($valor) . "\n";
}

$cartao = new PagamentoCartao(1000);
processarPagamento($cartao, 200); // OK

$pix = new PagamentoPix(500);
processarPagamento($pix, 300); // ERRO! Exception: "O pagamento via PIX não usa saldo da conta."


/* Problemas:
❌ PagamentoPix lança uma exceção quando chamamos pagar(), quebrando o fluxo esperado.
❌ PagamentoPix não deveria herdar de MetodoPagamento, já que ele não usa saldo diretamente.
❌ Se PagamentoPix fosse realmente um MetodoPagamento, deveria respeitar seu comportamento base. */

