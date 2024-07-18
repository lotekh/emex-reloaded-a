<?php

namespace App\Helpers;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\PathGenerators\UserPathGenerator;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class SeoForm
{
    public static function make($prefix = ''): array
    {
        ray($prefix);
        return [
            Section::make('General SEO')
                ->columns(2)
                ->schema([
                            TextInput::make($prefix . 'seo.title')
                                ->label('SEO Title'),
                            TextInput::make($prefix . 'seo.meta_keywords')
                                ->label('Meta Keywords'),
                            Textarea::make($prefix . 'seo.meta_description')
                                ->label('Meta Description')
                                ->rows(3)
                                ->columnSpanFull(),
                ])->collapsible(),

            Section::make('Open Graph (Facebook)')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            TextInput::make($prefix . 'seo.og_title')
                                ->label('OG Title')
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.og_site_name')
                                ->label('OG Site Name')
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.og_url')
                                ->label('OG URL')
                                ->columnSpan(1),
                            Select::make($prefix . 'seo.og_type')
                                ->label('OG Type')
                                ->options([
                                    'website' => 'Website',
                                    'article' => 'Article',
                                    'product' => 'Product',
                                ])
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.og_locale')
                                ->label('OG Locale')
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.fb_app_id')
                                ->label('Facebook App ID')
                                ->columnSpan(1),
                            Textarea::make($prefix . 'seo.og_description')
                                ->label('OG Description')
                                ->rows(3)
                                ->columnSpan(3),
                            CuratorPicker::make($prefix . 'og_image_id')
                                ->label('OG Image')
                                ->relationship($prefix ? str_replace($prefix, '_', '') . 'SeoOgImage' : 'seoOgImage', 'id')
                                ->pathGenerator(UserPathGenerator::class)
                                ->tenantAware(false)
                                ->preserveFilenames()
                                ->columnSpan(3),
                            TextInput::make($prefix . 'seo.og_image_width')
                                ->label('OG Image Width')
                                ->numeric()
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.og_image_height')
                                ->label('OG Image Height')
                                ->numeric()
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.og_image_alt')
                                ->label('OG Image Alt')
                                ->columnSpan(1),
                        ]),
                ])->collapsible(),

            Section::make('Twitter')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            Select::make($prefix . 'seo.twitter_card')
                                ->label('Twitter Card')
                                ->options([
                                    'summary' => 'Summary',
                                    'summary_large_image' => 'Summary Large Image',
                                    'app' => 'App',
                                    'player' => 'Player',
                                ])
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.twitter_site')
                                ->label('Twitter Site')
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.twitter_title')
                                ->label('Twitter Title')
                                ->columnSpan(1),
                            TextInput::make($prefix . 'seo.twitter_url')
                                ->label('Twitter URL')
                                ->columnSpan(3),
                            Textarea::make($prefix . 'seo.twitter_description')
                                ->label('Twitter Description')
                                ->rows(3)
                                ->columnSpan(3),
                            CuratorPicker::make($prefix . 'twitter_image_id')
                                ->label('Twitter Image')
                                ->relationship($prefix ? str_replace($prefix, '_', '').'SeoTwitterImage' : 'seoTwitterImage', 'id')
                                ->pathGenerator(UserPathGenerator::class)
                                ->tenantAware(false)
                                ->preserveFilenames()
                                ->columnSpan(3),
                            TextInput::make($prefix . 'seo.twitter_image_alt')
                                ->label('Twitter Image Alt')
                                ->columnSpan(3),
                        ]),
                ])->collapsible(),
        ];
    }
}