<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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

  public function a_user_can_view_a_project()

  {

      $project = Project::factory()->create();


      $this->get('/projects/' . $project->id)

          ->assertSee($project->title)
          ->assertSee($project->description);
  }

  /** @test */

  public function a_project_requires_a_title()
  {
    

    //$attributes = factory(App\Models\Project::class)->raw(['title'=>'']);

    $attributes = Project::factory()->raw(['title' => '']);

    $this->post('/projects', $attributes)->assertSessionHasErrors('title');

  }

    /** @test */

    public function a_project_requires_a_description()
    {

      $attributes = Project::factory()->raw(['description' => '']);    
  
      $this->post('/projects', $attributes)->assertSessionHasErrors('description');
  
    }

}