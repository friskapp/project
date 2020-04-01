<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users
        factory(\Frisk\Models\User::class, 4)->create()->each(function ($user) {
            //projects
            factory(\Frisk\Models\Project::class, 2)->create()->each(function (\Frisk\Models\Project $project) use ($user) {
                $project->addMember($user);
                //issues
                factory(\Frisk\Models\Issue::class, 3)->create(['project_id' => $project->id])->each(function ($issue) use ($project) {
                    //sessions
                    factory(\Frisk\Models\Session::class, rand(0, 30))->create(['project_id' => $project->id, 'issue_id' => $issue->id]);
                });
            });
        });
    }
}
