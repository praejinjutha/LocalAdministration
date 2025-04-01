document.addEventListener('DOMContentLoaded', function () {
    // ตรวจสอบว่าเป็นอุปกรณ์ touchscreen หรือไม่
    const isTouchDevice = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);

    // โหลดไฟล์ที่เหมาะสม
    const script = document.createElement('script');
    script.src = isTouchDevice ? 'touch-game.js' : 'mouse-game.js';
    document.body.appendChild(script);
});