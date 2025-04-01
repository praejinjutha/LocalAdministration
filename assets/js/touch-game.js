document.addEventListener('DOMContentLoaded', function () {
    let currentQuestion = 1;
    const totalQuestions = 5;
    let dropCount = 0;
    let usedImages = [];
    let score = 0;
    let timeLeft = 15;
    let gameTimer;

    let currentImage;

    const wrapper = document.querySelector('.wrapper');
    const checkWrapper = setInterval(() => {
        if (wrapper && wrapper.style.visibility === 'visible') {
            clearInterval(checkWrapper);
            initializeGame();
        }
    }, 100);

    function initializeGame() {
        updateScoreDisplay();
        setRandomBackground();
    }

    function updateQuestionNumber() {
        document.getElementById('questionNumber').textContent = `ข้อที่ ${currentQuestion}/${totalQuestions}`;
    }

    function updateScoreDisplay() {
        document.getElementById('score-display').textContent = `+${score}`;
    }

    function startTimer() {
        timeLeft = 15; // รีเซ็ตเวลาเป็น 15 วินาที
        const timeDisplay = document.getElementById('time-display');

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = seconds % 60;
            const formattedMinutes = String(minutes).padStart(2, '0');
            const formattedSeconds = String(secs).padStart(2, '0');
            return `${formattedMinutes}:${formattedSeconds}`;
        }

        timeDisplay.textContent = `${formatTime(timeLeft)}`;

        clearInterval(gameTimer); // ล้าง timer เดิม
        gameTimer = setInterval(() => {
            timeLeft--;
            timeDisplay.textContent = `${formatTime(timeLeft)}`;
            if (timeLeft <= 0) {
                clearInterval(gameTimer);
                showTimeoutPopup();
            }
        }, 1000);
    }

    function showTimeoutPopup() {
        const popup = document.getElementById("timeout-popup");
        if (popup) {
            popup.style.display = "flex";
            document.getElementById("restart-button").addEventListener("click", () => {
                popup.style.display = "none";
                location.reload();
            }, { once: true });
        }
    }

    function showAnswerPopup(selectedImage) {
        const answerMap = {
            '../assets/images/gamedrawlines/sci1/1.png': '../assets/images/gamedrawlines/sci1/Ans1.png',
            '../assets/images/gamedrawlines/sci1/2.png': '../assets/images/gamedrawlines/sci1/Ans2.png',
            '../assets/images/gamedrawlines/sci1/3.png': '../assets/images/gamedrawlines/sci1/Ans3.png',
            '../assets/images/gamedrawlines/sci1/4.png': '../assets/images/gamedrawlines/sci1/Ans4.png',
            '../assets/images/gamedrawlines/sci1/5.png': '../assets/images/gamedrawlines/sci1/Ans5.png'
        };

        const popup = document.getElementById("answer-popup");
        const answerImage = document.getElementById("answer-image");
        const nextButton = document.getElementById("next-button");

        answerImage.src = answerMap[selectedImage];
        popup.style.display = "block";

        const newNextButton = nextButton.cloneNode(true);
        nextButton.parentNode.replaceChild(newNextButton, nextButton);

        newNextButton.addEventListener("click", () => {
            popup.style.display = "none";
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                setRandomBackground();
            } else {
                localStorage.setItem('finalScore', score);
                window.location.href = "<?= site_url('scoreGame1') ?>";
            }
        });
    }

    function getRandomImage() {
        const images = [
            '../assets/images/gamedrawlines/sci1/1.png',
            '../assets/images/gamedrawlines/sci1/2.png',
            '../assets/images/gamedrawlines/sci1/3.png',
            '../assets/images/gamedrawlines/sci1/4.png',
            '../assets/images/gamedrawlines/sci1/5.png'
        ].filter(img => !usedImages.includes(img));

        if (images.length === 0) return null;
        const randomIndex = Math.floor(Math.random() * images.length);
        return images[randomIndex];
    }

    function setRandomBackground() {
        const gameContainer = document.querySelector('.game-container');
        const boxes = document.querySelectorAll('.box');
        
        const imageMap = {
            '../assets/images/gamedrawlines/sci1/1.png': ['box1', 'box2', 'box3', 'box4'],
            '../assets/images/gamedrawlines/sci1/2.png': ['box5', 'box6', 'box7', 'box8'],
            '../assets/images/gamedrawlines/sci1/3.png': ['box9', 'box10', 'box11', 'box12'],
            '../assets/images/gamedrawlines/sci1/4.png': ['box13', 'box14', 'box15', 'box16'],
            '../assets/images/gamedrawlines/sci1/5.png': ['box17', 'box18', 'box19', 'box20']
        };

        const choiceMap = {
            '../assets/images/gamedrawlines/sci1/1.png': ['c1.png', 'c2.png', 'c3.png', 'c4.png'],
            '../assets/images/gamedrawlines/sci1/2.png': ['c5.png', 'c6.png', 'c7.png', 'c8.png'],
            '../assets/images/gamedrawlines/sci1/3.png': ['c9.png', 'c10.png', 'c11.png', 'c12.png'],
            '../assets/images/gamedrawlines/sci1/4.png': ['c13.png', 'c14.png', 'c15.png', 'c16.png'],
            '../assets/images/gamedrawlines/sci1/5.png': ['c17.png', 'c18.png', 'c19.png', 'c20.png']
        };

        const selectedImage = getRandomImage();
        if (!selectedImage) {
            alert('จบเกมแล้ว! คะแนนของคุณ: ' + score);
            resetGame();
            return;
        }
        currentImage = selectedImage;
        usedImages.push(selectedImage);
        gameContainer.style.backgroundImage = `url('${selectedImage}')`;

        boxes.forEach(box => {
            box.style.display = 'none';
            box.removeAttribute('data-filled');
            box.style.backgroundImage = '';
            const marks = box.querySelectorAll('.mark');
            marks.forEach(mark => mark.remove());
        });
        imageMap[selectedImage].forEach(className => {
            document.querySelector(`.${className}`).style.display = 'block';
        });

        const choiceBoxes = ['boxA', 'boxB', 'boxC', 'boxD'];
        const selectedChoices = [...choiceMap[selectedImage]].sort(() => Math.random() - 0.5);

        choiceBoxes.forEach((box, index) => {
            document.querySelector(`.${box}`).style.backgroundImage = `url('../assets/images/gamedrawlines/sci1/${selectedChoices[index]}')`;
        });

        dropCount = 0;
        updateQuestionNumber();
        startTimer();
    }

    function checkAnswer(box, image) {
        const correctAnswers = {
            'box1': ['c2.png'],
            'box2': ['c1.png', 'c4.png'],
            'box3': ['c1.png', 'c4.png'],
            'box4': ['c3.png'],
            'box5': ['c6.png'],
            'box6': ['c5.png'],
            'box7': ['c7.png', 'c8.png'],
            'box8': ['c7.png', 'c8.png'],
            'box9': ['c9.png'],
            'box10': ['c10.png', 'c11.png'],
            'box11': ['c10.png', 'c11.png'],
            'box12': ['c12.png'],
            'box13': ['c13.png', 'c14.png', 'c16.png'],
            'box14': ['c13.png', 'c14.png', 'c16.png'],
            'box15': ['c13.png', 'c14.png', 'c16.png'],
            'box16': ['c15.png'],
            'box17': ['c18.png', 'c19.png', 'c20.png'],
            'box18': ['c18.png', 'c19.png', 'c20.png'],
            'box19': ['c18.png', 'c19.png', 'c20.png'],
            'box20': ['c17.png']
        };

        const boxId = Array.from(box.classList).find(cls => cls !== 'box') || box.classList[0];
        const imageName = image.match(/[^/]+\.png/)[0];

        if (!correctAnswers[boxId]) return;

        if (correctAnswers[boxId].includes(imageName)) {
            score += 1;
            updateScoreDisplay();
            showCorrectMark(box);
        } else {
            showFalseMark(box);
        }
    }

    function showCorrectMark(box) {
        const correctMark = document.createElement('img');
        correctMark.src = '../assets/images/gamedrawlines/correct.png';
        correctMark.classList.add('mark');
        correctMark.style.position = 'absolute';
        correctMark.style.top = '5px';
        correctMark.style.left = '5px';
        correctMark.style.width = '20px';
        correctMark.style.height = '20px';
        box.appendChild(correctMark);
    }

    function showFalseMark(box) {
        const falseMark = document.createElement('img');
        falseMark.src = '../assets/images/gamedrawlines/false.png';
        falseMark.classList.add('mark');
        falseMark.style.position = 'absolute';
        falseMark.style.top = '5px';
        falseMark.style.left = '5px';
        falseMark.style.width = '20px';
        falseMark.style.height = '20px';
        box.appendChild(falseMark);
    }

    const choiceBoxes = document.querySelectorAll('.boxA, .boxB, .boxC, .boxD');
    const choiceBoxSet = new Set(['boxA', 'boxB', 'boxC', 'boxD']);
    let draggedElement = null;
    let cloneElement = null;

    choiceBoxes.forEach(box => {
        box.addEventListener('touchstart', (e) => {
            if (box.style.backgroundImage) {
                draggedElement = box;
                draggedElement.style.opacity = 0.5;

                cloneElement = box.cloneNode(true);
                cloneElement.style.position = 'absolute';
                cloneElement.style.opacity = 0.8;
                cloneElement.style.pointerEvents = 'none';
                cloneElement.style.zIndex = 1000;
                document.body.appendChild(cloneElement);

                const touch = e.touches[0];
                const rect = box.getBoundingClientRect();
                const offsetX = touch.clientX - rect.left;
                const offsetY = touch.clientY - rect.top;
                cloneElement.style.left = `${touch.clientX - offsetX}px`;
                cloneElement.style.top = `${touch.clientY - offsetY}px`;
            }
        });

        box.addEventListener('touchmove', (e) => {
            e.preventDefault();
            if (draggedElement && cloneElement) {
                const touch = e.touches[0];
                const rect = draggedElement.getBoundingClientRect();
                const offsetX = touch.clientX - rect.left;
                const offsetY = touch.clientY - rect.top;
                cloneElement.style.left = `${touch.clientX - offsetX}px`;
                cloneElement.style.top = `${touch.clientY - offsetY}px`;
            }
        });

        box.addEventListener('touchend', (e) => {
            if (draggedElement && cloneElement) {
                draggedElement.style.opacity = 1;
                const touch = e.changedTouches[0];
                const dropTarget = document.elementFromPoint(touch.clientX, touch.clientY);

                if (dropTarget && dropTarget.classList.contains('box') && 
                    !choiceBoxSet.has(Array.from(dropTarget.classList).find(cls => cls !== 'box'))) {
                    handleDrop(dropTarget, draggedElement.style.backgroundImage);
                }

                document.body.removeChild(cloneElement);
                draggedElement = null;
                cloneElement = null;
            }
        });
    });

    const gameBoxes = document.querySelectorAll('.box');
    gameBoxes.forEach(box => {
        // ไม่ต้องใช้ dragover เพราะ touchmove จัดการแล้ว
    });

    function handleDrop(box, image) {
        const boxId = Array.from(box.classList).find(cls => cls !== 'box') || box.classList[0];
        if (!box.hasAttribute('data-filled')) {
            box.style.backgroundImage = image;
            box.setAttribute('data-filled', 'true');

            choiceBoxes.forEach(choiceBox => {
                if (choiceBox.style.backgroundImage === image) {
                    choiceBox.style.backgroundImage = '';
                }
            });

            checkAnswer(box, image);
            dropCount++;

            if (dropCount === 4) {
                clearInterval(gameTimer);
                setTimeout(() => showAnswerPopup(currentImage), 1000);
            }
        }
    }

    function resetGame() {
        currentQuestion = 1;
        dropCount = 0;
        usedImages = [];
        score = 0;
        timeLeft = 15;
        clearInterval(gameTimer);
        setRandomBackground();
    }

    document.getElementById('restart-button').addEventListener('click', resetGame);
});