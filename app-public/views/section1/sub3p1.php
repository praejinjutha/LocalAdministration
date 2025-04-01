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

.menu {
  overflow-y: auto; /* เลื่อนในกรณีที่เนื้อหามากเกิน */
  float: left;
  transition: all 0.3s ease; /* เพิ่มการเปลี่ยนแปลงนุ่มนวล */
}

.content {
    width: 80%; /* ขนาดเริ่มต้นของเนื้อหาด้านขวา */
    float: left;
    transition: all 0.3s ease; /* เพิ่มการเปลี่ยนแปลงนุ่มนวล */
}

.content.expanded {
    width: 100%; /* ขยายเต็มจอเมื่อแถบด้านซ้ายหายไป */
}



table { 
            border-collapse: collapse; 
            table-layout: fixed;
            text-align: center; 
            margin-bottom: 40px;
        } 
 
        th, td { 
            border: 1px solid black; 
            padding: 8px; 
        } 
 

 
        #data-table td input, #data-table td select { 
            width: 100%; 
            box-sizing: border-box; 
            margin-top: 5px; 
            padding: 5px; 
        }

        .delete-btn {
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    width: auto;  /* ไม่ให้ขยายตามความกว้างของ cell */
    max-width: 50px;  /* จำกัดความกว้างสูงสุด */
    display: inline-block;  /* ทำให้ปุ่มมีขนาดตามเนื้อหา */
    text-align: center;  /* จัดตำแหน่งข้อความตรงกลาง */
    margin: 0 auto;  /* จัดกึ่งกลาง cell */
}

