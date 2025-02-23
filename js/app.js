document.getElementById('userIcon').addEventListener('click', function() {
    const userInfoCard = document.getElementById('userInfoCard');
    if (userInfoCard.style.display === 'none' || userInfoCard.style.display === '') {
        userInfoCard.style.display = 'block';
    } else {
        userInfoCard.style.display = 'none';
    }
});