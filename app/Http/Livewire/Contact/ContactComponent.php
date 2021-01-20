<?php

namespace App\Http\Livewire\Contact;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;
use GuzzleHttp\Client;

class ContactComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $paginate;

    public $readyToLoad = false; //Preloading
    public $data, $name, $phone, $selected_id, $prompt, $search;
    public $updateMode = false;
    public $spinner = false;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function hydrate(){
        $this->emit('loading');
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $search = $this->search;
        $client = new Client();
        if($search){
            $response = $client->get('http://localhost:8001/api/v1/get-contacts/'.$search.'?page='.$this->page);
        }else{
            $response = $client->get('http://localhost:8001/api/v1/get-contacts?page='.$this->page);
        }
        $result = json_decode($response->getBody()->getContents(), true);
        //dd($result['data']);
        $this->paginate = new LengthAwarePaginator($result['data'], $result['data']['total'], $result['data']['per_page'], $this->page, []);
        $this->data = $this->paginate->items()['data'];
        $this->spinner = false;
        //dd($this->paginate->items(), $this->page);

        return view('livewire.contact.contact-component', ['data' => $this->readyToLoad ? $this->data : [], 'paginate' => $this->paginate]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
        $client = new Client();
        $client->post('http://localhost:8001/api/v1/store-contact', [
            'form_params' => [
                'name' => $this->name,
                'phone' => $this->phone,
            ]
        ]);
        $this->emit('refreshParent');
        $this->emit('closeModal');
        $this->emit('alert', ['type' => 'success', 'message' => 'Saved!']);
        $this->resetInput();
    }

    public function edit($id)
    {
        $client = new Client();
        $response = $client->get('http://localhost:8001/api/v1/get-contact/'.$id);
        $result = json_decode($response->getBody()->getContents(), true);

        $this->selected_id = $result['data']['id'];
        $this->name = $result['data']['name'];
        $this->phone = $result['data']['phone'];

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required',
            'phone' => 'required'
        ]);

        if ($this->selected_id) {
            $client = new Client();
            $client->put('http://localhost:8001/api/v1/update-contact/'.$this->selected_id, [
                'form_params' => [
                    'name' => $this->name,
                    'phone' => $this->phone,
                ]
            ]);

            $this->emit('refreshParent');
            $this->emit('closeModal');
            $this->emit('alert', ['type' => 'success', 'message' => 'Updated!']);
            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function export(){
        dd('Not implemenent');
    }

    public function destroy($id)
    {
        if ($id) {
            $client = new Client();
            $client->delete('http://localhost:8001/api/v1/contact/'.$id);
            $this->emit('alert', ['type' => 'success', 'message' => 'Deleted!']);
        }
    }
}
