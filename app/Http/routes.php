<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/test', function () {
    return view('website/Carpages.new-sell-page');
});
*/

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/logout', 'Home@logout');

Route::get('/test','test@watermark');
Route::get('/',
	['as'=>'home',
	'uses'=>'Home@index'
]);


Route::get('/getVehicleDetail', [
		'as' => 'vehicle_detail',
		'uses' =>'Home@vehicleDetail'
	]);


Route::get('/getAreaByCity','AdminVehicleController@getAreaByCity');

Route::get('/getManufactureByType','AdminVehicleController@getManufactureByType');

Route::get('/getModelByManufacture','AdminVehicleController@getModelByManufacture');

Route::get('/getModelVersionByModel','AdminVehicleController@getModelVersionByModel');

Route::middleware(['auth'])->group(function () {


//routs for admin panel///

Route::get('/admin','AdminController@index');

Route::get('/cpanel','AdminController@cpanel');

/////////Vehicle Ads Module /////////////////////////////////////
Route::get('/Vehicle',[
	'as'=>'adminAds',
	'uses'=>'AdminVehicleController@index'
]);

Route::get('/Vehicle/Add',[
	'as'=>'addVehicle',
	'uses'=>'AdminVehicleController@addView'
]);

Route::post('/Vehicle/Add',[
	'as'=>'insertVehicle',
	'uses'=>'AdminVehicleController@addVehicle'
]);



Route::get('deleteVehicle','AdminVehicleController@deleteVehicles');

Route::get('/EditVehicle/{id}', [
    'as' => 'editVehicle', 'uses' => 'AdminVehicleController@editVehicle']);


Route::post('/Vehicle', [
    'as' => 'updateVehicle', 'uses' => 'AdminVehicleController@updateVehicle']);

Route::get('/EditBike/{id}', [
    'as' => 'editBike', 'uses' => 'AdminVehicleController@editBike']);
 
 Route::post('/Vehcle', [
    'as' => 'updateBike', 'uses' => 'AdminVehicleController@updateBike']);

 Route::get('/EditOther/{vehicle_id}/{id}', [
    'as' => 'editOther', 'uses' => 'AdminVehicleController@editOther']);

Route::post('/Vehicl', [
    'as' => 'updateOther', 'uses' => 'AdminVehicleController@updateOther']);


Route::get('/EditNewVehicle/{id}', [
    'as' => 'editNewVehicle', 'uses' => 'AdminVehicleController@editNewVehicle']);

Route::post('/NewVehicle', [
    'as' => 'updateNewVehicle', 'uses' => 'AdminVehicleController@updateNewVehicle']);


Route::get('/CarDetail/{id}', [
    'as' => 'detailVehicle', 'uses' => 'AdminVehicleController@detailVehicle']);

Route::get('/Detail/{vehicle_id}/{id}', [
    'as' => 'detailOther', 'uses' => 'AdminVehicleController@detailOther']);

Route::get('/BikeDetail/{id}', [
    'as' => 'detailBike', 'uses' => 'AdminVehicleController@detailBike']);



Route::post('Vehicle/Search',[
	'as'=>'serachVehicle','uses'=>'AdminVehicleController@searchVehicle']);

Route::get('/featureVehicle','AdminVehicleController@featureVehicle');


Route::get('/verifiedAd','CarController@verifiedAd');
///////////////////new vehicles///////////////////////////
Route::get('/Admin/Vehicle/New', [
    'as' => 'newvehicle', 'uses' => 'AdminVehicleController@newVehicle']);

Route::get('/Admin/Vehicle/Add',[
	'as'=>'addNewVehicle',
	'uses'=>'AdminVehicleController@addNewView'
]);

Route::post('/Admin/Vehicle/Add',[
	'as'=>'insertNewVehicle',
	'uses'=>'AdminVehicleController@addNewVehicle'
]);

Route::get('/Admin/Vehicle/{id}', [
    'as' => 'detailNewVehicle', 'uses' => 'AdminVehicleController@detailNewVehicle']);




Route::get('/getEngineByType', 'AdminVehicleController@getEngineByType');

                  

////Admin Ads Accessory Module//////////////////////////

Route::get('/Ads/Accessory',[
	'as'=>'adminAdsAccessories',
	'uses'=>'AdminAccessoryController@index'
]);
Route::get('/Accessory/Add',[
	'as'=>'addAccessory',
	'uses'=>'AdminAccessoryController@addView'
]);
Route::get('/AccessoryDetail/{id}', [
    'as' => 'detailAccessory', 'uses' => 'AdminAccessoryController@detailAccessory']);

Route::get('/Accessory/Edit/{id}', [
    'as' => 'editAccessory', 'uses' => 'AdminAccessoryController@editAccessory']);

Route::post('/Accessory/Edit',[
    'as'=>'/updateAccessory',
    'uses'=>'AdminAccessoryController@updateAccessory'
]);

Route::get('/featureAccessory','AdminAccessoryController@featureAccessory');



/////VehicleType Module Admin/////// 

Route::get('/VehicleType',[
	'as'=>'adminVehicleType',
	'uses'=>'AdminVehicleTypeController@index'
]);

Route::get('/VehicleType/Add',[
	'as'=>'addVehicleType',
	'uses'=>'AdminVehicleTypeController@addView'
]);

Route::post('/VehicleType/Add',[
	'as'=>'insertVehicleType',
	'uses'=>'AdminVehicleTypeController@addVehicleType'
]);

Route::get('deleteVehicleType','AdminVehicleTypeController@deleteVehicleType');

Route::get('/EditVehicleType/{id}', [
    'as' => 'editVehicleType', 'uses' => 'AdminVehicleTypeController@editVehicleType']);

Route::get('/RemoveVehicleType/{_id}', [
    'as' => 'removeVehicleTypeImage', 'uses' => 'AdminVehicleTypeController@removeVehicleTypeImage']);

Route::post('/VehicleType', [
    'as' => 'updateVehicleType', 'uses' => 'AdminVehicleTypeController@updateVehicleType']);




///////// Manufacture Module Admin//////////

Route::get('/Manufacture',[
	'as'=>'manufacture',
	'uses'=>'AdminManufactureController@index'
]);

Route::get('/Manufacture/Add',[
	'as'=>'addManufacture',
	'uses'=>'AdminManufactureController@addView'
]);

Route::post('/Manufacture/Add',[
	'as'=>'insertManufacture',
	'uses'=>'AdminManufactureController@addManufacture'
]);

Route::get('deleteManufacture','AdminManufactureController@deleteManufacture');

Route::get('/EditManufacture/{id}', [
    'as' => 'editManufacture', 'uses' => 'AdminManufactureController@editManufacture']);

Route::post('/EditManufacture', [
    'as' => 'updateManufacture', 'uses' => 'AdminManufactureController@updateManufacture']);

Route::post('Manufacture/Search',[
	'as'=>'searchManufacture','uses'=>'AdminManufactureController@searchByVehicleType']);



////////Area Module Admin

Route::get('/CityArea',[
	'as'=>'area',
	'uses'=>'AdminAreaController@index'
]);

Route::get('/CityArea/Add',[
	'as'=>'addArea',
	'uses'=>'AdminAreaController@addView'
]);

Route::post('/CityArea',[
	'as'=>'insertArea',
	'uses'=>'AdminAreaController@addArea'
]);


Route::get('deleteArea','AdminAreaController@deleteArea');

Route::get('/EditArea/{id}', [
    'as' => 'editArea', 'uses' => 'AdminAreaController@editArea']);

Route::post('/EditArea/', [
    'as' => 'updateArea', 'uses' => 'AdminAreaController@updatearea']);

Route::post('CityArea/Search',[
	'as'=>'searchArea','uses'=>'AdminAreaController@searchByCity']);



////////City Module Admin////

Route::get('/City',[
	'as'=>'city',
	'uses'=>'AdminCityController@index'
]);


Route::get('/City/Add',[
	'as'=>'addCity',
	'uses'=>'AdminCityController@addView'
]);

Route::post('/City',[
	'as'=>'insertCity',
	'uses'=>'AdminCityController@addCity'
]);

Route::get('deleteCity','AdminCityController@deleteCity');


Route::get('/EditCity/{id}', [
    'as' => 'editCity', 'uses' => 'AdminCityController@editCity']);

Route::post('/EditCity/', [
    'as' => 'updateCity', 'uses' => 'AdminCityController@updateCity']);





/////////////////////Model Module Admin///////////////////

Route::get('/Model',[
	'as'=>'model',
	'uses'=>'AdminModelController@index'
]);


Route::get('/Model/Add',[
	'as'=>'addModel',
	'uses'=>'AdminModelController@addView'
]);

Route::post('/Model/Add',[
	'as'=>'insertModel',
	'uses'=>'AdminModelController@addModel'
]);

Route::get('deleteModel','AdminModelController@deleteModel');

Route::get('/getMakeByType','AdminModelController@getMakeByType');

Route::get('/EditModel/{id}', [
    'as' => 'editModel', 'uses' => 'AdminModelController@editModel']);


Route::post('/EditModel', [
    'as' => 'updateModel', 'uses' => 'AdminModelController@updateModel']);




Route::post('Model/Search',[
	'as'=>'searchModel','uses'=>'AdminModelController@searchByManufacture']);



/////////////////////Model Verion Module////////////////////////

Route::get('/ModelVersion',[
	'as'=>'model_version',
	'uses'=>'AdminModelVersionController@index'
]);

Route::get('/ModelVersion/Add',[
	'as'=>'addModelVersion',
	'uses'=>'AdminModelVersionController@addView'
]);

Route::post('/ModelVersion/Add',[
	'as'=>'insertModelVersion',
	'uses'=>'AdminModelVersionController@addModelVersion'
]);
Route::get('deleteModelVersion','AdminModelVersionController@deleteModelVersion');

Route::get('/EditModelVersion/{id}', [
    'as' => 'editModelVersion', 'uses' => 'AdminModelVersionController@editModelVersion']);

Route::post('/EditModelVersion', [
    'as' => 'updateModelVersion', 'uses' => 'AdminModelVersionController@updateModelVersion']);

Route::post('ModelVersion/Search',[
	'as'=>'searchModelVersion','uses'=>'AdminModelVersionController@searchByModel']);



/////////////////////Feature Module Admin///////////////////

Route::get('/Features',[
	'as'=>'feature',
	'uses'=>'AdminFeatureController@index'
]);


Route::get('/Features/Add',[
	'as'=>'addFeature',
	'uses'=>'AdminFeatureController@addView'
]);

Route::post('/Feature',[
	'as'=>'/insertFeature',
	'uses'=>'AdminFeatureController@addFeature'
]);

Route::get('deleteFeatures','AdminFeatureController@deleteFeatures');

Route::get('/EditFeature/{id}', [
    'as' => 'editFeature', 'uses' => 'AdminFeatureController@editFeature']);

Route::post('/EditFeature', [
    'as' => 'updateFeature', 'uses' => 'AdminFeatureController@updateFeature']);


Route::get('/RemoveFeature/{_id}', [
    'as' => 'removeFeatureImage', 'uses' => 'AdminFeatureController@removeFeatureImage']);

Route::post('Features/Search',[
	'as'=>'serachFeature','uses'=>'AdminFeatureController@searchFeatureByVehicleType']);


/////////CONDITION DETAIL MODULE//////


Route::get('/Condition_Detail',[
	'as'=>'conditionDetail',
	'uses'=>'AdminConditionDetailController@index'
]);


Route::get('/Condition_Detail/Add',[
	'as'=>'addConditionDetail',
	'uses'=>'AdminConditionDetailController@addView'
]);

Route::post('/Condition_Detail/Add',[
	'as'=>'insertConditionDetail',
	'uses'=>'AdminConditionDetailController@addConditionDetail'
]);


Route::get('deleteConditonDetail','AdminConditionDetailController@deleteConditionDetail');


Route::get('/ConditionDetail/Edit/{id}', [
    'as' => 'editConditionDetail', 'uses' => 'AdminConditionDetailController@editConditionDetail']);

Route::post('/ConditionDetail', [
    'as' => 'updateConditionDetail', 'uses' => 'AdminConditionDetailController@updateConditionDetail']);


//////////////////Moderator//////////////////////////

Route::get('/Moderator/Vehicles',[
	'as'=>'pendingRequestVehicles',
	'uses'=>'AdminModeratorController@index'
	]);

Route::get('/Moderator/Accessories',[
	'as'=>'pendingRequestAccessory',
	'uses'=>'AdminModeratorController@accessory'
	]);

Route::get('/Moderator/HotWheel',[
	'as'=>'pendingRequestHotWheel',
	'uses'=>'AdminModeratorController@hotWheel'
	]);

Route::get('/deleteVehicleModerator','AdminModeratorController@deleteVehicles');

Route::get('/deleteAccessoryModerator','AdminModeratorController@deleteAccessory');

Route::get('/updateRequest','AdminModeratorController@updateRequest');

Route::get('/updateRequestAccessory','AdminModeratorController@updateRequestAccessory');

Route::get('/updateRequestHotWheel','AdminModeratorController@updateRequestHotWheel');



//////////////////////////////////////////////////////////////////////////////////
/////////////////////ADMIN HOTWHEEL////////////////////////////////////////

Route::get('/Ads/HotWheel',[
	'as'=>'/AdminHotWheel',
	'uses'=>'AdminHotWheelController@index'
]);
Route::get('/HotWheel/Add',[
	'as'=>'addHotWheel',
	'uses'=>'AdminHotWheelController@addView'
]);
Route::get('/HotWheel/Detail/{id}', [
    'as' => 'detailHotWheel', 'uses' => 'AdminHotWheelController@detailHotWheel']);


//////////////////////////////////////////////////////////////////////////////////
///////////////////////ADMIN AUTO NEWS/////////////////////////////////////////

Route::get('/Admin/News',[
    'as'=>'/autoNews',
    'uses'=>'AdminNewsController@index'
]);

Route::get('/Admin/News/Add',[
    'as'=>'addNews',
    'uses'=>'AdminNewsController@addView'
]);
Route::post('/Admin/News/Add',[
    'as'=>'insertNews',
    'uses'=>'AdminNewsController@insertNews'   
]);

Route::get('/getModelByManufactureAdmin','AdminNewsController@getModelByManufacture');

Route::get('/Admin/News/Detail/{id}',[
    'as'=>'detailNews',
    'uses'=>'AdminNewsController@detailNews'
]);

Route::get('/removeFeaturedNews','AdminNewsController@removeFeaturedNews');
Route::get('/FeaturedNews','AdminNewsController@featuredNews');
Route::get('/inActiveNews', 'AdminNewsController@inActiveNews');
Route::get('/activeNews', 'AdminNewsController@activeNews');


////////////////////////////////////////////////////////////////////////////////
//////////////////////////Client PAnel///////////////////////////////////////

Route::get('/ActiveAds','AdminVehicleController@activeClientAds')->name('activeClientAds');

Route::get('/PendingAds','AdminVehicleController@pendingClientAds')->name('pendingClientAds');

Route::get('/RemovingAds','AdminVehicleController@removingClientAds')->name('removingClientAds');





});


