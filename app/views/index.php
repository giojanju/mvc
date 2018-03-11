<h1 align="center">GET POST FROM MYSQL</h1>
<?php if (count($data['posts']) > 0): ?>
    <?php foreach($data['posts'] as $post): ?>
        <ul>
            <li>title: <?php echo $post->title; ?></li>
            <li>body: <?php echo $post->body; ?></li>
            <li>user name: <?php echo $post->name; ?></li>
            <li>created date: <?php echo $post->created_at; ?></li>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <h3 align="center">BAZA CARIELIA</h3>
<?php endif; ?>