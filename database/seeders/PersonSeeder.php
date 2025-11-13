<?php

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        $dir = storage_path('app/csv_chunks'); // ضع الملفات هناك
        $files = File::files($dir);

        $totalInserted = 0;

        foreach ($files as $file) {
            $handle = fopen($file->getPathname(), 'r');
            $header = fgetcsv($handle); // تخطي العنوان

            $inserted = 0;

            while (($data = fgetcsv($handle)) !== false) {
                try {
                    if (count($data) < 13 || empty($data[0])) continue;

                    $dob = null;
                    try {
                        $dob = !empty($data[7])
                            ? Carbon::createFromFormat('d/m/Y', $data[7])->format('Y-m-d')
                            : null;
                    } catch (\Exception $e) {
                        $dob = null;
                    }

                    Person::create([
                        'idNumber'           => $data[0] ?? null,
                        'firstName'          => $data[1] ?? null,
                        'middleName'         => $data[2] ?? null,
                        'thirdName'          => $data[3] ?? null,
                        'LastName'           => $data[4] ?? null,
                        'motherName'         => $data[5] ?? null,
                        'address'            => $data[6] ?? null,
                        'dob'                => $dob,
                        'areaCNumber'        => $data[8] ?? null,
                        'stateNumber'        => $data[9] ?? null,
                        'areaNumber'         => $data[10] ?? null,
                        'neighborhoodNumber' => $data[11] ?? null,
                        'homeNumber'         => $data[12] ?? null,
                        'created_at'         => now(),
                        'updated_at'         => now(),
                    ]);

                    $inserted++;
                } catch (\Exception $e) {
                    Log::error("خطأ في الملف {$file->getFilename()}: " . $e->getMessage());
                    continue;
                }
            }

            fclose($handle);
            echo "✅ {$file->getFilename()} -> تم إدخال $inserted سجل\n";
            $totalInserted += $inserted;
        }

        echo "🎉 تم إدخال $totalInserted سجل من جميع الملفات.\n";
    }
}
