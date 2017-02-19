<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('BarcodeHelper','Vendor');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

class ApiController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $name = 'Api';
	public $uses = array('User','Product');

/**
 * Displays a view
 *
 * @return \Cake\Network\Response|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	function apiLogins() {
		$this->autoRender = false;
	    $this->layout = "";
	    if (!empty($this->data['email']) && !empty($this->data['password'])) {
			$login_detail = $this->User->find('first', array( 'conditions' => array('email' => $this->data['email'],'status' =>1)));
			$res = array();
			if(empty($login_detail['User']['id'])) {
				$res['status'] = 'fail';
				$res['message'] = 'Either Email or Password are incorrect';
				echo json_encode($res);
				exit;
			} else {
				if($login_detail['User']['email'] == $this->data['email'] && $login_detail['User']['password'] == md5($this->data['password'])) {
					$res['status'] = 'success';
					$res['message'] = 'User authentication successfully done!';
					$res['userData'] = $login_detail['User'];
					echo json_encode($res	);
					exit;
				} else {
					$res['status'] = 'fail';
					$res['message'] = 'Either Email or Password are incorrect';
					echo json_encode($res);
					exit;
				}
			}
		} else {
			$res['status'] = "Error";
	    	$res['message'] = "Email or password can not be blank";
	    	echo json_encode($res);
		}
		exit;
	}
	function registration() {
		$this->autoRender = false;
	    $this->layout = "";
	    if (!empty($this->data['email']) && !empty($this->data['password'])) {
	    	$login_detail = $this->User->find('first', array( 'conditions' => array('email' => $this->data['email'])));
			if(!empty($login_detail)) {
				$res['status'] = 'registration failed';
				$res['message'] = 'User already registred';
				echo json_encode($res);
				exit;
			} else {
				$data['email'] = $this->data['email'];
				$data['password'] = md5($this->data['password']);
				$data['first_name'] = $this->data['first_name'];
				$data['last_name'] = $this->data['last_name'];
				$data['mobile'] = $this->data['mobile'];
				$data['status'] = 1;
				$data['is_active'] = 1;
				$data1 = $this->User->save($data);
				$id = $this->User->getLastInsertID();
				$detail = $this->User->find('first', array( 'conditions' => array('id' => $id)));
				$res['status'] = 'success';
				$res['message'] = 'registration successful';
				$res['userDetails'] = $detail;
				echo json_encode($res);
			}
	    } else {
	    	$res['status'] = "Error";
	    	$res['message'] = "Email or password can not be blank";
	    	echo json_encode($res);
	    }
	    exit;
	}
	function getProduct($barcode = null){
		$this->autoRender = false;
	    $this->layout = "";
	    $res = array();
		if ($barcode) {
			$detail = $this->Product->find('first', array( 'conditions' => array('barcode' => trim($barcode))));
			if (!empty($detail['Product']['id'])) {
				$res['status'] = 'success';
				$res['message'] = 'Product details here!';
				$res['userData'] = $detail['Product'];
				echo json_encode($res);
				exit;
			} else {
				$res['status'] = 'Failed';
				$res['message'] = 'product not found';
				echo json_encode($res);
			}
		} else {
			$res['status'] = 'Error';
			$res['message'] = 'barcode can not be blank';
			echo json_encode($res);
		}
		exit;
	}
	function forgotPassword($email){
		$this->autoRender = false;
	    $this->layout = "";
		if (!empty($email)) {
			$detail = $this->User->find('first', array( 'conditions' => array('email' => $email) ));
			$message = $detail['User'];
			if (!empty($detail['User']['id'])) {
				$message['new_password'] = $this->random_string(9);
				$this->sendMail($message['email'], $message, "Paasword changed successfully", 'success', 'forgot_pass');
				$pass = md5($message['new_password']);
				$this->User->updateAll(array('password' => "'".$pass."'"), array('id' => $message['id']));
				$res['status'] = 'Success';
				$res['message'] = 'Password send to your email successfully';
				echo json_encode($res);
			} else {
				$res['status'] = 'Error';
				$res['message'] = 'User is not registred';
				echo json_encode($res);
			}
		} else {
			$res['status'] = 'Error';
			$res['message'] = 'Email required';
			echo json_encode($res);
		}
		exit;
	}
	function getBarcode(){
		$this->autoRender = false;
	    $this->layout = "";
		// making the image transparent Start //
		// sample data to encode
	    $data_to_encode = '1012012,BLAHBLAH01234,1234567891011';
	   
	    $barcode=new BarcodeHelper();
	       
	    // Generate Barcode data
	    $barcode->barcode();
	    $barcode->setType('C128');
	    $barcode->setCode($data_to_encode);
	    $barcode->setSize(80,200);
	   
	    // Generate filename           
	    $random = rand(0,1000000);
	    $file = 'img/barcode/code_'.$random.'.png';
	   
	    // Generates image file on server           
	    $barcode->writeBarcodeFile($file);
	    echo 'Complete';die;
	}
}

