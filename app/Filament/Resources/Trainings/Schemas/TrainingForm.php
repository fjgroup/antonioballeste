<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('title')
                                    ->label('Título de la Formación')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->label('Slug / URL (Automático)')
                                    ->required()
                                    ->readOnly()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('city')
                                    ->label('Ciudad')
                                    ->required(),
                                DatePicker::make('start_date')
                                    ->required(),
                                DatePicker::make('end_date'),
                            ])->columns(2),

                        Section::make('Agenda')
                            ->schema([
                                Repeater::make('schedule_details')
                                    ->label('Detalles de la Agenda')
                                    ->schema([
                                        DatePicker::make('date')
                                            ->label('Fecha')
                                            ->required()
                                            ->live()
                                            ->afterStateUpdated(fn ($set, $state) => $set('display_text', \Carbon\Carbon::parse($state)->translatedFormat('d F'))),
                                        TextInput::make('display_text')
                                            ->label('Texto a mostrar (ej. 27 Febrero)')
                                            ->required(),
                                        TextInput::make('note')
                                            ->label('Nota (Opcional)'),
                                    ])
                                    ->columns(3)
                            ]),

                        Section::make('Contenido del Artículo')
                            ->schema([
                                \AmidEsfahani\FilamentTinyEditor\TinyEditor::make('content')
                                    ->label('Cuerpo del Artículo')
                                    ->fileAttachmentsDirectory('trainings')
                                    ->columnSpanFull()
                                    ->profile('default'),
                            ]),
                    ])
            ]);
    }
}
