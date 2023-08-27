<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;
use App\Models\Veterinarian;
use App\Models\Appointment;
use App\Models\Pet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Owners seeding
        $john = Owner::create([
            'name' => 'John Doe',
            'address' => '123 Main St',
            'phone_number' => '123-456-7890',
            'email' => 'john.doe@example.com'
        ]);

        $jane = Owner::create([
            'name' => 'Jane Smith',
            'address' => '456 Elm St',
            'phone_number' => '123-456-7891',
            'email' => 'jane.smith@example.com'
        ]);

        $jack = Owner::create([
            'name' => 'Jack Ryan',
            'address' => '789 Maple St',
            'phone_number' => '123-456-7892',
            'email' => 'jack.ryan@example.com'
        ]);

        $jill = Owner::create([
            'name' => 'Jill Taylor',
            'address' => '101 Pine St',
            'phone_number' => '123-456-7893',
            'email' => 'jill.taylor@example.com'
        ]);

        // Veterinarians seeding
        $drSmith = Veterinarian::create([
            'name' => 'Dr. Smith',
            'specialization' => 'Surgery',
            'available_timings' => '9am - 5pm'
        ]);

        $drJones = Veterinarian::create([
            'name' => 'Dr. Jones',
            'specialization' => 'General Practice',
            'available_timings' => '10am - 6pm'
        ]);

        $drAdams = Veterinarian::create([
            'name' => 'Dr. Adams',
            'specialization' => 'Orthopedics',
            'available_timings' => '8am - 4pm'
        ]);

        $drWhite = Veterinarian::create([
            'name' => 'Dr. White',
            'specialization' => 'Dentistry',
            'available_timings' => '11am - 7pm'
        ]);

        // Pets seeding
        $buddy = Pet::create([
            'name' => 'Buddy',
            'type' => 'dog',
            'breed' => 'Golden Retriever',
            'health_notes' => 'Healthy but needs regular checkups'
        ]);

        $lucy = Pet::create([
            'name' => 'Lucy',
            'type' => 'cat',
            'breed' => 'Siamese',
            'health_notes' => 'Mild allergies'
        ]);

        $rex = Pet::create([
            'name' => 'Rex',
            'type' => 'dog',
            'breed' => 'Bulldog',
            'health_notes' => 'Eats too much'
        ]);

        $whiskers = Pet::create([
            'name' => 'Whiskers',
            'type' => 'cat',
            'breed' => 'Tabby',
            'health_notes' => 'Needs vaccination'
        ]);

        // Appointments seeding
        Appointment::create([
            'owner_id' => $john->id,
            'pet_id' => $buddy->id,
            'veterinarian_id' => $drSmith->id,
            'appointment_date' => now()->addDays(1)
        ]);

        Appointment::create([
            'owner_id' => $jane->id,
            'pet_id' => $lucy->id,
            'veterinarian_id' => $drJones->id,
            'appointment_date' => now()->addDays(2)
        ]);

        Appointment::create([
            'owner_id' => $jack->id,
            'pet_id' => $rex->id,
            'veterinarian_id' => $drAdams->id,
            'appointment_date' => now()->addDays(3)
        ]);

        Appointment::create([
            'owner_id' => $jill->id,
            'pet_id' => $whiskers->id,
            'veterinarian_id' => $drWhite->id,
            'appointment_date' => now()->addDays(4)
        ]);
    }
}
