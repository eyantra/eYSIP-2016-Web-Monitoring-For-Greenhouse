<!doctype html>
<html lang='en' ng-app='devicemanapp' >
<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Device management-Greenhouse monitoring</title>
<!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type='text/css' href="styles/deviceman.css" >
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body style='position:relative;'>
	
	<div ng-controller='devicemancontroller' >
		<div class='row'> 
			<div dir-paginate="x in details|orderBy:sortKey:reverse|filter:search|itemsPerPage:9" class=' col-md-4 col-xs-12 card '>
				<div class="card__front" ng-attr-id='{{"a"+x.id +""+ x.switches}}' >
    				<div class=' boxes'>
				<p class='dev_heading' ><span  > {{x.deviceId}}</span></p>
				<p><span class='details'>Name:-</span> {{x.name}}</p>
				<p><span class='details'>Type:-</span> {{x.type}}</p>
				<p><span class='details'>Switch ID:-</span> {{x.switches}}</p>
				<p ng-class={relate:x.type=='valve'}><span class='details'>Group:-</span> {{x.group}} <i class="material-icons md-18" ng-if="x.type=='valve'"  style='position:relative; top:3px; ' ng-click='open(x,1)'>edit</i></p>

				
				<p style='text-align:center;'><button   class='moreinfo' ng-click='clicked(x.id,x.switches)'> More Info</button>
				</br><button  class='editinfo' ng-click='open(x,2)' >Edit info</button></p>
					</div>
				</div>
				<div class="card__back" ng-attr-id='{{"b"+x.id +""+ x.switches}}'>
					<div class='boxes'>
						<p ng-if='x.description'><span class='details'>Description:-</span>{{x.description}}</p>	
						<p ng-if='x.regionId'><span class='details'>Region ID:-</span>{{x.regionId}}</p>	
						<p ng-if='x.latitude'><span class='details'>Latitude:-</span>{{x.latitude}}</p>	
						<p ng-if='x.longitude'><span class='details'>Longitude:-</span>{{x.longitude}}</p>	
						<div class='row'>
						<div class='col-md-6 col-xs-6'><p><span ng-if='x.field1'><span class='details'>Field1:-</span>{{x.field1}}</span>	
						</p>	
						
						<p><span ng-if='x.field2'><span class='details'>Field2:-</span>{{x.field2}}</span>	
						</p>	
						
						<p><span ng-if='x.field3'><span class='details'>Field3:-</span>{{x.field3}}</span>	
						</p>	
						</div>
						<div class='col-md-6 col-xs-6'>
						<p><span ng-if='x.field4' ><span class='details'> Field4:-</span>{{x.field4}}</span></p>
					<p>	<span ng-if='x.field5' > <span class='details'> Field5:-</span>{{x.field5}}</span></p>
					</p>
					<p>	<span ng-if='x.field6' ><span class='details'> Field6:-</span>{{x.field6}}</span></p>
					</div>
					</div>
						<p ng-if='x.created_at'><span class='details'>Created at:-</span>{{x.created_at}}</p>	
						<p ng-if='x.updated_at'><span class='details'>Updated at:-</span>{{x.updated_at}}</p>	
						<p ng-if='x.elevation'><span class='details'>Elevation:-</span>{{x.elevation}}</p>	
						<p style='text-align:center;'><button   class='moreinfo' ng-click='clicked2(x.id,x.switches)'> Go Back</button>
						</p>
					</div>
				</div>	
			</div>
		
		</div>
			</br>
	<div class='footer'style=' position:absolute; bottom:-100px;  left: 50%; margin-left:-120px;'>
			 <dir-pagination-controls
       max-size="5"
       direction-links="true"
       boundary-links="true" >
    </dir-pagination-controls>
	</div>

		<script type="text/ng-template" id="myModalContent.html" >
        <div class="modal-header " ng-class={aligning:option==2}>
            <h3 class="modal-title">{{device.deviceId}}</h3>
        </div>
        <div class="modal-body aligning" ng-if='option==2'>
            Name:</br>
            <input type='text' value='{{device.name}}' class='signup_fields' ng-model='x.name'></input></br>
            Description:</br>
            <textarea  value='{{device.description}}' ng-model='x.description'></textarea></br>
            Region ID:</br>
            <input type='text' value='{{device.regionId}}'class='signup_fields' ng-model='x.regionId'></input></br>
            Group (for device):</br>
            <select   ng-model='x.group1'>
            <option>{{device.group1}}</option>
            <option  ng-repeat='y in groups' ng-if='y.name!=device.group1' >{{y.name}}</option>
            </select></br>
            Latitude:</br>
            <input type='text' value='{{device.latitude}}'class='signup_fields' ng-model='x.latitude'></input></br>
            Longitude:</br>
            <input type='text' value='{{device.longitude}}'class='signup_fields' ng-model='x.longitude'></input></br>
            Elevation:</br>
            <input type='text' value='{{device.elevation}}'class='signup_fields' ng-model='x.elevation'></input></br>
            
        </div>
        <div class='modal-body' ng-if='option==1'>
        <p>Change the group of the switch {{x.switches}}</p>
        		 <select   ng-model='x.group'>
            <option>{{device.group}}</option>
            <option  ng-repeat='y in groups' ng-if='y.name!=device.group' >{{y.name}}</option>
            </select>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok(device)">Save Changes</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
        </div>
    </script>
	</div>		


<!-- jQuery -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<!-- AngularJs -->
<script src="./bower_components/angular/angular.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ui-bootstrap for modal -->
<script src='./bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js'></script>
<script src='./bower_components/angularUtils-pagination/dirPagination.js'></script>
<!-- Customs Scripts -->
<script type='text/javascript' src="scripts/deviceman.js" ></script>

</body>
</html>