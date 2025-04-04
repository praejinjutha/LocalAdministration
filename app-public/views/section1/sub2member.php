<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สภาพทั่วไปและข้อมูลพื้นฐาน</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <style>
table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
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
    padding: 5px 10px;
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
        <span class="number" style="font-size: 20px;">๒.</span>
<spanclass="number" style="font-size: 20px;">ด้านการเมือง/การปกครอง</span>

    </button>


          <a href="<?= site_url('Sec1/sub2p1') ?>">
            <button>(๑) เขตการปกครอง</button>
          </a>
          <a href="<?= site_url('Sec1/sub2p2') ?>">
            <button class="active">(๒) การเลือกตั้ง</button>
          </a>
        </div>




        <div class="content">

        <div class="button-tab" style="margin-top: 35px;">
        <a href="<?= site_url('dashboard') ?>" class="tab-item">
    <img class="back" src="../../assets/images/back.png" alt="Back">
</a>

<a href="<?= site_url('Sec1/sub2p1') ?>" class="tab-item">
    <button id="button1" class="buttont">คณะผู้บริหาร</button>
</a>


<a href="<?= site_url('Sec1/territorial') ?>" class="tab-item">
    <button id="button2" class="buttont active">สมาชิกสภา</button>
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
            <th>คำนำหน้า</th>
            <th>ชื่อจริง</th>
            <th>นามสกุล</th>
            <th>สมาชิกสภา อบต.</th>
            <!-- <th>การกระทำ</th> -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>
            <select style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;">
    <option value="" disabled selected>เลือกคำนำหน้า</option>
    <option>นาย</option>
    <option>นางสาว</option>
    <option>นาง</option>
</select>
            </td>
            <td>
    <input type="text" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;" placeholder="กรอกชื่อจริง">
</td>
<td>
    <input type="text" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;" placeholder="กรอกนามสกุล">
</td>


<td>
  หมู่ที่ 
  <input type="text" style="margin-left:10px; width:50%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;" placeholder="กรอกเลข">
</td>

            <td>
                <button class="btn-delete" onclick="deleteRow(this)">ลบ</button>
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
            <button class="delete-modal-confirm">ลบ</button>
        </div>
    </div>
</div>




<script>
let isEditable = false;  // ตัวแปรตรวจสอบสถานะการแก้ไข (เริ่มต้นคือไม่ได้แก้ไข)

// ฟังก์ชันเพิ่มแถว
function addRow() {
    let table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
    let rowCount = table.rows.length;
    
    // สร้างแถวใหม่
    let newRow = table.insertRow(rowCount);
    
    // เพิ่มคอลัมน์: ลำดับ
    let cell0 = newRow.insertCell(0);
    cell0.innerHTML = rowCount + 1; // ลำดับถัดไป
    
    // เพิ่มคอลัมน์: คำนำหน้า (Dropdown)
    let cell1 = newRow.insertCell(1);
    cell1.innerHTML = ` 
<select style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: white;">
            <option value="" disabled selected>เลือกคำนำหน้า</option>
            <option>นาย</option>
            <option>นางสาว</option>
            <option>นาง</option>
        </select>
    `;

  // เพิ่มคอลัมน์: ชื่อจริง
  let cell2 = newRow.insertCell(2);
    let input1 = document.createElement('input');
    input1.type = 'text';
    input1.placeholder = 'กรอกชื่อจริง'; // ข้อความแนะนำ
    input1.style.width = '94.5%';
    input1.style.boxSizing = 'border-box';
    input1.style.fontSize = '16px';
    input1.style.color = '#333';
    input1.style.padding = '5px';
    input1.style.fontFamily = "Noto Sans Thai";
    input1.style.border = '1px solid #ccc';
    input1.style.borderRadius = '5px';


    cell2.appendChild(input1); // เพิ่ม input ไปที่เซลล์

    // เพิ่มคอลัมน์: นามสกุล
    let cell3 = newRow.insertCell(3);
    let input2 = document.createElement('input');
    input2.type = 'text';
    input2.placeholder = 'กรอกนามสกุล'; // ข้อความแนะนำ
    input2.style.width = '94.5%';
    input2.style.boxSizing = 'border-box';
    input2.style.fontSize = '16px';
    input2.style.color = '#333';
    input2.style.padding = '5px';
    input2.style.fontFamily = "Noto Sans Thai";
    input2.style.border = '1px solid #ccc';
    input2.style.borderRadius = '5px';

    cell3.appendChild(input2); // เพิ่ม input ไปที่เซลล์

    // เพิ่มคอลัมน์: สมาชิกสภา อบต. (Dropdown)
    let cell4 = newRow.insertCell(4);
    cell4.innerHTML = ` 
<td>
  หมู่ที่ 
  <input type="text" style="margin-left:10px; width:50%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; background-color: #f0f0f0;" placeholder="กรอกเลข">
</td>
    `;

    // เพิ่มคอลัมน์: ปุ่มลบ
    let cell5 = newRow.insertCell(5);
    cell5.innerHTML = `<button class="btn-delete" onclick="deleteRow(this)" disabled>ลบ</button>`; // ปิดปุ่มลบเริ่มต้น

    // ถ้าโหมดแก้ไขเปิดอยู่ ให้เปิดปุ่มลบแถวใหม่
    if (isEditable) {
        cell5.querySelector('button').disabled = false;
    }
}

