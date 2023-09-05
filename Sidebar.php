<?php

session_start();
$Authorizedno = $_SESSION["Authorizedno"];
$cpage = strtolower(basename($_SERVER['SCRIPT_NAME'],'.php'));

?>

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
          <?php if ($Authorizedno == 1)
{
?>
    <ul class='navbar-nav flex-column sidebar-menu'>
    <div class='links'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item'>
   
    <a class='nav-link animate-charcter <?=($cpage=='dashboard')?'active':''?>' href='<?=$domain?>/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='adddepartment' || $cpage=='adddesignation' || $cpage=='addshift' ||
     $cpage=='addcountry' || $cpage=='addstate'|| $cpage=='addcity'|| $cpage=='addholiday'|| 
     $cpage=='adddocumenttype'|| $cpage=='addlanguages'|| $cpage=='addrelationship'|| 
     $cpage=='adddegree' || $cpage=='adddepartmenthead'|| $cpage=='addlocation')?'active':''?>
     ' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-2' aria-controls='submenu-2'><i class='fa fa-cog'></i>Settings</a>
    <div id='submenu-2' class='collapse submenu tablink <?=($cpage=='adddepartment' || 
    $cpage=='adddesignation' || $cpage=='addshift' || $cpage=='addcountry'  || $cpage=='addstate'||
     $cpage=='addcity'|| $cpage=='addholiday'|| $cpage=='adddocumenttype'|| $cpage=='addlanguages'||
      $cpage=='addrelationship'|| $cpage=='adddegree' || $cpage=='adddepartmenthead'||
       $cpage=='addlocation')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddepartment')?'active':''?>' href='<?=$domain?>/HRM01/AddDepartment.php'>Department</a>
            </li>
           
         
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddesignation')?'active':''?>' href='<?=$domain?>/HRM04/AddDesignation.php'>Designation</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addshift')?'active':''?>' href='<?=$domain?>/HRM05/AddShift.php'>Shift</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addcountry')?'active':''?>' href='<?=$domain?>/HRM06/AddCountry.php'>Country</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addstate')?'active':''?>' href='<?=$domain?>/HRM07/AddState.php'>States</a>
            </li>
               <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addcity')?'active':''?>' href='<?=$domain?>/HRM03/AddCity.php'>City</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addholiday')?'active':''?>' href='<?=$domain?>/HRM08/AddHoliday.php'>Holiday</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddocumenttype')?'active':''?>' href='<?=$domain?>/HRM11/AddDocumenttype.php'>Document Type</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addlanguages')?'active':''?>' href='<?=$domain?>/HRM12/AddLanguages.php'>Languages</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addrelationship')?'active':''?>' href='<?=$domain?>/HRM13/AddRelationship.php'>Relationship</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddegree')?'active':''?>' href='<?=$domain?>/HRM15/AddDegree.php'>Qualification</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddepartmenthead')?'active':''?>' href='<?=$domain?>/HRM36/AddDepartmenthead.php'>Department Head</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='addlocation')?'active':''?>' href='<?=$domain?>/HRM33/AddLocation.php'>Location</a>
        </li>
        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link <?=($cpage=='addjob' || $cpage=='editjob' || $cpage=='jobview')?'active':''?>' href='#'  data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
        Application</a>
    <div id='submenu-3' class='collapse submenu <?=($cpage=='addjob' || $cpage=='editjob' || $cpage=='jobview')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addjob')?'active':''?>' title='Job Application Addition' href='<?=$domain?>/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editjob')?'active':''?>' title='Job Application Edit' href='<?=$domain?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='jobview')?'active':''?>' title='Job Application View' href='<?=$domain?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='addcandidate' || $cpage=='editcandidate' || $cpage=='viewcandidate')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
    <div id='submenu-9' class='collapse submenu <?=($cpage=='addcandidate' || $cpage=='editcandidate' || $cpage=='viewcandidate')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addcandidate')?'active':''?>' title='Candidate Addition' href='<?=$domain?>/HRM09/Addcandidate.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editcandidate')?'active':''?>' title='Candidate Edit' href='<?=$domain?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='viewcandidate')?'active':''?>' title='Candidate View'  href='<?=$domain?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='addemployee' || $cpage=='editemployee' || $cpage=='viewemployee' || $cpage=='appresialpending' || $cpage=='backgroundverificationpending')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
    <div id='submenu-4' class='collapse submenu <?=($cpage=='addemployee' || $cpage=='editemployee' || $cpage=='viewemployee' || $cpage=='appresialpending' || $cpage=='backgroundverificationpending')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addemployee')?'active':''?>' title='Employee Addition' href='<?=$domain?>/HRM10/AddEmployee.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editemployee')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='viewemployee')?'active':''?>' title='Employee View' href='<?=$domain?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='appresialpending')?'active':''?>' title='Appraisal Pending List' href='<?=$domain?>/HRM10/Appresialpending.php'><i class='fa fa-th-list'></i> Appraisal Pending List</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='backgroundverificationpending')?'active':''?>' title='Background Verification Pending List' href='<?=$domain?>/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i> Background Verification</a>
            </li>
          

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
    <div id='submenu-11' class='collapse submenu  <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addemp')?'active':''?>' title='Employee Addition' href='<?=$domain?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editexit')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='view')?'active':''?>' title='Employee View' href='<?=$domain?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
            </li>

            

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='rightadd' || $cpage=='rightsedit')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-15' aria-controls='submenu-15'><i class='fa fa-user-circle'></i>Admin Rights</a>
    <div id='submenu-15' class='collapse submenu  <?=($cpage=='rightadd' || $cpage=='rightsedit')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='rightadd')?'active':''?>' title='Admin Addition' href='<?=$domain?>/HRM25/RightAdd.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='rightsedit')?'active':''?>' title='Admin Edit' href='<?=$domain?>/HRM25/RightsEdit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
           

            

        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' || $cpage=='addpayrolltemp' ||
     $cpage=='employeepayrolldeduction' || $cpage=='empesidetails'|| $cpage=='emppayrolldeductionlist'|| 
     $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'|| $cpage=='categorywise_attendanceview'|| 
     $cpage=='categorywise_payslip')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-5' aria-controls='submenu-5'><i
            class='fa fa-balance-scale'></i>Payroll</a>
    <div id='submenu-5' class='collapse submenu <?=($cpage=='adddailyattendance' || 
    $cpage=='employeedailyattandancerpt' || $cpage=='addpayrolltemp' || $cpage=='employeepayrolldeduction' 
     || $cpage=='empesidetails'|| $cpage=='emppayrolldeductionlist'|| $cpage=='payrollclose'|| $cpage=='payrollrpt'||
      $cpage=='bankpayroll'|| $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddailyattendance')?'active':''?>' title='Daily Attendance' href='<?=$domain?>/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='employeedailyattandancerpt')?'active':''?>' title='Daily Attendance' href='<?=$domain?>/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addpayrolltemp')?'active':''?>' title='Payroll Temp' href='<?=$domain?>/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='employeepayrolldeduction')?'active':''?>' title='Deduction Upload' href='<?=$domain?>/HRM14/Employeepayrolldeduction.php'><i class='fa fa-id-card'></i> Deduction Upload </a>
            </li>

            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='empesidetails')?'active':''?>' title='Employee ESI Detail' href='<?=$domain?>/HRM14/Empesidetails.php'><i class='fa fa-id-card'></i> Employee ESI List  </a>
            </li>
        <li class='nav-item'>
        <a class='nav-link <?=($cpage=='emppayrolldeductionlist')?'active':''?>' title='Deduction List' href='<?=$domain?>/HRM14/Emppayrolldeductionlist.php'><i class='fa fa-id-card'></i> Deduction List </a>
    </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollclose')?'active':''?>' title='Payslip' href='<?=$domain?>/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollrpt')?'active':''?>' title='Categorywise Payrol' href='<?=$domain?>/HRM14/PayrollRpt.php'><i class='fa fa-id-card'></i> Categorywise Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='bankpayroll')?'active':''?>' title='Bank Report' href='<?=$domain?>/HRM14/Bankpayroll.php'><i class='fa fa-id-card'></i> Bank Report </a>
        </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='categorywise_attendanceview')?'active':''?>' title='Categorywise-Attendance details' href='<?=$domain?>/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise-Attendance details </a>
        </li>
        </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='categorywise_attendanceviewnew')?'active':''?>' title='Categorywise-Actual Attendance details' href='<?=$domain?>/HRM14/Categorywise_attendanceviewnew.php'><i class='fa fa-id-card'></i> Categorywise- Actual Attendance details </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link <?=($cpage=='categorywise_payslip')?'active':''?>' title='Categorywise-Bulk Payslip' href='<?=$domain?>/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
    </li>
        </ul>
    </div>
