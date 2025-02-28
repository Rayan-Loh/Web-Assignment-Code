document.addEventListener("DOMContentLoaded", function () {
    const userIcon = document.getElementById('userIcon');
    if (userIcon) {
        userIcon.addEventListener('click', function () {
            const userInfoCard = document.getElementById('userInfoCard');
            if (userInfoCard) {
                userInfoCard.style.display = userInfoCard.style.display === 'none' || userInfoCard.style.display === '' ? 'block' : 'none';
            }
        });
    }
});