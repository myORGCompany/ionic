<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
App::uses('Controller', 'Controller');
App::uses('HttpSocket', 'Network/Http');
App::uses( 'CakeEmail', 'Network/Email' );
class AppController extends Controller {

	

	function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}

	function sendMail($emailid, $message, $subject, $success_message, $view, $attachment = null, $cc = null, $bcc = '', $semailid = MAIL_SMTP_EMAILID, $sname = "NextStep", $replyTo = "") {
        $sta_email = Configure::read('emailid');
        #Added by Ankush on 1st Aug, 2016
        if (isset($sta_email) && $sta_email != ''){
            $cc = $sta_email;
            if($bcc != ''){
                $bcc = $sta_email;
            }
            $emailid = $sta_email;
        }
        #ends here
        $subjectArray = explode('_', $subject);
        $subject = $subjectArray[0];

        $email = new CakeEmail('elastic');
        $from = $semailid;
        $fromName = $sname;
        // Temp Code to log unverified job issue.---------------START
        $temp = explode('@', $semailid);
        $tempDomain = explode('.', $temp[1]);
        $domain = $tempDomain[0];
        if ($domain != 'nextsteptech') {
            $from = "nextsteptechsolution@gmail.com";
        }
        // Temp Code to log unverified job issue.---------------ENDS
        if ($from == '' || $from == 'support@nextsteptech.in')
            $from = "nextsteptechsolution@gmail.com";
        else
            $from = $semailid;
        $message['from'] = $from;
        $email->viewVars(array('message' => $message));
        if ($attachment != '')
            $email->attachments($attachment);
        if ($cc != '' && empty($sta_email))
            $email->cc($cc);

        if (isset($message['cc']) && !empty($message['cc']) && empty($sta_email)) {
            $email->cc($message['cc']);
        }
        #commented by Ankush on 1 Aug, 2016
        //if ($bcc != '' && empty($sta_email))
        if($bcc != ''){           
            $email->bcc($bcc);
        }
        #ends here
        if (isset($message['bcc']) && !empty($message['bcc']) && empty($sta_email)) {
            $email->bcc($message['bcc']);
        }

        if (isset($message['replyTo'])) {
            $semailid = $message['replyTo'];
        }
        try {
            $email->template($view);
            $email->emailFormat('html');
            $email->to($emailid);
            $email->from($from, $fromName);
            $email->replyTo($semailid);
            $email->subject($subject);
            if ($email->send()) {
                return $success_message;
            } else {
                return "Error Sending Mail";
            }
        } catch (Exception $e) {
            $this->log("Failed to send email: " . $e->getMessage());
            echo "error occure" . $e->getMessage();
            echo "error".$e->getMessage();
        }
    }
}
