<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ProjectsController;

class ProjectsTest extends TestCase
{
    
    use Withfaker, RefreshDatabase;

  /** @test */ 

  public function a_user_can_create_a_project()
  {

        $this->withoutExceptionHandling();


        $attributes = [
            
            'title' => $this->faker->sentence,

            'description' => $this->faker->paragraph

        ];

        $this->post('/projects', $attributes )->assertRedirect('/projects');


        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);


  }

  /** @test */

  public function a_project_requires_a_title()
  {

    $this->post('/project', [])->assertSessionHasErrors('title');

  }

}