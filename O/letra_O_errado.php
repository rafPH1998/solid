<?php

/* 
❌ Código Errado (Violando o OCP)
Aqui, temos uma classe CalculadoraSalario que precisa ser modificada toda vez que um novo tipo de funcionário for adicionado. */

 class CalculadoraSalario {
    public function calcularSalario(string $cargo, float $salarioBase): float {
        if ($cargo === 'desenvolvedor') {
            return $salarioBase * 1.2; // Desenvolvedor recebe 20% a mais
        } elseif ($cargo === 'gerente') {
            return $salarioBase * 1.5; // Gerente recebe 50% a mais
        } else {
            return $salarioBase; // Outros cargos sem acréscimo
        }
    }
}

// Uso da classe:
$calculadora = new CalculadoraSalario();
echo "Salário do desenvolvedor: R$ " . $calculadora->calcularSalario("desenvolvedor", 5000) . "\n";
echo "Salário do gerente: R$ " . $calculadora->calcularSalario("gerente", 7000) . "\n";



/* Problemas:
❌ Violação do OCP: Sempre que precisarmos adicionar um novo cargo, precisaremos modificar a classe CalculadoraSalario.
❌ Código pouco escalável: A lógica de cálculo está fixa dentro de uma única classe.
❌ Dificuldade de manutenção: A cada nova regra de salário, a classe se torna maior e mais difícil de gerenciar. */