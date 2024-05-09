<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Services;
use App\Models\Clients;
use App\Models\Config;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

class Home extends Component
{
    public $message = '';

    public $email = '';

    public function submit(): void
    {
        if($this->email != '' && str_contains($this->email, '@')){
            Clients::updateOrInsert([
                'email'=>$this->email
            ]);
            $this->email = '';
            $this->message = 'E-mail cadastrado com sucesso.';
        }else{
            $this->email = '';
            $this->message = 'Você precisa cadastrar um e-mail valido';
        }
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    public function render()
    {
        return view('livewire.home',[
            'menu' => json_decode(Menu::all()),
            'banners' => Banner::all(),
            'about' => AboutUs::first(),
            'services' => Services::all(),
            'config' => Config::first(),
        ]);
    }
}