</li>

<li class='nav-item '>
    <a class='nav-link <?=($cpage=='addvoucher' || $cpage=='headofaccountdetails' || $cpage=='addinwardamount'
     || $cpage=='inwardreport')?'active':''?>' href=#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-30' aria-controls='submenu-30'><i class='fa fa-user-times'></i>Cash Voucher</a>
    <div id='submenu-30' class='collapse submenu <?=($cpage=='addvoucher' || 
    $cpage=='headofaccountdetails' || $cpage=='addinwardamount' || $cpage=='inwardreport')?'show':''?>'>
    <ul class='nav flex-column'>
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='addvoucher')?'active':''?>' title='Add Voucher' href='<?=$domain?>/HRM30/AddVoucher.php'><i class='fa fa-plus'></i> Add</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='headofaccountdetails')?'active':''?>' title='Edit Voucher' href='<?=$domain?>/HRM30/HeadofAccountdetails.php'><i class='fa fa-table'></i> Expenses Report</a>
    </li>
  
    <li class='nav-item'>
    <a class='nav-link <?=($cpage=='addinwardamount')?'active':''?>' title='View Voucher' href='<?=$domain?>/HRM31/AddInwardamount.php'><i class='fa fa-plus'></i> Wallet</a>
   </li>
   <li class='nav-item'>
   <a class='nav-link <?=($cpage=='inwardreport')?'active':''?>' title='View Voucher' href='<?=$domain?>/HRM31/InwardReport.php'><i class='fa fa-database'></i> Wallet Report</a>
</li>

    

</ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='gratuity')?'active':''?>' href='../Gratuity/gratuity.php'><i class='fa'><span
                style='font-size:1.3rem'>₹</span></i>Gratuity</a>
