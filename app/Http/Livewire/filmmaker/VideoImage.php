<?php

namespace App\Http\Livewire\Filmmaker;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class VideoImage extends Component
{   
    use WithFileUploads;

    public $video, $file;

    public function mount(Video $video){
        $this->video=$video;
        
    }


    public function render()
    {
        return view('livewire.filmmaker.video-image');
    }

    public function update()
    {   
        $this->validate([
            'file'=>'required'
        ]);

        $url = $this->file->store('videos');
        Storage::delete($this->video->image->url);
        if($this->video->image){
            $this->video->image->update([
                'url'=>$url
            ]);
        }
        else{
            $this->video->image->create([
                'url'=>$url
            ]);
        }

        $this->video = Video::find($this->video->id);

        $this->reset(['file']);
    }

}
