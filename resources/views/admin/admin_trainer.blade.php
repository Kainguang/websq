@extends('layouts.sidebar')
@section('content')
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
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="trainer-title">เทรนเนอร์</h1>

                <!-- Info Boxes -->
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>เทรนเนอร์ทั้งหมด</h5>
                            <h2>{{ $totalEmployees }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>จำนวนคอร์สที่สอน</h5>
                            <h2>{{ $totalCoursesTaught }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>เงินเดือนเฉลี่ยของเทรนเนอร์</h5>
                            <h2>{{ number_format($averageSalary, 2) }} ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="chart-container">
                    <canvas id="alltrainerChart"></canvas>
                </div>

                <!-- Trainer Schedule Section -->
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>ตารางการทำงานเทรนเนอร์</h4>
                    </div>
                </div>

                <table id="trainerSchedule" class="table table-bordered display">
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
                        @foreach (['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'] as $day)
                        <tr>
                            <td>{{ $day }}</td>
                            @php $hour = 9; @endphp
                            @while ($hour < 15)
                                @php $courseFound = false; @endphp
                                @foreach ($trainers as $trainer)
                                    @if ($trainer->day_name == $day)
                                        @php
                                            $startHour = date('H', strtotime($trainer->start_time));
                                            $endHour = date('H', strtotime($trainer->end_time));
                                        @endphp
                                        @if ($hour == $startHour) <!-- ใช้ colspan เพื่อขยายเวลาตามที่จอง -->
                                            <td colspan="{{ $endHour - $startHour }}">
                                                @foreach ($trainers as $trainer)
                                                    @if ($trainer->day_name == $day && date('H', strtotime($trainer->start_time)) == $startHour)
                                                        {{ $trainer->firstname }} ({{ $trainer->course }})<br />
                                                    @endif
                                                @endforeach
                                            </td>
                                            @php
                                                $hour += ($endHour - $startHour);
                                                $courseFound = true;
                                                break;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if (!$courseFound)
                                    <td>&nbsp;</td>
                                    @php $hour++; @endphp
                                @endif
                            @endwhile
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <?php $shownTrainers = []; ?> <!-- กำหนดค่าเริ่มต้นให้ตัวแปร -->
                <section class="trainer-list">
                    <h5>รายชื่อเทรนเนอร์ทั้งหมด</h5>
                    <a href="{{ route('trainer_create') }}" class="btn btn-dark addButton float-end">เพิ่มเทรนเนอร์</a>
                    <table id="trainerListTable" class="table table-bordered display">
                        <thead class="color">
                            <tr>
                                <th >ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>คอร์สที่สอน</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $trainer)
                                @if (!in_array($trainer->firstname . ' ' . $trainer->lastname, $shownTrainers)) 
                                    <tr>
                                        <td>{{ $trainer->id }}</td>
                                        <td>{{ $trainer->firstname }}</td>
                                        <td>{{ $trainer->lastname }}</td>
                                        <td>{{ $trainer->email }}</td>
                                        <td>{{ $trainer->phone }}</td>
                                        <td>{{ $trainer->course }}</td>
                                        <td>
                                            <a href="{{ route('trainer_edit', $trainer->id) }}" class="btn btn-warning">แก้ไข</a>
                                            <button class="btn btn-danger deleteButton" onclick="confirmDelete('{{ $trainer->id }}')">ลบ</button>
                                        </td>
                                    </tr>
                                    <!-- เพิ่มชื่อเทรนเนอร์ในตัวแปรเพื่อป้องกันการแสดงซ้ำ -->
                                    <?php $shownTrainers[] = $trainer->firstname . ' ' . $trainer->lastname; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

    <!-- JavaScript for Chart.js -->
    <script>
    const trainerNames = @json($alltrainerchart->pluck('Trainer'));
    const studentCounts = @json($alltrainerchart->pluck('Total_Students'));

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
        $('#trainerListTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthMenu: [5, 10, 25],
            pageLength: 5,
            language: {
                lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
                zeroRecords: "ไม่พบข้อมูล",
                info: "แสดงหน้า _PAGE_ จาก _PAGES_",
                infoEmpty: "ไม่มีข้อมูล",
                infoFiltered: "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                search: "ค้นหา: "
            }
        });
    });

    // ฟังก์ชันสำหรับปุ่มลบพร้อม SweetAlert2
    function confirmDelete(trainer_id) {
        Swal.fire({
            title: 'คุณต้องการลบเทรนเนอร์คนนี้หรือไม่?',
            text: "การกระทำนี้ไม่สามารถย้อนกลับได้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin/trainer/delete?trainer_id=' + trainer_id;
            }
        });
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