</li>
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='english' || $cpage=='tamil' || $cpage=='hindi')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-6' aria-controls='submenu-6'><i class='fa fa-file-pdf-o'></i> NDA
    </a>
    <div id='submenu-6' class='collapse submenu  <?=($cpage=='english' || $cpage=='tamil' || $cpage=='hindi')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='english')?'active':''?>' href='<?=$domain?>/NDA-english/english.php'>NDA English</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='tamil')?'active':''?>' href='<?=$domain?>/NDA-tamil/tamil.php'>NDA Tamil</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='hindi')?'active':''?>' href='<?=$domain?>/NDA-hindi/hindi.php'>NDA Hindi</a>
            </li>

        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link <?=($cpage=='employee_details_hindi' || $cpage=='interviewdetail_hindi' ||
     $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || $cpage=='employee_contract_hindi' ||
     $cpage=='employee_stating_hindi' || $cpage=='employee_declaration_hindi' || $cpage=='employee_agreement_hindi' ||
     $cpage=='appointmentorder_hindi' || $cpage=='confirmation_order_hindi' || $cpage=='form-2-revised_hindi' ||
     $cpage=='form_f_hindi' || $cpage=='employee_training_hindi' 
     || $cpage=='service_improvement_recordi_hindi' ||
     
     $cpage=='employee_details_tamil' || $cpage=='interviewdetail_tamil' ||
     $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || $cpage=='employee_contract_tamil' ||
     $cpage=='employee_stating_tamil' || $cpage=='employee_declaration_tamil' || $cpage=='employee_agreement_tamil' ||
     $cpage=='appointmentorder_tamil' || $cpage=='confirmation_order_tamil' || $cpage=='form_2_revised_tamil' ||
     $cpage=='form_f_tamil' || $cpage=='employee_training_tamil' 
     || $cpage=='service_improvement_recordi_tamil' )?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-sipl' aria-controls='submenu-sipl'><i class='fa fa-file-pdf-o'></i> SIPL
        <span class='badge badge-secondary'>NDA-Tamil</span></a>

    <div id='submenu-sipl' class='collapse submenu <?=($cpage=='employee_details_hindi' || 
    $cpage=='interviewdetail_hindi' || $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || 
    $cpage=='employee_contract_hindi' || $cpage=='employee_stating_hindi' || $cpage=='employee_declaration_hindi' || 
    $cpage=='employee_agreement_hindi' || $cpage=='appointmentorder_hindi' || $cpage=='confirmation_order_hindi' || 
    $cpage=='form-2-revised_hindi' || $cpage=='form_f_hindi' ||
     $cpage=='employee_training_hindi' || $cpage=='service_improvement_recordi_hindi' || 
     
     $cpage=='employee_details_tamil' || 
    $cpage=='interviewdetail_tamil' || $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || 
    $cpage=='employee_contract_tamil' || $cpage=='employee_stating_tamil' || $cpage=='employee_declaration_tamil' || 
    $cpage=='employee_agreement_tamil' || $cpage=='appointmentorder_tamil' || $cpage=='confirmation_order_tamil' || 
    $cpage=='form_2_revised_tamil' || $cpage=='form_f_tamil' ||
     $cpage=='employee_training_tamil' || $cpage=='service_improvement_recordi_tamil')?'show':''?>'>
        <ul class='nav flex-column'>

            <li class='nav-item'>
                <a class='nav-link  <?=($cpage=='employee_details_hindi' || $cpage=='interviewdetail_hindi'
                 || $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || 
                 $cpage=='employee_contract_hindi' || $cpage=='employee_stating_hindi' || $cpage=='employee_declaration_hindi' || $cpage=='interviewdetail_hindi'
                 || $cpage=='employee_agreement_hindi' || $cpage=='appointmentorder_hindi' || 
                 $cpage=='confirmation_order_hindi' || $cpage=='form-2-revised_hindi' || $cpage=='form_f_hindi' || 
                 $cpage=='employee_training_hindi' || $cpage=='service_improvement_recordi_hindi')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
                    data-target='#SIPL-Hindi' aria-controls='SIPL-Hindi'>Hindi</a>
                <div id='SIPL-Hindi' class='collapse submenu <?=($cpage=='employee_details_hindi' || 
                $cpage=='interviewdetail_hindi' || $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || 
                $cpage=='employee_contract_hindi' || $cpage=='employee_stating_hindi' ||
                 $cpage=='employee_declaration_hindi' || $cpage=='employee_agreement_hindi'
                || $cpage=='appointmentorder_hindi' || $cpage=='confirmation_order_hindi' || 
                $cpage=='form-2-revised_hindi' || $cpage=='form_f_hindi' || 
                $cpage=='employee_training_hindi' || $cpage=='service_improvement_recordi_hindi')?'show':''?>'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_details_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Details_Hindi.php'>Employee Details
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='interviewdetail_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Interviewdetail_Hindi.php'>Interview Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form34_hindi')?'active':''?>'
                             href='<?=$domain?>/SIPL-hindi/Form34_Hindi.php'>Form-34</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_attention_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Attention_Hindi.php'>Attention Of The
                                Employee</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_contract_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Contract_Hindi.php'>Employee
                                Contract</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_stating_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Stating_Hindi.php'>Employee Stating</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_declaration_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Declaration_Hindi.php'>Employee
                                Declaration Form</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_agreement_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Agreement_Hindi.php'>Employee
                                Agreement</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='appointmentorder_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Appointmentorder_Hindi.php'>Appointment
                                Order</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='confirmation_order_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Confirmation_Order_Hindi.php'>Confirmation
                                Order</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form-2-revised_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/FORM-2-revised_hindi.php'>Form-2(Revised)</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form_f_hindi')?'active':''?>' 
                            href='<?=$domain?>/SIPL-hindi/FORM_F_Hindi.php'>Form-F</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_training_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Training_Hindi.php'>Employee TRAINING
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='service_improvement_recordi_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Service_Improvement_Recordi_Hindi.php'>Service /
                                Improvement Record</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='employee_details_tamil' || $cpage=='interviewdetail_tamil'
                 || $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || 
                 $cpage=='employee_contract_tamil' || $cpage=='employee_stating_tamil'
                  || $cpage=='employee_declaration_tamil' || $cpage=='interviewdetail_hindi'
                 || $cpage=='employee_agreement_tamil' || $cpage=='appointmentorder_tamil' || 
                 $cpage=='confirmation_order_tamil' || $cpage=='form_2_revised_tamil' || $cpage=='form_f_tamil' || 
                 $cpage=='employee_training_tamil' || $cpage=='service_improvement_recordi_tamil')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
                    data-target='#sipl-tamil' aria-controls='sipl-tamil'>Tamil</a>
                <div id='sipl-tamil' class='collapse submenu <?=($cpage=='employee_details_tamil' || 
                $cpage=='interviewdetail_tamil' || $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || 
                $cpage=='employee_contract_tamil' || $cpage=='employee_stating_tamil' ||
                 $cpage=='employee_declaration_tamil' || $cpage=='employee_agreement_tamil'
                || $cpage=='appointmentorder_tamil' || $cpage=='confirmation_order_tamil' || 
                $cpage=='form_2_revised_tamil' || $cpage=='form_f_tamil' || 
                $cpage=='employee_training_tamil' || $cpage=='service_improvement_recordi_tamil')?'show':''?>'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_details_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Details_Tamil.php'>Employee Details
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='interviewdetail_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Interviewdetail_Tamil.php'>Interview Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form34_tamil')?'active':''?>'
                             href='<?=$domain?>/SIPL-tamil/Form34_Tamil.php'>Form-34</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_attention_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Attention_Tamil.php'>Attention Of The
                                Employee</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_contract_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Contract_Tamil.php'>Employee
                                Contract</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_stating_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Stating_Tamil.php'>Employee Stating</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_declaration_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Declaration_Tamil.php'>Employee
                                Declaration Form</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_agreement_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Agreement_Tamil.php'>Employee
                                Agreement</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='appointmentorder_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Appointmentorder_Tamil.php'>Appointment
                                Order</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='confirmation_order_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Confirmation_Order_Tamil.php'>Confirmation
                                Order</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form_2_revised_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/FORM_2_revised_Tamil.php'>Form-2(Revised)</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form_f_tamil')?'active':''?>' 
                            href='<?=$domain?>/SIPL-tamil/FORM_F_Tamil.php'>Form-F</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_training_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Training_Tamil.php'>Employee
                                Training</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='service_improvement_recordi_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Service_Improvement_Recordi_Tamil.php'>Service /
                                Improvement Record</a>
                        </li>
                    </ul>
                </div>
            <!-- <li class='nav-item'>
                <a class='nav-link' href='#'>English</a>
            </li> -->
