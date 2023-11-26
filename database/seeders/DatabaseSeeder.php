<?php
namespace Database\Seeders;

use App\Models\Courses;
use App\Models\Majors;
use App\Models\Members;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonFilePath = './database/seeders/data.json';
        $jsonContent = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonContent, true);

        foreach ($dataArray['Courses'] as $row) {
            Courses::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['Majors'] as $row) {
            Majors::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['Members'] as $row) {
            $SA = json_encode(['Facebook' => 'fb.com', 'Discord' => 'discord.com']);
            Members::create([
                "Id" => $row['Id'],
                "Name" => $row['name'],
                "Surname" => $row['surname'],
                "Birthday" => $row['birthday'],
                "JoinDate" => $row['joinDate'],
                "Major" => $row['majors'],
                "Course" => $row['Courses'],
                "Mail" => $row['mail'],
                "Username" => $row['username'],
                "Password" => $row['password'],
                "Active" => $row['active'],
                "SocialAccount" => $SA,
                "Role" => $row['role'],
            ]);
        };
    }
}
