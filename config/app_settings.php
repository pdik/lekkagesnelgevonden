<?php

return [

    // All the sections for the settings page
    'sections' => [
        'app' => [
            'title' => ' Bedrijfs ' . 'settings' ,
            'descriptions' => 'Bedrijfs gegevens worden gebruikt voor facturen, rapporten en offette\'s', // (optional)
            'icon' => 'fa fa-cog', // (optional)
            'inputs' => [
                [
                    'name' => 'app_name', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Bedrijfs naam', // label for input
                    // optional properties
                    'placeholder' => 'Bedrijfs naam', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'style' => '', // any inline styles
                    'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 'Pdik systems', // any default value
                    'hint' => 'Je kan hier je bedrijfs naam  invullen' // help block text for input
                ],
                    [
                    'name' => 'Business_email',
                    'type' => 'email',
                    'label' => 'Email',
                    'placeholder' => 'info@example.com',
                        'rules' => 'required|min:4|email'
                ],
                  [
                    'name' => 'Business_phone',
                    'type' => 'number',
                    'label' => 'Phone number',
                    'placeholder' => '08004676511',
                        'rules' => 'required|min:4'
                ],
                [
                    'name' => 'Business_adres',
                    'type' => 'text',
                    'label' => 'Adres',
                    'placeholder' => 'Adres van bedrijf',
                     'rules' => 'required|min:2|max:50', // validation rules for this input
                ],
                 [
                    'name' => 'Business_postalcode',
                    'type' => 'text',
                    'label' => 'Postcode',
                    'placeholder' => 'Postcode',
                     'rules' => 'required|min:4|max:20'
                ],

                 [
                    'name' => 'Business_placename',
                    'type' => 'text',
                    'label' => 'Plaatsnaam',
                    'placeholder' => 'Plaatsnaam ',
                        'rules' => 'required|min:4|max:60'
                ],
                [
                    'name' => 'logo',
                    'type' => 'image',
                    'label' => 'Upload een logo',
                    'hint' => 'Moet een afbeelding zijn',
                    'rules' => 'image|max:500',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],
            ],
        ],
        'email' => [
            'title' => 'SMTP mail settings',
            'descriptions' => 'Hoe de app emails zal gaan versturen',
            'icon' => 'fa fa-envelope',

            'inputs' => [
                [
                    'name' => 'mail_host',
                    'type' => 'text',
                    'label' => 'mail host',
                    'placeholder' => 'mail host',
                    'rules' => 'required|min:4|max:60',
                ],
                [
                    'name' => 'mail_port',
                    'type' => 'number',
                    'label' => 'mail port',
                    'placeholder' => 'Mailing port',
                       'rules' => 'required|min:2|max:20'
                ],
                    [
                    'name' => 'mail_encryption',
                    'type' => 'select',
                    'label' => 'mail encryption',
                         'options' => [
                        'ssl' => 'ssl',
                        'tls' => 'tls',
                        'startttls' => 'startttls',
                    ],
                    'placeholder' => 'Mailing encryption',
                       'rules' => 'required|min:2|max:20'
                ],
                [
                    'name' => 'from_email',
                    'type' => 'email',
                    'label' => 'Van addres',
                    'placeholder' => 'info@pdik.nl',
                    'rules' => 'required|email',

                ],
                [
                    'name' => 'from_name',
                    'type' => 'text',
                    'label' => 'van naam',
                    'placeholder' => 'info',
                    'rules' => 'required|min:4'
                ],
                  [
                    'name' => 'mail_password',
                    'type' => 'password',
                    'label' => 'mail wachtwoord',
                    'placeholder' => 'Email wachtwoord',
                      'rules' => 'required|min:4'
                ],
            ]
        ],
        'rapport' => [
            'title' => 'Rapport instellingen',
            'descriptions' => 'Standaard instellingen voor rapporten',
            'icon' => 'far fa-file-pdf',
               'inputs' => [
              [
                    'name' => 'report_coversheet',
                    'type' => 'image',
                    'label' => 'Voorblad',
                    'hint' => 'Rapport voorblad',
                    'rules' => 'image',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:120px'
                ],
                   [
                    'name' => 'rapport_headercolor',
                    'type' => 'colorpicker',
                    'label' => 'hexcode',
                    'placeholder' => 'Hexcolor code',
                     'value="#db4a39"',
                    'rules' => 'required|min:4'
                ],
                   [
                       'name' => 'report_item_name',
                       'type' => 'text',
                       'label' => 'Korte naam voor gebruikte items',
                       'placeholder' => 'Gebruikte items',
                       'rules' => 'required|min:4'
                   ],
                    [
                    'name' => 'report_prefix',
                    'type' => 'text',
                    'label' => 'Rapport prefix',
                    'placeholder' => 'r_',
                ],
                   [
                    'name' => 'report_start',
                    'type' => 'number',
                    'label' => 'Rapport nummering',
                    'placeholder' => '1',
                       'rules' => 'required|min:1'
                ],
               ],
        ],
    ],

    // Setting page url, will be used for get and post request
    'url' => 'settings',

    // Any middleware you want to run on above route
    'middleware' => [],

    // View settings
    'setting_page_view' => 'settings',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'block block-rounded block-transparent bg-white',
    'section_heading_class' => 'block-header block-header-default block-title',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Sla settings op',
    'submit_success_message' => 'Settings zijn opgeslagen',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',

    // settings group
    'setting_group' => function() {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
