<?php
App::uses('AppModel', 'Model');
class Post extends AppModel
{


    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

	
}


?>
