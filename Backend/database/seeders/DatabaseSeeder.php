<?php

namespace Database\Seeders;

use App\Models\courses;
use App\Models\frameworks;
use App\Models\languages;
use App\Models\majors;
use App\Models\User;
use App\Models\projects;
use App\Models\types;
use App\Models\projectDetails;
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

        foreach ($dataArray['projects'] as $row) {
            $project = projects::create([
                "code" => $row['code'],
                "name" => $row['name'],
            ]);

            foreach ($row['type'] as $types) {
                $type = types::find($types);
                $project->type()->attach($type->id);
            }
            foreach ($row['language'] as $languages) {
                $language = languages::find($languages);
                $project->language()->attach($language->id);
            }
            foreach ($row['framework'] as $frameworks) {
                $framework = frameworks::find($frameworks);
                $project->framework()->attach($framework->id);
            }
        };

        foreach ($dataArray['projectDetails'] as $row) {
            $project = projectDetails::create([
                "leaderID" => $row['leader'],
                "projectID" => $row['project'],
                "projectSrc" => $row['projectSrc'],
                "startDate" => $row['startDate'],
                "endDate" => $row['endDate']
            ]);

            foreach ($row['member'] as $members) {
                $member = User::find($members);
                $project->projectMember()->attach($member->id);
            }
        };
    }
}
