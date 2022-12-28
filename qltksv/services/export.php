<?php session_start(); ?>
<?php  
      
  if(isset($_SESSION['username'])&& $_SESSION['username']){
     
  }
  else
  {
    header("Location: ../component/notfound.html");
  }
   ?>
<?php
//export.php  
include '../models/connectdb.php';
$id=$_GET['option'];
$output = '';
if(isset($_POST["export"]))
{
  if($id=='sv')
  {

 $query = "select s.id,c.classname,s.studentcode,s.name,s.hometown,s.phone,a.username from student s left join class c on c.id=s.classid left join account a on 
 a.studentcode=s.studentcode;";
  }
  if($id=='lop'){
    $query = "select c.id,c.classname,s.studentcode,s.name,s.hometown,s.phone,a.username from class c left join student s on c.id=s.classid left join account a on a.studentcode=s.studentcode;";
  }
  if($id=='tk'){
    $query = "select a.id,c.classname,s.studentcode,s.name,s.hometown,s.phone,a.username from account a left join student s on a.studentcode=s.studentcode left join class c on c.id=s.classid;";}
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>

              <th>Mã sinh viên</th>
              <th>Lớp</th>
              <th>Họ tên</th>
              <th>Quê quán</th>
              <th>Số điện thoại</th>
              
              <th>Username</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["studentcode"].'</td>  
                         <td>'.$row["classname"].'</td>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["hometown"].'</td>  
                         <td>'.$row["phone"].'</td>  
                         <td>'.$row["username"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename='.$id.'.xls');
  echo $output;
 }
}
?>
