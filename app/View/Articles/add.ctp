<?php //echo  WWW_ROOT; ?>
<h1>Add Articles</h1>
<?php
echo $this->Html->script('ckeditor/ckeditor');
echo $this->Html->css('jquery-ui');
echo $this->Html->css('style');
echo $this->Html->script('jquery-1.11.1.min');
echo $this->Html->script('jquery-ui');
echo $this->Form->create('Article',array('type' => 'file','autocomplete' => 'off'));
echo $this->Form->input('title' ,array('required' => true));
echo $this->Form->textarea('description', array('required' => false,'class' => 'ckeditor','label' => 'Description'
));
echo $this->Form->input('author',array('required' => true,'id' => 'author11','class' => 'abhijitscript'));
echo $this->Html->useTag('tagstart', 'div', array('class' => 'autodropdown'));
echo $this->Html->useTag('tagstart', 'ul', array('class' => 'suggestresult'));
echo $this->Html->useTag('tagend', 'ul');
echo $this->Html->useTag('tagend', 'div');
echo $this->Form->file('file_path',array('label' => 'File upload'));
echo $this->Form->end('Save Post');
?>
<script>
$(document).ready(function(){
  $('#author11').keyup(function(){
    var query_string = $.trim($(this).val());
    var baseurl = "<?php  echo Router::url('/', true); ?>";
    var src = baseurl+'articles/search';

    if(query_string != ''){
      $.ajax({
      type: "POST",
      url: src,
      data: { auth_name:query_string },
      success: function(data)
      {

        var obj = jQuery.parseJSON(data);
        $( ".suggestresult" ).empty();
        $.each(obj, function(key, item) {
        var appd_data = "<li>" + item + "<li/>";
        $(appd_data).appendTo('.suggestresult');
        });
       $('.suggestresult li').click(function(){
          var return_value = $(this).text();
          $('.abhijitscript').attr('value', return_value); 
          $('.abhijitscript').val(return_value);
          $('.suggestresult').html('');
        });
      }
    });
  }
  else
  {
      $( ".suggestresult" ).empty();
  }

  });
  
});
  


       
      
  </script>