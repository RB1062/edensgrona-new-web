<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new
class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('hero.title', 'Din Drömträdgård Börjar Här');
        $this->migrator->add('hero.subtitle', '🌿 Professionell Trädgårdstjänst');
        $this->migrator->add('hero.description',
            'Vi skapar gröna oaser med passion, kunskap och kvalitet. Från design till underhåll – vi tar hand om allt.');
        $this->migrator->add('hero.primary_button_text', 'Få Kostnadsfri Offert');
        $this->migrator->add('hero.primary_button_url', 'https://edensgrona.se/contact-us');
        $this->migrator->add('hero.secondary_button_text', 'Våra Tjänster');
        $this->migrator->add('hero.secondary_button_url', '');
        $this->migrator->add('hero.is_active', true);
        $this->migrator->add('hero.logo_path', 'hero/logo.png');
        $this->migrator->add('hero.background_video_path', 'hero/background-video.mp4');
        $this->migrator->add('hero.background_image_path', 'hero/background-image.jpg');
    }
};
