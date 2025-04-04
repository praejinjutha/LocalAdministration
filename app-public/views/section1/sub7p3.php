<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สภาพทั่วไปและข้อมูลพื้นฐาน</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <style>
.input-box {
  font-family: "Noto Sans Thai", sans-serif;
  font-size: 16px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  cursor: pointer;
  position: relative; /* เพิ่มตำแหน่งสัมพัทธ์ */
  padding-right: 110px; /* เพิ่มพื้นที่ด้านขวาสำหรับปุ่ม */
  text-align: left; /* จัดข้อความชิดซ้าย */
}

.input-box::-webkit-file-upload-button {
  font-family: "Noto Sans Thai", sans-serif;
  font-size: 16px;
  padding: 5px 10px;
  background-color: #114007;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  position: absolute; /* ทำให้ปุ่มมีตำแหน่งสัมบูรณ์ */
  right: 5px; /* ชิดขวา */
  top: 50%; /* ตรงกลางแนวตั้ง */
  transform: translateY(-50%); /* จัดให้อยู่ตรงกลางแนวตั้งพอดี */
}

.input-box::-webkit-file-upload-button:hover {
  background-color: #0d3e28;
}

.input-box[disabled] {
    background-color: #f0f0f0;  /* ทำให้ช่องกรอกข้อมูลดูปิดทึบ */
    cursor: not-allowed;  /* ทำให้ไม่สามารถคลิกได้ */
}

.button {
    cursor: pointer;
}

body {
    padding-top: 90px; /* เพิ่มพื้นที่ด้านบนให้ไม่ถูก navbar บัง */
}

  </style>

</head>
<body>

<div class="navbar">
    <div class="logo-container">
        <img class="icon" src="../../assets/images/logo.png" alt="Logo">
    </div>
</div>


    <div class="container">
        <div class="menu">

        <button class="custom-btn">
        <span class="number" style="font-size: 20px;">๗.</span>
        <spanclass="number" style="font-size: 20px;">ศาสนา ประเพณี วัฒนธรรม</span>
    </button>


    <a href="<?= site_url('Sec1/sub7p1') ?>">
            <button>(๑) การนับถือศาสนา</button>
          </a>
          <a href="<?= site_url('Sec1/sub7p2') ?>">
            <button>(๒) ประเพณีและงานประจำปี</button>
          </a>
          <a href="<?= site_url('Sec1/sub7p3') ?>">
            <button class="active">(๓) ภูมิปัญญาท้องถิ่น</button>
          </a>
          <a href="<?= site_url('Sec1/sub7p4') ?>">
            <button>(๔) OTOP สินค้าพื้นเมืองและของที่ระลึก</button>
          </a>
        </div>


        <div class="content">

        <div class="button-tab" style="margin-top: 35px;">
        <a href="<?= site_url('dashboard') ?>" class="tab-item">
    <img class="back" src="../../assets/images/back.png" alt="Back">
</a>
</div>


<h3>คำสั่งการทำงานของเมนู</h3>
            <label>ภูมิปัญญาท้องถิ่น</label>
<textarea class="input-box" placeholder="กรอกรายละเอียดภูมิปัญญาท้องถิ่น..." disabled></textarea>
<br>



<div class="button-container">
    <button id="edit-button" class="button edit-button" onclick="enableEdit()">แก้ไข</button>
    <button id="save-button" class="button save-button" onclick="saveChanges()" style="display: none;">บันทึก</button>
</div>

</div>
    </div>

    <!-- Popup HTML (ป๊อปอัพจะเริ่มต้นเป็น 'display: none' ไม่แสดงในตอนแรก) -->
<div class="popup-overlay" style="display: none;">
    <div class="popup-container">
        <svg class="popup-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="popup-title">สำเร็จ</div>
        <div class="popup-message">
            บันทึกข้อมูลสำเร็จ
        </div>
        <button class="popup-close" onclick="closePopup()">
            ปิด
        </button>
    </div>
</div>

<script>
   // ฟังก์ชันนี้จะแสดง alert หากมีการคลิกที่ช่องกรอกข้อมูลหรือปุ่มเลือกไฟล์ที่ถูก disabled
document.querySelectorAll('.input-box').forEach(function(input) {
    input.addEventListener('click', function() {
        if (this.disabled) {
            alert("กรุณากดปุ่มแก้ไขหากต้องการแก้ไข");
        }
    });
});

function enableEdit() {
    // เปิดให้กรอกข้อมูลและเลือกไฟล์
    document.querySelectorAll('.input-box').forEach(function(element) {
        element.disabled = false;
        element.style.pointerEvents = "auto"; // เปิดการคลิก
    });

    // ซ่อนปุ่มแก้ไขและแสดงปุ่มบันทึก
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('save-button').style.display = 'block';
}

function saveChanges() {
    // ปิดทึบหลังจากบันทึกข้อมูล
    document.querySelectorAll('.input-box').forEach(function(element) {
        element.disabled = true;
        element.style.pointerEvents = "none"; // ปิดการคลิก
    });

    // ซ่อนปุ่มบันทึกและแสดงปุ่มแก้ไข
    document.getElementById('edit-button').style.display = 'block';
    document.getElementById('save-button').style.display = 'none';

    // แสดงป๊อปอัพเมื่อบันทึกเสร็จ
    document.querySelector('.popup-overlay').style.display = 'flex';
}

// ฟังก์ชันปิดป๊อปอัพ
function closePopup() {
    document.querySelector('.popup-overlay').style.display = 'none'; // ซ่อนป๊อปอัพ
}
</script>

    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
