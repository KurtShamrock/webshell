<!DOCTYPE html>
<?php session_start(); ?>
<?php  
    $cid=$_GET['id'];
    if(isset($_SESSION['username'])&& $_SESSION['username']){
         
    }
    else
    {
        header("Location: ../component/notfound.html");
    }
     ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DANH SÁCH SINH VIÊN</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php 
    include '../models/connectdb.php';
    ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../component/home.php">
            HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../student/danhsachsinhvien.php">Danh sách sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../student/themsinhvien.php">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../student/suasinhvien.php">Sửa thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../student/xoasinhvien.php">Xóa</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <p></p>
                <h1 class="display-3" align="CENTER">DANH SÁCH SINH VIÊN</h1>
                <hr class="m-y-md">
                <p></p>
            </div>
        </div> 
        <!-- end row jumbotron -->
        <div class="container">
            <div class="col-sm-12">
                <table class="table table-bordered table-inverse table-hover">
                    <thead align="CENTER">
                        <tr>
                            <th>Mã sinh viên</th>
                            <th>Họ tên</th>
                            <th>Quê quán</th>
                            <th>Số điện thoại</th>
                            <th>Mã lớp</th>
                            <th>Hình ảnh</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody align="CENTER">
                        <?php 
                            $sql = "SELECT * FROM student where classid='$cid'";
                            $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<th>'.$row['studentcode'].'</th>';
                                    echo '<th>'.$row['name'].'</th>';
                                    echo '<th>'.$row['hometown'].'</th>';
                                    echo '<th>'.$row['phone'].'</th>';
                                    echo '<th>'.$row['classid'].'</th>';
                                    echo '<th><img src="'.$row['avatar'].'" alt="" width="100px" height="100px"></th>';
                                    echo '<th><a href="dashboard.php?stcode='.$row["studentcode"] .'"><button type="button" class="btn btn-secondary">Xem</button></a></th>';
                                    echo '</tr>';
                                }
                            $conn->close();
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</body>
</html>