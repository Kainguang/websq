<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="profile-section">
                    <img src="https://i.pinimg.com/564x/a7/00/79/a7007909daf4cbe86433b4072ffdc6d0.jpg" alt="Admin profile picture" class="profile-picture">
                    <a href="/admin/profile" class="profile-link">
                        <h3 class="profile-name">Adminja</h3>
                    </a>
                </div>
                <ul class="nav flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard"><i class="fas fa-chart-line"></i>สรุปภาพรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/course"><i class="fas fa-book"></i>คอร์ส</a>
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
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="course-title">คอร์ส</h1>

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
                        <h5>รายได้เฉลี่ยต่อคอร์ส</h5>
                        <h2>{{ number_format($averageRevenue, 2) }} ฿</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้</h5>
                            <h2>{{ number_format($totalRevenue, 2) }} ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="chart-container">
                    <canvas id="courseChart"></canvas>
                </div> <!-- ตำแหน่งที่ต้องการแสดงกราฟ -->

                <!-- สคริปต์สำหรับ Chart.js -->
                <script>
                    // เตรียมข้อมูลจาก Controller
                    const courseNames = @json($coursesData->pluck('course_name'));
                    const totalParticipants = @json($coursesData->pluck('total_participants'));

                    // สร้างกราฟ Bar chart ด้วย Chart.js
                    const courseCtx = document.getElementById('courseChart').getContext('2d');
                    const courseChart = new Chart(courseCtx, {
                        type: 'bar',
                        data: {
                            labels: courseNames, // ชื่อคอร์ส
                            datasets: [{
                                label: 'จำนวนคนสมัคร',
                                data: totalParticipants, // จำนวนคนที่สมัครในแต่ละคอร์ส
                                backgroundColor: 'rgba(250, 0, 165, 0.50)',
                                borderColor: 'rgba(250, 0, 165, 0.70)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            barThickness: 60
                        }
                    });
                </script>

                <!-- Search and Course Section -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>คอร์สทั้งหมด</h4>
                    <button class="btn btn-dark addButton">เพิ่ม</button>
                </div>

                <table id="coursesTable" class="display table table-striped">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อคอร์ส</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td> <!-- แสดง ID ของคอร์ส -->
                            <td>{{ $course->course_name }}</td> <!-- แสดงชื่อคอร์ส -->
                            <td>
                                <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                                <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // DataTable Initialization
            $('#coursesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50],
                "pageLength": 5,
                "language": {
                    "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                    "paginate": {
                        "first": "หน้าแรก",
                        "last": "หน้าสุดท้าย",
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "search": "ค้นหา : "
                }
            });
        });
    </script>
    <script>
         document.querySelectorAll('.addButton').forEach(button => {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: 'เพิ่มคอร์ส',
                        html: `
                         <div class="modal-body">
                                <form id="courseForm">
                                    <div class="form-group">
                                        <label for="courseName">ชื่อคอร์ส:</label>
                                        <input type="text" id="courseName" class="form-control" placeholder="ชื่อคอร์ส">
                                    </div>

                                    <div class="form-group">
                                        <label for="startTime">เวลาที่คอร์สเริ่ม:</label>
                                        <input type="time" id="startTime" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="endTime">เวลาที่คอร์สสิ้นสุด:</label>
                                        <input type="time" id="endTime" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">ราคาคอร์ส:</label>
                                        <input type="number" id="price" class="form-control" placeholder="ราคาคอร์ส">
                                    </div>

                                    <div class="form-group">
                                        <label for="sessions">จำนวนครั้งที่เรียน:</label>
                                        <input type="number" id="sessions" class="form-control" placeholder="จำนวนครั้งที่เรียน">
                                    </div>

                                    <div class="form-group">
                                        <label for="trainer">เทรนเนอร์:</label>
                                        <input type="text" id="trainer" class="form-control" placeholder="ชื่อเทรนเนอร์">
                                    </div>

                                    <div class="form-group">
                                        <label for="maxStudents">จำนวนคนสูงสุดต่อคอร์ส:</label>
                                        <input type="number" id="maxStudents" class="form-control" placeholder="จำนวนคนสูงสุดต่อคอร์ส">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">คำอธิบาย:</label>
                                        <textarea id="description" class="form-control" rows="3" placeholder="อธิบายรายละเอียดคอร์ส"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="days">เลือกวัน:</label>
                                        <select id="days" class="form-select" multiple>
                                            <option value="1">อาทิตย์</option>
                                            <option value="2">จันทร์</option>
                                            <option value="3">อังคาร</option>
                                            <option value="4">พุธ</option>
                                            <option value="5">พฤหัสบดี</option>
                                            <option value="6">ศุกร์</option>
                                            <option value="7">เสาร์</option>
                                        </select>
                                    </div>
                                </form>
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
</body>

</html>
