document.addEventListener('DOMContentLoaded', function () {
    const answerButton = document.querySelector('.answer-image');
    const popup = document.getElementById('answer-popup');

    if (answerButton && popup) {
        answerButton.addEventListener('click', showAnswerPopup);
    } else {
        console.error('Answer button or popup not found');
    }

    function showAnswerPopup() {
        popup.style.display = 'block'; 
        drawCorrectAnswers();
    }

    const correctPairs = {
        'al1.png': 'pical1.png',
        'al2.png': 'pical2.png',
        'al3.png': 'pical3.png',
        'al4.png': 'pical4.png',
        'al5.png': 'pical5.png',
        'al6.png': 'pical6.png',
        'al7.png': 'pical7.png',
        'al8.png': 'pical8.png',
        'al9.png': 'pical9.png',
        'al10.png': 'pical10.png',
        'al11.png': 'pical11.png',
        'al12.png': 'pical12.png',
        'al13.png': 'pical13.png',
        'al14.png': 'pical14.png',
        'al15.png': 'pical15.png',
        'al16.png': 'pical16.png',
        'al17.png': 'pical17.png',
        'al18.png': 'pical18.png',
        'al19.png': 'pical19.png',
        'al20.png': 'pical20.png'
    };

    function drawCorrectAnswers() {
        const canvas = document.createElement('canvas');
        canvas.id = 'answer-canvas';
        canvas.width = 800;
        canvas.height = 800;
        const ctx = canvas.getContext('2d');
    
        const popupContent = document.getElementById('correct-answers-container');
        popupContent.innerHTML = ''; 
        popupContent.appendChild(canvas);
    
        const displayedAnswers = JSON.parse(localStorage.getItem('recentAnswers')) || []; // ดึง 12 ข้อล่าสุด
        const leftX = 60;
        const rightX = 500;
        const startY = 20;
        const gapY = 180;
    
        canvas.height = displayedAnswers.length * gapY + startY;
    
        displayedAnswers.forEach((pair, index) => {
            const startImage = pair[0]; // โจทย์ที่เลือก
            const correctAnswer = correctPairs[startImage]; // คำตอบที่ถูกต้อง
    
            const leftImage = new Image();
            const rightImage = new Image();
    
            const yPosition = startY + index * gapY;
    
            leftImage.src = `../assets/images/gamedrawlines/alphabet/${startImage}`;
            rightImage.src = `../assets/images/gamedrawlines/picalphabet/${correctAnswer}`; // ใช้คำตอบที่ถูกต้อง
    
            leftImage.onload = function () {
                ctx.drawImage(leftImage, leftX, yPosition, 130, 120);
                const leftCenterY = yPosition + 70; 
                const rightCenterY = yPosition + 70; 
                drawArrow(ctx, leftX + 120, leftCenterY, rightX, rightCenterY);
            }
            
            rightImage.onload = function () {
                ctx.drawImage(rightImage, rightX, yPosition, 130, 130);
            }
        });
    }
    
    

    function drawArrow(ctx, fromX, fromY, toX, toY) {
        const headLength = 10; // ความยาวของหัวลูกศร
        const angle = Math.atan2(toY - fromY, toX - fromX);
        
        const adjustedFromX = fromX + 20; // เพิ่มค่าที่นี่เพื่อให้ห่างจากภาพซ้าย
        const adjustedToX = toX - 10; // ลดค่าที่นี่เพื่อให้ปลายลูกศรห่างจากภาพ
        const adjustedToY = toY; // หรือคุณสามารถปรับค่า Y ได้ถ้าต้องการ

        // วาดเส้นตรง
        ctx.beginPath();
        ctx.moveTo(adjustedFromX, fromY); // ใช้ตำแหน่งที่ปรับแล้ว
        ctx.lineTo(adjustedToX, adjustedToY); // ใช้ตำแหน่งที่ปรับแล้ว
        ctx.strokeStyle = '#9164FF';
        ctx.lineWidth = 2;
        ctx.stroke();

        // วาดหัวลูกศรที่ปลายด้านขวา
        ctx.beginPath();
        ctx.moveTo(adjustedToX, adjustedToY);
        ctx.lineTo(adjustedToX - headLength * Math.cos(angle - Math.PI / 6), adjustedToY - headLength * Math.sin(angle - Math.PI / 6));
        ctx.lineTo(adjustedToX - headLength * Math.cos(angle + Math.PI / 6), adjustedToY - headLength * Math.sin(angle + Math.PI / 6));
        ctx.fillStyle = '#9164FF';
        ctx.fill();

        // วาดหัวลูกศรที่ปลายด้านซ้าย
        ctx.beginPath();
        ctx.moveTo(adjustedFromX, fromY);
        ctx.lineTo(adjustedFromX + headLength * Math.cos(angle - Math.PI / 6), fromY + headLength * Math.sin(angle - Math.PI / 6));
        ctx.lineTo(adjustedFromX + headLength * Math.cos(angle + Math.PI / 6), fromY + headLength * Math.sin(angle + Math.PI / 6));
        ctx.fillStyle = '#9164FF';
        ctx.fill();
    }

    function hidePopup() {
        popup.style.display = 'none'; 
    }

    const closeBtn = document.querySelector('.close-btn');
    if (closeBtn) {
        closeBtn.addEventListener('click', hidePopup);
    } else {
        console.error('Close button not found');
    }
});
