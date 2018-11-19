<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BuildingControllerTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function an_admin_can_see_all_buildings(){
		factory(\App\UserType::class)->create();
		factory(\App\UserStatus::class)->create();
		factory(\App\Gender::class)->create();
		$this->userSingIn(factory(\App\User::class)->create());
		factory(\App\Departament::class, 1)->create();
		factory(\App\Town::class, 1)->create();
		factory(\App\Headquarter::class, 1)->create();
		$buildings = factory(\App\Building::class, 2000)->create();
		$response = $this->get(route('buildings.index'));
		$response->assertStatus(200);
		foreach ($buildings as $building) {
			$response->assertSee($building->name);
		}
	}
}
