<?php

namespace App\Forms\Components;

use Filament\Forms\Components\RichEditor;
use Illuminate\Support\HtmlString;

class CustomRichEditor extends RichEditor
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->extraAttributes([
            'x-data' => new HtmlString('customLinkEditor'),
            'x-init' => new HtmlString('initLinkCustomization()'),
        ]);
        
        // Set default file upload configuration
        $this->fileAttachmentsDisk('public');
        $this->fileAttachmentsDirectory('companies/image');
        $this->fileAttachmentsVisibility('public');
    }
}
