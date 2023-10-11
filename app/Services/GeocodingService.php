<?php

namespace App\Services;






class GeocodingService
{

    /**
     * @param string | null $address
     * @return array|null
     */


    private function getData(string | null $address): array | null {

        try {
            $ch = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=a8128129-f196-4639-981d-51e8e5424205&format=json&geocode=' . urlencode($address));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);

            return json_decode($res, true);


        }  catch (\Exception $error) {
            $error->getMessage();
            return null;
        }

    }

    /**
     * @param string $address
     * @return string[]
     */
    public function getLongLat (string $address = 'Сасово') : array {
        if(($data = $this->getData($address)) == null) {
            return ["Не удалось получить данные"];
        }
        $coordinates = $data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
        return explode(' ', $coordinates);
    }


}