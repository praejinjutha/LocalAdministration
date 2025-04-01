<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สภาพทั่วไปและข้อมูลพื้นฐาน</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <style>

.button-container {
            margin-top: 10px;
        }
        .btn-container {
    display: flex;
    justify-content: flex-end; /* ชิดขวาสุด */
    margin-bottom: 10px;
}





/* สไตล์ของ content */
.content {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left; /* h3 ชิดซ้าย */
    min-width: 300px;
}

/* จัดให้เฉพาะ form-container อยู่ตรงกลาง */
.form-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* จัดให้อยู่ตรงกลางแนวขวาง */
    margin-top: 30px;
}

/* ฟอร์มกรอกข้อมูล */
.form-group {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
}

.form-group label {
    width: 150px;
}

.form-group input {
    width: 50px;
    text-align: center;
    margin: 0 10px;
    border: 1px solid #ccc;
    padding: 5px;
    background-color: #eaeaea;  /* 🎨 สีพื้นหลังเทาอ่อน ทำให้ดูทึบ */
    cursor: not-allowed;  /* 🚫 ห้ามกด (เมาส์เป็นเครื่องหมายห้าม) */
}


.form-group span {
    width: 50px;
}

/* ถ้าเป็น editable input */
.form-group input.editable {
    background-color: #fff;
    cursor: text;
}


  </style>

</head>
<body>

    <div class="header">
        <a href="<?= site_url('dashboard') ?>">
          <img class="icon" src="../../assets/images/back.png" alt="Back">
        </a>
        <span>ส่วนที่ ๑ สภาพทั่วไปและข้อมูลพื้นฐาน</span>
        <a href="<?= site_url('dashboard') ?>">
          <img class="icon" src="../../assets/images/home.png" alt="Home">
        </a>
    </div>


    <div class="container">
        <div class="menu">
        <button class="custom-btn">(๓) ประชากร</button>

          <a href="<?= site_url('Sec1/sub3p1') ?>">
            <button>(๑) ข้อมูลเกี่ยวกับจำนวนประชากร</button>
          </a>
          <a href="<?= site_url('Sec1/sub3p2') ?>">
            <button class="active">(๒) ช่วงอายุและจำนวนประชากร</button>
          </a>

        </div>

        <div class="content">
            <div class="tab-menu"></div>
            <h3>คำสั่งการทำงานของเมนู</h3>

            <div class="form-container">
                <div class="form-group">
                    <label>อายุต่ำกว่า 18 ปี</label>
                    <input type="text" placeholder="กรอกเลข" disabled style="width:250px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;">

                    <span>คน</span>
                </div>

                <div class="form-group">
                    <label>อายุ 18 - 60 ปี</label>
                    <input type="text" placeholder="กรอกเลข" disabled style="width:250px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;">

                    <span>คน</span>
                </div>

                <div class="form-group">
                    <label>อายุมากกว่า 60 ปี</label>
                    <input type="text" placeholder="กรอกเลข" disabled style="width:250px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;">

                    <span>คน</span>
                </div>
            </div>

            <div class="button-container">
                <button id="edit-button" class="button edit-button" onclick="enableEdit()">แก้ไข</button>
                <button id="save-button" class="button save-button" onclick="saveChanges()" style="display: none;">บันทึก</button>
            </div>
        </div>


<!-- Popup HTML -->
<div class="popup-overlay" id="popup" style="display: none;">
        <div class="popup-container">
            <svg class="popup-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="popup-title">สำเร็จ</div>
            <div class="popup-message">บันทึกข้อมูลสำเร็จ</div>
            <button class="popup-close" onclick="closePopup()">ปิด</button>
        </div>
    </div>


<script>
function enableEdit() {
    // ทำให้ input แก้ไขได้
    let inputs = document.querySelectorAll(".form-group input");
    inputs.forEach(input => {
        input.removeAttribute("disabled");
        input.classList.add("editable"); // เปลี่ยนสีพื้นหลัง
    });

    // ซ่อนปุ่มแก้ไข และแสดงปุ่มบันทึก
    document.getElementById("edit-button").style.display = "none";
    document.getElementById("save-button").style.display = "inline-block";
}

function saveChanges() {
    // ปิดการแก้ไข input
    let inputs = document.querySelectorAll(".form-group input");
    inputs.forEach(input => {
        input.setAttribute("disabled", true);
        input.classList.remove("editable"); // คืนค่าสีพื้นหลัง
    });

    // แสดงป๊อปอัพ
    document.getElementById("popup").style.display = "flex";

    // ซ่อนปุ่มบันทึก และแสดงปุ่มแก้ไข
    document.getElementById("save-button").style.display = "none";
    document.getElementById("edit-button").style.display = "inline-block";
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

</script>

    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
