<?php
// Include config file
require_once "../../db/config.php";

// Define variables and initialize with empty values
$title = $thumbnail = $content = $price = $quantity = "";
$title_err = $thumbnail_err = $content_err = $price_err = $quantity_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    $input_title = trim($_POST["title"]);
    if (empty($input_title)) {
        $title_err = "Please enter a title.";
    } elseif (!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $title_err = "Please enter a valid title.";
    } else {
        $title = $input_title;
    }

    // Validate thumbnail
    $input_thumbnail = trim($_POST["thumbnail"]);
    if (empty($input_thumbnail)) {
        $thumbnail_err = "Please enter an thumbnail.";
    } else {
        $thumbnail = $input_thumbnail;
    }

    // Validate content
    $input_content = trim($_POST["content"]);
    if (empty($input_content)) {
        $content_err = "Please enter the content amount.";
    } else {
        $content = $input_content;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_price)) {
        $price_err = "Please enter a positive integer value.";
    } else {
        $price = $input_price;
    }

    // Validate quantity
    $input_quantity = trim($_POST["quantity"]);
    if (empty($input_quantity)) {
        $quantity_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_quantity)) {
        $quantity_err = "Please enter a positive integer value.";
    } else {
        $quantity = $input_quantity;
    }

    // Check input errors before inserting in database
    if (empty($title_err) && empty($thumbnail_err) && empty($content_err) && empty($price_err) && empty($quantity_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (title, thumbnail, content, price, quantity) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_title, $param_thumbnail, $param_content, $param_price, $param_quantity);

            // Set parameters
            $param_title = $title;
            $param_thumbnail = $thumbnail;
            $param_content = $content;
            $param_price = $price;
            $param_quantity = $quantity;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index_crud.php");
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>title</label>
                            <input type="text" title="title" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>">
                            <span class="invalid-feedback"><?php echo $title_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>thumbnail</label>
                            <textarea title="thumbnail" name="thumbnail" class="form-control <?php echo (!empty($thumbnail_err)) ? 'is-invalid' : ''; ?>"><?php echo $thumbnail; ?></textarea>
                            <span class="invalid-feedback"><?php echo $thumbnail_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>content</label>
                            <input type="text" title="content" name="content" class="form-control <?php echo (!empty($content_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $content; ?>">
                            <span class="invalid-feedback"><?php echo $content_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input type="text" title="price" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>quantity</label>
                            <input type="text" title="price" name="quantity" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
                            <span class="invalid-feedback"><?php echo $quantity_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index_crud.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>