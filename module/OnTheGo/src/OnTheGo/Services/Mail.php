<?php
namespace OnTheGo\Services;

/**
 *
 * @author julien
 *        
 */
class Mail
{
    public function send($params)
    {
        list($recipient, $sender, $issue) = $params;
        $mail = new \Zend\Mail\Message();
        $mail->setBody($issue['rule']);
        $mail->setFrom('noreply@zend.com', 'OnTheGo Notifier');
        $mail->addTo($recipient);
        $mail->setSubject('Issue report on Zend Server');
        
        $transport = new \Zend\Mail\Transport\Sendmail();
        $transport->send($mail);
    }
}
