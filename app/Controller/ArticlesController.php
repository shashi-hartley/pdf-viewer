<?php
class ArticlesController extends AppController
{

	public $helpers = array('Html', 'Form');
	public  $components = array('RequestHandler','Flash');


	
	public function add() 
	{


		if ($this->request->is('post')) 
		{
			
			$f_name = $this->data['Article']['file_path']['name'];
			$extension = pathinfo($f_name, PATHINFO_EXTENSION);
			$file = '';
			if ($this->data['Article']['file_path']['size'] != 0 && $extension == 'pdf')
			{
        		$uploadFolder = 'files'. DS .'pdfs/'.time() . $this->data['Article']['file_path']['name'];
        		$source = $this->data['Article']['file_path']['tmp_name'];
				if(move_uploaded_file($source,     $uploadFolder))
				{

					$file = time() . $this->data['Article']['file_path']['name'];
				}

				$new_file = explode('.pdf',$file);
				//print_r($new_file); exit;
				
				$source_path = 		WWW_ROOT."files/pdfs/".$file;
				$destination_path1 = WWW_ROOT."files/pdfimages100/".$new_file['0'].'.png';
				$destination_path2 = WWW_ROOT."files/pdfimages200/".$new_file['0'].'.png';
				//echo $destination_path; exit;
				putenv("PATH=/usr/local/bin:/usr/bin:/bin");
	            exec('/usr/bin/convert '.$source_path.'[0]   -geometry 100 '.$destination_path1.'');
	             exec('/usr/bin/convert '.$source_path.'[0]   -geometry 150 '.$destination_path2.'');
 
				$this->request->data['Article']['file_path'] = $file;

				if ($this->Article->save($this->request->data)) 
				{
					
					$this->Session->setFlash('Your Article has been saved','success');
					return $this->redirect(array('action' => 'listing'));
					
				}		

			}
			else
			{
				if($extension != 'pdf' && $this->data['Article']['title'] != "" && $this->data['Article']['author'] != "")
				{
					$this->Session->setFlash('please upload pdf files only.','error');
				}
				else
				{
					$this->Session->setFlash('Unable to add your Article.','error');
				}
			}	
				

		}
		
        	
    }


    public function search()
	{
        if ( $this->RequestHandler->isAjax() ) 
        {

            $this->autoRender = false;
            $this->loadModel('Author');
            $items=$this->Author->find('all',array('conditions'=>array('Author.author LIKE'=>'%'.$_POST['auth_name'].'%')));
                foreach($items as $item)
                {
                $response[] = $item['Author']['author'];
                }

            echo json_encode($response); exit;

        }
        
    }

    public function listing()
    {
    	$this->set('articles', $this->Article->find('all',array('order' => 'Article.created DESC')));
    }

    public function view($id=null)
    {

    	$articles = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id)));
    	$this->set('articles', $articles);

    }
}

?>