</li>
</div>
</ul><?php
}
else if ($Authorizedno == 7)
{ ?>

   <ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter <?=($cpage=='dashboard')?'active':''?>' href='<?=$domain?>/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>

<li class='nav-item'>
    <a class='nav-link <?=($cpage=='addjob' || $cpage=='editjob' || $cpage=='jobview')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
        Application</a>
    <div id='submenu-3'
     class='collapse submenu <?=($cpage=='addjob' || $cpage=='editjob' || $cpage=='jobview')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addjob')?'active':''?>' title='Job Application Addition'
                 href='<?=$domain?>/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editjob')?'active':''?>' title='Job Application Edit'
                 href='<?=$domain?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='jobview')?'active':''?>' title='Job Application View' 
                href='<?=$domain?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='addcandidate' || $cpage=='editcandidate' || $cpage=='viewcandidate')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
    <div id='submenu-9' class='collapse submenu <?=($cpage=='addcandidate' || $cpage=='editcandidate'
     || $cpage=='viewcandidate')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addcandidate')?'active':''?>' title='Candidate Addition' 
                href='<?=$domain?>/HRM09/Addcandidate.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editcandidate')?'active':''?>' title='Candidate Edit' 
                href='<?=$domain?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='viewcandidate')?'active':''?>' title='Candidate View' 
                 href='<?=$domain?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='addemployee' || $cpage=='editemployee' || $cpage=='viewemployee')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
    <div id='submenu-4' class='collapse submenu <?=($cpage=='addemployee' || $cpage=='editemployee'
     || $cpage=='viewemployee')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addemployee')?'active':''?>' title='Employee Addition' href='<?=$domain?>/HRM10/AddEmployee.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editemployee')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='viewemployee')?'active':''?>' title='Employee View'
                 href='<?=$domain?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
            </li>

           
          

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
    <div id='submenu-11' class='collapse submenu <?=($cpage=='addemp' || $cpage=='editexit'
     || $cpage=='view')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addemp')?'active':''?>' title='Employee Addition'
                 href='<?=$domain?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editexit')?'active':''?>' title='Employee Edit'
                 href='<?=$domain?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='view')?'active':''?>' title='Employee View'
                 href='<?=$domain?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
            </li>

            

        </ul>
    </div>