Route::middleware(['auth','admin_role'])->group(function () {

    Route::get('/Shop','ShopController@index')->name('shop');

/////////////////////////SHOP//////////////////////////////////////////
//
//
//////////////////////CATEGORY ROUTES///////////////////////////////////////

Route::get('/Shop/Categories', 'ShopCategoryController@index')->name('categories');

Route::get('/Shop/Category/Add','ShopCategoryController@addView')->name('addNewCategory');

Route::post('/Shop/Category/Add','ShopCategoryController@insertNewCategory')->name('insertNewCategory');

Route::get('/Shop/Category/Edit/{id}','ShopCategoryController@editView')->name('editCategory');

Route::post('/Shop/Category/Edit/','ShopCategoryController@updateCategory')->name('updateCategory');

Route::get('/Shop/deleteCategories','ShopCategoryController@deleteCategories');



//////////////////////////////////DISCOUNTS/////////////////////////////

Route::get('/Shop/Discount','ShopDiscountController@index')->name('discount');

Route::get('/searchDiscounts','ShopDiscountController@searchDiscounts');

Route::get('/Shop/Discount/Add','ShopDiscountController@addView')->name('addNewDiscount');

Route::post('/Shop/Discount/Add','ShopDiscountController@addNewDiscount')->name('insertNewDiscount');

Route::get('/Shop/deleteDiscounts','ShopDiscountController@deleteDiscounts');

Route::get('/Shop/Discount/Edit/{id}','ShopDiscountController@editView')->name('editDiscount');

Route::post('/Shop/Discount/Edit/','ShopDiscountController@updateDiscount')->name('updateDiscount');

});



