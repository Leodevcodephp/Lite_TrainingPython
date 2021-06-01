import csv
with open('customer.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:
        if line_count == 0:
            print(f'Tên các cột là:')
            print(" |".join(row))
            line_count += 1
        else:
            print("      |".join(row))
            line_count += 1
    print(f'Đã đọc {line_count} lines.')