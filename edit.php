<?php
include "db_connection.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Roll_No = $_POST['Roll_No'];
    $Email_id = $_POST['Email_id'];
    $Gender = $_POST['Gender'];
    $Branch = $_POST['Branch'];


    $sql = "UPDATE `crud` SET `Name`='$Name',`Roll_No`='$Roll_No',`Email_id`='$Email_id',`Gender`='$Gender',`Branch`='$Branch' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php?msg = Dat Updated successfully");
    } else {
        echo "Failed" . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intial-scale = 1.0 ">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> PHP CRUD Application</title>

</head>

<body>
    <?php include "header.php"; ?>

    <div class="container">
        <div class="text-center mb-4">
            <h3> Edit User Information</h3>
            <p class="text-muted"> Click update after changing any information</p>
        </div>


        <?php

        $sql = "SELECT * FROM crud WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3 row">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Name" value="<?php echo $row['Name'] ?>">
                </div>
                <div class="mb-3 row">
                    <label class="form-label" >Roll No.</label>
                    <input type="text" class="form-control" name="Roll_No" placeholder="Roll Number" value="<?php echo $row['Roll_No'] ?>">
                </div>
                <div class="mb-3 row">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email_id" placeholder="Email" value="<?php echo $row['Email_id'] ?>">
                </div>
                <div class="mb-3 row">
                <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="Gender" id="male" value="Male" <?php echo ($row['Gender'] == 'Male') ? "checked" : ""?>>
                        <label for="Male" class="form-input">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="Gender" id="female" value="Female" <?php echo ($row['Gender'] == 'Female') ? "checked":""?>>
                        <label for="Female" class="form-input">Female</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="form-label">Branch</label>
                    <select name="Branch" class="form-select" default="CSE">
                        <option value="CSE" <?php echo ($row['Branch'] == 'CSE') ? "selected":""?>>CSE</option>
                        <option value="MECH" <?php echo ($row['Branch'] == 'MECH') ? "selected":""?>>MECH</option>
                        <option value="CIVIL"<?php echo ($row['Branch'] == 'CIVIL') ? "selected":""?>>CIVIL</option>
                        <option value="ECE"  <?php echo ($row['Branch'] == 'ECE') ? "selected":""?>>ECE</option>
                    </select>
                </div>
                <div class="row  mb-3">
                <div class="hstack gap-3">
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">cancel</a>
                </div>
                <div>
            </form>
        </div>
        <div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>