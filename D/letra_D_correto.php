<?php


// Interface de serviço de notificação
interface NotificationServiceInterface {
    public function send($recipient, $message);
}

// Serviço de envio de Email
class EmailService implements NotificationServiceInterface {
    public function send($recipient, $message) {
        echo "Email sent to $recipient with message: $message\n";
    }
}

// Serviço de envio de SMS
class SmsService implements NotificationServiceInterface {
    public function send($recipient, $message) {
        echo "SMS sent to $recipient with message: $message\n";
    }
}

// Serviço de envio de Notificação Push
class PushNotificationService implements NotificationServiceInterface {
    public function send($recipient, $message) {
        echo "Push Notification sent to $recipient with message: $message\n";
    }
}

// Serviço de Notificação, dependente da abstração NotificationServiceInterface
class NotificationManager {
    private $notificationService;

    public function __construct(NotificationServiceInterface $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function sendNotification($recipient, $message) {
        $this->notificationService->send($recipient, $message);
    }
}

// Usando o NotificationManager com diferentes tipos de notificações
$emailService = new EmailService();
$smsService = new SmsService();
$pushService = new PushNotificationService();

$notificationManager = new NotificationManager($emailService);
$notificationManager->sendNotification('user@example.com', 'Hello via Email!');

$notificationManager = new NotificationManager($smsService);
$notificationManager->sendNotification('1234567890', 'Hello via SMS!');

$notificationManager = new NotificationManager($pushService);
$notificationManager->sendNotification('user123', 'Hello via Push Notification!');


/* 
Vantagens
✅ Código mais flexível e extensível: Podemos adicionar facilmente novos tipos de notificação sem modificar o código existente.
✅ Menos acoplamento: O código de alto nível (o NotificationManager) depende apenas da interface, não de implementações específicas.
✅ Facilidade para testar: Podemos facilmente simular ou substituir os serviços de notificação em testes.
*/