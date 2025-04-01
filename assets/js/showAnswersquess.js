// showAnswersquess.js

document.addEventListener("DOMContentLoaded", function () {
    const correctPairs = {
        'chques1.png': 'qquess1.png',
        'chques2.png': 'qquess2.png',
        'chques3.png': 'qquess3.png',
        'chques4.png': 'qquess4.png',
        'chques5.png': 'qquess5.png',
        'chques6.png': 'qquess6.png',
        'chques7.png': 'qquess7.png',
        'chques8.png': 'qquess8.png',
        'chques9.png': 'qquess9.png',
        'chques10.png': 'qquess10.png',
        'chques11.png': 'qquess11.png',
        'chques12.png': 'qquess12.png',
        'chques13.png': 'qquess13.png'
    };

    const answerButton = document.querySelector('.answer-container img');
    const answerPopup = document.getElementById('answer-popup');
    const closeButton = answerPopup.querySelector('.close-btn');
    const correctAnswersContainer = document.getElementById('correct-answers-container');
    const arrowLeft = answerPopup.querySelector('.arrow-left');
    const arrowRight = answerPopup.querySelector('.arrow-right');

    answerButton.addEventListener('click', function () {
        // ดึงข้อมูลคำถามที่ใช้ในเกมจาก localStorage
        const usedQuestions = JSON.parse(localStorage.getItem('usedQuestions')) || [];

        // ล้างคำตอบที่เคยแสดงก่อนหน้านี้
        correctAnswersContainer.innerHTML = '';

        usedQuestions.forEach(questionImage => {
            const answerImage = correctPairs[questionImage];

            // สร้าง div สำหรับแสดงรูปคำถามและรูปคำตอบ
            const answerDiv = document.createElement('div');
            answerDiv.classList.add('answer-pair');

            // สร้าง element สำหรับรูปคำถาม
            const questionImg = document.createElement('img');
            questionImg.src = `../assets/images/gamedrawlines/quesquess/${answerImage}`; // ใช้ `answerImage` สำหรับ `qquess`
            questionImg.classList.add('question-img');

            // สร้าง element สำหรับรูปคำตอบ
            const answerImg = document.createElement('img');
            answerImg.src = `../assets/images/gamedrawlines/choicequess/${questionImage}`; // ใช้ `questionImage` สำหรับ `chques`
            answerImg.classList.add('answer-img');

            // เพิ่มรูปคำถามและรูปคำตอบลงใน div
            answerDiv.appendChild(questionImg);
            answerDiv.appendChild(answerImg);

            // เพิ่ม div ลงใน container
            correctAnswersContainer.appendChild(answerDiv);
        });

        // แสดง popup
        answerPopup.style.display = 'flex';
    });

    closeButton.addEventListener('click', function () {
        // ซ่อน popup
        answerPopup.style.display = 'none';
    });

    let scrollAmount = 100; // ค่าการเลื่อน (กำหนดเป็นค่าคงที่)

    arrowLeft.addEventListener('click', function () {
        correctAnswersContainer.scrollLeft -= scrollAmount; // เลื่อนซ้าย
    });

    arrowRight.addEventListener('click', function () {
        correctAnswersContainer.scrollLeft += scrollAmount; // เลื่อนขวา
    });
});
