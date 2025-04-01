document.addEventListener('DOMContentLoaded', function () {
    const countdownPopup = document.getElementById('countdown-popup');
    const countdownTimer = document.getElementById('countdown-timer');
    const wrapper = document.querySelector('.wrapper');
    const overlay = document.getElementById('overlay');
    let timeLeft = 3;

    // ใช้ visibility แทน display เพื่อรักษา layout
    wrapper.style.visibility = 'hidden';
    countdownPopup.style.display = 'flex';
    overlay.style.display = 'block';
    countdownTimer.textContent = timeLeft;

    const timer = setInterval(function () {
        timeLeft--;
        countdownTimer.textContent = timeLeft;
        if (timeLeft < 1) {
            clearInterval(timer);
            countdownPopup.style.display = 'none';
            overlay.style.display = 'none';
            wrapper.style.visibility = 'visible'; // แสดงโดยไม่กระทบ layout
        }
    }, 1000);
});