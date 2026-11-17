<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\Staff;
use App\Models\StaffAvailability;
use App\Models\Appointment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User (Judy Veñegas)
        $admin = User::create([
            'name' => 'Judy Veñegas',
            'email' => 'admin@luminosabelleza.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+639123456789'
        ]);

        echo "✓ Admin created: admin@luminosabelleza.com / password\n";

        // Create Staff Users (More staff with varied skills)
        $staff1User = User::create([
            'name' => 'Maria Santos',
            'email' => 'maria@luminosabelleza.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '+639123456780'
        ]);

        $staff2User = User::create([
            'name' => 'Ana Reyes',
            'email' => 'ana@luminosabelleza.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '+639123456781'
        ]);

        $staff3User = User::create([
            'name' => 'Sofia Cruz',
            'email' => 'sofia@luminosabelleza.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '+639123456782'
        ]);

        $staff4User = User::create([
            'name' => 'Isabel Garcia',
            'email' => 'isabel@luminosabelleza.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '+639123456783'
        ]);

        $staff5User = User::create([
            'name' => 'Carmen Lopez',
            'email' => 'carmen@luminosabelleza.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '+639123456784'
        ]);

        echo "✓ Staff members created\n";

        // Create Staff Profiles with varied specializations
        $staff1 = Staff::create([
            'user_id' => $staff1User->id,
            'specialization' => 'Hair & Beauty Specialist',
            'bio' => 'Expert in hair styling, coloring, and beauty treatments with 5+ years experience.',
            'is_available' => true
        ]);

        $staff2 = Staff::create([
            'user_id' => $staff2User->id,
            'specialization' => 'Beauty & Nails Expert',
            'bio' => 'Certified beautician specializing in facials, makeup, and nail services.',
            'is_available' => true
        ]);

        $staff3 = Staff::create([
            'user_id' => $staff3User->id,
            'specialization' => 'Full Service Specialist',
            'bio' => 'Multi-talented professional offering hair, beauty, nails, and spa treatments.',
            'is_available' => true
        ]);

        $staff4 = Staff::create([
            'user_id' => $staff4User->id,
            'specialization' => 'Hair & Spa Therapist',
            'bio' => 'Specialized in hair treatments and relaxing spa services.',
            'is_available' => true
        ]);

        $staff5 = Staff::create([
            'user_id' => $staff5User->id,
            'specialization' => 'Nails & Spa Specialist',
            'bio' => 'Professional nail technician with expertise in nail art and spa treatments.',
            'is_available' => true
        ]);

        echo "✓ Staff profiles created\n";

        // Create Services
        $services = [
            // Hair Services
            [
                'name' => 'Haircut',
                'category' => 'hair',
                'duration' => 45,
                'price' => 300.00,
                'description' => 'Professional haircut service with styling',
                'is_active' => true
            ],
            [
                'name' => 'Hair Color',
                'category' => 'hair',
                'duration' => 120,
                'price' => 1500.00,
                'description' => 'Full hair coloring service with premium products',
                'is_active' => true
            ],
            [
                'name' => 'Hair Treatment',
                'category' => 'hair',
                'duration' => 60,
                'price' => 800.00,
                'description' => 'Deep conditioning treatment for healthy hair',
                'is_active' => true
            ],
            [
                'name' => 'Hair Rebonding',
                'category' => 'hair',
                'duration' => 180,
                'price' => 2500.00,
                'description' => 'Permanent hair straightening treatment',
                'is_active' => true
            ],
            [
                'name' => 'Hair Perm',
                'category' => 'hair',
                'duration' => 150,
                'price' => 2000.00,
                'description' => 'Permanent wave or curl treatment',
                'is_active' => true
            ],
            
            // Beauty Services
            [
                'name' => 'Facial Treatment',
                'category' => 'beauty',
                'duration' => 60,
                'price' => 500.00,
                'description' => 'Deep cleansing facial with moisturizing',
                'is_active' => true
            ],
            [
                'name' => 'Makeup Application',
                'category' => 'beauty',
                'duration' => 90,
                'price' => 1200.00,
                'description' => 'Professional makeup for special occasions',
                'is_active' => true
            ],
            [
                'name' => 'Eyebrow Threading',
                'category' => 'beauty',
                'duration' => 15,
                'price' => 150.00,
                'description' => 'Precise eyebrow shaping and grooming',
                'is_active' => true
            ],
            [
                'name' => 'Eyelash Extension',
                'category' => 'beauty',
                'duration' => 120,
                'price' => 1500.00,
                'description' => 'Semi-permanent eyelash extensions',
                'is_active' => true
            ],
            
            // Nail Services
            [
                'name' => 'Manicure',
                'category' => 'nails',
                'duration' => 45,
                'price' => 350.00,
                'description' => 'Classic manicure with polish',
                'is_active' => true
            ],
            [
                'name' => 'Pedicure',
                'category' => 'nails',
                'duration' => 60,
                'price' => 450.00,
                'description' => 'Relaxing pedicure with foot massage',
                'is_active' => true
            ],
            [
                'name' => 'Gel Nails',
                'category' => 'nails',
                'duration' => 90,
                'price' => 800.00,
                'description' => 'Long-lasting gel nail polish application',
                'is_active' => true
            ],
            [
                'name' => 'Nail Art',
                'category' => 'nails',
                'duration' => 60,
                'price' => 600.00,
                'description' => 'Creative nail art designs',
                'is_active' => true
            ],
            
            // Spa Services
            [
                'name' => 'Body Massage',
                'category' => 'spa',
                'duration' => 90,
                'price' => 1000.00,
                'description' => 'Full body relaxation massage',
                'is_active' => true
            ],
            [
                'name' => 'Foot Spa',
                'category' => 'spa',
                'duration' => 45,
                'price' => 400.00,
                'description' => 'Relaxing foot spa treatment',
                'is_active' => true
            ],
            [
                'name' => 'Body Scrub',
                'category' => 'spa',
                'duration' => 60,
                'price' => 700.00,
                'description' => 'Exfoliating body scrub treatment',
                'is_active' => true
            ],
        ];

        $createdServices = [];
        foreach ($services as $serviceData) {
            $createdServices[] = Service::create($serviceData);
        }

        echo "✓ Services created (" . count($services) . " services)\n";

        // Get service IDs by category
        $hairServices = Service::where('category', 'hair')->pluck('id')->toArray();
        $beautyServices = Service::where('category', 'beauty')->pluck('id')->toArray();
        $nailServices = Service::where('category', 'nails')->pluck('id')->toArray();
        $spaServices = Service::where('category', 'spa')->pluck('id')->toArray();

        // Assign Services to Staff - MULTI-SKILLED APPROACH
        // Staff 1: Hair + Beauty (can handle hair and beauty combos)
        $staff1->services()->attach(array_merge($hairServices, $beautyServices));
        
        // Staff 2: Beauty + Nails (can handle beauty and nail combos)
        $staff2->services()->attach(array_merge($beautyServices, $nailServices));
        
        // Staff 3: ALL SERVICES (versatile staff member)
        $staff3->services()->attach(array_merge($hairServices, $beautyServices, $nailServices, $spaServices));
        
        // Staff 4: Hair + Spa (can handle hair and spa combos)
        $staff4->services()->attach(array_merge($hairServices, $spaServices));
        
        // Staff 5: Nails + Spa (can handle nail and spa combos)
        $staff5->services()->attach(array_merge($nailServices, $spaServices));

        echo "✓ Services assigned to staff (multi-skilled configuration)\n";
        echo "  - Maria: Hair + Beauty\n";
        echo "  - Ana: Beauty + Nails\n";
        echo "  - Sofia: ALL Services (versatile)\n";
        echo "  - Isabel: Hair + Spa\n";
        echo "  - Carmen: Nails + Spa\n";

        // Create Staff Availability (Monday to Saturday, 9 AM - 6 PM)
        $workDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        
        foreach ([$staff1, $staff2, $staff3, $staff4, $staff5] as $staff) {
            foreach ($workDays as $day) {
                StaffAvailability::create([
                    'staff_id' => $staff->id,
                    'day_of_week' => $day,
                    'start_time' => '09:00:00',
                    'end_time' => '18:00:00',
                    'is_available' => true
                ]);
            }
        }

        echo "✓ Staff availability schedules created\n";

        // Create Sample Customers
        $customers = [];
        for ($i = 1; $i <= 5; $i++) {
            $customers[] = User::create([
                'name' => "Customer {$i}",
                'email' => "customer{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'customer',
                'phone' => '+6391234567' . str_pad($i, 2, '0', STR_PAD_LEFT)
            ]);
        }

        echo "✓ Sample customers created (5 customers)\n";

        // Create Sample Appointments
        $today = Carbon::today();
        $appointmentStatuses = ['pending', 'confirmed', 'completed'];
        
        // Past appointments
        for ($i = 0; $i < 10; $i++) {
            $date = $today->copy()->subDays(rand(1, 30));
            if ($date->isWeekday() || $date->isSaturday()) {
                $service = Service::inRandomOrder()->first();
                $staff = Staff::whereHas('services', function($q) use ($service) {
                    $q->where('service_id', $service->id);
                })->inRandomOrder()->first();
                
                if ($staff) {
                    $appointmentDate = $date->copy()->setTime(rand(9, 16), 0, 0);
                    
                    Appointment::create([
                        'customer_id' => $customers[array_rand($customers)]->id,
                        'staff_id' => $staff->id,
                        'service_id' => $service->id,
                        'appointment_date' => $appointmentDate,
                        'end_time' => $appointmentDate->copy()->addMinutes($service->duration),
                        'status' => 'completed',
                        'notes' => 'Sample past appointment'
                    ]);
                }
            }
        }

        // Upcoming appointments
        for ($i = 0; $i < 5; $i++) {
            $date = $today->copy()->addDays(rand(1, 14));
            if ($date->isWeekday() || $date->isSaturday()) {
                $service = Service::inRandomOrder()->first();
                $staff = Staff::whereHas('services', function($q) use ($service) {
                    $q->where('service_id', $service->id);
                })->inRandomOrder()->first();
                
                if ($staff) {
                    $appointmentDate = $date->copy()->setTime(rand(9, 16), 0, 0);
                    
                    Appointment::create([
                        'customer_id' => $customers[array_rand($customers)]->id,
                        'staff_id' => $staff->id,
                        'service_id' => $service->id,
                        'appointment_date' => $appointmentDate,
                        'end_time' => $appointmentDate->copy()->addMinutes($service->duration),
                        'status' => $appointmentStatuses[array_rand($appointmentStatuses)],
                        'notes' => 'Sample upcoming appointment'
                    ]);
                }
            }
        }

        echo "✓ Sample appointments created (15 appointments)\n";

        echo "\n===========================================\n";
        echo "Database seeding completed successfully!\n";
        echo "===========================================\n";
        echo "Login Credentials:\n";
        echo "Admin: admin@luminosabelleza.com / password\n";
        echo "Staff: maria@luminosabelleza.com / password (Hair + Beauty)\n";
        echo "Staff: ana@luminosabelleza.com / password (Beauty + Nails)\n";
        echo "Staff: sofia@luminosabelleza.com / password (ALL Services)\n";
        echo "Staff: isabel@luminosabelleza.com / password (Hair + Spa)\n";
        echo "Staff: carmen@luminosabelleza.com / password (Nails + Spa)\n";
        echo "Customer: customer1@example.com / password\n";
        echo "===========================================\n";
        echo "\nMulti-Service Booking Examples:\n";
        echo "✓ Haircut + Facial → Maria (Hair+Beauty) or Sofia (All)\n";
        echo "✓ Facial + Manicure → Ana (Beauty+Nails) or Sofia (All)\n";
        echo "✓ Haircut + Body Massage → Isabel (Hair+Spa) or Sofia (All)\n";
        echo "✓ Manicure + Foot Spa → Carmen (Nails+Spa) or Sofia (All)\n";
        echo "✓ Any 3+ services → Sofia (All Services)\n";
        echo "===========================================\n";
    }
}