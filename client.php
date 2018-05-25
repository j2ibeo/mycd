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
 
angular.module('myapp',['myapp.controller']);

angular.module('myapp.controller',['myapp.service'])
  .controller('testController',function($scope,testService){

    $scope.cds={};
    function GetAllCds() {
      var getCdsData = testService.getAll();

      getCdsData.then(function (post) {
         $scope.cds = post.data;

         

      }, function () {
         alert('Error in getting post records');
      });
    }
          
    GetAllCds();

});

angular.module('myapp.service',[])
  .service('testService', function ($http) {

    //get All NewsLetter
    this.getAll = function () {
       return $http.get('/cds');
    };
 });

 

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
	  	<div class="panel-heading"><a href="create_edit.php" class="btn btn-info">Add New CD</a></div>
		  	<div class="panel-body">

				<div ng-app="myapp" ng-controller="testController" >
					<div ng-show="cds.data.length > 0">
						<table id="example" class="table table-bordered bordered table-striped table-condensed datatable" ui-jq="dataTable" ui-options="dataTableOpt" style="width:100%">
					        <thead>
					            <tr>
					                <th>Artist Name</th>
					                <th>Album Title</th>
					                <th>Album Catalog #</th>
					                <th>Release Year</th>
					                <th>Genre</th>
					                <th>Composer</th>
					                <th>Owner</th>
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<tr ng-repeat="item in cds.data">
						        	<td>{{ item.artist_name}}</td>
						        	<td>{{ item.album_title}}</td>
						        	<td>{{ item.album_catalog_no}}</td>
						        	<td>{{ item.release_year}}</td>
						        	<td>{{ item.genre}}</td>
						        	<td>{{ item.composer}}</td>
						        	<td>{{ item.owner}}</td>
						        	<td><a href="create_edit.php?id={{item.id}}" class="btn    btn-warning">&nbsp;<i class=" glyphicon glyphicon-edit"></i>&nbsp; Edit </a> </td>	
					        	</tr>
					        </tbody>
					    </table>
				 	</div>
				 	<div class="col-md-12" ng-show="cds.data.length == 0">
			        <div class="col-md-12">
			            <h4>No cds found</h4>
			        </div>
			    </div>
				</div>
				
		  	</div>
		</div>
	</div>
</div>
</body>
</html>