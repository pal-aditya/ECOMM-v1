<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("../inclue/db.php");
if (!isset($_SESSION['admin-email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Categories
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw">
                    </i>View Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Category ID:</th>
                                <th>Category Title:</th>
                                <th>Category Description:</th>
                                <th>Delete Category:</th>
                                <th>Edit Category:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            $get_cats = "select * from categories";
                            $run_cats = mysqli_query($con, $get_cats);
                            while ($row_cats = mysqli_fetch_array($run_cats)) {
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];
                                $cat_desc = $row_cats['cat_desc'];

                                $i++;
                                // code...
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $cat_title; ?></td>
                                    <td width="300"><?php echo $cat_desc; ?></td>
                                    <td>
                                        <a href="admin_panel.php?delete_cat=<?php echo $cat_id; ?>">
                                            <i class="fa fa-trash-o"></i>Delete
                                        </a>
                                    </td>
                                    <td>
                                        <a href="admin_panel.php?edit_cat=<?php echo $cat_id; ?>">
                                            <i class="fa fa-pencil"></i>Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <?php } ?> -->
