<?php
/* 
✅ Código Correto (Aplicando o OCP)
Agora, cada tipo de funcionário terá sua própria classe, e a CalculadoraSalario não precisa ser modificada para novos cargos. 
Basta criar uma nova classe que implemente a interface */


// Interface para regras de cálculo de salário
interface RegraDeCalculo {
    public function calcular(float $salarioBase): float;
}

// Implementação para Desenvolvedor
class Desenvolvedor implements RegraDeCalculo {
    public function calcular(float $salarioBase): float {
        return $salarioBase * 1.2; // 20% a mais
    }
}

// Implementação para Gerente
class Gerente implements RegraDeCalculo {
    public function calcular(float $salarioBase): float {
        return $salarioBase * 1.5; // 50% a mais
    }
}

// Classe que usa a abstração para calcular o salário
class CalculadoraSalario {
    public function calcularSalario(RegraDeCalculo $cargo, float $salarioBase): float {
        return $cargo->calcular($salarioBase);
    }
}


$calculadora = new CalculadoraSalario();

$desenvolvedor = new Desenvolvedor();
echo "Salário do desenvolvedor: R$ " . $calculadora->calcularSalario($desenvolvedor, 5000) . "\n";

$gerente = new Gerente();
echo "Salário do gerente: R$ " . $calculadora->calcularSalario($gerente, 7000) . "\n";

/* Vantagens:
✅ Aberto para extensão: Podemos adicionar novos cargos apenas criando novas classes que implementem RegraDeCalculo.
✅ Fechado para modificação: A classe CalculadoraSalario nunca precisa ser alterada.
✅ Código mais organizado e modular – Cada classe tem uma única responsabilidade. */

class Analista implements RegraDeCalculo {
    public function calcular(float $salarioBase): float {
        return $salarioBase * 1.3; // 30% a mais
    }
}

// Uso:
$analista = new Analista();
echo "Salário do analista: R$ " . $calculadora->calcularSalario($analista, 6000) . "\n";
