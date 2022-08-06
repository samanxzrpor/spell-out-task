<?php
namespace App\Services;

use Salarmehr\Cosmopolitan\Cosmo;
use Illuminate\Support\Str;

class CosmoService
{

    protected array $items = [
        ['en_AU', 'Australia/Sydney'],
        ['en_GB', 'Europe/London'],
        ['de_DE', 'Europe/Berlin'],
        ['zh_CN', 'Asia/Chongqing'],
        ['fa_IR', 'Asia/Tehran'],
        ['hi_IN', 'Asia/Jayapura'],
        ['ar_EG', 'Africa/Cairo'],
    ];

    protected Cosmo $cosmo;


    public function setConfig($lang)
    {
        foreach ($this->items as $item) {

            [$locale, $timezone] = $item;

            if (!Str::contains($locale , $lang))
                continue;

            $this->cosmo = new Cosmo($locale, ['timezone' => $timezone]);

        }
    }

    public function spill(string $number)
    {
        return $this->cosmo->spellout($number);
    }
}