<header>
    <div class="ROXYS">
        <img src="/image/web_icon.png" alt="Roxy Logo">
        <p>RΩXY'S</p>
    </div>

    <div class="search-container">
        <i class="fas fa-search"></i>
        <label class="search-bar">
            <input type="text" id="searchInput" placeholder="Search">
            <div class="search-history" id="searchHistory"></div>
        </label>
    </div>
    <script src="/js/search_history.js"></script>

    <div class="right-icon">
        <div class="icon-container">
            <a href="cart">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
        <a href="cart"><span>Cart</span></a>
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
        <a href="cart"><span>Account</span></a>
    </div>
    <script src="/js/header.js" defer></script>
</header>