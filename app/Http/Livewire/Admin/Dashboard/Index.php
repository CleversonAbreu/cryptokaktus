<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Crypto;
use App\Models\Transaction;
use Livewire\Component;
use DB;
class Index extends Component
{
    public $purchase;
    public $sale;
    public $cryptos;
  
    public $barHorizontal;
    public $selectTypeBarHorizontal;
    public $selectBarHorizontal  = 'purchase';

    public $line;
    public $selectTypeLine;
    public $selectLine  = 'purchase';
   
    public $transactions;
    public $selectDaysDonuts;
    public $selectDonuts = 15;
   
    public $radar;
    public $selectTypeRadar;
    public $selectRadar  = 'purchase';

    protected $listeners = ['ubahData' => 'changeBar', 'trans' => 'changeDonuts',
                            'line'=> 'changeLine','radar'=>'changeRadar',
                            'barHorizonalData'=> 'changeBarHorizontal'];

    public function mount()
    {
        $this->selectDaysDonuts = [15 => 'Last 15 days', 30 => 'Last 30 days', 90 => 'Last 90 days'];
        $this->selectTypeLine   = ['purchase' => 'Purchase', 'sale' => 'Sale'];
        $this->selectTypeRadar  = ['purchase' => 'Purchase', 'sale' => 'Sale'];
        $this->selectTypeBarHorizontal  = ['purchase' => 'Purchase', 'sale' => 'Sale'];
        $this->barHorizontal();
        $this->bar();
        $this->donuts();
        $this->line();
        $this->radar();
        $this->purchase;
        $this->sale;
     
    }

    public function render()
    {
        return view('livewire.admin.dashboard.index');
    }

    public function barHorizontal()
    {
        $table = Transaction::selectRaw("distinct(transactions.users_id),sum(type='".$this->selectBarHorizontal."')
        as type,users.name,cryptos_id")->join('users', 'users.id', '=', 'transactions.users_id')
        ->whereRaw("DATE(date) BETWEEN DATE_ADD(now(), INTERVAL -12 MONTH) AND now()
        GROUP BY MONTH(DATE(date))order by type desc limit 10")->get();

         foreach ($table as $t) {
             $data['label'][] = substr($t->name, 0, 10);
             $data['data'][]  = $t->type;
         }
       
         $this->barHorizontal = json_encode($data);
    }

    public function bar()
    {
        //bar chart
        $cryptos = Crypto::orderBy('creation_year', 'DESC')->take(10)->get();
        foreach ($cryptos as $crypto) {
            $data['label'][] = substr($crypto->name, 0, 3);
            $data['data'][] = $crypto->creation_year;
        }
        $this->cryptos = json_encode($data);
    }

    public function donuts()
    {
        //donuts chart
        $transactions = Transaction::selectRaw("sum(type='purchase') as purchase, sum(type='sale') as sale")
            ->whereRaw("DATE(date) BETWEEN CURRENT_DATE()-" . $this->selectDonuts . " AND CURRENT_DATE()")
            ->get();

        $total = $transactions[0]['purchase'] + $transactions[0]['sale'];
        $data2['label'][] = 'Purchase';
        $data2['data'][] = $transactions[0]['purchase'] == 0 ? 0 : number_format(($transactions[0]['purchase'] / $total) * 100, 2, '.', '');
        $data2['label'][] = 'Sale';
        $data2['data'][] = $transactions[0]['sale'] == 0 ? 0 : number_format(($transactions[0]['sale'] / $total) * 100, 2, '.', '');

        $this->transactions = json_encode($data2);
    }

    public function line()
    {
        //line chart
        $months = Transaction::selectRaw("sum(type='".$this->selectLine."') as type,MONTHNAME(DATE(date)) as month")
            ->whereRaw("DATE(date) BETWEEN DATE_ADD(now(), INTERVAL -12 MONTH)
            AND now() group by MONTHNAME(DATE(date))")
            ->get();

        foreach ($months as $month) {
            $data['label'][] = substr($month->month, 0, 3);
            $data['data'][]  = $month->type;
        }
       
        $data['type'][0] = $this->selectLine;
        $this->purchase  = $this->totalYear()[0]['purchase'];
        $this->sale      = $this->totalYear()[0]['sale'];

        $this->line = json_encode($data);
    }

    public function radar()
    {
        $radar = Transaction::selectRaw("distinct(cryptos_id),sum(type='".$this->selectRadar."')
        as type,cryptos.name,cryptos_id")->join('cryptos', 'cryptos.id', '=', 'cryptos_id')
        ->whereRaw("DATE(date) BETWEEN DATE_ADD(now(), INTERVAL -12 MONTH) AND now()
        GROUP BY MONTH(DATE(date))order by type desc limit 5")->get();

         foreach ($radar as $r) {
             $data['label'][] = substr($r->name, 0, 10);
             $data['data'][] = $r->type;
         }
         $this->radar = json_encode($data);
    }

    public function changeBarHorizontal()
    {
        $this->barHorizontal();
        $this->emit('barHorizontalUpdate', ['data' => $this->barHorizontal]);
    }

    public function changeBar()
    {
        $this->bar();
        $this->emit('berhasilUpdate', ['data' => $this->cryptos]);
    }

    public function changeDonuts()
    {
        $this->donuts();
        $this->emit('transUpdate', ['data' => $this->transactions]);
    }

    public function changeLine()
    {
        $this->line();
        $this->emit('lineUpdate', ['data' => $this->line]);
    }

    public function changeRadar()
    {
        $this->radar();
        $this->emit('radarUpdate', ['data' => $this->radar]);
    }

    public function totalYear()
    {
        return Transaction::selectRaw("sum(type='purchase') as purchase,sum(type='sale') as sale")
        ->whereRaw("DATE(date) BETWEEN DATE_ADD(now(), INTERVAL -12 MONTH) AND now()")->get();

    }

}
