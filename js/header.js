// hidden header shadow when scroll to highest
window.addEventListener("scroll", function () {
    let header = document.querySelector("header");

    if (window.scrollY === 0) {
        header.style.boxShadow = "none";
    } else {
        header.style.boxShadow = "0 10px 10px rgba(0, 0, 0, 0.2)";
    }
});