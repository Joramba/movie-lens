<?php require_once "db_connection.php";

global $conn;
if (isset($_POST["Import"])) {

    $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            // $sql = "INSERT INTO `movie`(`movieId`,`title`, `genres`) VALUES ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "')";
            //$sql = "INSERT INTO `tags`(`userId`,`movieId`,`tag`, `timestamp`) VALUES ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "', '" . $getData[3] . "')";
            $sql = "INSERT INTO `rating`(`userId`,`movieId`,`rating`,`timestamp`) VALUES ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "', '" . $getData[3] . "')";
            $result = mysqli_query($conn, $sql);
            if (!isset($result)) {
                echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";
            } else {
                echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
            }
        }

        fclose($file);
    }
}

function get_all_movies()
{
    global $conn;
    $result = mysqli_query($conn, 'Select * from movie');

    ?>
    <div class="col-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">MovieId</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genres</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo ($row["movieId"]) ?>
                        </th>
                        <td>
                            <?php echo ($row["title"]) ?>
                        </td>
                        <td>
                            <?php echo $row["genres"] ?>

                        </td>
                        <td>
                            <a name="update_movie" id="update_movie" class="btn btn-primary"
                                href="update_movie.php?movieId=<?php echo ($row["movieId"]) ?>" role="button">Update</a>
                        </td>
                        <td>
                            <a name="delete" id="delete" class="btn btn-danger" role="button"
                                href="delete_movie.php?movieId=<?php echo ($row["movieId"]) ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

function insert_movie($title, $genres, $movieId)
{
    global $conn;

    $sql = "INSERT INTO `movie`(`movieId`,`title`, `genres`) VALUES ('$movieId','$title','$genres')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function delete_movie($id)
{
    global $conn;

    $sql = "Delete from movie where movieId='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    $sql = "Delete from tags where movieId='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    $sql = "Delete from rating where movieId='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: http://localhost:8080/");
}

function get_all_tags()
{
    global $conn;
    $result = mysqli_query($conn, 'Select * from tags');

    ?>
    <div class="col-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">UserId</th>
                    <th scope="col">MovieId</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo ($row["userId"]) ?>
                        </th>
                        <th>
                            <?php echo ($row["movieId"]) ?>
                        </th>
                        <td>
                            <?php echo $row["tag"] ?>

                        </td>
                        <td>
                            <?php echo $row["timestamp"] ?>
                        </td>
                        <td>
                            <a name="delete_tag" id="delete" class="btn btn-danger" role="button"
                                href="delete_tag.php?timestamp=<?php echo ($row["timestamp"]) ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

function insert_tag($userId, $movieId, $tag)
{
    global $conn;
    $timestamp = time();

    $sql = "INSERT INTO `tags`(`userId`,`movieId`,`tag`, `timestamp`) VALUES ('$userId','$movieId','$tag','$timestamp')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function delete_tag($timestamp)
{
    global $conn;

    $sql = "Delete from tags where timestamp='$timestamp'";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: http://localhost:8080/");
}


function get_all_users()
{
    global $conn;
    $result = mysqli_query($conn, 'Select * from users');

    ?>
    <div class="col-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">User Login</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo ($row["userId"]) ?>
                        </th>
                        <th>
                            <?php echo ($row["login"]) ?>
                        </th>
                        <td>
                            <a name="delete_user" id="delete" class="btn btn-danger" role="button"
                                href="delete_user.php?userId=<?php echo ($row["userId"]) ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

function insert_user($userId, $login)
{
    global $conn;

    $sql = "INSERT INTO `users`(`userId`,`login`) VALUES ('$userId','$login')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: http://localhost:8080/");
}


function delete_user($userId)
{
    global $conn;

    $sql = "Delete from users where userId='$userId'";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: http://localhost:8080/");
}

function insert_rating($userId, $movieId, $rating)
{
    global $conn;
    $timestamp = time();

    $sql = "INSERT INTO `rating`(`userId`,`movieId`,`rating`,`timestamp`) VALUES ('$userId','$movieId','$rating','$timestamp')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function get_all_rating()
{
    global $conn;
    $result = mysqli_query($conn, 'Select * from rating');

    ?>
    <div class="col-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">Movie Id</th>
                    <th>Rating</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo ($row["userId"]) ?>
                        </th>
                        <th>
                            <?php echo ($row["movieId"]) ?>
                        </th>
                        <th>
                            <?php echo ($row["rating"]) ?>
                        </th>
                        <th>
                            <?php echo ($row["timestamp"]) ?>
                        </th>
                        <td>
                            <a name="delete_rating" id="delete" class="btn btn-danger" role="button"
                                href="delete_rating.php?timestamp=<?php echo ($row["timestamp"]) ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

function delete_rating($timestamp)
{
    global $conn;

    $sql = "Delete from rating where timestamp='$timestamp'";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: http://localhost:8080/");
}

function get_movie_by_movieId($movieId)
{
    global $conn;

    $result = mysqli_query($conn, "Select * from movie where movieId='$movieId'");

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="update_movie-process.php" method="post">
            <div class="col-4 offset-md-4 align-self-center mt-5">
                <div class="container">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-8">
                            <form action="insert_movie.php" method="post">
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label>Movie Id</label>
                                        <input type="text" name="movieId" class="form-control" value=<?php echo $row["movieId"] ?> readonly style="border: 0; box-shadow: none; background-color: white">
                                    </div>
                                    <div class="form-group">
                                        <label>Movie Title</label>
                                        <input type="text" name="title" class="form-control" value=<?php echo $row["title"] ?>
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Movie Genres</label>
                                        <input type="text" name="genres" class="form-control" value=<?php echo $row["genres"] ?>
                                            required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update Movie</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
}

function update_movie($movieId, $title, $genres)
{
    global $conn;

    $sql = "UPDATE `movie` SET `title`='$title',`genres`='$genres' where `movieId`='$movieId'";

    if (mysqli_query($conn, $sql)) {
        echo "Records updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: http://localhost:8080/");
}