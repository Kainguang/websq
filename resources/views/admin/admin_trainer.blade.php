<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/trainer.css') }}">
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
                        <a class="nav-link" href="/admin/course"><i class="fas fa-book"></i>คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/bill"><i class="fas fa-file-invoice"></i>บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/trainer"><i class="fas fa-user-tie"></i>เทรนเนอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index" style="color: red;"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="trainer-title">เทรนเนอร์</h1>

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
                            <h5>เงินเดือนทั้งหมดของเทรนเนอร์</h5>
                            <h2>{{ number_format($totalSalaries, 2) }} ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="chart-container">
                    <canvas id="alltrainerChart"></canvas>
                </div>

                <!-- Search Section -->

                <!-- Trainer Schedule Section -->
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>ตารางการทำงานเทรนเนอร์</h4>
                        <button class="btn btn-dark addButton">เพิ่ม</button>
                    </div>
                </div>

                <!-- Trainer Schedule DataTable -->
                <table id="trainerSchedule" class="display table table-striped">
                    <thead>
                        <tr style="color:black">
                           <th>ลำดับ</th>
                            <th>วัน/เวลา</th>
                            <th>9:00 - 10:00</th>
                            <th>10:00 - 11:00</th>
                            <th>11:00 - 12:00</th>
                            <th>12:00 - 13:00</th>
                            <th>13:00 - 14:00</th>
                            <th>14:00 - 15:00</th>
                            <th>15:00 - 16:00</th>
                            <th>16:00 - 17:00</th>
                            <th>17:00 - 18:00</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>อาทิตย์</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                            <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>จันทร์</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                    <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                                    <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>อังคาร</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                            <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>พุธ</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                            <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>พฤหัสบดี</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                            <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>ศุกร์</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                            <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>เสาร์</td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td onclick="showBookingInfo('Kai:Yoga')">Kai:Yoga</td>
                            <td></td>
                            <td></td>
                            <td onclick="showBookingInfo('Lisa:Dance')">Lisa:Dance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                            <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

             <div class="mt-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>รายชื่อเทรนเนอร์และคอร์สที่สอน</h4>
                    </div>
                </div>

                <!-- Trainer List DataTable -->
                <table id="trainerList" class="display table table-striped">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>คอร์สที่สอน</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทร</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($trainers as $index => $trainer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $trainer->firstname }} {{ $trainer->lastname }}</td> <!-- แสดงชื่อเต็ม -->
                                    <td>{{ $trainer->course }}</td> <!-- แสดงคอร์สที่สอน -->
                                    <td>{{ $trainer->email }}</td>
                                    <td>{{ $trainer->phone }}</td> <!-- แสดงเบอร์โทรศัพท์ -->
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

                <!-- JavaScript for Chart.js -->
                <script>
                    // ข้อมูลจำนวนนักเรียนที่แต่ละเทรนเนอร์สอน
                    const trainerNames = @json($trainerStudentsCount->pluck('Trainer'));
                    const studentCounts = @json($trainerStudentsCount->pluck('Total_Students'));

                    // Debug ข้อมูลใน Console เพื่อตรวจสอบ
                    console.log(trainerNames, studentCounts);

                    // สร้างกราฟ Bar chart
                    const ctx = document.getElementById('alltrainerChart').getContext('2d');
                    const trainerChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: trainerNames,
                            datasets: [{
                                label: 'จำนวนนักเรียนที่สอน',
                                data: studentCounts,
                                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

                <!-- DataTable Script -->
                <script>
                    $(document).ready(function() {
                        // DataTable for trainer schedule
                        $('#trainerSchedule').DataTable({
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
                            },
                            "createdRow": function(row, data, dataIndex) {
                                $(row).css('border', '1px solid #ddd');
                            }
                        });

                        // DataTable for trainer list
                        $('#trainerList').DataTable({
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
                                                    <label for="name">ชื่อผู้สอน :</label>
                                                    <input type="text" id="name" class="swal2-input" placeholder="ชื่อผู้สอน">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">วันที่สอน :</label>
                                                    <input type="email" id="day" class="swal2-input" placeholder="วันที่สอน">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">เวลาที่สอน :</label>
                                                    <input type="text" id="time" class="swal2-input" placeholder="เวลาที่สอน">
                                                </div>
                                                <div class="form-group">
                                                    <label for="course">คอร์สที่สอน :</label>
                                                    <input type="text" id="course" class="swal2-input" placeholder="คอร์สที่สอน">
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
                                            const email = document.getElementById('day').value;
                                            const phone = document.getElementById('time').value;
                                            const course = document.getElementById('course').value;

                                            if (!name || !day || !time || !course) {
                                                Swal.showValidationMessage('กรุณากรอกข้อมูลให้ครบถ้วน');
                                                return false;
                                            }

                                            return { name: name, day: day, time: time, course: course };
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Swal.fire({
                                                icon: "success",
                                                title: 'เพิ่มข้อมูลเทรนเนอร์เรียบร้อย!',
                                                text: 'เพิ่มข้อมูลเทรนเนอร์เรียบร้อยแล้ว'
                                            });

                                            console.log(result.value);
                                        }
                                    });
                                });
                            });
                        </script>   
    </body>
    </html>
