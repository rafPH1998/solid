# Introdução ao SOLID

O SOLID é um conjunto de cinco princípios da programação orientada a objetos que visam tornar o código mais compreensível, flexível e fácil de manter. O acrônimo SOLID representa:

- **S** - Single Responsibility Principle (Princípio da Responsabilidade Única)
- **O** - Open/Closed Principle (Princípio do Aberto/Fechado)
- **L** - Liskov Substitution Principle (Princípio da Substituição de Liskov)
- **I** - Interface Segregation Principle (Princípio da Segregação de Interface)
- **D** - Dependency Inversion Principle (Princípio da Inversão de Dependência)

## Princípios do SOLID

### **S - Single Responsibility Principle (Princípio da Responsabilidade Única)**

**Resumo:**  
Este princípio afirma que **uma classe deve ter apenas uma razão para mudar**, ou seja, ela deve ser responsável por uma única tarefa ou funcionalidade. Se uma classe tem múltiplas responsabilidades, ela se torna difícil de entender, modificar e testar.

**Exemplo:**  
Se uma classe está lidando com a persistência de dados e também com a lógica de exibição, ela deve ser dividida em duas classes, cada uma com uma responsabilidade distinta.

---

### **O - Open/Closed Principle (Princípio do Aberto/Fechado)**

**Resumo:**  
Este princípio afirma que **uma classe deve ser aberta para extensão, mas fechada para modificação**. Ou seja, devemos poder adicionar novos comportamentos a uma classe sem precisar alterá-la diretamente, o que permite que o código se expanda sem modificar a base existente.

**Exemplo:**  
Se você tem um sistema que calcula impostos para diferentes tipos de produtos, você pode adicionar novos tipos de impostos sem modificar a classe existente, apenas estendendo-a.

---

### **L - Liskov Substitution Principle (Princípio da Substituição de Liskov)**

**Resumo:**  
Este princípio afirma que **as classes derivadas devem poder ser usadas no lugar das suas classes base sem alterar o comportamento correto do programa**. Ou seja, qualquer instância de uma classe base deve poder ser substituída por instâncias de suas subclasses sem quebrar a funcionalidade.

**Exemplo:**  
Se você tem uma classe `Animal` e uma classe `Cachorro` que herda de `Animal`, você deve ser capaz de usar um objeto `Cachorro` onde um `Animal` é esperado, sem problemas.

---

### **I - Interface Segregation Principle (Princípio da Segregação de Interface)**

**Resumo:**  
Este princípio afirma que **uma classe não deve ser forçada a implementar interfaces que ela não usa**. Em outras palavras, devemos evitar criar interfaces grandes e complexas que forçam as classes a implementar métodos que não fazem sentido para elas.

**Exemplo:**  
Em vez de criar uma interface `Dispositivo` que obrigue uma impressora a implementar métodos de escaneamento e cópia (métodos que não fazem sentido para ela), crie interfaces separadas, como `DispositivoImpressao` e `DispositivoEscaneamento`.

---

### **D - Dependency Inversion Principle (Princípio da Inversão de Dependência)**

**Resumo:**  
Este princípio afirma que **as classes de alto nível não devem depender das classes de baixo nível, mas sim de abstrações**. Isso significa que o código de alto nível (que define o fluxo de trabalho) não deve se acoplar diretamente ao código de baixo nível (que faz a implementação real), mas sim a interfaces ou classes abstratas.

**Exemplo:**  
Em vez de uma classe `Carro` depender diretamente de uma classe `Motor`, ela deve depender de uma interface `MotorInterface`, permitindo que você injete diferentes tipos de motores sem modificar a classe `Carro`.

---

## Conclusão

Aplicando os princípios **SOLID** em seu código, você conseguirá criar sistemas mais modulares, fáceis de entender e de manter, promovendo a reutilização e a flexibilidade do código. Esses princípios são fundamentais para a construção de software escalável e de alta qualidade.

