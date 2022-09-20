<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\BelongsToMany;


class Track extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Track::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title'),
            Text::make('Slug')->hideFromIndex(),
            Select::make('Type', 'track_type')->options([
                'original_mix' => 'Original Mix',
                'remix' => 'Remix',
                'bonus' => 'Bonus Track',
            ])->displayUsingLabels(),
            Boolean::make('Explicit'),
            Trix::make('Summary'),
            Trix::make('Description'),
            Trix::make('Lyrics'),
            Date::make('Release Date'),
            Number::make('Price Fiat')->step('any'),
            Number::make('Price Ergo')->step('any'),
            Boolean::make('Itunes Block'),
            Boolean::make('Google Block'),
            File::make('Artwork', 'artwork_url'),
            File::make('Audio File', 'audio_file_url'),
            File::make('High Def File', 'high_resolution_file_url'),
            

            BelongsToMany::make('Users'),
            BelongsToMany::make('Albums'),
            BelongsToMany::make('Remixers', 'remixers', 'App\Nova\User'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
