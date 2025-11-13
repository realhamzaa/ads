import csv
import os

# اسم الملف الأصلي
input_file = '../storage/app/private/civilGazaDataBase.csv'
# عدد الصفوف في كل ملف
rows_per_file = 100000

# مجلد الإخراج
output_dir = '../storage/app/private/db'
os.makedirs(output_dir, exist_ok=True)

with open(input_file, 'r', encoding='utf-8') as file:
    reader = csv.reader(file)
    header = next(reader)

    file_count = 1
    rows = []

    for i, row in enumerate(reader, 1):
        rows.append(row)
        if i % rows_per_file == 0:
            with open(f'{output_dir}/chunk_{file_count}.csv', 'w', newline='', encoding='utf-8') as out:
                writer = csv.writer(out)
                writer.writerow(header)
                writer.writerows(rows)
            print(f'✅ chunk_{file_count}.csv created with {len(rows)} rows.')
            file_count += 1
            rows = []

    if rows:
        with open(f'{output_dir}/chunk_{file_count}.csv', 'w', newline='', encoding='utf-8') as out:
            writer = csv.writer(out)
            writer.writerow(header)
            writer.writerows(rows)
        print(f'✅ chunk_{file_count}.csv created with {len(rows)} rows.')
