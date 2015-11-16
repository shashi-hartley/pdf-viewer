<?php
class PostsController extends AppController
{

	public $helpers = array('Html', 'Form');

	public function index()
	{
		//echo "hii"; exit;
		$this->set('posts', $this->Post->find('all'));
		$this->set('steak', $this->Post->steakRecipes());

	}
	
	public function add() 
	{
	

		if ($this->request->is('post')) 
		{
		//echo "<pre>";
		//print_r($this->request->data);

		/*foreach ($this->request->data as $post)
		{
		echo $post['title'];
		}*/

		//$value = $this->request->data('Post.title');
		//echo $value ;
		    $this->Post->create();
		    if ($this->Post->save($this->request->data)) 
		    {
		        $this->Flash->success(__('Your post has been saved.'));
		        return $this->redirect(array('action' => 'index'));
		    }
            	    $this->Flash->error(__('Unable to add your post.'));
        	}
    	}

	public function login() 
	{
		
    	}
}

?>
