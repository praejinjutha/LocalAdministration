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

input[name="geography"] {
    font-size: 16px;
    font-family: "Noto Sans Thai", sans-serif;
    font-weight: bold;
    color: #333;
    background-color: #f9f9f9;
    border: 2px solid #114007;
    border-radius: 5px;
    padding: 5px 10px;
    width: 200px;
}


select {
    width: 100%;  /* ให้ขนาดของ select ใช้ความกว้างเต็ม */
    padding: 8px; /* เพิ่มช่องว่างภายใน */
    border: 1px solid #ccc; /* กรอบบาง ๆ สีเทา */
    border-radius: 5px; /* มุมกรอบโค้ง */
    background-color: #f9f9f9; /* พื้นหลังสีอ่อน */
    font-size: 16px; /* ขนาดตัวอักษร */
    color: #333; /* สีตัวอักษร */
    transition: border-color 0.3s ease; /* เพิ่มการเปลี่ยนสีกรอบเมื่อโฟกัส */
}

select:focus {
    border-color: #8BB488; /* เปลี่ยนกรอบเป็นสีน้ำเงินเมื่อโฟกัส */
    background-color: #fff; /* เปลี่ยนพื้นหลังเป็นขาวเมื่อโฟกัส */
    outline: none; /* เอา outline ออก */
}


.input-box::-webkit-file-upload-button:hover {
  background-color: #0d3e28;
}

.table-container {
    margin: 20px auto;
    max-width: 800px;
}

table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
    height: 40px;
}


.side-header {
    background-color: #D9D9D9;
    text-align: center;
    font-weight: bold;
}

.contact-cell {
    background-color: #D9D9D9;
}

table, th, td {
    border: 1px solid #888; /* หรือใช้ #666 ถ้าต้องการเข้มขึ้น */
    border-collapse: collapse;
}


.editable:disabled, input[name='geography']:disabled {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }

        .editable {
            background-color: white;
            cursor: not-allowed;
        }
        .editable.active {
            background-color: #fff;
            cursor: text;
        }

        /* กำหนดความกว้างของ input */
.editable input {
  width: 100%;
    padding: 5px;
    border: #000;  /* เส้นกรอบสีดำ */
    box-sizing: border-box;  /* ป้องกันการยืดขยายของ input */
    font-size: 14px;  /* ขนาดฟอนต์ */
    background-color: #f0f0f0;
}

