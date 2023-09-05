<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Document Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM45Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="card">
                        <h5 class="card-header text-green">Document Master</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Document No</label>


                                    <input type="text" class="form-control" ng-model="Documentnoasperrecord"
                                        autocomplete="off" id="Documentnoasperrecord">

                                        <input type="text" class="form-control" ng-model="Documentno" autocomplete="off"
                                        readonly id="Documentno" ng-show="btnhide">


                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Issued Date</label>
                                    <input type="text" class="form-control" ng-model="DocumentIssueDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')" id="DocumentIssueDate">

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">
                                      Have Expired Date?
                                    </label>
                                    <select class="form-control" ng-model="Renewalyesorno"
                                        ng-change="GetExpiredYesorNo()" id="Renewalyesorno">
                                        <option Value="Yes">Yes</option>
                                        <option value="No">No</option>




                                    </select>
                                </div>



                                <div class="form-group col-md-3" ng-show="btnrenewal">
                                    <label class="col-form-label">Expired Date</label>
                                    <input type="text" class="form-control" ng-model="RenewalDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')" id="RenewalDate">

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Document Type</label>
                                    <select ng-model="Documenttype" class="form-control" id="Documenttype">

                                        <option ng-repeat="s in GetDocumenttypeList " value="{{s.CompanyDocumenttype}}">
                                            {{s.CompanyDocumenttype}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-9">
                                    <label class="col-form-label">Document Name</label>
                                    <input type="text" class="form-control" ng-model="Documentname" autocomplete="off"
                                        id="Documentname">

                                </div>

                                <div class="form-group col-md-3" ng-show="btnrenewal">
                                    <label class="col-form-label">Renewal Notifications</label>
                                    <div class="input-group">
                                        <input class="form-control" ng-model="Renewalnotificationindays"
                                            autocomplete="off" id="Renewalnotificationindays"
                                            onkeypress="return Validate(event);">
                                        <div class="input-group-append">
                                            <p id="fileButton04" class="input-group-text">
                                                (Daily)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label class="col-form-label">Notes</label>
                                    <input type="text" class="form-control" ng-model="DocumentNotes" autocomplete="off"
                                        id="DocumentNotes">

                                </div>

                              



                            </div>

                            <h5>Select the file to upload </h5>
                            <div class="row">

                                <div class="form-group col-md-9">

                                    <div class="input-group">
                                        <input type="file" class="form-control" ng-model="clearinput"
                                            id="fileInputBulkFiles" name=files[] multiple
                                            accept="application/pdf,image/*">

                                        <!-- <div class="input-group-append">
                                            <p id="fileButtonEmpLeave" class="input-group-text">
                                                <i class="fa fa-upload"></i>
                                            </p>
                                        </div> -->
                                    </div>


                                </div>
                                <div class="text-right form-group col-md-3 ">


                                    <button class="btn btn-sm btn-success" id="fileButtonEmpLeave" ><i
                                            class="fa fa-save"></i>
                                        Save</button>



                                    <button class="btn btn-sm  btn-primary " ng-click="Reset();"><i
                                            class="fa fa-times"></i> Reset</button>






                                </div>
                            </div>
                        </div>
                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>

                        <div class="alert alert-success" role="alert" id="myDiv">
                            <span id="msg1"></span>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <table style="width: 100%;">



                                        <tr dir-paginate="e in GetDocMasterFileList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                            current-page="currentPageFile" pagination-id="Filelistgrid">

                                            <td><button class="btn btn-sm btn-info" style="width:250px"
                                                    ng-click="SendFileEdit(e.Documentno,e.Sno);">
                                                    {{$index+1+(currentPageFile - 1) * pageSizeFile}}.{{e.Documentfilename}}</button>
                                            </td>

                                        <!--     <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendFileEdit(e.Documentno,e.Sno);"
                                                        data-toggle="modal" data-target="#ModalDelete1"
                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">




                                                </div>
                                            </td> -->


                                        </tr>


                                    </table>
                                    <dir-pagination-controls pagination-id="Filelistgrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>
                                </div>
                                <div class="col-lg-9">
                                    <iframe ng-src="{{Documentfilepath}}"
                                        ng-hide="Documentfilepath == null || Documentfilepath == '' "
                                        ng-show="Documentfilepath != null " style="height:350px;width:100%"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="ModalDelete1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to delete this record?
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-rounded btn-danger" ng-click="Deletenew();"
                                            data-dismiss="modal">Delete</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>













                </div>








                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <?php include '../footerjs.php'?>


                <script src="../Scripts/Controller/HRM45Controller.js"></script>
                <script type="text/javascript">
                                    function Validate(event) {
                                        var regex = new RegExp("^[0-9-/()]");
                                        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
                                        if (!regex.test(key)) {
                                            event.preventDefault();
                                            return false;
                                        }
                                    }
                                    </script>

            </div>

        </div>
    </div>



</body>

</html>