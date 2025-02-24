<?php

// Interface para garantir que todas as formas de pagamento tenham um método pagar()
interface MetodoPagamento {
    public function pagar(float $valor): string;
}

// Classe para pagamentos que usam saldo
class PagamentoSaldo implements MetodoPagamento {

    public function __construct(protected float $saldo)
    {}

    public function pagar(float $valor): string 
    {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
            return "Pagamento de R$ {$valor} realizado com sucesso!";
        }
        return "Saldo insuficiente!";
    }
}

// Classe para pagamentos via Cartão de Crédito
class PagamentoCartao implements MetodoPagamento {
    public function pagar(float $valor): string 
    {
        return "Pagamento de R$ {$valor} realizado no cartão!";
    }
}

// Classe para pagamentos via PIX (não depende de saldo)
class PagamentoPix implements MetodoPagamento {
    public function pagar(float $valor): string 
    {
        return "Pagamento de R$ {$valor} realizado via PIX!";
    }
}

// Uso correto:
function processarPagamento(MetodoPagamento $metodo, float $valor): void 
{
    echo $metodo->pagar($valor) . "<br>";
}

$saldo = new PagamentoSaldo(500);
processarPagamento($saldo, 300); // OK

$cartao = new PagamentoCartao();
processarPagamento($cartao, 200); // OK

$pix = new PagamentoPix();
processarPagamento($pix, 300); // OK


/* Vantagens:
✅ Agora todas as classes seguem a mesma interface (MetodoPagamento).
✅ Podemos substituir qualquer implementação sem erros ou exceções inesperadas.
✅ Cada classe representa corretamente seu comportamento real. */