td.editable input:enabled {
    background-color: #fff;  /* เปลี่ยนสีพื้นหลังเป็นสีขาวเมื่อเปิดการแก้ไข */
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
      <span class="number">๑.</span>
      <span>ด้านกายภาพ</span>
    </button>


          <a href="<?= site_url('sec1') ?>">
            <button>(๑) ที่ตั้งของหมู่บ้านหรือชุมชนหรือตำบล</button>
          </a>
          <a href="<?= site_url('Sec1/sub1p2') ?>">
            <button>(๒) ลักษณะภูมิประเทศ</button>
          </a>
          <a href="<?= site_url('Sec1/sub1p3') ?>">
            <button class="active">(๓) ลักษณะภูมิอากาศ</button>
          </a>
          <a href="<?= site_url('Sec1/sub1p4') ?>">
            <button>(๔) ลักษณะของดิน</button>
          </a>
        </div>




        <div class="content">

        <div class="button-tab" style="margin-top: 35px;">
        <a href="<?= site_url('dashboard') ?>" class="tab-item">
    <img class="back" src="../../assets/images/back.png" alt="Back">
</a>
</div>


<h3>คำสั่งการทำงานของเมนู</h3>




<div class="table-container">
    <tr>
        <td><h2 style="display: inline-block; margin-right: 10px; font-size:18px;  margin-top: 10px;">ลักษณะภูมิอากาศเป็นแบบ</h2></td>
        <td><input type="text" name="geography" placeholder="กรอกข้อมูลที่นี่" disabled></td>
    </tr>
    <table>
    <tr>
        <th class="header-cell">ฤดู</th>
        <th class="header-cell" colspan="1"></th>
        <th class="header-cell">เดือน</th>
        <th class="header-cell" colspan="1"></th>
        <th class="header-cell">เดือน</th>
    </tr>
    <tr>
        <td class="side-header">ร้อน</td>
        <td class="contact-area" rowspan="4" colspan="1">ช่วงระยะเวลาตั้งแต่</td>
        <td class="editable">
            <select disabled>
                <option value="" disabled selected>เลือกเดือน</option>
                <option value="มกราคม">มกราคม</option>
                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                <option value="มีนาคม">มีนาคม</option>
                <option value="เมษายน">เมษายน</option>
                <option value="พฤษภาคม">พฤษภาคม</option>
                <option value="มิถุนายน">มิถุนายน</option>
                <option value="กรกฎาคม">กรกฎาคม</option>
                <option value="สิงหาคม">สิงหาคม</option>
                <option value="กันยายน">กันยายน</option>
                <option value="ตุลาคม">ตุลาคม</option>
                <option value="พฤศจิกายน">พฤศจิกายน</option>
                <option value="ธันวาคม">ธันวาคม</option>
            </select>
        </td>
        <td class="contact-area" rowspan="4" colspan="1">ถึง</td>
        <td class="editable">
            <select disabled>
                <option value="" disabled selected>เลือกเดือน</option>
                <option value="มกราคม">มกราคม</option>
                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                <option value="มีนาคม">มีนาคม</option>
                <option value="เมษายน">เมษายน</option>
                <option value="พฤษภาคม">พฤษภาคม</option>
                <option value="มิถุนายน">มิถุนายน</option>
                <option value="กรกฎาคม">กรกฎาคม</option>
                <option value="สิงหาคม">สิงหาคม</option>
                <option value="กันยายน">กันยายน</option>
                <option value="ตุลาคม">ตุลาคม</option>
                <option value="พฤศจิกายน">พฤศจิกายน</option>
                <option value="ธันวาคม">ธันวาคม</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="side-header">ฝน</td>
        <td class="editable">
            <select disabled>
                <option value="" disabled selected>เลือกเดือน</option>
                <option value="มกราคม">มกราคม</option>
                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                <option value="มีนาคม">มีนาคม</option>
                <option value="เมษายน">เมษายน</option>
                <option value="พฤษภาคม">พฤษภาคม</option>
                <option value="มิถุนายน">มิถุนายน</option>
                <option value="กรกฎาคม">กรกฎาคม</option>
                <option value="สิงหาคม">สิงหาคม</option>
                <option value="กันยายน">กันยายน</option>
                <option value="ตุลาคม">ตุลาคม</option>
                <option value="พฤศจิกายน">พฤศจิกายน</option>
                <option value="ธันวาคม">ธันวาคม</option>
            </select>
        </td>
        <td class="editable">
            <select disabled>
                <option value="" disabled selected>เลือกเดือน</option>
                <option value="มกราคม">มกราคม</option>
                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                <option value="มีนาคม">มีนาคม</option>
                <option value="เมษายน">เมษายน</option>
                <option value="พฤษภาคม">พฤษภาคม</option>
                <option value="มิถุนายน">มิถุนายน</option>
                <option value="กรกฎาคม">กรกฎาคม</option>
                <option value="สิงหาคม">สิงหาคม</option>
                <option value="กันยายน">กันยายน</option>
                <option value="ตุลาคม">ตุลาคม</option>
                <option value="พฤศจิกายน">พฤศจิกายน</option>
                <option value="ธันวาคม">ธันวาคม</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="side-header">หนาว</td>
        <td class="editable">
            <select disabled>
                <option value="" disabled selected>เลือกเดือน</option>
                <option value="มกราคม">มกราคม</option>
                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                <option value="มีนาคม">มีนาคม</option>
                <option value="เมษายน">เมษายน</option>
                <option value="พฤษภาคม">พฤษภาคม</option>
                <option value="มิถุนายน">มิถุนายน</option>
                <option value="กรกฎาคม">กรกฎาคม</option>
                <option value="สิงหาคม">สิงหาคม</option>
                <option value="กันยายน">กันยายน</option>
                <option value="ตุลาคม">ตุลาคม</option>
                <option value="พฤศจิกายน">พฤศจิกายน</option>
                <option value="ธันวาคม">ธันวาคม</option>
            </select>
        </td>
        <td class="editable">
            <select disabled>
                <option value="" disabled selected>เลือกเดือน</option>
                <option value="มกราคม">มกราคม</option>
                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                <option value="มีนาคม">มีนาคม</option>
                <option value="เมษายน">เมษายน</option>
                <option value="พฤษภาคม">พฤษภาคม</option>
                <option value="มิถุนายน">มิถุนายน</option>
                <option value="กรกฎาคม">กรกฎาคม</option>
                <option value="สิงหาคม">สิงหาคม</option>
                <option value="กันยายน">กันยายน</option>
                <option value="ตุลาคม">ตุลาคม</option>
                <option value="พฤศจิกายน">พฤศจิกายน</option>
                <option value="ธันวาคม">ธันวาคม</option>
            </select>
        </td>
    </tr>
</table>

</div>
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
  function enableEdit() {
    // แสดงปุ่มบันทึกและซ่อนปุ่มแก้ไข
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('save-button').style.display = 'block';
    
    // เปิดให้เลือกเดือนใน select
    document.querySelectorAll("select").forEach(select => {
      select.disabled = false; // เปิดให้เลือกเดือนใน select
    });
  }

  function saveChanges() {
    // ปิดการแก้ไข
    document.querySelectorAll("select").forEach(select => {
      select.disabled = true;  // ปิดการแก้ไขใน select
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
