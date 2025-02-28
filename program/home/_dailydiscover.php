<?php
$products = [
    ["name" => "商品名称1最多29字最多29字最多29字...", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称2", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称3", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称4", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售500+"],
    ["name" => "商品名称5", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售100+"],
    ["name" => "商品名称6最多29字最多29字最多29字...", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称7", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称8", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售1000+"],
    ["name" => "商品名称9", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售500+"],
    ["name" => "商品名称10", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售100+"],
    ["name" => "商品名称11", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售500+"],
    ["name" => "商品名称12", "image" => "image/product/product1.png", "link" => "product1.php", "sold" => "已售100+"]
];

// Item Price (价格和商品页面link，因为商品页面是唯一的)
$prices = [
    "product1.php" => 25
];

?>

<div class="Daily-Discover-Container">
    <h2>🛍️ Daily Discover 🔎</h2>
    <div class="sales-items">
        <?php foreach ($products as $product): ?>
            <a class="sales-item" href="<?= ($product['link']) ?>">
                <div class="image-container">
                    <img src="<?= ($product['image']) ?>" alt="<?= ($product['name']) ?>">
                    <p class="jump-text">跳转到页面</p>
                </div>
                <p class="product-name"><?= ($product['name']) ?></p>
                <?php if (isset($prices[$product['link']])): ?>
                    <p class="product-price">RM <?= $prices[$product['link']] ?></p>
                <?php endif; ?>
                <p class="sold-count"><?= ($product['sold']) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
    <span class="view-more">View More</span>
</div>