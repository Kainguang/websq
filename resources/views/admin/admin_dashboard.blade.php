<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="profile-section">
                    <img src="https://i.pinimg.com/564x/a7/00/79/a7007909daf4cbe86433b4072ffdc6d0.jpg" alt="Admin profile picture" class="profile-picture">
                    <a href="/admin/profile" class="profile-link">
                        <h3 class="profile-name">Adminja</h3>
                    </a>
                </div>
                <ul class="nav flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/dashboard"><i class="fas fa-chart-line"></i>สรุปภาพรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/course"><i class="fas fa-book"></i>คอร์ส</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/admin/bill"><i class="fas fa-file-invoice"></i>บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/trainer"><i class="fas fa-user-tie"></i>เทรนเนอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index" style="color: red;"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4 main-content">
                <h1 class="dashboard-title">สรุปภาพรวม</h1>

                <!-- Info Boxes -->
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>คอร์สทั้งหมด</h5>
                            <h2>{{ $totalCourses }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>เทรนเนอร์ทั้งหมด</h5>
                            <h2>{{ $totalEmployees }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้ทั้งหมด</h5>
                            <h2>{{ number_format($totalRevenue, 2) }} ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="chart-container">
                    <h3>รายได้ต่อคอร์ส</h3>
                    <canvas id="revenueChart"></canvas>
                </div>

                <div class="chart-container">
                    <h3>จำนวนนักเรียนต่อคอร์ส</h3>
                    <canvas id="studentsChart"></canvas>
                </div>

                <!-- Bill Section -->
                <div class="table-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>บิล</h4>
                        <button class="btn btn-dark addButton">เพิ่ม</button>
                    </div>

                    <table id="billTable" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>คลาส</th>
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bills as $bill)
                            <tr>
                                <td></td>
                                <td>{{ $bill->firstname }} {{ $bill->lastname }}</td>
                                <td>{{ $bill->course_name }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                                    <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
<!-- DataTable Initialization -->
            <script>
                $(document).ready(function () {
                var table = $('#billTable').DataTable({
                    "columnDefs": [{
                        "searchable": false, // ไม่ต้องค้นหาที่คอลัมน์ลำดับ
                        "orderable": true,  // เปิดใช้งานการเรียงลำดับที่คอลัมน์ลำดับ
                        "targets": 0, // คอลัมน์แรก (ลำดับ)
                    }],
                    "order": [[1, 'asc']], // เรียงลำดับตามชื่อ (คอลัมน์ที่ 2)
                    "paging": true, // เปิดใช้งานการแบ่งหน้า
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var start = api.page.info().start; // ดึงข้อมูลการเริ่มต้นของแต่ละหน้า
                        api.column(0, { page: 'current' }).nodes().each(function (cell, i) {
                            cell.innerHTML = start + i + 1; // เพิ่มลำดับให้กับแต่ละแถว
                        });
                    }
                });
            });
            </script>
         </div>


                <script>
// ข้อมูลสำหรับกราฟรายได้ต่อคอร์ส
const revenueChartCtx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(revenueChartCtx, {
    type: 'bar',
    data: {
        labels: @json($courseNames), // รายชื่อคอร์ส
        datasets: [{
            label: 'รายได้ต่อคอร์ส (฿)',
            data: @json($revenuePerCourse), // ข้อมูลรายได้ของแต่ละคอร์ส
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});

// ข้อมูลสำหรับกราฟจำนวนนักเรียนต่อคอร์ส
const studentsChartCtx = document.getElementById('studentsChart').getContext('2d');
const studentsChart = new Chart(studentsChartCtx, {
    type: 'bar',
    data: {
        labels: @json($courseNames), // รายชื่อคอร์ส
        datasets: [{
            label: 'จำนวนนักเรียนต่อคอร์ส',
            data: @json($studentsPerCourse), // ข้อมูลจำนวนนักเรียนของแต่ละคอร์ส
            backgroundColor: 'rgba(255, 159, 64, 0.5)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});

</script>


                

                <!-- Edit Modal (SweetAlert2) -->
        <script>
            document.querySelectorAll('.editButton').forEach(button => {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: 'แก้ไขข้อมูล',
                        html: `
                            <div class="form-container">
                                <div class="form-group">
                                    <label for="name">ชื่อ :</label>
                                    <input type="text" id="name" class="swal2-input" placeholder="ชื่อ">
                                </div>
                                <div class="form-group">
                                    <label for="email">อีเมล :</label>
                                    <input type="email" id="email" class="swal2-input" placeholder="อีเมล">
                                </div>
                                <div class="form-group">
                                    <label for="phone">เบอร์โทร :</label>
                                    <input type="text" id="phone" class="swal2-input" placeholder="เบอร์โทร">
                                </div>
                                <div class="form-group">
                                    <label for="course">คอร์สเรียน :</label>
                                    <input type="text" id="course" class="swal2-input" placeholder="คอร์สเรียน">
                                </div>
                            </div>
                        `,
                        focusConfirm: false,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'บันทึก',
                        cancelButtonText: 'ยกเลิก',
                        preConfirm: () => {
                            const name = document.getElementById('name').value;
                            const email = document.getElementById('email').value;
                            const phone = document.getElementById('phone').value;
                            const course = document.getElementById('course').value;

                            if (!name || !email || !phone || !course) {
                                Swal.showValidationMessage('กรุณากรอกข้อมูลให้ครบถ้วน');
                                return false;
                            }

                            return { name: name, email: email, phone: phone, course: course };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: "success",
                                title: 'แก้ไขเรียบร้อย!',
                                text: 'แก้ไขข้อมูลเรียบร้อยแล้ว'
                            });

                            console.log(result.value);
                        }
                    });
                });
            });
            //delete

            document.querySelectorAll('.deleteButton').forEach(button => {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: 'คุณแน่ใจหรือไม่?',
                        text: "คุณจะไม่สามารถย้อนกลับการกระทำนี้ได้!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่',
                        cancelButtonText: 'ยกเลิก',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'ลบเรียบร้อย!',
                                'ข้อมูลของคุณถูกลบแล้ว.',
                                'success'
                            );
                        }
                    });
                });
            });
            //add
            document.querySelectorAll('.addButton').forEach(button => {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: 'เพิ่มข้อมูล',
                        html: `
                            <div class="form-container">
                                <div class="form-group">
                                    <label for="name">ชื่อ :</label>
                                    <input type="text" id="name" class="swal2-input" placeholder="ชื่อ">
                                </div>
                                <div class="form-group">
                                    <label for="email">อีเมล :</label>
                                    <input type="email" id="email" class="swal2-input" placeholder="อีเมล">
                                </div>
                                <div class="form-group">
                                    <label for="phone">เบอร์โทร :</label>
                                    <input type="text" id="phone" class="swal2-input" placeholder="เบอร์โทร">
                                </div>
                                <div class="form-group">
                                    <label for="course">คอร์สเรียน :</label>
                                    <input type="text" id="course" class="swal2-input" placeholder="คอร์สเรียน">
                                </div>
                            </div>
                        `,
                        focusConfirm: false,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'บันทึก',
                        cancelButtonText: 'ยกเลิก',
                        preConfirm: () => {
                            const name = document.getElementById('name').value;
                            const email = document.getElementById('email').value;
                            const phone = document.getElementById('phone').value;
                            const course = document.getElementById('course').value;

                            if (!name || !email || !phone || !course) {
                                Swal.showValidationMessage('กรุณากรอกข้อมูลให้ครบถ้วน');
                                return false;
                            }

                            return { name: name, email: email, phone: phone, course: course };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: "success",
                                title: 'แก้ไขเรียบร้อย!',
                                text: 'แก้ไขข้อมูลเรียบร้อยแล้ว'
                            });

                            console.log(result.value);
                        }
                    });
                });
            });
        </script>

</main>
</div>
</div>
</body>
</html>
