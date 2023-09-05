var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM25Controller', function($scope, $http, $timeout, $filter) {

    $scope.Status = "Open";
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.currentPagePayroll = 1;
    $scope.pageSizePayroll = 10;
    $scope.Nationalholiday = 0;
    $scope.CasualLeave = "1.5";
    $scope.currentPageLate = 1;
    $scope.pageSizeLate = 10

    $scope.TempSave = function() {

       
        

        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Enter the password";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Emailid Empty") {
            $scope.Message = true;
            $scope.Message = "Enter the Email-ID";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Saved Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Exists") {
            $scope.Message = true;
            $scope.Message = "Department Already Exist";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Updated") {
            $scope.Message = true;
            $scope.Message = "Updated Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
    }

///////////////////////////////////////

$http({
    method: "POST",
    url: "EmpDetails.php",
    data: { 'Method': 'Dept' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {

    $scope.GetDepartmentList = response.data;
    
});


///////////////////////////////////////

$http({
    method: "POST",
    url: "EmpDetails.php",
    data: { 'Method': 'Desig' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {

    $scope.GetDesignationList = response.data;
    
});


///////////////////////////////////////



$scope.ResetDetails = function() {
    $scope.EmployeeType = "";
    $scope.Department = "";
    $scope.username = "";
    $scope.Exitempid = "";
    $scope.Employeeid = "";
    $scope.ExitDesignation = "";
    $scope.Emaild = "";
    $scope.ExitContactno = "";
    $scope.pwd = "";

    
}

////////////////////////////////////////////


$scope.Getempname = function() {

    
    $http({

        method: "post",
        url: "EmpDetails.php",
        data: {
            
            'Department': $scope.Department,
            'Method': 'ALL'
        },
        headers: { 'Content-Type': 'application/json' }
    }).then(function successCallback(response) {

      
        $scope.GetEmployeeList = response.data;
        
    });
}
/////////////////////////////////////////////



$scope.GetExitempname = function() {

    
    $http({

        method: "post",
        url: "EmpDetails.php",
        data: {
            
            'Exitempid': $scope.Exitempid,
            'Method': 'ExitEmp'
        },
        headers: { 'Content-Type': 'application/json' }
    }).then(function successCallback(response) {
        
        $scope.Employeeid = response.data.Employeeid;
        $scope.ExitDesignation = response.data.ExitDesignation;
        $scope.ExitContactno = response.data.ExitContactno;
        $scope.Emaild = response.data.Emaild;
        
    });
}




 /////////////////////////////////////////////////////////
 $http({
    method: "POST",
    url: "EmpDetails.php",
    data: { 'Method': 'FETCH' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {


    $scope.GetEmployeeList2 = response.data;
});
//////////////////////////////////////////////

$scope.SaveEmployee = function() {
    $http({



        method: "POST",
        url: "EmpDetails.php",
        data: {
            'Employeeid': $scope.Employeeid,
            'pwd': $scope.pwd,
            'EmployeeType': $scope.EmployeeType,
            'ExitContactno': $scope.ExitContactno,
            'Emaild': $scope.Emaild,
            'ExitDesignation': $scope.ExitDesignation,
            'Exitempid': $scope.Exitempid,
            'Department': $scope.Department,
            'username': $scope.username,
            'Method': 'Save'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.TempMessage = response.data.Message;


        $scope.TempSave();
    });

};

//////////////////////////////////////
$scope.SendEdit = function(Userid) {


    $scope.Userid = Userid;
   

    $('#myCarousel').carousel(1);

    $scope.FetchEmployee($scope.Userid);
}





$scope.FetchEmployee = function(Userid) {
    
    $scope.Userid = Userid;
    $http({
        method: "POST",
        url: "EmpDetails.php",
        data: {
            'Userid': $scope.Userid,
            'Method': "FetchEmployee"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {
        $scope.Userid = response.data.Userid;
        $scope.Username = response.data.Username;
        $scope.Emailid = response.data.Emailid;
        $scope.Contactno = response.data.Contactno;

        $scope.Authorizedtype = response.data.Authorizedtype;
        $scope.Userpassword = response.data.Userpassword;
        $scope.Contactno = response.data.Contactno;
        $scope.Memberactive = response.data.Memberactive;
        $scope.Department = response.data.Department;
        $scope.Designation = response.data.Designation;
       
       

        
    });

   


}
//////////////////////////////////////
$scope.UpdateEmp = function() {
    $http({



        method: "POST",
        url: "EmpDetails.php",
        data: {
            'Userid': $scope.Userid,
            'Username': $scope.Username,
            'Emailid': $scope.Emailid,
            'Contactno': $scope.Contactno,
            'Authorizedtype': $scope.Authorizedtype,
            'Userpassword': $scope.Userpassword,
            'Contactno': $scope.Contactno,
            'Memberactive': $scope.Memberactive,
            'Department': $scope.Department,
            'Designation': $scope.Designation,
           
            'Method': 'UpdateEmp'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {

         
        $scope.TempMessage = response.data.Message;


        $scope.TempSave();
    });

};

///////////////////////////////////////////////

});