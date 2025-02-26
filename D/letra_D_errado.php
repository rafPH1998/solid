<?php

/* Cenário: Sistema de Notificação
Neste exemplo, temos um sistema que envia notificações para os usuários de diferentes maneiras, como email e SMS. 
A ideia é que o código de alto nível (a lógica que gerencia as notificações) não deve depender diretamente dos detalhes de implementação 
(como o envio de emails ou SMS). Ao invés disso, devemos usar abstrações (interfaces) 
para permitir que o sistema se adapte facilmente a novos tipos de notificações, sem precisar modificar o código de alto nível.

Errado (violando DIP)
Aqui, a classe NotificationService depende diretamente das classes de baixo nível (EmailService e SmsService), 
violando o Princípio da Inversão de Dependência.
 */
class NotificationService {
    private $emailService;
    private $smsService;

    public function __construct() {
        // Dependência direta de implementações específicas
        $this->emailService = new EmailService();
        $this->smsService = new SmsService();
    }

    public function sendEmailNotification($email, $message) {
        $this->emailService->send($email, $message);
    }

    public function sendSmsNotification($phone, $message) {
        $this->smsService->send($phone, $message);
    }
}

class EmailService {
    public function send($email, $message) {
        echo "Email sent to $email with message: $message\n";
    }
}

class SmsService {
    public function send($phone, $message) {
        echo "SMS sent to $phone with message: $message\n";
    }
}

// Usando o NotificationService
$notificationService = new NotificationService();
$notificationService->sendEmailNotification('user@example.com', 'Hello!');
$notificationService->sendSmsNotification('1234567890', 'Hello!');

/* Problema:
❌ O código acima tem um alto acoplamento. Se quisermos adicionar outro tipo de serviço de notificação, 
como Notificação Push, precisamos alterar diretamente a classe NotificationService, 
violando o princípio do Aberto/Fechado também. */