/* เพิ่มการควบคุมความกว้างของ cell การดำเนินการ */
#data-table th:nth-child(9), #data-table td:nth-child(9) { 
    width: 1%;  /* เพิ่มความกว้างเล็กน้อย */
    min-width: 60px;  /* กำหนดความกว้างขั้นต่ำ */
    max-width: 80px;  /* กำหนดความกว้างสูงสุด */
}

        .delete-btn:hover {
            background-color: #ff1a1a;
        }

        .btn-delete:disabled, .btn-add:disabled {
        cursor: not-allowed;
        opacity: 0.5; /* ทำให้ปุ่มดูจางลงเมื่อถูกปิดการใช้งาน */
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
            <button class="active">(๑) ข้อมูลเกี่ยวกับจำนวนประชากร</button>
          </a>
          <a href="<?= site_url('Sec1/sub3p2') ?>">
            <button>(๒) ช่วงอายุและจำนวนประชากร</button>
          </a>

        </div>


        <div class="content">
    <div class="tab-menu"></div>

    <h3>คำสั่งการทำงานของเมนู</h3>

<!-- ปุ่มเพิ่มรายการ -->
<div class="btn-container">

<button id="expandButton" class="expand-button">
<svg id="buttonIcon" width="22" height="22" viewBox="0 0 15 15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 2H10V1H14V5H13V2.70711L9.85355 5.85355L9.14645 5.14645L12.2929 2ZM5.85355 9.85355L2.70711 13H5V14H1V10H2V12.2929L5.14645 9.14645L5.85355 9.85355Z" fill="black"/>
</svg>

    <span id="buttonText">ขยายหน้าจอ</span>
</button>

    <!-- ปุ่มเพิ่มรายการ -->
    <button class="btn-add" onclick="addRow()">เพิ่มรายการ</button>
</div>


<table id="data-table">
    <thead>
        <tr>
            <th rowspan="2" style="width: 50px;">ลำดับ</th> <!-- ลดขนาดของลำดับ -->
            <th rowspan="2">หมู่ที่</th>
            <th rowspan="2" style="width: 200px;">หมู่บ้าน</th> <!-- เพิ่มความกว้างให้กับหมู่บ้าน -->
            <th rowspan="2">พื้นที่ทางการเกษตร</th>
            <th rowspan="2">ครัวเรือน</th>
            <th colspan="2">ประชากร</th>
            <th rowspan="2" style="width: 400px;">กำนัน/ผู้ใหญ่บ้าน</th>
            <th rowspan="2"></th>
        </tr>
        <tr>
            <th>ชาย</th>
            <th>หญิง</th>
        </tr>
    </thead>
    <tbody id="table-body">
    <tr class="no-delete">
            <td>1</td>
            <td><input type="text" placeholder="กรอกเลข" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;"></td>
            <td><input type="text" placeholder="กรอกชื่อหมู่บ้าน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;"></td>
            <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;"></td>
            <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;"></td>
            <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;"></td>
            <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;"></td>

            <td style="width: 400px;">
                <select style="width:100%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;">
                    <option value="" disabled selected>เลือกคำนำหน้า</option>
                    <option>นาย</option>
                    <option>นางสาว</option>
                    <option>นาง</option>
                </select>
                <div style="display: flex; gap: 10px;">
                    <input type="text" placeholder="กรอกชื่อจริง" style="flex: 1; width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;">
                    <input type="text" placeholder="กรอกนามสกุล" style="flex: 1; width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;">
                </div>
            </td>

            <td>
                <button class="btn-delete" onclick="deleteRow(this)">ลบ</button>
            </td>
        </tr>

        <tr class="no-delete">
            <td colspan="3">รวม</td>
            <td style="background-color: #f2f2f2;"></td> <!-- ปรับสีพื้นหลัง -->
<td style="background-color: #f2f2f2;"></td>
<td style="background-color: #f2f2f2;"></td>
<td style="background-color: #f2f2f2;"></td>

            <td colspan="2"></td>
        </tr>
    </tbody>
</table>



    <div class="button-container">
    <button id="edit-button" class="button edit-button" onclick="enableEdit()" style="margin-bottom: 20px;">แก้ไข</button>
    <button id="save-button" class="button save-button" onclick="saveChanges()" style="display: none; margin-bottom: 20px;">บันทึก</button>
    
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
// ตัวแปรตรวจสอบสถานะการแก้ไข
let isEditable = false;  // ตัวแปรตรวจสอบสถานะการแก้ไข (เริ่มต้นคือไม่ได้แก้ไข)

function enableEdit() {
    isEditable = true;  // เปิดโหมดแก้ไข
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");
    
    // เปิดการกรอกข้อมูล
    inputs.forEach(input => {
        input.disabled = false;

        // เปลี่ยนพื้นหลังของ input และ select เป็นสีขาวเมื่อแก้ไข
        input.style.backgroundColor = "white";  // พื้นหลังสีขาวสำหรับกรอกข้อมูล
    });

    // เปิดปุ่มลบ
    deleteButtons.forEach(button => {
        button.disabled = false;
    });

    // เปิดปุ่มเพิ่มรายการ
    addButton.disabled = false;

    // ซ่อนปุ่มแก้ไข และแสดงปุ่มบันทึก
    document.getElementById("edit-button").style.display = "none";
    document.getElementById("save-button").style.display = "inline-block";
}


function saveChanges() {
    isEditable = false;  // ปิดโหมดแก้ไข
    let inputs = document.querySelectorAll("input, select");
    let deleteButtons = document.querySelectorAll(".btn-delete");
    let addButton = document.querySelector(".btn-add");
    
    // ปิดการกรอกข้อมูล
    inputs.forEach(input => {
        input.disabled = true;

        // เปลี่ยนพื้นหลังเป็นสีเดิมเมื่อบันทึกเสร็จ
        input.style.backgroundColor = "#f0f0f0";  // พื้นหลังสีเดิม
    });

    // ปิดปุ่มลบ
    deleteButtons.forEach(button => {
        button.disabled = true;
    });

    // ปิดปุ่มเพิ่มรายการ
    addButton.disabled = true;

    // เปลี่ยนปุ่มเป็นแก้ไขอีกครั้ง
    document.getElementById("edit-button").style.display = "inline-block";
    document.getElementById("save-button").style.display = "none";



    showPopup();  // แสดงป๊อปอัพเมื่อบันทึกเสร็จ
}


// ฟังก์ชันแสดงป๊อปอัพ
function showPopup() {
    const popup = document.querySelector('.popup-overlay');
    popup.style.display = 'flex';  // แสดงป๊อปอัพ
}

// ฟังก์ชันปิดป๊อปอัพ
function closePopup() {
    const popup = document.querySelector('.popup-overlay');
    popup.style.display = 'none';  // ซ่อนป๊อปอัพ
}

// ฟังก์ชันตรวจสอบสถานะเมื่อหน้าเว็บโหลด
function disableAllInputs() {
    const inputs = document.querySelectorAll('#data-table input, #data-table select');
    const deleteButtons = document.querySelectorAll('.btn-delete');
    const addButton = document.querySelector('.btn-add');

    // ปิดทุกช่องกรอกข้อมูล
    inputs.forEach(input => input.disabled = true);

    // ปิดปุ่มลบ
    deleteButtons.forEach(button => button.disabled = true);

    // ปิดปุ่มเพิ่มรายการ
    addButton.disabled = true;
}

// เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลด
window.onload = function() {
    disableAllInputs(); // ปิดการแก้ไขเริ่มต้น
    calculateColumns(); // คำนวณผลรวมทันทีเมื่อโหลดหน้า
    addCalculationListeners(); // เพิ่ม Event Listener ให้ input ที่มีอยู่แล้ว
};

// ฟังก์ชันคำนวณผลรวมของทุกคอลัมน์
function calculateColumns() {
    const rows = document.querySelectorAll('#table-body tr:not(:last-child)'); // เลือกทุกแถวยกเว้นแถวรวม
    const totalRow = document.querySelector('#table-body tr:last-child'); // แถวรวม

    // รีเซ็ตผลรวม
    let totalAgricultureArea = 0;
    let totalHouseholds = 0;
    let totalMales = 0;
    let totalFemales = 0;

    // คำนวณผลรวมจากทุกแถว
    rows.forEach(row => {
        const agricultureArea = parseInt(row.cells[3].querySelector('input').value) || 0;
        const households = parseInt(row.cells[4].querySelector('input').value) || 0;
        const males = parseInt(row.cells[5].querySelector('input').value) || 0;
        const females = parseInt(row.cells[6].querySelector('input').value) || 0;

        totalAgricultureArea += agricultureArea;
        totalHouseholds += households;
        totalMales += males;
        totalFemales += females;
    });

    // อัปเดตผลรวมในแถวรวม
    totalRow.cells[1].textContent = totalAgricultureArea; // พื้นที่ทางการเกษตร
    totalRow.cells[2].textContent = totalHouseholds;     // ครัวเรือน
    totalRow.cells[3].textContent = totalMales;          // ชาย
    totalRow.cells[4].textContent = totalFemales;        // หญิง
}

// ฟังก์ชันเพิ่ม Event Listener ให้กับ input ทุกตัว รวมถึงที่เพิ่มใหม่
function addCalculationListeners() {
    const inputs = document.querySelectorAll('#data-table input[type="text"]');
    inputs.forEach(input => {
        // ลบ Event Listener เดิมก่อนเพิ่มใหม่เพื่อป้องกันการซ้ำซ้อน
        input.removeEventListener('input', calculateColumns);
        input.addEventListener('input', calculateColumns);
    });
}

// ฟังก์ชันอัปเดตลำดับแถว
function updateRowNumbers() {
    const tableBody = document.getElementById('table-body');
    const rows = tableBody.querySelectorAll('tr:not(:last-child)'); // เลือกทุกแถว ยกเว้นแถว "รวม"

    // อัปเดตลำดับใหม่
    rows.forEach((row, index) => {
        row.cells[0].textContent = index + 1; // กำหนดลำดับใหม่เริ่มจาก 1
    });
}

// ฟังก์ชันเพิ่มแถวใหม่
// ฟังก์ชันเพิ่มแถว (ปรับปรุงให้ลำดับถูกต้อง)
function addRow() {
    const tableBody = document.getElementById('table-body');
    const rowCount = tableBody.rows.length;

    // เพิ่มแถวใหม่ก่อนแถวรวม
    const newRow = tableBody.insertRow(rowCount - 1);
    
    newRow.innerHTML = `
        <td>${rowCount}</td>
        <td><input type="text" placeholder="กรอกเลข" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;"></td>
        <td><input type="text" placeholder="กรอกชื่อหมู่บ้าน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;"></td>
        <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;"></td>
        <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;"></td>
        <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;"></td>
        <td><input type="text" placeholder="กรอกจำนวน" style="width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;"></td>
        <td>
            <select style="width:100%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;">
                <option value="" disabled selected>เลือกคำนำหน้า</option>
                <option>นาย</option>
                <option>นางสาว</option>
                <option>นาง</option>
            </select>
            <div style="display: flex; gap: 10px;">
                <input type="text" placeholder="กรอกชื่อจริง" style="flex: 1; width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;">
                <input type="text" placeholder="กรอกนามสกุล" style="flex: 1; width:90%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px; background-color: #f0f0f0;">
            </div>
        </td>
        <td>
            <button class="btn-delete" onclick="deleteRow(this)">ลบ</button>
        </td>
    `;

    // อัปเดตลำดับของแถวทั้งหมด
    updateRowNumbers();

    // อัปเดต Event Listener หลังจากเพิ่มแถวใหม่
    addCalculationListeners();

    // คำนวณผลรวมทันที
    calculateColumns();

    // ปิดการแก้ไขถ้าไม่ได้อยู่ในโหมดแก้ไข
    if (!isEditable) {
        disableAllInputs();
    }
}

let targetButton = null;

function showDeleteModal(btn) {
    const deleteModalOverlay = document.querySelector('.delete-modal-overlay');
    if (deleteModalOverlay) {
        deleteModalOverlay.style.display = 'flex';
        targetButton = btn;
    }
}

function closeDeleteModal() {
    const deleteModalOverlay = document.querySelector('.delete-modal-overlay');
    if (deleteModalOverlay) {
        deleteModalOverlay.style.display = 'none'; // ปิด Popup
        targetButton = null;
    }
}

function deleteRow(btn) {
    const row = btn.closest("tr");
    if (row.cells[0].textContent === "รวม") {
        alert("ไม่สามารถลบแถวนี้ได้");
        return;
    }
    showDeleteModal(btn);
}

function confirmDelete() {
    if (targetButton) {
        const row = targetButton.closest("tr");
        if (row.cells[0].textContent === "รวม") {
            alert("ไม่สามารถลบแถวนี้ได้");
            closeDeleteModal();
            return;
        }
        row.parentNode.removeChild(row); // ลบแถว
        closeDeleteModal(); // ปิด Popup
        updateRowNumbers(); // อัปเดตลำดับใหม่
        calculateColumns(); // คำนวณผลรวมใหม่
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const confirmButton = document.querySelector('.delete-modal-confirm');
    const cancelButton = document.querySelector('.delete-modal-cancel');

    if (confirmButton) {
        confirmButton.addEventListener('click', confirmDelete);
    }
    if (cancelButton) {
        cancelButton.addEventListener('click', closeDeleteModal);
    }
});


function toggleSidebar() {
    var sidebar = document.querySelector('.menu');
    var content = document.querySelector('.content');
    var expandButton = document.getElementById('expandButton');
    var buttonText = document.getElementById('buttonText');
    var buttonIcon = document.getElementById('buttonIcon');

    if (sidebar.style.display === 'none') {
        // สถานะย่อกลับมาเป็นปกติ
        sidebar.style.display = 'block';
        content.style.width = '80%';
        buttonText.textContent = 'ขยายตาราง';
        expandButton.classList.remove('expanded');
        
        // เปลี่ยนกลับเป็นไอคอนขยาย
        buttonIcon.innerHTML = `

<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 2H10V1H14V5H13V2.70711L9.85355 5.85355L9.14645 5.14645L12.2929 2ZM5.85355 9.85355L2.70711 13H5V14H1V10H2V12.2929L5.14645 9.14645L5.85355 9.85355Z" fill="black"/>
</svg>
        `;
    } else {
        // สถานะหุบ
        sidebar.style.display = 'none';
        content.style.width = '100%';
        buttonText.textContent = 'ย่อตาราง';
        expandButton.classList.add('expanded');
        
        // เปลี่ยนเป็นไอคอนหุบ
        buttonIcon.innerHTML = `
<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M13.8536 1.85356L10.7071 5.00001L13 5.00001V6.00001L9.00001 6.00001V2.00001H10V4.2929L13.1465 1.14645L13.8536 1.85356ZM2.00001 9.00001L6.00001 9.00001L6.00001 13H5.00001L5.00001 10.7071L1.85356 13.8536L1.14645 13.1465L4.2929 10L2.00001 10L2.00001 9.00001Z" fill="black"/>
</svg>
        `;
    }
}

document.getElementById('expandButton').addEventListener('click', toggleSidebar);

</script>

    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
