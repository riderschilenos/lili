<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Invitado;
use App\Models\Socio;
use App\Models\Transportista;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Clipboard;


class PedidosCreate extends Component
{   
    public $invitados, $selectedSocios, $selectedInvitado, $selecteddespacho, $search, $socio_id, $invitado_id, $transportista_id, $transportistas;
    public $nombre = '';
    public $apellidos = '';
    public $rut = '';
    public $telefono = '';
    public $email = '';
    public $textoPortapapeles = '';

    use WithPagination;

    protected $listeners = ['actualizarTextoPortapapeles'];

    public function actualizarTextoPortapapeles($text)
    {
        $this->textoPortapapeles = $text;
    }

    public function completarDesdePortapapeles()
    {
        // Expresiones regulares para extraer información del primer conjunto de datos
        $patternNombres = '/NOMBRES: ([A-Z][A-ZA-ZA-Za-zÉéÍíÑñÓóÚúÁáÜü-]+(?: [A-Z][A-ZA-ZA-Za-zÉéÍíÑñÓóÚúÁáÜü-]+)?)\\s/';
        $patternApellidos = '/APELLIDOS: ?([A-Za-zÉéÍíÑñÓóÚúÁáÜü-]+(?: [A-Za-zÉéÍíÑñÓóÚúÁáÜü-]+)*)(?:\s|$)/';
        $patternRut = '/RUT: (\d{1,2}\.\d{3}\.\d{3}-[\dKk]|\d{7,8}-[\dKk])/'; // Modificamos la expresión regular del RUT
        $patternTelefono = '/FONO: (\+?569\d{8}|569\d{8}|9\s\d{8}|9\d{8})(?!\-)/';
        $patternEmail = '/MAIL: ([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})/';

        if (preg_match($patternNombres, $this->textoPortapapeles, $matchesNombres)) {
            $this->nombre = $matchesNombres[1];
        } else {
            # code...
        }
        if (preg_match($patternApellidos, $this->textoPortapapeles, $matchesApellidos)) {
            $this->apellidos = $matchesApellidos[1];
        } else {
            # code...
        }
        if (preg_match($patternRut, $this->textoPortapapeles, $matchesRut)) {
            $this->rut = $matchesRut[1];
        } else {
            # code...
        }
        if (preg_match($patternTelefono, $this->textoPortapapeles, $matchesTelefono)) {
            $this->telefono = $matchesTelefono[1];
        } else {
            # code...
        }
        if (preg_match($patternEmail, $this->textoPortapapeles, $matchesEmail)) {
            $this->email = $matchesEmail[1];
        } else {
            # code...
        }
        
            // Expresiones regulares para extraer información del segundo conjunto de datos
            $patternNombre2 = '/([A-Z][a-z]+ [A-Z][a-z]+)/';
            $patternApellidos2 = '/\n([A-Z][a-z]+ [A-Z][a-z ]+)\n/'; // Expresión regular para capturar apellidos de dos palabras
            $patternRut2 = '/\b(\d{1,2}\.\d{3}\.\d{3}-[\dKk]|\d{7,8}-[\dKk])\b/'; // Modificamos la expresión regular del RUT
            $patternTelefono2 = '/\b(\+?569\d{8}|9\d{8}|\d{8})\b/';   // Expresión regular para números de teléfono en ambas estructuras
            $patternEmail2 = '/\b([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})\b/';
            
            $matchesNombre2 = [];
            $matchesApellidos2 = [];
            $matchesTelefono2 = [];
            
            if (preg_match($patternNombre2, $this->textoPortapapeles, $matchesNombre2)) {
                $this->nombre = $matchesNombre2[0];
            } else {
                $nombreTemporal = '';
            }
            
            if (preg_match($patternApellidos2, $this->textoPortapapeles, $matchesApellidos2)) {
                $this->apellidos = $matchesApellidos2[1];
            } else {
                //$apellidosTemporal = '';
            }
            
            if (preg_match($patternTelefono2, $this->textoPortapapeles, $matchesTelefono2)) {
                $this->telefono = $matchesTelefono2[0];
            } else {
               // $telefonoTemporal = '';
            }

            //$this->apellidos = empty($this->apellidos) ? $apellidosTemporal : $this->apellidos;
            //$this->nombre = empty($this->nombre) ? $nombreTemporal.' '.$this->apellidos : $this->nombre.' '.$this->apellidos;
           // $this->telefono = empty($this->telefono) ? $telefonoTemporal : $this->telefono;
            
            if (preg_match($patternRut2, $this->textoPortapapeles, $matchesRut2)) {
                $this->rut = $matchesRut2[0];
            }
            
            if (preg_match($patternEmail2, $this->textoPortapapeles, $matchesEmail2)) {
                $this->email = $matchesEmail2[0];
            }
            if ($this->nombre) {
                $this->search = $this->nombre.' '.$this->apellidos;
                $this->nombre = $this->nombre.' '.$this->apellidos;
                
            }else{
                $this->search = 'Estructura de Texto no Coincide';
            }
           
    }



    public function render()
    {   
        
        $socios = Socio::join('users', 'socios.user_id', '=', 'users.id')
        ->select('socios.*', 'users.name', 'users.email', 'users.updated_at')
        ->where(function($query) {
            $search = $this->search;
            $query->where('rut', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('socios.name', 'LIKE', '%' . $search . '%')
                ->orWhere('users.name', 'LIKE', '%' . $search . '%')
                ->orWhere('socios.slug', 'LIKE', '%' . $search . '%');
                })
                ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
                CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
                CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
                id DESC")
                ->paginate(200);
        
        $guess = Invitado::where('rut','LIKE','%'. $this->search .'%')
                    ->orwhere('email','LIKE','%'. $this->search .'%')
                    ->orwhere('name','LIKE','%'. $this->search .'%')
                    ->orwhere('fono','LIKE','%'. $this->search .'%')
                    ->latest('id')
                    ->paginate(3);



        

        return view('livewire.vendedor.pedidos-create',compact('socios','guess'));
    }
    
    public function updateselectedSocios(Socio $socio){

        $this->selectedSocios= Socio::all();
        
        $this->reset(['invitados']);
    }

    public function updateselectedInvitado(Socio $socio){

        $this->invitados= Invitado::all();
        
        $this->reset(['selectedSocios']);
    }

    public function updatedselecteddespacho($selecteddespacho){
        
        if($selecteddespacho==1){
            $this->transportistas = Transportista::where('id',1)->pluck('name','id');
        }

        if($selecteddespacho==2){
            $this->transportistas = Transportista::where('id',1)
                                            ->orwhere('id',2)
                                            ->pluck('name','id');
        }
        if($selecteddespacho==3){
            $this->transportistas = Transportista::where('id',3)->pluck('name','id');
        }
        


    
    }

    public function updatesocio_id($socio_id){

        $this->reset(['invitados']);

        $this->selectedSocios= Socio::join('users','socios.user_id','=','users.id')
                            ->select('socios.*','users.name','users.email')
                            ->get();

        $this->socio_id = $socio_id;
        $this->resetPage();
         $this->reset(['invitados','invitado_id']);
    }

    public function updateinvitado_id($invitado_id){


        $this->invitado_id = $invitado_id;
        $this->resetPage();
         $this->reset(['selectedSocios','socio_id']);
    }



    public function cancel(){
        $this->reset(['selectedSocios','invitados','socio_id','invitado_id','search']);
    }

    public function resetsocio(){
        $this->reset(['socio_id','invitado_id']);
    }

    public function limpiar_page(){
        $this->resetPage();
        $this->reset(['selectedSocios','invitados','socio_id','invitado_id']);
    }

}