///////////////////////HOME PAGE /////////////////////////////////////

/////// models name by company
Route::get('/getModelByMake','Home@getModelByMake');

Route::get('/updateFeaturedAds','Home@updateFeaturedAds');




//////////////search button value update////
Route::get('updateSearchButton','Home@updateSearchButton');

Route::get('/Car/New',[
	'as'=>'addNewCar',
	'uses'=>'Home@addNewCar'
]);

Route::get('/Car/City/{id}',[
	'as'=>'/CarsByCity',
	'uses'=>'Home@carsByCity'
]);

Route::get('/Car/BodyType/{id}',[
	'as'=>'/CarsByBodyType',
	'uses'=>'Home@carsByBodyType'
]);

Route::get('/Car/Manufacture/{id}',[
	'as'=>'/CarsByManufacture',
	'uses'=>'Home@carsByManufacture'
]);

Route::get('/Featured Car/City/{id}',[
	'as'=>'/FeaturedCarsByCity',
	'uses'=>'Home@featuredCarsByCity'
]);



Route::get('/Car/Detail/{id}',[
	'as'=>'/GetCarDetails',
	'uses'=>'Home@carDetails'
]);




Route::match(['post','get'],'/Cars/Search',[
	'as'=>'/SearchHomeForm',
	'uses'=>'CarController@SearchHomeForm'
]);


