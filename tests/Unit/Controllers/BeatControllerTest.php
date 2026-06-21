<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\BeatController;
use App\Models\Beat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BeatControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_beat_controller_index_returns_view_with_active_beats(): void
    {
        Beat::create([
            'name' => 'Active Beat',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
            'active' => true,
        ]);

        Beat::create([
            'name' => 'Inactive Beat',
            'genre' => 'Drill',
            'bpm' => 150,
            'price' => 30.00,
            'active' => false,
        ]);

        $controller = new BeatController();
        $view = $controller->index();

        $this->assertEquals('catalog.index', $view->getName());
        $this->assertCount(1, $view->getData()['beats']);
    }

    public function test_beat_controller_show_returns_view_with_beat(): void
    {
        $beat = Beat::create([
            'name' => 'Test Beat',
            'genre' => 'Boom Bap',
            'bpm' => 90,
            'price' => 20.00,
        ]);

        $controller = new BeatController();
        $view = $controller->show($beat);

        $this->assertEquals('catalog.show', $view->getName());
        $this->assertEquals($beat->id, $view->getData()['beat']->id);
    }
}
