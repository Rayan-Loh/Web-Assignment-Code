const images = [
    "image/carousel/fashion1.jpg",
    "image/carousel/fashion2.png",
    "image/carousel/fashion3.png",
    "image/carousel/fashion4.jpg",
    "image/carousel/fashion5.png"
];

let currentIndex = 0;
const imgElement = document.getElementById("carousel-image");
let timer; // 计时器变量

// 淡入淡出切换图片
function changeImage(index) {
    imgElement.style.opacity = 0; // 开始淡出
    setTimeout(() => {
        imgElement.src = images[index];
        imgElement.style.opacity = 1; // 变换后淡入
    }, 200);
}

// 自动播放函数
function startAutoPlay() {
    clearTimeout(timer); // 清除之前的定时器
    timer = setTimeout(() => {
        currentIndex = (currentIndex + 1) % images.length;
        changeImage(currentIndex);
        startAutoPlay(); // 递归调用，继续轮播
    }, 5000);
}

// 监听点击事件（手动切换）
document.querySelector(".prev-button").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    changeImage(currentIndex);
    startAutoPlay(); // 重新开始自动播放
});

document.querySelector(".next-button").addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    changeImage(currentIndex);
    startAutoPlay(); // 重新开始自动播放
});

// 初始化轮播
startAutoPlay();
