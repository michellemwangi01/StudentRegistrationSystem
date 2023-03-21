<?php 

include('config.php');

$sqlquery = "SELECT ID, studentName, studentEmail, studentRegID, studentMobile, studentCourse,RegDate FROM student_reg order by ID desc";
$results = mysqli_query($link, $sqlquery);
$students = mysqli_fetch_all($results, MYSQLI_ASSOC);
//PRINT_R( $students);//print out our Aarray version of the result
//echo $students[0]['studentName']



if(isset($_POST['delete'])){


    function deleteConfirm(){
        //echo 'Record has been deleted';
        echo ' <script>alert("Do you want too delete the selected record?")</script> ';
    }
    
    function deletenotConfirm(){
        echo ' <script>alert("Record has not been deleted")</script> ';
    }

    
    //echo '<script> confirm("Please confirm deletion of student No.' .$recordtoDelete.' by clicking \'OK\'")  </script>';
    //echo $_POST['recordtoDelete'];
    $recordtoDelete = mysqli_real_escape_string($link, $_POST['recordtoDelete']);
    //echo $recordtoDelete;
    
    $sqldeleteQuery = "DELETE FROM student_reg where ID = '{$recordtoDelete}'";
    
    if(mysqli_query($link, $sqldeleteQuery)){
        //sucessful delete
        //echo '<script> alert("Record has not been deleted")</script>';
        header('Location: registrationList.php');
        
    }else{
       
        echo 'Database Error: '.mysqli_error($conn);
    } 
    mysqli_free_result($results);
    mysqli_close($link);


   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Registered Students</title>
    
<style>
    .studentDetailsDiv{
        display: flex;
        flex-wrap: wrap;
        width: 90%;
        margin:  20px auto;
        border: 1.5px solid #860753;
        border-radius: 7px;
        padding: 20px;
    }
    .pageHeader{
        text-align: center;
        padding: 10px;
        margin: 5px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
    img{
        display: block;
    }
    button{
        border: none;
        background-color: transparent;
        color: #860753;
    }
   table{
    margin:0;
   }
   thead{
    
    text-align: center;
   }
   th{
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: lighter;

   }
   td{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    justify-content: left;
   }
   
</style>
</head>
<body>
    <?php include('header.php') ?>
    <div class="pageHeader">
        <h3>KeMU Registered Students</h3>
    </div>
    <div class="studentDetailsDiv table-responsive">
    <table class="table table-hover  table-striped table-responsive" >
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Student Names</th>
                <th>Course Registered</th>
                <th>Registration ID</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Registration Date</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-striped">
            <?php foreach($students as $studentElement): ?>
             <tr>
                <td> <?php echo '0'.htmlspecialchars($studentElement['ID']); ?> </td>
                <td> <?php echo htmlspecialchars($studentElement['studentName']); ?> </td>
                <td> <?php echo htmlspecialchars($studentElement['studentCourse']); ?> </td>
                <td> <?php echo htmlspecialchars($studentElement['studentRegID']); ?> </td>
                <td> <?php echo htmlspecialchars($studentElement['studentEmail']); ?> </td>
                <td> <?php echo htmlspecialchars($studentElement['studentMobile']); ?> </td>
                <td> <?php echo htmlspecialchars($studentElement['RegDate']); ?> </td>
                <td>
                    <form action="register.php" method="POST">   
                        <a href="editStudentDetails.php?id=<?php echo htmlspecialchars($studentElement['ID'])?>"><i class="bi bi-pencil"></i></a>
                    </form> 
                    
                </td>
                <td>
                    <form action="registrationList.php" method="POST">
                        <input 
                        type="hidden" 
                        name="recordtoDelete" 
                        value="<?php echo $studentElement['ID'] ?>">
                        <button onclick="alert('Selected record will be deleted')" type="submit" name="delete"><i class="bi bi-trash"></i></button>
                    </form>
                </td> 
            </tr>
            </tbody>
            <?php endforeach ?> 
        
    </table>


    </div>
   
<?php include('footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script>
        if(confirmation==true)
  {
    deleteConfirm();
  }
  else
  {    deletenotConfirm(); }
    </script> -->

</body>
</html>
