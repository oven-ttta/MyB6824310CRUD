<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน - ระบบลงทะเบียนเรียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="text-primary"><i class="fas fa-chart-bar"></i> รายงานรายชื่อนักศึกษาในแต่ละวิชา</h2>
            <p class="text-muted">เลือกวิชาเพื่อดูรายชื่อนักศึกษาที่ลงทะเบียน</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="/" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> กลับหน้าหลัก
            </a>
        </div>
    </div>

    <!-- ฟอร์มเลือกวิชา -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('enrollments.report') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-8">
                    <label class="form-label">เลือกวิชา</label>
                    <select name="course_id" class="form-select" required>
                        <option value="">-- เลือกวิชา --</option>
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}" {{ request('course_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->code }} - {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> ค้นหา
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ผลลัพธ์ -->
    @if($selectedCourse)
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <i class="fas fa-users"></i> รายชื่อนักศึกษาวิชา: {{ $selectedCourse->code }} - {{ $selectedCourse->name }}
                <span class="badge bg-light text-dark float-end">{{ $results->count() }} คน</span>
            </div>
            <div class="card-body">
                @if($results->count() > 0)
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>คณะ</th>
                                <th>เกรด</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge bg-secondary">{{ $row->student_code }}</span></td>
                                <td>{{ $row->student_name }}</td>
                                <td><small class="text-muted">{{ $row->department_name }}</small></td>
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
                    <p class="text-muted text-center">ยังไม่มีนักศึกษาลงทะเบียนในวิชานี้</p>
                @endif
            </div>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
