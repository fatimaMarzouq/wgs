<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $data['area']= DB::table('forms')->select('Area')->distinct()->get();
    $user = auth()->user();
    $data['codes'] = DB::table('forms')->select('AccountNumbeAuto')->distinct()->get();

    $data['userId']=$user->id;
    //dd($data['area']);
        return view('home',$data);
    }

    public function report()
    {

        $data['areaAccount'] = DB::table('capture_datas')->select('users.name as Username','capture_datas.AccountNumbeAuto as Unique Code','capture_datas.account as Acount Name','capture_datas.outlet as Outlet Name','capture_datas.area as Area','description_details.description as SKU Description','description_details.outletAvailable as Available at the outlet','description_details.drinksMenu as Listed in the Menu','description_details.price as Price per shot','description_details.visibleBar as Visible at the back bar','capture_datas.perfectServe as hendricks perfect serve','description_details.remarks')->join('description_details', 'capture_datas.id', '=', 'description_details.captureId')->join('users', 'capture_datas.userId', '=', 'users.id')->get();
      $data['areaAccount']= json_encode($data['areaAccount']);
        return view('report',$data);
    }

    public function images()
    {

        // $data['images'] = DB::table('capture_datas')->select('capture_datas.outlet','drinkmenus.image as drinkmenus_img','entrances.image as entrance_img','backbars.image as backbar_img')->join('drinkmenus', 'capture_datas.id', '=', 'drinkmenus.captureId')->join('entrances', 'capture_datas.id', '=', 'entrances.captureId')->join('backbars', 'capture_datas.id', '=', 'backbars.captureId')->distinct()->get();
        $data['images'] = DB::table('capture_datas')->select('capture_datas.outlet','capture_datas.id')->get();
     
        return view('images',$data);
    }

    public function images_details($id)
    {
        
        $data['images'] = DB::table('capture_datas')->select('capture_datas.outlet','drinkmenus.image as drinkmenus_img')->join('drinkmenus', 'capture_datas.id', '=', 'drinkmenus.captureId')->where('capture_datas.id',$id)->get();
    $data['images2'] = DB::table('capture_datas')->select('capture_datas.outlet','entrances.image as entrance_img')->join('entrances', 'capture_datas.id', '=', 'entrances.captureId')->where('capture_datas.id',$id)->get();
    $data['images3'] = DB::table('capture_datas')->select('capture_datas.outlet','backbars.image as backbar_img')->join('backbars', 'capture_datas.id', '=', 'backbars.captureId')->where('capture_datas.id',$id)->get();
     
         return view('images_details',$data);
    }

    public function areaAccount(Request $request)
    {

      $area = $request->area;
     $areaAccount = DB::table('forms')->select('AccountNumbeAuto')->distinct()->where('Area',$area)->get();
     
      echo json_encode($areaAccount);
            
    }
    public function allDetails(Request $request)
    {
      $code = $request->code;
     $allDetail = DB::table('forms')->select('Area','ParentAccount','AccountName')->distinct()->where('AccountNumbeAuto',$code)->get();
     
      echo json_encode($allDetail);
            
    }
     public function excel_download(Request $request)
    {

    $areaAccount = DB::table('capture_datas')->select('users.name as user','capture_datas.area','capture_datas.account','capture_datas.outlet','capture_datas.perfectServe','capture_datas.remarks','description_details.category','description_details.description','description_details.outletAvailable','description_details.drinksMenu','description_details.price','description_details.visibleBar')->join('description_details', 'capture_datas.id', '=', 'description_details.captureId')->join('users', 'capture_datas.userId', '=', 'users.id')->get();
      echo json_encode($areaAccount);
            
    }

    public function accountOutlet(Request $request)
    {

      $account = $request->account;
     $accountOutlet = DB::table('forms')->select('AccountName')->distinct()->where('AccountNumbeAuto',$account)->get();
     
      echo json_encode($accountOutlet);
            
    }

   public function compress(Request $request)
    {

        if($request->hasfile('gallery'))
         {
      foreach($request->file('gallery') as $file)
            {
          
                 $image = $file;
    $input['imagename'] = date('d-m-Y').$image->getClientOriginalName();
                $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
            }
        }

        if($request->hasfile('gallery2'))
         {
      foreach($request->file('gallery2') as $file)
            {
          
                 $image = $file;
    $input['imagename'] = date('d-m-Y').$image->getClientOriginalName();
                $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
            }
        }

        if($request->hasfile('gallery3'))
         {
      foreach($request->file('gallery3') as $file)
            {
          
                 $image = $file;
    $input['imagename'] = date('d-m-Y').$image->getClientOriginalName();
                $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
            }
        }
    
            
    }


    public function captureStore(Request $request)
    { 
        $capture_datas = [];
             $capture_datas[] = [

            'userId' => $request->userId,
            'area' => $request->area,
            'account' => $request->account,
            'outlet' => $request->outlet,  
            'perfectServe' => $request->perfectServe, 
            'AccountNumbeAuto' => $request->AccountNumbeAuto, 
            'remarks' => $request->remarks,           
           
            ];
            //echo '<pre>';print_r($capture_datas);

            DB::table('capture_datas')->insert($capture_datas);
            $capture_datasId= DB::table('capture_datas')->max('id');
            $description_details = [];
             for($i=0;$i<count($request['description']);$i++){
             $description_details[] = [

            'captureId' => $capture_datasId,
            'category' => $request['category'][$i],
            'description' => $request['description'][$i],
            'outletAvailable' => $request['outletAvailable'][$i],
            'drinksMenu' => $request['drinksMenu'][$i],
            'price' => $request['price'][$i],            
            'visibleBar' => $request['visibleBar'][$i], 
            'remarks' => $request['desc_remarks'][$i], 

            ];
        }

        
       if($request->hasfile('gallery'))
         {
            $files = [];$drinkmenus=[];
            foreach($request->file('gallery') as $file)
            {
                $name = date('d-m-Y').$file->getClientOriginalName();
                //$file->move(public_path('images'), $name);  
                $files[] = $name; 

        //          $image = $file;
        // $input['imagename'] = time().'.'.$image->extension();
        //         $destinationPath = public_path('/images');
        // $img = Image::make($image->path());
        // $img->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
        // $files[] = $input['imagename'];
            }
            for($j=0;$j<count($request->file('gallery'));$j++){
            $drinkmenus[] = [

            'captureId' => $capture_datasId,
            'image' => $files[$j],
           
            ];
        }
            //echo '<pre>';print_r($drinkmenus);exit;
        DB::table('drinkmenus')->insert($drinkmenus);
         }

         if($request->hasfile('gallery2'))
         {

            $files2 = [];$backbars=[];
            foreach($request->file('gallery2') as $file2)
            {
                $name = date('d-m-Y').$file2->getClientOriginalName();
                //$file2->move(public_path('images'), $name);  
                $files2[] = $name; 

        //         $image = $file2;
        // $input['imagename'] = time().'.'.$image->extension();
        //         $destinationPath = public_path('/images');
        // $img = Image::make($image->path());
        // $img->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
        // $files2[] = $input['imagename']; 
            }
            for($k=0;$k<count($request->file('gallery2'));$k++){
            $backbars[] = [

            'captureId' => $capture_datasId,
            'image' => $files2[$k],
           
            ];
        }
            //echo '<pre>';print_r($backbars);exit;
        DB::table('backbars')->insert($backbars);
         }

         if($request->hasfile('gallery3'))
         {

            $files3 = [];$entrances=[];
            foreach($request->file('gallery3') as $file3)
            {
                $name = date('d-m-Y').$file3->getClientOriginalName();
                //$file3->move(public_path('images'), $name);  
                $files3[] = $name; 

        //         $image = $file3;
        // $input['imagename'] = time().'.'.$image->extension();
        //         $destinationPath = public_path('/images');
        // $img = Image::make($image->path());
        // $img->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
        // $files3[] = $input['imagename'];  
            }
            for($k=0;$k<count($request->file('gallery3'));$k++){
            $entrances[] = [

            'captureId' => $capture_datasId,
            'image' => $files3[$k],
           
            ];
        }
            //echo '<pre>';print_r($backbars);exit;
        DB::table('entrances')->insert($entrances);
         }
    
        DB::table('description_details')->insert($description_details);

        return redirect()->route('home')->with('success', "Successfully Saved");
    }


    // public function fillCode(){
    //  $forms=DB::table('forms')->select('AccountName','AccountNumbeAuto')->get();
    //  foreach($forms as $form ){
    //     DB::table('capture_datas')->where('outlet', $form->AccountName)->update(array('AccountNumbeAuto' => $form->AccountNumbeAuto));  

    //  }

    // }


}
