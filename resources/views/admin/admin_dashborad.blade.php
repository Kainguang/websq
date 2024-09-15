<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


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
                        <a class="nav-link active" href="/admin/dashboard">สรุปภาพรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/course">คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/bill">บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/trainer">เทรนเนอร์</a>
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
                                <!-- Bill Section -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>บิล</h4>
                            <button class="btn btn-dark addButton">เพิ่ม</button>
                        </div>
                    </div>

                    <div>
                        <table id="billTable" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ชื่อ</th>
                                    <th>คลาส</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jasmin</td>
                                    <td>จอง โยคะ</td>
                                    <td>
                                        <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                                        <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>จอง ฟิตเนส</td>
                                    <td>
                                        <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                                        <button type="button" class="btn btn-danger deleteButton">ลบ</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function () {
        $('#billTable').DataTable();
    });
</script>
                </div>


<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar'],
            datasets: [
                {
                    label: 'Data Set 1',
                    data: [10, 20, 30],
                    backgroundColor: 'rgba(201, 250, 0, 0.50)',
                    borderColor: 'rgba(201, 250, 0, 0.70)',
                    borderWidth: 1,
                    barThickness: 60,
                    categoryPercentage: 0.5,
                    barPercentage: 0.9
                },
                {
                    label: 'Data Set 2',
                    data: [15, 25, 35],
                    backgroundColor: 'rgba(0, 206, 250, 0.50)',
                    borderColor: 'rgba(0, 206, 250, 0.70)',
                    borderWidth: 1,
                    barThickness: 60,
                    categoryPercentage: 0.5,
                    barPercentage: 0.9
                },
                {
                    label: 'Data Set 3',
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
