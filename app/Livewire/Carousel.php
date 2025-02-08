<?php

    namespace App\Livewire;

    use Livewire\Component;
    use Illuminate\Support\Facades\Storage;


    class Carousel extends Component
    {
        public $images = [];
        public $currentIndex = 0;
        public $interval = 3000; // Tiempo en milisegundos (3 segundos)

        public function mount()
        {
            // Carga las imágenes desde storage
            $this->images = [
                Storage::url('carousel/1.jpg'),
                Storage::url('carousel/2.jpg'),
                Storage::url('carousel/3.jpg'),
            ];
        }

        public function next()
        {
            $this->currentIndex = ($this->currentIndex + 1) % count($this->images);
        }

        public function prev()
        {
            $this->currentIndex = ($this->currentIndex - 1 + count($this->images)) % count($this->images);
        }

        public function goToSlide($index)
        {
            $this->currentIndex = $index;
        }

        public function render()
        {
            return view('livewire.carousel');
        }
    }
