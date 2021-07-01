<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories;
use App\Models\Project;
use HasFactory;


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
    

    //$attributes = factory('\App\Models\Project')->raw(['title'=>'']);

    $attributes = factory(Project::class)->create(['title' => '']);

    $this->post('/projects', $attributes)->assertSessionHasErrors('title');

  }

    /** @test */

    public function a_project_requires_a_description()
    {

      $attributes = factory('App\Models\Project')->raw(['description' => '']);
  
      $this->post('/projects', $attributes)->assertSessionHasErrors('description');
  
    }
  

}