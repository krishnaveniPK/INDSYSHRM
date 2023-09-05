<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Application Master</title>
</head>
<style>
body {
    overflow-y: hidden;
    /* Hide vertical scrollbar */
    overflow-x: hidden;
    /* Hide horizontal scrollbar */
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM22Controller">
            <div class="container-fluid ">





                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <h5 class="card-header text-green">Application Creation</h5>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Application ID</label>
                                            <input type="text" class="form-control" ng-model="Applicationid"
                                                autocomplete="off" readonly>
                                        </div>

                                        <div class="form-group col-md-9 mb-0">

                                            <style>
                                            .surname-width {
                                                max-width: 75px !important;
                                            }
                                            </style>
                                            <div class="row mb-0">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">First Name</label>
                                                    <div class="input-group "><span class="input-group-prepend">
                                                            <select class="input-group-text surname-width"
                                                                ng-model="Title">
                                                                <option Value="Mr.">Mr.</option>
                                                                <option value="Mrs.">Ms.</option>
                                                                <option value="Miss.">Mrs.</option>

                                                            </select></span>
                                                        <input type="text" placeholder="Firstname" class="form-control"
                                                            ng-model="Firstname">
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Last Name</label>
                                                    <input type="text" class="form-control" ng-model="Lastname"
                                                        autocomplete="off">

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Status</label>
                                                    <select class="form-control" ng-model="Selectionstatus">
                                                        <option Value="Shortlisted"> Shortlisted</option>
                                                        <option value="On Hold">On Hold</option>
                                                        <option value="Rejected">Rejected</option>
                                                        </option>

                                                    </select>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Application Date</label>
                                            <input type="text" class="form-control" ng-model="ApplicationDate"
                                                onfocus="(this.type='date')" onblur="(this.type='date')"
                                                ng-change="GetApplicationDate();">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Interview schedule Date</label>
                                            <input type="text" class="form-control" ng-model="InterviewDate"
                                                onfocus="(this.type='date')" onblur="(this.type='date')"
                                                ng-change="GetInterviewDate();">

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Interview Timing</label>
                                            <input class="form-control" onfocus="(this.type='time')"
                                                onblur="(this.type='time')" ng-model="Interviewtime"
                                                placeholder="HH:mm:ss" />

                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gender</label>
                                            <select class="form-control" ng-model="Gender">
                                                <option Value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Qualification</label>
                                            <select ng-model="Qualification" class="form-control">

                                                <option ng-repeat="s in GetQualififcationList " value="{{s.Degree}}">
                                                    {{s.Degree}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Martial Status</label>
                                            <select class="form-control" ng-model="Married">
                                                <option Value="Married">Married</option>
                                                <option value="UnMarried">UnMarried</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widow">Widow</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Mother Tongue </label>
                                            <select ng-model="Mothertongue" class="form-control">

                                                <option ng-repeat="s in GetLanguageList " value="{{s.Languages}}">
                                                    {{s.Languages}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Position of Applicant </label>
                                            <select ng-model="Vaccancy" class="form-control">

                                                <option ng-repeat="s in GetVaccancyList " value="{{s.Designation}}">
                                                    {{s.Designation}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Contact No</label>
                                            <input type="text" class="form-control" ng-model="Contactno"
                                                autocomplete="off" onkeypress="return Validate(event);" maxlength="10"
                                                ng-change="GetContactnounique(Contactno)"
                                                ng-model-options='{ debounce: 1500 }'>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Category</label>
                                            <select class="form-control" ng-model="Category">
                                                <option value="Category 1">Category 1
                                                </option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 3</option>

                                            </select>
                                        </div>



                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Fresher</label>
                                            <select class="form-control" ng-model="Fresher"
                                                ng-change="GetExpereience(Fresher)">
                                                <option Value="Yes">Yes
                                                </option>
                                                <option value="No">No
                                                </option>


                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Current CTC</label>
                                            <input type="text" class="form-control" ng-model="PreviousCTC"
                                                autocomplete="off" onkeypress="return Validate(event);"
                                                ng-disabled="btnPrevious">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Expected CTC</label>
                                            <input type="text" class="form-control" ng-model="ExpectedCTC"
                                                autocomplete="off" onkeypress="return Validate(event);">

                                        </div>


                                        <div class="form-group col-md-9">
                                            <label class="col-form-label">Email ID</label>
                                            <input type="email" class="form-control" ng-model="Emailid"
                                                autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                ng-change="emailchecking(Emailid)">

                                        </div>
                                    </div>
                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-sm btn-rounded btn-success" ng-click="SaveApplication();"
                                            ng-show="btnSave" ng-disabled="btnsaveadmin"><i class="fa fa-save"></i>
                                            Save</button>
                                        <button class="btn btn-sm btn-rounded btn-success"
                                            ng-click="UpdateApplication();" ng-show="btnUpdate"><i
                                                class="fa fa-save"></i>
                                            Update</button>
                                        <button class="btn btn-sm btn-rounded btn-success" ng-click="Sendemail();"
                                            ng-show="btnUpdate"><i class="fa fa-save"></i>
                                            Interview Mail</button>



                                        <button class="btn btn-sm btn-rounded btn-success" ng-click="Reset()"><i
                                                class="fa fa-save"></i>
                                            Reset</button>

                                        <button ng-show="btnUpdate" class="btn btn-sm btn-rounded btn-success"
                                            ng-click="FetchApplication(Applicationid);"><i class="fa fa-save"></i>
                                            Refresh</button>

                                        <button ng-show="btnMove" class="btn btn-sm btn-rounded btn-success"
                                            ng-click="MoveToCandidate();" ng-disabled="btnsaveadmin2"><i
                                                class="fa fa-save"></i>
                                            Move To Candidate</button>

                                        <span>Mail</span>
                                        <img ng-show="Emailverified!='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />

                                        <img ng-show="Emailverified=='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                        <span>Mobile No</span>
                                        <img ng-show="Smsverified!='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                        <img ng-show="Smsverified=='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                        </h5>

                                    </div>
                                    <?php include '../footerjs.php'?>
                                    <script src="../Scripts/Controller/HRM22Controller.js"></script>
                                    <script type="text/javascript">
                                    function Validate(event) {
                                        var regex = new RegExp("/^[0-9]{10}+$/");

                                        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);

                                        if (!regex.test(key)) {
                                            event.preventDefault();
                                            return false;
                                        }

                                    }
                                    </script>



</body>

</html>