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
  background-color: #155535;
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

        <button class="custom-btn">(๕) ระบบบริการพื้นฐาน</button>

          <a href="<?= site_url('Sec1/sub5p1') ?>">
            <button  class="active">(๑) การคมนาคมขนส่ง (ทางบก, ทางน้ำ, ทางราง ฯลฯ)</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p2') ?>">
            <button>(๒) การไฟฟ้า</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p3') ?>">
            <button>(๓) การประปา</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p4') ?>">
            <button>(๔) โทรศัพท์</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p5') ?>">
            <button>(๕) ระบบโลจิสติกส์หรือการขนส่ง</button>
          </a>
        </div>


        <div class="content">
        <div class="tab-menu">
</div>



<h3>คำสั่งการทำงานของเมนู</h3>
            <label>การคมนาคมขนส่ง</label>
<textarea class="input-box" placeholder="กรอกรายละเอียดการคมนาคมขนส่ง..." disabled></textarea>
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
