<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Nike</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Oderlist.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.jpeg" alt="logo">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- คลาส / อุปกรณ์ -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            คลาส
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="yoga.html#yoga">คลาสโยคะ</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="dance.html#dance">คลาสเต้น</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="muaythai.html#muaythai">คลาสมวยไทย</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="zumba.html#zumba">คลาสซุมบา</a></li>
                        </ul>
                    </li>

                    <!-- เวลา -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            เวลา
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="class_time.html#morning">ช่วงเช้า</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="class_time.html#afternoon">ช่วงบ่าย</a></li>
                        </ul>
                    </li>

                    <!-- ครูผู้สอน -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ครูผู้สอน
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="class_gender.html#instructors-female">เพศหญิง</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="class_gender.html#instructors-male">เพศชาย</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- ช่องค้นหา และ ลิงก์เข้าสู่ระบบ -->
                <div class="d-flex align-items-center ms-3">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                    </form>

                    <a class="btn btn-primary ms-3" href="#" role="button"
                        onclick="window.location.href='login.html'">เข้าสู่ระบบ</a>

                    <a href="profile.html">
                        <img src="images/kuromi.jpg" alt="Profile" class="rounded-circle ms-3"
                            style="width: 40px; height: 40px;">
                    </a>

                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <section class="cart mt-4">
            <h2 class="mb-4">โยคะ</h2>
            <div class="row align-items-center mb-4 p-3 border bg-white">
                <div class="col-md-6">
                    <img src="./images/yoga2.jpg" alt="Yoga Class" class="img-fluid rounded mb-3">
                </div>
                <div class="col-md-6 shadow bg-light p-4 mb-4">
                    <h3>Yoga</h3>
                    <p><b>ชื่อครูผู้สอน :</b> ครูนุสรา สารธิราช (ปูนา)</p>
                    <p><b>ราคาต่อคอร์ส :</b> 1500 บาท</p>
                    <p><b>เวลาเริ่ม-สิ้นสุด :</b> 09:00-12:00 น.</p>
                    <p><b>ระยะเวลาคอร์ส :</b> 500</p>
                    <p><b>จำนวนคนต่อคอร์ส :</b> สูงสุด 12 คน</p>
                    <p><b>จำนวนคนในคอร์ส :</b> 10/12<p>
                    
                </div>
            </div>

            <div class="summary bg-white p-3 border mb-4 rounded shadow">
                <h3>สรุป</h3>
                <p>ยอดรวมย่อย: ฿1500.00</p>
                <p>ค่าธรรมเนียมการจัดส่งสินค้า: ฟรี</p>
                <p>ยอดรวม: ฿1500.00</p>
        
                <!-- Dropdown Section -->
                <div class="dropdown">
                    <button class="dropdown-btn" id="dropdown-btn">
                        <i class="fa fa-user"></i>เพิ่มจำนวน
                    </button>
        
                    <div class="dropdown-content" id="dropdown-content">
                        <!-- ผู้ใหญ่ -->
                        <div class="passenger-type">
                            <div>
                                <p>จำนวนคน</p>
                                <p class="description">เพิ่ม</p>
                            </div>
                            <div class="counter">
                                <button class="minus-btn" data-type="adult">-</button>
                                <input type="text" id="adult-count" value="1" readonly>
                                <button class="plus-btn" data-type="adult">+</button>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button class="submit-btn" id="done-btn">เสร็จแล้ว</button>
                    </div>
                </div>
            </div>
        
            <script>
                const dropdownBtn = document.getElementById('dropdown-btn');
                const dropdownContent = document.getElementById('dropdown-content');
                const doneBtn = document.getElementById('done-btn');
        
                let passengerCount = {
                    adult: 1,
                    child: 0,
                    infant: 0
                };
        
                // Toggle dropdown visibility
                dropdownBtn.addEventListener('click', function() {
                    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                });
        
                // Handle counter logic
                document.querySelectorAll('.plus-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const type = this.getAttribute('data-type');
                        passengerCount[type]++;
                        document.getElementById(`${type}-count`).value = passengerCount[type];
                        updateDropdownText();
                    });
                });
        
                document.querySelectorAll('.minus-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const type = this.getAttribute('data-type');
                        if (passengerCount[type] > 0) {
                            passengerCount[type]--;
                            document.getElementById(`${type}-count`).value = passengerCount[type];
                            updateDropdownText();
                        }
                    });
                });
        
                // Close dropdown on submit
                doneBtn.addEventListener('click', function() {
                    dropdownContent.style.display = 'none';
                });
        
                // Update the text in the dropdown button
                function updateDropdownText() {
                    let totalPassengers = passengerCount.adult + passengerCount.child + passengerCount.infant;
                    dropdownBtn.innerHTML = `<i class="fa fa-user"></i> ${totalPassengers} จำนวน`;
                }
        
                updateDropdownText();  // Initial update
            </script>

            <div class="container mt-4">
                <!-- Content here -->
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <!-- เปลี่ยนจาก window.location.href เป็นการเรียกใช้ฟังก์ชัน handleRedirect() -->
                        <button class="btn btn-dark" onclick="handleRedirect()">เพิ่มจำนวนคน</button>
                    </div>
                    
                    <script>
                        function handleRedirect() {
                            // เปลี่ยน URL ที่ต้องการให้ไป
                            window.location.href = "{{ route('Increasethenumber') }}";
                        }
                    </script>
                    
                    <div>
                        <button class="btn btn-dark" onclick="handlePaymentRedirect()">จ่ายเงิน</button>
                        <button class="btn btn-dark" onclick="showCancelModal()">ยกเลิก</button>
                    </div>
                </div>
            </div>
            <script>
                function handlePaymentRedirect() {
                    // เปลี่ยน URL ที่ต้องการให้ไป
                    window.location.href = "{{ route('payment') }}";
                }
            </script>


            <template id="my-template">
                <swal-title>
                    คุณต้องการยกเลิกหรือไม่?
                </swal-title>
                <swal-icon type="warning" color="red"></swal-icon>
                <swal-button type="confirm">
                    ตกลง
                </swal-button>
                <swal-button type="cancel">
                    ยกเลิก
                </swal-button>
                <swal-param name="allowEscapeKey" value="false" />
                <swal-param name="customClass" value='{ "popup": "my-popup" }' />
                <swal-function-param name="didOpen" value="popup => console.log(popup)" />
            </template>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function showCancelModal() {
                    Swal.fire({
                        template: "#my-template",
                        customClass: {
                            popup: 'my-popup'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // เปลี่ยนหน้าตอนที่กดปุ่ม "บันทึกเป็น"
                            window.location.href = 'index.html'; // เปลี่ยนเป็น URL ที่ต้องการ
                        } else if (result.isDismissed) {
                            // จัดการกับการคลิกปุ่มอื่น (ยกเลิก หรือ ปิดโดยไม่บันทึก) หากจำเป็น
                            console.log('ผู้ใช้คลิก ยกเลิก หรือ ปิดโดยไม่บันทึก');
                        }
                    });
                }
            </script>
</section>
</div>
<div class="footer"></div>
    <footer class="footer">
        <p class="mb-0">&copy; 2024 WellNessWave. All rights reserved.</p>
    </footer>
</div>
            <!-- Footer -->
            <!-- Footer code here -->

            <!-- Bootstrap JS (with Popper) -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>