Route::get('/submitEmail','Home@submitEmail');



/// search index form.///

Route::post('/used-cars/search',[
	'as'=>'searchindexform',
	'uses'=>'Home@getVehiclesByfilter'
]);

//Route::get('getVehicleDetail', 'Home@vehicleDetail')->name('profile');


Route::get('FeaturedAds/All',[
	'as'=>'/allFeaturedAds',
	'uses'=>'Home@allFeaturedAds'
]);










/*

/////////////////////////// Used CAR CONTROLLER//////////////

Route::get('/UsedCar',[
	'as'=>'usedCar',
	'uses'=>'UsedCarController@index'
]);


Route::get('/UsedCar/{col}/id/{type_id}', [
    'as' => 'searchVehiclesByBodyType', 'uses' => 'UsedCarController@searchVehiclesByGeneralFilter']);


Route::get('/UsedCar/{col}/id/{city_id}', [
    'as' => 'searchVehiclesByCity', 'uses' => 'UsedCarController@searchVehiclesByGeneralFilter']);



Route::get('/UsedCar/{col}/id/{make_id}', [
    'as' => 'searchVehiclesByMake', 'uses' => 'UsedCarController@searchVehiclesByGeneralFilter']);


Route::get('/UsedCar/{col}/id/{model_id}', [
    'as' => 'searchVehiclesByModel', 'uses' => 'UsedCarController@searchVehiclesByGeneralFilter']);




Route::post('/UsedCar/Search', [
    'as' => 'searchUsedVehiclesByAllFilters', 'uses' => 'UsedCarController@searchUsedVehiclesByAllFilters']);

*/

