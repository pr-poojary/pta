<?php
require('partials/top.inc.php');

if (!isset($_SESSION['adminLoggedIn']) || $_SESSION['adminLoggedIn'] != true) {
    if (!isset($_SESSION['teacherLoggedIn']) || $_SESSION['teacherLoggedIn'] != true) { ?>
        <script>
            window.location.href = "login.php";
        </script>
    <?php
    } 
}

?>


<div class="container">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="container">

                        <div class="card shadow">
                            <div class="card-header">
                                <h3><strong>View Student Details</strong><small></small></h3>
                            </div>

                            <div class="container table-responsive w-50 mt-3 mb-3">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">SI. No</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqlA = "SELECT DISTINCT `bcasem`.`status`,`bcasection`.`status`, `bcasection`.`sem`, `bcasection`.`section` FROM `bcasection`,`bcasem` where `bcasection`.`sem` = `bcasem`.`sem` AND `bcasem`.`status`='1' AND `bcasection`.`status`='1' order by `sem`, `section`";

                                        $resA = mysqli_query($conn, $sqlA);
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($resA)) {
                                            $i = $i + 1;
                                            echo '<tr>
                                                    <td scope="row">' . $i . '</td>
                                                    <td scope="row">' . $row['sem'] . '</td>
                                                    <td scope="row">' . $row['section'] . '</td>
                                                    <td scope="row">
                                                        <a class="btn btn-primary mr-2" href="view_student_details.php?type=view_details&sem=' . $row['sem'] . '&sec=' . $row['section'] . '">View Student Details</a>
                                                    </td>
                                                </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('partials/_footer.php');
?>
<script>
    <?php
    if (isset($_GET)) {
    ?>
        get_bca_sec('<?php echo $sub_categories_id ?>');
    <?php } ?>
</script>