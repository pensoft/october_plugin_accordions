<?php namespace Pensoft\Accordions;

use Pensoft\Accordions\Components\Accordion;
use System\Classes\PluginBase;
use SaurabhDhariwal\Revisionhistory\Classes\Diff as Diff;
use System\Models\Revision as Revision;

class Plugin extends PluginBase
{
    public function boot(){
        /* Extetions for revision */
        Revision::extend(function($model){
            /* Revison can access to the login user */
            $model->belongsTo['user'] = ['Backend\Models\User'];

            /* Revision can use diff function */
            $model->addDynamicMethod('getDiff', function() use ($model){
                return Diff::toHTML(Diff::compare($model->old_value, $model->new_value));
            });
        });
    }
    public function registerComponents()
    {
        return [
            Accordion::class => 'accordion'
        ];
    }

    public function registerPermissions()
    {
        return [
            'pensoft.accordions.access' => [
                'tab' => 'Accordions',
                'label' => 'Manage accordions'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'accordions' => [
                'label'       => 'Accordions',
                'url'         => \Backend::url('pensoft/accordions/accordions'),
                'icon'        => 'icon-th-list',
                'permissions' => ['pensoft.accordions.*'],
                'sideMenu' => [
                    'side-menu-item' => [
                        'label'       => 'Items',
                        'url'         => \Backend::url('pensoft/accordions/accordionitem'),
                        'icon'        => 'icon-th-list',
                        'permissions' => ['pensoft.accordions.*'],
                    ],
                    'side-menu-item2' => [
                        'label'       => 'Categories',
                        'url'         => \Backend::url('pensoft/accordions/accordions'),
                        'icon'        => 'icon-sitemap',
                        'permissions' => ['pensoft.accordions.*'],
                    ],

                ]
            ],
        ];
    }

}
