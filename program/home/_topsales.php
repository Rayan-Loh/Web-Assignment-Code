<?php
$products = [
    ["name" => "Puma | Wonderful Running Shoes form U...", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "SOLD 800+"],
    ["name" => "RunningMan | Fastest than with a Tige...", "image" => "image/product/product2.avif", "link" => "product2.php", "sold" => "SOLD 40+"],
    ["name" => "Puhu | Lions In The Ci...", "image" => "image/product/product3.jpg", "link" => "product3.php", "sold" => "SOLD 1000+"],
    ["name" => "Lavino | High body can make boy fri...", "image" => "image/product/product4.webp", "link" => "product4.php", "sold" => "SOLD 500+"],
    ["name" => "Monggoliq | Black Dresses for Mo...", "image" => "image/product/product5.webp", "link" => "product5.php", "sold" => "SOLD 100+"]
];
?>
<div class="Top-Sales-Container">
    <h2>Top 5 Sales 🔥</h2>
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
