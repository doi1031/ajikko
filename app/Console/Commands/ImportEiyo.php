<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportEiyo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:eiyo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '栄養素情報をCSVから取り込みMySQLへ保存するコマンドです！';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eiyoCollection = $this->makeEiyoCollection();
        foreach ($eiyoCollection as $eiyo) {
            DB::table('eiyos')->insert([
                'food_name' => $eiyo['food_name'],
                'enerc_kcal' => $eiyo['enerc_kcal'],
                'prot' => $eiyo['prot'],
                'chole' => $eiyo['chole'],
                'fat' => $eiyo['fat'],
                'choavlm' => $eiyo['choavlm'],
                'fib' => $eiyo['fib'],
                'oa' => $eiyo['oa'],
                'ash' => $eiyo['ash'],
                'na' => $eiyo['na'],
                'k' => $eiyo['k'],
                'ca' => $eiyo['ca'],
                'mg' => $eiyo['mg'],
                'p' => $eiyo['p'],
                'fe' => $eiyo['fe'],
                'zn' => $eiyo['zn'],
                'cu' => $eiyo['cu'],
                'mn' => $eiyo['mn'],
                'se' => $eiyo['se'],
                'cr' => $eiyo['cr'],
                'mo' => $eiyo['mo'],
                'retol' => $eiyo['retol'],
                'carta' => $eiyo['carta'],
                'cartb' => $eiyo['cartb'],
                'crypxb' => $eiyo['crypxb'],
                'cartbeq' => $eiyo['cartbeq'],
                'vita_rae' => $eiyo['vita_rae'],
                'vitd' => $eiyo['vitd'],
                'tocpha' => $eiyo['tocpha'],
                'tocphb' => $eiyo['tocphb'],
                'tocphg' => $eiyo['tocphg'],
                'tocphd' => $eiyo['tocphd'],
                'vitk' => $eiyo['vitk '],
                'thia' => $eiyo['thia'],
                'ribf' => $eiyo['ribf'],
                'nia' => $eiyo['nia'],
                'ne' => $eiyo['ne'],
                'vitb6a' => $eiyo['vitb6a'],
                'vitb12' => $eiyo['vitb12'],
                'fol' => $eiyo['fol'],
                'pantac' => $eiyo['pantac'],
                'biot' => $eiyo['biot'],
                'vitc' => $eiyo['vitc'],
                'alc' => $eiyo['alc'],
                'nacl_eq' => $eiyo['nacl_eq'],
            ]);
        }

        return Command::SUCCESS;
    }

    private function makeEiyoCollection()
    {
        $eiyo = Storage::get('eiyo.csv');
        $eiyoLines = explode(separator: "\r\n", string: $eiyo);
        $eiyoCollection = collect();
        foreach ($eiyoLines as $index => $line) {
            if ($index === 11) {
                $header = explode(
                    separator: ",",
                    string: str_replace(
                        search: '-',
                        replace: '',
                        subject: Str::lower($line)
                    )
                );
                $header[3] = 'food_name';
                $header[61] = 'remarks';
            } elseif ($index >= 12) {
                $food = explode(",", $line);
                $combinedFood = array_combine($header, $food);
                $eiyoCollection->push($combinedFood);
            }
        }
        return $eiyoCollection;
    }

}
