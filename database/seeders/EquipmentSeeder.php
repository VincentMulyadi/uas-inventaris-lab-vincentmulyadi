<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::create([
            'code' => 'KMP-001',
            'name' => 'Desktop Computer',
            'description' => 'Desktop Computer with laboratory standard specifications',
            'total_quantity' => 30,
        ]);

        Equipment::create([
            'code' => 'MNT-001',
            'name' => '24" LCD Monitor',
            'description' => '24-inch LCD Monitor with Full HD resolution',
            'total_quantity' => 30,
        ]);

        Equipment::create([
            'code' => 'KBD-001',
            'name' => 'Mechanical Keyboard',
            'description' => 'Mechanical Keyboard with blue switches',
            'total_quantity' => 35,
        ]);

        Equipment::create([
            'code' => 'MSE-001',
            'name' => 'Wireless Mouse',
            'description' => 'Wireless Mouse with USB connection',
            'total_quantity' => 35,
        ]);

        Equipment::create([
            'code' => 'PRN-001',
            'name' => 'Laser Printer',
            'description' => 'Monochrome Laser Printer',
            'total_quantity' => 5,
        ]);

        Equipment::create([
            'code' => 'SCN-001',
            'name' => 'Document Scanner',
            'description' => 'Document Scanner with ADF',
            'total_quantity' => 3,
        ]);

        Equipment::create([
            'code' => 'UPS-001',
            'name' => '1000VA UPS',
            'description' => '1000VA UPS with backup battery',
            'total_quantity' => 15,
        ]);

        Equipment::create([
            'code' => 'PRJ-001',
            'name' => 'Projector',
            'description' => 'Projector with 3500 lumens brightness',
            'total_quantity' => 4,
        ]);

        Equipment::create([
            'code' => 'SCR-001',
            'name' => 'Projector Screen',
            'description' => '70-inch Manual Projector Screen',
            'total_quantity' => 4,
        ]);

        Equipment::create([
            'code' => 'RTR-001',
            'name' => 'WiFi Router',
            'description' => 'Dual Band WiFi Router',
            'total_quantity' => 6,
        ]);

        Equipment::create([
            'code' => 'SWT-001',
            'name' => '24 Port Network Switch',
            'description' => '24 Port Gigabit Network Switch',
            'total_quantity' => 4,
        ]);

        Equipment::create([
            'code' => 'MCU-001',
            'name' => 'USB Microphone',
            'description' => 'USB Microphone with noise cancellation',
            'total_quantity' => 10,
        ]);

        Equipment::create([
            'code' => 'SPK-001',
            'name' => 'Active Speaker',
            'description' => '2.0 Active Speaker for computer',
            'total_quantity' => 15,
        ]);

        Equipment::create([
            'code' => 'CAM-001',
            'name' => 'HD Webcam',
            'description' => '1080p HD Webcam with microphone',
            'total_quantity' => 10,
        ]);

        Equipment::create([
            'code' => 'RAK-001',
            'name' => 'Computer Rack',
            'description' => 'Computer Rack with wheels',
            'total_quantity' => 30,
        ]);
    }
}