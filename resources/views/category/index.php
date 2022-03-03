<?php foreach ($categoryList as $category) : ?>
    <div class="category">
        <h4>
            <a href="<?= route('news', ['category' => "$category"]) ?>">
            <?= $category; ?>
            </a>
        </h4>
    </div>
<?php endforeach; ?>