// ฟังก์ชันลบแถว
function deleteRow(button) {
    if (!isEditable) {
        alert("กรุณากด 'แก้ไข' ก่อนลบ");
        return;  // ห้ามลบถ้ายังไม่ได้เปิดโหมดแก้ไข
    }

    // แสดง Modal ยืนยันการลบ
    showDeleteModal(button);
}

function showDeleteModal(button) {
    // แสดง Modal ยืนยันการลบ
    const modal = document.querySelector('.delete-modal-overlay');
    modal.style.display = 'flex';

    // กำหนดให้ปุ่มยืนยันการลบทำงานเมื่อผู้ใช้ยืนยัน
    document.querySelector('.delete-modal-confirm').onclick = function() {
        // ลบแถวเมื่อผู้ใช้ยืนยัน
        let row = button.parentNode.parentNode;
        let table = row.parentNode;
        table.removeChild(row);

        updateRowNumbers(); // อัปเดตลำดับแถวใหม่

        closeDeleteModal();  // ปิด Modal
    };
}

function closeDeleteModal() {
    const modal = document.querySelector('.delete-modal-overlay');
    modal.style.display = 'none';  // ซ่อน Modal
}






// ฟังก์ชันอัปเดตลำดับใหม่
function updateRowNumbers() {
    let rows = document.querySelectorAll("#dataTable tbody tr");
    rows.forEach((row, index) => {
        row.cells[0].innerText = index + 1;
    });
}

// ฟังก์ชันจำลองสำหรับแก้ไข & บันทึก
function enableEdit() {
    isEditable = true;  // เปิดโหมดแก้ไข
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");

    // เปิดการกรอกข้อมูล
    inputs.forEach(input => {
        input.disabled = false;
        
        // เปลี่ยนพื้นหลังเป็นสีขาวเมื่อเปิดให้แก้ไข
        input.style.backgroundColor = "#fff";
    });

    // เปิดปุ่มลบ
    deleteButtons.forEach(button => {
        button.disabled = false;
    });

    // เปิดปุ่มเพิ่มรายการ
    addButton.disabled = false;

    // ซ่อนปุ่มแก้ไขและแสดงปุ่มบันทึก
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('save-button').style.display = 'block';
}


// ฟังก์ชันจำลองสำหรับบันทึก
function saveChanges() {
    isEditable = false;  // ปิดโหมดแก้ไข
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");

    // ปิดการกรอกข้อมูล
    inputs.forEach(input => {
        input.disabled = true;
        
        // เปลี่ยนพื้นหลังกลับไปเป็นสีเดิมเมื่อบันทึก
        input.style.backgroundColor = "#f0f0f0";  // สีพื้นหลังที่ใช้สำหรับฟิลด์ที่ไม่สามารถแก้ไขได้
    });

    // ปิดปุ่มลบ
    deleteButtons.forEach(button => {
        button.disabled = true;
    });

    // ปิดปุ่มเพิ่มรายการ
    addButton.disabled = true;

    // ซ่อนปุ่มบันทึกและแสดงปุ่มแก้ไข
    document.getElementById('edit-button').style.display = 'block';
    document.getElementById('save-button').style.display = 'none';

    showPopup();  // แสดงป๊อปอัพ
}


// ฟังก์ชันแสดงป๊อปอัพ
function showPopup() {
    const popup = document.querySelector('.popup-overlay');
    popup.style.display = 'flex';  // แสดงป๊อปอัพ
}

// ฟังก์ชันปิดป๊อปอัพเมื่อคลิกปุ่ม "ปิด"
function closePopup() {
    const popup = document.querySelector('.popup-overlay');
    popup.style.display = 'none';  // ซ่อนป๊อปอัพ
}

// ฟังก์ชันสำหรับตรวจสอบสถานะเมื่อโหลดหน้าเว็บ
function disableAllButtons() {
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");

    // ปิดการกรอกข้อมูลและปุ่มทั้งหมด
    inputs.forEach(input => {
        input.disabled = true;
    });

    // ปิดปุ่มลบ
    deleteButtons.forEach(button => {
        button.disabled = true;
    });

    // ปิดปุ่มเพิ่มรายการ
    addButton.disabled = true;
}

// เรียกใช้ฟังก์ชัน disableAllButtons เมื่อหน้าเว็บโหลด
window.onload = disableAllButtons;

</script>


    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
