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

    th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    
}

    input {
        width: 100%;
        border: none;
        text-align: center;
    }
        select {
            width: 100%;
            padding: 5px;
        }
        .button-container {
            margin-top: 10px;
        }

        .btn-container {
    display: flex;
    justify-content: flex-end; /* ชิดขวาสุด */
    margin-bottom: 10px;
}

td button.btn-delete {
    padding: 5px 5px;
    background-color: red;
    color: white;
    border: none;  /* ลบขอบของปุ่ม */
}

td button.btn-delete {
    border: none; /* ลบขอบของ <td> ที่มีปุ่ม ลบ */
}

.btn-delete:disabled, .btn-add:disabled {
        cursor: not-allowed;
        opacity: 0.5; /* ทำให้ปุ่มดูจางลงเมื่อถูกปิดการใช้งาน */
    }

    #dataTable td:last-child {
    border: none;
}

input:disabled, 
select:disabled {
    cursor: not-allowed;
    background-color: #f0f0f0;
    color: #666;
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
        <span class="number" style="font-size: 20px;">๕.</span>
        <spanclass="number" style="font-size: 24px;">ระบบบริการพื้นฐาน</span>
    </button>


    <a href="<?= site_url('Sec1/sub5p1') ?>">
            <button>(๑) การคมนาคมขนส่ง (ทางบก, ทางน้ำ, ทางราง ฯลฯ)</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p2') ?>">
            <button>(๒) การไฟฟ้า</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p3') ?>">
            <button>(๓) การประปา</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p4') ?>">
            <button class="active">(๔) โทรศัพท์</button>
          </a>
          <a href="<?= site_url('Sec1/sub5p5') ?>">
            <button>(๕) ระบบโลจิสติกส์หรือการขนส่ง</button>
          </a>
        </div>


        <div class="content">

        <div class="button-tab" style="margin-top: 35px;">
        <a href="<?= site_url('dashboard') ?>" class="tab-item">
    <img class="back" src="../../assets/images/back.png" alt="Back">
</a>
</div>

    <h3>คำสั่งการทำงานของเมนู</h3>

<!-- ปุ่มเพิ่มรายการ -->
<div class="btn-container">
    <button class="btn-add" onclick="addRow()">เพิ่มรายการ</button>
</div>

<table id="dataTable">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ประเภทโทรศัพท์</th>
            <th>จำนวน (แห่ง)</th>
            <!-- <th>การกระทำ</th> -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>

<td><input type="text" style="width: 90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;" placeholder="กรอกชื่อ"></td>
<td><input type="text" style="width: 90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;" placeholder="กรอกจำนวน"></td>


            <td>
            <button class="btn-delete" onclick="confirmDelete(this)" disabled>ลบ</button>
            </td>
        </tr>
    </tbody>
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

<!-- ป๊อปอัปยืนยันการลบ -->
<div class="delete-modal-overlay" style="display: none;">
    <div class="delete-modal-container">
        <svg class="delete-modal-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <div class="delete-modal-title">ยืนยันการลบ</div>
        <div class="delete-modal-message">
            คุณแน่ใจหรือไม่ว่าต้องการลบรายการนี้ ?
        </div>
        <div class="delete-modal-buttons">
            <button class="delete-modal-cancel" onclick="closeDeleteModal()">ยกเลิก</button>
            <button class="delete-modal-confirm" onclick="deleteRowConfirmed()">ลบ</button>
        </div>
    </div>
</div>



<script>
let isEditable = false;  // ตัวแปรตรวจสอบสถานะการแก้ไข (เริ่มต้นคือไม่ได้แก้ไข)
let deleteTargetRow = null; // ใช้เก็บแถวที่ต้องการลบ

// ฟังก์ชันแสดงป๊อปอัปยืนยันก่อนลบ
function confirmDelete(button) {
    if (!isEditable) {
        alert("กรุณากด 'แก้ไข' ก่อนลบ");
        return;
    }
    
    deleteTargetRow = button.parentNode.parentNode; // เก็บแถวที่ต้องการลบ
    document.querySelector(".delete-modal-overlay").style.display = "flex"; // แสดงป๊อปอัป
}

// ฟังก์ชันปิดป๊อปอัป
function closeDeleteModal() {
    document.querySelector(".delete-modal-overlay").style.display = "none"; // ซ่อนป๊อปอัป
    deleteTargetRow = null; // รีเซ็ตค่า
}

// ฟังก์ชันลบแถวเมื่อกดยืนยันในป๊อปอัป
function deleteRowConfirmed() {
    if (deleteTargetRow) {
        deleteTargetRow.remove(); // ลบแถวที่เลือก
        updateRowNumbers(); // อัปเดตลำดับแถว
    }
    closeDeleteModal(); // ปิดป๊อปอัป
}

// ฟังก์ชันเพิ่มแถว
function addRow() {
    let table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
    let rowCount = table.rows.length;
    
    // สร้างแถวใหม่
    let newRow = table.insertRow(rowCount);
    
    // เพิ่มคอลัมน์: ลำดับ
    let cell0 = newRow.insertCell(0);
    cell0.innerHTML = rowCount + 1; // ลำดับถัดไป

    // เพิ่มคอลัมน์: ชื่อสถานที่
    let cell2 = newRow.insertCell(1);
    cell2.innerHTML = `<input type="text" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px;" placeholder="กรอกชื่อสถานที่">`;

    // เพิ่มคอลัมน์: จำนวน
    let cell3 = newRow.insertCell(2);
    cell3.innerHTML = `<input type="text" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px;" placeholder="กรอกจำนวน">`;

    // เพิ่มคอลัมน์: ปุ่มลบ
    let cell5 = newRow.insertCell(3);
    cell5.innerHTML = `<button class="btn-delete" onclick="confirmDelete(this)" disabled>ลบ</button>`; // เรียกใช้ confirmDelete() แทนการลบโดยตรง

    // ถ้าโหมดแก้ไขเปิดอยู่ ให้เปิดปุ่มลบแถวใหม่
    if (isEditable) {
        cell5.querySelector('button').disabled = false;
    }
}

// ฟังก์ชันอัปเดตลำดับใหม่
function updateRowNumbers() {
    let rows = document.querySelectorAll("#dataTable tbody tr");
    rows.forEach((row, index) => {
        row.cells[0].innerText = index + 1; // อัปเดตลำดับใหม่
    });
}


// ฟังก์ชันเปิดโหมดแก้ไข
function enableEdit() {
    isEditable = true;
    let inputs = document.querySelectorAll("input");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");

    // เปิดให้แก้ไขช่องข้อมูล
    inputs.forEach(input => {
        input.disabled = false;
        input.style.backgroundColor = 'white';
    });

    // เปิดปุ่มลบทั้งหมด
    deleteButtons.forEach(button => {
        button.disabled = false;
    });

    // เปิดปุ่มเพิ่มแถว
    addButton.disabled = false;

    // แสดงปุ่มบันทึก และซ่อนปุ่มแก้ไข
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('save-button').style.display = 'block';
}


// ฟังก์ชันปิดโหมดแก้ไข
function saveChanges() {
    isEditable = false;
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");

    inputs.forEach(input => {
        input.disabled = true;
        input.style.backgroundColor = '#f0f0f0';
    });

    deleteButtons.forEach(button => {
        button.disabled = true;
    });

    addButton.disabled = true;

    document.getElementById('edit-button').style.display = 'block';
    document.getElementById('save-button').style.display = 'none';

    showPopup();  // แสดงป๊อปอัพยืนยันการบันทึก
}

// ฟังก์ชันแสดงป๊อปอัพยืนยันการบันทึก
function showPopup() {
    const popup = document.querySelector('.popup-overlay');
    popup.style.display = 'flex';
}

// ฟังก์ชันปิดป๊อปอัพยืนยันการบันทึก
function closePopup() {
    const popup = document.querySelector('.popup-overlay');
    popup.style.display = 'none';
}

// ฟังก์ชันปิดปุ่มทั้งหมดเมื่อโหลดหน้าเว็บ
function disableAllButtons() {
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");

    inputs.forEach(input => {
        input.disabled = true;
    });

    deleteButtons.forEach(button => {
        button.disabled = true;
    });

    addButton.disabled = true;
}

window.onload = disableAllButtons;
</script>


    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
