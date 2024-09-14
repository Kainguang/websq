<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/trainer.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="profile-section">
                    <img src="https://via.placeholder.com/80" alt="Admin profile picture" class="profile-picture">
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

                </ul>
                <li class="logout">
                        <a class="nav-link" href="/user/index">ออกจากระบบ</a>
                    </li>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="dashboard-title">เทรนเนอร์</h1>

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

                <!-- Search and Bill Section -->
                <div class="search-container">
                    <input type="text" class="form-control search-input" placeholder="Search">
                    <button class="btn btn-add">เพิ่ม</button>
                </div>

                        <h2>ตารางการทำงานเทรนเนอร์</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>วัน/เวลา</th>
                                        <th>9:00-10:00</th>
                                        <th>10:00-11:00</th>
                                        <th>11:00-12:00</th>
                                        <th>12:00-13:00</th>
                                        <th>13:00-14:00</th>
                                        <th>14:00-15:00</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>อาทิตย์</td>
                                        <td onclick="showBookingInfo('')">Lisa:Dance</td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Kai:Yoga</td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Lisa:Dance</td>
                                    </tr>
                                    <tr>
                                        <td>จันทร์</td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Yoga</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>อังคาร</td>
                                        <td onclick="showBookingInfo('')">Kaitom:Yoga</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Kaiping:Zumba</td>
                                    </tr>
                                    <tr>
                                        <td>พุธ</td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Lisa:Dance</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>พฤหัสบดี</td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Kaitom:Yoga</td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Kaiyang:Yoga</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>ศุกร์</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Kai:Zumba</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>เสาร์</td>
                                        <td></td>
                                        <td></td>
                                        <td onclick="showBookingInfo('')">Mimi:yoka</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Edit details here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveEditButton" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="confirmDeleteButton" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar'], // หมวดหมู่ (e.g., เดือน)
                datasets: [
                    {
                        label: 'Data Set 1',
                        data: [10, 20, 30], // ข้อมูลของแท่งแรก
                        backgroundColor: 'rgba(201, 250, 0, 0.50)',
                        borderColor: 'rgba(201, 250, 0, 0.70)',
                        borderWidth: 1,
                        barThickness: 60, // เพิ่มความหนาของแท่ง
                        categoryPercentage: 0.5, // ขยายขนาดของกลุ่มแท่งในหมวดหมู่
                        barPercentage: 0.9 // เพิ่มขนาดของแท่งในแต่ละกลุ่ม
                    },
                    {
                        label: 'Data Set 2',
                        data: [15, 25, 35], // ข้อมูลของแท่งที่สอง
                        backgroundColor: 'rgba(0, 206, 250, 0.50)',
                        borderColor: 'rgba(0, 206, 250, 0.70)',
                        borderWidth: 1,
                        barThickness: 60,
                        categoryPercentage: 0.5,
                        barPercentage: 0.9
                    },
                    {
                        label: 'Data Set 3',
                        data: [20, 30, 40], // ข้อมูลของแท่งที่สาม
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
                    x: {
                        stacked: false,
                        beginAtZero: true,
                        ticks: {
                            autoSkip: false
                        }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
        </script>        
</body>
</html>
