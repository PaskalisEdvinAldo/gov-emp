<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Occupation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("employees.newemployee", [
            "title" => "Gov-Emp | Add New Employee"
            // "employess"=> Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "nip"=> "nullable|digits:18",
            "fullname"=> "nullable|string|max:500",
            "birth_place"=> "nullable|string|max:255",
            "address"=> "nullable|string|max:1000",
            "birth_date"=> "date|required",
            "gender"=> "required|in:Male,Female",
            "group"=> "string|required",
            "echelon"=> "nullable|string|max:10",
            "position"=> "nullable|string|max:255",
            "duty_station"=> "nullable|string|max:255",
            "religion"=> "string|required",
            "work_unit"=> "nullable|string|max:500",
            "phone" => "nullable|digits_between:10,13|unique:employees,phone",
            "tax_number"=> "nullable|digits:16|unique:employees,tax_number",
            "profile_picture"=> "nullable|image|file|mimes:jpeg,png,jpg|max:1024"
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('employee.create')->withErrors($validator)->withInput();
        }

        $filePath = null;

        if ($request->hasFile('profile_picture')) {
            $originalFileName = $request->file('profile_picture')->getClientOriginalName();
            $filePath = $request->file('profile_picture')->storeAs('employees-profile-picture', $originalFileName,'public');
        }

        $user = Auth::user();

        $employee = Employee::create([
            'user_id'=> $user->id,
            'fullname'=> $request->fullname,
            'birth_place'=> $request->birth_place,
            'address'=> $request->address,
            'birth_date'=> $request->birth_date,
            'gender'=> $request->gender,
            'religion'=> $request->religion,
            'phone'=> $request->phone,
            'tax_number'=> $request->tax_number,
            'profile_picture'=> $filePath
        ]);

        Occupation::create([
            'employee_id'=> $employee->id,
            'nip'=> $request->nip,
            'group'=> $request->group,
            'echelon'=> $request->echelon,
            'position'=> $request->position,
            'duty_station'=> $request->duty_station,
            'work_unit'=> $request->work_unit
        ]);

        return redirect()->route('employee.show', $employee->id)->with('success','Employee Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $user_id = Auth::user()->id;
        $employee = Employee::where('user_id', $user_id)->get();

        return view("employees.employeelist", [
            "title" => "Gov-Emp | Employee Lists",
            "users" => User::all(),
            "user" => $user_id,
            "employees" => Employee::all(),
            "employee" => $employee
        ]);
    }

    public function showProfile($filename)
    {
        $filePath = storage_path('app/public/employees-profile-picture/' . $filename);
        return response()->file($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id, $id)
    {
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $employee = Employee::where('user_id', $user_id)
                            ->with('occupation')
                            ->firstOrFail();

        // $profile = $user ? $user->profile : null;

        return view('employees.editemployee', compact('employee'),[
            'users' => User::all(),
            "user" => $user,
            'employees' => Employee::all(),
            'employee'=> $employee,
            'occupation'=> $employee->occupation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            "nip"=> "nullable|digits:18",
            "fullname"=> "nullable|string|max:500",
            "birth_place"=> "nullable|string|max:255",
            "address"=> "nullable|string|max:1000",
            "birth_date"=> "date|required",
            "gender"=> "required|in:Male,Female",
            "group"=> "string|required",
            "echelon"=> "nullable|string|max:10",
            "position"=> "nullable|string|max:255",
            "duty_station"=> "nullable|string|max:255",
            "religion"=> "string|required",
            "work_unit"=> "nullable|string|max:500",
            "phone" => "nullable|digits_between:10,13|unique:employees,phone,".$employee->id,
            "tax_number"=> "nullable|digits:16|unique:employees,tax_number,".$employee->id,
            "profile_picture"=> "nullable|image|file|mimes:jpeg,png,jpg|max:1024"
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('employee.edit', ['user_id'=>$employee->user_id, 'id'=>$employee->id])->withErrors($validator)->withInput();
        }

        $filePath = $employee->profile_picture;

        if ($request->hasFile('profile_picture')) {
            if ($filePath) {
                Storage::delete('public/' . $filePath);
            }

            $originalFileName = $request->file('profile_picture')->getClientOriginalName();
            $filePath = $request->file('profile_picture')->storeAs('employees-profile-picture', $originalFileName, 'public');
        }

        $employee->update([
            'fullname' => $request->fullname ?? $employee->fullname,
            'birth_place' => $request->birth_place ?? $employee->birth_place,
            'address' => $request->address ?? $employee->address,
            'birth_date' => $request->birth_date ?? $employee->birth_date,
            'gender' => $request->filled('gender') ? $request->gender : $employee->gender,
            'religion' => $request->religion ?? $employee->religion,
            'phone' => $request->filled('phone') ? $request->phone : $employee->phone,
            'tax_number' => $request->filled('tax_number') ? $request->tax_number : $employee->tax_number,
            'profile_picture' => $filePath
        ]);

        $occupation = $employee->occupation;
        $occupation->update([
            'nip' => $request->filled('nip') ? $request->nip : $occupation->nip,
            'group' => $request->group ?? $occupation->group,
            'echelon' => $request->echelon ?? $occupation->echelon,
            'position' => $request->position ?? $occupation->position,
            'duty_station' => $request->duty_station ?? $occupation->duty_station,
            'work_unit' => $request->work_unit ?? $occupation->work_unit
        ]);

        return redirect()->route('employee.show', $employee->id)->with('success','Employee Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $id)
    {
        $employee = Employee::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();

        $employee->delete();
        return redirect()->route('employee.show',$employee->id)->with('success','Employee Data Deleted Successfully!');
    }
}