////////////////////////////////Car Controller//////////////////////////


Route::get('/Car',[
	'as'=>'carIndexPage',
	'uses'=>'CarController@index'
]);

Route::get('/Car/New',[
	'as'=>'carNewPage',
	'uses'=>'CarController@newCars'
]);

Route::post('/Car/New',[
	'as'=>'/searchNewCars',
	'uses'=>'CarController@searchNewCars'
]);

Route::get('/getNewVehiclesByMakeAndModel','CarController@getNewCarsByMakeAndModel');


Route::get('/Vehicle/Detail/{id}',[
	'as'=>'/GetNewVehicleDetails',
	'uses'=>'CarController@vehicleDetails'
]);

Route::get('/Car/Featured',[
	'as'=>'carFeaturedPage',
	'uses'=>'CarController@featuredCars'
]);


Route::get('/Car/Dealers',[
	'as'=>'carDealerPage',
	'uses'=>'CarController@DealersCar'
]);

Route::get('/Car/Dealers/{id}',[
	'as'=>'carDealerDetailPage',
	'uses'=>'CarController@DealersDetailCar'
]);

Route::post('/Car/Dealers',[
	'as'=>'searchCarDealers',
	'uses'=>'CarController@searchCarDealers'
]);



Route::get('/Car/Certified',[
	'as'=>'carCertfiedPage',
	'uses'=>'CarController@CartifiedCar'
]);

