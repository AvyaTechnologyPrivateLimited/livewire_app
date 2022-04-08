<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $photo_search_api;
    public $settings;

    protected function rules(){
        return [
            'photo_search_api' => 'required'
        ];
    }

    public function switchAddress()
    {
      return $this->photo_search_api;
    }

    public function mount(string $component = 'active')
    {
       $this->settings = Setting::all();
        foreach($this->settings as $setting){
            if($setting->setting_key == 'photo_search_api'){
                 $this->photo_search_api = $setting->setting_val;
            }
        }
    }

    public function render()
    {
        return view('livewire.setting.settings');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate();
        $setting = Setting::updateOrCreate(['setting_key' => 'photo_search_api'], [
            'setting_val' => $this->photo_search_api
        ]);

        session()->flash('message', 'Setting Updated Successfully.');
    }
}
