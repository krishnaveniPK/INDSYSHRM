var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('DASHBOARDController', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Department = "";
    $scope.NoofPresent = 0;
    $scope.NoofAbsents = 0;
    $scope.Noofleave = 0;
    $scope.NoofEmployee = 0;
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    //////////////////////////////////////////////////////

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Attendence Close") {
                $scope.Message = true;
                $scope.Message = "Attendance Status Close You Cannot Send Mail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Mail Sent") {
                $scope.Message = true;
                $scope.Message = "Mail Sent Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }



        }
        /////////////////////////
    $scope.GetAttendanceDate = function() {
        $http({
            method: "POST",
            url: "DashboardController.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.NoofPresent = response.data.NoofPresent;
            $scope.NoofAbsents = response.data.NoofAbsents;
            $scope.Noofleave = response.data.Noofleave;
            $scope.NoofEmployee = response.data.NoofEmployee;
            $scope.GetDepartmentEmployeeList = response.data.mytbl;


        });


    }

    ///////////////////////////////////////////////////////////////////
    $http({



        method: "POST",
        url: "DashboardController.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.AttendanceDate = response.data.date;
        $scope.GetAttendanceDate();
        //  $scope.FetchMaster();


    });
    //////////////////////

    $scope.SendMailToDepartmenthead = function(Employeeid, Department, Attendencedate) {
            $scope.Message = "Please Wait Request is processing...";


            $scope.Attendencedateemp = Attendencedate;
            $scope.Employeeid = Employeeid;
            $scope.Department = Department;

            $http({
                method: "POST",
                url: "DashboardController.php",
                data: {
                    'AttendanceDate': $scope.Attendencedateemp,
                    'Employeeid': $scope.Employeeid,
                    'Department': $scope.Department,
                    'Method': 'SendMail'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();


            });


        }
        ////////////////////

});