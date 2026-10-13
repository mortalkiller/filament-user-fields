<?php

namespace Zvizvi\UserFields\Tests\Fixtures\Models;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasAvatar
{
    protected $guarded = [];

    public $timestamps = false;

    public function getFilamentAvatarUrl(): ?string
    {
        return "https://example.test/avatars/{$this->getKey()}.png";
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_user');
    }
}
