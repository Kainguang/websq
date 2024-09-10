<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bill.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <a class="nav-link active" href="./admin_bill.html">บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin_trainer.html">เทรนเนอร์</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="dashboard-title">บิล</h1>

                
                <!-- Search and Bill Section -->
                <div class="search-container">
                    <input type="text" class="form-control search-input" placeholder="Search">
                    <button class="btn btn-add">Add</button>
                </div>

                <!-- Bill Section -->
                <div class="card bill-card">
                    <div class="card-header">
                        บิล
                    </div>
                    <div class="card-body">
                        <div class="bill-item">
                            <span><span class="badge"></span>Jasmin : จอง โยคะ</span>
                            <div class="bill-buttons">
                                <button type="button" class="btn btn-warning"  id="editButton_db">แก้ไข </button>
                                <button type="button" class="btn btn-danger" id="deleteButton">ลบ </button>
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
    document.getElementById('deleteButton').addEventListener('click', function () {
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
                // ใส่โค้ดลบข้อมูลที่นี่
                Swal.fire(
                    'ลบเรียบร้อย!',
                    'ข้อมูลของคุณถูกลบแล้ว.',
                    'success'
                );
            }
        });
    });

    document.getElementById('editButton_db').addEventListener('click', function () {
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

    </script> 
</body>
</html>