/*Route::get('/Car/temp',[
	'as'=>'/updateCars',
	'uses'=>'CarController@updateCars'
]);*/

Route::get('/updateCars','CarController@updateFeaturedCars');

Route::get('/updateAllCars','CarController@updateAllCars');

Route::get('/updateDealers','CarController@updateDealers');


Route::post('/Car/Search', [
    'as' => 'searchCarsByAllFilters', 'uses' => 'CarController@searchCarsByAllFilters']);

Route::post('/Car/Featured/Search', [
    'as' => 'searchFeaturedCarsByAllFilters', 'uses' => 'CarController@searchFeaturedCarsByAllFilters']);



Route::get('/Car/Sell', [
    'as' => '/sellCar', 'uses' => 'CarController@sellCar']);




Route::post('/insertCar','CarController@addCar');

Route::get('/sendVerificationCode','CarController@sendVerificationCode');

Route::get('/Car/City/{id}',[
	'as'=>'/getCarsByCity',
	'uses'=>'CarController@getCarsByCity'

]);

Route::get('/Car/BodyType/{id}',[
	'as'=>'/getCarsByBodyType',
	'uses'=>'CarController@getCarsByBodyType'

]);


Route::get('/searchAllCar','CarController@searchAllCar');

Route::get('/Car/Featured/City/{id}',[
	'as'=>'/FeaturedCarsByCity',
	'uses'=>'CarController@featuredCarsByCity'

]);

Route::get('/Car/Feature/Manufacture/{id}',[
	'as'=>'/FeaturedCarsByManufacture',
	'uses'=>'CarController@featuredCarsByManufacture'
]);






////////////////////////////////////////////////////////////
////////////////Bike CONTROLLER//////////////////////////////

Route::get('/Bike',[
	'as'=>'bike','uses'=>'BikeController@index']);


Route::get('/Bike/New',[
	'as'=>'newBike','uses'=>'BikeController@newBike']);

Route::post('/Bike/New',[
	'as'=>'/searchNewBikes','uses'=>'BikeController@searchNewBikes']);




Route::get('/Bike/New/Detail/{id}',[
	'as'=>'/GetNewBikeDetails',
	'uses'=>'BikeController@vehicleDetails'
]);


Route::get('/Bike/Featured',[
	'as'=>'featuredBike','uses'=>'BikeController@featuredBike']);


Route::get('/Bike/Dealer',[
	'as'=>'bikeDealer','uses'=>'BikeController@bikeDealer']);

Route::get('/Bike/Dealers/{id}',[
	'as'=>'bikeDealerDetailPage',
	'uses'=>'BikeController@DealersDetailBike'
]);

Route::post('/Bike/Dealer',[
	'as'=>'searchBikeDealers',
	'uses'=>'BikeController@searchBikeDealers'
]);


Route::get('/Bike/Sell',[
	'as'=>'sellBike','uses'=>'BikeController@sellBike']);

Route::get('/getBikeModelByManufacture','BikeController@getBikeModelByManufacture');


Route::post('/insertBike','BikeController@addBike');
Route::get('/updateFeaturedBikes','BikeController@updateFeaturedBikes');


Route::get('/Bike/Detail/{id}',[
	'as'=>'/GetBikeDetails',
	'uses'=>'BikeController@bikeDetails'
]);


Route::get('/Bike/Manufacture/{id}',[
	'as'=>'/getBikesByManufacture',
	'uses'=>'BikeController@getBikesByManufacture'
]);


Route::get('/updateAllBikes','BikeController@updateAllBikes');

Route::get('/Bike/City/{id}',[
	'as'=>'/getBikesByCity',
	'uses'=>'BikeController@getBikesByCity'
]);



Route::get('/Bike/Model/{id}',[
	'as'=>'/getBikesByModel',
	'uses'=>'BikeController@getBikesByModel'
]);

Route::post('/Bike/Search', [
    'as' => 'searchBikesByAllFilters', 'uses' => 'BikeController@searchBikesByAllFilters']);

Route::post('/Bike/featured/Search', [
    'as' => 'searchFeaturedBikesByAllFilters', 'uses' => 'BikeController@searchFeaturedBikesByAllFilters']);


