<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\ExtaDocs;
use App\Model\RequiredDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\TypeOfAppointment;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Exports\CustomerExport;
use App\Model\Appointment;
use App\Model\ModtAppointment;
use App\Model\Occupation;
use App\Model\SecondaryApplicant;
use App\Model\Timeslot;
use App\User;
class ApiController extends Controller
{
    public $successStatus = 200;

    public function typeOfAppointments(Request $request)
    {
        $user = Auth::user();
        $user_id =  $user->id;
        $types = TypeOfAppointment::all();
        $output = array();
        foreach ($types as $value) {
            $types = DB::table('appointment')
                    ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                    ->where([['appointment.agent_id', '=', $user_id], ['appointment.appointmenttype_id', '=', $value->id], ['appointment.status', '=', 1]])
                    ->count();

            $data = array('count' => $types, 'type_name' => $value->appointment_name, 'type_id' => $value->id );
            array_push($output, $data);
        }
        return response()->json(['success' => $output], $this->successStatus);

    }
    public function newAppointments(Request $request)
    {
        $user = Auth::user();
        $user_id =  $user->id;
        $input = $request->all();
        $type_id = $input['typeId'];

        $agents = DB::table('appointment')
                    ->join('users', 'users.id', '=', 'appointment.agent_id')
                    ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                    ->join('time_slots', 'time_slots.id', '=', 'appointment.timeslot_id')
                    ->where([['appointment.agent_id', '=', $user_id],['appointment.status', '=', 1],['appointment.appointmenttype_id', '=', $type_id]] )
                    ->select(   'customers.id as cust_id', 'customers.cust_name',
                                'customers.cust_phone', 'customers.cust_address', 'customers.occupation_id', 'appointment.appointment_date', 'appointment.appointmenttype_id',
                                'time_slots.time_slot', 'appointment.id as appointment_id' )
                    ->get();

        return response()->json(['success' => $agents], $this->successStatus);
    }

