<?php
/* ✅ Código Correto (Aplicando o SRP)
Agora, cada classe tem uma única responsabilidade: */

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

    public function getCliente(): string {
        return $this->cliente;
    }

    public function getValor(): float {
        return $this->valor;
    }
}

// Responsável apenas por salvar a fatura no banco
class FaturaRepository {
    public function salvar(Fatura $fatura) {
        echo "Salvando fatura no banco de dados...\n";
    }
}

// Responsável apenas por enviar e-mails
class EmailService {
    public function enviar(Fatura $fatura) {
        echo "Enviando e-mail para {$fatura->getCliente()}...\n";
    }
}

$fatura = new Fatura("João", 500);
echo $fatura->gerar() . "\n";

$repositorio = new FaturaRepository();
$repositorio->salvar($fatura);

$emailService = new EmailService();
$emailService->enviar($fatura);


/* 
Vantagens:
✅ Cada classe tem uma única responsabilidade
✅ Facilidade de manutenção – Podemos modificar FaturaRepository ou EmailService sem afetar Fatura.
✅ Alta reutilização – Podemos reutilizar EmailService para outras classes além de Fatura. */