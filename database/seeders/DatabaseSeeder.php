<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\Experience;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Me

        $me = Candidate::factory()->create([
            'first_name' => 'Christopher',
            'last_name' => 'Lepore',
            'phone' => '7249865472',
            'email_address' => 'c*****@******.com',
            'address_street' => '105 Sita Ct',
            'address_city' => 'Carnegie',
            'address_province' => 'PA',
            'address_country' => 'United States',
            'address_zip' => '15106',
        ]);

        Experience::factory()
            ->for($me)
            ->create([
                'company_name' => 'Proofpoint, Inc.',
                'job_title' => 'Senior Software Engineer',
                'description' => 'I am the lead on a team of front-end engineers responsible for re-architecting, streamlining, and building new features for an ember.js front end. I also coordinate features, timelines, releases, and widespread code initiatives with technical project managers, product managers, and directors.',
                'city' => 'Pittsburgh',
                'province' => 'PA',
                'country' => 'United States',
                'skills' => 'emberjs, html5, css3, REST, unit testing, graphql, typescript, git'
            ]);

        Experience::factory()
            ->for($me)
            ->create([
                'company_name' => 'Infor: Hook & Loop',
                'job_title' => 'Senior Software Engineer, Lead',
                'description' => "I led a small team of 4-6 developers in maintaining a library to support Infor's business teams' needs which we open-sourced in 2018. I also helped to build websites (angular) and architect some of the core design system and build processes (style tokens, sketch to svg icon generation, release processes, npm).",
                'city' => 'New York',
                'province' => 'NY',
                'country' => 'United States',
                'skills' => 'angular, architect, design system, build process, npm, open source, managment, git'
            ]);

        Experience::factory()
            ->for($me)
            ->create([
                'company_name' => 'JazzHR',
                'job_title' => 'Software Engineer',
                'description' => '
                (Formally the Resumator) Full stack dev engineer working on the interwebs and things encompassing everything from html5/css to angularjs to symphony (php).',
                'city' => 'Pittsburgh',
                'province' => 'PA',
                'country' => 'United States',
                'skills' => 'html5, css3, bootstrap, angularjs, symphony php, git'
            ]);


        Experience::factory()
            ->for($me)
            ->create([
                'company_name' => 'Lover.ly',
                'job_title' => 'Lead Developer',
                'description' => 'I lead a small team to refactor and rebrand the product for series B fundraising over the course of 2 years.',
                'city' => 'New York',
                'province' => 'NY',
                'country' => 'United States',
                'skills' => 'php kohana, javascript, html, CI/CD, git'
            ]);



        // Add some other candidates
        $candidates = Candidate::factory()
            ->count(3)
            ->create();

        foreach($candidates as $c)
        {
            Experience::factory()
                ->count(2)
                ->for($c)
                ->create();
        }
    }
}
