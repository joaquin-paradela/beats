<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'genre',
        'bpm',
        'price',
        'cover_image',
        'audio_file',
        'active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'price' => 'decimal:2',
        ];
    }

    /**
     * Get the color attribute based on genre.
     *
     * @return string
     */
    public function getColorAttribute(): string
    {
        $colors = [
            'Trap' => '8B0000',
            'Drill' => '000080',
            'Boom Bap' => '006400',
            'R&B' => '4B0082',
            'Hip Hop' => 'FF6B35',
        ];

        return $colors[$this->genre] ?? 'FF6B35';
    }

    /**
     * Scope a query to only include active beats.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
