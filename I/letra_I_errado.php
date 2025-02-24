<?php
/* 
Vamos supor que estamos criando um sistema de controle de múltiplos tipos de dispositivos, como impressoras, scanners e fotocopiadoras. 
Se criarmos uma interface Dispositivo genérica com todos os métodos possíveis 
(mesmo os que não fazem sentido para certos dispositivos), vamos violar o ISP. */


// Interface gigante que força as classes a implementar métodos desnecessários
interface Dispositivo {
    public function imprimir(string $documento);
    public function escanear(string $documento);
    public function copiar(string $documento);
}

// A classe Impressora não deveria implementar métodos de escaneamento e cópia
class Impressora implements Dispositivo {
    public function imprimir(string $documento) {
        echo "Imprimindo documento: $documento\n";
    }

    public function escanear(string $documento) {
        throw new Exception("Este dispositivo não pode escanear.");
    }

    public function copiar(string $documento) {
        throw new Exception("Este dispositivo não pode copiar.");
    }
}

// A classe Scanner não deveria implementar métodos de impressão e cópia
class Scanner implements Dispositivo {
    public function imprimir(string $documento) {
        throw new Exception("Este dispositivo não pode imprimir.");
    }

    public function escanear(string $documento) {
        echo "Escaneando documento: $documento\n";
    }

    public function copiar(string $documento) {
        throw new Exception("Este dispositivo não pode copiar.");
    }
}

$impressora = new Impressora();
$impressora->imprimir("Relatório"); // Funciona
$impressora->escanear("Relatório"); // Erro! "Este dispositivo não pode escanear."

/* 
Problemas:
❌ A classe Impressora é forçada a implementar métodos que não faz sentido para ela (como escanear() e copiar()).
❌ A classe Scanner também é forçada a implementar métodos que não fazem sentido para ela (como imprimir() e copiar()).
❌ Isso resulta em exceções sendo lançadas, o que é uma má prática. */