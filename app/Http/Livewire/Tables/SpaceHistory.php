<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use App\Traits\CustomWithPagination;

use App\Models\User;
use App\Models\Rentpayment;
use App\Models\Ledger;
use App\Models\Tenure;

class SpaceHistory extends Component
{
    use CustomWithPagination;
    public $pageName = 'spacehistory';
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    protected $spaceHistory;
    public $space;


    public function render()
    {
        $this->spaceHistory = Tenure::select('*')
                                        ->where('spaceid', $this->space->spaceid)
                                        ->paginate($this->perPage, ['*'], $this->pageName);
        return view('livewire.tables.space-history', 
            [
                'spaceHistory' => $this->spaceHistory
            ]
        );
    }
}
