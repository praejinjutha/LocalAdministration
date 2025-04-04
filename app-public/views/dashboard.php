<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเว็บตัวอย่าง</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">


    <style>
html, body {
    height: 100%; /* ทำให้ body และ html มีความสูงเต็มหน้าจอ */
    margin: 0; /* เอาค่ามาตรฐานของ margin ออก */
}

body {
    font-family: "Noto Sans Thai", sans-serif;
    background-color: white;
    padding-top: 90px; /* เพิ่มพื้นที่ด้านบนให้ไม่ถูก navbar บัง */
    position: relative; /* ทำให้ body เป็นคอนเทนเนอร์สำหรับการจัดตำแหน่ง */
    min-height: 100vh; /* ให้ความสูงของ body เท่ากับความสูงหน้าจอ */
}


.tabs {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
}

.tab-button {
    font-family: "Noto Sans Thai", sans-serif;
    padding: 10px 20px;
    border: none;
    background-color: #ddd;
    cursor: pointer;
    border-radius: 25px;
    font-size: 16px;
}

.tab-button.active {
    background-color: #c4ad7f;
    color: white;
}

.tab-button:hover {
    background-color: #b39b6b; /* สี hover */
    color: white;
}


.sec {
    width: 100%;
    background: linear-gradient(to bottom, #e6ddc8, #f9f8f5); /* เพิ่มพื้นหลังแบบ gradient */
    padding: 20px 0; /* ปรับ padding เพื่อให้ทุก section มีระยะห่างที่เหมือนกัน */
    margin: 0; /* กำหนด margin ให้เป็น 0 เพื่อลดการเว้นระยะที่ไม่ต้องการ */
}

.section {
    background-color: transparent;
    padding: 15px;
    border-radius: 10px;
    margin-top: 10px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

        .items {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-top: 10px;
    justify-items: center;
}

.item {
    display: flex; /* ทำให้ข้อความจัดเรียงดีขึ้น */
    align-items: center; /* จัดให้อยู่ตรงกลาง */
    justify-content: flex-start; /* จัดข้อความชิดซ้าย */
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    max-width: 200px;
    text-align: left;
    text-decoration: none; /* ลบเส้นใต้ลิงก์ */
    color: black; /* กำหนดสีข้อความ */
    transition: background-color 0.3s, color 0.3s;
}


.item:hover {  /* ใช้ :hover แทน .hover */
    background-color: #114007;;
    color: white;
}





    </style>
</head>
<body>


<div class="navbar">
    <div class="logo-container">
        <img class="icon" src="../assets/images/logo.png" alt="Logo">
    </div>
</div>


<div class="tabs">
        <button class="tab-button active" onclick="filterSections(0)">ทั้งหมด</button>
        <button class="tab-button" onclick="filterSections(1)">ส่วนที่ ๑</button>
        <button class="tab-button" onclick="filterSections(2)">ส่วนที่ ๒</button>
        <button class="tab-button" onclick="filterSections(3)">ส่วนที่ ๓</button>
    </div>


    <div id="section1" class="section">
        <h2><span style="text-decoration: underline; text-decoration-color: #c5ae62
; text-underline-offset: 5px;">ส่วนที่ ๑</span> (สภาพทั่วไป และข้อมูลพื้นฐาน)</h2>
        <div class="items">
    <a href="<?= site_url('sec1') ?>" class="item">๑. ด้านกายภาพ</a>
    <a href="<?= site_url('Sec1/sub2p1') ?>" class="item">๒. ด้านการเมือง/การปกครอง</a>
    <a href="<?= site_url('Sec1/sub3p1') ?>" class="item">๓. ประชากร</a>
    <a href="<?= site_url('Sec1/sub4p1') ?>" class="item">๔. สภาพทางสังคม</a>
    <a href="<?= site_url('Sec1/sub5p1') ?>" class="item">๕. ระบบบริการพื้นฐาน</a>
    <a href="<?= site_url('Sec1/sub6p1') ?>" class="item">๖. ระบบเศรษฐกิจ</a>
    <a href="<?= site_url('Sec1/sub7p1') ?>" class="item">๗. ศาสนา ประเพณี วัฒนธรรม</a>
    <a href="<?= site_url('Sec1/sub8p1') ?>" class="item">๘. ทรัพยากรธรรมชาติ</a>
    <a href="<?= site_url('Sec1/sub9') ?>" class="item">๙. อื่น ๆ</a>
</div>
<br>

    </div>

    <div class="sec">
    <div id="section2" class="section">
    <h2><span style="text-decoration: underline; text-decoration-color: #c5ae62
; text-underline-offset: 5px;">ส่วนที่ ๒</span></h2>
        <div class="items">
            <div class="item">ก. xxxxxx</div>
            <div class="item">ข. xxxxxx</div>
            <div class="item">ค. xxxxxx</div>
            <div class="item">ง. xxxxxx</div>
        </div>
    </div>
    </div>

    <br>

    <div id="section3" class="section">
    <h2><span style="text-decoration: underline; text-decoration-color: #c5ae62
; text-underline-offset: 5px;">ส่วนที่ ๓</span></h2>
        <div class="items">
            <div class="item">ก. xxxxxx</div>
            <div class="item">ข. xxxxxx</div>
            <div class="item">ค. xxxxxx</div>
            <div class="item">ง. xxxxxx</div>
        </div>
    </div>
    
    <br><br>

    <!-- <div class="footer">
    &copy; 2025 กรมส่งเสริมการปกครองส่วนท้องถิ่น | Developed by 
    <a href="https://www.modesolutions.co.th/" target="_blank" rel="noopener noreferrer">
        ModeSolutions
    </a>
</div> -->


<script>
function filterSections(section) {
    // ซ่อนทุกๆ section
    document.querySelectorAll('.section').forEach(sec => {
        if (section === 0) {
            sec.style.display = 'block'; // แสดงทั้งหมดเมื่อเลือก "ทั้งหมด"
            sec.style.marginTop = '10px'; // ระยะห่างที่เท่ากันทุกส่วน
        } else {
            sec.style.display = sec.id === 'section' + section ? 'block' : 'none'; // แสดงเฉพาะส่วนที่เลือก
            sec.style.marginTop = '10px'; // ระยะห่างที่เท่ากันทุกส่วน
        }
    });

    // เปลี่ยนพื้นหลังของ .sec
    const sec = document.querySelector('.sec');
    if (section === 0) {
        sec.style.background = 'linear-gradient(to bottom, #e6ddc8, #f9f8f5)';
    } else {
        sec.style.background = 'white';
    }

    // เปลี่ยนสถานะของปุ่ม tab ให้มี class "active"
    document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.tab-button')[section].classList.add('active');
}

    function selectItem(element) {
        // เลือก item และเพิ่มคลาส "selected" ให้กับ item ที่ถูกเลือก
        document.querySelectorAll('.item').forEach(item => item.classList.remove('selected'));
        element.classList.add('selected');
    }
</script>

</body>
</html>
