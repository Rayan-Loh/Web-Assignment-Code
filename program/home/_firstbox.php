<nav>
    <div class="First-Box-Container">
        <div class="carousel">
            <button class="prev-button">&#10094;</button>
            <img id="carousel-image" src="image/carousel/fashion1.jpg" alt="">
            <button class="next-button">&#10095;</button>
        </div>

        <div class="category-container">
            <p>Category</p>
            <div class="category">
                <?php 
                $categories = [
                    "category1.php" => "第一类",
                    "category2.php" => "第二类",
                    "category3.php" => "第三类",
                    "category4.php" => "第四类",
                    "category5.php" => "第五类",
                    "category6.php" => "第六类",
                    "category7.php" => "第七类",
                    "category8.php" => "第八类"
                ];

                foreach ($categories as $link => $name): ?>
                    <a href="<?= $link ?>" class="category-box">
                        <img src="image/carousel/fashion1.jpg" alt="<?= $name ?>">
                        <p><?= $name ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="/js/carousel.js"></script>

</nav>