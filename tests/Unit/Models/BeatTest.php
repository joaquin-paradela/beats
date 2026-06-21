<?php

namespace Tests\Unit\Models;

use App\Models\Beat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BeatTest extends TestCase
{
    use RefreshDatabase;

    public function test_beat_can_be_created_with_fillable_attributes(): void
    {
        $beat = Beat::create([
            'name' => 'Test Beat',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
            'active' => true,
        ]);

        $this->assertDatabaseHas('beats', [
            'name' => 'Test Beat',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
        ]);
    }

    public function test_beat_active_cast_returns_boolean(): void
    {
        $beat = Beat::create([
            'name' => 'Active Beat',
            'genre' => 'Drill',
            'bpm' => 150,
            'price' => 30.00,
            'active' => true,
        ]);

        $this->assertIsBool($beat->active);
        $this->assertTrue($beat->active);
    }

    public function test_beat_price_cast_returns_decimal(): void
    {
        $beat = Beat::create([
            'name' => 'Priced Beat',
            'genre' => 'Boom Bap',
            'bpm' => 90,
            'price' => 20.50,
            'active' => true,
        ]);

        $this->assertEquals('20.50', (string) $beat->price);
    }

    public function test_beat_color_attribute_based_on_genre(): void
    {
        $trap = Beat::create([
            'name' => 'Trap Beat',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
        ]);

        $drill = Beat::create([
            'name' => 'Drill Beat',
            'genre' => 'Drill',
            'bpm' => 150,
            'price' => 30.00,
        ]);

        $boombap = Beat::create([
            'name' => 'Boom Bap Beat',
            'genre' => 'Boom Bap',
            'bpm' => 90,
            'price' => 20.00,
        ]);

        $this->assertEquals('8B0000', $trap->color);
        $this->assertEquals('000080', $drill->color);
        $this->assertEquals('006400', $boombap->color);
    }

    public function test_beat_color_attribute_returns_default_for_unknown_genre(): void
    {
        $beat = Beat::create([
            'name' => 'Unknown Genre',
            'genre' => 'Experimental',
            'bpm' => 100,
            'price' => 15.00,
        ]);

        $this->assertEquals('FF6B35', $beat->color);
    }

    public function test_scope_active_returns_only_active_beats(): void
    {
        Beat::create([
            'name' => 'Active Beat 1',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
            'active' => true,
        ]);

        Beat::create([
            'name' => 'Active Beat 2',
            'genre' => 'Drill',
            'bpm' => 150,
            'price' => 30.00,
            'active' => true,
        ]);

        Beat::create([
            'name' => 'Inactive Beat',
            'genre' => 'Boom Bap',
            'bpm' => 90,
            'price' => 20.00,
            'active' => false,
        ]);

        $active = Beat::active()->get();

        $this->assertEquals(2, $active->count());
        $this->assertTrue($active->every(fn ($beat) => $beat->active === true));
        $this->assertFalse($active->pluck('name')->contains('Inactive Beat'));
    }

    public function test_beat_timestamps_are_set(): void
    {
        $beat = Beat::create([
            'name' => 'Timestamped Beat',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
        ]);

        $this->assertNotNull($beat->created_at);
        $this->assertNotNull($beat->updated_at);
    }
}
