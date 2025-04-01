<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สภาพทั่วไปและข้อมูลพื้นฐาน</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <style>
 table {
        width: 60%;
        border-collapse: collapse;
        margin: 20px auto;
    }
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }
    input {
        width: 100%;
        border: none;
        text-align: center;
    }
    .readonly {
        background-color: #eee; /* สีพื้นหลังเมื่อไม่สามารถแก้ไขได้ */
    }
    .no-border {
        border: none;
        font-weight: bold;
        text-align: center;  /* จัดให้อยู่ตรงกลางแนวนอน */
        vertical-align: middle; /* จัดให้อยู่ตรงกลางแนวตั้ง */
    }

    td input[type="text"] {
        font-family: "Noto Sans Thai", sans-serif;
        cursor: not-allowed; /* เปลี่ยน cursor เมื่อไม่สามารถคลิกได้ */
        font-size: 16px;
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
        <button class="custom-btn">(๒) ด้านการเมือง/การปกครอง</button>

          <a href="<?= site_url('Sec1/sub2p1') ?>">
            <button class="active">(๑) เขตการปกครอง</button>
          </a>
          <a href="<?= site_url('Sec1/sub2p2') ?>">
            <button>(๒) การเลือกตั้ง</button>
          </a>

        </div>


        <div class="content">
    <div class="tab-menu"></div>


            <h3>คำสั่งการทำงานของเมนู</h3>

            
            <table>
    <tr>
        <td>พื้นที่โดยประมาณ</td>
        <td><input type="text" id="area1" placeholder="กรอกเลข" readonly class="readonly"></td>
        <td class="readonly">ตารางกิโลเมตร</td>
    </tr>
    <tr>
        <td class="no-border">หรือประมาณ</td>
        <td><input type="text" id="area2" placeholder="กรอกเลข" readonly class="readonly"></td>
        <td class="readonly">ไร่</td>
    </tr>
    <tr>
        <td>แยกเป็นที่อยู่อาศัย</td>
        <td><input type="text" id="area3" placeholder="กรอกเลข" readonly class="readonly"></td>
        <td class="readonly">ไร่</td>
    </tr>
    <tr>
        <td>ทำการเกษตร</td>
        <td><input type="text" id="area4" placeholder="กรอกเลข" readonly class="readonly"></td>
        <td class="readonly">ไร่</td>
    </tr>
    <tr>
        <td>ป่าชุมชน</td>
        <td><input type="text" id="area5" placeholder="กรอกเลข" readonly class="readonly"></td>
        <td class="readonly">ไร่</td>
    </tr>
</table>

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
    // ฟังก์ชันสำหรับเปิดช่องกรอกให้แก้ไข
    function enableEdit() {
        var inputs = document.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.removeAttribute('readonly'); // เอา readonly ออก
            input.classList.remove('readonly'); // ลบคลาส readonly
            input.style.cursor = 'text'; // เปลี่ยน cursor เมื่อสามารถแก้ไขได้
        });

        // ซ่อนปุ่มแก้ไขและแสดงปุ่มบันทึก
        document.getElementById('edit-button').style.display = 'none'; // ซ่อนปุ่มแก้ไข
        document.getElementById('save-button').style.display = 'block'; // แสดงปุ่มบันทึก
    }

    // ฟังก์ชันสำหรับบันทึกและปิดการแก้ไข
    function saveChanges() {
        var inputs = document.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.setAttribute('readonly', true); // ตั้ง readonly ให้กับช่องกรอก
            input.classList.add('readonly'); // เพิ่มคลาส readonly
            input.style.cursor = 'not-allowed'; // เปลี่ยน cursor เมื่อไม่สามารถแก้ไขได้
        });

        // ซ่อนปุ่มบันทึกและแสดงปุ่มแก้ไข
        document.getElementById('edit-button').style.display = 'block'; // แสดงปุ่มแก้ไข
        document.getElementById('save-button').style.display = 'none'; // ซ่อนปุ่มบันทึก

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
