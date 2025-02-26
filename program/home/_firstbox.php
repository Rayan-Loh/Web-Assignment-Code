<nav>
    <div class="First-Box-Container">
        <div class="carousel">
            <button class="prev-button">&#10094;</button>
            <img id="carousel-image" src="image/carousel/fashion1.jpg" alt="">
            <button class="next-button">&#10095;</button>
        </div>
        <script src="/js/carousel.js"></script>

        <div class="category-container">
            <p>Category</p>
            <div class="category">
            <?php 
            $categories = [
                "Running Shoes" => ["link" => "category1.php", "image" => "image/categories/category1.jpeg"],
                "High Heels" => ["link" => "category2.php", "image" => "image/categories/category2.jpg"],
                "Short Pants" => ["link" => "category3.php", "image" => "image/categories/category3.jpeg"],
                "Long Pants" => ["link" => "category4.php", "image" => "image/categories/category4.webp"],
                "Rayan's T-Shirts" => ["link" => "category5.php", "image" => "image/categories/category5.webp"],
                "Slippers" => ["link" => "category6.php", "image" => "image/categories/category6.jpg"],
                "Bags" => ["link" => "category7.php", "image" => "image/categories/category7.jpeg"],
                "Dress" => ["link" => "category8.php", "image" => "image/categories/category8.jpeg"]
            ];

            foreach ($categories as $name => $data): ?>
                <a href="<?= ($data['link']) ?>" class="category-box">
                    <img src="<?= ($data['image']) ?>" alt="<?= ($name) ?>">
                    <p><?= ($name) ?></p>
                </a>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</nav>