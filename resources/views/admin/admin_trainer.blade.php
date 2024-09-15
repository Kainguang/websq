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
                        <a class="nav-link" href="/admin/dashboard">สรุปภาพรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/course">คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/bill">บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/trainer">เทรนเนอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index" style="color: red;">ออกจากระบบ</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="dashboard-title">สรุปภาพรวม</h1>

                <!-- Info Boxes -->
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>คอร์สทั้งหมด</h5>
                            <h2>30</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>เทรนเนอร์ทั้งหมด</h5>
                            <h2>8</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้ทั้งหมด</h5>
                            <h2>15,000 ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
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
            </main>
        </div>
    </div>

    <!-- Chart Script -->
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar'],
                datasets: [
                    {
                        label: 'Lisa',
                        data: [10, 20, 30],
                        backgroundColor: 'rgba(201, 250, 0, 0.50)',
                        borderColor: 'rgba(201, 250, 0, 0.70)',
                        borderWidth: 1,
                        barThickness: 60,
                        categoryPercentage: 0.5,
                        barPercentage: 0.9
                    },
                    {
                        label: 'Kai',
                        data: [15, 25, 35],
                        backgroundColor: 'rgba(0, 206, 250, 0.50)',
                        borderColor: 'rgba(0, 206, 250, 0.70)',
                        borderWidth: 1,
                        barThickness: 60,
                        categoryPercentage: 0.5,
                        barPercentage: 0.9
                    },
                    {
                        label: 'kai tom',
                        data: [20, 30, 40],
                        backgroundColor: 'rgba(250, 0, 165, 0.50)',
                        borderColor: 'rgba(250, 0, 165, 0.70)',
                        borderWidth: 1,
                        barThickness: 60,
                        categoryPercentage: 0.5,
                        barPercentage: 0.9
                    }
                ]
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
        // Add this for border consistency
        "createdRow": function( row, data, dataIndex ) {
            $(row).css('border', '1px solid #ddd');
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
