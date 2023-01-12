<?php

namespace App\Processors;

use App\Models\cvs;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class CvsProcessor implements ItemProcessorInterface
{
    use Configurable;

    private static array $contracts = [
        'Vast contract',
        'Freelance',
        'Tijdelijk contract',
        'Stage',
        'Bijbaan',
        'Detachering',
    ];

    private static array $education = [
        'MBO',
        'HBO',
        'Universitair',
        'VMBO',
        'HAVO',
        'VWO',
    ];

    public function processItem(ItemInterface $item): ItemInterface
    {
        $data = collect();

        $data->put('preferred_function', $item->get('preferred_function'));
        $data->put('first_name', $item->get('first_name'));
        $data->put('location', $item->get('location'));
        $data->put('availability', $item->get('availability'));
        $data->put('werkzoeken_url', $item->get('url'));

        foreach ($item->get('preferences') as $preference) {
            if (str_contains($preference, 'p/m') || str_contains($preference, 'p/u')) {
                $data->put('preferred_min_wage', str_replace('Min. ', '', $preference));
            }

            if (str_contains($preference, 'p/w')) {
                $data->put('preferred_hours', $preference);
            }

            foreach (self::$contracts as $contract) {
                if (str_contains($preference, $contract)) {
                    $data->put('preferred_contract', $contract);
                    break;
                }
            }

            if (str_contains($preference, 'km')) {
                $data->put('preferred_max_distance', (int) filter_var($preference, FILTER_SANITIZE_NUMBER_INT));
            }
        }

        foreach ($item->get('personal') as $credential) {
            foreach (self::$education as $education) {
                if (str_contains($credential, $education)) {
                    $data->put('education', $education);
                    break;
                }
            }

            if (str_contains($credential, 'niveau')) {
                $data->put('level', trim($credential));
            }

            if (str_contains($credential, 'Rijbewijzen')) {
                $formattedCredential = explode(',', str_replace('Rijbewijzen: ', '', $credential));
                $data->put('drivers_license', $formattedCredential);
            }

            if (str_contains($credential, 'Talen')) {
                $formattedCredential = explode(',', str_replace('Talen: ', '', $credential));
                $data->put('languages', $formattedCredential);
            }
        }

        cvs::create($data->toArray());

        return $item;
    }
}
