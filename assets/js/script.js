// เลือกทุกปุ่ม
const buttons = document.querySelectorAll('button');

// เพิ่ม event listener สำหรับ hover
buttons.forEach(button => {
    button.addEventListener('mouseenter', function() {
        if (this.classList.contains('active')) {
            // ถ้ามีคลาส active ให้ไม่ทำอะไร
            return;
        } else {
            // ถ้าไม่มีคลาส active ก็ให้เปลี่ยนสี
            this.style.backgroundColor = '#B3B3B3';  // ตัวอย่างสีเมื่อ hover
        }
    });

    button.addEventListener('mouseleave', function() {
        if (!this.classList.contains('active')) {
            // ถ้าไม่มีคลาส active ก็คืนสีเดิม
            this.style.backgroundColor = '';  // คืนค่าสีเดิม
        }
    });
});
