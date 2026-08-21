<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * User
 *
 * Representa um usuário no sistema; implementa várias interfaces para funcionalidades
 * específicas, como FilamentUser, verificação de email, avatar e nome personalizados.
 *
 * @package App\Models
 *
 * @property int $id O identificador único do usuário.
 * @property string $username O nome de usuário.
 * @property string $email O endereço de email do usuário.
 * @property string|null $firstname O primeiro nome do usuário.
 * @property string|null $lastname O sobrenome do usuário.
 * @property string $password A senha do usuário.
 * @property \Illuminate\Support\Carbon|null $email_verified_at A data de verificação do email.
 * @property-read string $name O nome completo do usuário (primeiro nome e sobrenome).
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media Coleção de arquivos de mídia associados ao usuário.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery() Cria uma nova query para o modelo.
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery() Cria uma nova query de consulta para o modelo.
 * @method static \Illuminate\Database\Eloquent\Builder|User query() Retorna uma nova instância do query builder para o modelo.
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value) Filtra usuários pelo campo de email.
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value) Filtra usuários pelo campo de nome de usuário.
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable implements FilamentUser, MustVerifyEmail, HasAvatar, HasName, HasMedia
{
    use InteractsWithMedia;
    use HasUuids, HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string> Lista de atributos permitidos para atribuição em massa.
     */
    protected $fillable = [
        'username',
        'email',
        'firstname',
        'lastname',
        'password',
    ];

    /**
     * Os atributos que devem ser ocultos para serialização.
     *
     * @var array<int, string> Lista de atributos que serão ocultados ao serializar o modelo.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos específicos.
     *
     * @var array<string, string> Mapeamento de atributos para seus tipos de conversão.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Retorna o nome do usuário a ser exibido no Filament.
     *
     * @return string O nome de exibição do usuário.
     */
    public function getFilamentName(): string
    {
        return $this->username;
    }

    /**
     * Verifica se o usuário pode acessar um painel específico do Filament.
     *
     * @param  Panel  $panel O painel a ser verificado.
     * @return bool Retorna verdadeiro se o usuário pode acessar o painel, falso caso contrário.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // if ($panel->getId() === 'admin') {
        //     return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        // }

        return true;
    }

    /**
     * Obtém a URL do avatar do usuário.
     *
     * @return string|null A URL do avatar ou null se o avatar não estiver definido.
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->getMedia('avatars')?->first()?->getUrl() ?? $this->getMedia('avatars')?->first()?->getUrl('thumb') ?? null;
    }

    /**
     * Obtém o nome completo do usuário.
     *
     * @return string O nome completo (primeiro nome e sobrenome).
     */
    public function getNameAttribute(): string
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
     * Verifica se o usuário é um super administrador.
     *
     * @return bool Retorna verdadeiro se o usuário possuir o papel de super administrador.
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole(config('filament-shield.super_admin.name'));
    }

    /**
     * Registra as conversões de mídia para o modelo de usuário.
     *
     * @param  Media|null  $media Instância da mídia (opcional).
     * @return void
     */
    public function registerMediaConversions(Media|null $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
