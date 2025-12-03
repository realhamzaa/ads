<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SettingsController extends Controller
{
    function index()
    {
        return view('settings');
    }
    public function uploadPeople(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        $file = $request->file('file');

        try {
            // تحميل الملف
            $spreadsheet = IOFactory::load($file->getPathName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // إذا الملف يحتوي على رؤوس أعمدة
            $header = array_map('strtolower', $rows[0]);
            unset($rows[0]);

            foreach ($rows as $row) {
                $data = array_combine($header, $row);

                Person::create([
                    'id' => $data['id'] ?? null,
                    'fullName'  => $data['fullName'] ?? null,
                    'idNumber' => $data['idNumber'] ?? null,
                    'phone' => $data['phone'] ?? null,
                    'address'  => $data['address'] ?? null,
                    'deliverd' => $data['deliverd'] ?? 0,
                    
                ]);
            }

            return back()->with('success', 'تم رفع قاعدة البيانات بنجاح!');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء رفع الملف: ' . $e->getMessage());
        }
    }
    
}
