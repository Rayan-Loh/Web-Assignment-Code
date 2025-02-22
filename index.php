<?php
require '_base.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include '_head.php'; ?>

<body>
<header>
    <div class="ROXYS">
        <img src="/image/web_icon.png" alt="Roxy Logo">
        <p>ROXY'S</p>
    </div>
    <div class="search-container">
        <i class="fas fa-search"></i>
        <label class="search-bar">
            <input type="text" placeholder="Search" >
        </label>
    </div>
    <div class="right-icon">
        <div class="icon-container">
            <a href="cart">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
        <div class="icon-container">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <i class="fas fa-user" id="userIcon"></i>
                <div id="userInfoCard" class="user-info-card">
                    <p>Username: <?php echo $_SESSION['username']; ?></p>
                    <a href="logout">Logout</a>
                </div>
            <?php else: ?>
                <a href="login">
                    <i class="fas fa-user"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

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


<section class="brand-description">
    <h1>About Roxy</h1>
    <p>Roxy is a major women's clothing brand under Quiksilver, established in 1990. Initially starting as a swimwear series, it gradually developed a complete product line, specifically providing products for women who love outdoor sports such as surfing or skiing. Roxy's main concept is 'fun and bold, love sports, fearless, self-style'. In 1993, the Roxy brand logo was designed by merging two Quiksilver logos into a heart shape.</p>
</section>

<!-- Top Sales Content -->
<?php include '_topsales.php'; ?>

<!-- Daily Discover Content -->
<?php include '_dailydiscover.php'; ?>

<!-- Footer -->
<?php include '_foot.php'; ?>
</body>
</html>