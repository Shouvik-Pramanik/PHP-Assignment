<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error{color : #FF0000;}
    </style>
</head>
<body>
    <?php
        $nameError="";
        $phoneError="";
        $emailError="";
        $username = "";
        $phone = "";
        $email = "";
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            if (empty($_POST["username"])) {
                $nameError = "Enter valid username";
            }
            else {
                $username = test_input($_POST['username']);
                if (!preg_match("/^[a-zA-Z-']*$/", $username)) {
                    $nameError = "Only letters and whitespaces allowed";
                }
            }
        }
        if (empty($_POST["email"])) {
            $emailError = "Enter valid email";
        }
        else {
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
            } 
        }
        if (empty($_POST["phone"])) {
            $phoneError = "Enter valid phone";
        }
        else {
            $phone = test_input($_POST['phone']);
            $numlength = strlen((string)$phone);  
            if ($numlength != 10) {
                $phoneError = "Invalid Phone Number";
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <div class="container">
        <div class="form_container">
            <p><span class="error"> * required field</span></p>
            <h3>Login Form</h3>
            <form action="validate.php" method="post">
                <p>
                    <label for="name">username:</label>
                    <input type="text" name="username" placeholder="Enter name"/>
                    <span class="error">* <?php echo $nameError;?></span>
                </p>
                <p>
                    <label for="phone">Phone No:</label>
                    <input type="number" name="number" placeholder="Enter name"/>
                    <span class="error">* <?php echo $phoneError;?></span>
                </p>
                <p>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter email"/>
                    <span class="error">* <?php echo $emailError;?></span>
                </p>
                <a href="./next.php"><button type="submit">Submit</button></a>
            </form>
        </div>
    </div>
</body>
</html>