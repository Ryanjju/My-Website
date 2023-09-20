<?php include '../../admin_check.php' ?>
<!DOCTYPE html>
<html lang="de">

<?php include '../../head_main.php' ?>

<body>
    <?php include '../../head.php';?>

    <main class="main">
        <div class="container" style='--font-color: #000;'>
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . '/login/db_connection.php';
            // id is the give ? in the url
            $id = $_GET['id'];

            // get all informations about the user with the given user id
            
            $sql = "SELECT * FROM user WHERE id = '$id'";
            // connect to database
            $result = mysqli_query($connection, $sql);
            // save it in vars 
            while ($row = mysqli_fetch_assoc($result)) {
                $created_at = $row['created_at'];
                $email = $row['email'];
                $id = $row['id'];
                $priv_var = $row['privileges'];
                $username = $row['username'];
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];
            }
            ?>

            <table class="customised_table" id="vertical-2">
                <!-- left side of table with headings -->
                <thead style="text-align: right; padding-right: 20px; margin-left: /* - the left collum */ -70px;">
                    <tr>
                        <th colspan="3">Benutzer ID</th>
                    </tr>
                    <tr>
                        <th colspan="3">Benutzername</th>
                    </tr>
                    <tr>
                        <th colspan="3">Vorname</th>
                    </tr>
                    <tr>
                        <th colspan="3">Nachname</th>
                    </tr>
                    <tr>
                        <th colspan="3">E-Mail</th>
                    </tr>
                    <th colspan="3">Erstellt am</th>
                    </tr>
                    <tr>
                        <th colspan="3">Rechte</th>
                    </tr>
                </thead>
                <!-- right side of table with data -->
                <tbody style="text-align: left; padding-right: 10px">
                    <tr>
                        <td colspan="3">
                            <?php echo $id; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php echo $username; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php echo $FirstName; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php echo $LastName; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php echo $email; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php echo $created_at; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php echo $priv_var; ?>
                        </td>
                    </tr>
                </tbody>

                <!-- edit button at the bottom of the table -->
                <tfoot>
                    <tr>
                        <td colspan="3"> 
                            <a href="edit.php?id=<?php echo $id; ?>" class="modern-button">Bearbeiten</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>

    <?php include '../../footer.php' ?>
</body>

</html>
