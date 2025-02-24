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
        return $salarioBase * 1.2; 
    }
}

// Implementação para Gerente
class Gerente implements RegraDeCalculo {
    public function calcular(float $salarioBase): float {
        return $salarioBase * 1.5;
    }
}


$desenvolvedor = new Desenvolvedor();
echo "Salário do desenvolvedor: R$ " . $desenvolvedor->calcular(5000) . "\n";

$gerente = new Gerente();
echo "Salário do gerente: R$ " . $gerente->calcular(7000) . "\n";

/* Vantagens:
✅ Aberto para extensão: Podemos adicionar novos cargos apenas criando novas classes que implementem RegraDeCalculo.
✅ Fechado para modificação: A classe CalculadoraSalario nunca precisa ser alterada.
✅ Código mais organizado e modular – Cada classe tem uma única responsabilidade. */

class Analista implements RegraDeCalculo {
    public function calcular(float $salarioBase): float {
        return $salarioBase * 1.3;
    }
}

$analista = new Analista();
echo "Salário do analista: R$ " . $analista->calcular(6000) . "\n";
