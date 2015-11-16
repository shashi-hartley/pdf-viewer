<h1>Posted Articles</h1>
<?php echo $this->Html->link('Add Articles',array('controller' => 'articles', 'action' => 'add')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>PDF</th>
    </tr>

    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?php echo $article['Article']['id']; ?></td>
        <td><?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles', 'action' => 'view', $article['Article']['id'])); ?>
        </td>
        <td><?php echo $article['Article']['author']; ?></td>
        <td><?php echo $article['Article']['file_path']; ?></td>  
    </tr>
    <?php endforeach; ?>
    <?php unset($article); ?>
</table>