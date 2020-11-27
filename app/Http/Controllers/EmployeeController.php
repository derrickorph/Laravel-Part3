<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Excel;

class EmployeeController extends Controller
{
    //Datatables functions
    public function index(EmployeeDataTable $datatable)
    {
        return $datatable->render('employee-datatable');
    }

    public function addEmployee()
    {
        $employees=[
            ['name'=>'Derrick','email'=>'derrick@gmail.com','phone'=>'123456789','salary'=>'100000000','department'=>'Informatique'],
            ['name'=>'Ariane','email'=>'ariane@gmail.com','phone'=>'987456321','salary'=>'20000','department'=>'Marketing'],
            ['name'=>'Rosaire','email'=>'rosaire@gmail.com','phone'=>'123456780','salary'=>'150005','department'=>'Comptabilité'],
            ['name'=>'Orphée','email'=>'orphee@gmail.com','phone'=>'258963147','salary'=>'98652','department'=>'Ingénieur'],
            ['name'=>'Kaled','email'=>'kaled@gmail.com','phone'=>'0214568989','salary'=>'265789','department'=>'Comptabilité'],
        ];
        Employee::insert($employees);
        return "Records are inserted!";
    }
    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport,'employeelist.xlsx');
    }
    public function exportIntoCsv()
    {
        return Excel::download(new EmployeeExport,'employeelist.csv');
    }


    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);
        return back()->with('file_imported','File are imported successfully!');
    }
}
