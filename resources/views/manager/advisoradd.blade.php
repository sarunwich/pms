<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ขายสินค้า</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* สไตล์เพิ่มเติมสำหรับเมนูหมวดหมู่ */
        .category-menu {
            background-color: red; /* สีพื้นหลัง */
            border-radius: 10px; /* ขอบมุม */
            padding: 10px; /* ระยะห่างขอบ */
            position: fixed; /* ติดตั้งเมนู */
            top: 50%; /* ยืดให้ชิดด้านซ้ายและอยู่กึ่งกลางแนวตั้ง */
            transform: translateY(-50%); /* ย้ายเมนูให้อยู่กึ่งกลางแนวตั้ง */
        }

        .category-menu ul {
            list-style: none; /* เอา bullet point ออก */
            padding: 0;
        }

        .category-menu li a {
            color: white; /* สีข้อความ */
            text-decoration: none; /* เอา underline ออก */
        }

        .category-menu li {
            margin-bottom: 5px; /* ระยะห่างระหว่างรายการ */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ร้านขายสินค้า</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ติดต่อเรา</a>
                    </li>
                    <!-- เพิ่มเมนูเพิ่มเติมตามต้องการ -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- เมนูหมวดหมู่ที่แสดงตรงกลางด้านซ้าย -->
            <div class="col-md-3">
                <div class="category-menu">
                    <h2 class="text-center">เมนูหมวดหมู่</h2>
                    <ul>
                        <li><a href="#">เสื้อผ้า</a></li>
                        <li><a href="#">รองเท้า</a></li>
                        <li><a href="#">อุปกรณ์อิเล็กทรอนิกส์</a></li>
                        <!-- เพิ่มหมวดหมู่เพิ่มเติมตามต้องการ -->
                    </ul>
                </div>
            </div>
            <!-- ส่วนเนื้อหา -->
             <!-- ส่วนเนื้อหา -->
             <div class="col-md-9">
                <h1>สินค้าทั้งหมด</h1>
                <div class="row">
                    <!-- เพิ่มสินค้าตามต้องการ -->
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 1</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 1</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 2</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 2</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 3</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 3</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 3</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 3</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                </div>
                <div class="row">
                    <!-- เพิ่มสินค้าตามต้องการ -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 1</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 1</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 2</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 2</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 3</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 3</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                </div>
                <div class="row">
                    <!-- เพิ่มสินค้าตามต้องการ -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 1</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 1</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 2</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 2</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าที่ 3</h5>
                                <p class="card-text">รายละเอียดสินค้าที่ 3</p>
                                <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <!-- สินค้าตัวอย่างเพิ่มเติม -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS และอื่น ๆ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // สามารถเพิ่มสคริปต์เพิ่มเติมตามต้องการ
    </script>
</body>

</html>
