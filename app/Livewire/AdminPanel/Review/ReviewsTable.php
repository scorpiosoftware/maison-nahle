<?php

namespace App\Livewire\AdminPanel\Review;

use App\Models\ProductComments;
use Livewire\Component;

class ReviewsTable extends Component
{
    public $search = '';
    public function getRecords($inputs = [])
    {

        $records = new ProductComments();

        if (!empty($inputs['search'])) {
            $records = $records->with('product')->where('customer', 'like', '%' . $inputs['search'] . '%')->orWhere('comment', 'like', '%' . $inputs['search'] . '%');
        }

        return $records->paginate(10);
    }
    public function delete($id)
    {
        $record = ProductComments::find($id);
        $record->delete();

        $this->dispatch('recordDeleted'); // optional feedback
    }
    #[\Livewire\Attributes\On('deleteConfirmed')]
    public function deleteConfirmed($id)
    {
        $this->delete($id);
    }
    public function render()
    {
        return view('livewire.admin-panel.review.reviews-table', ['records' => $this->getRecords(['search' => $this->search])]);
    }
}
