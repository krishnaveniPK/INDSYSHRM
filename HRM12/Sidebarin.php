<?php 
session_start();
$Authorizedno =$_SESSION["Authorizedno"];

if($Authorizedno==1){

    $MenuList = "<ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter' href='$domain/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>
<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-2' aria-controls='submenu-2'><i class='fa fa-cog'></i>Settings</a>
    <div id='submenu-2' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM01/AddDepartment.php'>Department</a>
            </li>
           
         
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM04/AddDesignation.php'>Designation</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM05/AddShift.php'>Shift</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM06/AddCountry.php'>Country</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM07/AddState.php'>States</a>
            </li>
               <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM03/AddCity.php'>City</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM08/AddHoliday.php'>Holiday</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM11/AddDocumenttype.php'>Document Type</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM12/AddLanguages.php'>Languages</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM13/AddRelationship.php'>Relationship</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM15/AddDegree.php'>Qualification</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/HRM36/AddDepartmenthead.php'>Department Head</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' href='$domain/HRM33/AddLocation.php'>Location</a>
        </li>
        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
        Application</a>
    <div id='submenu-3' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application Addition' href='$domain/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application Edit' href='$domain/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application View' href='$domain/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
    <div id='submenu-9' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate Addition' href='$domain/HRM09/Addcandidate.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate Edit' href='$domain/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate View'  href='$domain/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
    <div id='submenu-4' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Addition' href='$domain/HRM10/AddEmployee.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Edit' href='$domain/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee View' href='$domain/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' title='Appraisal Pending List' href='$domain/HRM10/Appresialpending.php'><i class='fa fa-th-list'></i> Appraisal Pending List</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Background Verification Pending List' href='$domain/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i> Background Verification</a>
            </li>
          

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
    <div id='submenu-11' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Addition' href='$domain/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Edit' href='$domain/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee View' href='$domain/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
            </li>

            

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-15' aria-controls='submenu-15'><i class='fa fa-user-circle'></i>Admin Rights</a>
    <div id='submenu-15' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Admin Addition' href='$domain/HRM25/RightAdd.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Admin Edit' href='$domain/HRM25/RightsEdit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
           

            

        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-5' aria-controls='submenu-5'><i
            class='fa fa-balance-scale'></i>Payroll</a>
    <div id='submenu-5' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Daily Attendance' href='$domain/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM28/AddAttendanceDoc.php'><i class='fa fa-address-book'></i> Attendance Doc</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' title='Payroll Temp' href='$domain/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' title='Payslip' href='$domain/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise Attendance details </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
    </li>
            <li class='nav-item'>
                <a class='nav-link' title='Late Comers' href='$domain/HRM17/LatecomersDetails.php'><i class='fa fa-clock-o'></i> Late Comers</a>
            </li>
        </ul>
    </div>
</li>

<li class='nav-item '>
    <a class='nav-link' href=#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-30' aria-controls='submenu-30'><i class='fa fa-user-times'></i>Cash Voucher</a>
    <div id='submenu-30' class='collapse submenu'>
    <ul class='nav flex-column'>
    <li class='nav-item'>
        <a class='nav-link' title='Add Voucher' href='$domain/HRM30/AddVoucher.php'><i class='fa fa-plus'></i> Add</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link' title='Edit Voucher' href='$domain/HRM30/HeadofAccountdetails.php'><i class='fa fa-table'></i> Expenses Report</a>
    </li>
  
    <li class='nav-item'>
    <a class='nav-link' title='View Voucher' href='$domain/HRM31/AddInwardamount.php'><i class='fa fa-plus'></i> Wallet</a>
   </li>
   <li class='nav-item'>
   <a class='nav-link' title='View Voucher' href='$domain/HRM31/InwardReport.php'><i class='fa fa-database'></i> Wallet Report</a>
</li>

    

</ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link' href='../Gratuity/gratuity.php'><i class='fa'><span
                style='font-size:1.3rem'>₹</span></i>Gratuity</a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-6' aria-controls='submenu-6'><i class='fa fa-file-pdf-o'></i> NDA
    </a>
    <div id='submenu-6' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/NDA-english/english.php'>NDA English</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/NDA-tamil/tamil.php'>NDA Tamil</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='$domain/NDA-hindi/hindi.php'>NDA Hindi</a>
            </li>

        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-sipl' aria-controls='submenu-sipl'><i class='fa fa-file-pdf-o'></i> SIPL
        <span class='badge badge-secondary'>NDA-Tamil</span></a>
    <div id='submenu-sipl' class='collapse submenu'>
        <ul class='nav flex-column'>

            <li class='nav-item'>
                <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
                    data-target='#SIPL-Hindi' aria-controls='SIPL-Hindi'>Hindi</a>
                <div id='SIPL-Hindi' class='collapse submenu'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Details_Hindi.php'>Employee Details
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Interviewdetail_Hindi.php'>Interview Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='$domain/SIPL-hindi/Form34_Hindi.php'>Form-34</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Attention_Hindi.php'>Attention Of The
                                Employee</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Contract_Hindi.php'>Employee
                                Contract</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Stating_Hindi.php'>Employee Stating</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Declaration_Hindi.php'>Employee
                                Declaration Form</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Agreement_Hindi.php'>Employee
                                Agreement</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Appointmentorder_Hindi.php'>Appointment
                                Order</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Confirmation_Order_Hindi.php'>Confirmation
                                Order</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/FORM-2-revised_hindi.php'>Form-2(Revised)</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link' href='$domain/SIPL-hindi/FORM_F_Hindi.php'>Form-F</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Employee_Training_Hindi.php'>Employee TRAINING
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-hindi/Service_Improvement_Recordi_Hindi.php'>Service /
                                Improvement Record</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
                    data-target='#sipl-tamil' aria-controls='sipl-tamil'>Tamil</a>
                <div id='sipl-tamil' class='collapse submenu'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Details_Tamil.php'>Employee Details
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Interviewdetail_Tamil.php'>Interview Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='$domain/SIPL-tamil/Form34_Tamil.php'>Form-34</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Attention_Tamil.php'>Attention Of The
                                Employee</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Contract_Tamil.php'>Employee
                                Contract</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Stating_Tamil.php'>Employee Stating</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Declaration_Tamil.php'>Employee
                                Declaration Form</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Agreement_Tamil.php'>Employee
                                Agreement</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Appointmentorder_Tamil.php'>Appointment
                                Order</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Confirmation_Order_Tamil.php'>Confirmation
                                Order</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/FORM_2_revised_Tamil.php'>Form-2(Revised)</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link' href='$domain/SIPL-tamil/FORM_F_Tamil.php'>Form-F</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Employee_Training_Tamil.php'>Employee
                                Training</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link'
                                href='$domain/SIPL-tamil/Service_Improvement_Recordi_Tamil.php'>Service /
                                Improvement Record</a>
                        </li>
                    </ul>
                </div>
            <li class='nav-item'>
                <a class='nav-link' href='#'>English</a>
            </li>
</li>
</ul>";
}



