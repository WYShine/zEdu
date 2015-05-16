<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        DB::table('users')->delete();

        $user = \App\User::create([
            'name' => 'John Wu',
            'email' => 'webmaster@leapoahead.com',
            'confirmed' => 0,
            'confirmation_code' => 'EI70Z66Lpu5xHxX0jEnfb8vBlD7uzp',
            'gender' => 'male',
            'phone' => '18917368903',
            'organization' => 'Alibaba Group',
            'department' => 'User Experience Design',
            'position' => 'Front-end Engineer',
            'role' => 'admin',
            'applied_account' => 0,
            'zaccount_id' => null,
            'password' => '$2y$10$3tl7VN3jZ.0OgRIVlVNFnu.9ZPM2MgibD30heqcGyuVlxm3A5YnPy'
        ]);


        $zpatterns = new \Illuminate\Database\Eloquent\Collection();
        $zpatterns->push(\App\Zpattern::create([
            'description' => 'DB2, CICS, ACCOUNT',
        ]));
        $zpatterns->push(\App\Zpattern::create([
            'description' => 'DB2, ACCOUNT',
        ]));
        $zpatterns->push(\App\Zpattern::create([
            'description' => 'CICS, ACCOUNT',
        ]));
        $zpatterns->push(\App\Zpattern::create([
            'description' => 'ACCOUNT',
        ]));;


        $zcourses = new \Illuminate\Database\Eloquent\Collection();
        for ($i = 0; $i < 20; $i ++) {
            $zcourses->push(\App\Zcourse::create([
                'applicant_id' => $user->id,
                'zpattern_id' => rand(1, $zpatterns->count()),
                'name' => str_random(16),
                'application_note' => str_random(2000)
            ]));
        }

		// $this->call('UserTableSeeder');
	}

}
