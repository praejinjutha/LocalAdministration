<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเว็บตัวอย่าง</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">


    <style>


body {
    font-family: "Noto Sans Thai", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f2f2f2 ;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    display: flex;
    gap: 50px;
    justify-content: center;
    align-items: flex-start;
    /* max-width: 1200px; */
    margin-top:35px;
}

.section {
    width: 250px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    overflow: hidden;
}

.header {
    background-color: #155535;
    color: white;
    text-align: center;
    padding: 12px;
    font-weight: bold;
    font-size: 20px;
    display: flex;     
    justify-content: center;
    align-items: center;
}

.item {
    background-color: #D9D9D9;
    padding: 12px;
    margin-top: 1px;
    font-size: 18px;
    text-align: left;
    transition: background-color 0.3s, transform 0.2s;
    color: black;
}

.item:hover {
    background-color: #bbb;
    transform: scale(1.03);
    cursor: pointer;
}

a {
    text-decoration: none;
    color: inherit;
    display: block;
}



    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <div class="header">ส่วนที่ ๑</div>

            <a href="<?= site_url('sec1') ?>">
                <div class="item">(๑) ด้านกายภาพ</div>
            </a>

            <a href="<?= site_url('Sec1/sub2p1') ?>">
            <div class="item">(๒) ด้านการเมือง/การปกครอง</div>
            </a>

            <a href="<?= site_url('Sec1/sub3p1') ?>">
            <div class="item">(๓) ประชากร</div>
            </a>
            
            <a href="<?= site_url('Sec1/sub4p1') ?>">
            <div class="item">(๔) สภาพทางสังคม</div>
            </a>

            <a href="<?= site_url('Sec1/sub5p1') ?>">
            <div class="item">(๕) ระบบบริการพื้นฐาน</div>
            </a>

            <a href="<?= site_url('Sec1/sub6p1') ?>">
            <div class="item">(๖) ระบบเศรษฐกิจ</div>
            </a>

            <a href="<?= site_url('Sec1/sub7p1') ?>">
            <div class="item">(๗) ศาสนา ประเพณี วัฒนธรรม</div>
            </a>

            <a href="<?= site_url('Sec1/sub8p1') ?>">
            <div class="item">(๘) ทรัพยากรธรรมชาติ</div>
            </a>
            
            <a href="<?= site_url('Sec1/sub9') ?>">
            <div class="item">(๙) อื่น ๆ</div>
            </a>
        </div>
        <div class="section">
            <div class="header">ส่วนที่ ๒</div>
            <div class="item">(๑) ด้าน</div>
        </div>
        <div class="section">
            <div class="header">ส่วนที่ ๓</div>
            <div class="item">(๑) ด้าน</div>
        </div>
    </div>
</body>
</html>
