<h1>Viewing Article</h1>
<?php 
echo $this->Html->script('ckeditor/ckeditor');
echo $this->Html->link('View Articles List',array('controller' => 'articles', 'action' => 'listing'));
echo $this->Html->link(' | Add Article',array('controller' => 'articles', 'action' => 'add'));
echo $this->Form->create('Article',array('type' => 'file','autocomplete' => 'off'));
echo $this->Form->input('title',array('value' => $articles['Article']['title'],'readonly'=> true));
echo $this->Form->textarea('description', array('required' => false,'class' => 'ckeditor','label' => 'Description','value' => $articles['Article']['description'],'readonly'=> true));
echo $this->Form->input('author',array('value' => $articles['Article']['author'],'readonly'=> true));
$file_name =$articles['Article']['file_path'];  
$pdfurl = $this->Html->url("/app/webroot/files/pdfs/" . $file_name, true); //Using true for full url, cookbookdemo.pdf is an 
$vieweroptions = array(
        'pdfurl'    =>  $pdfurl,
        'class'     =>  'span6', 
        'scale'     =>  2.0, 
        'startpage' =>  1, 
    );
echo $this->element('PdfViewer.viewer',$vieweroptions);
?>