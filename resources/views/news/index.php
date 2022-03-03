<?php foreach($newsList as $news): ?>
    <div class="news">
        <h2>
           <a href="<?= route('news.show', ['id' => $news['id'], 'category' => $news['category']])?>"><?= $news['title']?></a> 
        </h2>
        <h5>
            <?= $news['discription']?>
        </h5>
        <p>
            <?= $news['author']?> : <?= $news['category']?>
        </p>
    </div>
<?php endforeach; ?>