<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Borrowing::create([
            'equipment_id' => 1, // Desktop Computer
            'name' => 'Aris Budianto',
            'role' => 'lecturer',
            'identity_number' => '198012172005011001',
            'status' => 'borrowed',
            'borrow_date' => '2025-01-05',
            'return_date' => '2025-01-12',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 8, // Projector
            'name' => 'Yusfia Hafid Aristyagama',
            'role' => 'lecturer',
            'identity_number' => '199105242019031016',
            'status' => 'pending',
            'borrow_date' => '2025-01-10',
            'return_date' => '2025-01-15',
            'detail' => 'This is borrowing detail section'
        ]);

        // Peminjaman Mahasiswa
        Borrowing::create([
            'equipment_id' => 2, // LCD Monitor
            'name' => 'Paulus Lestyo Adhiatma',
            'role' => 'student',
            'identity_number' => 'K3520061',
            'status' => 'approved',
            'borrow_date' => '2025-01-08',
            'return_date' => '2025-01-14',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 3, // Mechanical Keyboard
            'name' => 'Muhammad Hardiansyah',
            'role' => 'student',
            'identity_number' => 'K3520049',
            'status' => 'rejected',
            'borrow_date' => '2025-01-06',
            'return_date' => '2025-01-13',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 4, // Wireless Mouse
            'name' => 'Vero Bagus Wardana',
            'role' => 'student',
            'identity_number' => 'K3520075',
            'status' => 'returned',
            'borrow_date' => '2025-01-02',
            'return_date' => '2025-01-05',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 5, // Laser Printer
            'name' => 'Bagas Ardiansyah',
            'role' => 'student',
            'identity_number' => 'K3520015',
            'status' => 'borrowed',
            'borrow_date' => '2025-01-06',
            'return_date' => '2025-01-13',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 6, // Scanner
            'name' => 'Dicky Hendra Pamungkas',
            'role' => 'student',
            'identity_number' => 'K3520021',
            'status' => 'pending',
            'borrow_date' => '2025-01-09',
            'return_date' => '2025-01-16',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 7, // Webcam
            'name' => 'Palguno Wicaksono',
            'role' => 'student',
            'identity_number' => 'K3520060',
            'status' => 'approved',
            'borrow_date' => '2025-01-10',
            'return_date' => '2025-01-17',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 8, // Projector
            'name' => 'Ahmad Misbahuddin',
            'role' => 'student',
            'identity_number' => 'K3520007',
            'status' => 'borrowed',
            'borrow_date' => '2025-01-07',
            'return_date' => '2025-01-14',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 1, // Desktop Computer
            'name' => 'Rizak Al-Hasbi Anwar',
            'role' => 'student',
            'identity_number' => 'K3520068',
            'status' => 'returned',
            'borrow_date' => '2025-01-03',
            'return_date' => '2025-01-06',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 2, // LCD Monitor
            'name' => 'Nurcahya Pradana Taufik Prakisya',
            'role' => 'lecturer',
            'identity_number' => '199109242019031015',
            'status' => 'borrowed',
            'borrow_date' => '2025-01-05',
            'return_date' => '2025-01-12',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 3, // Mechanical Keyboard
            'name' => 'Ajrina Nasywa Wahyudi',
            'role' => 'student',
            'identity_number' => 'K3520009',
            'status' => 'rejected',
            'borrow_date' => '2025-01-08',
            'return_date' => '2025-01-15',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 4, // Wireless Mouse
            'name' => 'Yulia Rakhmah Syifani',
            'role' => 'student',
            'identity_number' => 'K3520081',
            'status' => 'pending',
            'borrow_date' => '2025-01-11',
            'return_date' => '2025-01-18',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 5, // Laser Printer
            'name' => 'Yulia Rakhmah Syifani',
            'role' => 'student',
            'identity_number' => 'K3520081',
            'status' => 'approved',
            'borrow_date' => '2025-01-09',
            'return_date' => '2025-01-16',
            'detail' => 'This is borrowing detail section'
        ]);

        Borrowing::create([
            'equipment_id' => 6, // Scanner
            'name' => 'Dwi Maryono',
            'role' => 'lecturer',
            'identity_number' => '198008082005011003',
            'status' => 'borrowed',
            'borrow_date' => '2025-01-06',
            'return_date' => '2025-01-13',
            'detail' => 'This is borrowing detail section'
        ]);
    }
}
