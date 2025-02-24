<?php

/* ✅ Código Correto (Aplicando o ISP)
A solução é segregar as interfaces em interfaces menores e específicas para cada tipo de dispositivo. 
Dessa forma, cada classe implementa apenas os métodos que são relevantes para ela.*/

// Interface para dispositivos que podem imprimir
interface DispositivoImpressao {
    public function imprimir(string $documento);
}

// Interface para dispositivos que podem escanear
interface DispositivoEscaneamento {
    public function escanear(string $documento);
}

// Interface para dispositivos que podem copiar
interface DispositivoCopia {
    public function copiar(string $documento);
}

// Impressora, que só sabe imprimir
class Impressora implements DispositivoImpressao {
    public function imprimir(string $documento) {
        echo "Imprimindo documento: $documento\n";
    }
}

// Scanner, que só sabe escanear
class Scanner implements DispositivoEscaneamento {
    public function escanear(string $documento) {
        echo "Escaneando documento: $documento\n";
    }
}

// Fotocopiadora, que sabe imprimir e copiar
class Fotocopiadora implements DispositivoImpressao, DispositivoCopia {
    public function imprimir(string $documento) {
        echo "Imprimindo documento: $documento\n";
    }

    public function copiar(string $documento) {
        echo "Copiando documento: $documento\n";
    }
}

// Testando os dispositivos
$impressora = new Impressora();
$impressora->imprimir("Relatório");

$scanner = new Scanner();
$scanner->escanear("Documento");

$fotocopiadora = new Fotocopiadora();
$fotocopiadora->imprimir("Projeto");
$fotocopiadora->copiar("Projeto");


/* Vantagens do Código Correto:
✅ Cada classe implementa apenas os métodos que são relevantes para ela.
✅ Não há mais a necessidade de lançar exceções desnecessárias (por exemplo, Scanner não precisa implementar imprimir()).
✅ As classes estão mais coesas e com responsabilidades bem definidas.
✅ A manutenção do código é mais fácil, pois qualquer nova funcionalidade de dispositivo (como uma nova classe de impressão ou escaneamento)
pode ser adicionada sem afetar as outras. */