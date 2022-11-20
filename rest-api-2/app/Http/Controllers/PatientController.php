<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //method index - get all resource
    public function index()
    {
        $patients = Patient::all();

        if($patients){
            $data = [
                'message'=>'Get All Resource',
                'data'=> $patients
            ];
            return response()->json($data, 200);
        } else{
            $data = [
                'message'=>'Data is empty',
            ];

            return response()->json($data, 200);
        }
    }

    // method store - add resource
    public function store(Request $request){
        $validatedDate = $request->validate([
            'name'=>'required',
            'phone'=>'numeric|required',
            'address'=>'required',
            'status'=>'required',
            'in_date_at'=>'date|required',
            'out_date_at'=>'date|required'
        ]);

        $patients = Patient::create($validatedDate);

        $data =[
            'message'=>'Resource is added successfully',
            'data'=>$patients,
        ];

        return response()->json($data, 201);
    }

    // method show - get detail resource
    public function show($id)
    {
        $patients = Patient::find($id);

        if ($patients){
            $data = [
                'message'=>'Get detail resource',
                'data'=>$patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message'=>'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }

    // method put - update resource
    public function update(Request $request, $id)
    {
        $patients = Patient::find($id);

        if ($patients){
            $input = [
                'name'=>$request->name ?? $patients->name,
                'phone'=>$request->phone ?? $patients->phone,
                'address'=>$request->address ?? $patients->address,
                'status'=>$request->status ?? $patients->status,
                'in_date_at'=>$request->in_date_at ?? $patients->in_date_at,
                'out_date_at'=>$request->out_date_at ?? $patients->out_date_at
            ];

            $patients->update($input);

            $data = [
                'message'=>'Resource is update successfully',
                'data'=>$patients
            ];

            return response()->json($data, 200);
        }
    }

    // method delete - delete resource
    public function destroy($id)
    {
        $patients = Patient::find($id);

        if ($patients){
            $patients->delete();

            $data = [
                'message' => 'Resource is delete successfully'
            ];

            return response()->json($data, 200);
        }else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    // method get - search resource by name
    public function search($name)
    {
        $patients = Patient::where("name", "like", "%" .$name . "%")->get();

        if ($patients){
            $data = [
                'message'=> 'Get searched resource',
                'data'=> $patients,
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message'=> 'Resource not found',
            ];
            return response()->json($data, 404);
        }
    }

    // method get - get resource positive
    public function positive()
    {
        $patients = Patient::where("status", "positive")->get();

        if ($patients){
            $data = [
                'message'=> 'Get positive resource',
                'data'=> $patients
            ];
            return response()->json($data, 200);
        }
    }

    // method get - get resource recovered
    public function recovered()
    {
        $patients = Patient::where("status", "recovered")->get();

        if ($patients){
            $data = [
                'message'=> 'Get recovered resource',
                'data'=> $patients
            ];
            return response()->json($data, 200);
        }
    }

    // method get - get resource dead
    public function dead()
    {
        $patients = Patient::where("status", "dead")->get();

        if ($patients){
            $data = [
                'message'=> 'Get dead resource',
                'data'=> $patients
            ];
            return response()->json($data, 200);
        }
    }
}
