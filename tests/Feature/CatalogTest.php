<?php

namespace Tests\Feature;

use App\Models\Beat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_index_route_returns_200(): void
    {
        Beat::create([
            'name' => 'Dark Night',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('catalog.index');
        $response->assertViewHas('beats');
    }

    public function test_catalog_index_displays_only_active_beats(): void
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

        $response = $this->get('/');

        $beats = $response->viewData('beats');
        $this->assertCount(1, $beats);
        $this->assertEquals('Active Beat', $beats->first()->name);
    }

    public function test_catalog_show_route_returns_200_with_valid_beat(): void
    {
        $beat = Beat::create([
            'name' => 'Cold Streets',
            'genre' => 'Drill',
            'bpm' => 150,
            'price' => 30.00,
        ]);

        $response = $this->get("/beat/{$beat->id}");

        $response->assertStatus(200);
        $response->assertViewIs('catalog.show');
        $response->assertViewHas('beat', $beat);
    }

    public function test_catalog_show_route_returns_404_with_invalid_beat(): void
    {
        $response = $this->get('/beat/999');

        $response->assertStatus(404);
    }

    public function test_catalog_index_renders_correct_content(): void
    {
        Beat::create([
            'name' => 'Golden Era',
            'genre' => 'Boom Bap',
            'bpm' => 90,
            'price' => 20.00,
        ]);

        $response = $this->get('/');

        $response->assertSee('Golden Era');
        $response->assertSee('Boom Bap');
        $response->assertSee('90 BPM');
    }

    public function test_catalog_show_renders_beat_details(): void
    {
        $beat = Beat::create([
            'name' => 'Test Beat',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
        ]);

        $response = $this->get("/beat/{$beat->id}");

        $response->assertSee('Test Beat');
        $response->assertSee('Trap');
        $response->assertSee('140 BPM');
        $response->assertSee('$25.00');
    }
}
