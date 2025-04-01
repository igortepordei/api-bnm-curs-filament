<?php

namespace App\Jobs;

use App\Models\Currencies;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncCurrenciesDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            \Log::info("Job-ul SyncCurrenciesDataJob a început.");

            $date = date('d.m.Y');
            $firstCurrencyByDate = Currencies::where('date', $date)->first();

            if (is_null($firstCurrencyByDate) || ($firstCurrencyByDate && $firstCurrencyByDate->date !== $date)) {

                $url = sprintf('http://www.bnm.md/md/official_exchange_rates?get_xml=1&date=%s', $date);
                \Log::info("Se preia datele de la: $url");

                $client = new Client();
                $response = $client->request('GET', $url);

                if ($response->getStatusCode() !== 200) {
                    \Log::error('Eroare la preluarea datelor din API-ul BNM.', ['url' => $url]);
                    return;
                } else {
                    Currencies::truncate();
                }

                $xml = $response->getBody()->getContents();

//            $xml = simplexml_load_string($response->body());
                $xmlObject = simplexml_load_string($xml);
                $array = json_decode(json_encode($xmlObject), true);

//            dd(isset($array['Valute']));

                if (!isset($array['Valute'])) {
                    \Log::error('Structura datelor API-ului este incorectă.', ['data' => $array]);
                    return;
                }

//                foreach ($array['Valute'] as $currency) {
                foreach (array_slice($array['Valute'], 0, 26) as $currency) {
                    Currencies::create([
                        'num_code'  => $currency['NumCode'],
                        'char_code' => $currency['CharCode'],
                        'nominal'   => $currency['Nominal'] + date('i'),// + date('i') - for testing
                        'value'     => str_replace(',', '.', $currency['Value']),
                        'date'      => date('Y-m-d', strtotime(str_replace('.', '-', $date))),
                    ]);
                }
            }

            \Log::info("Datele valutare pentru $date au fost sincronizate cu succes.");
        } catch (\Exception $e) {
            \Log::error("Eroare în job: " . $e->getMessage());
        }
    }
}
