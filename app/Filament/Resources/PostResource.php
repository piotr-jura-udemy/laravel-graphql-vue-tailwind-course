<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Table;

class PostResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form->schema(
                [
                    Components\TextInput::make('title')->autofocus()->required(),
                    Components\DateTimePicker::make('created_at'),
                    Components\DateTimePicker::make('updated_at'),
                    Components\MarkdownEditor::make('markdown'),
                ]
            );
    }

    public static function table(Table $table)
    {
        return $table->columns(
                [
                    Columns\Text::make('id')->primary(),
                    Columns\Text::make('title')->searchable()->sortable(),
                    Columns\Text::make('created_at')->date(),
                    Columns\Text::make('updated_at')->date(),
                ]
            )->filters(
                [//
                ]
            );
    }

    public static function relations()
    {
        return [//
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListPosts::routeTo('/', 'index'),
            Pages\CreatePost::routeTo('/create', 'create'),
            Pages\EditPost::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
