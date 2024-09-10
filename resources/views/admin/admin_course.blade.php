<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/course.css">
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
                        <a class="nav-link active" href="./admin_course.html">คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin_bill.html">บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin_trainer.html">เทรนเนอร์</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="dashboard-title">คอร์ส</h1>

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
                            <h5>คอร์สที่ยังไม่เสร็จ</h5>
                            <h2>15</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้</h5>
                            <h2>15,000 ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <!-- Bar Chart for Course Registrations -->
                <div class="chart-container">
                    <canvas id="courseChart"></canvas>
                </div>

                <!-- Search and Course Section -->
                <div class="search-container">
                    <input type="text" class="form-control search-input" placeholder="Search">
                    <button class="btn btn-add">Add</button>
                </div>

                <!-- Course Section -->
                <div class="card course-card">
                    <div class="card-header">
                        คอร์ส
                    </div>
                    <div class="card-body">
                        <div class="course-item">
                            <span><span class="badge"></span>คลาสโยคะ by ...</span>
                            <div class="bill-buttons">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal" onclick="showEditModal()">แก้ไข </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" onclick="deleteModalLabel()">ลบ </button>
                            </div>
                        </div>
                        <div class="course-item">
                            <span><span class="badge"></span>คลาสเต้น by ...</span>
                            <div class="bill-buttons">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal" onclick="showEditModal()">แก้ไข</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" onclick="deleteModalLabel()">ลบ</button>
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
        // Bar chart using Chart.js
        const courseCtx = document.getElementById('courseChart').getContext('2d');
        const courseChart = new Chart(courseCtx, {
            type: 'bar',
            data: {
                labels: ['คลาสโยคะ', 'คลาสเต้น', 'คลาสมวยไทย', 'คลาสซุมบา'],
                datasets: [{
                    label: 'จำนวนคนสมัคร',
                    data: [25, 40, 35, 20, 45],
                    backgroundColor: 'rgba(39, 39, 39, 0.2)',
                    borderColor: 'rgba(0, 0, 0, 1)',
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

</body>

</html>