Route::get('/Bike/Featured/City/{id}',[
	'as'=>'/FeaturedBikesByCity',
	'uses'=>'BikeController@featuredBikesByCity'

]);

Route::get('/Bike/Feature/Manufacture/{id}',[
	'as'=>'/FeaturedBikesByManufacture',
	'uses'=>'BikeController@featuredBikesByManufacture'
]);

Route::get('/getBikeModelByMake','BikeController@getModelByMake');

Route::get('/updateBikeDealers','BikeController@updateDealers');

/////////////////////////////////////////////////////////////////////////
/////////////////////////////ACCESSORIES/////////////////////////////////
/////////////////////////////////////////////////////////////////////////


Route::get('/getSubCategoryByCategory','AccessoriesController@updateSubCategory');

Route::get('/Accessories/Sell/',[
	'as'=>'/sellAccessory',
	'uses'=>'AccessoriesController@sellAccessories'
]);



Route::post('/insertAccessory','AccessoriesController@insertAccessory');

Route::get('/sendVerificationCodeAccessory','AccessoriesController@sendVerificationCode');

Route::get('/verifiedAdAccessory','AccessoriesController@verifiedAd');

Route::get('/Accessory',[
    'as'=>'/accessory',
    'uses'=>'AccessoriesController@index'
    
]);


Route::get('/Accessory/Featured',[
    'as'=>'/featuredAccessory',
    'uses'=>'AccessoriesController@FeaturdAccessory'
    
]);


Route::get('/updateFeaturedAccessories','AccessoriesController@updateFeaturedAccessories');

Route::get('/updateAllAccessories','AccessoriesController@updateAllAccessories');

Route::get('/Accessory/Detail/{id}',[
	'as'=>'/GetAccessoryDetails',
	'uses'=>'AccessoriesController@accessoryDetails'
]);


Route::get('/Accessory/City/{id}',[
	'as'=>'/getAccessoriesByCity',
	'uses'=>'AccessoriesController@getAccessoriesByCity'
]);


Route::post('/Accessory',[
	'as'=>'/searchAccessory',
	'uses'=>'AccessoriesController@searchAccessories'
]);


///////////////////////////////////////////////////////////////////////////
///////////////////////BUSSES CONTROLLER///////////////////////////////////

Route::get('/Buses',[
	'as'=>'/buses',
	'uses'=>'BusController@index'
]);

Route::get('/Buses/Sell',[
	'as'=>'/sellBus',
	'uses'=>'BusController@sellBus'
]);




Route::post('/insertBus','BusController@addBus');

Route::get('/updateAllBuses','BusController@updateAllBuses');


Route::get('/Buses/Detail/{id}',[
	'as'=>'/GetBusDetails',
	'uses'=>'BusController@busDetails'
]);

Route::post('/Bus/Search', [
    'as' => 'searchBusByAllFilters', 'uses' => 'BusController@searchBusByAllFilters']);



//////////////////////////////////////////////////////////////////////////////
/////////////////////Truck/////////////////////////////////////////////////


Route::get('/Trucks',[
	'as'=>'/trucks',
	'uses'=>'TruckController@index'
    ]);
Route::get('/Trucks/Sell',[
	'as'=>'/sellTruck',
	'uses'=>'TruckController@sellTruck'
    ]);


Route::post('/insertTruck','TruckController@addTruck');

Route::get('/updateAllTrucks','TruckController@updateAllTrucks'
        );
Route::get('/Trucks/Detail/{id}',[
	'as'=>'/GetTruckDetails',
	'uses'=>'TruckController@TruckDetails'
    ]);


Route::post('/Truck/Search', [
    'as' => 'searchTruckByAllFilters', 'uses' => 'TruckController@searchTruckByAllFilters']);



//////////////////////////////////////////////////////////////////////////////
/////////////////////FARMS/////////////////////////////////////////////////


Route::get('/Farms',[
	'as'=>'/farms',
	'uses'=>'FarmController@index'
    ]);
Route::get('/Farms/Sell',[
	'as'=>'/sellFarm',
	'uses'=>'FarmController@sellFarm'
    ]);


Route::post('/insertFarm','FarmController@addFarm');

Route::get('/updateAllFarms','FarmController@updateAllFarms'
        );
