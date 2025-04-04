<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สภาพทั่วไปและข้อมูลพื้นฐาน</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <style>
/* ทำให้ปุ่มเพิ่มรายการอยู่กึ่งกลาง */
.menu {
  text-align: center !important; /* จัดปุ่มทั้งหมดให้ตรงกลาง */
  
}

/* ปุ่มเพิ่มรายการ */
.btn-addlist {
    background-color: #4B4B4B !important; /* สีพื้นหลังของปุ่ม */
    color: white !important; /* สีข้อความ */
    padding: 10px 20px !important; /* ระยะห่างภายในปุ่ม */
    border: none !important; /* ไม่มีเส้นขอบ */
    border-radius: 5px !important; /* มุมปุ่มกลม */
    font-size: 16px !important; /* ขนาดตัวอักษร */
    cursor: pointer !important; /* เปลี่ยนเคอร์เซอร์เป็นมือเมื่อคลิก */
    transition: background-color 0.3s ease !important; /* การเปลี่ยนแปลงสีพื้นหลังค่อยๆ */
    width: 200px !important; /* กำหนดความกว้างของปุ่ม */
    display: inline-block !important; /* ให้ปุ่มแสดงผลในบรรทัดเดียว */
    margin-top: 20px !important; /* ระยะห่างจากปุ่มอื่นๆ */
    text-align: center !important; /* จัดข้อความให้อยู่ตรงกลางแนวนอน */
    line-height: 40px !important; /* จัดข้อความให้อยู่กลางแนวตั้ง */
}

/* เมื่อเอาเมาส์ไปวางที่ปุ่ม */
.btn-addlist:hover {
    background-color: #666666 !important; /* สีพื้นหลังเมื่อเอาเมาส์ไปวาง */
}

/* เพิ่มระยะห่างระหว่างปุ่ม */
button {
    margin-right: 10px; /* ระยะห่างระหว่างปุ่ม */
}

/* สำหรับปุ่มที่ไม่ต้องการให้มีระยะห่างด้านขวา */
button:last-child {
    margin-right: 0; /* เอาระยะห่างออกจากปุ่มสุดท้าย */
}

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


<!-- เพิ่ม HTML สำหรับ popup การยืนยันการลบ โดยแยกจาก popup เดิม -->
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

<!-- คง HTML เดิมของคุณไว้ทั้งหมด -->
<div class="container">
    <div class="menu">
        <button class="custom-btn">(๙) อื่น ๆ (ถ้ามีระบุด้วย)</button>
        <a href="<?= site_url('Sec1/sub9') ?>">
            <button class="active">รายการที่ ๑</button>
        </a>
        <button class="btn-addlist" onclick="addList()">เพิ่มรายการ</button>
    </div>

    <div class="content">
        <div class="tab-menu"></div>

        <h3>คำสั่งการทำงานของเมนู</h3>

        <label>ชื่อรายการหลัก ๑</label>
        <textarea class="input-box" placeholder="กรอกชื่อรายการหลัก ๑." disabled></textarea> <br>

        <label>รายละเอียดรายการ ๑</label>
        <textarea class="input-box" placeholder="กรอกรายละเอียดรายการ ๑." disabled></textarea>

        <div class="button-container">
            <button class="btn-delete" onclick="confirmDelete(this)" disabled>ลบ</button>
            <button id="edit-button" class="button edit-button" onclick="enableEdit()">แก้ไข</button>
            <button id="save-button" class="button save-button" onclick="saveChanges()" style="display: none;">บันทึก</button>
        </div>
    </div>
</div>

<!-- คง popup เดิมของคุณไว้ -->
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
    let listCount = 1;
    let isEditing = false;
    let itemToDelete = null;

    function toThaiNumber(number) {
        const thaiDigits = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];
        return number.toString().split('').map(digit => thaiDigits[digit]).join('');
    }

    function addList() {
        listCount++;
        let thaiNumber = toThaiNumber(listCount);
        let newButton = document.createElement('a');
        newButton.href = '#';
        newButton.innerHTML = `<button>รายการที่ ${thaiNumber}</button>`;
        let menuContainer = document.querySelector('.menu');
        menuContainer.insertBefore(newButton, menuContainer.querySelector('.btn-addlist'));
    }

    function enableEdit() {
        isEditing = true;
        document.querySelectorAll('.input-box').forEach(textarea => {
            textarea.disabled = false;
        });
        document.querySelector('.btn-delete').disabled = false;
        document.getElementById('edit-button').style.display = 'none';
        document.getElementById('save-button').style.display = 'inline-block';
    }

    function saveChanges() {
        isEditing = false;
        
        document.querySelectorAll('.input-box').forEach(textarea => {
            textarea.disabled = true;
        });
        
        document.querySelector('.btn-delete').disabled = true;
        document.getElementById('edit-button').style.display = 'inline-block';
        document.getElementById('save-button').style.display = 'none';

        const firstTextarea = document.querySelector('.input-box');
        const inputValue = firstTextarea.value.trim();
        const activeButton = document.querySelector('.menu .active');
        
        if (inputValue !== '') {
            activeButton.textContent = inputValue;
        } else {
            activeButton.textContent = 'รายการที่ ๑';
        }

        showPopup();
    }

    function confirmDelete(button) {
        itemToDelete = document.querySelector('.menu .active').parentElement;
        document.querySelector('.delete-confirm-popup').style.display = 'flex';
    }

    function deleteItem() {
        if (itemToDelete) {
            itemToDelete.remove();
            document.querySelectorAll('.input-box').forEach(textarea => {
                textarea.value = '';
            });
            closeDeletePopup();
            showPopup('ลบสำเร็จ', 'รายการถูกลบเรียบร้อยแล้ว');
        }
    }

    function closeDeletePopup() {
        document.querySelector('.delete-confirm-popup').style.display = 'none';
        itemToDelete = null;
    }

    function showPopup(title = 'สำเร็จ', message = 'บันทึกข้อมูลสำเร็จ') {
        const popup = document.querySelector('.popup-overlay');
        popup.querySelector('.popup-title').textContent = title;
        popup.querySelector('.popup-message').textContent = message;
        popup.style.display = 'flex';
    }

    function closePopup() {
        document.querySelector('.popup-overlay').style.display = 'none';
    }

    document.querySelectorAll('.input-box')[0].addEventListener('input', function(e) {
        if (isEditing) {
            const inputValue = e.target.value.trim();
            const activeButton = document.querySelector('.menu .active');
            
            if (inputValue !== '') {
                activeButton.textContent = inputValue;
            } else {
                activeButton.textContent = 'รายการที่ ๑';
            }
        }
    });
</script>



    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