</li>


 
</ul>
<?php
}
else if ($Authorizedno == 2)
{ ?>

    <ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter <?=($cpage=='dashboard')?'active':''?>' href='<?=$domain?>/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>


<li class='nav-item'>
    <a class='nav-link <?=($cpage=='editjob' || $cpage=='jobview')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
        Application</a>
    <div id='submenu-3' class='collapse submenu <?=($cpage=='editjob' || $cpage=='jobview')?'show':''?>'>
        <ul class='nav flex-column'>
           
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editjob')?'active':''?>' title='Job Application Edit'
                 href='<?=$domain?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='jobview')?'active':''?>' title='Job Application View'
                 href='<?=$domain?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='editcandidate' || $cpage=='viewcandidate')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
    <div id='submenu-9' class='collapse submenu <?=($cpage=='editcandidate' || $cpage=='viewcandidate')?'show':''?>'>
        <ul class='nav flex-column'>
         
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editcandidate')?'active':''?>' title='Candidate Edit' href='<?=$domain?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='viewcandidate')?'active':''?>' title='Candidate View'  href='<?=$domain?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='editemployee' || $cpage=='viewemployee' || $cpage=='appresialpending' 
    || $cpage=='backgroundverificationpending')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
    <div id='submenu-4' class='collapse submenu <?=($cpage=='editemployee' || $cpage=='viewemployee' 
    || $cpage=='appresialpending' || $cpage=='backgroundverificationpending')?'show':''?>'>
        <ul class='nav flex-column'>
         
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editemployee')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='viewemployee')?'active':''?>' title='Employee View' href='<?=$domain?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='appresialpending')?'active':''?>' title='Appraisal Pending List' href='<?=$domain?>/HRM10/Appresialpending.php'><i class='fa fa-th-list'></i> Appraisal Pending List</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='backgroundverificationpending')?'active':''?>' title='Background Verification Pending List'
                 href='<?=$domain?>/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i> Background Verification</a>
            </li>
          

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
    <div id='submenu-11' class='collapse submenu <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addemp')?'active':''?>' title='Employee Addition' href='<?=$domain?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='editexit')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='view')?'active':''?>' title='Employee View' href='<?=$domain?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
            </li>

            

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link <?=($cpage=='rightadd' || $cpage=='rightsedit')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-15' aria-controls='submenu-15'><i class='fa fa-user-circle'></i>Admin Rights</a>
    <div id='submenu-15' class='collapse submenu <?=($cpage=='rightadd' || $cpage=='rightsedit')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='rightadd')?'active':''?>' title='Admin Addition' href='<?=$domain?>/HRM25/RightAdd.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='rightsedit')?'active':''?>' title='Admin Edit' href='<?=$domain?>/HRM25/RightsEdit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
           

            

        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' ||
     $cpage=='addpayrolltemp' || $cpage=='employeepayrolldeduction' || $cpage=='empesidetails'||
      $cpage=='emppayrolldeductionlist'|| $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'||
       $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-5' aria-controls='submenu-5'><i
            class='fa fa-balance-scale'></i>Payroll</a>
    <div id='submenu-5' class='collapse submenu <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' ||
     $cpage=='addpayrolltemp' || $cpage=='employeepayrolldeduction' || $cpage=='empesidetails'||
      $cpage=='emppayrolldeductionlist'|| $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'||
       $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddailyattendance')?'active':''?>' title='Daily Attendance'
                 href='<?=$domain?>/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='employeedailyattandancerpt')?'active':''?>' title='Daily Attendance' 
            href='<?=$domain?>/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addpayrolltemp')?'active':''?>' title='Payroll Temp'
                 href='<?=$domain?>/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='employeepayrolldeduction')?'active':''?>' title='Deduction Upload'
             href='<?=$domain?>/HRM14/Employeepayrolldeduction.php'><i class='fa fa-id-card'></i> Deduction Upload </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link <?=($cpage=='emppayrolldeductionlist')?'active':''?>' title='Deduction List'
         href='<?=$domain?>/HRM14/Emppayrolldeductionlist.php'><i class='fa fa-id-card'></i> Deduction List </a>
    </li>
    <li class='nav-item'>
    <a class='nav-link <?=($cpage=='empesidetails')?'active':''?>' title='Employee ESI Detail'
     href='<?=$domain?>/HRM14/Empesidetails.php'><i class='fa fa-id-card'></i>Employee ESI List</a>
    </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollclose')?'active':''?>' title='Payslip'
                 href='<?=$domain?>/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollrpt')?'active':''?>' title='Payslip' 
                href='<?=$domain?>/HRM14/PayrollRpt.php'><i class='fa fa-id-card'></i> Categorywise Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='bankpayroll')?'active':''?>' title='Payslip'
             href='<?=$domain?>/HRM14/Bankpayroll.php'><i class='fa fa-id-card'></i> Bank Report </a>
        </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='categorywise_attendanceview')?'active':''?>' title='Payslip'
                 href='<?=$domain?>/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise Attendance details </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='categorywise_payslip')?'active':''?>' title='Payslip'
             href='<?=$domain?>/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
        </li>
        </ul>
    </div>
</li>

<li class='nav-item '>
    <a class='nav-link <?=($cpage=='headofaccountdetails' || $cpage=='inwardreport')?'active':''?>' href=#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-30' aria-controls='submenu-30'><i class='fa fa-user-times'></i>Cash Voucher</a>
    <div id='submenu-30' class='collapse submenu <?=($cpage=='headofaccountdetails' || $cpage=='inwardreport')?'show':''?>'>
    <ul class='nav flex-column'>
  
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='headofaccountdetails')?'active':''?>' title='Edit Voucher'
         href='<?=$domain?>/HRM30/HeadofAccountdetails.php'><i class='fa fa-table'></i> Expenses Report</a>
    </li>
  
   
   <li class='nav-item'>
   <a class='nav-link <?=($cpage=='inwardreport')?'active':''?>' title='View Voucher'
    href='<?=$domain?>/HRM31/InwardReport.php'><i class='fa fa-database'></i> Wallet Report</a>
</li>

    

</ul>
    </div>
