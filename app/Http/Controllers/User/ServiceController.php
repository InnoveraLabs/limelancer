<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceDescriptionStoreRequest;
use App\Http\Requests\Service\ServiceStoreRequest;
use App\Models\Category;
use App\Models\Package;
use App\Models\Service;
use App\Models\ServiceDescription;
use App\Models\ServiceExtra;
use App\Models\ServiceGallery;
use App\Models\ServicePricing;
use App\Models\ServiceRequirement;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index($service_id = '')
    {
        if($service_id) {
            $service = Service::find($service_id);
        }else{
            $service = $this->getColumnTable('services');
        }
        $categories = Category::with('children')->get();

        return view('gigs.gigs_overview', compact('service', 'categories'));
    }

    /**
     * @return Manage all Services
     */
    public function manageGigs()
    {
        $user = Auth::user()->id;
        $services = Service::with('pricing', 'descriptions', 'requirements', 'galleries')
            ->where('user_id', $user)->get();
        return view('manage_gigs', compact('services'));
    }

    /***
     * @param $gig_slug
     * @return UserServiceDetails
     */
    public function userServiceDetails($gig_slug)
    {	$user = @Auth::user()->id;
		//print_r($user); exit;
        $serviceDetails = Service::with('category', 'subcategory', 'pricing.package', 'descriptions', 'requirements', 'galleries', 'user', 'serviceextra')
            ->where('gig_slug', $gig_slug)->first();
		$services = Service::with('pricing', 'descriptions', 'requirements', 'galleries')
								->where('user_id', $user)->where('status', 1)->get();
	    // dd($services);
        return view('gigs_detail', compact('serviceDetails','services'));

    }

    /***
     * @param ServiceStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(ServiceStoreRequest $request)
    {
		
        $service_id = $request->input('service_id');
        $request->validated();
        if ($service_id) {
            $service = Service::find($service_id);
            $success_message = 'Gig updated successfully';
        } else {
            $service = new Service();
            $success_message = 'Gig Created successfully';

            //create slug only while add
            $gig_slug = $request->input('title');
            $gig_slug = \Str::slug($gig_slug, '-');

            $results = DB::select(DB::raw("SELECT count(*) as total from services where gig_slug REGEXP '^{$gig_slug}(-[0-9]+)?$' "));

            $finalSlug = ($results['0']->total > 0) ? "{$gig_slug}-{$results['0']->total}" : $gig_slug;
            $service->gig_slug = $finalSlug;
        }

        $service->title = $request->input('title');
        $service->user_id = Auth::user()->id;
        $service->category_id = $request->input('category_id');
        $service->sub_category_id = $request->input('sub_category_id');
        $service->tags = $request->input('tags');
        $service->save();

        $service_id = $service->id;

        return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_pricing/'.$service_id, '200');

    }

    public function userServicePricing($service_id = '')
    {
        $revisions = range(0, 10);
		$revisions=array(1,2,3,4,5,6,7,8,9,10,"Unlimited");
		// print_r($a); exit;
        $days = range(1, 30);
        $service = Service::find($service_id);
		
		$pricing = DB::table('service_pricings') 
					->where('service_id',$service_id) 
					->orderBy('package_id', 'asc')	
                    ->get();
		//print_r($pricing); exit;
        $packages = Package::all();

        return view('gigs.gigs_pricing', compact('service', 'packages', 'revisions', 'days','pricing'));
    }

    public function userServicePricingSave(Request $request, ServicePricing $servicePricing)
    {		  
		$remove = array(0);
        $result = array_diff($request['package_id'], $remove);
		 
        $service_id = $request->input('service_id');
		if(count($result)>1){
			$request->validate([
			'package_name.0' => 'required',
            'description.0' => 'required',
            'delivery_date.0' => 'required',
            'price.0' => 'required',
			'package_name.1' => 'required',
			'description.1' => 'required',
            'delivery_date.1' => 'required',
            'price.1' => 'required',
			'package_name.2' => 'required',
			'description.2' => 'required',
            'delivery_date.2' => 'required',
            'price.2' => 'required',
        ]);
		} else {	
        $request->validate([
			'package_name.0' => 'required',
            'description.0' => 'required',
            'delivery_date.0' => 'required',
            'price.0' => 'required',
        ]);
		}
		$pricing = DB::table('service_pricings') 
					->where('service_id',$service_id)  
                    ->get();
		if (!empty($pricing)){
		  DB::table('service_pricings')->where('service_id',  $service_id)->delete();	
		}	
		
        foreach ($request->package_id as $key => $package) {
            if($package === "0"){
                break;
            } else { 
                $servicePricing->updateOrCreate([
                    'service_id' => $service_id,
                    'package_id' => $request->package_id[$key],					
					'package_name' => $request->package_name[$key],
                    'description' => $request->description[$key],
                    'delivery_date' => $request->delivery_date[$key],
					'is_source' => $request->is_source[$key],
                    'revisions' => $request->revisions[$key],
                    'price' => $request->price[$key],
                ])->save(); 
                $success_message = 'Pricing added SuccessFully';
            }
        } 
	
		$extra = DB::table('service_extras') 
					->where('service_id',$service_id)  
                    ->get();
		if (!empty($extra)){
		DB::table('service_extras')->where('service_id',  $service_id)->delete();	
		} 
        $data = request(['extra_title', 'extra_desc', 'extra_price', 'fast_delivery']);
        if($data) {

            foreach ($data['extra_title'] as $key => $feature) {
                ServiceExtra::create([
                    'service_id' => $service_id,
                    'extra_title' => $request->extra_title[$key],
                    'extra_desc' => $request->extra_desc[$key],
                    'extra_price' => $request->extra_price[$key],
                    'fast_delivery' => $request->fast_delivery[$key],
                ]);

            }
        }


        return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_description/'.$service_id, '200');

    }

    public function userServiceDescription($service_id = '')
    {
        $service = Service::find($service_id);

        return view('gigs.gigs_description', compact('service'));

    }

    public function userServiceDescriptionSave(ServiceDescriptionStoreRequest $request, ServiceDescription $serviceDescription)
    {
        $service_id = $request->input('service_id');
		$one = DB::table('service_descriptions')
				->where('service_id',$service_id)
				->get();
		if(count($one)>0){
			$allData = request()->all();
            unset($allData['_token']);
			DB::table('service_descriptions')->where('service_id',$allData['service_id'])->update($allData);
		} else{
			
        $serviceDescription->create($request->all());
		}
        $success_message = 'Description Added SuccessFully';

        return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_requirement/'.$service_id, '200');

    }

    public function userServiceRequirement($service_id = '')
    {
        $service = Service::find($service_id);
		
        return view('gigs.gigs_requirement', compact('service'));
    }
	
	public function userServiceDelete($req_id = '')
    {
		 $serviceData =  DB::table('service_requirements')
                        ->where('id',$req_id) 
                        ->first();
        $service_id = $serviceData->service_id;
		
		if($serviceData->req_options==2){
			DB::table('service_requirements_options')->where('requirement_id',  $req_id)->delete();
		}
		DB::table('service_requirements')->where('id',  $req_id)->delete();
		
	   $success_message = 'Data Deleted SuccessFully';	
	   
       return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_requirement/'.$service_id, '200');
    }
	
	

    public function userServiceRequirementSave($service_id = '', Request $request, ServiceRequirement $serviceRequirement)
    {
			
			if(@$request['option_data']){
				$service_id = $request->input('service_id');
		
				$request->validate([
					'buyer_instruction' => 'required',
					'req_options' => 'required'
				]);		
			
				$instruction_data['service_id'] = $request['service_id'];
				$instruction_data['buyer_instruction'] = $request['buyer_instruction'];
				$instruction_data['req_options'] = $request['req_options'];
				DB::table('service_requirements')->insert($instruction_data);
				$last_id = DB::getPdo()->lastInsertId();	
				
				if(!empty($request['option_data'])){
					for($i=0;$i<count($request['option_data']); $i++){				
						$optiondata['service_id'] = $service_id;
						$optiondata['requirement_id'] = $last_id;
						$optiondata['option_id'] = $i;
						$optiondata['option_name'] = $request['option_data'][$i];
						DB::table('service_requirements_options')->insert($optiondata);			
					}
					DB::table('service_requirements_options')->where('service_id',  $service_id)->whereNull('option_name')->delete();
				} 
				$success_message = 'Description Added SuccessFully';
			} else {
				
				$getData = DB::table('service_requirements')
						   ->where('service_id',  $request['service_id'])	
						   ->get();
						   
			    foreach ($getData as $rowdata){				
					$allData['buyer_instruction'] =  $request['buyer_instruction'.$rowdata->id] ;
					$allData['req_options'] =  $request['req_options'.$rowdata->id] ;		
					DB::table('service_requirements')->where('id',$rowdata->id)->update($allData);
					if($request['req_options'.$rowdata->id]==2){
						DB::table('service_requirements_options')->where('requirement_id',  $rowdata->id)->delete();
						if(!empty(@$request['option_datak'.$rowdata->id])){							
							for($i=0;$i<count(@$request['option_datak'.$rowdata->id]); $i++){				
								$optiondata['service_id'] =  $request['service_id'];
								$optiondata['requirement_id'] = $rowdata->id;
								$optiondata['option_id'] = $i;
								$optiondata['option_name'] = $request['option_datak'.$rowdata->id][$i];
								DB::table('service_requirements_options')->insert($optiondata);			
							}
							
						} 							
						if(!empty(@$request['option_datap'.$rowdata->id])){
							for($i=0;$i<count(@$request['option_datap'.$rowdata->id]); $i++){				
								$optiondata['service_id'] =  $request['service_id'];
								$optiondata['requirement_id'] = $rowdata->id;
								$optiondata['option_id'] = $i;
								$optiondata['option_name'] = $request['option_datap'.$rowdata->id][$i];
								DB::table('service_requirements_options')->insert($optiondata);			
							}						
						} 	
					DB::table('service_requirements_options')->where('service_id',  $service_id)->whereNull('option_name')->delete();
					}
				}	
				$service_id	 = $request['service_id'];			
				$success_message = 'Description Updated SuccessFully';
			}
			
		
		return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_requirement/'.$service_id, '200');

    }

    public function userServiceGallery($service_id = '', Request $request)
    {
        $service = Service::find($service_id);
        return view('gigs.gigs_gallery', compact('service'));
    }

    public function userServiceGallerySave(Request $request, ServiceGallery $serviceGallery)
    {
       
	   $service_id = $request->input('service_id');		
		if($request->hasFile('service_image_one')){
			$request->validate([
				'service_image_one' => 'required'
			]);
		}
        if($request->hasFile('service_image_one')){
			$one = DB::table('service_galleries')
				   ->where('service_id',$service_id)
				   ->where('file_type',1)
				   ->where('file_number',1)
				   ->first();	
			if(empty($one))	{
				
			$imageName = '1'.time().'.'.request()->service_image_one->getClientOriginalExtension();
            request()->service_image_one->move(public_path('service'), $imageName);            
            $serviceGallery->featured_image = $imageName;
            $serviceGallery->service_id = $service_id;
			$serviceGallery->file_type = 1;
			$serviceGallery->file_number = 1;
            $serviceGallery->save();
			} else {
				$filename = public_path('service').'/'.$one->featured_image;
				File::delete($filename);
				$imageName = '1'.time().'.'.request()->service_image_one->getClientOriginalExtension();
				request()->service_image_one->move(public_path('service'), $imageName);	
				
				$serviceGallery6['featured_image'] = $imageName;
				$serviceGallery6['service_id'] = $service_id;
				$serviceGallery6['file_type'] = 1;
				$serviceGallery6['file_number'] = 1;     
				DB::table('service_galleries')->where('service_id',$service_id)->where('file_type',1)->where('file_number',1)->update($serviceGallery6);
				
			}
        }
		
		if($request->hasFile('service_image_two')){
			$two = DB::table('service_galleries')
					->where('service_id',$service_id)
					->where('file_type',1)
					->where('file_number',2)
					->first();
			if(empty($two))	{
			$imageName = '2'.time().'.'.request()->service_image_two->getClientOriginalExtension();
            request()->service_image_two->move(public_path('service'), $imageName);	
            
            $serviceGallery2['featured_image'] = $imageName;
            $serviceGallery2['service_id'] = $service_id;
			$serviceGallery2['file_type'] = 1;
			$serviceGallery2['file_number'] = 2;            
			DB::table('service_galleries')->insert($serviceGallery2);
			} else {
				$filename = public_path('service').'/'.$two->featured_image;
				File::delete($filename);
				$imageName = '2'.time().'.'.request()->service_image_two->getClientOriginalExtension();
				request()->service_image_two->move(public_path('service'), $imageName);	
				
				$serviceGallery7['featured_image'] = $imageName;
				$serviceGallery7['service_id'] = $service_id;
				$serviceGallery7['file_type'] = 1;
				$serviceGallery7['file_number'] = 2;     
				DB::table('service_galleries')->where('service_id',$service_id)->where('file_type',1)->where('file_number',2)->update($serviceGallery7);
				
			}
        }
		
		if($request->hasFile('service_image_three')){
			$three = DB::table('service_galleries')
					->where('service_id',$service_id)
					->where('file_type',1)
					->where('file_number',3)
					->first();
			if(empty($three))	{		
			$imageName = '3'.time().'.'.request()->service_image_three->getClientOriginalExtension();
            request()->service_image_three->move(public_path('service'), $imageName);            
            $serviceGallery3['featured_image'] = $imageName;
            $serviceGallery3['service_id'] = $service_id;
			$serviceGallery3['file_type'] = 1;
			$serviceGallery3['file_number'] = 3;            
			DB::table('service_galleries')->insert($serviceGallery3);
			} else {
				$filename = public_path('service').'/'.$three->featured_image;
				File::delete($filename);
				$imageName = '3'.time().'.'.request()->service_image_three->getClientOriginalExtension();
				request()->service_image_three->move(public_path('service'), $imageName);	
				
				$serviceGallery8['featured_image'] = $imageName;
				$serviceGallery8['service_id'] = $service_id;
				$serviceGallery8['file_type'] = 1;
				$serviceGallery8['file_number'] = 3;     
				DB::table('service_galleries')->where('service_id',$service_id)->where('file_type',1)->where('file_number',3)->update($serviceGallery8);
							
			}
        }
		
		if($request->hasFile('proposal_vedio')){
			$four = DB::table('service_galleries')
					->where('service_id',$service_id)
					->where('file_type',2)
					->where('file_number',1)
					->first();
			if(empty($four)){		
			$imageName = '4'.time().'.'.request()->proposal_vedio->getClientOriginalExtension();
            request()->proposal_vedio->move(public_path('service'), $imageName);	
            
            $serviceGallery4['featured_image'] = $imageName;
            $serviceGallery4['service_id'] = $service_id;
			$serviceGallery4['file_type'] = 2;
			$serviceGallery4['file_number'] = 1;
			DB::table('service_galleries')->insert($serviceGallery4);
			} else {
				$filename = public_path('service').'/'.$four->featured_image;
				File::delete($filename);
				$imageName = '4'.time().'.'.request()->proposal_vedio->getClientOriginalExtension();
				request()->proposal_vedio->move(public_path('service'), $imageName);	
				
				$serviceGallery9['featured_image'] = $imageName;
				$serviceGallery9['service_id'] = $service_id;
				$serviceGallery9['file_type'] = 2;
				$serviceGallery9['file_number'] = 1;     
				DB::table('service_galleries')->where('service_id',$service_id)->where('file_type',2)->where('file_number',1)->update($serviceGallery9);
				
			}
        }
		
		if($request->hasFile('proposal_pdf1')){
			$five = DB::table('service_galleries')
					->where('service_id',$service_id)
					->where('file_type',3)
					->where('file_number',1)
					->first();
			if(empty($five)){			
			$imageName = '5'.time().'.'.request()->proposal_pdf1->getClientOriginalExtension();
            request()->proposal_pdf1->move(public_path('service'), $imageName);	

            $serviceGallery5['featured_image'] = $imageName;
            $serviceGallery5['service_id'] = $service_id;
			$serviceGallery5['file_type'] = 3;
			$serviceGallery5['file_number'] = 1;
			DB::table('service_galleries')->insert($serviceGallery5);
			} else {
				$filename = public_path('service').'/'.$five->featured_image;
				File::delete($filename);
				$imageName = '5'.time().'.'.request()->proposal_pdf1->getClientOriginalExtension();
				request()->proposal_pdf1->move(public_path('service'), $imageName);	
				
				$serviceGallery10['featured_image'] = $imageName;
				$serviceGallery10['service_id'] = $service_id;
				$serviceGallery10['file_type'] = 3;
				$serviceGallery10['file_number'] = 1;     
				DB::table('service_galleries')->where('service_id',$service_id)->where('file_type',3)->where('file_number',1)->update($serviceGallery10);
				
			}
        }
		
		if($request->hasFile('proposal_pdf2')){
			$six = DB::table('service_galleries')
					->where('service_id',$service_id)
					->where('file_type',3)
					->where('file_number',2)
					->first();
			if(empty($six)){			
			$imageName = '6'.time().'.'.request()->proposal_pdf2->getClientOriginalExtension();
            request()->proposal_pdf2->move(public_path('service'), $imageName);	

            $serviceGallery6['featured_image'] = $imageName;
            $serviceGallery6['service_id'] = $service_id;
			$serviceGallery6['file_type'] = 3;
			$serviceGallery6['file_number'] = 2;
			DB::table('service_galleries')->insert($serviceGallery6);
			} else {
				$filename = public_path('service').'/'.$six->featured_image;
				File::delete($filename);
				$imageName = '6'.time().'.'.request()->proposal_pdf2->getClientOriginalExtension();
				request()->proposal_pdf2->move(public_path('service'), $imageName);	
				
				$serviceGallery11['featured_image'] = $imageName;
				$serviceGallery11['service_id'] = $service_id;
				$serviceGallery11['file_type'] = 3;
				$serviceGallery11['file_number'] = 2;     
				DB::table('service_galleries')->where('service_id',$service_id)->where('file_type',3)->where('file_number',2)->update($serviceGallery11);
				
			}
        }

        $success_message = 'Image Added SuccessFully';
        return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_publish/'.$service_id, '200');

    }

    public function userServicePublish($service_id = '')
    {
        $service = Service::find($service_id);
        return view('gigs.gigs_publish', compact('service'));
    }

    public function userServicePublishSave(Request $request)
    {
        $service_id = $request->input('service_id');

        $service = Service::findOrfail($service_id);

        if($service->status === 0){

            $service->status = 1;
        }
        $service->save();

        return redirect()->route('user.profile');

    }
	
	public function userServicePaused($service_id = '')
    {
		
	   $service = Service::findOrfail($service_id);
		
		if($service->status === 1){

            $service->status = 2;
        } else {
			$service->status = 1;
		}
        $service->save();
		
        return redirect()->route('user.profile'); 
    }
	
	
	public function userGalleryRemove($service_id = '')
    {
		
		$service_data = DB::table('service_galleries') 
					  ->where('featured_image',$service_id)  
                      ->first();
					  
		$filename = public_path('service').'/'.$service_id;
	    File::delete($filename);	  
		
		DB::table('service_galleries')->where('featured_image',  $service_id)->delete();		
		
		$success_message = 'Image Deleted SuccessFully';
        return $this->return_output('flash', 'success', $success_message, 'seller/services/gigs_gallery/'.$service_data->service_id, '200');
    }

    public function tagsList(Request $request){

        $query = $request->get('query', '');
        $data = Tag::where('name', 'Like','%'.$query.'%')->get();
        return response()->json($data);
    }

    public function userGalleryUpload(Request $request)
    {
        if($request->image){
			
            $data = $request->image;
            $name = $request->name;

            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);
            $imageName = pathinfo($name, PATHINFO_FILENAME) . "_" . time() . '.png';
            $allowed = array('jpeg','jpg','gif','tiff','png','webp');
            $file_extension = pathinfo($name, PATHINFO_EXTENSION);

            if(!in_array($file_extension,$allowed)){
                echo "";
            }else{
                if(uploadToLocal("service/$imageName","",$data)){

                    $data = array();
                    $data['name'] = $imageName;
                    $data['url'] = "/app/public/service/$imageName";
                    echo json_encode($data);

                }
            }

        }
    }

}
