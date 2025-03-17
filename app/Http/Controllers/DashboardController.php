<?php

namespace App\Http\Controllers;

use App\Charts\TotalEmployeesByGroups;
use App\Models\User;
use App\Models\Employee;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TotalEmployeesByGroups $chart)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $totalEchelon = Occupation::count();

        $echelonCounts = Employee::join('occupations', 'employees.id', '=', 'occupations.employee_id')
        ->where('employees.user_id', $user_id)
        ->selectRaw("
            COALESCE(SUM(CASE WHEN occupations.echelon = 'I' THEN 1 ELSE 0 END), 0) as echelon_I,
            COALESCE(SUM(CASE WHEN occupations.echelon = 'II' THEN 1 ELSE 0 END), 0) as echelon_II,
            COALESCE(SUM(CASE WHEN occupations.echelon = 'III' THEN 1 ELSE 0 END), 0) as echelon_III,
            COALESCE(SUM(CASE WHEN occupations.echelon = 'IV' THEN 1 ELSE 0 END), 0) as echelon_IV,
            COALESCE(SUM(CASE WHEN occupations.echelon = 'V' THEN 1 ELSE 0 END), 0) as echelon_V
        ")
        ->first();

        $allEchelon = $totalEchelon;
        $totalEchelonI = $echelonCounts->echelon_I ?? 0;
        $totalEchelonII = $echelonCounts->echelon_II ?? 0;
        $totalEchelonIII = $echelonCounts->echelon_III ?? 0;
        $totalEchelonIV = $echelonCounts->echelon_IV ?? 0;
        $totalEchelonV = $echelonCounts->echelon_V ?? 0;

        $chart = new TotalEmployeesByGroups();
        $chart->buildChart();

        return view("dashboards.dashboard", compact('chart'),[
            "title"=> "Gov-Emp | Dashboard",
            "user"=> $user,
            "allEchelon"=> $allEchelon,
            "totalEchelonI"=> $totalEchelonI,
            "totalEchelonII"=> $totalEchelonII,
            "totalEchelonIII"=> $totalEchelonIII,
            "totalEchelonIV"=> $totalEchelonIV,
            "totalEchelonV"=> $totalEchelonV,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
