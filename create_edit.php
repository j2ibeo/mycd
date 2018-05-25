<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src= "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src= "https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

 
<script>
 
// var app = angular.module('myapp', ['ngRoute']);
// app.factory("services", ['$http', function($http) {
//   var serviceBase = '/cds'
//     var obj = {};
    
//     obj.getCDs = function(){
//         return $http.get(serviceBase );
//     }

//     obj.getCD = function(cdID){
//         return $http.get(serviceBase + '?id=' + cdID);
//     }

//     obj.insertCD = function (cd) {
//     return $http.post(serviceBase + 'insert', cd).then(function (results) {
//         return results;
//     });
//   };

//   obj.updateCD = function (id,cd) {
//       return $http.post(serviceBase + 'update', {id, cd}).then(function (status) {
//           return status.data;
//       });
//   };

//   obj.deleteCD = function (id) {
//       return $http.delete(serviceBase + 'delete?id=' + id).then(function (status) {
//           return status.data;
//       });
//   };

//     return obj;   
// }]);

// app.controller('listCtrl', function ($scope, services) {
//     services.getCDs().then(function(data){
//         $scope.cds = data.data;
//     });
// });

// app.controller('editCtrl', function ($scope, $rootScope, $location, $routeParams, services, cd) {
//     var cdID = ($routeParams.cdID) ? parseInt($routeParams.cdID) : 0;
//     $rootScope.title = (cdID > 0) ? 'Edit Customer' : 'Add Customer';
//     $scope.buttonText = (cdID > 0) ? 'Update CD' : 'Add New CD';
//       var original = cd.data;
//       original._id = cdID;
//       $scope.cd = angular.copy(original);
//       $scope.cd._id = cdID;

//       $scope.isClean = function() {
//         return angular.equals(original, $scope.cd);
//       }

//       $scope.deleteCD = function(cd) {
//         $location.path('/');
//         if(confirm("Are you sure to delete cd number: "+$scope.cd._id)==true)
//         services.deleteCD(cd.id);
//       };

//       $scope.saveCD = function(cd) {
//         $location.path('/');
//         if (cdID <= 0) {
//             services.insertCD(cd);
//         }
//         else {
//             services.updateCD(cdID, cd);
//         }
//     };
// });

// app.config(['$routeProvider',
//   function($routeProvider) {
//     $routeProvider.
//       when('/', {
//         title: 'CDs',
//         templateUrl: 'partial_cd.html',
//         controller: 'listCtrl'
//       })
//       .when('/create_edit/:id', {
//         title: 'Edit CD',
//         templateUrl: 'create_edit.php',
//         controller: 'editCtrl',
//         resolve: {
//           customer: function(services, $route){
//             var cdID = $route.current.params.cdID;
//             return services.getCD(cdID);
//           }
//         }
//       })
//       .otherwise({
//         redirectTo: '/'
//       });
// }]);
// app.run(['$location', '$rootScope', function($location, $rootScope) {
//     $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
//         $rootScope.title = current.$$route.title;
//     });
// }]);

 
 function MyController($scope, $http) {
      $scope.items = []

      $scope.getCD = function() {
       $http({method : 'GET',url : '/cds',params: {id}})
          .success(function(data, status) {
              $scope.items = data;
              comsole.log(data)
           })
          .error(function(data, status) {
              alert("Error");
          })
      }
}
MyController();
 

</script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">My CD</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
       
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">My CD</div>
  <div class="panel-body">

	<div ng-app="myapp" ng-controller="formController">
		 <form role="form" name="myForm" class="form-horizontal">
        <div class="row">
        <div class="col-md-12">
        <div class= "form-group" ng-class="{error: myForm.artist_name.$invalid}">
            <label class= "col-md-2"> Artist Name </label>
            <div class="col-md-4">
            <input name="name" ng-model="cd.artist_name" type= "text" class= "form-control" placeholder="Artist name" required/>
            <span ng-show="myForm.artist_name.$dirty && myForm.artist_name.$invalid" class="help-inline">Artist Name Required</span>
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2"> Album Title </label>
            <div class="col-md-4">
            <input name="album_title" ng-model="cd.album_title" type= "text" class= "form-control" placeholder="Enter Album Title" required/>
             
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2">Album Catalog # </label>
            <div class="col-md-4">
            <input ng-model="cd.album_catalog_no" type= "text" class= "form-control" placeholder= "Album Catalog #"/>
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2">Release Year </label>
            <div class="col-md-4">
            <input ng-model="cd.release_year" type= "text" class= "form-control" placeholder= "Release Year"/>
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2">Genre </label>
            <div class="col-md-4">
            <input ng-model="cd.genre" type= "text" class= "form-control" placeholder= "Genre"/>
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2">Composer </label>
            <div class="col-md-4">
            <input ng-model="cd.composer" type= "text" class= "form-control" placeholder= "Composer"/>
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2">Owner </label>
            <div class="col-md-4">
            <input ng-model="cd.owner" type= "text" class= "form-control" placeholder= "Owner"/>
            </div>
        </div>
        <div class= "form-group">
            <label class= "col-md-2"></label>
            <div class="col-md-4">
            <a href="#/" class="btn">Cancel</a>
                <button ng-click="saveCD(cd);" 
                        ng-disabled="isClean() || myForm.$invalid"
                        class="btn btn-primary">{{buttonText}}</button>
                <button ng-click="deleteCD(cd)"
                        ng-show="cd._id" class="btn btn-warning">Delete</button>
            </div>
        </div>
        </div>
        </form>
		 
	</div>

  </div>
</div>
</div>
</body>
</html>