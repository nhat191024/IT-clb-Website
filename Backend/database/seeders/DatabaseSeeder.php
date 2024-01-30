<?php

namespace Database\Seeders;

use App\Models\courses;
use App\Models\frameworks;
use App\Models\languages;
use App\Models\majors;
use App\Models\User;
use App\Models\projects;
use App\Models\types;
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

        foreach ($dataArray['courses'] as $row) {
            courses::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['majors'] as $row) {
            majors::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['language'] as $row) {
            languages::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['type'] as $row) {
            types::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['framework'] as $row) {
            frameworks::create([
                "name" => $row['name']
            ]);
        };

        foreach ($dataArray['Members'] as $row) {
            $SA = json_encode(['Facebook' => 'fb.com', 'Discord' => 'discord.com']);
            User::create([
                "studentID" => $row['studentID'],
                "name" => $row['name'],
                "birthday" => $row['birthday'],
                "joinDate" => $row['joinDate'],
                "majorID" => $row['majorID'],
                "courseID" => $row['courseID'],
                "mail" => $row['mail'],
                "username" => $row['username'],
                "password" => Hash::make($row['password']),
                "active" => $row['active'],
                "socialAccount" => $SA,
            ]);
        };

        // foreach ($dataArray['Project'] as $row) {
        //     projects::create([
        //         "Id" => $row['Id'],
        //         "Name" => $row['Name'],
        //         "Image" => $row['Image'],
        //         "Leader" => $row['Leader'],
        //         "StartDate" => $row['StartDate'],
        //         "EndDate" => $row['EndDate'],
        //         "Status" => $row['Status'],
        //     ]);
        // };

        // foreach ($dataArray['ProjectMember'] as $row) {
        //     ProjectMembers::create([
        //         "Project" => $row['Project'],
        //         "Member" => $row['Member']
        //     ]);
        // };

        // foreach ($dataArray['Task'] as $row) {
        //     Tasks::create([
        //         "Task" => $row['Task'],
        //         "Project" => $row['Project'],
        //         "WorkMember" => $row['WorkMember']
        //     ]);
        // };

        // foreach ($dataArray['Blog'] as $row) {
        //     Blogs::create([
        //         "Name" => $row['Name'],
        //         "Content" => $row['Content'],
        //         "Author" => $row['Author'],
        //         "View" => $row['View'],
        //         "Like" => $row['Like']
        //     ]);
        // };
    }
}