</li>



         
</ul><?php
}
else if ($Authorizedno == 8)
{ ?>

   <ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter <?=($cpage=='dashboard')?'active':''?>' href='<?=$domain?>/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>



<li class='nav-item'>
    <a class='nav-link <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' ||
     $cpage=='addpayrolltemp' || $cpage=='employeepayrolldeduction' || $cpage=='empesidetails'||
      $cpage=='emppayrolldeductionlist'|| $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'||
       $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-5' aria-controls='submenu-5'><i
            class='fa fa-balance-scale'></i>Payroll</a>
    <div id='submenu-5' class='collapse submenu <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' ||
     $cpage=='addpayrolltemp' || $cpage=='employeepayrolldeduction' || $cpage=='empesidetails'||
      $cpage=='emppayrolldeductionlist'|| $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'||
       $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='adddailyattendance')?'active':''?>' title='Daily Attendance'
                 href='<?=$domain?>/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='employeedailyattandancerpt')?'active':''?>' title='Daily Attendance'
             href='<?=$domain?>/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='addpayrolltemp')?'active':''?>' title='Payroll Temp'
                 href='<?=$domain?>/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='employeepayrolldeduction')?'active':''?>' title='Deduction Upload'
             href='<?=$domain?>/HRM14/Employeepayrolldeduction.php'><i class='fa fa-id-card'></i> Deduction Upload </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link <?=($cpage=='empesidetails')?'active':''?>' title='Employee ESI Detail'
         href='<?=$domain?>/HRM14/Empesidetails.php'><i class='fa fa-id-card'></i> Employee ESI List </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link <?=($cpage=='emppayrolldeductionlist')?'active':''?>' title='Deduction List'
         href='<?=$domain?>/HRM14/Emppayrolldeductionlist.php'><i class='fa fa-id-card'></i> Deduction List </a>
    </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollclose')?'active':''?>' title='Payslip'
                 href='<?=$domain?>/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollrpt')?'active':''?>' title='Payslip'
                 href='<?=$domain?>/HRM14/PayrollRpt.php'><i class='fa fa-id-card'></i> Categorywise Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='bankpayroll')?'active':''?>' title='Payslip' 
            href='<?=$domain?>/HRM14/Bankpayroll.php'><i class='fa fa-id-card'></i> Bank Report </a>
        </li>
        </li>
        <li class='nav-item'>
        <a class='nav-link <?=($cpage=='categorywise_attendanceview')?'active':''?>' title='Payslip'
         href='<?=$domain?>/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise-Attendance details </a>
    </li>
    <li class='nav-item'>
    <a class='nav-link <?=($cpage=='categorywise_payslip')?'active':''?>' title='Payslip' 
    href='<?=$domain?>/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
</li>
        </ul>
    </div>
</li>





         
</ul> <?php
}
else if ($Authorizedno == 5)
{

    $MenuList = "";
}

else
{
?><ul class='navbar-nav flex-column'>
    <li class='nav-divider'>
        Menu
    </li>
    <li class='nav-item '>
        <a class='nav-link animate-charcter <?=($cpage=='dashboard')?'active':''?>' href='<?=$domain?>/dashboard.php'><i
                class='fa fa-calculator'></i>Dashboard</a>
    
    </li>
   
    
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='addjob' || $cpage=='editjob' || $cpage=='jobview')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
            Application</a>
        <div id='submenu-3' class='collapse submenu <?=($cpage=='addjob' || $cpage=='editjob' || $cpage=='jobview')?'show':''?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='addjob')?'active':''?>' title='Job Application Addition' href='<?=$domain?>/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='editjob')?'active':''?>' title='Job Application Edit' href='<?=$domain?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='jobview')?'active':''?>' title='Job Application View' href='<?=$domain?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
    
            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='editcandidate' || $cpage=='viewcandidate')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
        <div id='submenu-9' class='collapse submenu <?=($cpage=='editcandidate' || $cpage=='viewcandidate')?'show':''?>'>
            <ul class='nav flex-column'>
             
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='editcandidate')?'active':''?>' title='Candidate Edit' href='<?=$domain?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='viewcandidate')?'active':''?>' title='Candidate View'  href='<?=$domain?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
    
            </ul>
        </div>
    </li>
    
    
    <li class='nav-item '>
        <a class='nav-link <?=($cpage=='editemployee' || $cpage=='viewemployee' || $cpage=='appresialpending'
         || $cpage=='backgroundverificationpending')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
        <div id='submenu-4' class='collapse submenu <?=($cpage=='editemployee' || $cpage=='viewemployee' || $cpage=='appresialpending'
         || $cpage=='backgroundverificationpending')?'show':''?>'>
            <ul class='nav flex-column'>
               
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='editemployee')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='viewemployee')?'active':''?>' title='Employee View' href='<?=$domain?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='appresialpending')?'active':''?>' title='Appraisal Pending List' href='<?=$domain?>/HRM10/Appresialpending.php'><i class='fa fa-th-list'></i> Appraisal Pending List</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='backgroundverificationpending')?'active':''?>' title='Background Verification Pending List' 
                    href='<?=$domain?>/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i> Background Verification</a>
                </li>
              
    
            </ul>
        </div>
    </li>
    
    
    <li class='nav-item '>
        <a class='nav-link <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
        <div id='submenu-11' class='collapse submenu <?=($cpage=='addemp' || $cpage=='editexit' || $cpage=='view')?'show':''?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='addemp')?'active':''?>' title='Employee Addition' href='<?=$domain?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='editexit')?'active':''?>' title='Employee Edit' href='<?=$domain?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='view')?'active':''?>' title='Employee View' href='<?=$domain?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
                
    
            </ul>
        </div>
    </li>
    
    

    
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' ||
     $cpage=='addpayrolltemp' || $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'||
       $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-5' aria-controls='submenu-5'><i
                class='fas fa-fw fa-table'></i>Payroll</a>
        <div id='submenu-5' class='collapse submenu <?=($cpage=='adddailyattendance' || $cpage=='employeedailyattandancerpt' ||
     $cpage=='addpayrolltemp' || $cpage=='payrollclose'|| $cpage=='payrollrpt'|| $cpage=='bankpayroll'||
       $cpage=='categorywise_attendanceview'|| $cpage=='categorywise_payslip')?'show':''?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='adddailyattendance')?'active':''?>' title='Daily Attendance'
                     href='<?=$domain?>/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link <?=($cpage=='employeedailyattandancerpt')?'active':''?>'
                 title='Daily Attendance' href='<?=$domain?>/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='addpayrolltemp')?'active':''?>' title='Payroll Temp'
                     href='<?=$domain?>/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
                </li>
    
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage=='payrollclose')?'active':''?>' title='Payslip' 
                    href='<?=$domain?>/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
                </li>
                <li class='nav-item'>
                <a class='nav-link <?=($cpage=='payrollrpt')?'active':''?>' title='Payslip' 
                href='<?=$domain?>/HRM14/PayrollRpt.php'><i class='fa fa-id-card'></i> Categorywise Payroll </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='bankpayroll')?'active':''?>' title='Payslip' 
            href='<?=$domain?>/HRM14/Bankpayroll.php'><i class='fa fa-id-card'></i> Bank Report </a>
        </li>
                <li class='nav-item'>
                <a class='nav-link <?=($cpage=='categorywise_attendanceview')?'active':''?>' title='Payslip' 
                href='<?=$domain?>/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise Attendance details </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link <?=($cpage=='categorywise_payslip')?'active':''?>' title='Payslip' 
            href='<?=$domain?>/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip</a>
        </li>
            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link <?=($cpage=='gratuity')?'active':''?>' href='../Gratuity/gratuity.php'><i class='fa'><span
                    style='font-size:1.3rem'>₹</span></i>Gratuity</a>
    </li>
    <li class='nav-item'>
    <a class='nav-link <?=($cpage=='english' || $cpage=='tamil' || $cpage=='hindi')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-6' aria-controls='submenu-6'><i class='fa fa-file-pdf-o'></i> NDA
    </a>
    <div id='submenu-6' class='collapse submenu  <?=($cpage=='english' || $cpage=='tamil' || $cpage=='hindi')?'show':''?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='english')?'active':''?>' href='<?=$domain?>/NDA-english/english.php'>NDA English</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='tamil')?'active':''?>' href='<?=$domain?>/NDA-tamil/tamil.php'>NDA Tamil</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='hindi')?'active':''?>' href='<?=$domain?>/NDA-hindi/hindi.php'>NDA Hindi</a>
            </li>

        </ul>
    </div>
