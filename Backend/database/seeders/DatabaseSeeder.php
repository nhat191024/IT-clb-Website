<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Courses;
use App\Models\Majors;
use App\Models\User;
use App\Models\ProjectMembers;
use App\Models\Projects;
use App\Models\Tasks;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            User::create([
                "Name" => $row['name'],
                "Birthday" => $row['birthday'],
                "JoinDate" => $row['joinDate'],
                "Major" => $row['majors'],
                "Course" => $row['Courses'],
                "Email" => $row['mail'],
                "username" => $row['username'],
                "password" => Hash::make($row['password']),
                "Active" => $row['active'],
                "SocialAccount" => $SA,
                "Role" => $row['role'],
            ]);
        };

        foreach ($dataArray['Project'] as $row) {
            Projects::create([
                "Id" => $row['Id'],
                "Name" => $row['Name'],
                "Image" => $row['Image'],
                "Leader" => $row['Leader'],
                "StartDate" => $row['StartDate'],
                "EndDate" => $row['EndDate'],
                "Status" => $row['Status'],
            ]);
        };

        foreach ($dataArray['ProjectMember'] as $row) {
            ProjectMembers::create([
                "Project" => $row['Project'],
                "Member" => $row['Member']
            ]);
        };

        foreach ($dataArray['Task'] as $row) {
            Tasks::create([
                "Task" => $row['Task'],
                "Project" => $row['Project'],
                "WorkMember" => $row['WorkMember']
            ]);
        };

        foreach ($dataArray['Blog'] as $row) {
            Blogs::create([
                "Name" => $row['Name'],
                "Content" => $row['Content'],
                "Author" => $row['Author'],
                "View" => $row['View'],
                "Like" => $row['Like']
            ]);
        };
    }
}
