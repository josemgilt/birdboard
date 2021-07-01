<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    

    public function test_models_can_be_instantiated()
    {
        $Project = Project::factory()->make();

        // Use model in tests...
    }
}
