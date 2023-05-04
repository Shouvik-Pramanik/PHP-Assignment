<?php
        $locationError="";
        $ageError="";
        $universityError="";
        $location = "";
        $age = "";
        $university = "";
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            if (empty($_POST["location"])) {
                $locationError = "Enter valid location";
            }
            else {
                $location = test_input($_POST['location']);
                if (!preg_match("/^[a-zA-Z-']*$/", $username)) {
                    $nameError = "Only letters and whitespaces allowed";
                }
            }
            if (empty($_POST["age"])) {
                $ageError = "Enter valid age";
            }
            else {
                $age = test_input($_POST['age']);
                if ($age<0) {
                    $ageError = "Enter valid age";
                }
            }
            if (empty($_POST["university"])) {
                $universityError = "Enter valid university";
            }
            else {
                $university = test_input($_POST['university']);
                if (!preg_match("/^[a-zA-Z-']*$/", $university)) {
                    $universityError = "Only letters and whitespaces allowed";
                }
            }
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="form_container">
            <h3>Login Form</h3>
            <form action="" method="post">
                <p>
                    <label for="location">Location:</label>
                    <input type="text" name="location" placeholder="Enter Location"/>
                    <span style="color:red;"><?php echo $nameError ?></span>
                </p>
                <p>
                    <label for="age">Age:</label>
                    <input type="number" name="age" placeholder="Enter age"/>
                </p>
                <p>
                    <label for="university">University:</label>
                    <input type="text" name="university" placeholder="University"/>
                </p>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php
        echo"Thanks";
    ?>
</body>
</html>