</li>
    
<li class='nav-item'>
    <a class='nav-link <?=($cpage=='employee_details_hindi' || $cpage=='interviewdetail_hindi' ||
     $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || $cpage=='employee_contract_hindi' ||
     $cpage=='employee_stating_hindi' || $cpage=='employee_declaration_hindi' || $cpage=='employee_agreement_hindi' ||
     $cpage=='appointmentorder_hindi' || $cpage=='confirmation_order_hindi' || $cpage=='form-2-revised_hindi' ||
     $cpage=='form_f_hindi' || $cpage=='employee_training_hindi' 
     || $cpage=='service_improvement_recordi_hindi' ||
     
     $cpage=='employee_details_tamil' || $cpage=='interviewdetail_tamil' ||
     $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || $cpage=='employee_contract_tamil' ||
     $cpage=='employee_stating_tamil' || $cpage=='employee_declaration_tamil' || $cpage=='employee_agreement_tamil' ||
     $cpage=='appointmentorder_tamil' || $cpage=='confirmation_order_tamil' || $cpage=='form_2_revised_tamil' ||
     $cpage=='form_f_tamil' || $cpage=='employee_training_tamil' 
     || $cpage=='service_improvement_recordi_tamil' )?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-sipl' aria-controls='submenu-sipl'><i class='fa fa-file-pdf-o'></i> SIPL
        <span class='badge badge-secondary'>NDA-Tamil</span></a>

    <div id='submenu-sipl' class='collapse submenu <?=($cpage=='employee_details_hindi' || 
    $cpage=='interviewdetail_hindi' || $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || 
    $cpage=='employee_contract_hindi' || $cpage=='employee_stating_hindi' || $cpage=='employee_declaration_hindi' || 
    $cpage=='employee_agreement_hindi' || $cpage=='appointmentorder_hindi' || $cpage=='confirmation_order_hindi' || 
    $cpage=='form-2-revised_hindi' || $cpage=='form_f_hindi' ||
     $cpage=='employee_training_hindi' || $cpage=='service_improvement_recordi_hindi' || 
     
     $cpage=='employee_details_tamil' || 
    $cpage=='interviewdetail_tamil' || $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || 
    $cpage=='employee_contract_tamil' || $cpage=='employee_stating_tamil' || $cpage=='employee_declaration_tamil' || 
    $cpage=='employee_agreement_tamil' || $cpage=='appointmentorder_tamil' || $cpage=='confirmation_order_tamil' || 
    $cpage=='form_2_revised_tamil' || $cpage=='form_f_tamil' ||
     $cpage=='employee_training_tamil' || $cpage=='service_improvement_recordi_tamil')?'show':''?>'>
        <ul class='nav flex-column'>

            <li class='nav-item'>
                <a class='nav-link  <?=($cpage=='employee_details_hindi' || $cpage=='interviewdetail_hindi'
                 || $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || 
                 $cpage=='employee_contract_hindi' || $cpage=='employee_stating_hindi' || $cpage=='employee_declaration_hindi' || $cpage=='interviewdetail_hindi'
                 || $cpage=='employee_agreement_hindi' || $cpage=='appointmentorder_hindi' || 
                 $cpage=='confirmation_order_hindi' || $cpage=='form-2-revised_hindi' || $cpage=='form_f_hindi' || 
                 $cpage=='employee_training_hindi' || $cpage=='service_improvement_recordi_hindi')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
                    data-target='#SIPL-Hindi' aria-controls='SIPL-Hindi'>Hindi</a>
                <div id='SIPL-Hindi' class='collapse submenu <?=($cpage=='employee_details_hindi' || 
                $cpage=='interviewdetail_hindi' || $cpage=='form34_hindi' || $cpage=='employee_attention_hindi' || 
                $cpage=='employee_contract_hindi' || $cpage=='employee_stating_hindi' ||
                 $cpage=='employee_declaration_hindi' || $cpage=='employee_agreement_hindi'
                || $cpage=='appointmentorder_hindi' || $cpage=='confirmation_order_hindi' || 
                $cpage=='form-2-revised_hindi' || $cpage=='form_f_hindi' || 
                $cpage=='employee_training_hindi' || $cpage=='service_improvement_recordi_hindi')?'show':''?>'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_details_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Details_Hindi.php'>Employee Details
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='interviewdetail_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Interviewdetail_Hindi.php'>Interview Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form34_hindi')?'active':''?>'
                             href='<?=$domain?>/SIPL-hindi/Form34_Hindi.php'>Form-34</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_attention_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Attention_Hindi.php'>Attention Of The
                                Employee</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_contract_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Contract_Hindi.php'>Employee
                                Contract</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_stating_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Stating_Hindi.php'>Employee Stating</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_declaration_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Declaration_Hindi.php'>Employee
                                Declaration Form</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_agreement_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Agreement_Hindi.php'>Employee
                                Agreement</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='appointmentorder_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Appointmentorder_Hindi.php'>Appointment
                                Order</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='confirmation_order_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Confirmation_Order_Hindi.php'>Confirmation
                                Order</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form-2-revised_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/FORM-2-revised_hindi.php'>Form-2(Revised)</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form_f_hindi')?'active':''?>' 
                            href='<?=$domain?>/SIPL-hindi/FORM_F_Hindi.php'>Form-F</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_training_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Employee_Training_Hindi.php'>Employee TRAINING
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='service_improvement_recordi_hindi')?'active':''?>'
                                href='<?=$domain?>/SIPL-hindi/Service_Improvement_Recordi_Hindi.php'>Service /
                                Improvement Record</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage=='employee_details_tamil' || $cpage=='interviewdetail_tamil'
                 || $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || 
                 $cpage=='employee_contract_tamil' || $cpage=='employee_stating_tamil'
                  || $cpage=='employee_declaration_tamil' || $cpage=='interviewdetail_hindi'
                 || $cpage=='employee_agreement_tamil' || $cpage=='appointmentorder_tamil' || 
                 $cpage=='confirmation_order_tamil' || $cpage=='form_2_revised_tamil' || $cpage=='form_f_tamil' || 
                 $cpage=='employee_training_tamil' || $cpage=='service_improvement_recordi_tamil')?'active':''?>' href='#' data-toggle='collapse' aria-expanded='false'
                    data-target='#sipl-tamil' aria-controls='sipl-tamil'>Tamil</a>
                <div id='sipl-tamil' class='collapse submenu <?=($cpage=='employee_details_tamil' || 
                $cpage=='interviewdetail_tamil' || $cpage=='form34_tamil' || $cpage=='employee_attention_tamil' || 
                $cpage=='employee_contract_tamil' || $cpage=='employee_stating_tamil' ||
                 $cpage=='employee_declaration_tamil' || $cpage=='employee_agreement_tamil'
                || $cpage=='appointmentorder_tamil' || $cpage=='confirmation_order_tamil' || 
                $cpage=='form_2_revised_tamil' || $cpage=='form_f_tamil' || 
                $cpage=='employee_training_tamil' || $cpage=='service_improvement_recordi_tamil')?'show':''?>'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_details_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Details_Tamil.php'>Employee Details
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='interviewdetail_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Interviewdetail_Tamil.php'>Interview Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form34_tamil')?'active':''?>'
                             href='<?=$domain?>/SIPL-tamil/Form34_Tamil.php'>Form-34</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_attention_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Attention_Tamil.php'>Attention Of The
                                Employee</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_contract_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Contract_Tamil.php'>Employee
                                Contract</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_stating_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Stating_Tamil.php'>Employee Stating</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_declaration_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Declaration_Tamil.php'>Employee
                                Declaration Form</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_agreement_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Agreement_Tamil.php'>Employee
                                Agreement</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='appointmentorder_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Appointmentorder_Tamil.php'>Appointment
                                Order</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='confirmation_order_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Confirmation_Order_Tamil.php'>Confirmation
                                Order</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form_2_revised_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/FORM_2_revised_Tamil.php'>Form-2(Revised)</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='form_f_tamil')?'active':''?>' 
                            href='<?=$domain?>/SIPL-tamil/FORM_F_Tamil.php'>Form-F</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='employee_training_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Employee_Training_Tamil.php'>Employee
                                Training</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage=='service_improvement_recordi_tamil')?'active':''?>'
                                href='<?=$domain?>/SIPL-tamil/Service_Improvement_Recordi_Tamil.php'>Service /
                                Improvement Record</a>
                        </li>
                    </ul>
                </div>
            <!-- <li class='nav-item'>
                <a class='nav-link' href='#'>English</a>
            </li> -->
</li>
    </ul><?php
}
?>
            </div>
            </ul>
    </div>
    </nav>
</div>
</div>

<!-- <script type="text/javascript">
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('li.sidebar-menu a').filter(function() {
	 return this.href == url;
}).parent().addClass('active');

// for treeview
$('li.treeview-menu a').filter(function() {
	 return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

</script> -->