Route::get('/Farms/Detail/{id}',[
	'as'=>'/GetFarmDetails',
	'uses'=>'FarmController@FarmDetails'
]);

Route::post('/Farm/Search', [
    'as' => 'searchFarmByAllFilters', 'uses' => 'FarmController@searchFarmByAllFilters']);


//////////////////////////////////////////////////////////////////////////////
/////////////////////HEAVY MACHINERY/////////////////////////////////////////////////


Route::get('/Machinery',[
	'as'=>'/machinery',
	'uses'=>'MachineryController@index'
    ]);
Route::get('/Machinery/Sell',[
	'as'=>'/sellMachinery',
	'uses'=>'MachineryController@sellMachinery'
    ]);

Route::post('/insertMachinery','MachineryController@addMachinery');

Route::get('/updateAllMachinery','MachineryController@updateAllMachinery'
        );
Route::get('/Machinery/Detail/{id}',[
	'as'=>'/GetMachineryDetails',
	'uses'=>'MachineryController@MachineryDetails'
]);




/////////////////////////Account Login////////////////////////


Route::get('Login',[
    'as'=>'/login',
    'uses'=>'AccountController@loginForm'
]);
/*
Route::post('/SignupAccount','AccountController@signupAccount'
        );

Route::get('loginAccount','AccountController@loginAccount'
        );
*/
Route::auth();

Route::get('/home', 'HomeController@index');


///////////////////////////////////////////////////////////////////////////////
/////////////////////////MOST FAVOURITE VEHICLES//////////////////////////////
//////////////////////////////////////////////////////////////////////////////

Route::get('MFV/Car',[
    'as'=>'/mfvCar',
    'uses'=>'MostFeatureVehicleController@indexCar'
]);

Route::get('MFV/Add',[
    'as'=>'addnewVehicleMFV',
    'uses'=>'MostFeatureVehicleController@addView'
]);


Route::post('MFV/Add',[
    'as'=>'insertNewVehicleMFV',
    'uses'=>'MostFeatureVehicleController@addNew'
]);

Route::get('deleteMFV','MostFeatureVehicleController@deleteVehicles');

Route::get('/changeStatusMFV','MostFeatureVehicleController@changeStatus');



///////////////////////////HOT WHEELS//////////////////////////////////////

Route::get('HotWheels',[
    'as'=>'hotwheel',
    'uses'=>'HotWheelsController@index'
]);

Route::get('HotWheels/Post',[
    'as'=>'/post-hotwheel',
    'uses'=>'HotWheelsController@postVehicle'
]);

Route::post('/insertHotWheel','HotWheelsController@insertHotWheel');

Route::get('/getMakeByType','HotWheelsController@getMakeByType');

Route::get('/getModelByMakeHotWheel','HotWheelsController@getModelByMake');

Route::get('/verifiedAdHotWheel','HotWheelsController@verifiedAd');

Route::get('/sendVerificationCodeHotWheel','HotWheelsController@sendVerificationCode');

Route::get('/HotWheel/Details/{id}',[
    'as'=>'/GetHotWheelDetails','uses'=>'HotWheelsController@HotWheelDetail'
    
]);

Route::get('/updateAllHotWheels','HotWheelsController@updateAllHotWheels');





////////////////////////////////NEWS CONTROLLER/////////////////////////////////

Route::get('/News',[
    'as'=>'/news',
    'uses'=>'NewsController@index'
    
]);

Route::get('/News/Detail/{id}',[
    'as'=>'/GetNewsDetails',
    'uses'=>'NewsController@detailnews'
]);

Route::get('/updateAllNews','NewsController@updateAllNews');

//////////////////////////////////////////////////////////////////////////////////
///////////////////////////DEALER ACCOUNT////////////////////////////////////////

Route::get('/Dealer','DealerController@index');

Route::get('/Dealer/Account',[
    'as'=>'/dealeraccount',
    'uses'=>'DealerController@login'
]);

Route::get('/Admin/ManageDealers',[
    'as'=>'/dealers',
    'uses'=>'DealerController@allDealers'
]);

Route::get('/Admin/Dealer/{id}',[
    'as'=>'dealerDetail',
    'uses'=>'DealerController@detailDealer'
]
        );

Route::post('/Admin/Dealer',[
    'as'=>'updateDealer',
    'uses'=>'DealerController@updateDealer'
]
        );



