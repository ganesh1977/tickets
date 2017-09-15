@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vendor Media Registration</div>
                <div class="panel-body" ng-app="media" ng-controller="media_controller">
                    <table border='0' width="100%">
                        {{ csrf_field() }}
                        <tr><td>                                
                        <label for="username" class="col-md-4 control-label">Media Category:</label>
                            </td><td>
                                <select name='vendorCategory' style="width:200px;" class="form-control" ng-model="itemSelected" ng-change="mediaChange(itemSelected)">
                                    <option value=''>Select Media Cateogry</option>    
                                    <option value='1'>Outdoor</option>
                                    <option value='2'>Indoor </option>
                                    <option value='3'>Transit</option>
                                    <option value='4'>Sports </option>
                                    <option value='5'>Touch Points</option>
                                </select>    
                            </td></tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label for="username" class="col-md-4 control-label">Media Sub Category:</label>
                            </td>
                            <td>
                                <select  style="width:200px;" class="form-control" ng-model="mediaItemSelected" ng-options="item.sub_category_name for item in names" ng-change="mediaTypeChange(mediaItemSelected)">	
                                    <option value='' >Select Media Sub Cateogry</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr><td>
                        <label for="username" class="col-md-4 control-label">Media Sub Category Type :</label>
                        </td><td>
                        <select name='vendorCategoryType' style="width:200px;" class="form-control" ng-model="mediaSubItemSelected.id" ng-change="mediaChangeSubType(mediaSubItemSelected.id)" ng-options="item.id as item.media_type_name for item in itemSelectedType">
                            <option value=''>New Sub Category</option>
                            <!--@foreach($maincategory as $mainCat)                                
                                <option value='{{ $mainCat->id }}'>{{ $mainCat->media_type_name }}</option>
                            @endforeach-->
                        </select>                            
                        <!-- <textarea  cols="30" rows="10" class="form-control"></textarea> -->
                        </div>
                    </td></tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                    <td>                                
                        <label for="username" class="col-md-4 control-label">Product Main Category:</label>
                    </td>
                    <td>
                        <select name='ProductMainCategory' style="width:200px;" class="form-control" ng-model="ProdcutNames_list" ng-options="item.product_name for item in ProdcutNames"  ng-change="ProductChange(ProdcutNames_list)">
                            <option value=''>Select Product Category</option>                                
                        </select>    
                    </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                    <td>                                
                        <label for="username" class="col-md-4 control-label">Product Sub Category:</label>
                    </td>
                    <td>
                        <select style="width:200px;" class="form-control" ng-model="ProdcutSubNames">
                            <option value=''>Select Product Sub Category</option>                                
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                        </select>    
                    </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                    <td>                                
                        <label for="username" class="col-md-4 control-label">Product Description:</label>
                    </td>
                    <td>
                        <textarea ng-model="productDescription"></textarea>
                    </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr><td colspan="2" align="center"><input type="submit" value='Media Registraton'></td></tr>
                    </table>                
                    <br>
                        <table border="1" width="100%"> 
                            <tr><td colspan="2" align="center"><b><h2>View Vendor Media</h2></b></td></tr>
                            <tr><td>
                            <table border='1' width="100%">
                                 <tr>
                                    <td>                                
                                        <label for="username" class="col-md-4 control-label">Media Category:</label>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="username" class="col-md-4 control-label">Media Sub Category:</label>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="username" class="col-md-4 control-label">Media Sub Category Type :</label>
                                    </td>
                                    <td>&nbsp;
                                                                            
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <label for="username" class="col-md-4 control-label">Product Main Category:</label>
                                    </td>
                                    <td>&nbsp;
                                                                            
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <label for="username" class="col-md-4 control-label">Product Sub Category :</label>
                                    </td>
                                    <td>&nbsp;
                                                                            
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <label for="username" class="col-md-4 control-label">Product Description:</label>
                                    </td>
                                    <td>&nbsp;
                                                                            
                                    </td>
                                </tr>
                            </table>   
                            </table>
                         </td></tr>
                    </table>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
    angular.module("media",[]).controller('media_controller',function($scope,$http)
    {
            $scope.mediaChange = function()
            {           
                    $http({ 
                        url: "/laravel_news/public/media_select_type", 
                        method: "POST",
                        headers: {'Accept': 'application/json','Content-Type': 'application/x-www-form-urlencoded'},
                        data: { "id":$scope.itemSelected},
                        withCredentials: false,
                    }).success(function(response, status,headers, config){    						
                        $scope.names = response;						
                        console.log($scope.names); 
                    }).error(function(response, status, headers, config) {                
                        console.log(response);
                        $scope.status = status;
                    });     
            }
            
            $scope.mediaChangeType = function()
            {
                    return false;
            }
            
            $scope.ProductChange = function()
            {
                    return false;
            }
            
            $scope.mediaChangeSubType = function()
            {
                    var data_type = $.param($scope.mediaSubItemSelected);
                    //var data_type = $.param($this.value);
                    //alert(data_type);return false; 
                    
                    $http({ 
                        url: "/laravel_news/public/productCategory", 
                        method: "POST",
                        headers: {'Accept': 'application/json','Content-Type': 'application/x-www-form-urlencoded'},
                        data: { "id":data_type },
                        withCredentials: false,
                    }).success(function(response, status,headers, config){    	       
                        $scope.ProdcutNames = response;						
                        console.log($scope.ProdcutNames); 
                    }).error(function(response, status, headers, config) {                
                        console.log(response);
                        $scope.status = status;
                    });
            }
            $scope.mediaTypeChange = function()
            {
                    var data = $.param($scope.mediaItemSelected);
                    
                    
                    $http({ 
                        url: "/laravel_news/public/mediaCategoryType", 
                        method: "POST",
                        headers: {'Accept': 'application/json','Content-Type': 'application/x-www-form-urlencoded'},
                        data: { "id":$scope.mediaItemSelected },
                        withCredentials: false,
                    }).success(function(response, status,headers, config){    	       
                        $scope.itemSelectedType = response;						
                        console.log($scope.itemSelectedType); 
                    }).error(function(response, status, headers, config) {                
                        console.log(response);
                        $scope.status = status;
                    });
                    
                    /*$http({ 
                        url: "/laravel_news/public/productCategory", 
                        method: "POST",
                        headers: {'Accept': 'application/json','Content-Type': 'application/x-www-form-urlencoded'},
                        data: { "id":$scope.mediaItemSelected },
                        withCredentials: false,
                    }).success(function(response, status,headers, config){    	       
                        $scope.ProdcutNames = response;						
                        console.log($scope.ProdcutNames); 
                    }).error(function(response, status, headers, config) {                
                        console.log(response);
                        $scope.status = status;
                    });*/
                    
                    
                    //alert (' ORAI '+data); return false;
            }
            
            
    });
</script>
@endsection