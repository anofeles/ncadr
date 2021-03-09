<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Galery
 *
 * @property int $id
 * @property string $uuid
 * @property string $type
 * @property int $active
 * @property int $sort
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GaleryTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GaleryTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Galery listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Galery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Galery notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Galery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Galery translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Galery translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galery withTranslation()
 */
	class Galery extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\GaleryTranslation
 *
 * @property int $id
 * @property int $galery_id
 * @property string $locale
 * @property string $title
 * @property string|null $img
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation whereGaleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GaleryTranslation whereTitle($value)
 */
	class GaleryTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Locale
 *
 * @property int $id
 * @property string $uuid
 * @property string $title
 * @property string $url
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUuid($value)
 */
	class Locale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $uuid
 * @property string $locale
 * @property string|null $type
 * @property string $img
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MediaToAny
 *
 * @property int $id
 * @property string $media_uuid
 * @property string $row_uuid
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny whereMediaUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny whereRowUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaToAny whereUpdatedAt($value)
 */
	class MediaToAny extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $uuid
 * @property string $type
 * @property int $active
 * @property int $sort
 * @property int|null $menu_dam_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MenuTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenuDamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu withTranslation()
 */
	class Menu extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\MenuToAny
 *
 * @property int $id
 * @property string $menu_uuid
 * @property string $row_uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny whereMenuUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny whereRowUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuToAny whereUpdatedAt($value)
 */
	class MenuToAny extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MenuTranslation
 *
 * @property int $id
 * @property int $menu_id
 * @property string $locale
 * @property string $title
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTranslation whereTitle($value)
 */
	class MenuTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $uuid
 * @property string $type
 * @property int $active
 * @property string|null $mtav
 * @property int $sort
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PostTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Post translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMtav($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withTranslation()
 */
	class Post extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\PostTranslation
 *
 * @property int $id
 * @property int $post_id
 * @property string $locale
 * @property string|null $author
 * @property string $title
 * @property string|null $desc
 * @property string $text
 * @property string|null $img
 * @property string|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereTitle($value)
 */
	class PostTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

