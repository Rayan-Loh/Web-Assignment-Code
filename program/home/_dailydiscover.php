<?php
$products = [
    ["name" => "MCM Dessa Drawstring", "image" => "image/product/MCM Dessa Drawstring Leather Black.webp", "link" => "priceInfo1.php", "sold" => "SOLD 1000+"],
    ["name" => "Men's Regular short pants", "image" => "image/product/Men - Black Regular Fit Chino short pants.webp", "link" => "priceInfo2.php", "sold" => "SOLD 400+"],
    ["name" => "Nicola Mini Tote Black", "image" => "image/product/Nicola Mini Tote Black.webp", "link" => "priceInfo3.php", "sold" => "SOLD 1000+"],
    ["name" => "Pink Floral Midi Dress", "image" => "image/product/Pink Floral Asymmetrical Waist Split Midi Dress.webp", "link" => "priceInfo4.php", "sold" => "SOLD 50+"],
    ["name" => "Louis Vuitton Speedy 20 Beige", "image" => "image/product/Louis Vuitton Speedy Bandbuliere 20 Beige.webp", "link" => "priceInfo5.php", "sold" => "SOLD 100+"],
    ["name" => "Solid Fold Pleated Cami Dress", "image" => "image/product/Solid Fold Pleated Cami Dress.webp", "link" => "priceInfo6.php", "sold" => "SOLD 200+"],
    ["name" => "Men's Fashionable pants", "image" => "image/product/Men's Fashionable pants.webp", "link" => "priceInfo7.php", "sold" => "SOLD 10000+"],
    ["name" => "Running Man Shoes", "image" => "image/product/product1.png", "link" => "priceInfo8.php", "sold" => "SOLD 1000+"],
    ["name" => "Puhu with Rayan's Shoes", "image" => "image/product/product3.jpg", "link" => "priceInfo9.php", "sold" => "SOLD 500+"],
    ["name" => "HuYa Beautiful dress", "image" => "image/product/HuYa dress.jpeg", "link" => "priceInfo10.php", "sold" => "SOLD 10+"],
    ["name" => "Flower High Heels", "image" => "image/product/product4.webp", "link" => "priceInfo11.php", "sold" => "SOLD 500+"],
    ["name" => "Monggoliq Black Dresses", "image" => "image/product/product5.webp", "link" => "priceInfo12.php", "sold" => "SOLD 300+"]
];

// Item Price (价格和商品页面link，因为商品页面是唯一的)
$prices = [
    "priceInfo1.php" => 2999,
    "priceInfo2.php" => 99999,
    "priceInfo3.php" => 6799,
    "priceInfo4.php" => 69,
    "priceInfo5.php" => 79,
    "priceInfo6.php" => 99,
    "priceInfo7.php" => 9999,
    "priceInfo8.php" => 199,
    "priceInfo9.php" => 299,
    "priceInfo10.php" => 499,
    "priceInfo11.php" => 5599,
    "priceInfo12.php" => 12799
];

?>

<div class="Daily-Discover-Container">
    <h2>🛍️ Daily Discover 🔎</h2>
    <div class="sales-items">
        <?php foreach ($products as $product): ?>
            <a class="sales-item" href="<?= ($product['link']) ?>">
                <div class="image-container">
                    <img src="<?= ($product['image']) ?>" alt="<?= ($product['name']) ?>">
                    <p class="jump-text">Jump To Island</p>
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