<?php include '../config.php';
session_start();


    $Clientid =$_SESSION["Clientid"];
    $query = "SELECT * FROM indsys1003departmentmaster WHERE Clientid ='$Clientid' "; 
    $result = $conn->query($query);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Department Wise Employee Details</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Department Wise Employee Details</h3>

                                </div>
                                <div class="card">
                                    <div class="" style="padding:25px 0 10px 25px">


                                        <form role="form" action="Employeedeptrpt.php" method="post" target="_blank">
                                            <input type="hidden" name="act" value="att" />
                                            <style type="text/css">
                                            button.multiselect {
                                                min-width: 200px !important;
                                                background-color: #3ac47d;
                                                color: #ffffff;
                                                padding: 5px !important
                                            }

                                            .multiselect-container {
                                                min-width: 250px;
                                                padding: 10px;
                                                max-height: 300px;
                                                overflow-y: auto;
                                            }

                                            .multiselect-selected-text {
                                                font-size: 13px
                                            }

                                            .multiselect.dropdown-toggle.btn.btn-default {
                                                margin-right: 5px;
                                                max-width: 200px;
                                                overflow: hidden;
                                            }
                                            </style>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Department</label>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="select-check">

                                                        <select id="multiple-checkboxes" multiple="multiple"
                                                            name="DEPTName[]" class="form-control multiple-checkboxes"
                                                            style="width:250px">
                                                            <?php 
                                                            if($result->num_rows > 0){ 
                                                                while($row = $result->fetch_assoc()){  
                                                                    echo '<option value="'.$row['Department'].'">'.$row['Department'].'</option>'; 
                                                                } 
                                                            }
                                                            ?>




                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group" style="padding-top:1px">
                                                        <button type="submit" name="view"
                                                            class="btn btn-sm btn-success">View</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>



                                    </div>

                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /#page-wrapper -->
                    <?php include '../footer.php'?>

                </div>





                <script src="../bower_components/jquery/dist/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

                <!-- DataTables JavaScript -->
                <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <script
                    src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js">
                </script>

                <!-- Custom Theme JavaScript -->
                <script src=".../dist/js/sb-admin-2.js"></script>






                <?php include '../footerjs.php'?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
                </script>




                <script>
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = "<html moznomarginboxes mozdisallowselectionprint><body>" +
                        printContents + "</body></html>";

                    window.print();

                    document.body.innerHTML = originalContents;
                    window.close();
                }

                $(document).ready(function() {
                    $('#multiple-checkboxes').multiselect({
                        includeSelectAllOption: true,
                    });
                });
                </script>

</body>

</html>