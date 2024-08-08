<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration | PHP</title>
</head>
<body>
    <form action="registration.php" method="post">
        <div class=container>
            <h1>Registration Form</h1> 
            <p>Fill up the form with correct values.</p>
            <label for="username"><b>User name : </b></label>
            <input type="text" name="username" require> <br>

            <label for="password"><b>Pass word : </b></label>
            <input type="text" name="password" require> <br>

            <label for="firstname"><b>First Name</b></label>
            <input type="text" name="firstname" require> <br>
            
            <label for="lastname"><b>Last Name : </b></label>
            <input  type="text" name="lastname" require> <br>

            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label> <br>

            <label for="birthday">DOB:</label><br>
            <input type="date" id="birthday" name="birthday"><br>

            <input type="checkbox" id="option1" name="option1" value="Option 1">
            <label for="option1">Agree to Terms of Servieces</label><br>

            <input type="submit" name="create" value="Submit"> <br>
        </div>
    </form> 
</body>
</html>