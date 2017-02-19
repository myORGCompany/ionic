 <?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    var $name = 'User';
    
    var $assocs = array();
    public function checkMemberShipByMobile($mobile) {
        $isMember = false;
        $LoginData = $this->find('first', array(
            'fields' => array("id"),
            'conditions' => array('mobile' => $mobile)
        ));
        if (isset($LoginData['User']['id']) && (int) $LoginData['User']['id']) {
            $isMember = (int) $LoginData['User']['id'];
        }
        return $isMember;
    }
}
