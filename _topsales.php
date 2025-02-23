<?php
$products = [
    ["name" => "商品名称1最多29字最多29字最多29字...", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称2", "image" => "image/product/product1.png", "link" => "product2.php", "sold" => "已售1000+"],
    ["name" => "商品名称3", "image" => "image/product/product1.png", "link" => "product3.php", "sold" => "已售1000+"],
    ["name" => "商品名称4", "image" => "image/product/product1.png", "link" => "product4.php", "sold" => "已售500+"],
    ["name" => "商品名称5", "image" => "image/product/product1.png", "link" => "product5.php", "sold" => "已售100+"]
];
?>
<div class="Top-Sales-Container">
    <h2>Top 5 Sales</h2>
    <div class="sales-items">
        <?php foreach ($products as $product): ?>
            <a class="sales-item" href="<?= $product['link'] ?>">
                <div class="image-container">
                    <img src="<?= $product['image'] ?>">
                    <p class="jump-text">跳转到页面</p>
                </div>
                <p class="product-name"><?= $product['name'] ?></p>
                <p class="sold-count"><?= $product['sold'] ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</div>
