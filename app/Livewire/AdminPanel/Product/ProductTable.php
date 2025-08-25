<?php

namespace App\Livewire\AdminPanel\Product;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\StoreSections;
use Livewire\Component;

class ProductTable extends Component
{
    public $search = '';
    public function getRecords($inputs = [])
    {

        $records = new Product();

        if (!empty($inputs['search'])) {
            $records = $records->where('name_en', 'like', '%' . $inputs['search'] . '%')
                ->orWhere('name_ar', 'like', '%' . $inputs['search'] . '%')
                ->orWhere(
                    'code',
                    'like',
                    '%' . $inputs['search'] . '%'
                );
        }

        return $records->paginate(10);
    }
    public function delete($id)
    {
        
        $record = Product::find($id);
        $items = OrderItem::where('product_id', $record->id)->get();
        if ($items->count() <= 0) {
        $record->delete();

        $this->dispatch('recordDeleted'); // optional feedback
        }else{
            $this->dispatch('cannotDelete');
        }
    }
    #[\Livewire\Attributes\On('deleteConfirmed')]
    public function deleteConfirmed($id)
    {
        $this->delete($id);
    }
    public function render()
    {
        return view(
            'livewire.admin-panel.product.product-table',
            [
                'records' => $this->getRecords(['search' => $this->search]),
            ]
        );
    }
}
