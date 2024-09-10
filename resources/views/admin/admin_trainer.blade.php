<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/trainer.css">
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
                    <h3 class="profile-name">Adminja</h3>
                </div>
                <ul class="nav flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./admin_dashboard.html">แดชบอร์ด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin_course.html">คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin_bill.html">บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./admin_trainer.html">เทรนเนอร์</a>
                    </li>

                </ul>
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
                    <button class="btn btn-add">Add</button>
                </div>

                <!-- Bill Section -->
                <div class="card trainer-card">
                    <div class="card-header">
                        เทรนเนอร์
                    </div>
                    <div class="card-body">
                        <div class="trainer-item">
                            <span><span class="badge"></span>Jasmine : เทรนเนอร์โยคะ </span>
                            <div class="trainer-buttons">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="showEditModal()">แก้ไข </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModalLabel()">ลบ </button>
                            </div>
                        </div>

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
                        backgroundColor: 'rgba(39, 39, 39, 0.2)',
                        borderColor: 'rgba(39, 39, 39, 0.4)',
                        borderWidth: 1,
                        barThickness: 60, // เพิ่มความหนาของแท่ง
                        categoryPercentage: 0.5, // ขยายขนาดของกลุ่มแท่งในหมวดหมู่
                        barPercentage: 0.9 // เพิ่มขนาดของแท่งในแต่ละกลุ่ม
                    },
                    {
                        label: 'Data Set 2',
                        data: [15, 25, 35], // ข้อมูลของแท่งที่สอง
                        backgroundColor: 'rgba(39, 39, 39, 0.4)',
                        borderColor: 'rgba(39, 39, 39, 0.6)',
                        borderWidth: 1,
                        barThickness: 60,
                        categoryPercentage: 0.5,
                        barPercentage: 0.9
                    },
                    {
                        label: 'Data Set 3',
                        data: [20, 30, 40], // ข้อมูลของแท่งที่สาม
                        backgroundColor: 'rgba(39, 39, 39, 0.6)',
                        borderColor: 'rgba(39, 39, 39, 0.8)',
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
