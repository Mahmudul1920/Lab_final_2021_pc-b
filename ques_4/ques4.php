<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>User Information</title>
</head>
<body>


<br>
<h1 class="text-center">All Student</h1>
<br>

<?php 

$connection = mysqli_connect('localhost','root','','exam') or die("not connected". mysqli_error());

    $query = "SELECT * FROM student ORDER BY Id ASC";
        $result = mysqli_query($connection,$query) or die("Failed");
        $count = mysqli_num_rows($result);
        if($count > 0){
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Section</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php 

while($row = mysqli_fetch_assoc($result)){
    


?>
    <tr>
      <th scope="row"><?php echo $row['Id'] ?></th>
      <td><?php echo $row['Name'] ?></td>
      <td><?php echo $row['Age'] ?></td>
      <td><?php echo $row['Section'] ?></td>
      <td><a href="delete_student.php?id=<?php echo $row['Id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php } ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>