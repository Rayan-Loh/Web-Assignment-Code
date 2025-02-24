document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchHistory = document.getElementById("searchHistory");

    let history = JSON.parse(localStorage.getItem("searchHistory")) || []; 
    let selectedIndex = -1; // 追踪选中的历史索引

    function showSearchHistory() {
        searchHistory.innerHTML = "";
        if (history.length === 0) {
            searchHistory.style.display = "none";
            return;
        }

        history.forEach((item, index) => {
            const div = document.createElement("div");
            div.classList.add("search-history-item");
            if (index === selectedIndex) {
                div.classList.add("selected"); // 高亮选中项
            }

            const icon = document.createElement("i");
            icon.classList.add("fas", "fa-history");

            const text = document.createElement("span");
            text.textContent = item;

            const deleteIcon = document.createElement("i");
            deleteIcon.classList.add("fas", "fa-times", "delete-icon");

            deleteIcon.addEventListener("click", (event) => {
                event.stopPropagation();
                history.splice(index, 1);
                localStorage.setItem("searchHistory", JSON.stringify(history));
                selectedIndex = -1; // 重置选中索引
                showSearchHistory();
            });

            div.addEventListener("mouseenter", () => {
                deleteIcon.style.opacity = 1;
            });
            div.addEventListener("mouseleave", () => {
                deleteIcon.style.opacity = 0;
            });

            div.appendChild(icon);
            div.appendChild(text);
            div.appendChild(deleteIcon);

            div.addEventListener("click", () => {
                searchInput.value = item;
                searchHistory.style.display = "none";
                selectedIndex = -1;
            });

            searchHistory.appendChild(div);
        });

        searchHistory.style.display = "block";
    }

    searchInput.addEventListener("focus", () => {
        selectedIndex = -1; // 重新聚焦时重置索引
        showSearchHistory();
    });

    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "ArrowDown") {
            event.preventDefault(); 
            if (selectedIndex < history.length - 1) {
                selectedIndex++;
            } else {
                selectedIndex = 0;
            }
            showSearchHistory();
        } 
        else if (event.key === "ArrowUp") {
            event.preventDefault();
            if (selectedIndex >= 0) {
                selectedIndex--;
            }
            showSearchHistory();
        } 
        else if (event.key === "Enter") {
            if (selectedIndex >= 0 && selectedIndex < history.length) {
                searchInput.value = history[selectedIndex];
                searchHistory.style.display = "none";
            } else if (searchInput.value.trim() !== "") {
                const value = searchInput.value.trim();
                if (!history.includes(value)) {
                    history.unshift(value);
                    if (history.length > 10) {
                        history.pop();
                    }
                    localStorage.setItem("searchHistory", JSON.stringify(history));
                }
            }
            selectedIndex = -1; 
        } 
        else if (event.key === "Backspace" && searchInput.value.length === 1) {
            showSearchHistory();
        } else {
            searchHistory.style.display = "none";
        }
    });

    document.addEventListener("click", function (event) {
        if (!searchInput.contains(event.target) && !searchHistory.contains(event.target)) {
            searchHistory.style.display = "none";
        }
    });
});
