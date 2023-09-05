<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Payroll-Temp</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM14Controller">
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
                                    <h3 class="section-title">Payroll Batch </h3>

                                </div>
                                <div class="card">
                                    <div class="" style="padding:25px 0 10px 25px">
                                        <div class="  table-responsive custom-table custom-table-noborder row">
                                            <table class="table table-bordered table-sm">
                                                <tr>


                                                    <td style="width:120px">
                                                        <label>Month</label>
                                                        <select ng-model="Payrollmonth" class="form-control"
                                                            ng-change="GetWorkingdays()">
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>

                                                    </td>

                                                    <td>
                                                        <label>Year</label>


                                                        <?php 
                                                                  $year_start  =2021;
                                                                   $year_end = date('Y'); // current Year
                                

                                                               echo '<select   ng-model="Payrollyear" class="form-control" style="width:70px"  ng-change="GetWorkingdays()">'."\n";
                                                                for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                                                  $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                                                   echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                                      }
                                                                           echo '</select>'."\n";
                                                                               ?>
                                                        <!-- <input type="text" class="form-control" ng-model="Payrollyear"
                                                            autocomplete="off" readonly> -->
                                                    </td>

                                                    <td>
                                                        <label>Category</label>
                                                        <select class="form-control" ng-model="Category"
                                                            style="width:140px" ng-change="GetWorkingdays()">
                                                            <option value="Category 1">Category 1
                                                            </option>
                                                            <option value="Category 2">Category 2</option>
                                                            <option value="Category 3">Category 3</option>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <label>Working Days</label>
                                                        <input type="text" class="form-control" ng-model="Working_Days"
                                                            autocomplete="off">
                                                    </td>

                                                    <td><label>NH</label> <input type="text" class="form-control"
                                                            ng-model="Nationalholiday" autocomplete="off"></td>

                                                    <td><label>CL</label><input type="text" class="form-control"
                                                            ng-model="CasualLeave" autocomplete="off"></td>

                                                    <td style="width:100px">
                                                        <label>Status</label>
                                                        <select class="form-control" ng-model="Status">
                                                            <option Value="Open">Open</option>
                                                            <option value="Close">Close</option>
                                                            <option Value="Cancel">Cancel</option>
                                                        </select>
                                                    </td>




                                                    <td>
                                                        <label>Paid Date</label>
                                                        <input type="text" class="form-control"
                                                            ng-model="SalarypaidDate" onfocus="(this.type='date')"
                                                            onblur="(this.type='date')">
                                                    </td>

                                                </tr>
                                                <tr>

                                                </tr>
                                            </table>

                                        </div>

                                        <div class="float-right mt-2" style="margin-right: 15px;">
                                            <button class="btn btn-sm btn-success " ng-click="Selectallemp();"
                                                ng-disabled="btnEmployee">
                                                Get Payroll</button>


                                            <!-- <button class="btn btn-sm btn-success "
                                                                        ng-click="Getallemployee();"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalEmployee" ng-disabled="btnEmployee" >Select
                                                                        Employee</button> -->
                                            <button class="btn btn-sm btn-brand" ng-click="UpdateStatus();"
                                                ng-disabled="btnEmployee">Update</button>
                                            <a class="btn btn-warning btn-sm" href="ActualExportExcel.php"
                                                ng-click="GETREPORT()"><i class="fa fa-download"></i>
                                                Download</a>


                                        </div>
                                    </div>

                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>
                                    <div class="" ng-show="btnOtheruser">
                                        <div class="row">

                                            <div class="table-responsive custom-table custom-table-noborder ">


                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr class="tableheadrow">

                                                            <td colspan="7" class="tabletotalrow"> Employee Other
                                                                Info</td>
                                                            <td colspan="6" class="tabletotalrow"> Employee
                                                                Worked/Working Days</td>
                                                            <td colspan="4" class="tabletotalrow"> Employee_Salary
                                                                Info</td>
                                                            <td colspan="11" class="tabletotalrow"> Employee
                                                                Earned/OT/PF/ESI</td>
                                                            <td colspan="3" class="tabletotalrow"> Advance&Deduction
                                                            </td>
                                                            <td colspan="5" class="tabletotalrow"> TDS&Net</td>
                                                        </tr>

                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;">S.No</th>


                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <th>Status</th>
                                                            <!-- <th>Category</th>  -->
                                                            <th>Working</th>
                                                            <th>Worked</th>
                                                            <th>NH</th>
                                                            <th>Leavedays</th>
                                                            <th>EL</th>
                                                            <th>LOP</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic+DA</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th>DA</th>
                                                            <th>OT_HRS</th>
                                                            <th>OT_Wages</th>
                                                            <th class="tabletotalrow">Wages</th>
                                                            <th>PF</th>
                                                            <th>ESI</th>
                                                            <th>Lop Hrs</th>
                                                            <th>Lop Wages</th>
                                                            <th>Advance</th>
                                                            <th>Food</th>

                                                            <th>TDS</th>
                                                            <th class="tabletotalrow">Deduction</th>
                                                            <th class="tabletotalrow">Net</th>
                                                            <th class="tabletotalrow" title="Performance Allowance">
                                                                PA</th>
                                                            <th class="tabletotalrow" title="Net+PA">
                                                                Total</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>


                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Fullname"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PackageHoldstatus"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workeddays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Nationalholidays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Leavedays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TakenEL"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.LOP"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Totaldays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.BasicDA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.HRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Otherallowance_Con_SA">
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalSal"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedBasic"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedHRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedOtherallowance_Con_SA">
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.DailyAllowanance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_HRS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_Wages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedWages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PF"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.ESI"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Lophrs"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Lopwages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Salary_Advance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.FoodDeduction"></td>

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TDS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalDeduction"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.NetWages"></td>
                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Performanceallowance">
                                                            </td>



                                                        </tr>

                                                        <tr dir-paginate="e in GetPayrollList |filter:searchPayroll|itemsPerPage:10 | orderBy: 'Employeeid' track by $index  "
                                                            pagination-id="PayrollGrid01"
                                                            current-page="currentPagePayroll"
                                                            ng-class="{'rowcolorClose':e.PackageHoldstatus=='Hold'}">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPagePayroll - 1) * pageSizePayroll}}
                                                            </td>


                                                            <td>{{e.Employeeid}}</td>
                                                            <td> <input class="form-control" ng-model=e.Fullname
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Department
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Designation
                                                                    style="width: 150px;" readonly /></td>

                                                            <td>{{e.PackageHoldstatus}}</td>
                                                            <td>{{e.Workingdays}}</td>
                                                            <td>{{e.Workeddays}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Workeddays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" /></td> -->
                                                            <td>{{e.Nationalholidays}}</td>
                                                            <td>{{e.Leavedays}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Leavedays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)"/></td>                                                          -->
                                                            <td>{{e.TakenEL}}</td>
                                                            <td>{{e.LOP}}</td>
                                                            <td class="tabletotalrow">{{e.Totaldays}}</td>
                                                            <td>{{e.BasicDA}}</td>
                                                            <td>{{e.HRA}}</td>
                                                            <td>{{e.Otherallowance_Con_SA}}</td>
                                                            <td class="tabletotalrow">{{e.TotalSal}}</td>
                                                            <td>{{e.EarnedBasic}}</td>
                                                            <td>{{e.EarnedHRA}}</td>
                                                            <td>{{e.EarnedOtherallowance_Con_SA}}</td>
                                                            <td> <input class="form-control" ng-model=e.DailyAllowanance
                                                                    readonly style="width: 70px;" /></td>

                                                            <!-- // <td>{{e.DailyAllowanance}}</td> -->
                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.ActualOTHRS
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.ActualOTHRS readonly
                                                                    style="width: 70px;" /></td>
                                                            <td>{{e.ActualOTWages | currency:''}}</td>
                                                            <td class="tabletotalrow">{{e.EarnedWages |currency:''}}
                                                            </td>
                                                            <td>{{e.PF | currency:''}}</td>
                                                            <td>{{e.ESI | currency:''}}</td>
                                                            <td>{{e.Lophrs }}</td>
                                                            <td>{{e.Lopwages }}</td>
                                                            <td> <input class="form-control" ng-model=e.Salary_Advance
                                                                    style="width:70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>
                                                            <td> <input class="form-control" ng-model=e.FoodDeduction
                                                                    style="width:70px"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>


                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS readonly
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);" />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS
                                                                    style="width: 70px;"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>

                                                            <td class="tabletotalrow">
                                                                {{e.TotalDeduction |currency:''}}</td>
                                                            <td class="tabletotalrow">{{e.Actualnet |currency:''}}
                                                            </td>
                                                            <td class="tabletotalrow">
                                                                {{e.Performanceallowance |currency:''}}</td>
                                                            <td class="tabletotalrow">
                                                                {{e.Actualnet--e.Performanceallowance}}</td>


                                                        </tr>
                                                    </tbody>
                                                    <tr style='background-color:yellow'>
                                                        <td colspan="33" style="text-align:right">Total</td>
                                                        <td>{{Actualnet}}</td>
                                                        <td>{{Performanceallowance}}</td>
                                                        <td style="text-align:right">{{GrandTotal}}</td>
                                                    </tr>
                                                </table>





                                            </div>

                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="PayrollGrid01" max-size="3"
                                                    ng-show="btnOtheruser" direction-links="true" boundary-links="true"
                                                    class="pagination">
                                                </dir-pagination-controls>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body" ng-show="btnAdmin">
                                        <div class="row">

                                            <div class="table-responsive custom-table custom-table-noborder ">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr class="tableheadrow" ng-show="Category!='Category 3'">

                                                            <td colspan="8" class="tabletotalrow">Employee Other Info
                                                            </td>
                                                            <td colspan="6" class="tabletotalrow">Employee
                                                                Worked/Working
                                                                Days</td>
                                                            <td colspan="4" class="tabletotalrow">Employee_Salary Info
                                                            </td>
                                                            <td colspan="9" class="tabletotalrow">Employee
                                                                Earned/OT/PF/ESI
                                                            </td>
                                                            <td colspan="3" class="tabletotalrow">Advance&Deduction</td>
                                                            <td colspan="5" class="tabletotalrow">TDS&Net</td>
                                                        </tr>
                                                        <tr class="tableheadrow" ng-show="Category=='Category 3'">

                                                            <td colspan="8" class="tabletotalrow">Employee Other Info
                                                            </td>
                                                            <td colspan="6" class="tabletotalrow">Employee
                                                                Worked/Working
                                                                Days</td>
                                                            <td colspan="4" class="tabletotalrow">Employee_Salary Info
                                                            </td>
                                                            <td colspan="11" class="tabletotalrow">Employee
                                                                Earned/OT/PF/ESI
                                                            </td>
                                                            <td colspan="3" class="tabletotalrow">Advance&Deduction</td>
                                                            <td colspan="5" class="tabletotalrow">TDS&Net</td>
                                                        </tr>
                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;">S.No</th>

                                                            <!-- <th>Month</th>
                                                            <th>Year</th> -->
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <th>Status</th>
                                                            <th>Approval_Status</th>
                                                            <th>Working</th>
                                                            <th>Worked</th>
                                                            <th>NH</th>
                                                            <th>Leavedays</th>
                                                            <th>EL</th>
                                                            <th>LOP</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic+DA</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th>DA</th>
                                                            <th>OT_HRS</th>
                                                            <th>OT_Wages</th>
                                                            <th class="tabletotalrow">Wages</th>
                                                            <th>PF</th>
                                                            <th>ESI</th>
                                                            <th ng-show="Category=='Category 3'">LOP Hrs</th>
                                                            <th ng-show="Category=='Category 3'">LOP Wages</th>
                                                            <th>Advance</th>
                                                            <th>Food</th>

                                                            <th>TDS</th>
                                                            <th class="tabletotalrow">Deduction</th>
                                                            <th class="tabletotalrow">Net</th>
                                                            <th class="tabletotalrow" title="Performance Allowance">
                                                                Performance</th>
                                                            <th class="tabletotalrow" title="Net+PA">
                                                                Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>


                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Fullname"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PackageHoldstatus"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Superuserapproval"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workeddays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Nationalholidays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Leavedays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TakenEL"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.LOP"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Totaldays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.BasicDA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.HRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Otherallowance_Con_SA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalSal"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedBasic"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedHRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedOtherallowance_Con_SA">
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.DailyAllowanance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_HRS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_Wages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedWages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PF"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.ESI"></td>
                                                            <td ng-show="Category=='Category 3'"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Lophrs"></td>
                                                            <td ng-show="Category=='Category 3'"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Lopwages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Salary_Advance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.FoodDeduction"></td>

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TDS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalDeduction"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.NetWages"></td>
                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Performanceallowance"></td>



                                                        </tr>

                                                        <tr dir-paginate="e in GetPayrollList |filter:searchPayroll|itemsPerPage:10 | orderBy: 'Employeeid' track by $index "
                                                            pagination-id="PayrollGridAdmin"
                                                            current-page="currentPagePayroll01"
                                                            ng-class="{'rowcolorClose':e.PackageHoldstatus=='Hold'}">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPagePayroll01 - 1) * pageSizePayroll01}}
                                                            </td>

                                                            <!-- <td>{{e.SalMonth}}</td>
                                                            <td>{{e.Salyear}}</td> -->
                                                            <td>{{e.Employeeid}}</td>
                                                            <td> <input class="form-control" ng-model=e.Fullname
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Department
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Designation
                                                                    style="width: 150px;" readonly /></td>

                                                            <td>{{e.PackageHoldstatus}}</td>

                                                            <td ng-show="e.PackageHoldstatus=='Hold'"> <select
                                                                    class="form-control" ng-model="e.Superuserapproval"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="GetApprovalstatus(e.Employeeid,e.SalMonth,e.Salyear,e.Superuserapproval)">
                                                                    <option Value="Waiting">Waiting</option>
                                                                    <option value="Approved">Approved</option>

                                                                </select></td>
                                                            <td ng-show="e.PackageHoldstatus !='Hold'">
                                                                {{e.Superuserapproval}}</td>
                                                            <td>{{e.Workingdays}}</td>
                                                            <td> <input class="form-control" ng-model=e.Workeddays
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)"
                                                                    style="width:75px" />
                                                            </td>
                                                            <td>{{e.Nationalholidays}}</td>
                                                            <td> <input class="form-control" ng-model=e.Leavedays
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>
                                                            <td>{{e.TakenEL}}</td>
                                                            <td>{{e.LOP}}</td>
                                                            <td class="tabletotalrow">{{e.Totaldays}}</td>
                                                            <td>{{e.BasicDA}}</td>
                                                            <td>{{e.HRA}}</td>
                                                            <td>{{e.Otherallowance_Con_SA}}</td>
                                                            <td class="tabletotalrow">{{e.TotalSal}}</td>
                                                            <td>{{e.EarnedBasic}}</td>
                                                            <td>{{e.EarnedHRA}}</td>
                                                            <td>{{e.EarnedOtherallowance_Con_SA}}</td>
                                                            <td> <input class="form-control" ng-model=e.DailyAllowanance
                                                                    readonly style="width: 70px;" /></td>

                                                            <!-- // <td>{{e.DailyAllowanance}}</td> -->
                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.ActualOTHRS
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.ActualOTHRS readonly
                                                                    style="width: 70px;" /></td>
                                                            <td>{{e.ActualOTHRS}}</td>


                                                            <td class="tabletotalrow">{{e.EarnedWages}}</td>
                                                            <td>{{e.PF}}</td>
                                                            <td>{{e.ESI}}</td>
                                                            <td ng-show="Category=='Category 3'">{{e.Lophrs}}</td>
                                                            <td ng-show="Category=='Category 3'">{{e.Lopwages}}</td>
                                                            <td> <input class="form-control" ng-model=e.Salary_Advance
                                                                    style="width:70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>
                                                            <td> <input class="form-control" ng-model=e.FoodDeduction
                                                                    style="width:70px"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>


                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS readonly
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS
                                                                    style="width: 70px;" /></td>

                                                            <td class="tabletotalrow">{{e.TotalDeduction}}</td>
                                                            <td class="tabletotalrow">{{e.Actualnet}}</td>
                                                            <td class="tabletotalrow"
                                                                ng-show="e.Category!='Category 3'">
                                                                <input class="form-control"
                                                                    ng-model=e.Performanceallowance style="width: 70px;"
                                                                    ng-model-options='{ debounce: 2000 }'
                                                                    ng-change="Getperformancecalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Performanceallowance)" />
                                                            </td>

                                                            <td class="tabletotalrow"
                                                                ng-show="e.Category=='Category 3'">
                                                                <input class="form-control"
                                                                    ng-model=e.Performanceallowance style="width: 70px;"
                                                                    readonly />
                                                            </td>

                                                            <td class="tabletotalrow">
                                                                {{e.Actualnet--e.Performanceallowance}}

                                                            </td>
                                                            <td style="width:40px;background-color:white">
                                                                <div class="action-btn">
                                                                    <center> <img height="15" data-toggle="modal"
                                                                            data-target="#ModalPayrollDelete"
                                                                            ng-click="SendEdit(e.Employeeid,e.SalMonth,e.Salyear,e.Fullname);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                        <center>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tr style='background-color:yellow' ng-show="Category=='Category 3'">
                                                        <td colspan="33" style="text-align:right">Total</td>
                                                        <td>{{Actualnet}}</td>
                                                        <td>{{Performanceallowance}}</td>
                                                        <td style="text-align:right">{{GrandTotal}}</td>
                                                    </tr>
                                                    <tr style='background-color:yellow' ng-show="Category!='Category 3'">
                                                        <td colspan="31" style="text-align:right">Total</td>
                                                        <td>{{Actualnet}}</td>
                                                        <td>{{Performanceallowance}}</td>
                                                        <td style="text-align:right">{{GrandTotal}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination"
                                                ng-show="btnAdmin">
                                            </dir-pagination-controls>
                                        </div>

                                    </div>



                                    <div class="card-body" ng-show="btnclose">


                                        <div class="row">


                                            <div class="table-responsive custom-table custom-table-noborder ">


                                                <table class="table table-bordered  table-sm table-striped"
                                                    id="employee_table">
                                                    <thead>
                                                        <tr class="tableheadrow">

                                                            <td colspan="7" class="tabletotalrow"> Employee Other
                                                                Info</td>
                                                            <td colspan="6" class="tabletotalrow"> Employee
                                                                Worked/Working Days</td>
                                                            <td colspan="4" class="tabletotalrow"> Employee_Salary
                                                                Info</td>
                                                            <td colspan="9" class="tabletotalrow"> Employee
                                                                Earned/OT/PF/ESI</td>
                                                            <td colspan="3" class="tabletotalrow"> Advance&Deduction
                                                            </td>
                                                            <td colspan="5" class="tabletotalrow"> TDS&Net</td>
                                                        </tr>
                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;">S.No</th>


                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <th>Status</th>
                                                            <!-- <th>Category</th>  -->
                                                            <th>Working</th>
                                                            <th>Worked</th>
                                                            <th>NH</th>
                                                            <th>Leavedays</th>
                                                            <th>EL</th>
                                                            <th>LOP</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic+DA</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th>DA</th>
                                                            <th>OT_HRS</th>
                                                            <th>OT_Wages</th>
                                                            <th class="tabletotalrow">Wages</th>
                                                            <th>PF</th>
                                                            <th>ESI</th>
                                                            <th>Advance</th>
                                                            <th>Food</th>

                                                            <th>TDS</th>
                                                            <th class="tabletotalrow">Deduction</th>
                                                            <th class="tabletotalrow">Net</th>
                                                            <th class="tabletotalrow" title="Performance Allowance">
                                                                PA</th>
                                                            <th class="tabletotalrow" title="Net+PA">
                                                                Total</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>


                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Fullname"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PackageHoldstatus"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workeddays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Nationalholidays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Leavedays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TakenEL"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.LOP"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Totaldays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.BasicDA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.HRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Otherallowance_Con_SA">
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalSal"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedBasic"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedHRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedOtherallowance_Con_SA">
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.DailyAllowanance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_HRS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_Wages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedWages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PF"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.ESI"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Salary_Advance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.FoodDeduction"></td>

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TDS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalDeduction"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.NetWages"></td>
                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Performanceallowance">
                                                            </td>



                                                        </tr>

                                                        <tr dir-paginate="e in GetPayrollList |filter:searchPayroll|itemsPerPage:10 "
                                                            pagination-id="PayrollGrid"
                                                            current-page="currentPagePayroll"
                                                            ng-class="{'rowcolorClose':e.PackageHoldstatus=='Hold'}">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPagePayroll - 1) * pageSizePayroll}}
                                                            </td>


                                                            <td>{{e.Employeeid}}</td>
                                                            <td> <input class="form-control" ng-model=e.Fullname
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Department
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Designation
                                                                    style="width: 150px;" readonly /></td>

                                                            <td>{{e.PackageHoldstatus}}</td>
                                                            <td>{{e.Workingdays}}</td>
                                                            <td>{{e.Workeddays}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Workeddays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" /></td> -->
                                                            <td>{{e.Nationalholidays}}</td>
                                                            <td>{{e.Leavedays}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Leavedays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)"/></td>                                                          -->
                                                            <td>{{e.TakenEL}}</td>
                                                            <td>{{e.LOP}}</td>
                                                            <td class="tabletotalrow">{{e.Totaldays}}</td>
                                                            <td>{{e.BasicDA}}</td>
                                                            <td>{{e.HRA}}</td>
                                                            <td>{{e.Otherallowance_Con_SA}}</td>
                                                            <td class="tabletotalrow">{{e.TotalSal}}</td>
                                                            <td>{{e.EarnedBasic}}</td>
                                                            <td>{{e.EarnedHRA}}</td>
                                                            <td>{{e.EarnedOtherallowance_Con_SA}}</td>
                                                            <td>{{e.DailyAllowanance | currency:''}}</td>
                                                            <!-- // <td>{{e.DailyAllowanance}}</td> -->
                                                            <td>{e.ActualOTHRS}</td>
                                                            <td>{{e.ActualOTHRS | currency:''}}</td>
                                                            <td class="tabletotalrow">{{e.EarnedWages |currency:''}}
                                                            </td>
                                                            <td>{{e.PF | currency:''}}</td>
                                                            <td>{{e.ESI | currency:''}}</td>
                                                            <td> <input class="form-control" ng-model=e.Salary_Advance
                                                                    style="width:70px;"
                                                                    onkeypress="return Validate(event);" readonly />
                                                            </td>
                                                            <td> <input class="form-control" ng-model=e.FoodDeduction
                                                                    style="width:70px"
                                                                    onkeypress="return Validate(event);" readonly />
                                                            </td>


                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS readonly
                                                                    style="width: 70px;" readonly />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS
                                                                    style="width: 70px;" readonly /></td>

                                                            <td class="tabletotalrow">
                                                                {{e.TotalDeduction |currency:''}}</td>
                                                            <td class="tabletotalrow">{{e.Actualnet |currency:''}}
                                                            </td>
                                                            <td class="tabletotalrow">
                                                                {{e.Performanceallowance |currency:''}}</td>

                                                            <td> {{e.Actualnet--e.Performanceallowance}}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tr style='background-color:yellow'>
                                                        <td colspan="31" style="text-align:right">Total</td>
                                                        <td>{{Actualnet}}</td>
                                                        <td>{{Performanceallowance}}</td>
                                                        <td style="text-align:right">{{GrandTotal}}</td>
                                                    </tr>
                                                </table>





                                            </div>

                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="PayrollGrid" max-size="3"
                                                    ng-show="btnOtheruser" direction-links="true" boundary-links="true"
                                                    class="pagination">
                                                </dir-pagination-controls>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>

            </div>

            <div class="modal fade" id="ModalEmployee" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Select Employee</h5>

                        </div>
                        <div class="col-lg-12">
                            <div class=" row">

                                <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Action</th>
                                            <th>No</th>
                                            <th scope="col">
                                                Emp_ID</th>
                                            <th scope="col" style="width: 200px;">Name</th>
                                            <th scope="col" style="width: 90px;">Gender</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Designation</th>


                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Employeeid">

                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Fullname">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Gender">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Department">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Designation">
                                            </td>



                                            </td>


                                        </tr>
                                        <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                            pagination-id="Employeegrid" current-page="currentPageEmp">



                                            <td>
                                                <div class="action-btn">
                                                    <input type="checkbox" ng-model="folder[e.Employeeid]"
                                                        value={{e.Employeeid}} />




                                                </div>
                                            </td>

                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Title}} {{e.Fullname}}</td>
                                            <td>{{e.Gender}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Designation}}</td>




                                        </tr>
                                    </tbody>
                                </table>

                                <div class="pagination">
                                    <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-success" ng-click="getAllSelected();"
                                    data-dismiss="modal">Submit</button>
                                <button class="btn btn-rounded btn-danger" ng-click="Selectallemp();"
                                    data-dismiss="modal">Select All</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ModalPayrollDelete" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Employeeid}}-{{EmpFullname}}
                            </h5>
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
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include '../footer.php'?>
    </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM14Controller.js"></script>

    </script>
</body>

</html>