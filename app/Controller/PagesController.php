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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Product','User');

/**
 * Displays a view
 *
 * @return \Cake\Network\Response|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	function index(){
		
	}
	function addNew(){
        $this->autoRender = false;

        if (!empty($this->data['upload']['name'])) {
            $file = $this->data['upload'];

            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arr_ext = array('jpg', 'jpeg', 'gif','png');

            if (in_array($ext, $arr_ext)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/webimages/categories/' . $file['name']);
                //prepare the filename for database entry
                $this->data['image'] = $file['name'];
            }
        }
	    if($this->data){
	        if($this->data){
	            if($this->Product->save($this->data)){
	                return "Saved Successfully";
	            } else {
	                return "Error ocur while saving the data please try again";
	            }
	        } else {
	            return "Nothig saved";
	        }
	    }
	}
	function logins() {
		$this->autoRender = false;
	    $this->layout = "";
		$login_detail = $this->User->find('first', array( 'conditions' => array('email' => $this->data['email'],'is_admin' =>1)));

		if(empty($login_detail)) {
			$this->Session->setFlash('<h3 class="text-danger">Please enter correct login or password</h3>');
			$this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
		} else {
			if($login_detail['User']['email'] == $this->data['email'] && $login_detail['User']['password'] == md5($this->data['password'])) {
				$data= $login_detail['User'];
				$this->Session->write('User',$data);
				$this->redirect( array( 'controller' => 'pages', 'action' => 'deshBoard' ) );
			} else {
				$this->Session->setFlash('<h3 class="text-danger">Please enter correct login or password</h3>');
				$this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
			}
		}
	}
	function logout(){
		$this->Session->delete('User');
		$this->Session->destroy();
		$this->redirect( '/' );
	}
	function deshBoard (){
		$this->autoRender = false;
	    $this->render('index');
	}
	function saveData(){
		$this->autoRender = false;
	    $this->layout = "";
	    //print_r($this->request->data);die;
		if ($this->data) {
				$data = $this->data;
			    $targetDir = '/images/';
		       if (!empty($this->request->data['upload']['name'])) {
		            $file = $this->request->data['upload'];

		            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
		            $arr_ext = array('jpg', 'jpeg', 'gif','png');

		            if (in_array($ext, $arr_ext)) {
		                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'images/' . $file['name']);
		                //prepare the filename for database entry
		                $this->request->data['image'] = $file['name'];
		            }
		        }
			if ($this->Product->save($data)) {
				$this->Session->setFlash('<h3 class="text-success">Saved succefully</h3>');
			} else {
				$this->Session->setFlash('<h3 class="text-danger">Something went wrong try again latter</h3>');
			}
		}
		$this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
	}
	function productList(){
		$userData =$this->Session->read('User');
		if (empty($userData['id']) ) {
			$this->Session->setFlash('<h3 class="text-danger">Please login first</h3>');
			$this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
		}
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        } 
        $result =  $this->Product->find('all', array('conditions' => array('Product.is_active' =>1,'Product.status' =>1 ,'Product.name LIKE' =>"$filt%")));
        $this->set('NameArray', $result);
    }
    function deleteProduct($id){
    	$this->autoRender = false;
	    $this->layout = "";
	    if (!empty($id)) {
	    	if ($this->Product->updateAll(array('is_active' => 0,'status' => 0), array('id' => $id))) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    } else {
	    	return false;
	    }
    	exit;
    }
}
