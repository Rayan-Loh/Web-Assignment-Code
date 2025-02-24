document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchHistory = document.getElementById("searchHistory");

    let history = JSON.parse(localStorage.getItem("searchHistory")) || []; // 读取历史记录

    // 显示搜索历史
    function showSearchHistory() {
        searchHistory.innerHTML = ""; // 清空旧内容
        if (history.length === 0) {
            searchHistory.style.display = "none";
            return;
        }

        history.forEach((item) => {
            const div = document.createElement("div");
            div.classList.add("search-history-item");

            // 添加历史记录图标
            const icon = document.createElement("i");
            icon.classList.add("fas", "fa-history");

            const text = document.createElement("span");
            text.textContent = item;

            div.appendChild(icon);
            div.appendChild(text);

            div.addEventListener("click", () => {
                searchInput.value = item; // 点击历史记录自动填充
                searchHistory.style.display = "none";
            });

            searchHistory.appendChild(div);
        });

        searchHistory.style.display = "block";
    }

    // 监听输入框的 focus 事件
    searchInput.addEventListener("focus", showSearchHistory);

    // 监听键盘事件
    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter" && searchInput.value.trim() !== "") {
            const value = searchInput.value.trim();

            // 避免重复记录
            if (!history.includes(value)) {
                history.unshift(value); // 新记录添加到最前面
                if (history.length > 10) {
                    history.pop(); // 限制最大 10 条
                }
                localStorage.setItem("searchHistory", JSON.stringify(history));
            }

            searchHistory.style.display = "none"; // 隐藏历史
        }
    });

    // 点击页面其他地方时隐藏搜索历史
    document.addEventListener("click", function (event) {
        if (!searchInput.contains(event.target) && !searchHistory.contains(event.target)) {
            searchHistory.style.display = "none";
        }
    });
});
