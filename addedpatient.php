<html>
    <head>
        <title></title>
    </head>

    <body>
    <?php

        $starting_id = 100002;

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["f_name"])){
                $data_missing[] = "f_name";
            }else{
                $f_name = trim($_POST["f_name"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["l_name"])){
                $data_missing[] = "l_name";
            }else{
                $l_name = trim($_POST["l_name"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["birthbirth_date"])){
                $data_missing[] = "birthbirth_date";
            }else{
                $birth_date = trim($_POST["birth_date"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["race"])){
                $data_missing[] = "race";
            }else{
                $race = trim($_POST["race"]);
            }
        }
        
        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["ethnicity"])){
                $data_missing[] = "ethnicity";
            }else{
                $ethnicity = trim($_POST["ethnicity"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["sex"])){
                $data_missing[] = "sex";
            }else{
                $sex = trim($_POST["sex"]);
            }
        }
        
        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["email"])){
                $data_missing[] = "email";
            }else{
                $email = trim($_POST["email"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["phone_number"])){
                $data_missing[] = "phone_number";
            }else{
                $phone_number = trim($_POST["phone_number"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["address"])){
                $data_missing[] = "address";
            }else{
                $address = trim($_POST["address"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["city"])){
                $data_missing[] = "city";
            }else{
                $city = trim($_POST["city"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["state"])){
                $data_missing[] = "state";
            }else{
                $state = trim($_POST["state"]);
            }
        }

        if(isset($_POST["submit"])){
            $data_missing = array();

            if(empty($_POST["zipcode"])){
                $data_missing[] = "zipcode";
            }else{
                $zipcode = trim($_POST["zipcode"]);
            }
        }


        if(empty($data_missing)){
            require_once("../mysqli_connect.php");
            $query = "Insert INTO patient (patient_id, f_name, l_name, birth_date, race, ethnicity, sex, email, phone_number, address, city, state, zipcode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
    
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssdsssssssss", $starting_id, $f_name, $l_name, $birth_date, $race, $ethnicity, $sex, $email, $phone_number, $address, $city, $state, $zipcode);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){
            
            echo "Patient Entered";

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }else{
            echo "Error Occured<br />";
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        } 
        
    } else{
        echo "You need to enter the following data<br />";
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }

    $starting_id += 1;
    ?>

    <form action="https://localhost/addedpatient.php" class="patient-form-container" style="padding: 0px;" method="POST">
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="f_name">First Name</label>
            <input class="name-field" type="text" name="f_name" required>  
        </div>
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="l_name">Last Name</label>
            <input class="name-field" type="text" name="l_name" required>  
        </div>
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="birth_date">Date of Birth</label>
            <input class="name-field" type="date" name="birth_date" placeholder="MM-DD-YYYY" required>  
        </div>
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="race">Race</label>
            <select name="race" required>
                <option value="" disable selected hidden>-Select-</option>
                <option>Black or African American</option>
                <option>Asian</option>
                <option>White</option>
                <option>American Indian or Alaska Native</option>
                <option>Hawaiian or Other Pacific Islander</option>
            </select>  
        </div>
        
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="ethnicity">Ethnicity</label>
            <select name="ethnicity" required>
                <option value="" disable selected hidden>-Select-</option>
                <option>Non Hispanic</option>
                <option>Hispanic or LatinX</option>
            </select>  
        </div>

        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="sex">Sex (Assigned at Birth)</label>
            <select name="sex" required>
                <option value="" disable selected hidden>-Select-</option>
                <option>Male</option>
                <option>Female</option>
            </select>  
        </div>

        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="email">Email</label>
            <input class="name-field" type="text" name="email" required>  
        </div>
        
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="phone">Phone Number</label>
            <input class="name-field" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>  
        </div>
        
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="address"></label>Address</label>
            <input class="name-field" type="text" name="address" required>  
        </div>
        
        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="city">City</label>
            <input class="name-field" type="text" name="city" required>  
        </div>

        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="state">State</label>
            <input class="name-field" type="text" name="state" required>  
        </div>

        <div class="col-sm-6 patient-form-group" style="float: left;">
            <label for="zip">Zip Code</label>
            <input class="name-field" type="text" name="zip" required>  
        </div>

        <div class="form-group container">
            <div class="col-sm-6 text-center" style="float: left;">
                <button style="display: inline;" class="form-btn btn btn-lg">Cancel</button>
            </div>
            <div class="col-sm-6"style="float: left;">
                <button id="submit-bt" class="form-btn btn btn-lg" type="submit" name="submit">Submit</button>
            </div>
        </div>
    </form>
    
    </body>
</html>