<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <!-- ลิงก์ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="h.css">
</head>
<body>
<!-- ส่วนหัวของหน้าเว็บ -->
<body>

<!-- ส่วนหัวของหน้าเว็บ -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./img/image 1 (1).PNG" alt=""></a>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="ค้นหาคลาสที่ต้องการ" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">ค้นหา</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3 filter-section">
            <div>
                <div class="filter-title">คลาสโยคะทั้งหมด</div>
                <ul class="category-list scrollable-category">
                    <li><a href="v.html" class="category-link"></a></li>
                    <li><a href="a.html" class="category-link">สินค้าทั้งหมด</a></li>
                    <li>
                        <a href="b.html" class="category-link">คลาสและอุปกรณ์เสริม</a>
                        <ul class="category-list">
                            <li><a href="c.html" class="category-link">คลาสทั้งหมด</a></li>
                            <li><a href="#" class="category-link">อุปกรณ์เสริม</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="category-link">1</a></li>
                    <li><a href="#" class="category-link">2</a></li>
                    <li><a href="#" class="category-link">3</a></li>
                    <li><a href="#" class="category-link">3</a></li>
                </ul>
            </div>
            <div class="price-range">
                <div class="filter-title">ช่วงราคา</div>
                <input type="range" min="2000" max="115000" value="2000">
                <div class="price-display">
                    <span>2000</span>
                    <span>115000</span>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h3>คลาสและอุปกรณ์เสริม</h3>
            <div class="product-grid">
                <div class="product-card">
                    <img src="" alt="รูปภาพฟิตเน็ต" class="img-fluid">
                    <h5>ชื่อ class</h5>
                    <p class="price">฿42,900 - ฿47,900</p>
                </div>
                <div class="product-card">
                    <img src="" alt="รูปภาพฟิตเน็ต" class="img-fluid">
                    <h5>ชื่อ class</h5>
                    <p class="price">฿63,900 - ฿78,900</p>
                </div>
                <div class="product-card">
                    <img src="" alt="รูปภาพฟิตเน็ต" class="img-fluid">
                    <h5>ชื่อ class</h5>
                    <p class="price">฿14,999 - ฿16,999</p>
                </div>
                <div class="product-card">
                    <img src="" alt="รูปภาพฟิตเน็ต" class="img-fluid">
                    <h5>ชื่อ class</h5>
                    <p class="price">฿19,999</p>
                </div>
                <div class="product-card">
                    <img src="" alt="รูปภาพฟิตเน็ต" class="img-fluid">
                    <h5>ชื่อ class</h5>
                    <p class="price">฿19,999</p>
                </div>
                <div class="product-card">
                    <img src="" alt="รูปภาพฟิตเน็ต" class="img-fluid">
                    <h5>ชื่อ class</h5>
                    <p class="price">฿63,900 - ฿78,900</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // เลือกทุกลิงก์ที่มีคลาส category-link
        const categoryLinks = document.querySelectorAll('.category-link');

        // โหลดสถานะที่บันทึกไว้ใน localStorage
        const activePage = localStorage.getItem('activePage');
        
        categoryLinks.forEach(link => {
            // ตรวจสอบว่าลิงก์นี้คือหน้าที่บันทึกไว้ใน localStorage หรือไม่
            if (link.getAttribute('data-page') === activePage) {
                link.classList.add('active');
            }

            link.addEventListener('click', function () {
                // บันทึกสถานะของลิงก์ที่เลือกใน localStorage
                localStorage.setItem('activePage', this.getAttribute('data-page'));

                // ลบคลาส active จากลิงก์ทั้งหมดก่อน
                categoryLinks.forEach(link => link.classList.remove('active'));

                // เพิ่มคลาส active ให้กับลิงก์ที่ถูกคลิก
                this.classList.add('active');
            });
        });
    });
</script>

<!-- ลิงก์ JavaScript ของ Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>