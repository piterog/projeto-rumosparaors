<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Votes extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // $count = Voyager::model('User')->count();
        $count = \App\Escolha::count();
        // $string = trans_choice('voyager::dimmer.user', $count);
        $string = ($count <= 1) ? 'Voto':'Votos';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-check',
            'title'  => "{$count} {$string}",
            'text'   => "Tem ". $count ." ". Str::lower($string) . " no seu banco de dados. Clique no botão abaixo para ver todos os ".Str::lower($string),
            'button' => [
                'text' => 'Ver todos os Votos',
                'link' => route('voyager.escolhas.index'),
            ],
            'image' => asset('/storage/users/vote_background.jpg'),
        ]));
    }
}
