<?php
// Include config file
require_once "../../../db/config.php";

// Define variables and initialize with empty values
$fullname = $email = $psw = $phone = "";
$fullname_err = $email_err = $psw_err = $phone_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate fullname
    $input_fullname = trim($_POST["fullname"]);
    if (empty($input_fullname)) {
        $fullname_err = "Please enter a title.";
    } elseif (!filter_var($input_fullname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $fullname_err = "Please enter a valid title.";
    } else {
        $title = $input_fullname;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an thumbnail.";
    } else {
        $email = $input_email;
    }

    // Validate password
    $input_psw = trim($_POST["psw"]);
    if (empty($input_psw)) {
        $psw_err = "Please enter the content amount.";
    } else {
        $psw = $input_psw;
    }

    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_phone)) {
        $phone_err = "Please enter a positive integer value.";
    } else {
        $phone = $input_phone;
    }


    // Check input errors before inserting in database
    if (empty($fullname_err) && empty($email_err) && empty($psw_err) && empty($phone_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO register_login (fullname, email, psw, phone) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_fullname, $param_email, $param_psw, $param_phone);

            // Set parameters
            $param_fullname = $fullname;
            $param_email = $email;
            $param_psw = $psw;
            $param_phone = $phone;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index_register.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }


        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM register_login WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $param_fullname = $fullname;
                    $param_email = $email;
                    $param_psw = $psw;
                    $param_phone = $phone;
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>fullname</label>
                            <input type="text" title="fullname" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullname; ?>">
                            <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" title="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="password" title="password" name="psw" class="form-control <?php echo (!empty($psw_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $psw; ?>">
                            <span class="invalid-feedback"><?php echo $psw_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" title="phone" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index_crud.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>