/////////////////
else if($Authorizedno==7){

    $MenuList = "<ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter' href='$domain/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>

<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
        Application</a>
    <div id='submenu-3' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application Addition' href='$domain/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application Edit' href='$domain/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application View' href='$domain/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
    <div id='submenu-9' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate Addition' href='$domain/HRM09/Addcandidate.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate Edit' href='$domain/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate View'  href='$domain/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
    <div id='submenu-4' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Addition' href='$domain/HRM10/AddEmployee.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Edit' href='$domain/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee View' href='$domain/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
            </li>

           
          

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
    <div id='submenu-11' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Addition' href='$domain/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Edit' href='$domain/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee View' href='$domain/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
            </li>

            

        </ul>
    </div>
</li>










 
</ul>";
}

////////////////////////////////////////////////////////////////

else if($Authorizedno==2){

    $MenuList = "<ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter' href='$domain/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>


<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
        Application</a>
    <div id='submenu-3' class='collapse submenu'>
        <ul class='nav flex-column'>
           
            <li class='nav-item'>
                <a class='nav-link' title='Job Application Edit' href='$domain/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Job Application View' href='$domain/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>
<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
    <div id='submenu-9' class='collapse submenu'>
        <ul class='nav flex-column'>
         
            <li class='nav-item'>
                <a class='nav-link' title='Candidate Edit' href='$domain/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Candidate View'  href='$domain/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
            </li>


        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
    <div id='submenu-4' class='collapse submenu'>
        <ul class='nav flex-column'>
         
            <li class='nav-item'>
                <a class='nav-link' title='Employee Edit' href='$domain/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee View' href='$domain/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' title='Appraisal Pending List' href='$domain/HRM10/Appresialpending.php'><i class='fa fa-th-list'></i> Appraisal Pending List</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Background Verification Pending List' href='$domain/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i> Background Verification</a>
            </li>
          

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
    <div id='submenu-11' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Addition' href='$domain/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee Edit' href='$domain/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Employee View' href='$domain/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
            </li>

            

        </ul>
    </div>
</li>


<li class='nav-item '>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-15' aria-controls='submenu-15'><i class='fa fa-user-circle'></i>Admin Rights</a>
    <div id='submenu-15' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Admin Addition' href='$domain/HRM25/RightAdd.php'> <i class='fa fa-plus'></i> Add</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Admin Edit' href='$domain/HRM25/RightsEdit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
            </li>
           

            

        </ul>
    </div>
</li>

<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-5' aria-controls='submenu-5'><i
            class='fa fa-balance-scale'></i>Payroll</a>
    <div id='submenu-5' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Daily Attendance' href='$domain/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM28/AddAttendanceDoc.php'><i class='fa fa-address-book'></i> Attendance Doc</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Payroll Temp' href='$domain/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' title='Payslip' href='$domain/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise Attendance details </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
    </li>
    
            <li class='nav-item'>
                <a class='nav-link' title='Late Comers' href='$domain/HRM17/LatecomersDetails.php'><i class='fa fa-clock-o'></i> Late Comers</a>
            </li>
        </ul>
    </div>
</li>

<li class='nav-item '>
    <a class='nav-link' href=#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-30' aria-controls='submenu-30'><i class='fa fa-user-times'></i>Cash Voucher</a>
    <div id='submenu-30' class='collapse submenu'>
    <ul class='nav flex-column'>
  
    <li class='nav-item'>
        <a class='nav-link' title='Edit Voucher' href='$domain/HRM30/HeadofAccountdetails.php'><i class='fa fa-table'></i> Expenses Report</a>
    </li>
  
   
   <li class='nav-item'>
   <a class='nav-link' title='View Voucher' href='$domain/HRM31/InwardReport.php'><i class='fa fa-database'></i> Wallet Report</a>
</li>

    

</ul>
    </div>
</li>



         
</ul>";
}


