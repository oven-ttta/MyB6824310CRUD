<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดนักศึกษา - {{ $student->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-user"></i> ข้อมูลนักศึกษา
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $student->name }}</h5>
                    <p class="card-text">
                        <strong>รหัสนักศึกษา:</strong> {{ $student->student_code }}<br>
                        <strong>คณะ:</strong> {{ $student->department->name ?? 'N/A' }}<br>
                        <strong>หน่วยกิตรวม:</strong> {{ $totalCredits }}
                    </p>
                    <a href="/" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> กลับหน้าหลัก
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-book"></i> ประวัติการลงทะเบียน
                </div>
                <div class="card-body">
                    @if($history->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>อาจารย์</th>
                                    <th>เกรด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $row)
                                <tr>
                                    <td>{{ $row->course_code }}</td>
                                    <td>{{ $row->course_name }}</td>
                                    <td>{{ $row->instructor_name }}</td>
                                    <td>
                                        @if($row->grade)
                                            <span class="badge bg-primary">{{ $row->grade }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">รอเกรด</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">ยังไม่มีรายวิชาที่ลงทะเบียน</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
