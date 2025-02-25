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
                    "category1.php" => "Running Shoes",
                    "category2.php" => "High Heels",
                    "category3.php" => "Short Pants",
                    "category4.php" => "Long Pants",
                    "category5.php" => "Rayan's T-Shirts",
                    "category6.php" => "Slippers",
                    "category7.php" => "Bags",
                    "category8.php" => "Dress"
                ];

                foreach ($categories as $link => $name): ?>
                    <a href="<?= $link ?>" class="category-box">
                        <img src="image/carousel/category1.jpeg" alt="<?= $name ?>">
                        <p><?= $name ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</nav>