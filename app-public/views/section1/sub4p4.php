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




.form-wrapper {
    width: 100%; /* ทำให้ container กว้างเต็มหน้าจอ */
    height: auto; /* ทำให้ container สูงเต็มหน้าจอ */
    display: flex; /* ใช้ flexbox */
    justify-content: center; /* จัดตรงกลางในแนวนอน */
    align-items: center; /* จัดตรงกลางในแนวตั้ง */
}

.form-container {
    width: 500px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left; /* จัดข้อความในฟอร์มให้ตรงกลาง */
}


        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .checkbox-group {
            margin-bottom: 15px;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            font-size: 18px;
        }
        .checkbox-container input {
            display: none;
        }
        .checkmark {
            width: 16px;
            height: 16px;
            border: 2px solid black;
            display: inline-block;
            margin-right: 5px;
            position: relative;
        }
        .checkbox-container input:checked + .checkmark::after {
            content: "✔";
            position: absolute;
            top: -6px;
            left: 1px;
            font-weight: bold;
            font-size: 20px;
        }
        .textarea {
            font-family: "Noto Sans Thai", sans-serif;
            width: 100%;
            height: 50px;
            resize: none;
            background-color: #f0f0f0;;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .checkbox-container input:disabled + .checkmark {
            cursor: not-allowed;
            opacity: 0.5;
        }
        .textarea:disabled {
            cursor: not-allowed;
        }

        .required {
    color: black;
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
        <button class="custom-btn">(๔) สภาพทางสังคม</button>
          <a href="<?= site_url('Sec1/sub4p1') ?>">
            <button>(๑) การศึกษา</button>
          </a>
          <a href="<?= site_url('Sec1/sub4p2') ?>">
            <button>(๒) สาธารณสุข</button>
          </a>
          <a href="<?= site_url('Sec1/sub4p3') ?>">
            <button>(๓) อาชญากรรม</button>
          </a>
          <a href="<?= site_url('Sec1/sub4p4') ?>">
            <button class="active">(๔) ยาเสพติด</button>
          </a>
          <a href="<?= site_url('Sec1/sub4p5') ?>">
            <button>(๕) การสังคมสงเคราะห์</button>
          </a>
        </div>



        <div class="content">
    <div class="tab-menu"></div>

    <h3>คำสั่งการทำงานของเมนู</h3>


    <div class="form-wrapper">
    <form class="form-container">
        <label class="form-label"></label>

        <div class="checkbox-group">
            <label class="checkbox-container">
                <input type="checkbox" id="never-had" checked disabled>
                <span class="checkmark"></span>
                ไม่มีการแพร่ระบาดของยาเสพติด
            </label>

            <label class="checkbox-container">
                <input type="checkbox" id="had-issues" disabled>
                <span class="checkmark"></span>
                เคยมีการแพร่ระบาดของยาเสพติด
            </label>
        </div>

        <div id="textarea-container" style="display: none;">
            <label class="form-label">ระบุ: <span class="required">*</span></label>
            <textarea class="textarea" placeholder="โปรดระบุรายละเอียด..." disabled></textarea>
        </div>
    </form>
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
document.addEventListener("DOMContentLoaded", function () {
    const neverHadCheckbox = document.getElementById("never-had");
    const hadIssuesCheckbox = document.getElementById("had-issues");
    const textareaContainer = document.getElementById("textarea-container");
    const textarea = document.querySelector(".textarea");
    const editButton = document.getElementById("edit-button");
    const saveButton = document.getElementById("save-button");
    const popup = document.querySelector(".popup-overlay");
    const requiredSpan = document.querySelector(".required");

    // ฟังก์ชั่นสำหรับตั้งค่าการปิดใช้งาน
    function setDisabledState(state) {
        neverHadCheckbox.disabled = state;
        hadIssuesCheckbox.disabled = state;
        textarea.disabled = state || !hadIssuesCheckbox.checked;
        textarea.style.cursor = textarea.disabled ? "not-allowed" : "text";
        textarea.style.backgroundColor = textarea.disabled ? "#f0f0f0" : "#fff";
    }

    // ฟังก์ชั่นแสดง textarea เมื่อมีการติ้ก "เคยมีข้อขัดขวาง"
    hadIssuesCheckbox.addEventListener("change", function () {
        if (hadIssuesCheckbox.checked) {
            textareaContainer.style.display = "block";  // แสดง textarea
            requiredSpan.style.color = "red"; // เปลี่ยนสีเป็นแดง
        } else {
            textareaContainer.style.display = "none"; // ซ่อน textarea
            requiredSpan.style.color = "black"; // เปลี่ยนสีกลับ
            textarea.value = ""; // ลบข้อมูลเมื่อไม่ติ้ก
        }
    });

    setDisabledState(true); // ปิดการใช้งานเริ่มต้น

    // เมื่อกดปุ่ม "แก้ไข"
    editButton.addEventListener("click", function () {
        setDisabledState(false);
        editButton.style.display = "none";
        saveButton.style.display = "inline-block";
    });

    // เมื่อกดปุ่ม "บันทึก"
    saveButton.addEventListener("click", function () {
        if (hadIssuesCheckbox.checked && textarea.value.trim() === "") {
            alert("กรุณากรอกข้อมูลก่อน");
        } else {
            setDisabledState(true);
            saveButton.style.display = "none";
            editButton.style.display = "inline-block";
            popup.style.display = "flex";
        }
    });

    // ปิด popup
    window.closePopup = function () {
        popup.style.display = "none";
    };

    // ทำให้ติ๊กได้ทีละช่อง
    [neverHadCheckbox, hadIssuesCheckbox].forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            if (this === neverHadCheckbox) {
                hadIssuesCheckbox.checked = false;
                textareaContainer.style.display = "none";
                textarea.disabled = true;
                textarea.style.backgroundColor = "#f0f0f0";
                textarea.style.cursor = "not-allowed";
            } else if (this === hadIssuesCheckbox) {
                neverHadCheckbox.checked = false;
                textareaContainer.style.display = "block";
                textarea.disabled = false;
                textarea.style.backgroundColor = "#fff";
                textarea.style.cursor = "text";
            }
        });
    });
});
</script>



    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