/////////////////////////////


else if($Authorizedno==8){

    $MenuList = "<ul class='navbar-nav flex-column'>
<li class='nav-divider'>
    Menu
</li>
<li class='nav-item '>
    <a class='nav-link animate-charcter' href='$domain/dashboard.php'><i
            class='fa fa-calculator'></i>Dashboard</a>

</li>














<li class='nav-item'>
    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
        data-target='#submenu-5' aria-controls='submenu-5'><i
            class='fa fa-balance-scale'></i>Payroll</a>
    <div id='submenu-5' class='collapse submenu'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Daily Attendance' href='$domain/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM28/AddAttendanceDoc.php'><i class='fa fa-address-book'></i> Attendance Doc</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' title='Payroll Temp' href='$domain/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' title='Payslip' href='$domain/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise Attendance details </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
    </li>
            <li class='nav-item'>
                <a class='nav-link' title='Late Comers' href='$domain/HRM17/LatecomersDetails.php'><i class='fa fa-clock-o'></i> Late Comers</a>
            </li>
        </ul>
    </div>
</li>





         
</ul>";
}
/////////////////////////////


else if($Authorizedno==5){

    $MenuList = "";
}

else
{
    $MenuList = "<ul class='navbar-nav flex-column'>
    <li class='nav-divider'>
        Menu
    </li>
    <li class='nav-item '>
        <a class='nav-link animate-charcter' href='$domain/dashboard.php'><i
                class='fa fa-calculator'></i>Dashboard</a>
    
    </li>
   
    
    <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-3' aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
            Application</a>
        <div id='submenu-3' class='collapse submenu'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link' title='Job Application Addition' href='$domain/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Job Application Edit' href='$domain/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Job Application View' href='$domain/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
    
            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-9' aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
        <div id='submenu-9' class='collapse submenu'>
            <ul class='nav flex-column'>
             
                <li class='nav-item'>
                    <a class='nav-link' title='Candidate Edit' href='$domain/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Candidate View'  href='$domain/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
    
            </ul>
        </div>
    </li>
    
    
    <li class='nav-item '>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-4' aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
        <div id='submenu-4' class='collapse submenu'>
            <ul class='nav flex-column'>
               
                <li class='nav-item'>
                    <a class='nav-link' title='Employee Edit' href='$domain/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Employee View' href='$domain/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
                <li class='nav-item'>
                    <a class='nav-link' title='Appraisal Pending List' href='$domain/HRM10/Appresialpending.php'><i class='fa fa-th-list'></i> Appraisal Pending List</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Background Verification Pending List' href='$domain/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i> Background Verification</a>
                </li>
              
    
            </ul>
        </div>
    </li>
    
    
    <li class='nav-item '>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-11' aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
        <div id='submenu-11' class='collapse submenu'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link' title='Employee Addition' href='$domain/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Employee Edit' href='$domain/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Employee View' href='$domain/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
                </li>
    
                
    
            </ul>
        </div>
    </li>
    
    

    
    <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-5' aria-controls='submenu-5'><i
                class='fas fa-fw fa-table'></i>Payroll</a>
        <div id='submenu-5' class='collapse submenu'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link' title='Daily Attendance' href='$domain/HRM16/AddDailyattendance.php'><i class='fa fa-address-book'></i> Attendance</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' title='Daily Attendance' href='$domain/HRM37/EmployeeDailyattandancerpt.php'><i class='fa fa-address-book'></i> Attendance Report</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Daily Attendance' href='$domain/HRM28/AddAttendanceDoc.php'><i class='fa fa-address-book'></i> Attendance Doc</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Payroll Temp' href='$domain/HRM14/AddPayrolltemp.php'><i class='fa fa-id-card'></i> Payroll </a>
                </li>
    
                <li class='nav-item'>
                    <a class='nav-link' title='Payslip' href='$domain/HRM14/Payrollclose.php'><i class='fa fa-id-card'></i> Payslip </a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_attendanceview.php'><i class='fa fa-id-card'></i> Categorywise Attendance details </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' title='Payslip' href='$domain/HRM14/Categorywise_payslip.php'><i class='fa fa-id-card'></i> Categorywise-Bulk Payslip </a>
        </li>
                <li class='nav-item'>
                    <a class='nav-link' title='Late Comers' href='$domain/HRM17/LatecomersDetails.php'><i class='fa fa-clock'></i> Late Comers</a>
                </li>
            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link' href='../Gratuity/gratuity.php'><i class='fa'><span
                    style='font-size:1.3rem'>₹</span></i>Gratuity</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-6' aria-controls='submenu-6'><i class='fa fa-file-pdf-o'></i> NDA
        </a>
        <div id='submenu-6' class='collapse submenu'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link' href='$domain/NDA-english/english.php'>NDA English</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='$domain/NDA-tamil/tamil.php'>NDA Tamil</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='$domain/NDA-hindi/hindi.php'>NDA Hindi</a>
                </li>
    
            </ul>
        </div>
    </li>
    
    <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
            data-target='#submenu-sipl' aria-controls='submenu-sipl'><i class='fa fa-file-pdf-o'></i> SIPL
            <span class='badge badge-secondary'>NDA-Tamil</span></a>
        <div id='submenu-sipl' class='collapse submenu'>
            <ul class='nav flex-column'>
    
                <li class='nav-item'>
                    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
                        data-target='#SIPL-Hindi' aria-controls='SIPL-Hindi'>Hindi</a>
                    <div id='SIPL-Hindi' class='collapse submenu'>
                        <ul class='nav flex-column'>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Details_Hindi.php'>Employee Details
                                </a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Interviewdetail_Hindi.php'>Interview Detail</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='$domain/SIPL-hindi/Form34_Hindi.php'>Form-34</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Attention_Hindi.php'>Attention Of The
                                    Employee</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Contract_Hindi.php'>Employee
                                    Contract</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Stating_Hindi.php'>Employee Stating</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Declaration_Hindi.php'>Employee
                                    Declaration Form</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Agreement_Hindi.php'>Employee
                                    Agreement</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Appointmentorder_Hindi.php'>Appointment
                                    Order</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Confirmation_Order_Hindi.php'>Confirmation
                                    Order</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/FORM-2-revised_hindi.php'>Form-2(Revised)</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link' href='$domain/SIPL-hindi/FORM_F_Hindi.php'>Form-F</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Employee_Training_Hindi.php'>Employee TRAINING
                                </a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-hindi/Service_Improvement_Recordi_Hindi.php'>Service /
                                    Improvement Record</a>
                            </li>
                        </ul>
                    </div>
                </li>
    
                <li class='nav-item'>
                    <a class='nav-link' href='#' data-toggle='collapse' aria-expanded='false'
                        data-target='#sipl-tamil' aria-controls='sipl-tamil'>Tamil</a>
                    <div id='sipl-tamil' class='collapse submenu'>
                        <ul class='nav flex-column'>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Details_Tamil.php'>Employee Details
                                </a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Interviewdetail_Tamil.php'>Interview Detail</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='$domain/SIPL-tamil/Form34_Tamil.php'>Form-34</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Attention_Tamil.php'>Attention Of The
                                    Employee</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Contract_Tamil.php'>Employee
                                    Contract</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Stating_Tamil.php'>Employee Stating</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Declaration_Tamil.php'>Employee
                                    Declaration Form</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Agreement_Tamil.php'>Employee
                                    Agreement</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Appointmentorder_Tamil.php'>Appointment
                                    Order</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Confirmation_Order_Tamil.php'>Confirmation
                                    Order</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/FORM_2_revised_Tamil.php'>Form-2(Revised)</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link' href='$domain/SIPL-tamil/FORM_F_Tamil.php'>Form-F</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Employee_Training_Tamil.php'>Employee
                                    Training</a>
                            </li>
    
                            <li class='nav-item'>
                                <a class='nav-link'
                                    href='$domain/SIPL-tamil/Service_Improvement_Recordi_Tamil.php'>Service /
                                    Improvement Record</a>
                            </li>
                        </ul>
                    </div>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>English</a>
                </li>
    </li>
    </ul>";
}



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
               <?php echo "$MenuList"; ?>
            </div>
            </ul>
    </div>
    </nav>
</div>
</div>