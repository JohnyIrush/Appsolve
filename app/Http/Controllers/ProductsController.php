<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DynamicCms\Applications;

use App\Version;
use App\Services;

use Illuminate\Support\Facades\Auth;

use App\User;

use DB;


use App\DynamicCms\Customers;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = Applications::all();
        return response()->json($apps,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $app = new Applications();
       $app->name = $request->name;
       $app->image = $request->image;
       $app->logo = $request->logo;
       $app->price = $request->price;
       $app->discount = $request->discount;  
       $app->location = $request->location;
       $app->description = $request->description;
       $app->save();

       return redirect('http://127.0.0.1:8000/#/apps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = applications::find($id);
        return response()->json($app,200);
    }
    /**
     * Application services
    */
      public function services()
      {
        $services = Services::all();
        return response()->json($services,200);  
      }
    /**
     * Application versions
    */
    public function versions()
    {
        $versions = Version::all();
        return response()->json($versions,200);   
    }      

    /**
     * setversion
    */
    public function setversion($appid,$versionid,$versionimage)
    {
        DB::update('UPDATE applications_version SET version_image=' . $versionimage . 'WHERE applications_id=='  . $appid . 'AND version_id==' . $versionid);
        $application = Applications::find($appid);
        $application->versions()->attach($versionid); 
    }
    /**
     * setservice php artisan make:migration add_version_image_to_applications_version_table --table=applications_version
    */
    public function setservice($versionid,$serviceid)
    {
        $version = Version::find($versionid);
        $version->services()->attach($serviceid);
    } 
    /**
     * buy app
    */ 

    public function buyapp($app){
          $app = Applications::find($app);
          $version_services = [];
          $version_service = [];
          $versions = [];
          $counter = 0;
          foreach($app->versions as $version) {
              
            foreach($version->services as $service) {
                array_push($version_services,$service);
            }
            /**
             * store all services of
             *  each version in an 
             * array called version_service
            */
            
            array_push($version_service,$version_services);
            /**
             * store all versions
             * with its services 
             * in one array called
             * $version
            */
            array_push($versions,$version->version);
                
             if (sizeof($version_services)>=2) {
                array_pop($version_services);
             }
            for ($i=0; $i <sizeof($version_services);$i++) { 
                array_pop($version_services);
            }
    

        }
        

              /**
               * Store product details
               * together with
               *  its versions
              */
              array_push($versions,'product');
              array_push($version_service,array($app));
            /**
             * fill selction array
             * with the version
             *  name as key
            */     
       return response()->json(array_combine($versions,$version_service) ,200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
         $this->validate($request,[ 
         'name' => 'required|string|min:5',
         'image' => 'required',
         //'logo' => 'required',
         'price' => 'required',
         'discount' => 'required',
         'location' => 'required',
         'description' => 'required|string|min:100|max:500'
           ]);
        
        $app = Applications::find($id);
        $app->name = $request->name;
        $app->image = $request->image;
        $app->logo = $request->logo;
        $app->location = $request->location;
        $app->price = $request->price;
        $app->discount = $request->discount;
        $app->description = $request->description;
        $app->save();
 
        return redirect('http://127.0.0.1:8000/#/apps');         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = Applications::find($id);
        $app->delete();
    }

    /**
     * Sync selected application
     * with buyer
     * and store customer details
    */
    public function buyerApp($appid,$versionid){
        $user= Auth::user();

        $user->applications()->attach($appid);
        $user->versions()->attach($versionid);

        return response()->json($user,200);

    }
}
