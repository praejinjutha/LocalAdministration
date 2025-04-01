<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สภาพทั่วไปและข้อมูลพื้นฐาน</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

.table-container {
    margin: 20px auto;
    max-width: 1200px;
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
    text-align: left;
    font-weight: bold;
}

.contact-cell {
    background-color: #D9D9D9;
}

table, th, td {
    border: 1px solid #888; /* หรือใช้ #666 ถ้าต้องการเข้มขึ้น */
    border-collapse: collapse;
}



.input-field {
    width: 100%;               /* ความกว้างเต็มที่ */
    border: 1px solid #ccc;    /* เส้นกรอบ */
    border-radius: 5px;        /* มุมโค้งมน */
    padding: 5px;              /* ช่องว่างภายใน */
    font-size: 14px;           /* ขนาดตัวอักษร */
}


/* สีสำหรับช่องที่กำลังแก้ไข */
.editable.active {
    background-color: white;
    cursor: text;
}



/* กำหนดกรอบให้กับ input ที่อยู่ใน td ที่มี class editable */
td.editable input {
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

input[list] {
    width: 200px;
    padding: 5px;
}

.select-custom {
    width: 200px; /* ปรับความกว้างตามต้องการ */
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.select-custom {
    width: 200px;
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.select2-container--default .select2-selection--single {
    height: 34px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 34px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 34px;
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
        <button class="custom-btn">(๑) ด้านกายภาพ</button>
          <a href="<?= site_url('sec1') ?>">
            <button class="active">(๑) ที่ตั้งของหมู่บ้านหรือชุมชนหรือตำบล</button>
          </a>
          <a href="<?= site_url('Sec1/sub1p2') ?>">
            <button>(๒) ลักษณะภูมิประเทศ</button>
          </a>
          <a href="<?= site_url('Sec1/sub1p3') ?>">
            <button>(๓) ลักษณะภูมิอากาศ</button>
          </a>
          <a href="<?= site_url('Sec1/sub1p4') ?>">
            <button>(๔) ลักษณะของดิน</button>
          </a>
        </div>


        <div class="content">
        <div class="tab-menu">
  <a href="<?= site_url('sec1') ?>"><button>(๑) ที่ตั้ง</button></a>
  <a href="<?= site_url('Sec1/territorial') ?>" class="active"><button>(๒) อาณาเขต</button></a>
  <a href="<?= site_url('Sec1/area') ?>"><button>(๓) พื้นที่</button></a>
</div>




            
<h3>คำสั่งการทำงานของเมนู</h3>

<div class="table-container">
<table>
    <tr>
        <th class="header-cell">ทิศ</th>
        <th class="header-cell" colspan="1"></th>
        <th class="header-cell">จังหวัด</th>
        <th class="header-cell">อำเภอ</th>
        <th class="header-cell">ตำบล</th>
    </tr>
    <tr>
        <td class="side-header">ทิศเหนือ</td>
        <td class="contact-area" rowspan="4" colspan="1">ติดต่อกับ</td>
        <td class="editable">
            <select id="province-1" class="select-custom">
                <option value="">เลือกจังหวัด</option>
            </select>
        </td>
        <td class="editable">
            <select id="amphur-1" class="select-custom" onchange="loadTambon(1)">
                <option value="">เลือกอำเภอ</option>
            </select>
        </td>
        <td class="editable">
            <select id="tambon-1" class="select-custom">
                <option value="">เลือกตำบล</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="side-header">ทิศใต้</td>
        <td class="editable">
            <select id="province-2" class="select-custom">
                <option value="">เลือกจังหวัด</option>
            </select>
        </td>
        <td class="editable">
            <select id="amphur-2" class="select-custom" onchange="loadTambon(2)">
                <option value="">เลือกอำเภอ</option>
            </select>
        </td>
        <td class="editable">
            <select id="tambon-2" class="select-custom">
                <option value="">เลือกตำบล</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="side-header">ทิศตะวันออก</td>
        <td class="editable">
            <select id="province-3" class="select-custom">
                <option value="">เลือกจังหวัด</option>
            </select>
        </td>
        <td class="editable">
            <select id="amphur-3" class="select-custom" onchange="loadTambon(3)">
                <option value="">เลือกอำเภอ</option>
            </select>
        </td>
        <td class="editable">
            <select id="tambon-3" class="select-custom">
                <option value="">เลือกตำบล</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="side-header">ทิศตะวันตก</td>
        <td class="editable">
            <select id="province-4" class="select-custom">
                <option value="">เลือกจังหวัด</option>
            </select>
        </td>
        <td class="editable">
            <select id="amphur-4" class="select-custom" onchange="loadTambon(4)">
                <option value="">เลือกอำเภอ</option>
            </select>
        </td>
        <td class="editable">
            <select id="tambon-4" class="select-custom">
                <option value="">เลือกตำบล</option>
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


<!-- Popup แจ้งเตือน -->
<div class="popup-overlay" id="popup" style="display: none;">
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
document.addEventListener('DOMContentLoaded', function() {
    // ใช้ลูปแทนการเขียนซ้ำ
    for (let i = 1; i <= 4; i++) {
        $(`#province-${i}`).select2({
            placeholder: "เลือกจังหวัด",
            allowClear: true,
            width: '100%',
            matcher: matchCustom
        }).on('change', function() {
            loadAmphur(i);
        });

        $(`#amphur-${i}`).select2({
            placeholder: "เลือกอำเภอ",
            allowClear: true,
            width: '100%'
        }).on('change', function() {
            loadTambon(i);
        });

        $(`#tambon-${i}`).select2({
            placeholder: "เลือกตำบล",
            allowClear: true,
            width: '100%'
        });
    }

    loadProvinces();
});

function loadProvinces() {
    fetch('/LocalAdministration/assets/js/api_province.json')
        .then(response => response.json())
        .then(data => {
            console.log('Provinces received:', data);
            for (let i = 1; i <= 4; i++) {
                const provinceSelect = $(`#province-${i}`);
                provinceSelect.empty().append('<option value="">เลือกจังหวัด</option>');
                data.forEach(province => {
                    provinceSelect.append(`<option value="${province.id}">${province.name_th}</option>`);
                });
            }
        })
        .catch(error => console.error('Error loading provinces:', error));
}

function loadAmphur(index) {
    const provinceId = $(`#province-${index}`).val();
    const amphurSelect = $(`#amphur-${index}`);
    const tambonSelect = $(`#tambon-${index}`);

    amphurSelect.empty().append('<option value="">เลือกอำเภอ</option>');
    tambonSelect.empty().append('<option value="">เลือกตำบล</option>');

    if (provinceId) {
        fetch('/LocalAdministration/assets/js/api_amphure.json')
            .then(response => response.json())
            .then(data => {
                console.log('Amphures received:', data);
                const filteredAmphures = data.filter(amphur => amphur.province_id == provinceId);
                filteredAmphures.forEach(amphur => {
                    amphurSelect.append(`<option value="${amphur.id}">${amphur.name_th}</option>`);
                });
            })
            .catch(error => console.error('Error loading amphures:', error));
    }
}

function loadTambon(index) {
    const amphurId = $(`#amphur-${index}`).val();
    const tambonSelect = $(`#tambon-${index}`);

    tambonSelect.empty().append('<option value="">เลือกตำบล</option>');

    if (amphurId) {
        fetch('/LocalAdministration/assets/js/api_tambon.json')
            .then(response => response.json())
            .then(data => {
                console.log('Tambons received:', data);
                const filteredTambons = data.filter(tambon => tambon.amphure_id == amphurId);
                filteredTambons.forEach(tambon => {
                    tambonSelect.append(`<option value="${tambon.id}">${tambon.name_th}</option>`);
                });
            })
            .catch(error => console.error('Error loading tambons:', error));
    }
}

function matchCustom(params, data) {
    if (!params.term || params.term.trim() === '') {
        return data;
    }
    const term = params.term.toLowerCase();
    const text = data.text.toLowerCase();
    return text.includes(term) ? data : null;
}

document.addEventListener('DOMContentLoaded', function() {
    // ล็อก dropdown ทั้งหมดตั้งแต่เริ่มต้น
    toggleDropdowns(false);
});

function toggleDropdowns(enable) {
    document.querySelectorAll('select').forEach(select => {
        select.disabled = !enable;  // ปิดการใช้งาน dropdown
    });
}

function enableEdit() {
    toggleDropdowns(true);
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('save-button').style.display = 'inline-block';
}

function saveChanges() {
    toggleDropdowns(false);
    document.getElementById('edit-button').style.display = 'inline-block';
    document.getElementById('save-button').style.display = 'none';

    // แสดง popup
    document.getElementById('popup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

</script>


    <!-- <script type="text/javascript" src="../assets/js/script.js"></script> -->
</body>
</html>