    public function kycDetails(Request $request)
    {
        $input = $request->all();
        $id = $input['cust_id'];
        $type_id = $input['ap_type_id'];
        $occupation_id = $input['occupation_id'];
        $applicant_type = $input['applicant_type'];
        $extra_docs = [];
        $documents = [];
        if($type_id  == 1 ||  $type_id  == 2){
            if($applicant_type!='secondary'){
                $cust_docs = Customer::where('id', '=', $id)->get();
               
                if(isset($cust_docs[0]) && $cust_docs[0]['docs_ids'] !=''){
                    $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                    $documents = RequiredDoc::where('occupation_id', '=', $occupation_id )->whereNotIn('id', $existingdocs)->get();
                }else{
                    $documents = RequiredDoc::where('occupation_id', '=', $occupation_id )->get();
                }
            }
        }
        
         
        elseif($type_id  == 3) {
            
                $cust_docs = Customer::where('id', '=', $id)->get();
                if(isset($cust_docs[0]) && $cust_docs[0]['docs_ids'] !=''){
                    $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                    $documents = RequiredDoc::where('type_of_doc', '=', 'Bank Visit')->whereNotIn('id', $existingdocs)->get();
                }else{
                    $documents = RequiredDoc::where('type_of_doc', '=', 'Bank Visit')->get();
                }
            
        }  
        elseif($type_id==7){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0]) && $cust_docs[0]['docs_ids'] !=''){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'Submit Demand')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'Submit Demand')->get();
            }
        }
        elseif($type_id==8){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0]) && $cust_docs[0]['docs_ids'] !=''){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Drop')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Drop')->get();
            }
        }
        elseif($type_id==9){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0]) && $cust_docs[0]['docs_ids'] !=''){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Pickup')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Pickup')->get();
            }
        }  
        elseif($type_id  == 5 || $type_id  == 6) {
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0]) && $cust_docs[0]['docs_ids'] !=''){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'Disbursement')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'Disbursement')->get();
            }
        }else{
            $documents = [];
        }
        if($type_id  == 4){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0]) && $cust_docs[0]['extradocs'] !=''){
                $existingdocs = explode(",", $cust_docs[0]['extradocs']);
                $extra_docs = ExtaDocs::where('customer_id', '=', $id)->whereNotIn('id', $existingdocs)->get();
            }else{
                $extra_docs = ExtaDocs::where('customer_id', '=', $id)->get();
            }
           
        }  

        //$extra_docs = ExtaDocs::where('customer_id', '=', $id)->get();
        $sec_cust = [];
        if($input['applicant_type']=='secondary'){
          $secondary = SecondaryApplicant::where('id','=', $id)->get();
                         
            if($secondary){
                $i=0;
                foreach($secondary as $second){
                $sec_cust[$i]['secondary_customer_id'] =  $second->id;
                $sec_cust[$i]['name'] =  $second->name;
                // $sec_appointment = Appointment::where('customer_id','=',$second->id)
                // ->where('applicant_type','=','secondary')->first();
                if(isset($second->docs_ids) != ''){
                        $existingdocs_sec = explode(",", $second->docs_ids);
                        $sec_cust[$i]['documents']= RequiredDoc::where('occupation_id', '=', $second->occupation_id )->whereNotIn('id', $existingdocs_sec)->get();
                }else{
                        $sec_cust[$i]['documents']= RequiredDoc::where('occupation_id', '=', $second->occupation_id )->get();
                }
                    $i++;
                }

            }
        }
        if($input['applicant_type']=='both'){
            $secondary = SecondaryApplicant::where('customer_id','=', $id)->get();
                           
              if($secondary){
                  $i=0;
                  foreach($secondary as $second){
                  $sec_cust[$i]['secondary_customer_id'] =  $second->id;
                  $sec_cust[$i]['name'] =  $second->name;
                //   $sec_appointment = Appointment::where('customer_id','=',$second->id)
                //   ->where('applicant_type','=','secondary')->first();
                  if(isset($second->docs_ids) != ''){
                          $existingdocs_sec = explode(",", $second->docs_ids);
                          $sec_cust[$i]['documents']= RequiredDoc::where('occupation_id', '=', $second->occupation_id )->whereNotIn('id', $existingdocs_sec)->get();
                  }else{
                          $sec_cust[$i]['documents']= RequiredDoc::where('occupation_id', '=', $second->occupation_id )->get();
                  }
                      $i++;
                  }
  
              }
          }

        // if(!empty($extra_docs)){
        //     if(empty($documents)){
        //         $documents = $extra_docs;
        //     }
        // }

        if(!empty($documents) || !empty($sec_cust) || !empty($extra_docs)){
           
            if(isset($documents)!=''){
                $count = count($documents);
                for($i = 0; $i < $count; $i++){
                    $documents[$i]['checked'] = false;
                }
            }
            // if(isset($sec_cust[$i]['documents'])!=''){
            //     $count = count($sec_cust[$i]['documents']);
            //     for($i = 0; $i < $count; $i++){
            //         $sec_cust[$i]['checked'] = false;
            //     }
            // }
           
            $msg = [
                'status' => 1,
                'customer' =>[
                    'primary' => $documents,
                    'extra_docs'=>$extra_docs,
                    'secondary_customer' => $sec_cust 
                ]
                
            ];
            return response()->json( $msg, $this->successStatus);
        }


        $msg = [
            'status' => 0,
            'message' => 'No Data Found'
        ];
        return response()->json( $msg, $this->successStatus);

    }

    public function submitApplication(Request $request)
    {
        $input = $request->all();

        $doc_ids        = $input['document_ids'];
        $cust_id        = $input['customer_id'];
        $appointment_id = $input['appointment_id'];
        $appointment_type = $input['appointment_type'];
       // $sec_cust_id    = $input['secondary_customer_id'];
       // $sec_doc_ids    = $input['secondary_customer_docs'];
        $comment = $input['comment'];


        $user = Auth::user();
        $user_id =  $user->id;

        try{
            $send_docs = explode(',',$doc_ids);
            if($appointment_type == 'secondary'){
                $customer = SecondaryApplicant::find($cust_id);
            }
            if($appointment_type != 'secondary'){
                $customer = Customer::find($cust_id);
            }
            $req_documents = RequiredDoc::where('occupation_id', '=', $customer->occupation_id)->get();
            if($req_documents){
                foreach($req_documents as $req_doc){
                    $required_doc[] = $req_doc->id;
                }
                
            }
            $appointments = Appointment::find($appointment_id);
                  
                if($appointment_type == 'primary' || $appointment_type == 'modt'){
                   $collected_docs =  explode(',',$appointments->docs_ids);
                }
                if($appointment_type == 'secondary' ){
                   $collected_docs =  explode(',',$customer->docs_ids);
                }
                if($appointment_type !='both'){
                    $docs_to_update = array_diff($send_docs, $collected_docs);
            
                    if(!empty($docs_to_update)){
                            $docs_to_update_val = implode(',',$docs_to_update);
                            $appointments->docs_ids .= $appointments->docs_ids ? ','.$docs_to_update_val: $docs_to_update_val ;
                            $appointments->comments = $comment;
                            $appointments->status = 0;
                            $appointments->save();
                        
                            
                              $customer->docs_ids .=  $customer->docs_ids ? ','.$docs_to_update_val : $docs_to_update_val;
                              $customer->save();
                           
                    }
                    $final_docs = explode(',',$appointments->docs_ids);
                    $missing_docs = array_diff($required_doc, $final_docs);
                    if(empty($missing_docs)){
                            $appointments->status = 0;
                            $appointments->save();
                    }
                }
                if($appointment_type == 'both'){
                    if($input['customer_id'] != ''){
                            $collected_docs =  explode(',',$appointments->docs_ids);
                            $docs_to_update = array_diff($send_docs, $collected_docs);
                            if(!empty($docs_to_update)){
                                    $docs_to_update_val = implode(',',$docs_to_update);
                                    $appointments->docs_ids .= $appointments->docs_ids ? ','.$docs_to_update_val: $docs_to_update_val ;
                                    $appointments->comments = $comment;
                                    $customer->docs_ids .=  $customer->docs_ids ? ','.$docs_to_update_val : $docs_to_update_val;
                                   
                            }
                            $appointments->status = 0;
                            $appointments->save();
                            $customer->save();

                            $final_docs = explode(',',$appointments->docs_ids);
                            $missing_docs = array_diff($required_doc, $final_docs);
                            if(empty($missing_docs)){
                                    $appointments->status = 0;
                                    $appointments->save();
                            }
                    }
                    if($input['second_customer_id']!=''){
                        foreach($input['second_customer_id'] as $secondCustId){

                            $sCustomer = SecondaryApplicant::find($secondCustId);
                            $collected_docs = explode(',',$sCustomer->docs_ids);
                            $send_docs = explode(',',$input['second_doc_ids'][$secondCustId]);
                            $docs_to_update = array_diff($send_docs, $collected_docs);
                            if(!empty($docs_to_update)){
                                $docs_to_update_val = implode(',',$docs_to_update);
                                $sCustomer->docs_ids .=  $sCustomer->docs_ids ? ','.$docs_to_update_val : $docs_to_update_val;
                                $appointments->status = 0;
                                $sCustomer->save();
                            }
                            // $final_docs = explode(',',$sCustomer->docs_ids);
                            // $missing_docs = array_diff($required_doc, $final_docs);
                            // if(empty($missing_docs)){
                            //         $appointments->status = 0;
                            //         $appointments->save();
                            // }
                        }
                    }

                }
               
            
            return response()->json(['status'=>1,'message' => "Documents Submitted Successfully!"], $this->successStatus);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $this->successStatus);
        }

    }

    public function submitExtraDocs(Request $request){
        $input = $request->all();
        $doc_ids        = $input['document_ids'];
        $cust_id        = $input['customer_id'];
        $appointment_id = $input['appointment_id'];

        $customer = Customer::find($cust_id);
        if($customer){
            $send_docs = explode(',',$doc_ids);
            $collected_docs =  explode(',',$customer->extradocs);
            $docs_to_update = array_diff($send_docs, $collected_docs);
            if(!empty($docs_to_update)){
                $docs_to_update_val = implode(',',$docs_to_update);
                $customer->extradocs .=  $customer->extradocs ? ','.$docs_to_update_val : $docs_to_update_val;
                $customer->save();
            }
        }
        $appointments = Appointment::find($appointment_id);
        if($appointments){
            $appointments->status = 0;
            $appointments->save();
        }
       
        return response()->json(['status'=>1,'message' => "Extra Documents Submitted Successfully!"], $this->successStatus);
       
    }



    public function closedAppointments(Request $request)
    {
        $user = Auth::user();
        $user_id =  $user->id;

        $customers = Customer::where('emp_id', '=', $user_id)->get();
        $output = array();

        foreach($customers as $cust){
            $count = DB::table('appointment')
                        ->where([['appointment.customer_id', '=', $cust->id], ['appointment.status', '=', 0]])
                        ->count();
            $agents = DB::table('appointment')
                        ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                        ->where([['appointment.agent_id', '=', $user_id],['appointment.status', '=', 0], ['appointment.customer_id', '=', $cust->id]] )
                        ->select('customers.id as cust_id', 'appointment.id', 'customers.cust_name' )
                        ->get();

            if(isset($agents[0]->cust_name) && $count > 0){
                $data = array('count' => $count,
                                'cust_name' => $agents[0]->cust_name, 'cust_id' => $agents[0]->cust_id);
                array_push($output, $data);
            }
        }

        return response()->json(['success' => $output], $this->successStatus);

    }

    public function modtAppointments(Request $request){
        $agent_id = $request->user_id;
        $appointments = ModtAppointment::where('agent_id','=',$agent_id)
        ->where('status','=',1)->get(); 
        $result = [];
        if(!$appointments->isEmpty()){
            
            $i=0;
            // echo '<pre>';
            // print_r($appointments);//exit;
            foreach($appointments as $appointment){

                 $customer = Customer::where('id','=',$appointment->customer_id)->first();
                 $occupation = Occupation::where('id','=', $customer->occupation_id)->first();

                
               
                $result[$i]['customer_id'] = $customer->id;
                $result[$i]['name'] = $customer->cust_name;
                $result[$i]['mobile'] = $customer->cust_phone;
                $result[$i]['occupation_id'] = $occupation->id;
                $result[$i]['occupation_name'] = $occupation->occupation_name;
                $result[$i]['appointment_date'] = $appointment->appointment_date;
                $result[$i]['applicant_type'] = $appointment->applicant_type;
                $result[$i]['appointment_id'] = $appointment->id;
                $result[$i]['start_flag'] = "true";
                if($appointment->start_time != ''){
                    $result[$i]['start_flag'] = "false";
                }

                $i++;
            }
            $msg =[
                'status' => 1,
                'data' => $result
            ];
            return response()->json($msg);
        }

        $msg = [
            'status' => 0,
             'message' => 'Data not found'
        ];
        return response()->json($msg);
    }

    public function appointmentDetails(Request $request){

        $user_id = $request->user_id;
        $appointmenttype_id = $request->appointmenttype_id;

        $appointments = Appointment::where('agent_id','=',$user_id)
        ->where('appointmenttype_id','=',$appointmenttype_id)
        ->where('status','=',1)->get();  
        // echo '<pre>';
        // print_r($appointments);
        // exit; 
        $result = [];
        
        if(!$appointments->isEmpty()){
            
            $i=0;
            // echo '<pre>';
            // print_r($appointments);//exit;
            foreach($appointments as $appointment){
               // $result[$i]['secondary']=[];
                $timeSlot = Timeslot::find($appointment->timeslot_id);
                if($appointment->applicant_type!='secondary'){
                    $customer = Customer::where('id','=',$appointment->customer_id)->first();
                    $occupation = Occupation::where('id','=', $customer->occupation_id)->first();
                    $result[$i]['customer_id'] = $customer->id;
                    $result[$i]['name'] = $customer->cust_name;
                    $result[$i]['mobile'] = $customer->cust_phone;
                    $result[$i]['occupation_id'] = $occupation->id;
                    $result[$i]['occupation_name'] = $occupation->occupation_name;
                    $result[$i]['appointment_date'] = $appointment->appointment_date;
                    $result[$i]['appointment_time'] = $timeSlot->time_slot;
                    $result[$i]['applicant_type'] = $appointment->applicant_type;
                    $result[$i]['appointment_id'] = $appointment->id;
                    $result[$i]['start_flag'] = "true";
                    if($appointment->start_time != ''){
                        $result[$i]['start_flag'] = "false";
                    }
                    $result[$i]['secondary']=[];
                }
                if($appointment->applicant_type=='secondary'){
                   // echo $appointment->customer_id;exit;
                    $sec_customer = SecondaryApplicant::where('id','=',$appointment->second_customer_id)->first();
                    $occupation = Occupation::where('id','=', $sec_customer->occupation_id)->first();
                    $result[$i]['customer_id'] = $sec_customer->id;
                    $result[$i]['name'] = $sec_customer->name;
                    $result[$i]['mobile'] = $sec_customer->phone;
                    $result[$i]['occupation_id'] = $occupation->id;
                    $result[$i]['occupation_name'] = $occupation->occupation_name;
                    $result[$i]['appointment_date'] = $appointment->appointment_date;
                    $result[$i]['appointment_time'] = $timeSlot->time_slot;
                    $result[$i]['applicant_type'] = $appointment->applicant_type;
                    $result[$i]['appointment_id'] = $appointment->id;
                    $result[$i]['start_flag'] = "true";
                    if($appointment->start_time != ''){
                        $result[$i]['start_flag'] = "false";
                    }
                    $result[$i]['secondary']=[];
                }
                if($appointment->applicant_type=='both'){
                        if($appointment->second_customer_id!=''){
                            
                            $sCustIds = explode(',',$appointment->second_customer_id);
                            $secondary = SecondaryApplicant::whereIn('id',$sCustIds)->get();
                            
                            if($secondary){
                                foreach($secondary as $ss => $second){
                                    $sec_occupation = Occupation::where('id','=', $second->occupation_id)->first();
                                  
                                    $result[$i]['secondary'][$ss]['customer_id'] = $second->id;
                                    $result[$i]['secondary'][$ss]['name'] = $second->name;
                                    $result[$i]['secondary'][$ss]['mobile'] = $second->phone;
                                    $result[$i]['secondary'][$ss]['occupation_id'] = $second->occupation_id;
                                    $result[$i]['secondary'][$ss]['occupation_name'] = $sec_occupation->occupation_name;
                                    $result[$i]['secondary'][$ss]['appointment_date'] = $appointment->appointment_date;
                                    $result[$i]['secondary'][$ss]['applicant_time'] = $timeSlot->time_slot;
                                    $result[$i]['secondary'][$ss]['applicant_type'] = $appointment->applicant_type;
                                    $result[$i]['secondary'][$ss]['appointment_id'] = $appointment->id;
                                    $result[$i]['secondary'][$ss]['start_flag'] = "true";
                                    if($appointment->start_time != ''){
                                        $result[$i]['start_flag'] = "false";
                                    }
                                }
                            }
                                
                        }
                }
              
                $i++;
            }
            $msg =[
                'status' => 1,
                'data' => $result
            ];
            return response()->json($msg);
        }

        $msg = [
            'status' => 0,
             'message' => 'Data not found'
        ];
        return response()->json($msg);
       
    }

    public function saveLatLong(Request $request){
        $input = $request->all();

        $appointment_id = $input['appointment_id'];
        $latitude = $input['latitude'];
        $longitude = $input['longitude'];
        $type = $input['type'];

        $appointment = Appointment::find($appointment_id);
        if(!$appointment){
            return response()->json(['status'=>0,'message' => "Data Not Found"], 404);
        }
        if($type == 'start'){
            $appointment->latitude = $latitude;
            $appointment->longitude = $longitude;
            $appointment->start_time = date('Y-m-d H:i');
        }
        if($type == 'stop'){
            $appointment->stop_lat = $latitude;
            $appointment->stop_long = $longitude;
            $appointment->stop_time = date('Y-m-d H:i');
        }
        
        if($appointment->save()){
           return response()->json(['status'=>1,'message' => "Latitude and Longitude updated Successfully!"], $this->successStatus);
        }

    }

    public function appointmentHistory(Request $request){

        $appointments = Appointment::where('status','=',0)->get();   

        if(!$appointments->isEmpty()){
            $result = [];
            $i = 0;
            foreach($appointments as $appointment){

                 $customer = Customer::where('id','=',$appointment->customer_id)->first();
                 
                 $occupation = Occupation::where('id','=', $customer->occupation_id)->first();
                 $agentName = User::where('id','=',$appointment->agent_id)->first()->name;
                 $result[$i]['cust_type'] = 'primary';
                 if($appointment->applicant_type == 'secondary'){
                     $secondary = SecondaryApplicant::where('customer_id','=',$appointment->customer_id)->first();
                     $customer = Customer::where('id','=',$secondary->id)->first();
                     $occupation = Occupation::where('id','=', $secondary->occupation_id)->first();
                     $result[$i]['cust_type'] = 'secondary';
                 }

                $result[$i]['name'] = $customer->cust_name;
                $result[$i]['mobile'] = $customer->cust_phone;
                $result[$i]['occupation_id'] = $occupation->id;
                $result[$i]['occupation_name'] = $occupation->occupation_name;
                $result[$i]['appointment_date'] = $appointment->appointment_date;
                $result[$i]['agent_name'] = $agentName;

                $i++;
            }
            $msg =[
                'status' => 1,
                'data' => $result
            ];
            return response()->json($msg);
        }

        $msg = [
            'status' => 0,
             'message' => 'Data not found'
        ];
        return response()->json($msg);
    }

    
}
