<?php
App::uses('AppModel', 'Model');
class Article extends AppModel
{

public $validate = array(
    'title' => array(
        'required' => array(
                'rule' => array('minLength', 1),
                'allowEmpty' => false,
                'message' => 'Please enter a title.'
            )   
    ),
    'author' => array(
        'required' => array(
                'rule' => array('minLength', 1),
                'allowEmpty' => false,
                'message' => 'Please enter a author.'
            )   
    ),

   'file_path' => array(
    'extension' => array(
        'rule' => array('extension', array('pdf')),
        'message' => 'Only pdf files',
         )
    )

);	


}




