<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <title>Index</title>
    
<style>
    .homeContainer{
        display: flex;
        flex-direction: row;
        width: 80%;
        justify-content: center;
        align-content: center;
        margin: auto;
    }
    .studentsContainer, .registerContainer{
        display: flex;
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
        width: 60%;
        height: 400px;
        background-image: linear-gradient(#dd73b3,white) ;
        padding: 2rem;
        margin: 2%;
        color: #860753;
        align-items: center;
        border: 2px solid #860753;
        border-radius: 10px;
        flex-direction: column;
        justify-content: center;
        
        
    }
    .studentsContainer:hover ,.registerContainer:hover{
        box-shadow: 0 0 7px #860753; 
    }
    .imgDiv{
        width: 100%;
        
        
    }
    img{
        object-fit: contain ;
        max-width: 100%;
    }
    #editUserImage{
        width: 20rem;
    }
   

  
    
</style>
<body>
<?php include('header.php') ?>

<div class="homeContainer">
    <div class="studentsContainer">
        <div  class="imgDiv"><img id="editUserImage" src="Images/CreateStudentRecord.png" alt=""></div>
        <h3>Register New Student</h3> 
       <h4><a href="register.php"><i class="bi bi-credit-card-2-front"> Click here</i></a><br></h4> 
    </div>
    <div class="registerContainer">
        <div  class="imgDiv"><img id="editUserImage" src="Images/editStudentrecord.png" alt=""></div>
        <h3>View & Update Student List</h3> 
        <h4><a href="registrationList.php"><i class="bi bi-pencil-square"> Click here</i></a><br></h4>
    </div>

</div>


<?php include('footer.php') ?>
</body>
</html>