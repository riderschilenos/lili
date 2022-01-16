<?php

namespace App\Http\Livewire\Filmmaker;

use App\Models\Platform;
use App\Models\Serie;
use App\Models\Video;
use BaconQrCode\Renderer\PlainTextRenderer;
use Livewire\Component;
use App\Observers\VideoObserver;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SeriesVideos extends Component
{   

    use AuthorizesRequests;

    public $serie, $video, $platforms, $name, $platform_id=1, $url;

    protected $rules = [
        'video.name'=>'required',
        'video.platform_id'=>'required',
        'video.url'=>['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
    ];

    public function mount(Serie $serie){
        $this->serie = $serie;

        $this->video =new Video();

        $this->platforms = Platform::all();
        
        $this->authorize('dicatated',$serie);
    }

    public function store(){
        $rules = [
            'name'=>'required',
            'platform_id'=>'required',
            'url'=>['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
        ];
        if($this->platform_id == 2){
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate ($rules);

        Video::create([
            'name'=> $this->name,
            'platform_id'=> $this->platform_id,
            'url'=> $this->url,
            'serie_id'=>$this->serie->id
        ]);
        
        $this->reset(['name','platform_id','url']);
        $this->serie = Serie::find($this->serie->id);

    }

    public function render()
    {
        return view('livewire.filmmaker.series-videos')
                ->layout('layouts.filmmaker',['serie'=> $this->serie]);
    }

    public function edit(Video $video){
        $this->resetValidation();
        $this->video = $video;
    }

    public function update(Video $video){
       if($this->video->platform_id == 2){
            $this->rules['video.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }

        $this->validate();
        $this->video -> save();
        $this->video = new Video();

        $this->serie = Serie::find($this->serie->id);
    }

    public function destroy(Video $video){

        $video->delete();
        $this->serie = Serie::find($this->serie->id);

    }
    
    public function cancel(){
        $this->video = new Video();
    }

    
    
}
